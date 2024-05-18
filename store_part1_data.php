<?php
// Start the session if not already started
session_start();

// Function to generate a unique filename for the uploaded logo
function generateUniqueFilename($originalFilename)
{
    $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);
    return uniqid() . '.' . $extension;
}

// Assuming you have received data from part 1
$companyName = isset($_POST['companyName']) ? $_POST['companyName'] : '';
$companyRegion = isset($_POST['companyRegion']) ? $_POST['companyRegion'] : '';
$countryRegistration = isset($_POST['countryRegistration']) ? $_POST['countryRegistration'] : '';
$state = isset($_POST['state']) ? $_POST['state'] : '';
$city = isset($_POST['city']) ? $_POST['city'] : '';
$contactno = isset($_POST['contactno']) ? $_POST['contactno'] : '';
$yearFounded = isset($_POST['yearFounded']) ? $_POST['yearFounded'] : '';
$companyWebsite = isset($_POST['companyWebsite']) ? $_POST['companyWebsite'] : '';

// Handling logo upload
$logoFileName = '';
if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
    $logoFileName = generateUniqueFilename($_FILES['logo']['name']);
    $logoPath = 'uploads/' . $logoFileName; // Update with your actual upload path
    move_uploaded_file($_FILES['logo']['tmp_name'], $logoPath);
}

// Store part 1 data in session
$_SESSION['part1_data'] = array(
    'companyName' => $companyName,
    'companyRegion' => $companyRegion,
    'countryRegistration' => $countryRegistration,
    'state' => $state,
    'city' => $city,
    'contactno' => $contactno,
    'yearFounded' => $yearFounded,
    'companyWebsite' => $companyWebsite,
    'logoFileName' => $logoFileName, // Include logo filename in session data
    // Add other fields as needed
);

// Respond with success message or other information
echo "Part 1 data stored successfully";
?>
