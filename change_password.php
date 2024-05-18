<?php
session_start();

require('dbcon.php');

// Check the token from the URL
$resetTokenFromURL = $_GET['token'];

// Retrieve the email from the URL
$resetEmail = $_GET['email'];

// Connect to the database
// $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to check if the fp_token from userdata matches the one in the URL
$checkTokenQuery = "SELECT email FROM userdata WHERE fp_token = '$resetTokenFromURL'";

$result = $conn->query($checkTokenQuery);

if ($result->num_rows > 0) {
    // The tokens match, proceed with the HTML form
} else {
    // The tokens don't match, show an error message and exit
    echo '<script>alert("Invalid user.");</script>';
    exit();
}

// Continue with the HTML form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }


        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-bottom: 20px;
        }

        .login-container h2 {
            text-align: center;
            color: #333;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            margin-bottom: 5px;
            color: #333; /* Darker label color */
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            margin-top: 10px;
            cursor: pointer;
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 5px;
            transition: box-shadow 0.3s;
            color: white;
        }
        .form-group button:hover{
            background-color: #114d1e;
            border-color: #218838;
            color:white;
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
        .overview-flex__img{
            margin-left:80px;
        }


        
    .notification {
        background-color: #28a745;
        color: #fff;
        padding: 15px;
        border-radius: 8px;
        text-align: center;
        margin-top: 20px;
        clear: both;
        /* display: none; */
        animation: fadeInOut 2s ease-in-out; /* Add a fade-in-out animation */
    }

    @keyframes fadeInOut {
        0%, 100% {
            opacity: 0;
        }
        50% {
            opacity: 1;
        }
    }
    </style>

<body>
   
    <div class="container">
        <?php require('navbar.php'); ?>
        <div class="login-container">
            <h2>Forgot Password</h2>
           

            <form method="POST" action="reset_password.php" class="password-reset-form">
    <div class="form-group">
        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required>
    </div>
    <div class="form-group">
        <label for="confirmPassword">Re-enter Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" oninput="checkPasswordMatch()" required>
        <span id="passwordMatchError" style="color: red;"></span>
    </div>
    <input type="hidden" name="userEmail" value="<?php echo $_SESSION['resetEmail']; ?>">
    <input type="hidden" name="resetToken" value="<?php echo $_SESSION['resetToken']; ?>">
    <div class="form-group">
        <button type="submit" id="resetPasswordBtn" disabled>Reset Password</button>
    </div>
</form>
        </div>
        
    </div>
    <script>
    function checkPasswordMatch() {
        var newPassword = document.getElementById("newPassword").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var errorSpan = document.getElementById("passwordMatchError");
        var resetPasswordBtn = document.getElementById("resetPasswordBtn");

        if (newPassword === confirmPassword) {
            errorSpan.innerHTML = ""; // Clear the error message
            resetPasswordBtn.removeAttribute("disabled");
        } else {
            errorSpan.innerHTML = "Passwords do not match!";
            resetPasswordBtn.setAttribute("disabled", "disabled");
        }
    }
</script>

<div style="width: 1550px;">
<?php
include 'footer.php';
?>

</div>
</body>
</html>
