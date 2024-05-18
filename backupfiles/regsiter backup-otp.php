<?php
$error = "";
error_reporting(E_ALL);
ini_set('display_errors', '1');

require('dbcon.php');
require 'vendor/autoload.php';  // Load Composer's autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Function to send email with OTP using PHPMailer
function sendOtpEmail($to, $otp) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                        // Send using SMTP
        $mail->Host = 'smtp.gmail.com';        // Set the SMTP server to send through (Replace with your SMTP server)
        $mail->SMTPAuth = true;                 // Enable SMTP authentication
        $mail->Username = 'sanketlipne2497@gmail.com';  // SMTP username (Replace with your SMTP username)
        $mail->Password = 'fyrc exoc cdqo qpnc';         // SMTP password (Replace with your SMTP password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
        $mail->Port = 465;                      // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Recipients
        $mail->setFrom('sanketlipne2497@gmail.com', 'sanket@thevoltbridge.com');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Registration';
        $mail->Body = 'Your One-Time Password (OTP) is: ' . $otp;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data if the form is submitted
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : "";
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $companyName = isset($_POST['companyName']) ? $_POST['companyName'] : "";
    $country = isset($_POST['country']) ? $_POST['country'] : "";

    // Password validation
    $passwordPattern = '/^(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{8,15}$/';

    if (!preg_match($passwordPattern, $password)) {
        $error = "Password must contain at least 1 capital letter, 1 number, 1 special character, and be 8-15 characters long.";
    }

    // Your existing database connection code here...
    if (empty($error)) {
        // SQL query to check if email or company name already exists
        $checkEmailQuery = "SELECT * FROM userdata WHERE email='$email'";
        $checkCompanyQuery = "SELECT * FROM userdata WHERE comp_name='$companyName'";

        $emailResult = $conn->query($checkEmailQuery);
        $companyResult = $conn->query($checkCompanyQuery);

        if ($emailResult->num_rows > 0) {
            // Email is already registered
            $error = "Email-address is already registered, please login or try again with a different email-address";
        } elseif ($companyResult->num_rows > 0) {
            // Company name is already registered
            $error = "Company with this name is already registered please login or register a new company";
        } else {
            // Generate OTP
            $otp = mt_rand(100000, 999999);

            // Send OTP via email
            $emailSent = sendOtpEmail($email, $otp);

            if ($emailSent) {
                // Display OTP input field in the form
                echo '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>User Registration Form</title>
                            <style>
                                /* Add your styles here */
                            </style>
                        </head>
                        <body>
                            <form id="registrationForm" action="" method="POST">
                                <div class="form-group">
                                    <label for="otp">Enter OTP:</label>
                                    <input type="text" id="otp" name="otp" required>
                                </div>
                                <div class="form-group submit-button">
                                    <input type="button" value="Submit" onclick="verifyOTP()">
                                </div>
                            </form>

                            <script>
                                // JavaScript function to prompt user for OTP
                                function verifyOTP() {
                                    var enteredOTP = prompt("Enter the OTP sent to your email:");

                                    // Check if the entered OTP matches the generated OTP
                                    if (enteredOTP === "' . $otp . '") {
                                        // If OTP is verified, submit the form
                                        document.getElementById("registrationForm").submit();
                                    } else {
                                        // If OTP is not verified, show an error message
                                        alert("Invalid OTP. Please try again.");
                                    }
                                }
                            </script>
                        </body>
                        </html>';
            } else {
                $error = "Error sending the OTP. Please try again.";
            }
        }
    }
}

// Check if the form is submitted with the OTP field
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['otp'])) {
    // Retrieve form data
    $otpEntered = isset($_POST['otp']) ? $_POST['otp'] : "";
    $generatedOtp = $otp; // Get the generated OTP from the previous step

    // Check if the entered OTP matches the stored OTP
    if ($generatedOtp == $otpEntered) {
        // Proceed with the rest of the registration logic
        $sql = "INSERT INTO userdata (first_name, last_name, email, password, comp_name, country)
                VALUES ('$firstName', '$lastName', '$email', '$password', '$companyName', '$country')";

        // Check if the query was successful
        if ($conn->query($sql) === TRUE) {
            header("Location: add_listing.php?companyName=$companyName");
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $error = "Invalid OTP. Please try again.";
    }
}

// Close the database connection
$conn->close();
?>





 






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <title>User Registration Form</title>

    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
     /* background-image: url("B2B_bg.jpg");  */
     background-size: cover ;
    background-color:whitesmoke;
    background-size: cover; 
    color: #333;
    /* max-width:3000px; */
 }

 .navbar {
    
    display: flex;
    justify-content: space-between;
    align-items: center;
    /* padding: 20px; */
    background-color: #2F4F4F; /* Updated background color for the navbar */
    color: #D3D3D3; /* Updated text color for the navbar */
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    position: fixed;
    top: 0;
    width: 100%; /* Set the width to 100% */
    z-index: 1000; /* Ensure the navbar is on top of other elements */
    /* height: 500px; */
 }

 .nav__logo {
    font-size: 24px;
    font-weight: bold;
    text-decoration: none; /* Remove underline from the brand */
    color: #141E12; /* Adjust color for the brand */
    margin-bottom: 15px;
 }

 .white-text {
    color: white;
    margin-top: 15px;
}

.green-text {
    color: #00FF7F;
    margin-top: 15px;
}
 .navbar-links a {
    margin-right: 20px;
    text-decoration: none;
    color: #D3D3D3;
    padding: 8px 15px;
    border-radius: 5px;
    background-color: #228B22; /* Background color for the links */
 }

 .navbar-links a:hover {
    background-color: #fff; /* Change background color to white on hover */
    color: #000; /* Change text color to black on hover */
    text-decoration: none;
    box-shadow: 0 0 10px rgba(0, 128, 0, 0.5);
 }

 .fixed-navbar {
    position: fixed;
    top: 0;
    width: 100%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

button {
            padding: 5px 15px;
            font-size: 16px;
            font-weight: bold;
            /*background-color: #26EA49;
            border: 2px solid black;*/
            border-radius: 5px;
            cursor: pointer;
            transition: box-shadow 0.3s;
            background: var(--dark-black); /* Change to orange */
            color: var(--white); /* Text color black */
        }

        /* Add hover effect */
        button:hover {
            box-shadow: 0 4px 8px rgba(0, 128, 0, 0.6);
        }

        .link-buttons{
            display:flex;
            background: var(--dark-black); /* Change to orange */
            color: var(--white); /* Text color black */
        }

        .link-buttons:hover{
            background: DarkGreen; /* Change hover background to orange */
            color: white;
        }

        /* FORM STYLE */
        #registration-form {
            margin-top: 200px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 40%;
            margin-left: auto;
            margin-right: auto;
            border: 5px solid whitesmoke;
            padding: 15px;
            background-color:white;
            float: right;
            margin-right:200px;
        }

        .form-group {
            width: 48%;
            margin-bottom: 10px;
            display: inline-block;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 20%;
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            color: white;
            background-color: #28a745;
            border-radius: 5px;
            transition: box-shadow 0.3s;
            border-color: #28a745;
            
        }

        input[type="submit"]:hover {
            box-shadow: 0 4px 8px rgba(0, 128, 0, 0.6);
            background: #114d1e; /* Change hover background to orange */
            color: white;
            border-color: #218838;
        }
        .form-group.submit-button {
            text-align: center;
            width: 100%;
        }
        .overview-flex__img{
            float: left;
            margin-left: 150px;
            margin-top: 150px;
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
    <script>
    // JavaScript function to prompt user for OTP
    function verifyOTP() {
        var enteredOTP = prompt("Enter the OTP sent to your email:");

        // Check if the entered OTP matches the generated OTP
        if (enteredOTP === '<?php echo $otp; ?>') {
            // If OTP is verified, set the entered OTP to the hidden field and submit the form
            document.getElementById("otp").value = enteredOTP;
            document.getElementById("registrationForm").submit();
        } else {
            // If OTP is not verified, show an error message
            alert("Invalid OTP. Please try again.");
        }
    }
</script>
</head>
<body>
    <section>
    <div class="navbar" style="position: fixed;
    top: 0;
    left:0; 
    width: 100%;
   
    height:70px">
       <a href="index.php" class="nav__logo">
        <img style="margin-top:10px; margin-left:15px" src="./images/logo.png" alt="Logo | VoltBridge" class="nav__logo-white" height="50" width="40">
        <span class="white-text";color="white" style="margin-bottom:50px;">Volt </span><span class="green-text" style="margin-bottom:15px;" color="green";>Bridge</span>
       </a>
        <div class="link-buttons">
        <div class="navbar-links">
            <a href="index.php">Home</a>
        </div>
        <div class="navbar-links">
            <a href="login.php">Login</a>
        </div>
        </div>
        
</div>

</section>

    <!-- FORM STARTS -->

    <div id="registration-form">
    <h2>Start your B2B journey with few simple steps..</h2>
    <form id="registrationForm" action="register.php" method="POST">
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>
        </div>

        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        
        <div class="form-group">
            <label for="password">Password:</label> 
             
            <input type="password" id="password" name="password" required>
            
        </div>

        
       

        
        
   

        <div class="form-group">
        <label for="companyName">Company Name:</label>
        <input type="text" id="companyName" name="companyName" required>
    </div>


        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" required>
        </div>

        <input type="hidden" id="otp" name="otp">

        <div class="form-group submit-button">
        <input type="button" value="Verify OTP" onclick="verifyOTP()">
     </div>
    </form>

    <div style="width:100%"  class="message-block" style="display: <?php echo $error ? 'block' : 'none'; ?>;">
    <p class="error-message"><?php echo $error; ?></p>
</div>
    
    </div>
    <div class="overview-flex__img">
        <img src="./images/getstarted2.jpg" alt="" height=600px width=400px>
    </div>

  



    <!-- Store valuesss -->

<div style="width: 1600px; position:absolute; bottom:0; right:0; left:0; top:800px;">
    <?php
include 'footer.php';
?>
</div>

   

</body>
</html>
