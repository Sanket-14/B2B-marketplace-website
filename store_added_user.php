<?php
require('dbcon.php');
$error = "";
session_start(); 




// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data - new input way for security against XSS Attack.
    $firstName = isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : "";
    $lastName = isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : "";
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : "";
    $pass = $_POST['password'];
    $password = password_hash($pass, PASSWORD_DEFAULT);
    $businessTitle = isset($_POST['businessTitle']) ? htmlspecialchars($_POST['businessTitle']) : "";
    $companyName = isset($_POST['companyName']) ? htmlspecialchars($_POST['companyName']) : "";
    $countryCode = isset($_POST['countryCode']) ? htmlspecialchars($_POST['countryCode']) : "";
    $phoneNumber = isset($_POST['phoneNumber']) ? htmlspecialchars($_POST['phoneNumber']) : "";
    $combinedPhoneNumber = $countryCode . $phoneNumber;
    $country = isset($_POST['country']) ? htmlspecialchars($_POST['country']) : "";

    // Your existing database connection code here...
    if (empty($error)) {
        // Check if the email is from Gmail or Yahoo
        // $emailDomain = explode('@', $email)[1]; // Extract domain part of email
        // if ($emailDomain == "gmail.com" || $emailDomain == "yahoo.com") {
        //     $error = "Only work emails can be used for registration.";
        // } else {
            // Check if the email is admin email or not
            if ($email !== "admin@thevoltbridge.com") {
                // SQL query to check if email or company name already exists
                $checkEmailQuery = "SELECT * FROM userdata WHERE email='$email'";
                $checkCompanyQuery = "SELECT * FROM userdata WHERE comp_name='$companyName'";

                $emailResult = $conn->query($checkEmailQuery);
                $companyResult = $conn->query($checkCompanyQuery);

                if ($emailResult->num_rows > 0) {
                    // Email is already registered
                    $error = "Email-address is already registered, please login or try again with a different email-address";
                } 
            }
        // }
    }

    // If no errors, proceed with insertion
    if (empty($error)) {
        // SQL query to insert data into User_data table
        $sql = "INSERT INTO userdata (first_name, last_name, email, password, business_title, comp_name, supplier_phone_number, country)
        VALUES ('$firstName', '$lastName', '$email', '$password', '$businessTitle', '$companyName', '$combinedPhoneNumber', '$country')";

        // Check if the query was successful
        if ($conn->query($sql) === TRUE) {
    
            echo '<script>';
          
            echo 'alert("user added succesfully")';
            echo '</script>';
            echo "<script>window.location.href = 'suppliardashboard.php';</script>";
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
            echo $error;
        }
    }

    // Close the database connection
    $conn->close();
}

?>