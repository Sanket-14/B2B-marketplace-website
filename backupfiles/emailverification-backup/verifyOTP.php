<?php
session_start();

function validateOTP($enteredOTP) {
    // Retrieve the generated OTP from the session variable
    $generatedOTP = isset($_SESSION['generated_otp']) ? $_SESSION['generated_otp'] : null;

    // Check if the generated OTP exists and compare it with the entered OTP
    if ($generatedOTP && $enteredOTP == $generatedOTP) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredOTP = $_POST['enteredOTP']; // Change this to match the sent parameter name

    // Validate the entered OTP using the function
    if (validateOTP($enteredOTP)) {
        echo "verified";
    } else {
        echo "wrong otp";
    }
} else {
    echo "Invalid request method";
}
?>
