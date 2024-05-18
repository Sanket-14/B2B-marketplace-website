<?php
session_start();
require("dbcon.php");

if (isset($_GET['code']) && isset($_GET['email']) && isset($_GET['compName']) ) {
    $verificationCode = $_GET['code'];
    $email = $_GET['email'];
    $comp_name=$_GET['compName'];

    // Your database connection code here
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check the verification code
    $checkCodeQuery = "SELECT v_token FROM add_listing WHERE v_token = '$verificationCode'";
    $checkCodeResult = $conn->query($checkCodeQuery);

    if ($checkCodeResult === FALSE) {
        // Handle query error
        echo "Error checking verification code: " . $conn->error;
    } else {
        // Check if the query returned any rows
        if ($checkCodeResult->num_rows > 0) {
            // Code is valid, update v_status in userdata table
            $updateStatusQuery = "UPDATE add_listing SET v_status = 1 WHERE comp_name = '$comp_name'";
            if ($conn->query($updateStatusQuery) === TRUE) {
                // Successfully verified
                // echo "Thank you for choosing us! You have been successfully verified by Voltbridge team.";
                // echo "You can now <a href=\"login.php\">login</a>";
        
                // echo "<img src='verified.png' alt=''>";

            } else {
                // Error updating v_status
                echo "Error updating verification status: " . $conn->error;
            }
        } else {
            // Invalid request
            echo '<script>alert("Invalid request"); </script>';
        }
    }

    // Closing the connection
    $conn->close();
} else {
    // Invalid request
    echo '<script>alert("Invalid request"); </script>';
    // echo '<script>alert("Invalid request"); window.location.href = "index.php";</script>';

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            flex-direction:column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-image: url("images/section.png");
        }

        div {
            text-align: center;
        }

        img {
            height: 300px; /* Adjust the height as needed */
            width: 600px; /* Adjust the width as needed */
        }
    </style>
</head>
<body >
    <h2>Thank you for choosing us! You have been successfully verified by Voltbridge team.</h2>
    <div>
        <img src="verified.png" alt="">
    </div>
    You can now <a href="login.php">login</a>
</body>
</html>
