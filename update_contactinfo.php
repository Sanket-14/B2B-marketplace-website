<?php
session_start(); // Start the session

// Include your database connection file
require('dbcon.php');

// Retrieve data from the form
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$business_title = $_POST['businessTitle'];

// Retrieve the comp_name from the session
$comp_name = $_SESSION["comp_name"];

// Use a prepared statement to update the user's information in the database
$stmt = $conn->prepare("UPDATE userdata SET first_name = ?, last_name = ?, email = ?, supplier_phone_number = ?, business_title = ? WHERE comp_name = ?");
$stmt->bind_param("ssssss", $first_name, $last_name, $email, $phone, $business_title, $comp_name);

// Execute the statement
if ($stmt->execute()) {
    // If the update was successful, redirect back to the dashboard or any other page
    
    echo "<script>window.location.href = 'suppliardashboard.php';</script>";
    exit();
} else {
    // If there was an error, handle it accordingly
    echo "Error updating record: " . $conn->error;
}

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();
?>
