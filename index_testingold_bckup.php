<?php 
if (isset($_COOKIE["remember_token"])){
    $remember_me=1;
}
else{
    $remember_me=0;
}
?>




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
    height: 75px;
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
    padding: 5px 10px;
    font-weight:bold;
    display:block;
}
/* Tab styles */
.nav__links li a:hover {
    /* Tab styles */
    background-color:white;
    border-color: #23D375FF;
    color: #23D375FF;

    border-radius: 5px;
    padding: 5px 10px;
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
    color: black;
    border-radius: 5px;
    padding: 5px 15px;
}
.overview-link_rounded-box  {
    background-color: transparent;
    color: #fff;
    border-radius: 5px;
    padding: 10px 20px;
    font-size:25px;
    font-t
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
    color:black;
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
     
       /* .search-btn[type=text] {
            text-align: center;
            justify-content:center;
            align-items: center;
            margin-top: 10px;
            margin-bottom:10px;
            top:2px;
            bottom: 5px;
            background-color: #f0f0f0;
        } */
        .search-bar input[type="text"] {
    width: 38vw;
    height: 7vh;
    padding-right: 10vw;
    padding-left: 3vw;
    border-radius: 30px;
    border: none;
    background-color: #f0f0f0!important;
    font-size: 1.2rem;
    vertical-align: middle;
    
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
    color:white;
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
      background-color: #f0f0f0!important;
      text: lightgrey;
    }

    .search-input {
      flex: 1;
      padding: 10px;
      border: none;
      outline: none;
      border-radius: 10px 0 0 10px;
      background-color: #f0f0f0!important;
      text: lightgrey;
      color: #6c757d;
    font-size: smaller;
    }

    .search-icon {
      background-color: #fff;
      color: black;
      padding: 10px;
      border-radius: 0 20px 20px 0;
      display: flex;
      align-items: center;
      background-color: #f0f0f0!important;
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
    background-color: aliceblue;
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
    /* Other styles... */
    background-image: url('images/home1.png'), url('images/hm1.jpg'), url('images/hm2.jpg');
    background-size: cover; /* Adjust background size if needed */
    padding: 20px 0;
    color: #fff;
    width: 100%;
    height: 100%;
}


.hero::after {
    content: '';
    position: absolute;
    background: rgba(23, 26, 31, 0.5); /* Transparent black overlay */
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
}
@media(max-width: 750px) {
    nav{
        padding: 1.5rem 3rem;
        height: 15%;
    }
    body.scroll-down .nav__links li a:hover{
        color: var(--cta);
    }
    .nav__logo{
       margin-left: 10px;
       color: var(--dark-blue);
       margin-top: 1px;
    }
    .nav__logo-white{
        position: absolute;
        left:40px;
        top: 40px;
        height: 30;
        width:20;
    }
    .white-text {
        color: white;
        display: flex;
        position: absolute;
        top: 50px;
        left: 80px;
    }

    .green-text {
        color: #00FF7F;
        display: flex;
        position: absolute;
        top: 50px;
        left: 130px;
    }
    .nav__menu{
    width: 2rem;
    height: 0.5px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    position: relative;
    margin-right: 30px;
    margin-left:  92%;
    }
    .nav__menu .hamburger{
    position: absolute;
    right: 10px;
    top: 15px;
    bottom: 150px;
    width: 2rem;
    height: 1px;
    background: var(--white);
    -webkit-border-radius: .2rem;
    -moz-border-radius: .2rem;
    -ms-border-radius: .2rem;
    -o-border-radius: .2rem;
    border-radius: .2rem;
    -webkit-transition: all .3s linear;
    -moz-transition: all .3s linear;
    -ms-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;

    }
    body.scroll-down .hamburger{
        background: var(--dark-black);
    }
    body.scroll-down .nav__active .hamburger{
        background: transparent;
    }
    .hamburger::before,.hamburger::after{
        position: absolute;
        content: '';
        left: 0;
        width: 2rem;
        height: 2px;
        background: var(--white);
        -webkit-border-radius: .2rem;
        -moz-border-radius: .2rem;
        -ms-border-radius: .2rem;
        -o-border-radius: .2rem;
        border-radius: .2rem;
        -webkit-transition: all .3s linear;
        -moz-transition: all .3s linear;
        -ms-transition: all .3s linear;
        -o-transition: all .3s linear;
        transition: all .3s linear;
    }
    body.scroll-down .hamburger::before,
    body.scroll-down .hamburger::after{
        background: var(--dark-black);
    }
    .hamburger::before{
       -webkit-transform: translateY(-.5rem);
       -moz-transform: translateY(-.5rem);
       -ms-transform: translateY(-.5rem);
       -o-transform: translateY(-.5rem);
       transform: translateY(-.5rem);
    }
    .hamburger::after{
       -webkit-transform: translateY(.5rem);
       -moz-transform: translateY(.5rem);
       -ms-transform: translateY(.5rem);
       -o-transform: translateY(.5rem);
       transform: translateY(.5rem);
    }
    .nav__active .hamburger{
       background: transparent;
       -webkit-transform: translateX(-2rem);
       -moz-transform: translateX(-2rem);
       -ms-transform: translateX(-2rem);
       -o-transform: translateX(-2rem);
       transform: translateX(-2rem);
    }
    .nav__active .hamburger::before{
       -webkit-transform: rotate(45deg) translate(1.5rem, -1.5rem);
       -moz-transform: rotate(45deg) translate(1.5rem, -1.5rem);
       -ms-transform: rotate(45deg) translate(1.5rem, -1.5rem);
       -o-transform: rotate(45deg) translate(1.5rem, -1.5rem);
       transform: rotate(45deg) translate(1.5rem, -1.5rem);
    }
    .nav__active .hamburger::after{
       -webkit-transform: rotate(-45deg) translate(1.5rem, 1.5rem);
       -moz-transform: rotate(-45deg) translate(1.5rem, 1.5rem);
       -ms-transform: rotate(-45deg) translate(1.5rem, 1.5rem);
       -o-transform: rotate(-45deg) translate(1.5rem, 1.5rem);
       transform: rotate(-45deg) translate(1.5rem, 1.5rem);
    }
    .nav__active .nav__links{
    height: 7rem;
    width: 41rem;
    position: absolute;
    right: 100px;
    left: 40px;
    top: 90px;
    overflow-y: scroll;
    padding: 1rem;
    }
    form {
      display: flex;
      margin-left: 15%;
    }
    .search-container {
      display: flex;
      background-color: #fff;
      border-radius: 30px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 500px;
      height: 50px;
    }
}
@media(max-width: 500px){
    nav{
        padding: 1.5rem 3rem;
        height: 12%;
        width: 700px;
    }
    body.scroll-down .nav__links li a:hover{
        color: var(--cta);
    }
    .nav__logo{
       margin-left: 1px;
       color: var(--dark-blue);
       margin-top: 1px;
    }
    .nav__logo-white{
        position: absolute;
        left:1px;
        top: 35px;
        height: 30;
        width:20;
    }
    .white-text {
        color: white;
        display: flex;
        position: absolute;
        top: 45px;
        left: 45px;
    }

    .green-text {
        color: #00FF7F;
        display: flex;
        position: absolute;
        top: 45px;
        left: 100px;
    }
    .nav__menu{
        width: 2rem;
        height: 1rem;
        display: block;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        position: relative;
    }
    .nav__menu .hamburger{
        position: absolute;
        right: 230px;
        top: 2px;
        width: 2rem;
        height: 2px;
        background: var(--white);
        -webkit-border-radius: .2rem;
        -moz-border-radius: .2rem;
        -ms-border-radius: .2rem;
        -o-border-radius: .2rem;
        border-radius: .2rem;
        -webkit-transition: all .3s linear;
        -moz-transition: all .3s linear;
        -ms-transition: all .3s linear;
        -o-transition: all .3s linear;
        transition: all .3s linear;

    }
    body.scroll-down .hamburger{
        background: var(--dark-black);
    }
    body.scroll-down .nav__active .hamburger{
        background: transparent;
    }
    .hamburger::before,.hamburger::after{
        position: absolute;
        content: '';
        left: 0;
        width: 2rem;
        height: 2px;
        background: var(--white);
        -webkit-border-radius: .2rem;
        -moz-border-radius: .2rem;
        -ms-border-radius: .2rem;
        -o-border-radius: .2rem;
        border-radius: .2rem;
        -webkit-transition: all .3s linear;
        -moz-transition: all .3s linear;
        -ms-transition: all .3s linear;
        -o-transition: all .3s linear;
        transition: all .3s linear;
    }
    body.scroll-down .hamburger::before,
    body.scroll-down .hamburger::after{
        background: var(--dark-black);
    }
    .hamburger::before{
       -webkit-transform: translateY(-.5rem);
       -moz-transform: translateY(-.5rem);
       -ms-transform: translateY(-.5rem);
       -o-transform: translateY(-.5rem);
       transform: translateY(-.5rem);
    }
    .hamburger::after{
       -webkit-transform: translateY(.5rem);
       -moz-transform: translateY(.5rem);
       -ms-transform: translateY(.5rem);
       -o-transform: translateY(.5rem);
       transform: translateY(.5rem);
    }
    .nav__active .hamburger{
       background: transparent;
       -webkit-transform: translateX(-2rem);
       -moz-transform: translateX(-2rem);
       -ms-transform: translateX(-2rem);
       -o-transform: translateX(-2rem);
       transform: translateX(-2rem);
    }
    .nav__active .hamburger::before{
       -webkit-transform: rotate(45deg) translate(1.5rem, -1.5rem);
       -moz-transform: rotate(45deg) translate(1.5rem, -1.5rem);
       -ms-transform: rotate(45deg) translate(1.5rem, -1.5rem);
       -o-transform: rotate(45deg) translate(1.5rem, -1.5rem);
       transform: rotate(45deg) translate(1.5rem, -1.5rem);
    }
    .nav__active .hamburger::after{
       -webkit-transform: rotate(-45deg) translate(1.5rem, 1.5rem);
       -moz-transform: rotate(-45deg) translate(1.5rem, 1.5rem);
       -ms-transform: rotate(-45deg) translate(1.5rem, 1.5rem);
       -o-transform: rotate(-45deg) translate(1.5rem, 1.5rem);
       transform: rotate(-45deg) translate(1.5rem, 1.5rem);
    }
    .nav__active .nav__links{
    height: 7rem;
    width: 15rem;
    position: absolute;
    right: 100px;
    top: 90px;
    overflow-y: scroll;
    padding: 1rem;
    }
    .hero {
    display: table;
    position: center;
    background-size: cover ;
    padding: 20px 0;
    color: #fff;
   /* width: 180px;*/
    height: 70px;
  }
  .hero:after {
    content: '';
    z-index: -1;
    position: center;
    background: rgba(0, 0, 0, 0.24);
   /* width: 180px;*/
    height: 70px;
    left: 0;
    top: 0;
  }
  /* z-index: 1 allows for the text to still display white, and the here:after is z-index: 0 */
  .hero .container {
    position: center;
    z-index: 1;
    text-align: center;
    display: table-cell;
    vertical-align: middle;
    width: 50px;
  }
  .tagline {
    height: 2vh;
    font-family: 'Libre Baskerville', serif;
    font-size: 5px;
    margin: 35px 0 65px 0;
    color: #fff;
    font-style: bold;
    
  }
  .col-md-12{
    margin-top: -50px;
    margin-left: 10px;
   
  }
  h1{
    font-size: 24px;
    margin-right: 20px;
    margin-left: 30px; 
    margin-top: 2px;
    justify-content: center;
  }

  form {
      display: flex;
      margin-left: 15px;
    }

    .search-container {
      display: flex;
      background-color: #fff;
      border-radius: 30px;
      overflow: hidden;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      width: 300px;
      height: 50px;
      justify-content: center;
    }
    .search-icon {
      background-color: #fff;
      color: black;
      padding: 10px;
      border-radius: 0 20px 20px 0;
      display: flex;
      align-items: center;
      margin-left: 30px;
    }
    .submit-button {
      background-color: #2ecc71;
      color: #fff;
      border: none;
      padding: 10px 15px;
      border-radius: 0 20px 20px 0;
      cursor: pointer;
      margin-right: 60px;
    
    }
    .search-input {
      flex: 1;
      padding: 0px;
      border: none;
      outline: none;
      border-radius: 5px 0 0 5px;
    }

/* ------------------------------------------------------ */
    /* for placeholder text */
   .search-input::placeholder {
       background-color:lightslategray;
  color: black; /* Change this to the desired color */
}


      /* Desktop screens (993px and wider) */
  @media (min-width: 993px) {
    /* Styles for screens 993px and wider (e.g., desktops) */
    /* Adjust as needed */
    .myform{
        justify-content: center;
        margin: 0 ;
    }
    .mycontent{
        justify-content: center;
    }
  }
    
}

/* ... other existing styles ... */
.container {
  position: relative;
}

.features-link_rounded-box .options {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #fff;
  border: 1px solid #ccc;
  padding: 10px;
}

.features-link_rounded-box:hover .options {
  display: block;
}

.option {
  cursor: pointer;
}

.option a {
  text-decoration: none;
  color: #333;
}

.option a:hover {
  color: #23B375;
}

.section_wrapper {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top:3rem;
    background-image: url('images/');
    
    
}
.section_wrapper::hover{
    background: rgba(23, 26, 31, 0.5); /* Transparent black overlay */
}

.image_section {
    position: relative;
    width: 50%;
    margin-bottom: 20px; /* Add a gap between image sections */
    --shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
    
}

.image_section img {
    display: block;
    width: 70%; /* Adjust image size */
    height:30rem;
    --shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
}

.text_overlay {
    position: absolute;
    top: 50%;
    left: 25%;
    transform: translate(-50%, -50%); /* Center align text */
    padding: 20px;
    background-color: white;
    text-align: left; /* Center align text */
    width:50%;
    --shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
}

.image_section:nth-child(2) {
    flex-direction: row-reverse; /* Reverse the direction for the second image section */
}

.text_overlay h2 {
    margin-top: 0;
    color: #23d375; /* Set the color of section headings to green */
}

.text_overlay p {
    margin-bottom: 0;
}

.more_info_button {
    display: block;
    width: 50%;
    max-width: 200px; /* Limit maximum width */
    background-color: #23d375;
    border: 2px solid green;
    color: white;
    text-decoration: none;
    padding: 8px 16px; /* Adjust padding */
    border-radius: 5px;
    margin: 20px auto 0; /* Center the button horizontally and add margin at top */
    text-align: center; /* Center align text */
    transition: background-color 0.3s, color 0.3s;
}


.more_info_button:hover {
    background-color: green;
    color: white;
}


.split-button {
    position: relative;
}

.main-button {
    cursor: pointer;
    border: none;
    background-color: #23D375FF;
    color: black;
    padding: 5px 20px;
    border-radius: 5px 0 0 5px;
    font-weight: bold;
}

.secondary-button {
    cursor: pointer;
    border: none;
    background-color: #23D375FF;
    color: black;
    border-radius: 0 5px 5px 0;
    padding:5px;
}

.dropdown-content {
    display: none;
    position: absolute;
    width:100%;
    background-color: #f9f9f9;
    min-width: 160px;
    z-index: 1;
    border-radius: 0 0 5px 5px;
}

.option {
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    color: black;
}

.option:hover {
    background-color: #f1f1f1;
}

.split-button:hover .dropdown-content {
    display: block;
}

.arrow {
    display: inline-block;
    width: 0;
    height: 0;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-top: 6px solid black;
    margin-left: 5px;
}

* {
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   outline: none;
}


/*Here start the Verticle Timeline Code */


.tme {
   width: 100%;
   padding: 50px 0;
  /* margin: 50px auto; */
   position: relative;
   overflow: hidden;
   background-color:#00473c;
}

.tme:before {
   content: '';
   position: absolute;
   top: 0;
   left: 50%;
   margin-left: -1px;
   width: 2px;
   height: 100%;
   background: #CCD1D9;'
   background-color:;
   z-index: 0;
}

.timeline-block {
   width: -webkit-calc(50% + 8px);
   width: -moz-calc(50% + 8px);
   width: calc(50% + 8px);
   display: -webkit-box;
   display: -webkit-flex;
   display: -moz-box;
   display: flex;
   -webkit-box-pack: justify;
   -webkit-justify-content: space-between;
   -moz-box-pack: justify;
   justify-content: space-between;
   clear: both;
}

.timeline-block-right {
   float: right;
   justify-content:flex-start;
}

.timeline-block-left {
   float: left;
   direction: rtl
}

.marker {
   width: 16px;
   height: 16px;
   border-radius: 50%;
   border: 2px solid #F5F7FA;
   background: #00473c;
   margin-top: 10px;
   z-index: 9999
}

.timeline-content {
   width: 70%;
   padding: 0 35px;
   color: #666;
   animation: fadeFromTop 0.5s ease-in-out forwards;
}

.timeline-content h3 {
   margin-top: 5px;
   margin-bottom: 5px;
   font-size: px;
   font-weight: 500;
   color: darkturquoise;
}

.timeline-content span {
   font-size: 15px;
   color: #a4a4a4;
}

.timeline-content p {
   font-size: 16px;
   line-height: 1.5em;
   word-spacing: 1px;
   color: #888;
   text-align:justify;
   color:lightsteelblue;
}

/* Style the button container */
.button-container {
  text-align: center; /* Center the button horizontally */
  margin-top: 1rem; /* Add some space above the button */
}

/* Style the button itself */
.learn-more-button {
  background-color: #23d375; /* Set a blue background color */
  color: white; /* Set white text color */
  padding: 10px 20px; /* Add some padding for spacing */
  border: none; /* Remove default button border */
  border-radius: 5px; /* Add rounded corners */
  cursor: pointer; /* Change cursor to indicate clickability */
  transition: background-color 0.2s ease-in-out; /* Add a smooth hover effect */
}

/* Style the button on hover */
.learn-more-button:hover {
  background-color: #2eafff; /* Change background color on hover */
}

@media screen and (max-width: 768px) {
   .tme:before {
      left: 8px;
      width: 2px;
   }
   .timeline-block {
      width: 100%;
      margin-bottom: 30px;
   }
   .timeline-block-right {
      float: none;
   }

   .timeline-block-left {
      float: none;
      direction: ltr;
   }
}

@keyframes fadeFromTop {
  0% {
    opacity: 0;
    transform: translateY(-50px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
.fade-in {
  opacity: 0;
  transition: opacity 0.5s ease-in-out;
}

.fade-in.fade-in-visible {
  opacity: 1;
}


    </style>

    
</head>
<body>
<nav>
    <a style="text-decoration:none;" href="index.php" class="nav__logo">
        <img style="margin-top: -15

px; margin-left:-65px" src="./images/logo4.png" alt="Logo | VoltBridge" class="nav__logo-white" height="40" width="30">
        <span class="white-text">Volt</span><span class="green-text">Bridge</span>
    </a>
    <ul class="nav__links">
        <li class="split-button">
            <button class="main-button features-link_rounded-box">Add your Company</button>
            <button class="secondary-button"><span class="arrow"></span></button>
            <div class="dropdown-content">
                <span class="option"><a href="register.php">As a Supplier</a></span>
                <span class="option"><a href="buyer_registration.php">As a Buyer</a></span>
            </div>
        </li>
        <li class="split-button">
            <button class="main-button features-link_rounded-box">
                <?php if($remember_me==1){ ?>
                    Dashboard
                <?php } else { ?>
                    Login
                <?php } ?>
            </button>
            <button class="secondary-button"><span class="arrow"></span></button>
            <div class="dropdown-content">
                <span class="option"><a href="login.php">Supplier</a></span>
                <span class="option"><a href="buyer_login.php">Buyer</a></span>
            </div>
        </li>
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
        // Define the image array here
        var images = ['home1.png', 'hm1.jpg', 'hm2.jpg', 'hm3.jpg', 'hm4.jpg', 'hm5.jpg', 'hm6.jpg', 'hm7.jpg'];

        var currentIndex = 0;
        var backgroundElement = $('.hero');

        function changeBackground() {
            backgroundElement.css({'background-image': 'url(images/' + images[currentIndex] + ')'});
            currentIndex = (currentIndex + 1) % images.length;
        }

        // Change background initially
        changeBackground();

        // Automatically change background at an interval (e.g., every 5 seconds)
        setInterval(changeBackground, 5000); // Change every 5 seconds (5000 milliseconds)
    });
</script>


    <div class="container text-center ">
           <div class="row"> </div>

            <!--Website Name-->
            <div class="col-md-12 justify-content-center mycontent" style="margin-top:-200px">
                <!--Website Tagline-->
                <h1><p height="80px"><b>Streamlining B2B Connections In EV Supply Chain</b></p></h1>
                
                                 <h5 style="margin-top:-20px"> <p><b> </b></p></h5> <br>
                <!--Button that should link to the next section of your website-->
                <?php 
                require('dbcon.php');
                ?> 
             <!-- appliead justify content center property to form and eliminated its previously set left margin causing block space inline -->
                <form class="justify-content-center myform" action="listing.php" METHOD="GET" style="margin:0;">
                    <div class="search-container">
                    <div class="search-icon">
                    <span><i class="ri-search-line"></i></span>
                    </div>
                    <input name="search" type="text" class="search-input" placeholder="Search term e.g Castings, Lamination Stacks, Magnet Wire....">
                    <button type="submit" class="submit-button">Search</button>
                    </div>
                </form>
                         
            </div>
        </div>    
    </div> 
    <!-- * 
    
    <div class="features nav-section" id="features">
        <section class="features__text">
            <h2 class="fadeFromTop">Why VoltBridge ?</h2>
            
            <p class="fadeFromTop">"VoltBridge is a unique B2B platform designed to streamline connections between buyers and suppliers within the dynamic E-mobility industry. "</p>
        </section>
    </div> -->
 
   

<div class="tme">

  <div class="fadeFromTop timeline-block timeline-block-right">
    <div class="marker"></div>
    <div class="fadeFromTop timeline-content fadeFromTop">
      <h3>Discover EV Suppliers</h3>
      <span></span>
      <p>Struggling to navigate the complex EV market? Say goodbye to endless searches and inconsistent information. Our platform's search functionality is tailored to the unique needs of the EV industry. Buyers can easily filter suppliers based on criteria like product type, supplier category, and location. This precision search simplifies finding the perfect supplier, saving time and enhancing decision-making. </p>
      <div class="button-container">
        <button class="learn-more-button">Find out more</button>
      </div>
    </div>
  </div>

  <div class="fadeFromTop timeline-block timeline-block-left" style="justify-content:start; ">
    <div class=""></div>
    <div class="timeline-content fadeFromTop" style="width:70%; ">
      <h3>Why VoltBridge</h3>
      <span></span>
      <p style="text-align-last:end;">VoltBridge is a unique B2B platform designed to streamline connections between buyers and suppliers within the dynamic E-mobility industry. Our platform's product listings are designed to give buyers a clear and comprehensive view of what suppliers offer. Each listing is detailed with high-quality images, in-depth descriptions, ensuring buyers have all the information they need at their fingertips</p>
      
    </div>
  </div>

  <div class="fadeFromTop timeline-block timeline-block-right" >
    <div class="marker"></div>
    <div class="timeline-content fadeFromTop" >
      <h3>Showcase EV Experties</h3>
      <span></span>
      <p>Visibility is the key in the evolving EV market, puts your products and services in front of the right customers, effortlessly. Present your product range in an organized manner. Group related products and provide comprehensive descriptions for each, making it easy for buyers to navigate and understand your offerings. Showcase the best of what you offer with high-quality images of your products.</p>
      <div class="button-container">
        <button class="learn-more-button">Find out more</button>
      </div>
    </div>
  </div>
</div>


  <!--  <div class="image_section">
        <img src="./images/Home2.jpg" alt="Image 3">
        <div class="text_overlay" style="margin-left: 10rem;">
            <h2>Showcase EV Expertise</h2>
            <p>Visibility is the key in the evolving EV market, puts your products and services in front of the right customers, effortlessly.</p>
            <a href="#" class="more_info_button">More Information</a>
        </div>
    </div> -->
</div>



<!--
    <div class="overview nav-section fadeFromTop" id="overview" style="background-image: url(./images/section.png); background-size: cover; width: 100%; height:700px; ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="overview-flex fadeFromTop" style="justify-content:center; font-size: 20px;" >
                    <section class="overview-flex___text" style="justify-content:center;">
                        <h2>Connecting Suppliers and Buyers Seamlessly</h2>
                    </section>
                </div>
                <div class="overview-flex fadeFromTop">
                    <section class="overview-flex__text col-md-4">
                       
                        <h2 style="color:#08510DFF; ">Buyers</h2>
                        <p style="line-height: 1.2">Struggling to navigate the complex </p>
                        <p style="line-height: 1.2"> EV market? Say goodbye to endless </p>
                        <p style="line-height: 1.2">  searches and inconsistent </p>
                        <p style="line-height: 1.2">   information.</p>
                        <a href="infotab2.php" class="overview-flex__text-link" >Search Suppliers</a>
                    </section>
                    <section class="overview-flex__text col-md-4">
                        
                        <h2 style="color:#08510DFF;">VoltBridge</h2>
                        <p style="line-height: 1.2">Effortlessly Find the Right EV </p>
                        <p style="line-height: 1.2"> Suppliers.Showcase Your EV Products </p>
                        <p style="line-height: 1.2"> to the Right Audience.  </p>
                        <p style="line-height: 1.2">   </p>
                        <a href="#" class="overview-flex__text-link" >Know Us</a>
                    </section>
                    <section class="overview-flex__text col-md-4">
                    
                        <h2 style="color:#08510DFF;">Suppliers</h2>
                        <p style="line-height: 1.2">Visibility is key in the evolving EV </p>
                        <p style="line-height: 1.2">  market.Our digital platform puts your </p>
                        <p style="line-height: 1.2">  products in front of the right </p>
                        <p style="line-height: 1.2">  customers, effortlessly.</p>
                        <a href="infotab1.php" class="overview-flex__text-link" >Register Your Company</a>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
        <!--<section class="overview__facts">-->
        <!--    <h2 class="fadeFromTop">Trusted by developers from over 80 planets</h2>-->
        <!--    <p class="fadeFromTop">There are many variations of passages of Lorem Ipsum available, but the majority.</p>-->
        <!--    <div class="fact-flex fadeFromTop">-->
        <!--        <section class="fact-flex__column">-->
        <!--            <h3>100%</h3>-->
        <!--            <p>Satisfaction</p>-->
        <!--        </section>-->
        <!--        <section class="fact-flex__column">-->
        <!--            <h3>120K</h3>-->
        <!--            <p>Happy Users</p>-->
        <!--        </section>-->
        <!--        <section class="fact-flex__column">-->
        <!--            <h3>125k+</h3>-->
        <!--            <p>Downloads</p>-->
        <!--        </section>-->
        <!--    </div>-->
        <!--</section>-->
    </div>

    
    <!-- <footer>
        <div class="footer__top">
            <div class="footer__intro">
                <a href="#"><img src="./images/logo1.png" alt="Home | Appvilla" class="footer__intro--logo"></a>
                <p><b>Empowering businesses to thrive by providing innovative solutions and </b></p>
                <p><b>services that foster growth, efficiency, and long-term success.</b></p>
                <ul class="footer__intro--media-links">
                    <li><a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href="#" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href="#" aria-label="Linkedin"><i class="fa-brands fa-linkedin"></i></a></li>
                    <li><a href="#" aria-label="Youtube"><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
            </div>
                <section class="footer__grid">
                    <h3>Company</h3>
                    <ul class="footer__grid--list">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Blog</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </section>
                <section class="footer__grid">
                    <h3>Legal</h3>
                    <ul class="footer__grid--list">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </section>
            </div>
        </div>
    </footer> -->
    <footer class="footer">
    <div class="container">
      <div class="footer-links">
      <!--  <a href="aboutus.php">About Us</a> -->
        <a href="contact_us.php">Contact Us</a>
        <a href="FAQ.php">FAQs</a>
        <a href="privacy.php">Data Privacy</a>
      </div>
<hr>
      <div class="copyright">
        <p>&copy; 2024 VoltBridge. All Rights Reserved.</p>
      </div>

      <div class="social-links">
        <a href="https://www.linkedin.com/company/voltbridge/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        <!-- Add more social media icons as needed -->
      </div>
    </div>
  </footer>
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
    <script>
        // Function to check if an element is in the viewport
function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// Function to handle scroll event
function handleScroll() {
    var elements = document.querySelectorAll('.fade-in');
    elements.forEach(function(el) {
        if (isElementInViewport(el)) {
            el.classList.add('fade-in-visible');
        }
    });
}

// Listen for the scroll event
window.addEventListener('scroll', handleScroll);

// Trigger the function initially to check if any elements are already in the viewport
handleScroll();

    </script>
</body>
</html>