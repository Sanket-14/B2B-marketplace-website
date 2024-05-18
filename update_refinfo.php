<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    require('dbcon.php');

    // Retrieve data from the form
    $refCompName = $_POST['ref_comp_name']; // Get ref_comp_name from hidden input
    $customerName = $_POST['customerName'];
    $categoriesSupplied = $_POST['categoriesSupplied'];
    $website = $_POST['website'];

    // Handle file upload if a new file is selected
    if ($_FILES['customerLogo']['error'] == UPLOAD_ERR_OK) {
        // Generate a unique name for the image
        $uniqueImageName = uniqid('logo_') . '.' . pathinfo($_FILES['customerLogo']['name'], PATHINFO_EXTENSION);
        
        // Move the uploaded image to the ref_logo folder
        $uploadDirectory = 'ref_logo/';
        $targetFilePath = $uploadDirectory . $uniqueImageName;
        if (move_uploaded_file($_FILES['customerLogo']['tmp_name'], $targetFilePath)) {
            // Update the record in the database with the unique image name
            $stmt = $conn->prepare("UPDATE customer_reference SET ref_comp_name = ?, categories_supplied = ?, website = ?, ref_logo = ? WHERE ref_comp_name = ?");
            $stmt->bind_param("sssss", $customerName, $categoriesSupplied, $website, $uniqueImageName, $refCompName);

            if ($stmt->execute()) {
                echo "Record updated successfully.";
                echo "<script>window.location.href = 'suppliardashboard.php';</script>";
            } else {
                echo "Error updating record: " . $conn->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error moving uploaded image to destination folder.";
        }
    }

    // Close the database connection
    $conn->close();
}
?>
