<?php
require('dbcon.php');
session_start();

// Retrieve the submitted data
$userEmail = $_POST["userEmail"];
$newpassword = $_POST["newPassword"];

$password = password_hash($newpassword, PASSWORD_DEFAULT);


// Hash the new password
// $hashedPassword = password_hash($newpassword, PASSWORD_BCRYPT);

// Prepare and execute the SQL query
$stmt = $conn->prepare("SELECT * FROM userdata WHERE email = ?");
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the user record
$user = $result->fetch_assoc();

if ($user) {
    // Update the user's password
    $updateStmt = $conn->prepare("UPDATE userdata SET password = ? WHERE email = ?");
    $updateStmt->bind_param("ss", $password, $userEmail);
    $updateStmt->execute();

    // Password updated successfully
    $message = "Password updated successfully! directing back to login";
} else {
    // User not found
    echo "User not found!";
}

// Close the statements and the connection
$stmt->close();
$updateStmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update Result</title>
    <style>
        /* Style for the notification container */
        .notification {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px;
            background-color: #4CAF50;
            color: #fff;
            border-radius: 5px;
            display: none;
            opacity: 1;
            transition: opacity 1s ease-in-out;
        }
    </style>
</head>
<body>
    <!-- Your HTML content goes here -->
    <div class="notification" id="passwordNotification">Password updated successfully! directing back to login</div>

    <script>
        // JavaScript code for showing and fading out the notification
        function showNotification() {
            var notification = document.getElementById("passwordNotification");
            notification.style.display = "block";

            // Automatically fade out the notification after 5 seconds
            setTimeout(function() {
                notification.style.opacity = "0";
                setTimeout(function() {
                    notification.style.display = "none";
                    // Redirect the user to login.php after the notification fades out
                    window.location.replace("login.php");
                }, 1000); // Adjust the fade-out time as needed
            }, 1000); // Adjust the notification display time as needed
        }

        // Call the function to show the notification
        showNotification();
    </script>
</body>
</html>
