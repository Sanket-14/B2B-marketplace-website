<?php
require('dbcon.php');
session_start();
require 'vendor/autoload.php'; // Include PHPMailer autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted email from the form
    $resetEmail = $_POST["resetEmail"];
    $_SESSION['resetEmail'] = $resetEmail;

    // Generate a unique token (you may use a library like random_bytes)
    $resetToken = bin2hex(random_bytes(32));
    $_SESSION['resetToken'] = $resetToken;

    // Your code to update the user's record with the reset token in the database
    // Example: $db->updateResetToken($resetEmail, $resetToken);

    // SQL query to update fp_token in userdata table
    $updateTokenQuery = "UPDATE userdata SET fp_token = '$resetToken' WHERE email = '$resetEmail'";

    if ($conn->query($updateTokenQuery) === TRUE) {
        // Send the reset email
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

            // Sender information
            $mail->setFrom('sanket@thevoltbridge.com', 'Voltbridge');

            // Recipient
            $mail->addAddress($resetEmail);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset';
            $mail->Body = "Hello,

            You recently requested to reset your password for your account. To update your password, please click the link below:

            <a href='http://testing.thevoltbridge.com/change_password.php?email=$resetEmail&token=$resetToken'>Reset Password</a>

            This password reset link will expire in 24 hours. If you did not request a password reset, please ignore this email or contact our support team if you have any questions.

            If you’re having trouble with the button above, copy and paste the URL below into your web browser:

            http://testing.thevoltbridge.com/change_password.php?email=$resetEmail&token=$resetToken

            Thank you for using VoltBridge!

            Best regards,
            VoltBridge";


            $mail->send();
            $_SESSION['resetEmailSent'] = true;
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error updating reset token: " . $conn->error;
    }

    // Closing the connection
    $conn->close();
}
?>


<!-- $mail->Body = '

            Dear ' . $firstname . ' ' . $lastname . ',
                
            You recently requested to reset your password for your username@gmail.com account. To update your password, please click the link below:
            
            <a href="https://testing.thevoltbridge.com/verify.php?code=' . $verificationCode . '&email=' . $email . '">Reset password</a>
            
            This password reset link will expire in 24 hours. If you did not request a password reset, please ignore this email or contact our support team if you have any questions.
            
            If you’re having trouble with the button above, copy and paste the URL below into your web browser:
            
            https://testing.thevoltbridge.com/verify.php?code=' . $verificationCode . '&email=' . $email . '
            
            Thank you for using VoltBridge!
            
            Kind regards,
            VoltBridge'; -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/php/loginnav_bs.css">
    <link rel="stylesheet" href="assets/final footer/index_footer.css">
    <link rel="stylesheet" href="./password_reset.css">

    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <title>reset password link</title>
    <style>
       
        .message-block {
            display: <?php echo $error ? 'block' : 'none'; ?>;
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
            clear: both;
        }
        .overview-flex__img{
            margin-left:80px;
        } */



        .notification {
            background-color: #28a745;
            color: #fff;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin-top: 20px;
            clear: both;
            /* display: none; */
            animation: fadeInOut 4s ease-in-out;
            /* Add a fade-in-out animation */
        }

        @keyframes fadeInOut {

            0%,
            100% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }
        }
    </style>





</head>

<body>
    <!-- navbar -->
    <!-- <nav class="navbar navbar-default navbar-expand-lg shadow navbar-light" style="height: 3.5rem;">
        <div class="container-fluid">
          <div class="navbar-header">
            <img src="./images/vblogo.jpg" style="width: 17px; height: auto; margin-left: 15px; margin-bottom: 10px;">
            <strong><a class="navbar-brand" href="#">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong>
          </div>
        </div>
    </nav>
    -->


    <div>
        <!-- navbar styling code in navbar_resp.css and script in navbar_resp.js - these files linked in index.php, 
       navbar_resp.php contains whole html code for navbar, saved as backup. -->

        <!-- navbar header is being called from headernav.php in assets folder. -->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/php/";
        include($IPATH . "loginnav_bs.php"); ?>
    </div>


    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center main-container " style="min-height: 95vh;">


        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #ffffff;">
                <div class="featured-image mb-3">
                    <img src="./images/resetpass3.jpg" class="img-fluid">
                </div>
                <!-- <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">B2B Platform</p> -->
                <!-- <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join on this platform.</small> -->
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">

                    <div class="header-text mb-4">
                        <h2>Reset your Password!</h2>
                        <p>Enter your registered Email address to receive password reset link.</p>
                    </div>

                    <form method="POST" action="password_reset.php" class="password-reset-form">
                        <div class="input-group mb-3">
                            <input type="email" id="resetEmail" name="resetEmail" class="form-control form-control-lg bg-light fs-6" placeholder="Email address" required>
                        </div>

                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-success w-100 fs-6" type="submit" id="resetPasswordBtn">Send Email</button>
                        </div>
                    </form>

                      <div class="row">
                        <!-- conditional redirect based on url name -->
                        <small>Back to <a href="<?php echo isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'buyer_login.php') !== false ? './buyer_login.php' : './login.php'; ?>">Login</a></small>
                    <!-- <small>Back to <a href="./login.php">Login</a></small> -->
                    </div>


                    <?php
                    // Check if the reset email has been sent successfully
                    if (isset($_SESSION['resetEmailSent']) && $_SESSION['resetEmailSent']) {
                        echo '<div class="notification">A link for resetting your password has been sent to your registered email! Please check your mailbox.</div>';
                        // Unset the session variable to prevent showing the notification on subsequent visits to the page
                        unset($_SESSION['resetEmailSent']);
                    }
                    ?>

                </div>
            </div>

        </div>
    </div>



    <!-- Add this script section at the end of your HTML body -->
    <script>
        // Function to show loading spinner and redirect to login.php
        function showLoadingAndRedirect() {
            var notification = document.querySelector('.notification');

            // Check if the notification element exists
            if (notification) {
                // Create a loading spinner element
                var loadingSpinner = document.createElement('div');
                loadingSpinner.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
                loadingSpinner.style.color = '#555';
                loadingSpinner.style.marginRight = '5px';

                // Create a message indicating redirection
                var redirectingMessage = document.createElement('div');
                redirectingMessage.innerHTML = 'Redirecting back to login...';
                redirectingMessage.style.color = 'black';
                redirectingMessage.style.marginTop = '10px';

                // Append the loading spinner and message to the notification element
                notification.innerHTML = ''; // Clear existing content
                notification.appendChild(loadingSpinner);
                notification.appendChild(redirectingMessage);

                // Redirect to login.php after 2 seconds (2000 milliseconds)
                setTimeout(function() {
                    window.location.href = '<?php echo isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'buyer_login.php') !== false ? './buyer_login.php' : './login.php'; ?>';
                    // window.location.href = 'login.php';
                }, 2000);
            }
        }

        // Call the function after 5 seconds (5000 milliseconds)
        setTimeout(showLoadingAndRedirect, 2000);
    </script>





    <div>
        <!-- footer styling code in index_footer.css . -->
        <!-- footer is being called from index_footer.php in assets folder. -->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/final footer/";
        include($IPATH . "index_footer.php"); ?>
    </div>






</body>




</html>