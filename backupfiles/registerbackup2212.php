<?php
require('dbcon.php');
$error = "";

?>

<?php
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
            $error = "Email-address is already registered , please login or try again with a different email-address";
        } elseif ($companyResult->num_rows > 0) {
            // Company name is already registered
            $error = "Company with this name is already registered please login or register a new company";
        } else {
            // SQL query to insert data into User_data table
            $sql = "INSERT INTO userdata (first_name, last_name, email, password, comp_name, country)
                    VALUES ('$firstName', '$lastName', '$email', '$password', '$companyName', '$country')";

            // Check if the query was successful
            if ($conn->query($sql) === TRUE) {
                header("Location: add_listing.php?companyName=$companyName");
                exit(); // Ensure that no further code is executed after the redirect
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Close the database connection
    $conn->close();
}
?>


 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <title>User Registration Form</title>

    
    
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
    <form action="register.php" method="POST">
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

        <div class="form-group submit-button">
            <input type="submit" value="Submit">
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


