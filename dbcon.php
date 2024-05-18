<?php
$servername = "localhost";
$username = "thevonk2_Sanket";
$password = "Sanket@123"; // Ensure it matches the MySQL root user's password
$dbname = "thevonk2_voltbridge"; // Replace "your_database_name" with your actual database name

// Establishing the connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>