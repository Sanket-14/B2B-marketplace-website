<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('dbcon.php');
// $error = "";
session_start();

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        sendQueryEmail($email, $fullname, $phone, $message);
    } else {
        echo "<script>alert('Invalid email format.')</script>";
    }
}

function sendQueryEmail($email, $fullname, $phone, $message)
{
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

        // Recipients
        $mail->setFrom('sanket@thevoltbridge.com', 'VoltBridge Contact');
        $mail->addAddress('admin@thevoltbridge.com');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Contact Us - User Query';
        $mail->Body    = 'Name: ' . $fullname . '<br>Phone: ' . $phone .'<br>Email: ' . $email . '<br><br>Message: ' . $message;

        $mail->send();
        echo "<script>alert('Query submitted successfully');</script>";
        echo "<script>window.location.href='contact_us.php';</script>";

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "<script>window.location.href='contact_us.php';</script>";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/final footer/index_footer.css">
    <link rel="stylesheet" href="./assets/php/loginnav_bs.css">
    <title>VoltBridge</title>
    <style>
    .profile-circle {
  display: flex;
  align-items: center;
  /* width: auto; */
}

.profile-image {
    width: 50px;
    height: 50px;
    background-color: #23d375;
    color: #fff;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 20px; 
    border: 2px solid green;

}
        /* Your CSS styles go here */
        @media screen and (max-width: 640px) {
            .container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin: 20px auto;
                position: relative;
                z-index: 2;
                width: 95%;
                top: 1.5rem;
                min-height: calc(100vh - 3.5rem);
            }
            .hero {
                background-image: url('background_image.jpg');
                background-size: cover;
                padding: 20px 0;
                color: #fff;
                width: 100%;
                min-height: calc(100vh - 3.5rem);
                position: relative;
                top: 3.5em;
                left: 0;
            }
            .hero::after {
                content: '';
                position: absolute;
                top: 0.65rem;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
                z-index: 1;
            }
            .contact-info {
                width: 70%;
                padding: 5px;
            }
            .section.contact-form {
                width: 100%;
            }
            .contact-details {
                margin-top: 20px;
            }
            .contact-item {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }
            .contact-item img {
                margin-right: 10px;
                width: 20px;
                height: 20px;
            }
            .contact-form h2 {
                margin-bottom: 20px;
            }
            .contact-form label {
                display: block;
                margin-bottom: 5px;
            }
            .contact-form input,
            .contact-form textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            .contact-form textarea {
                resize: vertical;
            }
            .contact-form button {
                background-color: #42D787;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }
            .contact-form button:hover {
                background-color: darkgreen;
            }
            body {
                background-image: url('images/home6.png');
            }

            footer{
                position: relative;
            }
        }



        @media screen and (min-width: 640px) {
            .hero {
                background-image: url('background_image.jpg');
                background-size: cover;
                padding: 20px 0;
                color: #fff;
                width: 100%;
                min-height: calc(100vh - 3.5rem);
                position: relative;
                top: 3.5em;
                left: 0;
            }
            .hero::after {
                content: '';
                position: absolute;
                top: 0.65rem;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
                z-index: 1;
            }
            .container {
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                margin: 20px auto;
                position: relative;
                z-index: 2;
                width: 100%;
                top: 1.5rem;
                height: calc(100vh - 10rem);
            }
            .contact-info {
                width: 35%;
                padding: 5px;
                box-sizing: border-box;
            }
            .section.contact-form {
                width: 75rem;
            }
            .contact-details {
                margin-top: 20px;
            }
            .contact-item {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }
            .contact-item img {
                margin-right: 10px;
                width: 20px;
                height: 20px;
            }
            .contact-form h2 {
                margin-bottom: 20px;
            }
            .contact-form label {
                display: block;
                margin-bottom: 5px;
            }
            .contact-form input,
            .contact-form textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }
            .contact-form textarea {
                resize: vertical;
            }
            .contact-form button {
                background-color: #42D787;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }
            .contact-form button:hover {
                background-color: darkgreen;
            }
            body {
                background-image: url('images/home6.png');
            }
        }
    </style>
</head>
<body>
    <div>
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/php/";
        include($IPATH . "loginnav_bs.php"); ?>
    </div>
    <div class="hero fadeFromTop">
        <div class="container">
            <section class="contact-info">
                <h1>Contact Us</h1>
                <p style="color: lightgreen; text-align: left;">Have a question or a concern for us? Fill out the form and wait for us to contact you about it! Our team is also happy to hear from you!</p>
                <div class="contact-details">
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                        </svg>
                        <p style="margin-left:10px;">info@thevoltbridge.com</p>
                    </div>
                    <div class="contact-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <p style="margin-left:10px;">Pune, India</p>
                    </div>
                </div>
            </section>
            <section class="contact-form">
                <form action="contact_us.php" method="POST">
                    <h2></h2>
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="6" placeholder="Message" required></textarea>
                    <button type="submit">Submit</button>
                </form>
            </section>
        </div>
    </div>
    <footer>
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/final footer/";
        include($IPATH . "index_footer.php"); ?>
    </footer>
</body>
</html>
