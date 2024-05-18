<?php
// Start the session
session_start();

require('dbcon.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve session variable for company name
    $comp_name = $_SESSION['comp_name'];

    // Database connection parameters
   



    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statements for updating revenue and income
    $sql_revenue = "UPDATE finance SET fy_revenue=?, sy_revenue=?, ty_revenue=?, ly_revenue=? WHERE comp_name=?";
    $sql_income = "UPDATE finance SET fy_income=?, sy_income=?, ty_income=?, ly_income=? WHERE comp_name=?";

    // Prepare and bind parameters for revenue update
    $stmt_revenue = $conn->prepare($sql_revenue);
    $stmt_revenue->bind_param("sssss", $_POST['revenue2020'], $_POST['revenue2021'], $_POST['revenue2022'], $_POST['revenue2023'], $comp_name);

    // Execute revenue update
    $stmt_revenue->execute();

    // Prepare and bind parameters for income update
    $stmt_income = $conn->prepare($sql_income);
    $stmt_income->bind_param("sssss", $_POST['income2020'], $_POST['income2021'], $_POST['income2022'], $_POST['income2023'], $comp_name);

    // Execute income update
    $stmt_income->execute();

    // Close statements and connection
    $stmt_revenue->close();
    $stmt_income->close();
    $conn->close();

    // Redirect back to the form page or wherever you want
    echo "<script>window.location.href = 'suppliardashboard.php';</script>";
    exit();
}
?>
