<?php
session_start(); // Start the session

// Include your database connection file
require('dbcon.php');

// Retrieve data from the form
$buyer_first_name = $_POST['buyer_firstName'];
$buyer_last_name = $_POST['buyer_lastName'];
$buyer_email = $_POST['buyer_email'];
$buyer_phone = $_POST['buyer_phone'];

$buyer_business_title = $_POST['buyer_businessTitle'];

// Retrieve the comp_name from the session
$buyer_comp_name = $_SESSION["buyer_comp_name"];

// Use a prepared statement to update the user's information in the database
$stmt = $conn->prepare("UPDATE buyer_userdata SET buyer_first_name = ?, buyer_last_name = ?, buyer_email = ?, buyer_phone_number = ?, buyer_business_title = ? WHERE buyer_comp_name = ?");
$stmt->bind_param("ssssss", $buyer_first_name, $buyer_last_name, $buyer_email, $buyer_phone, $buyer_business_title, $buyer_comp_name);

// Execute the statement
if ($stmt->execute()) {
    // If the update was successful, redirect back to the dashboard or any other page
    
    echo "<script>window.location.href = 'buyer_dashboard.php';</script>";
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
