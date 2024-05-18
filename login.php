<?php
session_start();

require('dbcon.php');


$error = "";

// Connect to the database (replace placeholders with your actual database credentials)
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_COOKIE["remember_token"])) {
    // Get the token from the cookie
    $remember_token = $_COOKIE["remember_token"];

    // Query the database to check if the token exists
    $stmt = $conn->prepare("SELECT user_id, email, comp_name FROM userdata WHERE rm_token = ?");
    $stmt->bind_param("s", $remember_token);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the token exists, log in the user
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["user_email"] = $row["email"];
        $_SESSION["comp_name"] = $row["comp_name"];
        header("Location: suppliardashboard.php");
        exit();
    }
}



// Initialize $check_stmt
$check_stmt = null;

function generateUniqueToken()
{
    return bin2hex(random_bytes(32)); // Generates a 64-character hex string (32 bytes)
}

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT user_id, email, password, comp_name FROM userdata WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Use password_verify to check if the entered password matches the stored hashed password
        if (password_verify($password, $row['password'])) {
            // Password is correct, check if comp_name exists in Add_listing
            $comp_name = $row["comp_name"];

            // Initialize $check_stmt
            $check_stmt = $conn->prepare("SELECT comp_name FROM add_listing WHERE comp_name = ?");
            $check_stmt->bind_param("s", $comp_name);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();

            if ($check_result->num_rows > 0) {
                // comp_name exists in Add_listing, set session and redirect
                $_SESSION["user_id"] = $row["user_id"];
                $_SESSION["user_email"] = $row["email"];
                $_SESSION["comp_name"] = $row["comp_name"];



                // Check if "Remember Me" is checked
                if (isset($_POST["remember_me"])) {
                    // Generate a unique token (you should implement your own logic for this)
                    $token = generateUniqueToken();

                    // Set a cookie with the token
                    setcookie("remember_token", $token, time() + (86400 * 30), "/"); // Cookie valid for 30 days

                    // Save the token to the database or session for future validation if needed
                    // Example: $_SESSION["remember_token"] = $token;
                    $update_stmt = $conn->prepare("UPDATE userdata SET rm_token = ? WHERE email = ?");
                    $update_stmt->bind_param("ss", $token, $row["email"]);
                    $update_stmt->execute();
                    $update_stmt->close();
                }

                header("Location: suppliardashboard.php");
                exit();
            } else {
                $_SESSION["comp_name"] = $row["comp_name"];
                $error = "You have not completed company registration. Please complete and log in again.";
                // Add JavaScript for displaying the error message and redirecting
                echo '<script>';
                echo 'alert("' . $error . '");';
                echo 'window.location.href = "add_listing.php?companyName=' . urlencode($row["comp_name"]) . '";';
                echo '</script>';
                // exit();
            }
        } else {
            // Incorrect password
            $error = "Email address or password entered is incorrect. Please check your email address or password.";
        }
    } else {
        // User not found
        $error = "Email address or password entered is incorrect or not registered. Please check your email address or create a new user using this email!";
    }

    // Close the statements
    $stmt->close();
}

// Close $check_stmt only if it's not null
if ($check_stmt !== null) {
    $check_stmt->close();
}

// Close the database connection
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">

    <link rel="stylesheet" href="./login.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- nav and footer styling below. placed below bootstrap inorder to superimpose custom styling over bootstrap -->
    <link rel="stylesheet" href="assets/php/loginnav_bs.css">
    <link rel="stylesheet" href="assets/final footer/index_footer.css">


    <title>Login</title>
    <style>
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
</head>

<body>
    <!--<nav class="navbar navbar-default navbar-expand-lg shadow navbar-light" style="height: 3.5rem;">-->
    <!--        <div class="container-fluid">-->
    <!--          <div class="navbar-header">-->
    <!--            <img src="./images/vblogo.jpg" style="width: 17px; height: auto; margin-left: 15px; margin-bottom: 10px;">-->
    <!--            <strong><a class="navbar-brand" href="./index.php">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--    </nav>-->
    <!-- 
<nav class="navbar navbar-default navbar-expand-lg shadow navbar-light" style="height:74px;" >
        <div class="container-fluid d-flex align-items-center " >
        <div class="row align-items-center">
            <div class="col" style="padding: 0px 6px 0px 0px;">
                <img src="./images/vblogo.jpg" style="width: 30px; height: 38px; margin: 0px 0px 0px 40px;">
            </div>
            <div class="col" style="padding: 0px 0px 0px 0px;">
                <strong><a class="navbar-brand" href="./index.php" style="font-size: 24px; margin-top: 0px; margin-left:0px;">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong>
            </div>
        </div>
        </div>
</nav> -->

    <div>
        <!-- navbar styling code in navbar_resp.css and script in navbar_resp.js - these files linked in index.php, 
       navbar_resp.php contains whole html code for navbar, saved as backup. -->

        <!-- navbar header is being called from headernav.php in assets folder. -->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/php/";
        include($IPATH . "loginnav_bs.php"); ?>
    </div>


    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center main-container" style="min-height: 95vh;">


        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #ffffff;">
                <div class="featured-image mb-3">
                    <img src="./images/loginimage.jpg" class="img-fluid">
                </div>
                <!-- <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">B2B Platform</p> -->
                <!-- <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join on this platform.</small> -->
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-2">
                        <h2>Hello, Again!</h2>
                        <p>We are happy to have you back.</p>
                    </div>

                    <form method="post" action="login.php" class="login-form">

                        <div class="input-group mb-3">
                            <input type="email" class="form-control form-control-lg bg-light fs-6" id="email" name="email" placeholder="Email address" required>
                        </div>

                        <div class="input-group mb-2">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" id="password" name="password" placeholder="Password" required>
                        </div>

                        <div class="input-group mb-2">
                            <input type="checkbox" id="remember_me" name="remember_me">
                            <label class="form-check-label" for="remember_me">&nbsp;Remember Me</label>
                        </div>

                        <div class="input-group mb-4 d-flex justify-content-between">
                            <!-- for remember me checkbox -->
                            <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                    </div> -->
                            <div class="forgot">
                                <small><a id="forgotPasswordLink" href="password_reset.php">Forgot Password?</a></small>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-success w-100 fs-6" type="submit">Supplier Login</button>
                        </div>
                    </form>
                    <!-- for google login -->
                    <!-- <div class="input-group mb-3">
                    <button class="btn btn-lg btn-light w-100 fs-6"><img src="images/google.png" style="width:20px" class="me-2"><small>Sign In with Google</small></button>
                </div> -->
                    <div class="row">
                        <small>Don't have account? <a href="./register.php">Register</a></small>
                    </div>
                    <div class="row">
                        <small>Admin login <a href="adminlogin.php">login</a></small>
                    </div>

                    <div class="message-block">
                        <p><?php echo $error; ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div>
        <!-- footer styling code in index_footer.css . -->
        <!-- footer is being called from index_footer.php in assets folder. -->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/final footer/";
        include($IPATH . "index_footer.php"); ?>
    </div>



</body>

</html>