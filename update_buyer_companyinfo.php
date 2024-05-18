<?php
session_start(); 


require('dbcon.php');

$conn->query("SET foreign_key_checks = 0");


$buyer_company_name = $_POST['buyer_companyname'];
$buyer_address = $_POST['buyer_address'];
$buyer_city = $_POST['buyer_city'];
$buyer_state = $_POST['buyer_state'];
$buyer_pincode = $_POST['buyer_pincode'];
$buyer_country = $_POST['buyer_country'];
$buyer_company_type = $_POST['buyer_company_type'];



$buyer_company_website = $_POST['buyer_companyWebsite'];


$logo_name = '';




function generateUniqueName($file) {
    if (is_array($file)) {
        // For multiple file uploads, extract the extension from the file name
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        return uniqid('', true) . '.' . $extension;
    } else {
        // For single file uploads, generate a unique name using microtime and include a default extension
        return uniqid('', true) . '.jpg'; // You can choose any default extension you prefer
    }
}

if(isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
    $logo_name = uniqid() . '_' . basename($_FILES['logo']['name']);
    $logo_target = 'buyer_company_logo/' . $logo_name;
    move_uploaded_file($_FILES['logo']['tmp_name'], $logo_target);
} else {
    // If logo file is not uploaded, assign value present in image_url column
    $logo_name = $_POST['buyer_hiddenimage']; // Assuming 'image_url' is the column name
}


$buyer_comp_name = $_SESSION["buyer_comp_name"];


$stmt_add_listing = $conn->prepare("UPDATE buyer_company_data SET buyer_comp_name = ?, buyer_address = ?, buyer_city = ?, buyer_state = ?,buyer_pincode=? , buyer_country=?,   buyer_company_website = ?,buyer_company_type=?,buyer_company_logo=? WHERE buyer_comp_name = ?");
$stmt_add_listing->bind_param("ssssssssss", $buyer_company_name, $buyer_address, $buyer_city, $buyer_state,$buyer_pincode ,$buyer_country ,   $buyer_company_website, $buyer_company_type,  $logo_name,  $buyer_comp_name);


if (!$stmt_add_listing->execute()) {
    echo "Error updating add_listing record: " . $stmt_add_listing->error;
    exit(); // Exit if there is an error
}


$stmt_userdata = $conn->prepare("UPDATE buyer_userdata SET buyer_comp_name = ? WHERE buyer_comp_name = ?");
$stmt_userdata->bind_param("ss", $buyer_company_name, $buyer_comp_name);


if (!$stmt_userdata->execute()) {
    echo "Error updating userdata record: " . $stmt_userdata->error;
    exit();
}





$stmt_add_listing->close();
$stmt_userdata->close();


$conn->query("SET foreign_key_checks = 1");

$_SESSION["buyer_comp_name"]=$buyer_company_name;

$conn->close();
echo "<script>window.location.href = 'buyer_dashboard.php';</script>";
exit();
?>
