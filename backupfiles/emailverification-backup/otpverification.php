




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <title>User Registration Form</title>
    <link rel="stylesheet" href="register.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
          #loading-message {
            display: none;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            color: #333;
        }
    </style>

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
            <label for="email">Email:</label>
            <input style="width:200px" type="email" id="email" name="email" required>
            <button style="width:100px" type="button" onclick="generateOTP()">getOTP</button>


        </div>
        <div id="loading-message">
    <p style="color:black">Loading...</p>
</div>

        <div id="otp-container" style="display: none;">
                <label for="otp">Enter your OTP:</label>
                <input style="width:200px" type="text" id="otp" name="otp" placeholder="Enter your OTP" required>
                <!-- <input style="width:200px" type="button" value="Verify" onclick="verifyOTP()"> -->
                <button style="width:100px" type="button" onclick="verifyOTP()">Verify</button>
            </div>
    

        <!-- <div class="form-group submit-button">
            <input style="width:200px" type="submit" value="verify">
        </div> -->
    </form>

   
    
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


<script>
    function generateOTP() {
        // console.log("generateOTP function called"); 
        // Check if the email is entered
        var email = $("#email").val();
        if (!email || !isValidEmail(email)) {
            alert("Please enter a valid email address before requesting OTP.");
            return;
        }

        $("#loading-message").text("Sending OTP...");
        $("#loading-message").show();


        // Make an AJAX request to call the PHP function
        $.ajax({
            type: "GET",
            url: "sendOTP.php", // Assuming your PHP file is named sendOTP.php
            data: { email: email },
            success: function(response) {
                // console.log("respppppo       :"+response);
              
                $("#loading-message").hide();

            if (response.toLowerCase().includes("success")) {
                    // Show the container for OTP input field
                    $("#otp-container").show();
                } else {
                    alert("Failed to send OTP. Please try again.");
                }
             },
             error: function () {
            alert("Error in AJAX request.");
        }
                        });
    }

    // Function to validate email format
    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function verifyOTP() {
        var enteredOTP = $("#otp").val();

        // Check if the entered OTP is not empty
        if (!enteredOTP) {
            alert("Please enter the OTP before verifying.");
            return;
        }

        // Make an AJAX request to the server for OTP verification
        $.ajax({
            type: "POST", // You can change the request type based on your server-side handling
            url: "verifyOTP.php", // Replace with the actual server-side verification script
            data: { enteredOTP: enteredOTP },
            success: function(response) {
                if (response.toLowerCase().includes("verified")) {
                    $.ajax({
                    type: "POST",
                    url: "setSession.php",
                    data: { email: $("#email").val() },
                    success: function(response) {
                        // Redirect to success page
                        window.location.href = 'success_content.php';
                    },
                    error: function () {
                        alert("Error setting session. Please try again.");
                    }
                });
                } else {
                    alert("Wrong OTP. Please try again.");
                }
            },
            error: function() {
                alert("Error in AJAX request.");
            }
        });
    }
</script>

   

</body>
</html>


