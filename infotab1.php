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
    /*background-color: #228B22;*/
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
.features-link_rounded-box{
    background-color: #23D375FF; 
    color: white;
    border-radius: 5px;
    padding: 10px 20px;
}
.overview-link_rounded-box  {
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

.rounded-box {
    border-radius: 40px;
    padding: 40px 40px;
    background-color: orange;
    color: black;
    text-decoration: none;
    display: inline-block;
}
.search form {
    display: flex;
    align-items: center;
    width: 100%; /* Adjusting width */
}

.search form input {
    flex: 1; /* Allow input to take available space */
    /* Other existing styles */
}

.search form button {
    /* Update styles for button */
    /* ... Existing button styles ... */
    margin-left: 1rem; /* Add some space between input and button */
}


        .search-btn{
            height:100px;
            /*margin-top:-4px; */
            padding: 5px;
            /*margin-right: 20px;*/
    text-decoration: none;
    color: black;
    padding: 15px 15px;
    border: 2px solid #228B22;
    text-align: center;
    top:2px;
    
    border-radius: 5px;
    background-color: limegreen; /* Background color for the links */
        }

        .search-btn:hover{
            background-color: limegreen; /* Change background color to white on hover */
    color: white; /* Change text color to black on hover */
    text-decoration: none;
    box-shadow: 0 0 10px rgba(0, 128, 0, 0.5);
        }
     
        .search-btn[type=text] {
            text-align: center;
            justify-content:center;
            align-items: center;
            margin-top: 10px;
            margin-bottom:10px;
            top:2px;
            bottom: 5px;
        }
.form-control {
    width: 500px;
    height: 50px;
    padding: 0 15px;
    border: 2px solid green;
    border-radius: 24px; /* Rounded corners */
    font-size: 18px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #f90; /* Adjust focus color */
    box-shadow: 0 0 5px rgba(255, 153, 0, 0.5);
}

button[type="submit"] {
    background-color:#23D375FF; 
    color:black;
    border: transparent ;
    padding: 10px 20px;
    border-radius: 20px;
    cursor: pointer;
    height: 50px;
    text-align: center;
    font-weight:600;
    /*margin-top: 1px;
    margin-bottom: 2px;*/
}
form {
      display: flex;
      margin-left: 32%;
    }

    .search-container {
      display: flex;
      background-color: #fff;
      border-radius: 30px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 550px;
      height: 50px;
    }

    .search-input {
      flex: 1;
      padding: 10px;
      border: none;
      outline: none;
      border-radius: 10px 0 0 10px;
    }

    .search-icon {
      background-color: #fff;
      color: black;
      padding: 10px;
      border-radius: 0 20px 20px 0;
      display: flex;
      align-items: center;
    }

    .submit-button {
      background-color: #2ecc71;
      color: #fff;
      border: none;
      padding: 10px 15px;
      border-radius: 0 20px 20px 0;
      cursor: pointer;
    }
    #preloader{
        background: #000 url(images/Loading.gif) no-repeat center center;
        height: 100vh;
        width: 1530px;
        position: fixed;
        z-index: 100;
    }
//*.search-container {
      display: flex;
      background-color: #fff;
      border-radius: 40px;
      overflow: hidden;
      height: 6.5vh;
      width: 40%;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      align-items: center;
      justify-content: center;
      font-family: Arial, sans-serif;
      margin: 0;
      float: center;
      margin-left: 30%;
      margin-right: 50%;
      border: 1px solid grey;
      box-shadow: 0 0 10px rgba(0, 128, 0, 0.5);
    }

    .search-input {
      flex: 2;
      padding: 10px;
      border: none;
      outline: none;
      border-radius: 40px 0 0 40px;
      font-size: 16px;
      transition: all 0.3s ease;
    }

    .search-input[type=text] {
        width:485px;
        margin-top: 3px;
        margin-left: 0;
        left:2px;
        font-size: 18px;
    }


    .search-icon {
   
      color: black;
      padding: 5px;
      border-radius: 0 20px 20px 0;
      display: flex;
      align-items: center;
    }

    .submit-button {
      background-color: #2ecc71;
      color: #fff;
      border: none;
      padding: 20px 20px;
      border-radius: 0 35px 35px 0;
      cursor: pointer;
    }

    .submit-button:hover{
            background-color: limegreen; /* Change background color to white on hover */
    /*color: white; /* Change text color to black on hover */
    /*text-decoration: none;
    box-shadow: 0 0 10px rgba(0, 128, 0, 0.5);
        }*/
.overview{
    background-color: var(--cta); /* Change background color to orange */
}

/* ... other existing styles ... */

.overview-flex__text-link{
    /* Update the green color to orange */
    background: #23D375FF;  /* Change to orange */
    color: var(--white); 
    text-decoration:none;/* Text color black */
}

.overview-flex__text-link:hover{
    background: white; /* Change hover background to orange */
    color: black;
    border-color: #23D375FF; 
    text-decoration:none;
    /* ... other existing styles ... */
}

/* ... other existing styles ... */

.overview__facts{
    background: var(--dark-black); /* Change to orange */
}
.footer {
    background-color: #FAFAFBFF;
    padding: 20px 0;
    color: #171A1FFF;
    height:200px;
  }

  .footer-links {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
  }

  .footer-links a {
    color: #171A1FFF;
    text-decoration: none;
  }

  .footer-links a:hover {
    text-decoration: underline;
  }

  .copyright {
    text-align: center;
    margin-top: 20px;
  }

  .social-links {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-top: 20px;
  }

  .social-links a {
    color: blue;
    fill:blue;
    margin-left: 15px;
    font-size: 20px;
  }
   .hero {
    display: table;
    position: relative;
    background-image: url('images/home1.png');
    background-size: cover;
    padding: 20px 0;
    color: #fff;
    width: 100%;
     /* Adjusted width */
    height:100%; /* Adjusted height */
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
b, strong {
    font-weight: bolder;
    color: white;
}
.main-content {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    text-align: center; /* Align text center within each section */
    height: 100vh;
    max-width: 1000px; /* Adjusted maximum width */
    margin: 0 auto; /* Center horizontally */
    margin-top: 20px;
}
.hero .container {
    position: center!important;
    z-index: 1;
    text-align: center;
   /* display: table-cell; */ 
    vertical-align: middle;
    width: 100%;
}

/* Center the text within each section */
.main-content section {
   
    text-align: left;
}
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Adjusted height */
}
.h4, h4 {
    font-size: 1.1rem;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-bottom: 0.5rem;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.2;
    color: inherit;
    margin-top: 20px;
}
.explore-button-container {
    text-align: center; /* Center the button */
    margin-top: 40px; /* Adjust as needed */
}

.explore-button {
    background-color: #23D375FF; /* Green color */
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
}
    </style>

    
</head>
<body>
<nav>
    <a style="text-decoration:none;" href="index.php" class="nav__logo">
        <img style="margin-top: -15px; margin-left:-65px" src="./images/logo4.png" alt="Logo | VoltBridge" class="nav__logo-white" height="40" width="30">
        <span class="white-text";color="black";>Volt</span><span class="green-text"; color="green";>Bridge</span>
    </a>
    <ul class="nav__links">
     
        <li><a style ="text-decoration:none;" href="register.php" class="features-link_rounded-box" style="background-color:#23B375B5;">Add your Company</a></li>
        <li><a style ="text-decoration:none;" href="login.php" class="overview-link_rounded-box" style="font-size: 17px; color:black;">Login</a></li>

    </ul>
    <div class="nav__menu">
        <div class="hamburger"></div>
    </div>
</nav>

<!-- * -->
    <!--Main Div for the entire hero image-->
    <div class="hero fadeFromTop">
        <!--Function to randomly pick an image from array-->
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
<div class="container">
<div class="main-content">
        <!-- Main header "Buyer" -->
        <h1>Suppliers</h1>
        
        <!-- Section 1 -->
        <section>
            <!-- Header "Customized EV Supplier Search" -->
            <h2 style="color: #23D375FF;">Detailed Business Profile</h2>
            
            <!-- Sub-header "Effortless Discovery at Your Fingertips" -->
            <h4>Craft Your Business Story</h4>
            
            <!-- Text -->
            <p>Create a profile with detailed information about your business. Share your journey, values, and the distinct qualities that set you apart. A clear and engaging business introduction helps you stand out in a crowded market.</p>
        </section>

        <!-- Section 2 (similar structure to section 1) -->
        <section>
            <!-- Header "Customized EV Supplier Search" -->
            <h2 style="color: #23D375FF;">Showcasing Your EV Innovations</h2>
            
            <!-- Sub-header "Effortless Discovery at Your Fingertips" -->
            <h4>Efficiently Display Your Product Range</h4>
            
            <!-- Text -->
            <p>Present your product range in an organized manner. Group related products and provide comprehensive descriptions for each, making it easy for buyers to navigate and understand your offerings. Showcase the best of what you offer with high-quality images of your products.</p>
        </section>
        <!-- Section 3 (similar structure to section 1) -->
        <section>
            <!-- Header "Customized EV Supplier Search" -->
            <h2 style="color: #23D375FF;">Customer References</h2>
            
            <!-- Sub-header "Effortless Discovery at Your Fingertips" -->
            <h4>A Closer Look at What's on Offer</h4>
            
            <!-- Text -->
            <p>Enhance your credibility by displaying customer testimonials and success stories. Positive feedback from satisfied clients builds trust and confidence among potential buyers.</p>
        </section>
        <div class="explore-button-container">
    <a href="#" class="explore-button">Explore the supplier database</a>
</div>
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