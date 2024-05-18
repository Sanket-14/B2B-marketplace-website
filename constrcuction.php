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
    background-color: #2F4F4F;
    height: 12%;
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
    background-color: #228B22;
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

.overview-link_rounded-box  {
    background-color: black;
    color: #D3D3D3;
    border-radius: 5px;
    padding: 10px 20px;
}
.white-text {
    color: black;
}

.green-text {
    color: #00FF7F;
}

.rounded-box {
    border-radius: 100px;
    padding: 20px 40px;
    background-color: orange;
    color: black;
    text-decoration: none;
    display: inline-block;
}
.search form {
    display: flex;
    align-items: center;
    width: 100%; /* Adjusting width */
    font-family: Arial, sans-serif;
    margin: 0;
    justify-content: center;
    height: 50vh;
}

.search form input {
    flex: 2; /* Allow input to take available space */
    /* Other existing styles */
}

.search form button {
    /* Update styles for button */
    /* ... Existing button styles ... */
    margin-left: 1rem; /* Add some space between input and button */
}


        .search-btn{
            height:100px;
            /* margin-top:-4px; */
            padding: 10px;
            margin-right: 20px;
    text-decoration: none;
    color: black;
    padding: 15px 15px;
    border: 1px solid black;

    border-radius: 20px;
    background-color: #228B22; /* Background color for the links */
        }

        .search-btn:hover{
            background-color: limegreen; /* Change background color to white on hover */
    color: white; /* Change text color to black on hover */
    text-decoration: none;
    box-shadow: 0 0 10px rgba(0, 128, 0, 0.5);
        }
     

.form-control {
    width: 500px;
    height: 50px;
    padding: 0 15px;
    border: 2px solid grey;
    border-radius: 20px; /* Rounded corners */
    font-size: 16px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #f90; /* Adjust focus color */
    box-shadow: 0 0 5px rgba(255, 153, 0, 0.5);
}

button[type="submit"] {
    background-color: #228B22;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 20px;
    cursor: pointer;
    height: 50px;
    text-align: center;
}
.search-container {
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



    .search-icon {
   
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

    .submit-button:hover{
            background-color: limegreen; /* Change background color to white on hover */
    color: white; /* Change text color to black on hover */
    text-decoration: none;
    box-shadow: 0 0 10px rgba(0, 128, 0, 0.5);
        }
.overview{
    background-color: var(--cta); /* Change background color to orange */
}

/* ... other existing styles ... */

.overview-flex__text-link{
    /* Update the green color to orange */
    background: var(--dark-black); /* Change to orange */
    color: var(--white); /* Text color black */
}

.overview-flex__text-link:hover{
    background: DarkGreen; /* Change hover background to orange */
    color: white;
    /* ... other existing styles ... */
}

/* ... other existing styles ... */

.overview__facts{
    background: var(--dark-black); /* Change to orange */
}

/* ... other existing styles ... */

    </style>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .card-img-top {
        width: 100%;
        height: 300px; /* Set a fixed height or adjust as needed */
        object-fit: cover; /* Ensures images retain their aspect ratio */
        }
        .carousel-inner .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: -15px; /* Compensate for default column gutters */
        }
        .carousel-inner .col-md-4 {
            flex: 0 0 calc(33.33% - 30px); /* Set width for three images in a row with 15px margin */
            margin: 15px; /* Create spacing between images */
        }
    </style>
    <title>Company overview</title>
    <style>
 .navbar {
    
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #26EA49; /* Updated background color for the navbar */
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
 .navbar-links {
    display: flex; /* Ensure the navbar links are displayed side by side */
    margin-right: 20px;
}


 .navbar-links a {
    margin-right: 20px;
    text-decoration: none;
    color: #fff;
    padding: 8px 15px;
    border-radius: 5px;
    background-color: #141E12; /* Background color for the links */
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

  
                /* Style for the extended search bar */
                .right-side form {
            display: flex;
            width: 100%;
            margin-top: 20px;
        }

        .right-side input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
        }

        .right-side button {
            padding: 10px 20px;
            background-color: white;
            color: #fff;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .right-side button:hover {
            background-color: #000;
        }
        /* Navbar styles */



        /* Split container layout */
        .split-container {
            display: flex;
            height: 100vh;
        }

        .left-side {
            width: 20%;
            background-color: white;
            padding: 20px;
            border: 1px solid rgba(0, 0, 0, 0.2); /* You can change the color code as needed */
            border-radius: 5px;
            /* margin-top: 100px; */
            height: 800px;
        }

        .right-side {
            width: 80%;
            background-color: whitesmoke;
            padding: 20px;
           
            /* margin-top: 100px; */
            height: 900px;
            margin-top:-20px;
        }
        .card {
            margin-top:5px; border: 1px solid rgba(0, 0, 0, 0.2); /* You can change the color code as needed */
            border-radius: 5px;  padding:20px;
        }
        .icon {
  vertical-align: middle; /* Align the icon vertically */
}

.text {
  line-height: 1.5; /* Adjust the line height as needed to vertically align with the icon */
  margin-left: 5px; /* Add some space between the icon and the text */
}
/* Style the container to display flex and flex horizontally */
/* Style the card container */
.card-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}

/* Style the individual cards */
.card {
  flex: 1 0 calc(33.33% - 20px);
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 5px;
  padding: 20px;
  box-sizing: border-box;
}

/* Style the content within the card */
.content {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

/* Style the icon */
.material-icons {
  font-size: 36px;
  margin-right: 10px;
}

/* Style the text and number container */
.details {
  flex: 1;
  display: flex;
  flex-direction: column;
}

/* Style the number */
.timer {
  font-size: 24px;
  font-weight: bold;
}

/* Style the text */
.para {
  margin-top: 5px;
}


    </style>
</head>
<body>
<section>
<nav>
    <a href="index.php" class="nav__logo">
        <img style="margin-top: -15px; margin-left:-65px" src="./images/logo.png" alt="Logo | VoltBridge" class="nav__logo-white" height="50" width="40">
        <span class="white-text";color="black";>Volt </span><span class="green-text"; color="green";>Bridge</span>
    </a>
    <ul class="nav__links">
     
        <li><a href="register.php" class="features-link rounded-box">Add your Company</a></li>
        <li><a href="login.php" class="overview-link_rounded-box">Login</a></li>

    </ul>
    <div class="nav__menu">
        <div class="hamburger"></div>
    </div>
</nav>
    <!-- Centered Text -->
    <div style="text-align: center; margin-top: 20%;">
        <h1><b>Page Under Construction...</b></h1>
    </div>

    <!-- Your JavaScript if needed -->
    <script>
        // Your JavaScript code
        // ...
    </script>
</body>
</html>
