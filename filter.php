<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filterDocument</title>
</head>
<body>
<?php
include 'dbcon.php'; // Include your database connection file
$searchterm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';


// Check if the keys exist in the $_GET superglobal
if (isset($_GET['supplierTypes']) || isset($_GET['volume']) || isset($_GET['location']) ) {
    $volume = isset($_GET['volume']) ? $_GET['volume'] : array();
    $supplierTypes = isset($_GET['supplierTypes']) ? $_GET['supplierTypes'] : array();
    $location = isset($_GET['location']) ? $_GET['location'] : array(); 


    // echo "Search Term: " . $searchterm;

    // Check if both arrays are empty
    if (empty($supplierTypes) && empty($volume) && empty($searchterm) && empty($location)) {
        echo "<p>Please select some filters</p>";
    } else {
        // Check if the variables are set and are arrays
        if ((is_array($supplierTypes) || !empty($supplierTypes)) || (is_array($volume) || !empty($volume)) || (is_array($location) || !empty($location))) {

            // Implode the arrays into strings
            $volumeString = implode("','", $volume);
            $supplierTypesString = implode("','", $supplierTypes);
            $locationString = implode("','", $location);
            


            $sql = "SELECT * FROM add_listing WHERE ";

            // Add condition for searchterm
            if (!empty($searchterm)) {
                $sql .= "categories LIKE '%$searchterm%' AND ";
            }
            
            // Add conditions for array1 and column1 if $supplierTypes is not empty
            if (!empty($supplierTypes)) {
                foreach ($supplierTypes as $string) {
                    $sql .= "FIND_IN_SET('$string', Supplier_type) > 0 AND ";
                }
            }
            
            // Add conditions for array2 and column2 if $volume is not empty
            if (!empty($volume)) {
                foreach ($volume as $string) {
                    $sql .= "FIND_IN_SET('$string', PV_capacity) > 0 AND ";
                }
            }

            if (!empty($location)) {
                $locationCondition = '';
                foreach ($location as $string) {
                    $locationCondition .= "FIND_IN_SET('$string', Country) > 0 OR ";
                }
                // Remove the trailing " OR " from the condition
                $locationCondition = rtrim($locationCondition, " OR ");
                $sql .= "($locationCondition) AND ";
            }
        

            // Remove the trailing " AND " from the query
            $sql = rtrim($sql, " AND ");

            $result = mysqli_query($conn, $sql);

            if ($result === false) {
                die("Error in SQL query: " . mysqli_error($conn));
            }

            // echo '<table border="1">
            // <tr>
                
            //     <th>Column2</th>
            //     <!-- Add more column headers as needed -->
            // </tr>';

            // while ($row = mysqli_fetch_assoc($result)) {
            //     echo '<tr>';
            //     echo '<td>' . $row['comp_name'] . '</td>';
            //     echo '<td>' . $row['Supplier_type'] . '</td>';
            //     // Add more cells as needed for other columns
            //     echo '</tr>';
            // }

            // echo '</table>';

            if (mysqli_num_rows($result) > 0) {
                $counter = 1; // Initialize a counter
        
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    // Check if v_status is 1
                    if ($row['v_status'] == 1) {
                        include 'card.php';
        
                        echo '<script>';
                        echo 'var cards = document.getElementsByClassName("product-card-' . $counter . '");'; // Use a unique class for each card
                        echo 'for (var i = 0; i < cards.length; i++) {';
                        echo '    cards[i].getElementsByClassName("heading")[0].innerText = "' . $row['comp_name'] . '";';
        
                        // Description
                        $companyOverview = $row['Company_Overview']; // Assuming $row['Company_Overview'] contains the description
                        $trimmedDescription = substr($companyOverview, 0, 155);
                        $finalDescription = $trimmedDescription . '....';
                        echo '    cards[i].getElementsByClassName("description")[0].innerText = ' . json_encode($finalDescription) . ';';
        
                        // Location
                        echo '    cards[i].getElementsByClassName("p-location")[0].innerText = "' . $row['Country'] . '";';
                        
                        // Business Categories
                        $businessCategoriesString = $row['Categories'];
                        $businessCategoriesArray = explode(',', $businessCategoriesString);
                        echo 'var businessCategoriesContainer = cards[i].getElementsByClassName("business-categories")[0];';
        
                        for ($j = 0; $j < min(4, count($businessCategoriesArray)); $j++) {
                            $businessCategory = trim($businessCategoriesArray[$j]);
                            $color = '#006400'; // Green color for business categories
                            echo 'var categorySpan = document.createElement("span");';
                            echo 'categorySpan.style.display = "inline-block";';
                            echo 'categorySpan.style.borderRadius = "50px";';
                            echo 'categorySpan.style.marginRight = "7px";';
                            echo 'categorySpan.style.marginBottom = "5px";';
                            echo 'categorySpan.style.padding = "5px 15px";';
                            echo 'categorySpan.style.color = "' . $color . '";';
                            echo 'categorySpan.style.backgroundColor = "white";';
                            echo 'categorySpan.style.border = "1px solid ' . $color . '";';
                            echo 'categorySpan.innerText = "' . $businessCategory . '";';
                            echo 'businessCategoriesContainer.appendChild(categorySpan);';
                        }
        
                        // Image
                        echo '    cards[i].getElementsByClassName("comp_image")[0].src = "uploads/' . $row['image_url'] . '";';
                        // Default logo
                        echo 'cards[i].getElementsByClassName("comp_image")[0].onerror = function() {';
                        echo '    this.src = "./images/default_company_logo.png";'; // Set default image source
                        echo '};';
        
                        echo '}';
                        echo '</script>';
        
                        $counter++; // Increment counter only when card is displayed
                    }
                }
            }else {
                echo "<p>No results found for the selected filters</p>";
            }
        } else {
            echo "<p>No results found for the selected filters</p>";
        }
    }
} else {
    if (isset($_GET['searchTerm'])) {
        $searchTerm = $_GET['searchTerm'];
    
        // Use $searchTerm in your database query
        // Example:
        $query = "SELECT * FROM add_listing WHERE Categories LIKE '%$searchTerm%'";
        $result = mysqli_query($conn, $query);
        
     

    // echo "Search Term: " . $searchterm;

    // Check if search term is not empty
    

    if (mysqli_num_rows($result) > 0) {
        $counter = 1; // Initialize a counter

        while ($row = mysqli_fetch_assoc($result)) {
            
            // Check if v_status is 1
            if ($row['v_status'] == 1) {
                include 'card.php';

                echo '<script>';
                echo 'var cards = document.getElementsByClassName("product-card-' . $counter . '");'; // Use a unique class for each card
                echo 'for (var i = 0; i < cards.length; i++) {';
                echo '    cards[i].getElementsByClassName("heading")[0].innerText = "' . $row['comp_name'] . '";';

                // Description
                $companyOverview = $row['Company_Overview']; // Assuming $row['Company_Overview'] contains the description
                $trimmedDescription = substr($companyOverview, 0, 155);
                $finalDescription = $trimmedDescription . '....';
                echo '    cards[i].getElementsByClassName("description")[0].innerText = ' . json_encode($finalDescription) . ';';

                // Location
                echo '    cards[i].getElementsByClassName("p-location")[0].innerText = "' . $row['Country'] . '";';
                
                // Business Categories
                $businessCategoriesString = $row['Categories'];
                $businessCategoriesArray = explode(',', $businessCategoriesString);
                echo 'var businessCategoriesContainer = cards[i].getElementsByClassName("business-categories")[0];';

                for ($j = 0; $j < min(4, count($businessCategoriesArray)); $j++) {
                    $businessCategory = trim($businessCategoriesArray[$j]);
                    $color = '#006400'; // Green color for business categories
                    echo 'var categorySpan = document.createElement("span");';
                    echo 'categorySpan.style.display = "inline-block";';
                    echo 'categorySpan.style.borderRadius = "50px";';
                    echo 'categorySpan.style.marginRight = "7px";';
                    echo 'categorySpan.style.marginBottom = "5px";';
                    echo 'categorySpan.style.padding = "5px 15px";';
                    echo 'categorySpan.style.color = "' . $color . '";';
                    echo 'categorySpan.style.backgroundColor = "white";';
                    echo 'categorySpan.style.border = "1px solid ' . $color . '";';
                    echo 'categorySpan.innerText = "' . $businessCategory . '";';
                    echo 'businessCategoriesContainer.appendChild(categorySpan);';
                }

                // Image
                echo '    cards[i].getElementsByClassName("comp_image")[0].src = "uploads/' . $row['image_url'] . '";';
                // Default logo
                echo 'cards[i].getElementsByClassName("comp_image")[0].onerror = function() {';
                echo '    this.src = "./images/default_company_logo.png";'; // Set default image source
                echo '};';

                echo '}';
                echo '</script>';

                $counter++; // Increment counter only when card is displayed
            }
        }
    } else {
            echo "<p>No results found for the search term</p>";
        }
    } else {
        echo "<p>Please enter a search term</p>";
        echo $searchTerm;
    }
}
?>
    
</body>
</html>
