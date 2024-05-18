<?php
session_start();

require ("dbcon.php");

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$verificationCode = bin2hex(random_bytes(16));

$_SESSION['verification_code'] = $verificationCode;
// Continue from the previous code

// Assuming you have received data from part 2
$companyOverview = isset($_POST['companyOverview']) ? $_POST['companyOverview'] : '';


// $businessCategories = $_POST['businessCategories'];
// $businessCategories = isset($_POST['businessCategories']) ? (array)array_slice($_POST['businessCategories'], 0, 6) : array();

//works below for 6 entries into databse of businesscategories
$businessCategories = isset($_POST['businessCategories']) ? (array)$_POST['businessCategories'] : array();
// Ensure $businessCategories is an array
// Limit the selection to 6 entries
$businessCategories = array_slice($businessCategories, 0, 6);
// Implode the array of selected categories into a comma-separated string
$businessCategories_str = implode(', ', $businessCategories);



$supplierType = isset($_POST['supplierType']) ? implode(', ', $_POST['supplierType']) : '';
$productionVolume = isset($_POST['productionVolume']) ? implode(', ', $_POST['productionVolume']) : '';

$mlocationString = isset($_POST['mlocationString']) ? $_POST['mlocationString'] : ''; //mlocation tag input

$companySize = isset($_POST['companySize']) ? $_POST['companySize'] : '';

// $companyCertificates = isset($_POST['companyCertificates']) ? $_POST['companyCertificates'] : ''; normal entry
$companyCertificates = isset($_POST['companyCertificates']) ? implode(', ', $_POST['companyCertificates']) : ''; //works array implode input

$companyWebsitePart2 = isset($_POST['companyWebsite']) ? $_POST['companyWebsite'] : ''; // Assuming companyWebsite is used in part 2 as well

// Merge data from part 1 stored in session
$part1Data = isset($_SESSION['part1_data']) ? $_SESSION['part1_data'] : [];

// Combine data from both parts
$combinedData = array_merge($part1Data, [
    'companyOverview' => $companyOverview,
    // 'businessCategories' => $businessCategories,
    //'businessCategories' => implode(', ', $businessCategories), // Convert array to comma-separated string
    'businessCategories' => $businessCategories_str, //works by referencing to str
    'supplierType' => $supplierType,
    'productionVolume' => $productionVolume,
    'mlocationString' => $mlocationString,
    'companySize' => $companySize,
    'companyCertificates' => $companyCertificates,
    'companyWebsitePart2' => $companyWebsitePart2, // Include part 2's companyWebsite field
]);

// Your database connection code here


// Create connection


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$compName = $combinedData['companyName'];
$emailResult = $conn->query("SELECT first_name , last_name ,email FROM userdata WHERE comp_name = '$compName'");

$userData = $emailResult->fetch_assoc();
$companyEmail = $userData['email'];
$firstname = $userData['first_name'];
$lastname = $userData['last_name'];


// SQL query to insert into the Add_listing table
$sql = "INSERT INTO add_listing (
    comp_name, Region, Country, city, Contact_Number, Year_Founded, Website, image_url,
    Company_Overview, Categories, Supplier_type, PV_capacity, mlocation, Company_Size, Company_Certificates ,v_token) VALUES (
    '{$combinedData['companyName']}', '{$combinedData['companyRegion']}', '{$combinedData['countryRegistration']}',
    '{$combinedData['city']}', '{$combinedData['contactno']}', '{$combinedData['yearFounded']}',
    '{$combinedData['companyWebsite']}', '{$combinedData['logoFileName']}', '{$combinedData['companyOverview']}',
    '{$combinedData['businessCategories']}', '{$combinedData['supplierType']}', '{$combinedData['productionVolume']}',
    '{$combinedData['mlocationString']}', '{$combinedData['companySize']}', '{$combinedData['companyCertificates']}','$verificationCode')";

    // finance
    $sql_finance = "INSERT INTO finance (comp_name,fy_revenue,
    sy_revenue,
    ty_revenue,
    ly_revenue,
    fy_income,
    sy_income,
    ty_income,
    ly_income
    ) VALUES ('{$combinedData['companyName']}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";

// Executing the query
if ($conn->query($sql) === TRUE) {
    // Insert finance data after successful insertion into the add_listing table
    if ($conn->query($sql_finance) === TRUE) {
        // Clear session data after processing
        sendVerificationEmail($companyEmail, $verificationCode,$compName,$firstname,$lastname);
        unset($_SESSION['part1_data']);

        // Redirect to thankyou.php
        echo '<script type="text/javascript">window.location.href = "thankyou.php";</script>';
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        echo "Error inserting finance data: " . $conn->error;
    }
} else {
    echo "Error inserting data into add_listing table: " . $conn->error;
}

// Closing the connection
$conn->close();

function sendVerificationEmail($email, $verificationCode,$compName,$firstname,$lastname) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
       
        $mail->isSMTP();
        $mail->Host       = 'mail.thevoltbridge.com'; // Set your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sanket@thevoltbridge.com'; // SMTP username
        $mail->Password   = 'Sanket@123'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Port       = 465;
        // $mail->SMTPDebug  = 2; 
        // Recipients
        $mail->setFrom('sanket@thevoltbridge.com', 'Voltbridge');
        $mail->addAddress($email);
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body = '

            Dear ' . $firstname . ' ' . $lastname . ',
                
            Thank you for registering with VoltBridge! To complete your registration and verify your email address, please click the link below:
            
            <a href="https://testing.thevoltbridge.com/verify.php?code=' . $verificationCode . '&email=' . $email .  '&compName='.$compName.'">Verify Email</a>
            
            This verification link will expire in 24 hours. If you did not sign up for an account with VoltBridge, please ignore this email or contact our support team if you have any questions.
            
            If you’re having trouble with the button above, copy and paste the URL below into your web browser:
            
            https://testing.thevoltbridge.com/verify.php?code=' . $verificationCode . '&email=' . $email . '&compName='.$compName.'
            
            Thank you for choosing VoltBridge!
            
            Kind regards,
            VoltBridge';


        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
