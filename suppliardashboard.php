<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION["comp_name"])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Include your database connection file
require('dbcon.php');

// Fetch the user's first name from the database using the email
// $user_email = $_SESSION["user_email"];
$comp_name=$_SESSION["comp_name"];


// Use a prepared statement to prevent SQL injection
if (isset($_SESSION["user_email"])) {
    $email=$_SESSION["user_email"];
    $stmt = $conn->prepare("SELECT * FROM userdata WHERE email = ?");
    $stmt->bind_param("s", $email);
}
else{
    $stmt = $conn->prepare("SELECT * FROM userdata WHERE comp_name = ?");
    $stmt->bind_param("s", $comp_name);
}




// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();



// Check if the user is found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_first_name = $row["first_name"];
    $user_last_name= $row['last_name'];
} else {
    // Handle the case where user data is not found
    $user_first_name = "User";
}

$firstInitial = !empty($row['first_name']) ? strtoupper($row['first_name'][0]) : '';
$lastInitial = !empty($row['last_name']) ? strtoupper($row['last_name'][0]) : '';


$_SESSION['user_first_name']=$user_first_name;
$_SESSION['user_last_name']=$user_last_name;



// Close the statement
$stmt->close();

// listing
$stmt_listings = $conn->prepare("SELECT * FROM add_listing WHERE comp_name = ?");
$stmt_listings->bind_param("s", $comp_name);

// Execute the statement
$stmt_listings->execute();

// Get the result
$result_listings = $stmt_listings->get_result();
$stmt_listings = $result_listings->fetch_assoc();

$stmt_customer_reference = $conn->prepare("SELECT * FROM customer_reference WHERE comp_name = ?");
$stmt_customer_reference->bind_param("s", $comp_name);

// Execute the statement
$stmt_customer_reference->execute();

// Get the result
$result_customer_reference = $stmt_customer_reference->get_result();

// Close the statement
$stmt_customer_reference->close();

// finance
$stmt_finance = $conn->prepare("SELECT * FROM finance WHERE comp_name = ?");
$stmt_finance->bind_param("s", $comp_name);
$stmt_finance->execute();
$result_finance = $stmt_finance->get_result();
$finance_row = $result_finance->fetch_assoc();
$stmt_finance->close();

// Close the database connection
$conn->close();

// Rest of your HTML and PHP code for suppliardashboard.php goes here
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
      <!--=============== REMIXICONS for navbar styling ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="suppnav.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="index_hero.css">


    <!-- <link rel="stylesheet" href="style2.css"> -->

  
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet"> -->
    <script defer src="app.js"></script>
    <!--Link to jQuery CDN (this runs the entire function)-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--Bootstrap 4.1 CDN for button and container-->

<!-- multiselect -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
<link rel="stylesheet" href="multi_select_tag.css">
    <script src="multi_select_tag.js"></script>

    <title style="color: black;">VoltBridge</title>

    
        
        <style>
            
 

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url(./images/home1.png);
    background-size: cover;
     
    background-color: whitesmoke; /* Fallback color */
    color: #333;
    font-family: 'Poppins', sans-serif;
    position: relative; /* Ensure the body is positioned relatively for absolute positioning of overlay */
    overflow-y:hidden;
}
.body::after{
    background: rgba(23, 26, 31, 0.8);
}
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)); /* Black overlay with 50% opacity */
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
            background: rgba(23, 26, 31, 0.5);
    font-family: 'Poppins', sans-serif;
    /* background: #a9efc8; */
   
        }

        .left-side {
            width: 20%;
            background-color: white;
            padding: 20px;
            border: 1px solid rgba(0, 0, 0, 0.2); /* You can change the color code as needed */
            border-radius: 10px;
            margin-top: 1vw; 
            height: 800px;
        }

        .right-side {
    width: 80%;
    background-color: rgba(249, 249, 249, 0.2); /* Transparent white with 80% opacity */
    padding: 20px;
    border-radius: 10px;
   /* overflow-y: auto; */
    height: 100%!important;
    margin-top: 1vw;
    margin-bottom:10px;
    margin-right:1vw;
}



        .icon {
  vertical-align: middle; /* Align the icon vertically */
}

.text {
  line-height: 1.5; /* Adjust the line height as needed to vertically align with the icon */
  margin-left: 5px; /* Add some space between the icon and the text */
}
.textarea{
    resize:verticle !important;
}
/* Style the container to display flex and flex horizontally */
/* Style the card container */


/* Style the icon */
.material-icons {
  font-size: 36px;
  margin-right: 10px;
}

.collapsible {
            background-color: #f1f1f1;
            color: black!important; /* Change text color to black */
            cursor: pointer;
            padding: 18px!important;
            width: 100%;
            text-align: left;
            border: none;
            border-radius: 30px!important; 
            outline: none;
            font-size: 18px;
            transition: 0.4s;
            border-radius: 10px; /* Add rounded border */
            margin-bottom: 10px; /* Add space between tabs */
            overflow-y: auto;
            
    font-family: 'Poppins', sans-serif;
    /* background: #a9efc8; */
  
        }

         .collapsible:hover {
            background-color: #198754!important;
            color:white!important;
        }
        .collapsible.active {
    background-color: #00473c;
    color: white!important;
}

/* Style for active form container */
.form-container.active {
    border: 2px solid #23D375FF;
    border-radius: 5px;
    padding: 10px;
    background-color: #23D375FF;
    margin-top: 20px;
}
  
  .save-button-container {
    text-align: center;
  }

        .section-container {
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 5px;
            height: 100%;
            overflow-y: auto!important;
  
        }


        
        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            color:black;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px; /* Add rounded border to content */
            margin-bottom: 200px; /* Add space between sections */
        }
        /* Add these styles for the forms */
        .form-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: #f9f9f9;
    padding: 20px;
    border: 3px solid rgb(32, 121, 72);
    border-radius: 15px;
    margin-bottom: 20px;
    position: relative;
}
.form-container.active{
    border:darkgreen;
}
textarea{
    resize:verticle;
}

        /* Style for the form labels */
        .form-container label {
        width: 100%;
        margin-bottom: 10px;
        font-weight: bold;
        color: black; /* Set label text color to white */
    }

    .form-container input,
    .form-container select {
        width: 100%; /* Set input width to 100% */
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
        background: #e7e9ed !important;
        color:black !important;
    }

        /* Style for the Save button */
        .form-container button {
    background-color: white;
    border: none;
    /* padding: 10px 20px; */
    border-radius: 5px;
    cursor: pointer;
    color: white;
    
    /* margin-top: 10px; Add some top margin for separation */
}


/* Change placeholder color */
input::placeholder {
  color: grey; /* Replace with the desired color code */
}
*{
    resize:verticle;
}

        .form-container button:hover {
            background-color: lightgrey;
        }
       .icons-container {
    /* Add styles for the icons container */
    display: flex;
    align-items: center;
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
  }

  .icons-container i {
    /* Styles for the icons */
    margin-left: 5px; /* Adjust as needed */
    font-size: 18px; /* Adjust as needed */
    color: #555; /* Adjust the color as needed */
  }

    #featureTags {
            display: inline-flex;
            flex-wrap: wrap;
            width: fit-content;
            flex-direction:row;
        }
        .tag {
    background-color: #e6fffa;
    margin: 5px;
    padding: 5px;
    border-color: #8ee9dd;
    border-style: solid; /* Specify the border style */
    border-radius: 50px; /* Adjust border-radius to your preference */
    display: flex;
    align-items: center;
    position: relative;
}


    .tag .tag-text {
        color:#358081;
        margin-right: 5px;
    }
    
    .close-icon-container {
  cursor: pointer; /* Change cursor to pointer on hover */
}


    
    .mult-select-tag button:first-child {
    width: 1rem; /* Adjust the width as needed */
    height: 90%; /* Adjust the height as needed */
    background-image: url("https://cdn1.iconfinder.com/data/icons/basic-ui-elements-coloricon/21/08-512.png"); /* Replace 'downwards_arrow_image_url.png' with the URL of your downwards arrow image */
    background-repeat: no-repeat; /* Ensure the background image is not repeated */
    background-position: center; /* Center the background image within the button */
    background-size: contain; /* Ensure the background image fits within the button */
    /* Other styling properties */
}
.business{
    color: rgb(50, 123, 44);
    border-color: rgb(146, 230, 129);
    background: rgb(234, 255, 230);
    Display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 0.2rem 0.4rem;
    margin: 0.2rem;
    font-weight: 500;
    border: 1px solid;
    border-radius: 9999px
}
.certificate{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0.2rem 0.4rem;
    margin: 0.2rem;
    font-weight: 500;
    border: 1px solid;
    border-radius: 9999px;
    color: rgb(44, 122, 123);
    border-color: rgb(129, 230, 217);
    background: rgb(230, 255, 250);
}
.location{
    background-color: transparent;
    margin: 5px;
    padding: 5px;
    border-radius: 5px;
    border: 2px solid darkgreen;
    display: flex;
    align-items: center;

}
.financial-box {
        width: 18%;
        margin-bottom: 10px;
    }

    .financial-box-container {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .calculation-box {
        margin-top: 20px;
    }

    .calculation-box label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .calculation-box input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

#supplierType {
    margin-top:5px;
  display: flex;
  flex-direction: row;
}

/* Styling for individual checkboxes */
#supplierType input[type="checkbox"] {
  /* margin-bottom: 5px; */
  margin-left: 8px; 
  width: 16px;
  height: 16px;

}

/* Styling for labels */
#supplierType label {
    margin-top:-4px;
  margin-left: 5px;
  width: 130px;
}


        #locationTags {
            display: flex;
            flex-wrap: wrap;
            
        }

        .tag {
            background-color: transparent;
    margin: 5px;
    padding: 5px;
    border-radius: 5px;
    border: 2px solid darkgreen;
    display: flex;
    align-items: center;
    }

    .tag .tag-text {
        margin-right: 5px;
    }

    .tag .tag-remove {
        cursor: pointer;
    }

    .remove-tag {
         /* Adjust the font size to make the button smaller */
        cursor: pointer;
        font-size:5px;
      
    }
    .remove-text{
        width: 1rem;
    margin-left: 0.5rem;
    height: 1rem;
    cursor: pointer;
    border-radius: 9999px;
    display: block;
    color:#327B2C;
    }
    
    /* Profile circle styles */
.profile-circle {
    display: flex;
    align-items: center;
}

.profile-image {
    width: 40px;
    height: 40px;
    background-color: #23d375;
    color: #fff;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 20px;
    font-weight: bold;
    border: 2px solid green;
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
 
@media screen and (max-width: 1118px) {
    .left-side {
        display: none;
    }
    .right-side{
       width:100%;
       margin-left:-10px;
    }
    .collapsible{
        font-size:12px;
    }
    .section-container{
        padding:0px;
    }
    #supplierType {
    width: 100%; /* Or a specific pixel value if needed */
    overflow: auto; /* Optionally display a scrollbar */
  }
  .business{
      width:100%;
  }
  #featureTags {
            display: inline-flex;
            flex-wrap: wrap;
            width: fit-content;
            flex-direction:column;
        }
  
}

</style>



<script>
        document.addEventListener("DOMContentLoaded", function () {
            // Add event listener to the "Add Products" tab
            document.getElementById('addProductsTab').addEventListener('click', function () {
                // Set comp_name as a session variable
                <?php echo "var compName = '" . $comp_name . "';"; ?>
                
                // Use AJAX to set the session variable
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'set_session.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('comp_name=' + encodeURIComponent(compName));
                
                // Redirect to the "Add Products" page
                window.location.href = 'add_products.php';
            });
        });
    </script>
</head>
<body>

 <div>
   <!-- navbar styling code in navbar_resp.css and script in navbar_resp.js - these files linked in index.php, 
       navbar_resp.php contains whole html code for navbar, saved as backup. -->

       <!-- navbar header is being called from headernav.php in assets folder. -->
<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."suppnav.php"); ?>
</div>

<div class="split-container" style="margin-top:0px">
        <div class="left-side" style="margin-left:20px; margin-top:6rem;">
            <!-- Content for the left side -->
            <h2></h2>
<!-- Left side content -->
    <ul id="dashboardSidebarMenu"></ul>

    <script>
         const menuItems = [
            //{
             //   icon: "dashboard", // Google Material Icon for Dashboard
             //   label: "dashboard",
             //   path: "suppliardashboard.php",
           // },
            {
                icon: "dashboard", // Google Material Icon for Dashboard
                label: "Add User",
                path: "add_user.php",
            },
            {
                icon: "person", // Google Material Icon for Profile
                label: "Profile",
                path: "suppliardashboard.php",
            },
            {
                icon: "format_list_bulleted", // Google Material Icon for My Listing
                label: "My Listing",
                path: "my_listing.php?company=<?php echo $comp_name ?>",
            },
           {
               icon: "favorite", // Google Material Icon for Favorites
               label: "Profile Preview",
               path: "newpage.php?company=<?php echo $comp_name ?>",
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


</div>
<div class="right-side" style="margin-left: 5px; max-height: 90vh; margin-top:6rem;">
    <!-- New container with light grey background -->
    <div class="section-container">
        <!-- Collapsible tabs -->
      <!--  <div class="profilestregth" id="profilestregth">Your Profile Strength</div>
        <div class="progress-bar">
  <div class="progress" id="progress"></div>
</div>

<div class="completion-text" id="completionText">Profile Completion: 0%</div> -->

        <h3 class="water-text">Please update your profile !</h3>
        
            <button class="collapsible" id="contactTab">Contact Info</button>
            
            
                <!-- Form for contact tab -->
                <div class="form-container">
                <form id="updateForm" style="display:flex;flex-direction:column">
    <label for="firstName">First Name:</label>
    <input type="text" value="<?php echo $row['first_name'] ?>" id="firstName" name="firstName" placeholder="First Name" required>

    <label for="lastName">Last Name:</label>
    <input value="<?php echo $row['last_name'] ?>" type="text" id="lastName" name="lastName" placeholder=" Last Name" required>

    <label for="email">Email:</label>
    <input type="email" value="<?php echo $row['email'] ?>" id="email" name="email" placeholder="Email" required>

    <label for="phone">Phone Number:</label>
    <input type="tel" id="phone" value="<?php echo $row['supplier_phone_number'] ?>" name="phone" placeholder="Phone Number " required>

    <label for="businessTitle">Business Title:</label>
    <input type="text" id="businessTitle" value="<?php echo $row['business_title'] ?>"  name="businessTitle" placeholder="Business Title" required>

    <div class="save-button-container">
        <button type="button" onclick="submitForm()" style="background-color:#198754; width:80px">Save</button>
    </div>
</form>
      
    </div>
                <!-- Save button for contact tab -->



                <button class="collapsible" id="companyTab">Company Info</button>
<div class="form-container">
<form id="updateForm" action="update_companyinfo.php" method="post" style="display:flex;flex-direction:column" enctype="multipart/form-data">
    <label for="companyname">Company Name:</label>
    <input type="text" id="companyname" value="<?php echo $stmt_listings['comp_name'] ?>" name="companyname" placeholder="Comapny Name" required>

    <label for="address">Address:</label>
    <input type="text" id="Region" name="Region" required placeholder="Region" value="<?php echo $stmt_listings['Region'] ?>">
    <input type="text" id="city" name="city" required placeholder="City" value="<?php echo $stmt_listings['city'] ?>">
    <!-- <input type="text" id="state" name="state" required placeholder="State" value=""> -->
    <!-- <input type="text" id="pincode" name="pincode" required placeholder="Pincode" value=""> -->
    <input type="text" id="country" name="country" required placeholder="Country" value="<?php echo $stmt_listings['Country'] ?>">

    <label for="yearFounded">Year Founded:</label>
    <input type="text" id="yearFounded" name="yearFounded"placeholder="Year Found" required value="<?php echo $stmt_listings['Year_Founded'] ?>">

    <label for="numEmployees">Number of Employees:</label>
    <div id="featureTags">
    <div class="tag" ><span class="tag-text"> <?php echo $stmt_listings['Company_Size'] ?></span></div></div>
    <!-- <input type="text" id="numEmployees" name="numEmployees"placeholder="Number of Employee" required value=""> -->
    <select class="form-control" id="numEmployees" name="numEmployees">
                                        <option value="1-50 employees">1-50 employees</option>
                                        <option value="51-200 employees">51-200 employees</option>
                                        <option value="201-500 employees">201-500 employees</option>
                                        <option value="501-1000 employees">501-1000 employees</option>
                                        <option value="1001-5000 employees">1001-5000 employees</option>
                                        <option value="5000+ employees">5000+ employees</option>
                                    </select>

    <label for="companyWebsite">Company Website:</label>
    <input type="text" id="companyWebsite" name="companyWebsite" placeholder="Comapny Website" required value="<?php echo $stmt_listings['Website'] ?>">

    <span ><label for="logo">Logo:</label> <img height="100" width="100" src="uploads/<?php echo $stmt_listings['image_url'] ?>" alt=""> </span>
    <input type="file" id="logo" name="logo" accept="image/*" placeholder="Logo" >

    <input type="hidden" value="<?php echo $stmt_listings['image_url'] ?>" name="hiddenimage" id="hiddenimage">

    <label for="companyVideo">Company Video:</label><small>(Provide a youtube link of your company video)</small>
    <input type="text" id="companyVideo"  name="companyVideo" placeholder="Company Video" value="<?php echo $stmt_listings['yt_link'] ?>">

    <label for="companyPresentation">Company Presentation/Brochure:</label><small>(Add your company presentation or upload brochure in pdf format)</small>
    <?php
    if (!empty($stmt_listings['file'])) {
    echo '<a href="company_files/' . $stmt_listings['file'] . '">current</a>';
    }
    ?>

    <input type="file" id="companyPresentation" name="companyPresentation" accept=".pdf" placeholder="Company Presentation"  >
    <input type="hidden" value="<?php echo $stmt_listings['file'] ?>" name="hiddenfile" id="hiddenfile">

    <label for="company_overview">Company Overview</label><small>(Short one sentence about company)</small>
    <textarea type="text" id="company_overview" rows="4" name="company_overview" style="resize:verticle;" placeholder="short one sentence about company" required > <?php echo $stmt_listings['Company_Overview'] ?> </textarea>
    
    <label for="about_us">About us</label><small>(Detailed description about the company including history, your unique value proposition, idea/story about the brand and Why customers should choose you etc.)</small>
    <textarea type="text" id="about_us" rows="4" name="about_us" placeholder="About us" required > <?php echo $stmt_listings['about_us'] ?> </textarea>

    <label for="company_images">Company Images</label><small>Supported formats: JPG, JPEG, PNG</small>
<input type="file" id="company_images" name="company_images[]" placeholder="upload company images to showcase your factory, office space, machineries, testing capabilities etc." multiple accept="image/*"  />

<input type="hidden" value="<?php echo $stmt_listings['company_images'] ?>" name="hidden_company_images" id="hidden_company_images">


    <div class="save-button-container">
    <button type="submit" style="background-color:#198754; width:80px">Save</button>
  </div>

    </form>
</div>


<button class="collapsible" id="capabilitiesTab">Capabilities Info</button>
<div class="form-container">
<form class="capability" id="updateForm" action="update_capabilitiesinfo.php" method="POST" style="display:flex;flex-direction:column" >

    <label for="businessCategories">Business Categories:</label>
 
    <div style="display:flex; flex-direction:row">
    <?php
$categories = explode(',', $stmt_listings['Categories']);

foreach ($categories as $index => $category) {
    echo '<div id="featureTags">';
    echo '<div class="business" data-category="' . trim($category) . '"><span class="tag-text">' . trim($category) . '</span><span class="remove-tag">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="item-close-svg">
    <line x1="18" y1="6" x2="6" y2="18"></line>
    <line x1="6" y1="6" x2="18" y2="18"></line>
  </svg>
</span>
</div>';
    echo '</div>';
}
?>
    </div>
    <input type="hidden" value="<?php echo $stmt_listings['Categories'] ?>" name="modifiedCategories" id="modifiedCategoriesInput">
    <select  name="businessCategories[]" id="businessCategories" multiple>
                    <option value="3D Printing">3D Printing</option>
<option value="3D Printing parts">3D Printing parts</option>
<option value="Alternate Fuel System">Alternate Fuel System</option>
<option value="Aluminium die casting">Aluminium die casting</option>
<option value="Automation services">Automation services</option>
<option value="Bearings">Bearings</option>
<option value="Bevel gears">Bevel gears</option>
<option value="Boxes">Boxes</option>
<option value="Brakes">Brakes</option>
<option value="Bushings">Bushings</option>
<option value="Busbars">Busbars</option>
<option value="Capacitors">Capacitors</option>
<option value="Castings">Castings</option>
<option value="Casting parts">Casting parts</option>
<option value="Charge Air Coolers">Charge Air Coolers</option>
<option value="Charging">Charging</option>
<option value="Charging Infrastructure">Charging Infrastructure</option>
<option value="Charging modules">Charging modules</option>
<option value="Clutch">Clutch</option>
<option value="Coatings">Coatings</option>
<option value="Cold Stamping">Cold Stamping</option>
<option value="Cold plates">Cold plates</option>
<option value="Consulting">Consulting</option>
<option value="Copper parts">Copper parts</option>
<option value="Digital Display">Digital Display</option>
<option value="Drivetrain/ Driveunit">Drivetrain/ Driveunit</option>
<option value="Electric Motors parts">Electric Motors parts</option>
<option value="Electric Vehicle">Electric Vehicle</option>
<option value="Electrical">Electrical</option>
<option value="Electronic Control Unit">Electronic Control Unit</option>
<option value="Electronics">Electronics</option>
<option value="Energy Storage products">Energy Storage products</option>
<option value="EV Battery Management">EV Battery Management</option>
<option value="EV Battery Shipping">EV Battery Shipping</option>
<option value="EV Battery Storage">EV Battery Storage</option>
<option value="EV Battery recycling">EV Battery recycling</option>
<option value="Extrusions">Extrusions</option>
<option value="Fasteners">Fasteners</option>
<option value="Forged parts">Forged parts</option>
<option value="Forging machining">Forging machining</option>
<option value="Freight forwarder services">Freight forwarder services</option>
<option value="Gaskets">Gaskets</option>
<option value="Gauges">Gauges</option>
<option value="Gears">Gears</option>
<option value="Gears & Transmission">Gears & Transmission</option>
<option value="High precision Plastic Components">High precision Plastic Components</option>
<option value="Hot Stamping">Hot Stamping</option>
<option value="Infotainment systems">Infotainment systems</option>
<option value="Injection mould">Injection mould</option>
<option value="Insulation parts">Insulation parts</option>
<option value="Instrument Clusters">Instrument Clusters</option>
<option value="Interior & Exterior">Interior & Exterior</option>
<option value="IT Services">IT Services</option>
<option value="Labels">Labels</option>
<option value="Laser Processing">Laser Processing</option>
<option value="Lubrication parts">Lubrication parts</option>
<option value="Machined parts">Machined parts</option>
<option value="Machining">Machining</option>
<option value="Magnets">Magnets</option>
<option value="Mechatronics">Mechatronics</option>
<option value="Metal parts">Metal parts</option>
<option value="Microcellular polyurethane">Microcellular polyurethane</option>
<option value="Packaging Solutions">Packaging Solutions</option>
<option value="PCBA">PCBA</option>
<option value="Plastic">Plastic</option>
<option value="Plastic Injection Moulding parts">Plastic Injection Moulding parts</option>
<option value="Pumps">Pumps</option>
<option value="Prototype Tooling">Prototype Tooling</option>
<option value="Prototyping">Prototyping</option>
<option value="Punched parts">Punched parts</option>
<option value="Radiators">Radiators</option>
<option value="Raw Materials">Raw Materials</option>
<option value="Rubber">Rubber</option>
<option value="Rubber Injection Moulding parts">Rubber Injection Moulding parts</option>
<option value="Rubber components">Rubber components</option>
<option value="Seats">Seats</option>
<option value="Sensors">Sensors</option>
<option value="Sheet Metal Stamping">Sheet Metal Stamping</option>
<option value="Sheet metal forming">Sheet metal forming</option>
<option value="Simulation Services">Simulation Services</option>
<option value="Software Solution">Software Solution</option>
<option value="Sorting">Sorting</option>
<option value="Spare parts">Spare parts</option>
<option value="Springs">Springs</option>
<option value="Stator parts">Stator parts</option>
<option value="Stamped parts">Stamped parts</option>
<option value="Switches">Switches</option>
<option value="Thermals">Thermals</option>
<option value="Thermoplastic">Thermoplastic</option>
<option value="Tools">Tools</option>
<option value="Tube forming">Tube forming</option>
<option value="Valves and Actuators">Valves and Actuators</option>
<option value="Vehicle glass">Vehicle glass</option>
<option value="Winding">Winding</option>
                </select>
<br>

    <label for="certification">Certification:</label>

    <div style="display:flex;flex-direction:row">
    <?php
$certificates = explode(',', $stmt_listings['Company_Certificates']);

foreach ($certificates as $certificate) {
    echo '<div id="certificateTags">';
    echo '<div class="certificate" data-certificate="' . trim($certificate) . '"><span class="tag-text">' . trim($certificate) . '</span><span class="remove-tag">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="item-close-svg">
    <line x1="18" y1="6" x2="6" y2="18"></line>
    <line x1="6" y1="6" x2="18" y2="18"></line>
  </svg>
</span>
</div>';
    echo '</div>';
}
?>
    </div>
    <input type="hidden" value="<?php echo $stmt_listings['Company_Certificates'] ?>" name="modifiedCertificates" id="modifiedCertificatesInput">

<select name="companyCertificates[]" id="companyCertificates" multiple>
    <option value="BS-OHSAS 18001">BS-OHSAS 18001</option>
<option value="DIN EN ISO 14001">DIN EN ISO 14001</option>
<option value="DIN EN ISO 9001">DIN EN ISO 9001</option>
<option value="DIN ISO 9001:2015">DIN ISO 9001:2015</option>
<option value="EMS 14001:2009">EMS 14001:2009</option>
<option value="EN 9100:2018">EN 9100:2018</option>
<option value="IATF 16949">IATF 16949</option>
<option value="ISO 450001">ISO 450001</option>
<option value="ISO 50001: 2018">ISO 50001: 2018</option>
<option value="ISO/IEC 17025">ISO/IEC 17025</option>
<option value="ISO/TS 16949">ISO/TS 16949</option>
<option value="ISO TS: 16862">ISO TS: 16862</option>
<option value="ISO 9002:1994">ISO 9002:1994</option>
<option value="ISO/TS 16949:2002">ISO/TS 16949:2002</option>
<option value="Not Applicable">Not Applicable</option>
<option value="OHSAS 18001:2007">OHSAS 18001:2007</option>
<option value="QS 9000">QS 9000</option>
<option value="QS 9000:1998">QS 9000:1998</option>
<option value="TS 16949">TS 16949</option>


</select>

<br>

<label for="supplierType">Supplier Type:</label>
<div style="display:flex;flex-direction:row">

<?php

// Assuming $stmt_listings['Supplier_type'] contains comma-separated values

$types = explode(',', $stmt_listings['Supplier_type']);

// Array to hold checked status for each checkbox
$checkedStatus = array(
    'Distributor' => '',
    'Manufacturer' => '',
    'Service Provider' => ''
);

// Loop through each type
foreach ($types as $type) {
    // Check if the type exists in the checkedStatus array
    if (array_key_exists(trim($type), $checkedStatus)) {
        // Set the checked status to 'checked' for the corresponding checkbox
        $checkedStatus[trim($type)] = 'checked';
    }
}

// Output checkboxes with checked status
echo '<div id="supplierType">';
echo '<input type="checkbox" id="distributor" name="supplierType[]" value="Distributor" ' . $checkedStatus['Distributor'] . '>';
echo '<label for="distributor">Distributor</label><br>';
echo '<input type="checkbox" id="manufacturer" name="supplierType[]" value="Manufacturer" ' . $checkedStatus['Manufacturer'] . '>';
echo '<label for="manufacturer">Manufacturer</label><br>';
echo '<input type="checkbox" id="serviceProvider" name="supplierType[]" value="Service Provider" ' . $checkedStatus['Service Provider'] . '>';
echo '<label for="serviceProvider">Service Provider</label><br>';
echo '</div>';

?>

</div>
<br>

    <label for="mlocationString">Manufacturing Locations:</label>
    <div style="display:flex;flex-direction:row">

    <?php
$locations = explode(',', $stmt_listings['mlocation']);

foreach ($locations as $location) {
    echo '<div id="locationTags">';
    echo '<div class="location" data-location="' . trim($location) . '"><span class="tag-text">' . trim($location) . '</span><span class="remove-tag">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="item-close-svg">
    <line x1="18" y1="6" x2="6" y2="18"></line>
    <line x1="6" y1="6" x2="18" y2="18"></line>
  </svg>
</span>
</div>';
    echo '</div>';
}
?>
</div>
    <div>
    <input type="hidden" value="<?php echo $stmt_listings['mlocation'] ?>" name="modifiedLocations" id="modifiedLocationsInput">
    <input type="text" id="locationInput" placeholder="Enter Manufacturing Plant Locations" onkeydown="return addMlocation(event)" style="border-radius: 4; margin-bottom: 5px; border-color: grey; height: 2.5rem;">
        <button style="background-color: rgb(25, 135, 84); color: white; border-radius: 4; height: 2.5rem;" type="button" onclick="addMlocation()">Add Location</button>
    </div>                                     
        <input type="hidden" name="mlocationString" id="locationFeatures">
   
    <div id="locationTags"></div>

    <div class="save-button-container">
    <button type="submit" style="background-color:#198754; width:80px">Save</button>
  </div>

</form>
</div>


<button class="collapsible" id="financialTab">Financial Information</button>

<div class="form-container">
<form id="updateFinanceForm" style="display:flex;flex-direction:column" enctype="multipart/form-data">
    <div class="financial-section">
        <h4>Revenue Information</h4>
        <p>All values are in millions $</p>

        <div class="financial-box-container">
        
            <div class="financial-box">
                <label for="revenue2020">2020:</label>
                <input type="text"  value="<?php echo $finance_row['fy_revenue'] ?>"  id="revenue2020" name="revenue2020" placeholder="Revenue for 2020" required>
            </div>

            <div class="financial-box">
                <label for="revenue2021">2021:</label>
                <input type="text" value="<?php echo $finance_row['sy_revenue'] ?>" id="revenue2021" name="revenue2021" placeholder="Revenue for 2021" required>
            </div>

            <div class="financial-box">
                <label for="revenue2022">2022:</label>
                <input type="text" value="<?php echo $finance_row['ty_revenue'] ?>" id="revenue2022" name="revenue2022" placeholder="Revenue for 2022" required>
            </div>

            <div class="financial-box">
                <label for="revenue2023">2023:</label>
                <input type="text" value="<?php echo $finance_row['ly_revenue'] ?>" id="revenue2023" name="revenue2023" placeholder="Revenue for 2023" required>
            </div>

        </div>
    </div>

    <div class="financial-section">
        <h4>Income Information</h4>
        <p>All values are in millions $</p>
        <div class="financial-box-container">
            <div class="financial-box">
                <label for="income2020">2020:</label>
                <input type="text" value="<?php echo $finance_row['fy_income'] ?>" id="income2020" name="income2020" placeholder="Income for 2020" required>
            </div>

            <div class="financial-box">
                <label for="income2021">2021:</label>
                <input type="text" value="<?php echo $finance_row['sy_income'] ?>" id="income2021" name="income2021" placeholder="Income for 2021" required>
            </div>

            <div class="financial-box">
                <label for="income2022">2022:</label>
                <input type="text" value="<?php echo $finance_row['ty_income'] ?>" id="income2022" name="income2022" placeholder="Income for 2022" required>
            </div>

            <div class="financial-box">
                <label for="income2023">2023:</label>
                <input type="text" value="<?php echo $finance_row['ly_income'] ?>" id="income2023" name="income2023" placeholder="Income for 2023" required>
            </div>

        </div>
    </div>

    <div class="save-button-container">
        <button type="button" onclick="submitFinanceForm()" style="background-color:#198754; width:80px">Save</button>
    </div>

</form>
</div>


<button class="collapsible" id="referencesTab">Customer References</button>
<div class="form-container">
<form id="updateForm" action="add_refinfo.php" method="post" style="display:flex;flex-direction:column" enctype="multipart/form-data">
    <small>(We recommend to add minimum top 3 customer references)</small>
    <label for="customerName">Customer Name </label>
    <input type="text" id="customerName" name="customerName" placeholder="Company Name"required>

    <label for="categoriesSupplied">Categories Supplied:</label>
    <input type="text" id="categoriesSupplied" name="categoriesSupplied" placeholder="Categories Supplied" required>

    <label for="website">Customer Website</label>
    <input type="text" id="website" name="website" placeholder="website" required>

    <label for="customerLogo">Customer Logo:</label>
    <input type="file" id="customerLogo" name="customerLogo" accept="image/*" placeholder="Customer Logo" required>
    <div class="save-button-container">
    <button type="submit" style="background-color:#198754; width:80px">Save</button>
  </div>


    </form>

<br>
<?php
// Iterate over the results and generate forms dynamically
while ($row_customer_reference = $result_customer_reference->fetch_assoc()) {
?>
    <form id="updateForm" action="update_refinfo.php" method="post" style="display:flex;flex-direction:column" enctype="multipart/form-data">

<label for="customerName">Company Name</label>
<input type="text" id="customerName" name="customerName" value="<?php echo $row_customer_reference['ref_comp_name']; ?>" required>

<label for="categoriesSupplied">Categories Supplied:</label>
<input type="text" id="categoriesSupplied" name="categoriesSupplied" value="<?php echo $row_customer_reference['categories_supplied']; ?>" required>

<label for="website">Website</label>
<input type="text" id="website" name="website" value="<?php echo $row_customer_reference['website']; ?>" required>

<label for="customerLogo">Customer Logo:</label>
<img height="100" width="100" src="ref_logo/<?php echo $row_customer_reference['ref_logo'] ?>" alt="">
<input type="file" id="customerLogo" name="customerLogo" accept="image/*" required>

<!-- Add hidden input field to store ref_comp_name -->
<input type="hidden" name="ref_comp_name" value="<?php echo $row_customer_reference['ref_comp_name']; ?>">

<div class="save-button-container">
    <button type="submit" style="background-color:#198754; width:80px">Save</button>
  </div>


</form>
<?php
}
?>


</div>

        </div>
    </div>

    <!-- ... Your existing body content ... -->

    <!-- JavaScript to handle collapsible tabs -->
    <script>
document.addEventListener('DOMContentLoaded', function () {
    var coll = document.getElementsByClassName('collapsible');
    var i;

    // Initialize all tabs as closed
    for (i = 0; i < coll.length; i++) {
        var content = coll[i].nextElementSibling;
        content.style.display = 'none';
    }

    // Attach click event listeners to collapsible tabs
    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener('click', function () {
            // Toggle the 'active' class to highlight the clicked tab
            this.classList.toggle('active');

            // Toggle the display property of the content
            var content = this.nextElementSibling;
            if (content.style.display === 'block') {
                content.style.display = 'none';
            } else {
                content.style.display = 'block';
            }
        });
    }
});



</script>
<!--<script>
  // Example JavaScript to update progress with animation
  let completion = 0;
  const progressBar = document.getElementById('progress');
  const completionText = document.getElementById('completionText');

  function updateProgress(newCompletion) {
    completion = newCompletion;
    progressBar.style.width = completion + '%';
    completionText.textContent = `Profile Completion: ${completion}%`;

    // Change color at 50%
    if (completion >= 50) {
      progressBar.style.backgroundColor = 'green';
    } else {
      progressBar.style.backgroundColor = 'blue';
    }
  }

  // Example: Update progress to 50% with animation
  updateProgress(50);
</script>-->

<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('businessCategories')  // id
    </script>

    <script>
        new MultiSelectTag('companyCertificates')  // id
    </script>

    
<script>
    function calculateRevenueGrowth() {
        var revenue2021 = parseFloat(document.getElementById('revenue2021').value);
        var revenue2022 = parseFloat(document.getElementById('revenue2022').value);
        var growth = ((revenue2022 - revenue2021) / revenue2021) * 100;
        document.getElementById('revenueGrowth').value = isNaN(growth) ? '' : growth.toFixed(2) + '%';
    }

    function calculateProfitMargin() {
        var income2022 = parseFloat(document.getElementById('income2022').value);
        var revenue2021 = parseFloat(document.getElementById('revenue2021').value);
        var profitMargin = (income2022 / revenue2021) * 100;
        document.getElementById('profitMargin').value = isNaN(profitMargin) ? '' : profitMargin.toFixed(2) + '%';
    }
</script>

<!-- for manufacturing locations, tags input -->
<script>
let mlocationArray = [];

function addMlocation(event) {
    const locationTags = document.getElementById("locationTags");
    const locationInput = document.getElementById("locationInput");
    const locationFeatures = document.getElementById("locationFeatures");

    const locationValue = locationInput.value.trim();

    if ((event && event.key === "Enter") || !event) {
        // If Enter key is pressed or the function is called without an event (button click)
        if (locationValue !== "") {
            mlocationArray.push(locationValue);
            
            // Create a tag element
            const tagElement = document.createElement("div");
            tagElement.classList.add("tag");

            // Add text content to the tag
            const tagText = document.createElement("span");
            tagText.textContent = locationValue;

            // Add remove button (x) to the tag
            const removeButton = document.createElement("span");
            removeButton.innerHTML = "&times;";
            removeButton.classList.add("tag-remove");
            removeButton.onclick = function() {
                // Remove the tag from the array
                mlocationArray = mlocationArray.filter(tag => tag !== locationValue);
                
                // Remove the tag from the display
                tagElement.remove();

                // Update hidden input
                updateHiddenFeatures();
            };

            // Append elements to the tag
            tagElement.appendChild(tagText);
            tagElement.appendChild(removeButton);

            // Append tag to the display area
            locationTags.appendChild(tagElement);

            // Update hidden input
            updateHiddenFeatures();

            // Clear the input field
            locationInput.value = "";

            // Prevent form submission on Enter key press
            if (event) {
                event.preventDefault();
            }
        }
    }
}

function updateHiddenFeatures() {
    // Update hidden input with comma-separated features
    document.getElementById("locationFeatures").value = mlocationArray.join(',');
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.remove-tag').click(function(){
        var category = $(this).parent().find('.tag-text').text().trim(); // Get the category text from the tag
        $(this).parent().remove(); // Remove the parent div containing the tag and button
        
        // Get the current value of the hidden input
        var currentValue = $('#modifiedCategoriesInput').val();
        
        // Remove the category from the value
        var updatedValue = currentValue.split(',').filter(function(cat) {
            return cat.trim() !== category;
        }).join(',');
        
        // If all categories are removed, set the updated value to null
        if (updatedValue === '') {
            updatedValue = null;
        }
        
        // Update the hidden input field with the modified string
        $('#modifiedCategoriesInput').val(updatedValue);
    });
});
</script>

<script>
$(document).ready(function(){
    $('.remove-tag').click(function(){
        var certificate = $(this).parent().data('certificate');
        $(this).parent().remove(); // Remove the parent div containing the tag and button
        
        // Get the current value of the hidden input
        var currentValue = $('#modifiedCertificatesInput').val();
        
        // Remove the certificate from the value
        var updatedValue = currentValue.split(',').filter(function(cert) {
            return cert.trim() !== certificate;
        }).join(',');
        
        // If all certificates are removed, set the updated value to null
        if (updatedValue === '') {
            updatedValue = null;
        }
        
        // Update the hidden input field with the modified string
        $('#modifiedCertificatesInput').val(updatedValue);
    });
});
</script>

<script>
$(document).ready(function(){
    $('.remove-tag').click(function(){
        var location = $(this).parent().data('location');
        $(this).parent().remove(); // Remove the parent div containing the tag and button
        
        // Get the current value of the hidden input
        var currentValue = $('#modifiedLocationsInput').val();
        
        // Remove the location from the value
        var updatedValue = currentValue.split(',').filter(function(loc) {
            return loc.trim() !== location;
        }).join(',');
        
        // If all locations are removed, set the updated value to null
        if (updatedValue === '') {
            updatedValue = null;
        }
        
        // Update the hidden input field with the modified string
        $('#modifiedLocationsInput').val(updatedValue);
    });
});
</script>

<!-- Your existing HTML content -->

<script>
document.addEventListener('DOMContentLoaded', function () {
    var coll = document.getElementsByClassName('collapsible');
    var i;

    // Attach click event listeners to collapsible tabs
    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener('click', function () {
            // Remove active class from all tabs and content containers
            for (var j = 0; j < coll.length; j++) {
                coll[j].classList.remove('active');
                var content = coll[j].nextElementSibling;
                content.classList.remove('active-container'); // Remove active-container class
            }

            this.classList.toggle('active'); // Toggle active class for the clicked tab
            var content = this.nextElementSibling;
            content.classList.toggle('active-container'); // Toggle active-container class for the corresponding content container
        });
    }
});
</script>

<script>
    function submitForm() {
        // Serialize form data
        var formData = $('#updateForm').serialize();

        // AJAX request
        $.ajax({
            type: 'POST',
            url: 'update_contactinfo.php',
            data: formData,
            success: function(response) {
                // Handle success response
                console.log(response);
                alert('Data updated successfully');
                
                // You can update the UI or display a success message here
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });
    }
</script>

<script>
    function submitFinanceForm() {
        // Create a FormData object to send files along with the form data
        var formData = new FormData(document.getElementById('updateFinanceForm'));

        // AJAX request
        $.ajax({
            type: 'POST',
            url: 'update_financeinfo.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Handle success response
                console.log(response);
                alert('Data updated successfully');

                // You can update the UI or display a success message here
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });
    }
</script>
<script>
const closeIconContainer = document.querySelector('.close-icon-container');

closeIconContainer.addEventListener('click', () => {
  const tagToCancel = document.querySelector('.tag-to-cancel');
  if (tagToCancel) {
    tagToCancel.remove(); // Remove the element with class 'tag-to-cancel'
  }
});
</script>


</body>
</html>