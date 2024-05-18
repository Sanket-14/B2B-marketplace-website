<?php
// Start the session to access session variables
session_start();

require('dbcon.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file

    // Define a function to generate a unique filename
    function generateUniqueFileName($originalName) {
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        $basename = pathinfo($originalName, PATHINFO_FILENAME);
        $uniqueName = $basename . '_' . uniqid() . '.' . $extension;
        return $uniqueName;
    }

    // Define the directory to store uploaded logos
    $uploadDirectory = "ref_logo/";

    // Retrieve data from the form
    $compName = $_SESSION['comp_name'];
    $refCompName = $_POST['customerName'];
    $categoriesSupplied = $_POST['categoriesSupplied'];
    $website = $_POST['website'];

    // Handle file upload
    if ($_FILES['customerLogo']['error'] == UPLOAD_ERR_OK) {
        $tmpName = $_FILES['customerLogo']['tmp_name'];
        $originalName = $_FILES['customerLogo']['name'];
        $fileName = generateUniqueFileName($originalName);
        
        // Move the uploaded file to the destination directory
        if (move_uploaded_file($tmpName, $uploadDirectory . $fileName)) {
            // Insert data into the database
            $sql = "INSERT INTO customer_reference (comp_name, ref_comp_name, categories_supplied, website, ref_logo) 
                    VALUES ('$compName', '$refCompName', '$categoriesSupplied', '$website', '$fileName')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<script>window.location.href = 'suppliardashboard.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error moving file to destination directory.";
        }
    } else {
        echo "Error uploading file.";
    }

    // Close the database connection
    $conn->close();
}
?>
