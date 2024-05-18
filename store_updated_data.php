<?php
// Include the database connection file
include 'dbcon.php';

if (isset($_GET['company']) && isset($_GET['product'])) {
    // Retrieve the values of 'company' and 'product' parameters from the URL
    $company = $_GET['company'];
    $product = $_GET['product'];

    // URL decode the values to remove any URL encoding
    $company = urldecode($company);
    $product = urldecode($product);

} else {
    // Handle case when 'company' or 'product' parameters are not set
    echo "<script>alert('invalid request');</script>";
}


// Function to generate a unique filename
function generateUniqueFilename($originalName) {
    $uniqueFilename = uniqid('', true); // Generate a unique ID
    $extension = pathinfo($originalName, PATHINFO_EXTENSION); // Get the file extension
    return $uniqueFilename . '.' . $extension; // Combine unique ID with original extension
}

function trimCommas($string) {
    return preg_replace('/,+/', ',', $string); // Replace consecutive commas with a single comma
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $product_name = mysqli_real_escape_string($conn, $_POST['product']['name']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product']['description']);
    // Initialize an empty array to store uploaded image filenames
    $uploadedImages = [];

    // Check if images are uploaded
    if (!empty($_FILES['product']['name']['images'][0])) {
        // Iterate over each uploaded image
        foreach ($_FILES['product']['name']['images'] as $key => $value) {
            // Get the original filename
            $originalName = $_FILES['product']['name']['images'][$key];
            // Generate a unique filename
            $uniqueFilename = generateUniqueFilename($originalName);
            // Define the target directory
            $targetDir = "products/";
            // Define the target file path
            $targetFile = $targetDir . $uniqueFilename;
            // Move the uploaded image to the target directory with the unique filename
            if (move_uploaded_file($_FILES['product']['tmp_name']['images'][$key], $targetFile)) {
                // Store the unique filename in the array
                $uploadedImages[] = $uniqueFilename;
            } 
        }
    }else {
        $uploadedImages[]= $_POST['hidden_images'];
    }

    // Convert the array of uploaded image filenames to a comma-separated string
    $imageNames = implode(',', $uploadedImages);
    
    // Escape old product name for security
    $old_product_name = mysqli_real_escape_string($conn, $_POST['oldproduct_name']);

    $features= $_POST['features'];
    trimCommas($features);
    $features = rtrim($_POST['features'], ',');
    
    // Update query
    $sql = "UPDATE products SET product_name='$product_name', product_description='$product_description', product_image='$imageNames', features='$features' WHERE product_name='$old_product_name'";
    
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Record updated successfully."); window.location.href = "my_listing.php?company=' . urlencode($company) . '&product=' . urlencode($product) . '";</script>';
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
?>
