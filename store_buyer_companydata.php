<?php
require('dbcon.php');

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $companyName = $_POST["companyName"];
    $buyerAddress = $_POST["buyer_address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $pincode = $_POST["contactno"];
    $countryRegistration = $_POST["countryRegistration"];
    $companyWebsite = $_POST["companyWebsite"];
    $companyType = $_POST["company_type"];

    // Handle logo upload
    $logoFileName = ""; // Initialize variable to store logo file name
    if(isset($_FILES["logo"]) && $_FILES["logo"]["error"] == UPLOAD_ERR_OK) {
        // Define upload directory
        $uploadDirectory = "buyer_company_logo/";

        // Generate a unique name for the uploaded logo
        $logoFileName = uniqid("logo_") . "_" . basename($_FILES["logo"]["name"]);

        // Move the uploaded logo to the upload directory
        move_uploaded_file($_FILES["logo"]["tmp_name"], $uploadDirectory . $logoFileName);
    }

    // Store form data in database or perform other actions
    // Here you can write code to store the form data and the generated logo file name in your database
    
    // Example code to insert data into a database


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement
    $sql = "INSERT INTO buyer_company_data (buyer_comp_name, buyer_address, buyer_city, buyer_state, buyer_pincode, buyer_country, buyer_company_website, buyer_company_type, buyer_company_logo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $companyName, $buyerAddress, $city, $state, $pincode, $countryRegistration, $companyWebsite, $companyType, $logoFileName);

    // Execute the statement
    $stmt->execute();
    $getemail = "SELECT buyer_email FROM buyer_userdata WHERE buyer_comp_name = ?";
    $stmtemail = $conn->prepare($getemail);
    
    // Bind the parameter
    $stmtemail->bind_param('s', $companyName);
    
    // Execute the statement
    $stmtemail->execute();
    
    // Get the result set
    $result = $stmtemail->get_result();

// Loop through the results to access each email
foreach ($result as $row) {
    $email = $row['buyer_email'];
    // Do whatever you need to do with the email, such as echoing it or storing it in an array
    // echo $email . "<br>";
}

    // Close connection
    $stmt->close();
    $conn->close();

    sendVerificationEmail($email);

    // Redirect to a success page or display a success message
    header("Location: thankyou.php");
    exit();
}

function sendVerificationEmail($email) {
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
        $mail->SMTPDebug  = 2; 
        // Recipients
        $mail->setFrom('sanket@thevoltbridge.com', 'Voltbridge');
        $mail->addAddress($email);
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body = '

          
                
            Thank you for registering with VoltBridge! To complete your registration and verify your email address, please click the link below:
            
            Thank you for choosing VoltBridge!
            
            Kind regards,
            VoltBridge';


        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
