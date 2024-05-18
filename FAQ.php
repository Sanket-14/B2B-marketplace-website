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
        header("Location: index.php");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("Location: contact_us.php");
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
     <!--Bootstrap 4.1 CDN for button and container-->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/final footer/index_footer.css">
    <link rel="stylesheet" href="./assets/php/loginnav_bs.css">
    <title>VoltBridge</title>
    <style>
        /* Your CSS styles go here */
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
        @media screen and (max-width: 640px) {
            .container {
                display: grid;
                /* flex-direction: column; */
                justify-content: center;
                align-items: center;
                margin: 20px auto;
                position: relative;
                z-index: 2;
                width: 70%;
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
                top: .65rem;
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


            .accordion .accordion-item {
            border-bottom: 1px solid #e5e5e5;
        }

        .accordion .accordion-item button[aria-expanded='true'] {
            border-bottom: 1px solid #23D375FF;
        }

        .accordion button {
            position: relative;
            display: block;
            text-align: left;
            width: 100%;
            padding: 1em 0;
            color: #7288a2;
            font-size: 1.15rem;
            font-weight: 400;
            border: none;
            background: none;
            outline: none;
        }

        .accordion button:hover,
        .accordion button:focus {
            cursor: pointer;
            color: #23D375FF;
        }

        .accordion button:hover::after,
        .accordion button:focus::after {
            cursor: pointer;
            color: #23D375FF;
            border: 1px solid #23D375FF;
        }

        .accordion button .accordion-title {
            padding: 1em 1.5em 1em 0;
        }

        .accordion button .icon {
            display: inline-block;
            position: absolute;
            top: 18px;
            right: 0;
            width: 22px;
            height: 22px;
            border: 1px solid;
            border-radius: 22px;
        }

        .accordion button .icon::before {
            display: block;
            position: absolute;
            content: '';
            top: 9px;
            left: 5px;
            width: 10px;
            height: 2px;
            background: currentColor;
        }

        .accordion button .icon::after {
            display: block;
            position: absolute;
            content: '';
            top: 5px;
            left: 9px;
            width: 2px;
            height: 10px;
            background: currentColor;
        }

            .accordion button[aria-expanded='true'] {
            color: #23D375FF;
        }

        .accordion button[aria-expanded='true'] .icon::after {
            width: 0;
        }

        .accordion button[aria-expanded='true']+.accordion-content {
            opacity: 1;
            max-height: 15rem;
            /* to increase the height of the content on expand */
            transition: opacity 200ms linear, max-height 0s;
            /* Set transition duration for max-height to 0s */
            /* will-change: opacity, max-height; */
        }

        .accordion .accordion-content {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            /* transition: opacity 200ms linear, max-height 200ms linear; /* Keep the transition duration for opacity and max-height */
            /* will-change: opacity, max-height; */
        }

        .accordion .accordion-content p {
            font-size: 1rem;
            font-weight: 300;
            margin: 2em 0;
            text-align: left;
           
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
                top: 0.7rem;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
                z-index: 1;
            }
            .container {
                display: grid;
                justify-content: center;
                align-items: center;
                margin: 20px auto;
                position: relative;
                z-index: 2;
                width: 100%;
                top: 1.5rem;
                min-height: calc(100vh - 10rem);
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
                /* background-size: contain; */
                
            }

            .accordion .accordion-item {
            border-bottom: 1px solid #e5e5e5;
        }

        .accordion .accordion-item button[aria-expanded='true'] {
            border-bottom: 1px solid #23D375FF;
        }

        .accordion button {
            position: relative;
            display: block;
            text-align: left;
            width: 100%;
            padding: 1em 0;
            color: #7288a2;
            font-size: 1.15rem;
            font-weight: 400;
            border: none;
            background: none;
            outline: none;
        }

        .accordion button:hover,
        .accordion button:focus {
            cursor: pointer;
            color: #23D375FF;
        }

        .accordion button:hover::after,
        .accordion button:focus::after {
            cursor: pointer;
            color: #23D375FF;
            border: 1px solid #23D375FF;
        }

        .accordion button .accordion-title {
            padding: 1em 1.5em 1em 0;
        }

        .accordion button .icon {
            display: inline-block;
            position: absolute;
            top: 18px;
            right: 0;
            width: 22px;
            height: 22px;
            border: 1px solid;
            border-radius: 22px;
        }

        .accordion button .icon::before {
            display: block;
            position: absolute;
            content: '';
            top: 9px;
            left: 5px;
            width: 10px;
            height: 2px;
            background: currentColor;
        }

        .accordion button .icon::after {
            display: block;
            position: absolute;
            content: '';
            top: 5px;
            left: 9px;
            width: 2px;
            height: 10px;
            background: currentColor;
        }


            .accordion button[aria-expanded='true'] {
            color: #23D375FF;
        }

        .accordion button[aria-expanded='true'] .icon::after {
            width: 0;
        }

        .accordion button[aria-expanded='true']+.accordion-content {
            opacity: 1;
            max-height: 9em;
            transition: opacity 200ms linear, max-height 0s;
            /* Set transition duration for max-height to 0s */
            /* will-change: opacity, max-height; */
        }

        .accordion .accordion-content {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            /* transition: opacity 200ms linear, max-height 200ms linear; /* Keep the transition duration for opacity and max-height */
            /* will-change: opacity, max-height; */
        }

        .accordion .accordion-content p {
            font-size: 1rem;
            font-weight: 300;
            margin: 2em 0;
            text-align: left;
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

        <h2>Frequently Asked Questions</h2>
            <div class="accordion">
                <div class="accordion-item">
                    <button id="accordion-button-1" aria-expanded="false">
                        <span class="accordion-title">What is VoltBridge?</span>
                        <span class="icon" aria-hidden="true"></span>
                    </button>
                    <div class="accordion-content">
                        <p>
                            VoltBridge is a B2B marketplace that connects businesses to buy and sell products and services from each other.
                        </p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button id="accordion-button-2" aria-expanded="false">
                        <span class="accordion-title">Who can use VoltBridge?</span>
                        <span class="icon" aria-hidden="true"></span>
                    </button>
                    <div class="accordion-content">
                        <p>
                            VoltBridge is designed for businesses of all sizes. Whether you're a small startup or a large enterprise, you can use our platform to find new suppliers, customers, and partners.
                        </p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button id="accordion-button-3" aria-expanded="false">
                        <span class="accordion-title">How do I list my products or services on VoltBridge?</span>
                        <span class="icon" aria-hidden="true"></span>
                    </button>
                    <div class="accordion-content">
                        <p>
                            Once you have created an account, you can easily add your products or services to your VoltBridge profile. You can include detailed descriptions, photos, and pricing information.
                        </p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button id="accordion-button-4" aria-expanded="false">
                        <span class="accordion-title">How do I find what I'm looking for on VoltBridge?</span>
                        <span class="icon" aria-hidden="true"></span>
                    </button>
                    <div class="accordion-content">
                        <p>
                            You can use our powerful search bar to find specific products or services. You can also browse by category or industry.
                        </p>
                    </div>
                </div>
                <div class="accordion-item">
                    <button id="accordion-button-5" aria-expanded="false">
                        <span class="accordion-title">How do I contact a seller?</span>
                        <span class="icon" aria-hidden="true"></span>
                    </button>
                    <div class="accordion-content">
                        <p>
                            Once you have found a product or service that interests you, you can contact the seller directly through VoltBridge.
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>



    <script src="script.js"></script>
    <footer>
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/final footer/";
        include($IPATH . "index_footer.php"); ?>
    </footer>
</body>
</html>
