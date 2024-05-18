<?php
include 'dbcon.php'; // Include the database connection file

// Check if the product_name and company parameters are set in the URL
if(isset($_GET['product']) && isset($_GET['company'])) {
    // Get the product_name and company values from the URL and decode them
    $product_name = urldecode($_GET['product']);
    $comp_name = urldecode($_GET['company']);

    // Construct the SQL DELETE query
    $sql = "DELETE FROM products WHERE product_name = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameter
    $stmt->bind_param("s", $product_name);

    // Execute the statement
    if($stmt->execute()) {
        echo "<script>alert('Product deleted successfully');</script>";
echo "<script>window.location.href = 'my_listing.php?company=$comp_name';</script>";
    exit();
    } else {
        echo "<script>alert('Error deleting product')</script>";
         echo "<script>window.location.href = 'my_listing.php?company=$comp_name';</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect to my_listing.php
    echo "<script>window.location.href = 'my_listing.php?company=$comp_name';</script>";
    exit();

} else {
    // Redirect to an error page or back to the products list page with an error message
    echo "<script>alert('Invalid request')</script>";
     echo "<script>window.location.href = 'index.php';</script>";
    exit();
}
?>
