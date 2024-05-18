<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('dbcon.php');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendOTP($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        // $mail->isSMTP();
        // $mail->Host       = 'smtp.gmail.com'; // Set your SMTP server
        // $mail->SMTPAuth   = true;
        // $mail->Username   = 'sanketlipne2497@gmail.com'; // SMTP username
        // $mail->Password   = 'fyrc exoc cdqo qpnc'; // SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        // $mail->Port       = 465;
        // $mail->SMTPDebug  = 2; 

        // // Recipients
        // $mail->setFrom('your-email@example.com', 'Your Name');
        // $mail->addAddress($email);

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
        $mail->Subject = 'Your OTP for Registration';
        $mail->Body    = 'Your OTP is: ' . $otp;

        session_start();
        $_SESSION['generated_otp'] = $otp;

        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $email = $_GET['email'];
    $otp = generateRandomOTP(); // You need to define this function to generate a random OTP

    sendOTP($email, $otp);
 
      
  
} else {
    echo "Invalid request method";
}

function generateRandomOTP() {
    // Implement your OTP generation logic here
    // Example: return substr(md5(uniqid(mt_rand(), true)), 0, 6);
    $otp = rand(100000, 999999);
    return $otp;
}
?>
