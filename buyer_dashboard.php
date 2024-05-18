<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION["buyer_comp_name"])) {
    // If not logged in, redirect to the login page
    header("Location: buyer_login.php");
    exit();
}

// Include your database connection file
require('dbcon.php');

// Fetch the user's first name from the database using the email
// $user_email = $_SESSION["user_email"];
$buyer_comp_name=$_SESSION["buyer_comp_name"];


// Use a prepared statement to prevent SQL injection
if (isset($_SESSION["buyer_user_email"])) {
    $email=$_SESSION["buyer_user_email"];
    $stmt = $conn->prepare("SELECT * FROM buyer_userdata WHERE buyer_email = ?");
    $stmt->bind_param("s", $buyer_email);
}
else{
    $stmt = $conn->prepare("SELECT * FROM buyer_userdata WHERE buyer_comp_name = ?");
    $stmt->bind_param("s", $buyer_comp_name);
}




// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();



// Check if the user is found
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $buyer_first_name = $row["buyer_first_name"];
    $buyer_last_name= $row['buyer_last_name'];
} else {
    // Handle the case where user data is not found
    $user_first_name = "User";
}

$_SESSION['buyer_first_name']=$buyer_first_name;
$_SESSION['buyer_last_name']=$buyer_last_name;



// Close the statement
$stmt->close();

// listing
$stmt_listings = $conn->prepare("SELECT * FROM buyer_company_data WHERE buyer_comp_name = ?");
$stmt_listings->bind_param("s", $buyer_comp_name);

// Execute the statement
$stmt_listings->execute();

// Get the result
$result_listings = $stmt_listings->get_result();
$stmt_listings = $result_listings->fetch_assoc();


// finance


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
    <link rel="stylesheet" href="buynav.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="index_hero.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


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
            body{
    font-family: 'Poppins', sans-serif;
    /* background: #a9efc8; */
            }
            .body::after{
    background: rgba(23, 26, 31, 0.8);
}
            

.form-control {
    width: 500px;
    height: 50px;
    padding: 0 15px;
    border: 2px ;
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

 

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url(./images/Img.png);
    background-size: cover;
    overflow-y:hidden;
    background-color: whitesmoke; /* Fallback color */
    color: #333;
    font-family: 'Poppins', sans-serif;
    position: relative; /* Ensure the body is positioned relatively for absolute positioning of overlay */
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
            height: 110vh;
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
            /* margin-top: 100px; */
            height: 800px;
        }

        .right-side {
    width: 80%;
    background-color: rgba(249, 249, 249, 0.2); /* Transparent white with 80% opacity */
    padding: 20px;
    overflow-y: hidden; 
   border-radius: 10px;
    height: 100%!important;
    margin-top: 5px;
    margin-bottom:10px;
    margin-left:10px;
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
    border: 2px solid darkgreen;
    border-radius: 5px;
    padding: 10px;
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
    border: 3px solid green;
    border-radius: 15px;
    margin-bottom: 20px;
    position: relative;
}
.form-container.active{
    border:darkgreen;
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
        
        
         @media screen and (max-width: 600px) {
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
<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."buynav.php"); ?>
</div>
<div class="split-container" style="margin-top:20px">
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
                path: "construction.php",
            },
            {
                icon: "person", // Google Material Icon for Profile
                label: "Profile",
                path: "buyer_dashboard.php",
            },
           {
               icon: "message", // Google Material Icon for Messages
               label: "Messages",
               path: "construction.php",
           },
           {
               icon: "favorite", // Google Material Icon for Favorites
               label: "Favourites",
               path: "buyer_favourites.php",
           },
            {
                icon: "exit_to_app", // Google Material Icon for Logout
                label: "Logout",
                path: "buyer_logout.php",
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
<div class="right-side" style="margin-left: 20px; margin-top:6rem;  max-height: 90vh;">
    <!-- New container with light grey background -->
    <div class="section-container">
        <!-- Collapsible tabs -->
      <!--  <div class="profilestregth" id="profilestregth">Your Profile Strength</div>
        <div class="progress-bar">
  <div class="progress" id="progress"></div>
</div>

<div class="completion-text" id="completionText">Profile Completion: 0%</div> -->

        <h3>Please update your profile !</h3>
        
            <button class="collapsible" id="contactTab">Contact Info</button>
            
            
                <!-- Form for contact tab -->
                <div class="form-container">
                <form id="updateForm" style="display:flex;flex-direction:column">
    <label for="buyer_firstName">First Name:</label>
    <input type="text" value="<?php echo $row['buyer_first_name'] ?>" id="buyer_firstName" name="buyer_firstName" placeholder="First Name" required>

    <label for="buyer_lastName">Last Name:</label>
    <input value="<?php echo $row['buyer_last_name'] ?>" type="text" id="buyer_lastName" name="buyer_lastName" placeholder=" Last Name" required>

    <label for="buyer_email">Email:</label>
    <input type="email" value="<?php echo $row['buyer_email'] ?>" id="buyer_email" name="buyer_email" placeholder="Email" required>

    <label for="buyer_phone">Phone Number:</label>
    <input type="tel" id="buyer_phone" value="<?php echo $row['buyer_phone_number'] ?>" name="buyer_phone" placeholder="Phone Number " required>

    <label for="buyer_businessTitle">Business Title:</label>
    <input type="text" id="buyer_businessTitle" value="<?php echo $row['buyer_business_title'] ?>"  name="buyer_businessTitle" placeholder="Business Title" required>

    <div class="save-button-container">
        <button type="button" onclick="submitForm()" style="background-color:#198754; width:80px">Save</button>
    </div>
</form>
      
    </div>
                <!-- Save button for contact tab -->



                <button class="collapsible" id="companyTab">Company Info</button>
<div class="form-container">
<form id="updateForm" action="update_buyer_companyinfo.php" method="post" style="display:flex;flex-direction:column" enctype="multipart/form-data">
    <label for="buyer_companyname">Company Name:</label>
    <input type="text" id="buyer_companyname" value="<?php echo $stmt_listings['buyer_comp_name'] ?>" name="buyer_companyname" placeholder="Comapny Name" required>

    <label for="address">Address:</label>
    <input type="text" id="buyer_address" name="buyer_address" required placeholder="Address" value="<?php echo $stmt_listings['buyer_address'] ?>">
    <input type="text" id="buyer_city" name="buyer_city" required placeholder="City" value="<?php echo $stmt_listings['buyer_city'] ?>">
    <input type="text" id="buyer_state" name="buyer_state" required placeholder="State" value="<?php echo $stmt_listings['buyer_state'] ?>">
    <input type="text" id="pincode" name="buyer_pincode" required placeholder="Pincode" value="<?php echo $stmt_listings['buyer_pincode'] ?>">
    <input type="text" id="country" name="buyer_country" required placeholder="Country" value="<?php echo $stmt_listings['buyer_country'] ?>">

   


    <label for="buyer_companyWebsite">Company Website:</label>
    <input type="text" id="buyer_companyWebsite" name="buyer_companyWebsite" placeholder="Comapny Website" required value="<?php echo $stmt_listings['buyer_company_website'] ?>">

    <label for="buyer_company_type">Company Type:</label>
   
    <!-- <input type="text" id="numEmployees" name="numEmployees"placeholder="Number of Employee" required value=""> -->
    <select class="form-control" id="buyer_company_type" name="buyer_company_type">
                            <option value="OMR">OMR</option>
                            <option value="tier 1">Tier 1</option>
                            <option value="tier 2">Tier 2</option>
                                    </select>

    <span ><label for="logo">Logo:</label> <img height="100" width="100" src="buyer_company_logo/<?php echo $stmt_listings['buyer_company_logo'] ?>" alt=""> </span>
    <input type="file" id="logo" name="logo" accept="image/*" placeholder="Logo" >

    <input type="hidden" value="<?php echo $stmt_listings['buyer_company_logo'] ?>" name="buyer_hiddenimage" id="buyer_hiddenimage">

    


    <div class="save-button-container">
    <button type="submit" style="background-color:#198754; width:80px">Save</button>
  </div>

    </form>
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




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
            url: 'update_buyer_contactinfo.php',
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




</body>
</html>