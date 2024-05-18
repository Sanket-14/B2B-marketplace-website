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
} else {
    // Handle the case where user data is not found
    $user_first_name = "User";
}

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
<?php 
require('dbcon.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
$perPage = 3;
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage - 1) * $perPage;

if (isset($_GET['company'])) {
    // Retrieve the value from the URL
    $headingValue = urldecode($_GET['company']);

    // Pagination logic
    

    $query = "SELECT * FROM add_listing WHERE comp_name LIKE '%$headingValue%'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    // Query to fetch total count of products
    $queryTotalCount = "SELECT COUNT(*) AS total FROM products WHERE comp_name LIKE '%$headingValue%'";
    $resultTotalCount = mysqli_query($conn, $queryTotalCount);
    $totalCount = mysqli_fetch_assoc($resultTotalCount)['total'];

    // Query to fetch products for the current page
    $queryCompanyProducts = "SELECT * FROM products WHERE comp_name LIKE '%$headingValue%' LIMIT $perPage OFFSET $offset";
    $resultCompanyProducts = mysqli_query($conn, $queryCompanyProducts);

    // Fetch all rows from company_products
    $rowsCompanyProducts = mysqli_fetch_all($resultCompanyProducts, MYSQLI_ASSOC);  
}else {
    echo "Heading Value or ImgSrc is not set in the URL";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

      <!--=============== REMIXICONS for navbar styling ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="suppnav.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="index_hero.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <!-- <link rel="stylesheet" href="style2.css"> -->
    <link rel="stylesheet" href="register2.css">
  
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet"> -->
    <script defer src="app.js"></script>
    <!--Link to jQuery CDN (this runs the entire function)-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--Bootstrap 4.1 CDN for button and container-->
    <title style="color: black;">VoltBridge</title>

    
        
        <style>
            



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
  /*  background-image: url(./images/Img.png); */
    background-size: cover;
    background-color: #F3F4F5; /* Fallback color */
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
            
   /* font-family: 'Poppins', sans-serif;
     background: #a9efc8; */
   
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
    background-color: white; /* Transparent white with 80% opacity */
    padding: 20px;
    overflow-y: auto;
    height: 100%!important;
    margin-top: 5px;
    margin-bottom:10px;
    margin-left:10px;
}

        .icon {
  vertical-align: middle; /* Align the icon vertically */
}

.text {
  /* line-height: 1.5; Adjust the line height as needed to vertically align with the icon */
  /* margin-left: 5px; Add some space between the icon and the text */
}
/* Style the container to display flex and flex horizontally */
/* Style the card container */


/* Style the icon */
.material-icons {
  font-size: 36px;
  margin-right: 10px;
}
.card {
            margin-top: 5px;
    border: 1px solid rgba(0, 0, 0, 0.2); /* You can change the color code as needed */
    border-radius: 5px;
    padding: 20px;
    width: 300px; /* Adjust the width as needed */
    height: 450px; /* Adjust the height as needed */
    /* Optionally, you can add overflow and box-sizing properties to control content overflow */
    overflow: hidden;
    box-sizing: border-box;
        }
        .icon {
  vertical-align: middle; /* Align the icon vertically */
}

.text {
  /* line-height: 1.5; Adjust the line height as needed to vertically align with the icon */
  /* margin-left: 5px; Add some space between the icon and the text */
}
.explore-link {
    color: #007bff; /* Set the link color to blue */
    text-decoration: none; /* Remove underline */
    font-weight: bold; /* Make the text bold */
}

.explore-link:hover {
    text-decoration: underline; /* Underline the link on hover */
}


.card:hover {
    background-color:  #d4f4dd; /* Light green background on hover */
    transition: background-color 0.3s ease-in-out; /* Add a smooth transition effect */
}



.contact-supplier {
    text-align: center;
    margin-top: 10px;
    opacity: 0; /* Initially hidden */
    transition: opacity 0.3s ease-in-out;
}
.card-body:hover .contact-supplier {
    opacity: 1; /* Show on hover */
    /* background-color: #4CAF50; */
}

.card-body:hover .contact-supplier-btn {
    background-color: black; /* Green color for the button */
    color: #fff; /* White text color */
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon {
    margin-right: 5px;
}

.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}

/* .material-icons{
    color:green;
} */

/* pagination styles */
/* Style for Cards */
.card {
    margin-bottom: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Pagination Styles */
.pagination {
    margin-top: 20px;
}

.pagination li {
    display: inline-block;
    margin-right: 5px;
}

.pagination li a {
    text-decoration: none;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.pagination li.active a {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}


    #categorytags {
    display: flex;
    flex-direction:row;
}

.tag {
    background-color: #e0e0e0;
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
    margin-right: 5px;
}
h2 {
    margin-top: 0px;
}
.card-img-top {
        width: 100%;
        height: 300px; 
        object-fit: cover; Ensures images retain their aspect ratio
        
        }
.carousel-inner .row {
            display: flex;
            flex-wrap: wrap;
            /* justify-content: space-between; */
          
        }
        .carousel-inner .col-md-4 {
            flex: 0 0 calc(33.33% - 30px); /* Set width for three images in a row with 15px margin */
            margin: 10px; /* Create spacing between images */
            /* height:100vh; */

        }

        .pagination ul {
        list-style: none;
        padding: 0;
        display: flex;
        justify-content: center;
    }
    .pagination ul li {
        margin: 0 5px;
    }
    .pagination ul li a {
        display: block;
        padding: 5px 10px;
        text-decoration: none;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
    }
    .pagination ul li a:hover {
        background-color: #f0f0f0;
    }
    .pagination ul li.active a {
        background-color: limegreen;
        color: white;
    }

    #categorytags {
    display: flex;
    flex-direction:row;
}

.tag {
    background-color: #e0e0e0;
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
    margin-right: 5px;
}
h2 {
    margin-top: 0px;
}
@media screen and (max-width: 1118px) {
    .left-side{
        display:none;
    }
    .right-side{
        width:100%;
        margin-right:15px;
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
<

<div class="split-container" style="margin-top:6rem">
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
            background-color: white;
            color: black;
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
                path: "construction.php",
            },
           {
               icon: "favorite", // Google Material Icon for Favorites
               label: "Profile Preview",
               path: "http://localhost/voltbridge1003/newpage.php?company=<?php echo $comp_name ?>",
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
<div class="right-side" style="margin-left:20px; border-radius:10px;">
    <!-- Section for Cards -->

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="margin-top:15px; border: 1px solid rgba(0, 0, 0, 0.2); /* You can change the color code as needed */
            border-radius: 5px;  padding:20px; background-color:white;"> 
            <h2 style="margin-top:-5px;font-family:'Inter', sans-serif;">Products</h2>
              <div class="carousel-inner">
                    <div class="carousel-item active">
            <!-- First page with 6 images -->
            <!-- <div class="row" style="display:flex; margin-left:0px"> -->
            <div class="row" style="display:flex; margin-left:0px;background-color:white">
                <?php
                if (isset($rowsCompanyProducts) && !empty($rowsCompanyProducts)) {
                                    // Assuming $rowsCompanyProducts contains the products for the current page
                                    foreach ($rowsCompanyProducts as $product) {
                                        $product_image = $product['product_image'];

                                // Check if $product_image is a comma-separated string
                                if (strpos($product_image, ',') !== false) {
                                    // Explode the string into an array
                                    $image_array = explode(',', $product_image);

                                    // Store the first value of the array in a variable
                                    $first_image = trim($image_array[0]); // trim() to remove any extra spaces

                                } else {
                                    // If it's just a single string, store it directly in a variable
                                    $first_image = trim($product_image); // trim() to remove any extra spaces
                                }
                                        echo '<div class="col-md-4">';
                                        echo '<div class="card" style="margin-left:0px">';
                                        // echo '<a href="">';
                                        echo '<img src="products/' . $first_image . '" class="card-img-top" style="width: 100%; height: 200px;" alt="' .$first_image . '">';

                                        // echo '</a>';
                                        echo '<div class="card-body">';
                                        echo '<h4 style="margin-top: 0px;" class="card-text">' . $product['product_name'] . '</h4>';
                                        $shortDescription = $product['product_description'];
                                        $limitedShortDescription = substr($shortDescription, 0, 20); // Adjust the character limit as needed
                                        echo '<p class="card-text" style="margin-top: -4px;">' . nl2br($limitedShortDescription) . '...</p>'; // nl2br is used to preserve line breaks
                                        echo '<h4><a href="update_product.php?company=' . urlencode($product['comp_name']) . '&product=' . urlencode($product['product_name']) . '" class="explore-link">Edit&nbsp;&rarr;</a></h4>';

                                        echo '<h4><a href="delete_product.php?company=' . urlencode($product['comp_name']) . '&product=' . urlencode($product['product_name']) . '" class="explore-link"><div style="background: #2B3044; background-hover: #1E2235; shadow: rgba(0, 9, 61, .2); padding: 5px; display: flex; justify-content: center; align-items: center; width:50"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" style="color:#E1E6F9;" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></div></a></h4>';




                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo "<p>No Products found.</p>";
                                }
                ?>
            </div>


            <!-- Pagination links -->
            <div class="pagination" style="background-color:white;width: fit-content;margin: 0 auto;">
                <ul>
                <?php
        $totalPages = ceil($totalCount / $perPage);

        // Previous button
        if ($currentPage > 1) {
            echo '<li><a href="?company=' . urlencode($_GET['company']) . '&page=' . ($currentPage - 1) . '">&lt;</a></li>';
        }

        // Page numbers
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<li' . ($i == $currentPage ? ' class="active"' : '') . '><a href="?company=' . urlencode($_GET['company']) . '&page=' . $i . '">' . $i . '</a></li>';
        }

        // Next button
        if ($currentPage < $totalPages) {
            echo '<li><a href="?company=' . urlencode($_GET['company']) . '&page=' . ($currentPage + 1) . '">&gt;</a></li>';
        }
        ?>
                </ul>
            </div>
            <!-- paginations ends -->
        </div>
    </div>
    
    </div>
            
                
    
</div>
</div>




<!-- Your existing HTML content -->




<script>
    document.addEventListener('DOMContentLoaded', function () {
        let carousel = document.getElementById('carouselExampleControls');

        // Calculate the number of carousel items
        let carouselItems = carousel.querySelectorAll('.carousel-item').length;

        // Handle carousel slide event
        carousel.addEventListener('slide.bs.carousel', function (e) {
            let currentIndex = e.to;
            let lastVisibleIndex = currentIndex * 6 - 1;

            // Show the next set of images
            for (let i = lastVisibleIndex + 1; i <= lastVisibleIndex + 6; i++) {
                // Show images based on their indices
                // Example: document.getElementById('image-' + i).style.display = 'block';
            }
        });
    });
</script>


</body>
</html>