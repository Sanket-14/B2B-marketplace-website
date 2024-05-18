
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script defer src="app.js"></script>
    <!--Link to jQuery CDN (this runs the entire function)-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--Bootstrap 4.1 CDN for button and container-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title style="color: black;">VoltBridge</title>
    <style>
        nav {
            /* Navbar styles */
            background-color: whitesmoke;
            height: 10%;
        }

        /* Logo styles */
        .nav__logo {
            /* Logo styles */
            color: var(--dark-blue);
        }

        /* Tab styles */
        .nav__links li a {
            /* Tab styles */
            color: black;
            border-radius: 5px;
            padding: 10px 20px;
            font-weight:bold;
        }

        /* Tab styles */
        .nav__links li a:hover {
            /* Tab styles */
            background-color:white;
            border-color: #23D375FF;
            color: #23D375FF;
            border-radius: 5px;
            padding: 10px 20px;
        }

        /* Active tab styles */
        .nav__links li a.active {
            /* Active tab styles */
            color: var(--cta) !important;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: whitesmoke; /* Updated background color for the navbar */
            color: rgb(17, 16, 16); /* Updated text color for the navbar */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-links a {
            color: orange;
            background-color: #fff;
            /* other styles */
        }

        .features-link_rounded-box {
            background-color: #23D375FF; 
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
        }

        .overview-link_rounded-box {
            background-color: transparent;
            color: #fff;
            border-radius: 5px;
            padding: 10px 20px;
            font-size:18px;
        }

        .white-text {
            color: black;
        }

        .green-text {
            color:#23D375FF;
        }

        .hero {
            display: table;
            position: relative;
            background-image: url('images/home1.png');
            background-size: cover;
            padding: 20px 0;
            color: #fff;
            width: 100%;
            height:100%;
        }

        .hero::after {
            content: '';
            position: absolute;
            background: rgba(23, 26, 31, 0.8); /* Transparent black overlay */
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .hero .container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
           /* align-items: center; */
            flex-wrap: nowrap;
            align-content: stretch;
        }

        /* CSS for container */
        .custom-container {
            background-color: transparent;
            margin-top: 50px; /* Adjust margin as needed */
        }

        /* CSS for headings */
        .section-heading {
            color: #23D375FF;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
            margin-top:5vw;
        }
        .sub-heading{
            color: #23D375FF;
            text-align: left;
            font-size: 28px;
            margin-bottom: 20px;
            margin-top:4vw;
            margin-left: 20px;
        }

        /* CSS for content text */
        .content-text {
            color: white;
            text-align: left;
            font-size: 18px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .h{
            text-align: left!important;
        }
    </style>
</head>
<body>
<nav>
    <a style="text-decoration:none;" href="index.php" class="nav__logo">
        <img style="margin-top: -15

px; margin-left:-65px" src="./images/logo4.png" alt="Logo | VoltBridge" class="nav__logo-white" height="40" width="30">
        <span class="white-text";color="black";>Volt</span><span class="green-text"; color="green";>Bridge</span>
    </a>
    <ul class="nav__links">
        <li><a style="text-decoration:none;" href="register.php" class="features-link_rounded-box" style="background-color:#23B375B5;">Add your Company</a></li>
        <li><a style="text-decoration:none;" href="login.php" class="overview-link_rounded-box" style="font-size: 17px; color:black;">Login</a></li>
    </ul>
    <div class="nav__menu">
        <div class="hamburger"></div>
    </div>
</nav>

<!-- Main Div for the entire hero image -->
<div class="hero fadeFromTop">
    <!-- Function to randomly pick an image from array -->
    <script type="text/javascript">
        $(function() {
            var images = ['home1.png'];
            var currentIndex = 0;
            var backgroundElement = $('.hero');

            function changeBackground() {
                backgroundElement.css({'background-image': 'url(images/' + images[currentIndex] + ')'});
                currentIndex = (currentIndex + 1) % images.length;
            }

            // Change background initially
            changeBackground();

            // Automatically change background at an interval (e.g., every 5 seconds)
            setInterval(changeBackground, 10000); // Change every 5 seconds (5000 milliseconds)
        });
    </script>

    <!-- Container for the content -->
    <div class="container custom-container">
        <!-- Heading -->
        <h1 class="section-heading">Welcome to VoltBridge</h1>
        <!-- Content Text -->
        <p class="content-text">
            VoltBridge is a unique B2B platform designed to electrify your business connections. At VoltBridge, we're dedicated to creating a seamless bridge between businesses, fostering robust connections, and empowering growth. Our platform offers a dynamic space where companies can effortlessly connect, collaborate, and thrive in an electrifying business ecosystem.
        </p>
        <!-- Mission Header -->
        <h2 class="sub-heading" style="color: #23D375FF; text-align: left!important;">Mission</h2>
        <!-- Mission Content -->
        <p class="content-text">
            We provide a platform for seamless B2B transport through UK and INDIA.
        </p>
        <!-- Vision Header -->
        <h2 class="sub-heading" style="color: #23D375FF; text-align: left;">Vision</h2>
        <!-- Vision Content -->
        <p class="content-text" style=" text-align: left; " >
            Coming soon.
        </p>
    </div>
</div>

<script>
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function(){
        loader.style.display ="none";
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<!--Bootstrap jQuery and Javascript-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
