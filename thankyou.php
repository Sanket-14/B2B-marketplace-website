<?php 
require('dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="thankyou.css">
    <title>Registration complete</title>
    <style>

        p {
            font-size: 17px;
            color: #555;
            margin-bottom: 20px;
        }

    </style>

</head>
<body>


<nav class="navbar navbar-default navbar-expand-lg shadow navbar-light" style="height: 3.5rem;">
        <div class="container-fluid">
          <div class="navbar-header">
            <img src="./images/vblogo.jpg" style="width: 17px; height: auto; margin-left: 15px; margin-bottom: 10px;">
            <strong><a class="navbar-brand" href="index.php">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong>
          </div>
        </div>
    </nav>
   

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center " style="min-height: 87vh;">
        

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area justify-content-center align-items-center">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-12 rounded-4 justify-content-center align-items-center mybox" style="background: #ffffff;">
           <div class="featured-image mb-2" style="margin-top: 1rem;">
            <img src="./images/tickmark.png" class="img-fluid" style="width: 6rem;">
           </div>
            <div class="header-text mb-3">
                 <h2 class="mb-3" style="color: rgb(0,191,99);">Registration Successful!</h2>
                 <p class="mb-0">Congratulations! You've been listed on our platform</p>
                 <p>Please login to complete your profile.</p>
            </div>
            <div class="button mb-3" style="align-items: center; justify-content: center;">
                <a href="login.php"><button class="btn btn-lg btn-success w-100 fs-6">Login</button></a>
            </div>
        </div> 

      </div>
    </div>

 

</div>
</body>

</html>