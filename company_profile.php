<?php
session_start();
require('dbcon.php');

if (!isset($_SESSION["user_email"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Check if the comp_name is set in the session
if (!isset($_SESSION['comp_name'])) {
    // Handle the case where comp_name is not set
    $_SESSION['comp_name'] = "Default Company"; // Set a default value or handle it as needed
}


$user_email = $_SESSION["user_email"];
$comp_name=$_SESSION["comp_name"];

$sql = "SELECT * FROM add_listing WHERE comp_name = '$comp_name'";

$query= "SELECT * FROM userdata WHERE comp_name = '$comp_name'";

// Perform the query
$result = mysqli_query($conn, $sql);
$queryresult= mysqli_query($conn, $query);

if ($result && $queryresult ) {
    // Fetch associative array
    $row = mysqli_fetch_assoc($result) ;
    $user= mysqli_fetch_assoc($queryresult) ;
     
} else {
    // Query failed
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

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
    font-weight: 600;
    border-radius: 5px;
    padding: 10px 20px;
    background-color: #23D375FF;
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
    background-color: #23D375FF;
    color: black;
    border-radius: 5px;
    padding: 10px 20px;
}
.white-text {
    color: black;
}

.green-text {
    color: #23D375FF;
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
         body {
    margin: 0;
    font-family: Arial, sans-serif;
     /* background-image: url("B2B_bg.jpg");  */
     background-size: cover ;
    background-color:whitesmoke;
    background-size: cover; */
    color: #333;
    /* max-width:3000px; */
 }

 .navbar {
    
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
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
 .navbar-links {
    display: flex; /* Ensure the navbar links are displayed side by side */
    margin-right: 20px;
}
.nav__links:hover{
    color: #23D375FF; 
    background-color: white;
}

 .navbar-links a {
    margin-right: 20px;
    text-decoration: none;
    color: black;
    padding: 8px 15px;
    border-radius: 5px;
    background-color: #23D375FF; /* Background color for the links */
 }

 .navbar-links a:hover {
    background-color: white; /* Change background color to white on hover */
    color: #23D375FF; /* Change text color to black on hover */
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
input[type="text"],
textarea,
select {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="file"] {
  margin-top: 10px;
}
button[type="submit"] {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  background-color: #3498db;
  color: white;
}

button[type="submit"]:hover {
  background-color: #2980b9;
}

.panel {
  background-color: #f9f9f9;
  border-radius: 8px;
  padding: 30px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  position: relative;
}

.panel-body {
  display: flex;
  flex-wrap: wrap;
}
.panel-footer {
    padding: 20px;
    background-color: #f9f9f9;
    border-top: 1px solid #ccc;
    border-radius: 0 0 5px 5px;
    display: flex;
    justify-content: flex-end;
}
.form-actions {
    /* Adjust margin or padding if needed */
    margin-top: 10px;
}
/* Additional styling */
.container--main:last-of-type {
    margin-bottom: 9.6rem;
}

.container--main {
    margin-top: 1.6rem;
}

main {
    display: block;
}

article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
    display: block;
}

/* Custom color variables */
:root {
    /* ... Your color variables ... */
}

:root {
    /* ... More color variables ... */
}
.form-group{
    background-color: #f0f0f0; /* Grey background color */
    padding: 20px; /* Add padding as needed */
    border-radius: 8px; /* Rounded corners */
    margin-bottom: 20px; /* Adjust margin as needed */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: Add a shadow */
}
/* Applying a grey background to each heading */
.section-head__title {
  background-color: #f2f2f2;
  padding: 10px;
}

/* Displaying the boxes in line */
.card-deck {
  display: flex;
  flex-wrap: wrap;
}

.panel--vcard {
  flex: 0 0 calc(33.33% - 20px);
  margin: 10px;
  background-color: #fff; /* For white background in each box */
}

/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
  .panel--vcard {
    flex: 0 0 calc(50% - 20px);
  }
}
/* Increase icon size and make them rounded with grey background */
.circle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-color: #ccc;
    display: flex;
    justify-content: center;
    align-items: center;
}
.circle img {
    width: 40px; /* Adjust this size to fit the image properly */
    height: 40px; /* Adjust this size to fit the image properly */
}
        
        /* Make each letter in each block bold */
        .text-bold {
            font-weight: bold;
        }
        
        /* Style "Edit" button as blue */
        .panel__action {
            color: blue;
            font-size: 14px;
        }
        
        .panel__action:hover {
            color: blue;
            text-decoration: underline;
        }
        .panel__title {
            color: green;
            font-size: 16px;
        }
        .text-truncate{
            color: grey;
            font-size: 14px;
        }
        .panel__body{
            color: grey;
            font-size: 14px;
        }


    </style>
</head>
<body>
<section>
<nav>
    <a href="index.php" class="nav__logo" style="text-decoration:none;">
        <img style="margin-top: -15px; margin-left:-65px" src="./images/logo.png" alt="Logo | VoltBridge" class="nav__logo-white" height="40" width="30">
        <span class="white-text";color="white";>Volt </span><span class="green-text"; color="green";>Bridge</span>
    </a>
    <ul class="nav__links">
     
        <li><a href="register.php" class="features-link rounded-box" style="text-decoration:none;">Add your Company</a></li>

    </ul>
    <div class="nav__menu">
        <div class="hamburger"></div>
    </div>
</nav>

</section>

<div class="split-container" style="margin-top:10px">
        <div class="left-side" style="margin-left:20px">
            <!-- Content for the left side -->
            <h2></h2>
<!-- Left side content -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard Sidebar Menu</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* Your CSS styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        #dashboardSidebarMenu {
            list-style: none;
            padding: 0;
        }
        #dashboardSidebarMenu li a {
            display: flex;
            align-items: center;
            padding: 8px 15px;
            text-decoration: none;
            color: black;
            margin-bottom: 5px;
            border-radius: 5px;
            background-color: #eee;
            transition: background-color 0.3s;
        }
        #dashboardSidebarMenu li a:hover {
            background-color: lightgreen;
        }
        .active {
            background-color: #228B22;
            color: white;
        }
        .icon {
            margin-right: 8px;
            font-size: 20px;
            color: #23D375FF; 
        }
    </style>
</head>
<body>
    <ul id="dashboardSidebarMenu"></ul>

    <script>
        const menuItems = [
            {
                icon: "dashboard", // Google Material Icon for Dashboard
                label: "dashboard",
                path: "suppliardashboard.php",
            },
            // {
            //     icon: "dashboard", // Google Material Icon for Dashboard
            //     label: "Product",
            //     path: "construction.php",
            // },
            {
                icon: "person", // Google Material Icon for Profile
                label: "Profile",
                path: "company_profile.php",
            },
            {
                icon: "format_list_bulleted", // Google Material Icon for My Listing
                label: "My Listing",
                path: "construction.php",
            },
            {
                icon: "favorite", // Google Material Icon for Favorites
                label: "Favorites",
                path: "construction.php",
            },
            {
                icon: "add", // Google Material Icon for Add Listing
                label: "Add Products",
                path: "add_products.php",
            },
            {
                icon: "message", // Google Material Icon for Messages
                label: "Messages",
                path: "construction.php",
            },
            {
                icon: "exit_to_app", // Google Material Icon for Logout
                label: "Logout",
                path: "logout.php",
            },
        ];

        function createMenuItems(menuItems) {
            const menuContainer = document.getElementById("dashboardSidebarMenu");

            menuItems.forEach(item => {
                const listItem = document.createElement("li");
                const link = document.createElement("a");

                const icon = document.createElement("i");
                icon.className = `icon material-icons`;
                icon.textContent = item.icon;
                link.href = item.path;
                link.textContent = item.label;

                link.prepend(icon);
                listItem.appendChild(link);
                menuContainer.appendChild(listItem);
            });
        }

        createMenuItems(menuItems);

        // Simulating the active link (in this case, the second one)
        const links = document.querySelectorAll("#dashboardSidebarMenu li a");
        links[1].classList.add("active");
    </script> 
</body>
</html>
</div>
<div class="right-side" style="margin-left:20px; overflow-y: scroll; max-height: 80vh;">

<main class="container container--main" role="section">
    <div class="section-head">
        <div class="section-head__heading">
            <div class="section-head__title" role="heading">Your company profile: <strong><?php echo $row['comp_name'] ?></strong>
        </div>
    </div>
</nav>
</div>
<div class="listings-teaser">
    <div class="listings-teaser__figure">

    </div>
    <div class="listings-teaser__body">
        <b>More requests about your offer!</b> Link products or services from your portfolio to your categories to improve your visibility.
<div class="section-head__title" role="heading">Your basic information – so that buyers can contact you</div>
</div>
</div>
<div class="card-deck">
    <div class="panel panel--vcard panel--hover" data-testid="logo-card">
        <a href="#" class="panel__content">
            <div class="panel__header"><i aria-hidden="true" class="svg-icon icon__mask-star circle" role="img">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="nonzero" d="M21.375 2c.345 0 .625.28.625.625v18.75c0 .345-.28.625-.625.625H2.625A.625.625 0 0 1 2 21.375V2.625C2 2.28 2.28 2 2.625 2Zm-.625 1.25H3.25v17.5h17.5V3.25ZM12 4.5c.59 0 1.125.34 1.378.88l1.596 3.495h3.029c.572.002 1.09.328 1.342.833l.057.13c.224.579.071 1.235-.4 1.667l-2.637 2.286 1.471 3.529a1.542 1.542 0 0 1-.258 1.651l-.106.108a1.548 1.548 0 0 1-1.8.21L12 17.13l-3.686 2.167a1.542 1.542 0 0 1-1.67-.117l-.116-.097a1.537 1.537 0 0 1-.372-1.749l1.475-3.541-2.647-2.296a1.507 1.507 0 0 1-.438-1.521l.045-.135c.223-.58.78-.964 1.403-.966h3.029l1.603-3.501c.23-.489.698-.816 1.228-.867Zm0 1.25a.266.266 0 0 0-.24.15L9.993 9.76a.625.625 0 0 1-.568.365H5.996c-.106 0-.2.066-.238.165a.253.253 0 0 0 .056.272l2.978 2.583a.625.625 0 0 1 .167.713l-1.655 3.97a.292.292 0 0 0 .069.334.288.288 0 0 0 .323.05l3.987-2.345a.625.625 0 0 1 .634 0l3.97 2.334c.11.06.246.043.338-.041a.297.297 0 0 0 .063-.346l-1.65-3.958a.625.625 0 0 1 .167-.712l2.966-2.572a.257.257 0 0 0-.171-.447h-3.428a.625.625 0 0 1-.568-.365l-1.76-3.855A.268.268 0 0 0 12 5.75Z"></path>
            </svg>
        </i>
        <div class="panel__title">Logo</div>
    </div><div class="panel__body">
        <figure class="panel__logo">
        <img width="263" height="160" src="uploads/<?php echo $row['image_url'] ?>"></figure>
    </div>
    <div class="panel__footer">
        <div class="panel__action">Edit</div>
    </div>
    </a>
    </div>

    <!-- hidden logo -->
    <div id="editLogoForm" hidden >
    <form id="logoForm" enctype="multipart/form-data" class="logo-edit-form" style="display:flex;
    flex-direction:column;">
        <label for="logo" class="logo-label">Company Logo*</label>
        <div class="logo-input-container">
            <input type="file" class="form-control-file logo-input" id="logo" name="logo" accept="image/*">
            <input type="hidden" id="compNameInput" value="<?php echo $comp_name; ?>">
        </div>
        <input style="background-color:#2F4F4F;" type="submit" value="Update Logo" class="submit-button">
    </form>
    </div>


    <!-- hidden logo -->


    <div class="panel panel--vcard panel--hover" data-testid="address-card">
    <a href="#" class="panel__content address">
        <div class="panel__header">
            <i aria-hidden="true" class="svg-icon icon__house circle" role="img">
                <!-- Your SVG icon code here -->
            </i>
            <div class="panel__title">Address</div>
        </div>
        <div class="panel__body">
            <!-- Display address information here -->
            <div class="text-truncate"></div>
            <div class="text-truncate">Region: <?php echo $row['Region'] ?></div>
            <div class="text-truncate">Country: <?php echo $row['Country'] ?></div>
            <div class="text-truncate">City: <?php echo $row['City'] ?></div>
        </div>
        <div class="panel__footer address">
            <div class="panel__action edit-address-button" >Edit</div>
        </div>
    </a>
</div>

<!-- Hidden form for editing address -->
<div id="editAddressForm" hidden>
    <form id="addressForm" class="address-edit-form" style="display:flex;
    flex-direction:column;
    max-width: 300px;
    margin: 20px auto;
    padding: 15px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 5px;">
        <!-- Add input fields for editing address (e.g., Region, Country, City) -->
        <input type="hidden" id="compNameInput" value="<?php echo $comp_name; ?>">

        <label style=" color: black;font-size: 14px;margin-bottom: 5px;"  for="region">Region:</label>
        <input type="text" id="region" name="region">

        <label  style=" color: black;font-size: 14px;margin-bottom: 5px;"  for="country">Country:</label>
        <input type="text" id="country" name="country">

        <label  style=" color: black;font-size: 14px;margin-bottom: 5px;"  for="city">City:</label>
        <input type="text" id="city" name="city">

        <input type="submit" value="Update Address" class="submit-button" style=" margin-top:5px;
    background-color: #2f4f4f;
    color: #fff;
    border: none;
    padding: 4px 8px; /* Adjusted padding for a smaller button */
    font-size: 14px;
    cursor: pointer;
    border-radius: 3px;">
    </form>
</div>
    
    <!-- hidden address form end -->

    <!-- contact start -->
    <div class="panel panel--vcard panel--hover" data-testid="contact-details-card">
    <a href="#" class="panel__content contact">
        <div class="panel__header">
            <i aria-hidden="true" class="svg-icon icon__email-action-unread circle" role="img">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill-rule="nonzero" d="M21.125 5c.345 0 .625.28.625.625v12.5c0 .345-.28.625-.625.625h-17.5A.625.625 0 0 1 3 18.125v-12.5C3 5.28 3.28 5 3.625 5ZM20.5 7.134l-6.063 4.665a3.382 3.382 0 0 1-3.955.121l-.169-.121L4.25 7.135V17.5H20.5V7.134Zm-.9-.885H5.149l5.926 4.559a2.132 2.132 0 0 0 2.453.104l.147-.104L19.6 6.249Z"></path>
                </svg>
            </i>
            <div class="panel__title">Contact</div>
        </div>
        <div class="panel__body">
            
            <div class="text-truncate"><?php echo $user['email'] ?></div>
            <div class="text-truncate">
                <span class="text-muted">Phone:</span><?php echo $user['supplier_phone_number'] ?></div>
            </div>
            <div style="margin-top:-100px;margin-left:-80px" class="panel__footer contact">
                <div  class="panel__action">Edit</div>
            </div>
        </a>
    </div>
      <!-- hiddden contact -->

      <div id="editContactForm" hidden>
    <form id="contactForm" class="contact-edit-form" style="display:flex;
    flex-direction:column;
    max-width: 300px;
    margin: 20px auto;
    padding: 15px;
    background-color: #f5f5f5;
    border: 1px solid #ddd;
    border-radius: 5px;">
        <!-- Add input fields for editing address (e.g., Region, Country, City) -->
        <input type="hidden" id="compNameInput" value="<?php echo $comp_name; ?>">

        

        <label  style=" color: black;font-size: 14px;margin-bottom: 5px;"  for="email">Email:</label>
        <input type="text" id="email" name="email">

        <label  style=" color: black;font-size: 14px;margin-bottom: 5px;"  for="phonenumber">phonenumber:</label>
        <input type="text" id="phonenumber" name="phonenumber">

        <input type="submit" value="Update contact" class="submit-button" style=" margin-top:5px;
    background-color: #2f4f4f;
    color: #fff;
    border: none;
    padding: 4px 8px; /* Adjusted padding for a smaller button */
    font-size: 14px;
    cursor: pointer;
    border-radius: 3px;">
     <div id="processingMessage" style="color: gray; font-size: 12px; margin-top: 5px; display: none;">
        Processing your request...
    </div>
    </form>
</div>

    <!-- hiddden contact end -->
     <!-- contact end -->

     <!-- Contact persons start -->
    <!-- <div class="panel panel--vcard panel--hover" data-testid="contact-person-card">
        <a href="/en/my-account/company/d0300b4a-9470-4cc4-9e68-c64c8c808940/contacts" class="panel__content">
            <div class="panel__header"><i aria-hidden="true" class="svg-icon icon__account circle" role="img">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="nonzero" d="M11.75 12.625a8.75 8.75 0 0 1 8.75 8.75.625.625 0 1 1-1.25 0 7.497 7.497 0 0 0-3.768-6.507 3.75 3.75 0 0 1-7.464 0 7.495 7.495 0 0 0-3.768 6.507.625.625 0 1 1-1.25 0 8.75 8.75 0 0 1 8.75-8.75Zm0 1.25c-.877 0-1.718.15-2.5.427v.198a2.5 2.5 0 0 0 4.995.164l.005-.164.001-.198a7.488 7.488 0 0 0-2.501-.427ZM11.75 2a5 5 0 1 1 0 10 5 5 0 0 1 0-10ZM8.189 5.822l-.01.029a3.75 3.75 0 1 0 7.31 1.437 7.884 7.884 0 0 1-7.3-1.466ZM11.75 3.25c-1.2 0-2.27.564-2.956 1.442a6.624 6.624 0 0 0 6.575 1.322A3.753 3.753 0 0 0 11.75 3.25Z"></path>
            </svg>
        </i>
        <div class="panel__title">Contact persons</div>
    </div>
   

    <div class="panel__body">Your managing director, sales director, and other contacts</div>
    <div class="panel__footer">
        <div class="panel__action">Edit</div>
    </div>
    </a>
    </div> -->
<!-- Contact persons end -->
   


   

    <!-- key data starts -->

<div class="panel panel--vcard panel--hover" data-testid="additional-information-card">
    <a href="#" class="panel__content keydata">
        <div class="panel__header"><i aria-hidden="true" class="svg-icon icon__real-estate-action-building-information circle" role="img">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill-rule="nonzero" d="M8.875 2c.314 0 .574.231.618.533l.007.092v1.813l4.562-2.357a1.25 1.25 0 0 1 1.68 1.032l.008.136v5.625a.625.625 0 0 1-.533.618l-.092.007H12a.625.625 0 0 1-.092-1.243L12 8.249h2.5v-1.25h-1.25a.625.625 0 0 1-.092-1.243l.092-.007h1.25V3.255L9.209 5.991a.623.623 0 0 1-.092.048l-1.492.769v2.691c.986 0 1.795.762 1.87 1.729l.005.146v9.375h.625c.314 0 .574.231.618.533l.007.092a.625.625 0 0 1-.533.618l-.092.007h-7.5a.625.625 0 0 1-.618-.532L2 21.374v-10c0-.986.761-1.794 1.728-1.87l.147-.005h2.5V6.806c.002-.477.273-.907.641-1.093l.103-.044 1.131-.585V2.625c0-.345.28-.625.625-.625Zm7.5 8.75a5.625 5.625 0 1 1 0 11.25 5.625 5.625 0 0 1 0-11.25Zm-8.75 0h-3.75a.625.625 0 0 0-.618.532l-.007.092V12H4.5a.625.625 0 0 1 .092 1.243l-.092.007H3.25v1.25h2.5a.625.625 0 0 1 .092 1.243l-.092.007h-2.5v5h5v-9.375a.625.625 0 0 0-.533-.618l-.092-.007Zm8.75 1.25a4.375 4.375 0 1 0 0 8.75 4.375 4.375 0 0 0 0-8.75Zm0 3.75c.314 0 .574.23.618.532l.007.092v2.5a.625.625 0 0 1-1.243.093l-.007-.093v-2.5c0-.345.28-.625.625-.625Zm0-2.5.11.005a.938.938 0 1 1-.22 0l.11-.006Z"></path>
            </svg>
        </i>
        <div class="panel__title">Key data</div>
    </div>
    <div class="panel__body">
        <div class="text-truncate">
            <span class="text-muted"> Employees : <?php echo $row['Company_Size'] ?></span>
             </div>
             <div class="text-truncate">
                <span class="text-muted">Company Website URL: <?php echo $row['Website'] ?></span>
                 </div>
                 <div class="text-truncate">
                    <span class="text-muted">Year founded:<?php echo $row['Year_Founded'] ?></span>
                     </div></div><div class="panel__footer keydata">
                        <div class="panel__action">Edit</div>
                    </div>
                </a>
            </div>
        </div>

        <!-- keydata hidden starts -->
        <div id="editKeydataForm" hidden>
            <form id="keydataForm" class="keydata-edit-form" style="display:flex;
            flex-direction:column;
            max-width: 300px;
            margin: 20px auto;
            padding: 15px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;">
                <!-- Add input fields for editing address (e.g., Region, Country, City) -->
                <input type="hidden" id="compNameInput" value="<?php echo $comp_name; ?>">



                <label for="Employees" style="color: black; font-size: 14px; margin-bottom: 5px;">Employees:</label>
                    <select id="Employees" name="Employees">
                        <option value="1-50 employees">1-50 employees</option>
                        <option value="51-200 employees">51-200 employees</option>
                        <option value="201-500 employees">201-500 employees</option>
                        <option value="501-1000 employees">501-1000 employees</option>
                        <option value="1001-5000 employees">1001-5000 employees</option>
                        <option value="5000+ employees">5000+ employees</option>
                    </select>

                <label  style=" color: black;font-size: 14px;margin-bottom: 5px;"  for="website">website:</label>
                <input type="text" id="website" name="website">

                <label  style=" color: black;font-size: 14px;margin-bottom: 5px;"  for="yearfounded">yearfounded:</label>
                <input type="text" id="yearfounded" name="yearfounded">

                <input type="submit" value="Update data" class="submit-button" style=" margin-top:5px;
            background-color: #2f4f4f;
            color: #fff;
            border: none;
            padding: 4px 8px; /* Adjusted padding for a smaller button */
            font-size: 14px;
            cursor: pointer;
            border-radius: 3px;">
            </form>
        </div>

<!-- key data hidden ends -->

        <!-- key data ends -->
        <div class="section-head section-head--mono">
            <div class="section-head__heading">
                <div class="section-head__title" role="heading">Your offer – so that you are found</div>
            </div>
        </div>
        <!-- new -->
        <div class="card-deck">
            <div class="panel panel--vcard panel--hover" data-testid="listing-card">
                <a href="#" class="panel__content">
                    <div class="panel__header">
                        <i aria-hidden="true" class="svg-icon icon__layout-module circle" role="img">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill-rule="nonzero" d="M10.125 13.248c.345 0 .625.28.625.625v7.5c0 .345-.28.624-.625.624h-7.5A.625.625 0 0 1 2 21.372v-7.5c0-.345.28-.624.625-.624Zm11.25 0c.345 0 .625.28.625.625v7.5c0 .345-.28.624-.625.624h-7.5a.625.625 0 0 1-.625-.625v-7.5c0-.345.28-.624.625-.624ZM9.5 14.497H3.25v6.25H9.5v-6.25Zm11.25 0H14.5v6.25h6.25v-6.25Zm-10.625-12.5c.345 0 .625.28.625.625v7.5c0 .346-.28.626-.625.626h-7.5A.625.625 0 0 1 2 10.123v-7.5c0-.346.28-.626.625-.626Zm11.25 0c.345 0 .625.28.625.625v7.5c0 .346-.28.626-.625.626h-7.5a.625.625 0 0 1-.625-.625v-7.5c0-.346.28-.626.625-.626ZM9.5 3.248H3.25v6.25H9.5v-6.25Zm11.25 0H14.5v6.25h6.25v-6.25Zm-15.966.842.07.057L6.5 5.793l1.646-1.647a.5.5 0 0 1 .765.638l-.057.07L7.207 6.5l1.647 1.646a.5.5 0 0 1-.638.765l-.07-.057L6.5 7.208 4.854 8.854a.5.5 0 0 1-.765-.638l.057-.07L5.792 6.5 4.146 4.854a.5.5 0 0 1 .638-.765Z"></path>
                            </svg>
                        </i>
                        <div class="panel__title">Categories</div>
                    </div>
                    <div class="panel__body">Your categories with offer descriptions and other information</div>
                    <div class="panel__footer">
                        <div class="panel__action">Edit</div>
                    </div>
                </a>
            </div>
            <div class="panel panel--vcard panel--hover" data-testid="certificates-card">
                <a href="#" class="panel__content">
                    <div class="panel__header"><i aria-hidden="true" class="svg-icon icon__common-file-award circle" role="img">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill-rule="nonzero" d="M14.707 10.516a3.75 3.75 0 0 1 4.276 6.054l.489 4.036a1.18 1.18 0 0 1-1.902 1.132l-.095-.086-1.078-1.077-1.076 1.076a1.18 1.18 0 0 1-1.268.266l-.116-.053a1.177 1.177 0 0 1-.633-1.103l.502-4.154a3.75 3.75 0 0 1 .694-5.98Zm3.11 6.821a3.75 3.75 0 0 1-2.843.017l-.396 3.271 1.378-1.375a.625.625 0 0 1 .797-.073l.086.073 1.377 1.376ZM14.606 2c.442 0 .868.156 1.204.438l.122.11 2.393 2.394c.313.313.503.724.542 1.16l.007.165v2.608a.625.625 0 0 1-1.243.092l-.007-.092V6.268a.625.625 0 0 0-.119-.367l-.064-.075-2.393-2.393a.625.625 0 0 0-.343-.175l-.098-.008H5.75a.625.625 0 0 0-.618.533l-.007.092v13.75c0 .314.231.574.533.618l.092.007h5a.625.625 0 0 1 .092 1.243l-.092.007h-5a1.875 1.875 0 0 1-1.87-1.728l-.005-.147V3.875c0-.986.761-1.795 1.728-1.87L5.75 2h8.857Zm3.018 9.71a2.5 2.5 0 1 0-2.5 4.33 2.5 2.5 0 0 0 2.5-4.33Z"></path>
                        </svg>
                    </i>
                    <div class="panel__title">Certificates</div>
                </div>
                <div class="panel__body">Your certificates</div>
                <div class="panel__footer"><div class="panel__action">Edit</div>
            </div>
        </a>
    </div>
    <!-- company description starts -->
            <div class="panel panel--vcard panel--hover" data-testid="descriptions-card">
                <a href="#"class="panel__content description">
                    <div class="panel__header"><i aria-hidden="true" class="svg-icon icon__office-file-glue circle" role="img">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="nonzero" d="M16.375 2c.435 0 .855.152 1.186.423l.12.107 2.503 2.405c.322.314.519.731.559 1.175l.007.167v3.225a.625.625 0 0 1-1.243.092l-.007-.092V6.277a.626.626 0 0 0-.121-.37l-.064-.074-2.504-2.405a.625.625 0 0 0-.34-.17l-.096-.008h-12.5a.625.625 0 0 0-.618.533l-.007.092v16.25c0 .314.231.574.533.618l.092.007h4.376a.625.625 0 0 1 .092 1.243L8.251 22H3.875a1.875 1.875 0 0 1-1.87-1.728L2 20.125V3.875c0-.986.761-1.795 1.728-1.87L3.875 2h12.5Zm2.645 9.838a1.25 1.25 0 0 1 1.554.167l1.06 1.06c.414.416.484 1.063.169 1.554l-2.782 4.377c-.048.078-.104.15-.174.221l-1.72 1.716a1.25 1.25 0 0 1-1.768 0l-.884.884a.625.625 0 0 1-.343.175l-.099.008H10.75a.625.625 0 0 1-.519-.975l.059-.073 2.435-2.652-.018-.018a1.25 1.25 0 0 1-.358-.743l-.008-.141c0-.332.132-.65.366-.884l1.724-1.724c.066-.064.138-.12.208-.164Zm-5.41 7.347-1.437 1.565h1.6l.701-.701-.864-.864Zm6.083-6.293-4.39 2.793-1.712 1.713 2.204 2.204.006.005.006.007.436.436 1.716-1.712 2.79-4.391-1.056-1.055ZM9.5 15.125a.625.625 0 0 1 .092 1.243l-.092.007H5.75a.625.625 0 0 1-.092-1.243l.092-.007H9.5Zm3.125-3.75a.625.625 0 0 1 .092 1.243l-.092.007H5.75a.625.625 0 0 1-.092-1.243l.092-.007h6.875ZM17 7.625a.625.625 0 0 1 .092 1.243L17 8.875H5.75a.625.625 0 0 1-.092-1.243l.092-.007H17Z"></path>
                    </svg>
                </i>
                <div class="panel__title">Company description</div>
            </div>
            
            <div class="text-truncate" style=" width: 100%;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 250px;">
            <span style=" display: inline-block;
    max-width: 100%;
    white-space: pre-wrap;
    word-wrap: break-word;" class="text-muted">Company Overview: <?php echo $row['Company_Overview'] ?></span>
             </div>
             
            <div class="panel__footer description">
                <div class="panel__action ">Edit</div>
            </div>
        </a>
    </div>
    <!-- description hidden  starts-->
    <div id="editDescriptionForm" hidden>
            <form id="descriptionForm" class="description-edit-form" style="display:flex;
            flex-direction:column;
            max-width: 300px;
            margin: 20px auto;
            padding: 15px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;">
                <!-- Add input fields for editing address (e.g., Region, Country, City) -->
                <input type="hidden" id="compNameInput" value="<?php echo $comp_name; ?>">

                <label  style=" color: black;font-size: 14px;margin-bottom: 5px;"  for="description">description:</label>
                <!-- <input type="text" id="description" name="description"> -->
                <textarea  id="description" name="description" rows="2"required></textarea>

                <input type="submit" value="Update data" class="submit-button" style=" margin-top:5px;
            background-color: #2f4f4f;
            color: #fff;
            border: none;
            padding: 4px 8px; /* Adjusted padding for a smaller button */
            font-size: 14px;
            cursor: pointer;
            border-radius: 3px;">
            </form>
        </div>

    <!-- description hidden  ends-->

    <!-- company description ends -->

    <!-- youtube video starts -->
            <div class="panel panel--vcard panel--hover" data-testid="video-card">
                
            <a href="#" class="panel__content video">
                <div class="panel__header"><i aria-hidden="true" class="svg-icon icon__social-video-youtube-clip circle" role="img">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="nonzero" d="M18.883 4.375a3.492 3.492 0 0 1 3.492 3.492v7.6a3.492 3.492 0 0 1-3.492 3.491H5.867a3.492 3.492 0 0 1-3.492-3.491v-7.6a3.492 3.492 0 0 1 3.492-3.492Zm0 1.25H5.867a2.242 2.242 0 0 0-2.242 2.242v7.6a2.242 2.242 0 0 0 2.242 2.241h13.016a2.242 2.242 0 0 0 2.242-2.241v-7.6a2.242 2.242 0 0 0-2.242-2.242ZM9.667 7.733c0-.493.545-.792.961-.526l5.642 3.608a.625.625 0 0 1 0 1.053l-5.642 3.609a.625.625 0 0 1-.961-.527Zm1.249 1.141v4.934l3.857-2.467-3.857-2.467Z"></path>
                </svg>
            </i>
            <div class="panel__title">Video</div>
            </div>
           <a href="<?php echo $row['yt_link'] ?>"> <div class="panel__body"><?php echo $row['yt_link'] ?></div> </a>
            <div class="panel__footer video">
                <div class="panel__action ">Add  Edit</div>

            </div>
            </a>
            </div>

            <!-- hidden video starts -->
            <div id="editVideoForm" hidden>
            <form id="videoForm" class="video-edit-form" style="display:flex;
            flex-direction:column;
            max-width: 300px;
            margin: 20px auto;
            padding: 15px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;">
                <!-- Add input fields for editing address (e.g., Region, Country, City) -->
                <input type="hidden" id="compNameInput" value="<?php echo $comp_name; ?>">

                <label  style=" color: black;font-size: 14px;margin-bottom: 5px;"  for="video">Youtuve video link:</label>
                <input type="text" id="video" name="video">
                <!-- <textarea  id="description" name="description" rows="2"required></textarea> -->

                <input type="submit" value="Update data" class="submit-button" style=" margin-top:5px;
            background-color: #2f4f4f;
            color: #fff;
            border: none;
            padding: 4px 8px; /* Adjusted padding for a smaller button */
            font-size: 14px;
            cursor: pointer;
            border-radius: 3px;">
            </form>
        </div>
        <!-- hidden video ends -->
    <!-- youtube video ends -->

    <!-- file starts -->
    <div class="panel panel--vcard panel--hover" data-testid="video-card">
                
                <a href="#" class="panel__content file">
                    <div class="panel__header"><i aria-hidden="true" class="svg-icon icon__social-file-youtube-clip circle" role="img">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="nonzero" d="M18.883 4.375a3.492 3.492 0 0 1 3.492 3.492v7.6a3.492 3.492 0 0 1-3.492 3.491H5.867a3.492 3.492 0 0 1-3.492-3.491v-7.6a3.492 3.492 0 0 1 3.492-3.492Zm0 1.25H5.867a2.242 2.242 0 0 0-2.242 2.242v7.6a2.242 2.242 0 0 0 2.242 2.241h13.016a2.242 2.242 0 0 0 2.242-2.241v-7.6a2.242 2.242 0 0 0-2.242-2.242ZM9.667 7.733c0-.493.545-.792.961-.526l5.642 3.608a.625.625 0 0 1 0 1.053l-5.642 3.609a.625.625 0 0 1-.961-.527Zm1.249 1.141v4.934l3.857-2.467-3.857-2.467Z"></path>
                    </svg>
                </i>
                <div class="panel__title">file</div>
                </div>
               <div class="company-presentation mb-3" style="height: 200px;">
<?php if (!empty($row['file'])): ?>
    <embed  src="company_files/<?php echo $row['file'] ?>" type="application/pdf" width="100%" height="100%">
<?php endif; ?>
</div>

<div class="panel__footer file">
    <div class="panel__action">Add or Edit</div>
</div>
                </a>
                </div>

    <!-- file hidden starts -->
    <div id="editFileForm" hidden>
            <form id="fileForm" enctype="multipart/form-data" class="file-edit-form" style="display:flex;
            flex-direction:column;
            max-width: 300px;
            margin: 20px auto;
            padding: 15px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;">
                <!-- Add input fields for editing address (e.g., Region, Country, City) -->
                <input type="hidden" id="compNameInput" value="<?php echo $comp_name; ?>">

                <label  style=" color: black;font-size: 14px;margin-bottom: 5px;"  for="video">upload your file</label>
                <input type="file" id="file" name="file" accept=".pdf">

                <input type="submit" value="Update data" class="submit-button" style=" margin-top:5px;
            background-color: #2f4f4f;
            color: #fff;
            border: none;
            padding: 4px 8px; /* Adjusted padding for a smaller button */
            font-size: 14px;
            cursor: pointer;
            border-radius: 3px;">
            </form>
        </div>
    
    <!-- file hidden ends -->
    <!-- file ends -->

<div class="panel panel--vcard" data-testid="customer-support-card">
    <div class="panel__content"><div class="panel__header">
        <i aria-hidden="true" class="svg-icon icon__company-profile circle" role="img">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill-rule="nonzero" d="M10.5 16.75a.625.625 0 0 1 .093 1.243l-.092.007H5.5a.625.625 0 0 1-.092-1.243l.092-.007h5Zm7.5-6.5a.625.625 0 0 1 .093 1.243l-.092.007H13a.625.625 0 0 1-.092-1.243L13 10.25h5ZM19 3a2.625 2.625 0 0 1 2.62 2.459l.005.166v13a2.625 2.625 0 0 1-2.459 2.62L19 21.25H5a2.625 2.625 0 0 1-2.62-2.459l-.005-.166v-13a2.625 2.625 0 0 1 2.459-2.62L5 3h14Zm1.375 5H3.625v10.625c0 .715.545 1.302 1.243 1.369L5 20h14c.715 0 1.302-.545 1.369-1.243l.006-.132V8ZM10.5 9.25c.314 0 .574.231.618.533l.007.092v5a.625.625 0 0 1-.533.618l-.092.007h-5a.625.625 0 0 1-.618-.533l-.007-.092v-5c0-.314.231-.574.533-.618L5.5 9.25h5Zm7.5 4a.625.625 0 0 1 .093 1.243l-.092.007H13a.625.625 0 0 1-.092-1.243L13 13.25h5ZM9.876 10.5h-3.75v3.75h3.75V10.5ZM19 4.25H5c-.715 0-1.302.545-1.369 1.243l-.006.132V6.75h16.75V5.625c0-.715-.545-1.302-1.243-1.369L19 4.25Z"></path>
            </svg>
        </i>
        <div class="panel__title">Order data</div>
    </div>
    <div class="panel__body">
        <p>Do you want to customize your order?<br>We look forward to hearing from you:</p>
        <div class="panel__link"><i aria-hidden="true" class="svg-icon icon__phone" role="img">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill-rule="nonzero" d="m4.179 2.633-.645.645a5.238 5.238 0 0 0-.842 6.305l.14.23a42.242 42.242 0 0 0 11.351 11.355l.045.028c2.05 1.305 4.758 1.008 6.494-.728l.645-.645a2.163 2.163 0 0 0 0-3.057l-2.718-2.717a2.164 2.164 0 0 0-2.894-.148l-.14.127a.91.91 0 0 1-1.312.022L9.952 9.7a.913.913 0 0 1-.062-1.22l.084-.093a2.16 2.16 0 0 0-.022-3.034l-2.716-2.72a2.163 2.163 0 0 0-3.058 0Zm2.174.884 2.716 2.72a.911.911 0 0 1 .08 1.199l-.207.23a2.17 2.17 0 0 0 .127 2.918l4.349 4.35a2.16 2.16 0 0 0 2.917.128l.234-.212c.336-.273.865-.248 1.197.084l2.717 2.715a.913.913 0 0 1 0 1.29l-.645.646a3.986 3.986 0 0 1-4.775.654l-.215-.129A40.96 40.96 0 0 1 4.253 9.674l-.387-.564a3.984 3.984 0 0 1 .552-4.948l.645-.645a.913.913 0 0 1 1.29 0Z"></path>
            </svg>
        </i>
        <a href="#"><?php echo $user['supplier_phone_number'] ?></a>
    </div>
    <div class="panel__link">
        <i aria-hidden="true" class="svg-icon icon__email-action-unread" role="img">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill-rule="nonzero" d="M21.125 5c.345 0 .625.28.625.625v12.5c0 .345-.28.625-.625.625h-17.5A.625.625 0 0 1 3 18.125v-12.5C3 5.28 3.28 5 3.625 5ZM20.5 7.134l-6.063 4.665a3.382 3.382 0 0 1-3.955.121l-.169-.121L4.25 7.135V17.5H20.5V7.134Zm-.9-.885H5.149l5.926 4.559a2.132 2.132 0 0 0 2.453.104l.147-.104L19.6 6.249Z"></path>
            </svg>
        </i>
        <a href="#"><?php echo $user['email'] ?></a></div></div></div></div>
                <div class="panel panel--vcard panel--hover" data-testid="catalog-card">
            <a class="panel__overlay" href="#">
                <div class="panel__overlay-figure"><div class="package-upgrade-visual package-upgrade-visual--inline">
                    <figure class="corporate-logo corporate-logo--package package-upgrade-visual__logo" title="For Free">
                        <img class="corporate-logo__icon" src="https://d18yn9dcojt05d.cloudfront.net/wlw_assets/images/logos/free.4a0791b8.svg">
                    </figure>
                    <i aria-hidden="true" class="svg-icon icon__arrow-right package-upgrade-visual__arrow" role="img">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill-rule="nonzero" d="M7.141 2.183a.625.625 0 0 1 .798-.072l.086.072 8.933 8.933a1.25 1.25 0 0 1 .095 1.662l-.094.106-8.934 8.933a.625.625 0 0 1-.956-.797l.072-.087L16.075 12 7.14 3.067a.625.625 0 0 1 0-.884Z"></path>
                        </svg>
    </i>
<br><br>
<a class="button button--primary" href="#">Upgrade now</a></div>
</div>

</div>
</div>
</div>
<script src="company_profile.js"></script>
</main>