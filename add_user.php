<?php
require('dbcon.php');
$error = "";
session_start(); 

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (!isset($_SESSION["comp_name"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

$comp_name = $_SESSION["comp_name"];
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email is set and not empty
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];

        $query = "SELECT * FROM userdata WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // If the email already exists, display an error
            $error = "Email already exists. Please choose a different email.";
        } else {

        // Define your secret key for encryption
        $secret_key = "voltbridge"; // Change this to your secret key

        // Encrypt email and company name
        $encrypted_email = openssl_encrypt($email, 'aes-256-cbc', $secret_key, 0, '1234567890123456'); // Change the initialization vector (IV) as needed
        $encrypted_comp_name = openssl_encrypt($comp_name, 'aes-256-cbc', $secret_key, 0, '1234567890123456'); // Change the initialization vector (IV) as needed

        // Send verification email
        sendVerificationEmail($email, $user_first_name, $user_last_name, $comp_name, $encrypted_email, $encrypted_comp_name);
        }
    } else {
        $error = "Email is required.";
    }
}

function sendVerificationEmail($email, $user_first_name, $user_last_name, $comp_name, $encrypted_email, $encrypted_comp_name) {
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
        $mail->setFrom('sanket@thevoltbridge.com', 'Voltbridge');
        $mail->addAddress($email);
        
        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body = '
            Hello ,
                
            You have been added as a user on Voltbridge platform by '. $user_first_name .' ' . $user_last_name .' please complete the registration  for your account by clicking on the following link
            
            <a href="testing.thevoltbridge.com/add_user_registration.php?email=' . urlencode($encrypted_email) . '&comp_name=' . urlencode($encrypted_comp_name) .'">Complete registration</a>
            
            This verification link will expire in 24 hours. If you did  not wish to  sign up for an account with VoltBridge, please ignore this email or contact our support team if you have any questions.
            
            Thank you for choosing VoltBridge!
            
            Kind regards,
            VoltBridge';

        $mail->send();
        echo "<script>alert('registration email sent successfully.')</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

      <!--=============== REMIXICONS for navbar styling ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="suppnav.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="index_hero.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <!-- <link rel="stylesheet" href="style2.css"> -->
    <link rel="stylesheet" href="register2.css">
  
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet"> -->
    <script defer src="app.js"></script>
    <!--Link to jQuery CDN (this runs the entire function)-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--Bootstrap 4.1 CDN for button and container-->


</head>
<body>
    <title style="color: black;">VoltBridge</title>
<style>
    .body{
        min-height: 100vh!important;
    }
     .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

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
</style>
            


 <div>
   <!-- navbar styling code in navbar_resp.css and script in navbar_resp.js - these files linked in index.php, 
       navbar_resp.php contains whole html code for navbar, saved as backup. -->

       <!-- navbar header is being called from headernav.php in assets folder. -->
<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."suppnav.php"); ?>
</div>

  <!----------------------- Main Container -------------------------->

<div class="container d-flex justify-content-center align-items-center " style="min-height: 95vh;">

    <!-- -------------------------left right containers----------------------- -->
        
   <div class="row">

    <!-- ------------------------------------------------------------- -->

    <!-- <div class="col-lg-4">
        <div class="row border rounded-5 p-3 shadow box bg-white">

            <div class="featured-image">
              <div class="row">
                <img src="./images/vbsteph1w.png" alt="" class="img-fluid rounded-circle" style="max-width: 100%;">
                    
              </div>
           </div> 
    
        </div>
    </div> -->
    
    <!-- ---------------------spacing betn to cards--------------------------- -->

    <div class="col-lg-1">
    </div>

    <!-- -----------------------right card------------------------- -->

    <div class="col-lg-7">
        
    <!----------------------- content-------------------------->
    <div class="row border rounded-5 p-1 bg-light shadow box-area" >

        <div class="col-lg-12 col-sm-10 right-box">
          <div class="row">
                <div class="header-text mb-4">
                     <h3 style="text-align: center;">Welcome to <strong><a class="navbar-brand" href="#">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong></h3>
                     <p style="text-align: center;">Elevate your B2B presence and fuel business growth online.</p>
                     <hr class="my-4" style="border-color: #020000;">
                     <h4 style="color: grey;"> Enter the mail you want to invite</h4>

                </div>
            </div>

            <div id="registration-form">

            <form  action="add_user.php" method="POST">
            <div class="row">
                
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control bg-light" id="email" name="email" placeholder="Email" required>
                    </div>
                </div>

            </div>

                
                </div>
            </div>

            
        <div class="input-group mb-3" style="justify-content:center">
            <button class="btn btn-lg btn-success fs-6" style=" width: 20rem;" type="submit">Send Invitation</button>
        </div>
                <a style="color:#228b22;" class="btn btn-default" href="suppliardashboard.php">Dashboard</a>


        </form>
    </div>
        
        

        <!-- for message block in original file -->
        <div style="width:100%"  class="message-block" style="display: <?php echo $error ? 'block' : 'none'; ?>;">
            <p class="error-message"><?php echo $error; ?></p>
        </div>

       </div> 

    </div>

    </div>
   </div>
    

</div>


<script>
    // Use noConflict mode to avoid conflicts with other libraries
    $.noConflict();

    jQuery(document).ready(function ($) {
        // Initialize Select2
        $('#countryCode').select2();

        // Handle search functionality
        $('#countryCode').on('select2:open', function (e) {
            $('.select2-search__field').attr('placeholder', 'Search...');
            $('.select2-search__field').attr('aria-controls', 'countryCode');
        });
    });
</script>
   

</body>
</html>