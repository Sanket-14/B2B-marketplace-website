<?php
session_start(); 


require('dbcon.php');

$conn->query("SET foreign_key_checks = 0");


$company_name = $_POST['companyname'];
$region = $_POST['Region'];
$city = $_POST['city'];
$country = $_POST['country'];
$year_founded = $_POST['yearFounded'];
$num_employees = $_POST['numEmployees'];
$company_website = $_POST['companyWebsite'];
$company_video = $_POST['companyVideo'];
$about_us = $_POST['about_us'];
$company_overview=$_POST['company_overview'];
$hidden_company_images=$_POST['hidden_company_images'];




$logo_name = '';
$presentation_name = '';
$company_images = '';



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
    $logo_target = 'uploads/' . $logo_name;
    move_uploaded_file($_FILES['logo']['tmp_name'], $logo_target);
} else {
    // If logo file is not uploaded, assign value present in image_url column
    $logo_name = $_POST['hiddenimage']; // Assuming 'image_url' is the column name
}

if(isset($_FILES['companyPresentation']) && $_FILES['companyPresentation']['error'] === UPLOAD_ERR_OK) {
    $presentation_name = uniqid() . '_' . basename($_FILES['companyPresentation']['name']);
    $presentation_target = 'company_files/' . $presentation_name;
    move_uploaded_file($_FILES['companyPresentation']['tmp_name'], $presentation_target);
} else {
    // If presentation file is not uploaded, assign value present in file column
    $presentation_name = $_POST['hiddenfile']; // Assuming 'file' is the column name
}

if(isset($_FILES['company_images']) ) {
    $image_names = array();
    
    // Check if it's a single file upload or multiple file upload
    if(is_array($_FILES['company_images']['tmp_name'])) {
        // Multiple file upload
        foreach($_FILES['company_images']['tmp_name'] as $key => $tmp_name) {
            if($_FILES['company_images']['error'][$key] === UPLOAD_ERR_OK) {
                // Generate unique name for each file
                $image_name = generateUniqueName($_FILES['company_images']['name'][$key]);
                $image_target = 'company_images/' . $image_name;
                if(move_uploaded_file($tmp_name, $image_target)) {
                    $image_names[] = $image_name;
                } else {
                    echo "Failed to move file.";
                }
            }
        }
    } else {
        // Single file upload
        if($_FILES['company_images']['error'] === UPLOAD_ERR_OK) {
            $image_name = generateUniqueName($_FILES['company_images']['name']);
            $image_target = 'company_images/' . $image_name;
            if(move_uploaded_file($_FILES['company_images']['tmp_name'], $image_target)) {
                $image_names[] = $image_name;
            } else {
                echo "Failed to move file.";
            }
        }
    }
    
    // Combine image names into a comma-separated string
    $company_images = implode(',', $image_names);
}

if(empty($company_images)){
    $company_images = $hidden_company_images;
}

$comp_name = $_SESSION["comp_name"];


$stmt_add_listing = $conn->prepare("UPDATE add_listing SET comp_name = ?, Region = ?, City = ?, Country = ?, Year_Founded = ?, Company_Size = ?, Website = ?, yt_link = ?, image_url = ?, file = ?, about_us = ?, Company_Overview = ?, company_images = ? WHERE comp_name = ?");
$stmt_add_listing->bind_param("ssssssssssssss", $company_name, $region, $city, $country, $year_founded, $num_employees, $company_website, $company_video, $logo_name, $presentation_name, $about_us, $company_overview, $company_images, $comp_name);


if (!$stmt_add_listing->execute()) {
    echo "Error updating add_listing record: " . $stmt_add_listing->error;
    exit(); // Exit if there is an error
}


$stmt_userdata = $conn->prepare("UPDATE userdata SET comp_name = ? WHERE comp_name = ?");
$stmt_userdata->bind_param("ss", $company_name, $comp_name);


if (!$stmt_userdata->execute()) {
    echo "Error updating userdata record: " . $stmt_userdata->error;
    exit();
}

// Use a prepared statement to update the comp_name in the products table
$stmt_products = $conn->prepare("UPDATE products SET comp_name = ? WHERE comp_name = ?");
$stmt_products->bind_param("ss", $company_name, $comp_name);

if (!$stmt_products->execute()) {
    echo "Error updating products record: " . $stmt_products->error;
    exit(); 
}

$stmt_customer_reference = $conn->prepare("UPDATE customer_reference SET comp_name = ? WHERE comp_name = ?");
$stmt_customer_reference->bind_param("ss", $company_name, $comp_name);

if (!$stmt_customer_reference->execute()) {
    echo "Error updating customer_reference record: " . $stmt_customer_reference->error;
    exit(); 
}

$stmt_finance = $conn->prepare("UPDATE finance SET comp_name = ? WHERE comp_name = ?");
$stmt_finance->bind_param("ss", $company_name, $comp_name);

if (!$stmt_finance->execute()) {
    echo "Error updating finance record: " . $stmt_finance->error;
    exit(); 
}

$stmt_add_listing->close();
$stmt_userdata->close();
$stmt_products->close();

$conn->query("SET foreign_key_checks = 1");

$_SESSION["comp_name"]=$company_name;

$conn->close();
echo "<script>window.location.href = 'suppliardashboard.php';</script>";
exit();
?>
