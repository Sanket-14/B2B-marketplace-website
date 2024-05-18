<?php
require('dbcon.php'); // Include the database connection code
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the JSON data from the POST request body
$jsonData = file_get_contents('php://input');

// Check if the JSON data is not empty
if (!empty($jsonData)) {
    // Decode the JSON data into an associative array
    $requestData = json_decode($jsonData, true);

    // Check if decoding was successful and required keys are set
    if ($requestData !== null && isset($requestData['comp_name']) && isset($requestData['visibility'])) {
        // Retrieve the company name and visibility status from the decoded data
        $compName = $requestData['comp_name'];
        $visibility = $requestData['visibility'];

        // Check if the user is logged in and has a remember token cookie set
        if (isset($_COOKIE["buyer_remember_token"])) {
            $buyerRmToken = $_COOKIE["buyer_remember_token"];

            // Prepare and execute a query to retrieve buyer_comp_name based on buyer_rm_token
            $query = "SELECT buyer_comp_name FROM buyer_userdata WHERE buyer_rm_token = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $buyerRmToken);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if the query was successful and if a row was returned
            if ($result->num_rows == 1) {
                // Fetch the row and retrieve the buyer_comp_name
                $row = $result->fetch_assoc();
                $buyerCompName = $row['buyer_comp_name'];

                // Close the previous statement and result set
                $stmt->close();
                $result->free();

                if ($visibility === "hidden") {
                    // Prepare and execute a query to retrieve buyer_favourites based on buyer_comp_name
                    $stmt_fav = $conn->prepare("SELECT buyer_favourites FROM buyer_company_data WHERE buyer_comp_name = ?");
                    $stmt_fav->bind_param("s", $buyerCompName);
                    $stmt_fav->execute();

                    // Check for errors
                    if ($stmt_fav->error) {
                        die("Error: " . $stmt_fav->error);
                    }

                    $stmt_fav->bind_result($buyer_favourites);

                    // Fetch result
                    $stmt_fav->fetch();

                    // Convert comma-separated string to array
                    $buyer_favourites_array = explode(",", $buyer_favourites);

                    $already_favourite = 0; // Initialize to 0
                    foreach ($buyer_favourites_array as $fav) {
                        if ($fav == $compName) {
                            $already_favourite = 1;
                            break; // Break the loop if match is found
                        }
                    }

                    if (!$already_favourite) {
                        // Close the previous statement
                        $stmt_fav->close();

                        // Prepare and execute the update query
                        $query = "UPDATE buyer_company_data 
                            SET buyer_favourites = 
                                CONCAT(
                                    IF(
                                        buyer_favourites IS NOT NULL AND buyer_favourites != '',
                                        CONCAT(buyer_favourites, ','),
                                        ''
                                    ),
                                    ?
                                ) 
                            WHERE buyer_comp_name = ?";
                        $stmt_update = $conn->prepare($query);
                        if (!$stmt_update) {
                            die("Error preparing update statement: " . $conn->error);
                        }

                        $stmt_update->bind_param("ss", $compName, $buyerCompName);
                        $stmt_update->execute();

                        // Check if the query was successful
                        if ($stmt_update->affected_rows > 0) {
                            // Update successful
                            echo "Favorites updated successfully.";
                        } else {
                            // No rows affected, possibly no matching buyer_comp_name
                            echo "No rows updated. Possibly no matching buyer_comp_name.";
                            echo $compName;
                            echo $buyerCompName;
                        }

                        $stmt_update->close();
                    }else{
                        echo "already ";
                    }
                } else {
                    // Code to handle when heart icon is not filled (unmarked)
                    // For example, remove the favorite status from the database
                    // You can use $buyerCompName to identify the user
                    // and $row['comp_name'] to identify the company whose favorite status needs to be removed

                    // Close the previous statement
              

                    // Prepare and execute a query to retrieve buyer_favourites based on buyer_comp_name
                    $stmt_remove = $conn->prepare("SELECT buyer_favourites FROM buyer_company_data WHERE buyer_comp_name = ?");
                    if (!$stmt_remove) {
                        die("Error preparing select statement: " . $conn->error);
                    }

                    $stmt_remove->bind_param("s", $buyerCompName);
                    $stmt_remove->execute();

                    // Check for errors
                    if ($stmt_remove->error) {
                        die("Error: " . $stmt_remove->error);
                    }

                    $stmt_remove->bind_result($buyer_favourites);

                    // Fetch result
                    $stmt_remove->store_result();
                    $stmt_remove->fetch();

                    // Convert comma-separated string to array
                    $buyer_favourites_array = explode(",", $buyer_favourites);
                    $key = array_search($compName, $buyer_favourites_array);

                    if ($key !== false) {
                        unset($buyer_favourites_array[$key]);
                    }

                    // Convert the modified array back into a comma-separated string
                    if (empty($buyer_favourites_array)) {
                        $updated_favourites = NULL; // Set the updated favourites to NULL
                    } else {
                        // If the array is not empty, implode it to form the updated favourites string
                        $updated_favourites = implode(",", $buyer_favourites_array);
                    }

                    // Prepare SQL statement to update buyer_favourites
                    $updateStmt = $conn->prepare("UPDATE buyer_company_data SET buyer_favourites = ? WHERE buyer_comp_name = ?");
                    if (!$updateStmt) {
                        die("Error preparing update statement: " . $conn->error);
                    }

                    $updateStmt->bind_param("ss", $updated_favourites, $buyerCompName);

                    // Execute the update statement
                    $updateStmt->execute();

                    // Check for errors
                    if ($updateStmt->error) {
                        die("Error executing update statement: " . $updateStmt->error);
                    }

                    // Close the statement
                    $updateStmt->close();
                }
            } else {
                // No matching row found for the given remember token
                // Handle the error or return an appropriate response
            }
        } else {
            // User is not logged in or remember token cookie is not set
            // Handle the case where the user is not authenticated
        }
    } else {
        // Handle missing or invalid JSON data
        echo "Error: Missing or invalid JSON data.";
    }
} else {
    // Handle empty JSON data
    echo "Error: Empty JSON data received.";
}
?>
