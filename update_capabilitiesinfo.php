<?php
require('dbcon.php'); // Database connection code (replace with your actual database connection code)
session_start();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_SESSION['comp_name'])) {
    $comp_name = $_SESSION['comp_name'];

    $selectedTypes = [];

    // Loop through each checkbox to check which ones are checked
    if(isset($_POST['supplierType']) && is_array($_POST['supplierType'])) {
        foreach ($_POST['supplierType'] as $type) {
            // Add the value of the checked checkbox to the selectedTypes array
            $selectedTypes[] = $type;
        }
    }

    // Convert selected types array to string
    // $supplierTypeString = implode(', ', $selectedTypes);
    // Convert selected types array to string
    $supplierTypeString = implode(',', $selectedTypes);

    // Retrieve existing categories, certificates, and supplier types from database
    $sql = "SELECT Categories, Company_Certificates, Supplier_type, mlocation FROM add_listing WHERE comp_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $comp_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $existingCategories = $_POST['modifiedCategories'];
        $existingCertificates = $_POST['modifiedCertificates'];
        $existingSupplierTypes = $row['Supplier_type'];
        $existingMlocation = $_POST['modifiedLocations'];

        // Retrieve selected categories and certificates from form
        if(isset($_POST['businessCategories']) && is_array($_POST['businessCategories'])) {
            // Retrieve selected categories from form
            $selectedCategories = implode(',', $_POST['businessCategories']);
        } else {
            // If $_POST['businessCategories'] is not set or not an array, set $selectedCategories to an empty string
            $selectedCategories = '';
        }
        if(isset($_POST['companyCertificates']) && is_array($_POST['companyCertificates'])) {
            // Retrieve selected certificates from form
            $selectedCertificates = implode(',', $_POST['companyCertificates']);
        } else {
            // If $_POST['companyCertificates'] is not set or not an array, set $selectedCertificates to an empty string
            $selectedCertificates = '';
        }

        // Check if selected categories and certificates are empty
        if (!empty($selectedCategories)) {
            // Append new categories to existing categories
            $updatedCategories = $existingCategories . ',' . $selectedCategories;
        } else {
            // If selected categories are empty, use only existing categories
            $updatedCategories = $existingCategories;
        }

        // Check if selected certificates are empty
        if (!empty($selectedCertificates)) {
            // Append new certificates to existing certificates
            $updatedCertificates = $existingCertificates . ',' . $selectedCertificates;
        } else {
            // If selected certificates are empty, use only existing certificates
            $updatedCertificates = $existingCertificates;
        }

        // Check if mlocationString is set and not null
        if(isset($_POST['mlocationString']) && (!empty($_POST['mlocationString'])) ) {
            // Retrieve mlocationString from form
            $mlocationString = $_POST['mlocationString'];

            // Append new mlocationString to existing mlocation
            $updatedMlocation = $existingMlocation . ',' . $mlocationString;
        } else {
            // If mlocationString is not set or null, use only existing mlocation
            $updatedMlocation = $existingMlocation;
        }

        // Combine existing and new supplier types
        $updatedSupplierTypes = $supplierTypeString;

        // Update categories, certificates, supplier types, and mlocation in the database
        $updateSql = "UPDATE add_listing SET Categories = ?, Company_Certificates = ?, Supplier_type = ?, mlocation = ? WHERE comp_name = ?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("sssss", $updatedCategories, $updatedCertificates, $updatedSupplierTypes, $updatedMlocation, $comp_name);

        if($stmt->execute()) {
            echo "<script>window.location.href = 'suppliardashboard.php';</script>";
        } else {
            echo "Error updating categories, certificates, supplier types, and mlocation: " . $conn->error;
        }
    } else {
        echo "No rows found";
    }
} else {
    echo "Session variable 'comp_name' not set";
}

$conn->close();
?>
