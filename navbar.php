<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
     /* background-image: url("B2B_bg.jpg");  */
     background-size: cover ;
    background-color:white;
    background-size: cover; 
    color: #333;
    /* max-width:3000px; */
 }

 .navbar {
    
    display: flex;
    justify-content: space-between;
    align-items: center;
   
    background-color: whitesmoke; /* Updated background color for the navbar */
    color: white; /* Updated text color for the navbar */
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    position: fixed;
    top: 0;
    width: 100%; /* Set the width to 100% */
    z-index: 1000; /* Ensure the navbar is on top of other elements */
 }

 .navbar-brand {
    font-size: 24px;
    font-weight: bold;
    text-decoration: none; /* Remove underline from the brand */
    color: #141E12; /* Adjust color for the brand */
 }
  .white-text{
    position: absolute;
    left: 50px;
    top: 25px;
  }
  .green-text{
    position: absolute;
    left: 95px;
    top: 25px;
  }

 .navbar-links a {
    margin-right: 20px;
    text-decoration: none;
    color: black;
    font-weight:600;
    padding: 8px 15px;
    border-radius: 5px;
    background-color: #23D375FF;  /* Background color for the links */
 }

 .navbar-links a:hover {
    background-color: #fff; /* Change background color to white on hover */
    color: #23D375FF;  /* Change text color to black on hover */
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
            background-color: #26EA49;
            border: 2px solid black;
            border-radius: 5px;
            cursor: pointer;
            transition: box-shadow 0.3s;
        }

        /* Add hover effect */
        button:hover {
            box-shadow: 0 4px 8px rgba(0, 128, 0, 0.6);
        }

        .link-buttons{
            display:flex;
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
               <div class="navbar-brand">
                <a style ="text-decoration: none;" href="index.php" class="nav__logo">
                <img style="margin-top:10px; margin-left:15px" src="./images/logo.png" alt="Logo | VoltBridge" class="nav__logo-white" height="40" width="30">
                <span class="white-text"style="color:black;margin-bottom:70px;">Volt </span><span class="green-text" style="color:#23D375FF; margin-bottom:15px;">Bridge</span>
                </a>
                </div>
                <div class="link-buttons">
                <div class="navbar-links">
                    <a href="register.php">Add your Company</a>
                </div>
                </div>
                
        </div>
        
        </section>
    
</body>
</html>