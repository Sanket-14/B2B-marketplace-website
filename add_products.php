<?php
require("dbcon.php");
session_start();

// Check if the company name is set in the session
if (!isset($_SESSION['comp_name'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve comp_name from the session
$comp_name = $_SESSION['comp_name'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $product_name = $_POST['product']['name'];
    
    $product_description = $_POST['product']['description'];

    // Debug: Print received form data
   

    // Upload images
    $targetDir = "products/";
    $uploadedImages = [];

    foreach ($_FILES['product']['name']['images'] as $key => $value) {
        $targetFile = $targetDir . basename($_FILES['product']['name']['images'][$key]);
        move_uploaded_file($_FILES['product']['tmp_name']['images'][$key], $targetFile);
        $uploadedImages[] = basename($_FILES['product']['name']['images'][$key]); // Store only the image name
    }

    // Debug: Print uploaded images array
    $imageNames = implode(',', $uploadedImages);
    $featuresString = isset($_POST['features']) ? $_POST['features'] : '';

    // Prepare and execute INSERT statement for each uploaded image
    $stmt = $conn->prepare("INSERT INTO products (product_name, comp_name, product_image,  product_description, features) VALUES (?, ?, ?,  ?, ?)");
    $stmt->bind_param("sssss", $product_name, $comp_name, $imageNames, $product_description, $featuresString);
    $stmt->execute();

    // Close the prepared statement
    $stmt->close();
}

// Rest of your PHP code for add_products.php goes here
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
    

   
    <!-- <link rel="stylesheet" href="style2.css"> -->

  
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet"> -->
    <script defer src="app.js"></script>
    <!--Link to jQuery CDN (this runs the entire function)-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--Bootstrap 4.1 CDN for button and container-->


</head>
<body>
    <title style="color: black;">VoltBridge</title>
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
        .form-actions {
    display: flex;
    justify-content: center;
}

 /* Style for the extended search bar */
                .right-side form {
            display: flex;
            width: 100%;
           
            max-height: 100vh!important;
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
            overflow: hidden;
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
    width: calc(100% - 30px); /* Adjust width to accommodate margins */
    margin: 5px;
    padding: 20px;
    overflow-y: auto; /* Add vertical scrollbar when content overflows */
    max-height: calc(100vh - 1600px);
    height:100%;
    /* margin-top:-30px!important; */ /* Remove this line */
}
.form-group .col-md-8 {
    width: 100%; /* Set width to 100% for the tabs inside col-md-8 */
}
.right-side::-webkit-scrollbar {
    width: 8px; /* Width of scrollbar */
}
.right-side::-webkit-scrollbar-thumb {
    background-color: #888; /* Color of scrollbar thumb */
    border-radius: 4px; /* Round corners of scrollbar thumb */
}

.right-side::-webkit-scrollbar-thumb:hover {
    background-color: #555; /* Color of scrollbar thumb on hover */
}

.col-md-8 {
    -ms-flex: 0 0 66.666667%;
    flex: 0 0 66.666667%;
    max-width: 100%;
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





        body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url("images/background2.png"); /* Background image URL */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Black with 50% opacity */
    z-index: 1;
}



  
                /* Style for the extended search bar */
                .right-side form {
            display: flex;
            width: 100%;
           
            max-height: 100vh!important;
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
    width: calc(100% - 30px); /* Adjust width to accommodate margins */
    margin: 5px;
    padding: 20px;
    overflow-y: auto; /* Add vertical scrollbar when content overflows */
    max-height: calc(100vh - 1600px);
    height:100%;
    /* margin-top:-30px!important; */ /* Remove this line */
}
.form-group .col-md-8 {
    width: 100%; /* Set width to 100% for the tabs inside col-md-8 */
}
.right-side::-webkit-scrollbar {
    width: 8px; /* Width of scrollbar */
}
.right-side::-webkit-scrollbar-thumb {
    background-color: #888; /* Color of scrollbar thumb */
    border-radius: 4px; /* Round corners of scrollbar thumb */
}

.right-side::-webkit-scrollbar-thumb:hover {
    background-color: #555; /* Color of scrollbar thumb on hover */
}

.col-md-8 {
    -ms-flex: 0 0 66.666667%;
    flex: 0 0 66.666667%;
    max-width: 100%;
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

/* Style the individual cards */

/* Style the content within the card */
.content {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

/* Style the icon */
.material-icons {
  font-size: 24px;
  margin-right: 10px;
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
.form-group {
  display: flex; /* Enable flexbox for responsive layout */
  flex-direction: column; /* Stack elements vertically */
  width: 100%; /* Ensure full width container */
}

input[type="text"],
textarea,
select {
  width: 100%; /* Maintain 100% width for all form controls */
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  resize: vertical;
}

/* Mobile responsiveness for textarea (optional but recommended) */
@media (max-width: 768px) {
  .form-control {
    /* Adjust width for smaller screens (adjust breakpoint and width as needed) */
    width: 50vw;
  }
  .right-side{
      padding:0px;
      overflow-y:auto;
  }
}


input[type="file"] {
  margin-top: 10px;
}
button[type="submit"] {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  /* background-color: #3498db; */
  color: black;
  background-color: #2980b9;
  justify-content: center;

}

button[type="submit"]:hover {
}

.panel {
  background-color: #f9f9f9;
  border-radius: 8px;
  padding: 30px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  justify-content: center;
  height: 100%;
  margin-bottom: 10px;
  width:100%;
}

.panel-body {
    display: flex;
    /* justify-content: space-evenly; */
    flex-direction: column;
    align-items: center;
    /* align-content: stretch; */
    flex-wrap: wrap;
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


        #featureTags {
            display: flex;
            flex-wrap: wrap;
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

    .tag .tag-remove {
        cursor: pointer;
        color:red;
    }

    .notification {
    display: none;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 5px;
    font-weight: bold;
    width: 300px;
    position: fixed;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1000;
}

.success {
    background-color: #4CAF50;
    color: #fff;
}
 @media (max-width: 768px) {
            .form-control {
                width: 50vw;
            }
            .panel{
                width:100%;
            }
            .form-group{
                display:flex;
            }
            .form-control{
                padding:0px;
            }
        }
</style>
            
<div id="successNotification" class="notification success">
    Product was added successfully. Add more products or return to the dashboard.
</div>

 <div>
   <!-- navbar styling code in navbar_resp.css and script in navbar_resp.js - these files linked in index.php, 
       navbar_resp.php contains whole html code for navbar, saved as backup. -->

       <!-- navbar header is being called from headernav.php in assets folder. -->
<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."suppnav.php"); ?>
</div>

<div class="split-container" style="margin-top:6rem">
        <div class="left-side" style="margin-left:20px; width:25%" >
            <!-- Content for the left side -->
            <h2></h2>
  <ul id="dashboardSidebarMenu"></ul>
  <script>
       
       const menuItems = [
            //{
             //   icon: "dashboard", // Google Material Icon for Dashboard
             //   label: "dashboard",
             //   path: "suppliardashboard.php",
           // },
            // {
            //     icon: "dashboard", // Google Material Icon for Dashboard
            //     label: "Product",
            //     path: "construction.php",
            // },
            {
                icon: "person", // Google Material Icon for Profile
                label: "Profile",
                path: "suppliardashboard.php",
            },
            {
                icon: "format_list_bulleted", // Google Material Icon for My Listing
                label: "My Listing",
                path: "construction.php",
            },
           {
               icon: "favorite", // Google Material Icon for Favorites
               label: "Profile Preview",
               path: "http://localhost/voltbridge2702/newpage.php?company=<?php echo $comp_name ?>",
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
    <div class="right-side" style="margin-left:20px; margin-top:-40px; max-height: 100%;">
            <main class="container container--main" role="section">
    <!--<div class="section-head section-head--portfolio">
        <div class="section-head__heading">
            <h1 class="section-head__title">Create Product</h1>
        </div>
    </div>-->
    <form class="simple_form fn-unsaved-warning" id="product_form" data-warning="Do you really want to cancel the editing of the product?" novalidate="novalidate" enctype="multipart/form-data" action="" accept-charset="UTF-8" method="post" onsubmit="updateHiddenFeatures()">
        <input type="hidden" name="authenticity_token" value="Ccb2PSAImyMyajiC2aO67QAV46DhBMwdRtYD4I9sO_xnvPk7g-e1a6qLVCbE7IXhPGD8TTI1o9LHjjmSLewZHQ" autocomplete="off">
        
        <div class="panel">
            <div class="panel-body">
                
                    
                        <h3>Basic information</h3>
                
                    <div class="col-md-8" style: width="100%;">
                        <!-- Input for Product Name -->
                        <div class="form-group string required product_name">
                            <label class="control-label string required" for="product_name">Product name *</label>
                            <small class="control-hint">Min. of 5 and max. of 120 characters</small>
                            <input class="form-control string required" required="required" aria-required="true" maxlength="120" size="120" type="text" name="product[name]" id="product_name" required>
                        </div>
                       
                        <!-- Textarea for Short Description -->
                        <!--<div class="form-group text required product_short_description">
                            <label class="control-label text required" for="product_short_description">Short description *</label>
                            <small class="control-hint">Min. of 80 and Max. of 200 characters</small>
                            <textarea class="form-control text required" required="required" aria-required="true" maxlength="200" name="product[short_description]" id="product_short_description"></textarea>
                        </div>-->
                        <!-- Textarea for Product Description -->
                        <div class="form-group text required product_description">
  <label class="control-label text required" for="product_description">Product description *</label>
  <small class="control-hint">Min. of 100 and max. of 5000 characters</small>
  <textarea class="form-control text required" rows="5" required="required" aria-required="true" maxlength="5000" name="product[description]" id="product_description"></textarea>
</div>

                       
                        
                        <div class="form-group">
                            <h4 class="control-label file optional" for="product_images">Product Image</h4>
                            <input class="form-control file optional" type="file" name="product[images][]" id="product_images" multiple="" required>
                            <small class="control-hint">Formats: JPG, PNG. Max size: 5MB per image.</small>
                        </div>
                        <div class="form-group">

                        <label for="features">Salient Features:</label>
                        <div id="featureTags"></div>
                        <div>
                            <input type="text" id="featureInput" placeholder="Add key features about the product you added" onkeydown="return addFeature(event)" required>
                            <button style="background-color:#23D375FF; color: black;" type="button" onclick="addFeature()">Add Feature</button>
                        </div>
                                                
                        <input type="hidden" name="features" id="hiddenFeatures">
                        <div class="panel-body" style="margin-top:2rem; padding:10px 20px; justify-content: center;">
                        <div class="form-actions">
                            <input style="background-color:#23D375FF; color:black;" type="submit" name="commit" value="Save product" class="btn">
                        </div>
                    </div>

                </div>
                        

   
    <br>
                        <!-- Features -->
                        <!-- <div class="form-group string optional product_features">
                            <h4 class="control-label string optional" for="product_features">Features</h4>
                            Adding features
                            <span class="tagify tagify--features" role="tags">
                                <input class="form-control string optional" type="text" name="product[features][]" id="product_features" placeholder="Enter features..." aria-describedby="formattingHelp">
                            </span>
                            <small class="control-hint">Add product features (e.g., size, color, material). Press Enter after each feature.</small>
                        </div> -->
                        <!-- Save and Cancel Buttons -->
                    <!-- <div class="panel panel--cta"> -->
                   
                    </div>
                
            </div>
       
        

    </div>
       <!-- </div> -->
    </form>
    
</main>



<script>
            let featuresArray = [];

function addFeature(event) {
    const featureTags = document.getElementById("featureTags");
    const featureInput = document.getElementById("featureInput");
    const hiddenFeatures = document.getElementById("hiddenFeatures");

    const featureValue = featureInput.value.trim();

    if ((event && event.key === "Enter") || !event) {
        // If Enter key is pressed or the function is called without an event (button click)
        if (featureValue !== "") {
            featuresArray.push(featureValue);
            
            // Create a tag element
            const tagElement = document.createElement("div");
            tagElement.classList.add("tag");

            // Add text content to the tag
            const tagText = document.createElement("span");
            tagText.classList.add("tag-text");
            tagText.textContent = featureValue;

            // Add remove button (x) to the tag
            const removeButton = document.createElement("span");
            removeButton.innerHTML = "&times;";
            removeButton.classList.add("tag-remove");
            removeButton.onclick = function() {
                // Remove the tag from the array
                featuresArray = featuresArray.filter(tag => tag !== featureValue);

                
                
                // Remove the tag from the display
                tagElement.remove();

                // Update hidden input
                updateHiddenFeatures();
            };

            // Append elements to the tag
            tagElement.appendChild(tagText);
            tagElement.appendChild(removeButton);

            // Append tag to the display area
            featureTags.appendChild(tagElement);

            // Update hidden input
            updateHiddenFeatures();

            // Clear the input field
            featureInput.value = "";

            // Prevent form submission on Enter key press
            if (event) {
                event.preventDefault();
            }
        }
    }
}

function updateHiddenFeatures() {
    // Update hidden input with comma-separated features
    document.getElementById("hiddenFeatures").value = featuresArray.join(',');
}


function validateForm() {
    // Get references to the form fields
    var productName = document.getElementById('product_name').value;
    var shortDescription = document.getElementById('product_short_description').value;
    var productDescription = document.getElementById('product_description').value;
    var productImages = document.getElementById('product_images').value;
    var hiddenFeatures = document.getElementById('hiddenFeatures').value;

    // Check if any of the required fields are empty
    if (productName === '' || shortDescription === '' || productDescription === '' || productImages === '' || hiddenFeatures === '') {
        alert('Please fill in all the required fields.');
        return false; // Prevent form submission
    }

    // Check if short description meets length requirements
    if (shortDescription.length < 80 || shortDescription.length > 200) {
        alert('Short description must be between 80 and 200 characters.');
        return false; // Prevent form submission
    }

    // Check if product description meets length requirements
    if (productDescription.length < 100 || productDescription.length > 5000) {
        alert('Product description must be between 100 and 5000 characters.');
        return false; // Prevent form submission
    }

    // If all required fields are filled and lengths are within limits, allow form submission
    return true;
}


function showSuccessMessage() {
    // Display the success notification
    var successNotification = document.getElementById('successNotification');
    successNotification.style.display = 'block';

    // Set a timeout to hide the notification after 5 seconds
    setTimeout(function () {
        hideSuccessMessage();
    }, 1000);
}

function hideSuccessMessage() {
    // Get the success notification element
    var successNotification = document.getElementById('successNotification');

    // Set initial opacity to 1 (fully visible)
    var opacity = 1;

    // Use setInterval to gradually decrease opacity
    var fadeOutInterval = setInterval(function () {
        if (opacity <= 0) {
            // If opacity is fully faded out, clear the interval and hide the notification
            clearInterval(fadeOutInterval);
            successNotification.style.display = 'none';
        } else {
            // Decrease opacity by 0.05 (adjust as needed for the desired fade-out speed)
            opacity -= 0.05;
            successNotification.style.opacity = opacity;
        }
    }, 200); // Adjust the interval time here
}

// Attach the validation function to the form's onsubmit event
document.getElementById('product_form').onsubmit = validateForm;

        
    </script>
</body>
</html>