<?php
include 'dbcon.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $comp_name = $_POST['comp_name'];

    // Query to retrieve email addresses based on company name
    $sql = "SELECT email FROM userdata WHERE comp_name = '$comp_name'";

    // Execute the query
    $result = $conn->query($sql);

    if ($result === false) {
        // Query execution failed
        echo "Error: " . $conn->error;
    } else {
        // Query executed successfully
        if ($result->num_rows > 0) {
            // Instantiate PHPMailer
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'mail.thevoltbridge.com';  // Specify SMTP server
                $mail->SMTPAuth   = true;                 // Enable SMTP authentication
                $mail->Username   = 'sanket@thevoltbridge.com';   // SMTP username
                $mail->Password   = 'Sanket@123';       // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                // Enable TLS encryption
                $mail->Port       = 465;                  // TCP port to connect to

                //Recipients
                $mail->setFrom('sanket@thevoltbridge.com', 'Voltbridge');

                // Fetch and add email addresses as recipients
                while ($row = $result->fetch_assoc()) {
                    $mail->addAddress($row['email']); // Recipient's email
                }

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Query from customer';
                $mail->Body    = "Name: $fullname<br>Email: $email<br>Phone: $phone<br>Message: $message";

                // Send email
                $mail->send();
                echo "<script>alert('You Query has been sent')</script>";
                echo "<script>window.location.href = 'http://testing.thevoltbridge.com/newpage.php?company=" . $comp_name . "';</script>";
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            // No matching records found
            echo "No records found for the given company name: $comp_name";
        }
    }
} else {
    // Redirect to form page if accessed directly
    echo "<script>window.location.href = 'http://testing.thevoltbridge.com/newpage.php?company=" . $comp_name . "';</script>";
    exit();
}
?>
