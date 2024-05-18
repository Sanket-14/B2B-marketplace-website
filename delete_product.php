<?php
include 'dbcon.php'; // Include the database connection file

// Check if the product_name and company parameters are set in the URL
if(isset($_GET['product']) && isset($_GET['company'])) {
    // Get the product_name and company values from the URL and decode them
    $product_name = urldecode($_GET['product']);
    $comp_name = urldecode($_GET['company']);

    echo <<<EOL
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete Product</title>
    </head>
    <body>
    <script>
        if(confirm('Are you sure you want to delete this product?')) {
            window.location.href = 'delete_confirm.php?product=$product_name&company=$comp_name';
        } else {
            window.location.href = 'my_listing.php?company=$comp_name';
        }
    </script>
    </body>
    </html>
    EOL;

} else {
    // Redirect to an error page or back to the products list page with an error message
    echo "<script>alert('Invalid request')</script>";
    header("Location: my_listing.php");
    exit();
}
?>
