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

    $query_customer_references = "SELECT * FROM customer_reference WHERE comp_name='$headingValue'";
    $result_customer_references = mysqli_query($conn, $query_customer_references);

    // $customer_references=mysqli_fetch_all($result_customer_references,MYSQLI_ASSOC);



    // Query for userdata table new-------------------------------------------------------
    $queryUserData = "SELECT * FROM userdata WHERE comp_name LIKE '%$headingValue%'";
    $resultUserData = mysqli_query($conn, $queryUserData);
    // Fetch all rows from user_data
    $rowsUserData = mysqli_fetch_all($resultUserData, MYSQLI_ASSOC);


    $queryfinance = "SELECT * FROM finance WHERE comp_name LIKE '%$headingValue%'";
    $resultfinance = mysqli_query($conn, $queryfinance);

    if ($resultfinance) {
        // Fetch all rows as an associative array
        $rowsfinance = mysqli_fetch_all($resultfinance, MYSQLI_ASSOC);

        // Cast fetched values to the integer data type
        $checknull = 0; // Initialize $checknull variable


        foreach ($rowsfinance as &$rowfinance) {
            // Check if any value is null
            if (in_array(NULL, $rowfinance, true)) {
                $checknull = 1; // Update $checknull if any value is null
                break; // Exit the loop once a null value is found
            }

            // Convert revenue and income values to integers
            $rowfinance['fy_revenue'] = (int)$rowfinance['fy_revenue'];
            $rowfinance['sy_revenue'] = (int)$rowfinance['sy_revenue'];
            $rowfinance['ty_revenue'] = (int)$rowfinance['ty_revenue'];
            $rowfinance['ly_revenue'] = (int)$rowfinance['ly_revenue'];

            $rowfinance['fy_income'] = (int)$rowfinance['fy_income'];
            $rowfinance['sy_income'] = (int)$rowfinance['sy_income'];
            $rowfinance['ty_income'] = (int)$rowfinance['ty_income'];
            $rowfinance['ly_income'] = (int)$rowfinance['ly_income'];
        }

        // Encode data to JSON
        $financeDataJson = json_encode($rowsfinance);
    }
} else {
    echo "Heading Value or ImgSrc is not set in the URL";
}
?>

<?php
function extractVideoId($url)
{
    // Extract video ID from YouTube URL
    $videoId = '';

    // Check if the URL is in the format https://www.youtube.com/watch?v=VIDEO_ID
    if (strpos($url, 'youtube.com/watch?v=') !== false) {
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $params);
        if (isset($params['v'])) {
            $videoId = $params['v'];
        }
    }
    // Check if the URL is in the format https://youtu.be/VIDEO_ID
    elseif (strpos($url, 'youtu.be/') !== false) {
        $path = parse_url($url, PHP_URL_PATH);
        $videoId = ltrim($path, '/');
    }

    return $videoId;
}

?>

<?php
if (isset($_COOKIE["remember_token"])) {
    $remember_me = 1;
} else {
    $remember_me = 0;
}
?>
<?php
if (isset($_COOKIE["buyer_remember_token"])) {

    $stmt = $conn->prepare("SELECT buyer_comp_name FROM buyer_userdata WHERE buyer_rm_token = ?");
    $stmt->bind_param("s", $_COOKIE["buyer_remember_token"]);
    $stmt->execute();
    $stmt->bind_result($buyer_comp_name);
    $stmt->fetch();
    //  $buyer_comp_name;
    $stmt->close();

    // Prepare and execute SQL query to get values from buyer_favourites
    $stmt = $conn->prepare("SELECT buyer_favourites FROM buyer_company_data WHERE buyer_comp_name = ?");
    $stmt->bind_param("s", $buyer_comp_name);
    $stmt->execute();

    // Check for errors
    if ($stmt->error) {
        die("Error: " . $stmt->error);
    }
    $stmt->bind_result($buyer_favourites);

    // Fetch result
    $stmt->fetch();

    // Convert comma-separated string to array
    $buyer_favourites_array = explode(",", $buyer_favourites);

    $already_favourite = 0; // Initialize to 0
    foreach ($buyer_favourites_array as $fav) {
        if ($fav == $headingValue) {
            $already_favourite = 1;
            break; // Break the loop if match is found
        }
    }

    // Output the result
    // echo "Already Favourite: " . $already_favourite;

    // Output the array
    // print_r($buyer_favourites_array);

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
<?php
// Assume $already_favourite is set somewhere in your code
if (isset($already_favourite)) {

    // Define the visibility CSS property based on the value of $already_favourite
    $visibility = $already_favourite == 1 ? 'visible' : 'hidden';

    // Output the CSS with the visibility property set dynamically
    echo '<style>.heart-fill { fill: red; visibility: ' . $visibility . '; }</style>';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="navbar_resp.css"> -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />

    <link rel="stylesheet" href="companyinfo.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="navbar_resp.css">
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>


</head>

<style>
    .form-popup-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        flex-direction: column;
        align-content: center;
        justify-content: center;
    }

    .form-popup-bg {
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(94, 110, 141, 0.9);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
        -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
        transition: opacity 0.3s 0s, visibility 0s 0.3s;
        overflow-y: auto;
        z-index: 10000;
    }

    .form-popup-bg.is-visible {
        opacity: 1;
        visibility: visible;
        -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
        -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
        transition: opacity 0.3s 0s, visibility 0s 0s;
    }

    .form-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        padding: 40px;
        color: black;
    }

    .close-button {
        background-color: #198754;
        color: #198754;
        width: 40px;
        height: 40px;
        position: absolute;
        top: 0;
        right: 0;
        border: solid 1px #fff;
    }

    .form-popup-bg:before {
        content: '';
        background-color: #fff;
        opacity: 0.25;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    /* .popup{
display: flex;
flex-direction: column;
} */
    .popup input,
    .popup textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        margin-right: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #e7e9ed !important;
        resize: vertical;
    }

    .popup button[type="submit"] {
        background-color: #198754;
        color: #fff;
        border: none;
        padding: 10px 20px;
        text-align: center;
        justify-content: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
    }

    .right-side form {
        /* display: flex; */
        width: 100% !important;
        margin-top: 40px;
    }

    textarea::placeholder {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>


<body>

    <div>
    <!-- navbar styling code in navbar_resp.css and script in navbar_resp.js - these files linked in index.php, 
       navbar_resp.php contains whole html code for navbar, saved as backup. -->

    <!-- navbar header is being called from headernav.php in assets folder. -->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/php/";
    include($IPATH . "headernav.php"); ?>
     </div>
    

    <div class="main-div" style="margin-top:6.5rem">
        <div class="left-div">
            <div>
                <div class="inner-left-div">
                    <div class="first-half">
                        <div class="first-section">
                            <div style="display:flex;flex-direction:row; justify-content:space-between">
                                <img height="100" width="120" src="uploads/<?php echo $row['image_url']; ?>" alt="Company Image" width="48" height="48" onerror="this.src = './images/default_company_logo.png';">
                                <div style="display:flex;flex-direction:column;">
                                    <?php if ($row['v_admin'] == 1) { ?>
                                        <span class="tooltip" title="Company Verified by Voltbridge" style="padding-top:0px; margin-top:0px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#23D375FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                                                <polyline points="22 4 12 14.01 9 11.01" />
                                            </svg>
                                        </span>
                                    <?php } ?>
                                    <?php if (isset($_COOKIE["buyer_remember_token"])) { ?>
                                        <span class="tooltip" title="add to favourites" style="padding-top:0px; margin-top:0px;">
                                            <div class="heart-toggle" style="margin-top:10px">
                                                <!-- Heart icon -->
                                                <svg class="heart-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path class="heart-outline" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                                    <path class="heart-fill" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                                </svg>
                                            </div>
                                        </span>
                                    <?php } ?>
                                </div>
                            </div>
                            <h2>
                                <a href="<?php echo $row['Website']; ?>" style="text-decoration: none; color: black; transition: color 0.3s ease; display: inline-block;" onmouseover="this.style.color='rgb(107,225,162)'" onmouseout="this.style.color='black'">
                                    <?php echo $row['comp_name']; ?>
                                </a>
                            </h2>
                            <button class="green-button" id="btnOpenForm">Contact Supplier</button>
                        </div>
                        <br>
                        <br>
                        <hr>
                        <!-- <br> -->
                        <div class="first-section">
                            <h2>KEY DATA</h2>
                            <div style="display:flex;align-items:center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                    <path d="M16 21v-2a4 4 0 0 0-8 0v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                    <path d="M20 8v6a6 6 0 0 1-3.33 5.37"></path>
                                    <path d="M4 8v6a6 6 0 0 0 3.33 5.37"></path>
                                    <line x1="4" y1="12" x2="20" y2="12"></line>
                                </svg>
                                <span style="margin-left:10px;vertical-align: middle; line-height:2.5; color:#494949;"> <?php echo $row['Company_Size']; ?></span>
                            </div>
                                        
                                       
                            <div style="display:flex;align-items:center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path d="M15.24 6a9.55 9.55 0 0 0-1.5 2H9.26a9.55 9.55 0 0 0-1.5-2"></path>
                                    <path d="M15.24 18a9.55 9.55 0 0 0 1.5-2h4.48a9.55 9.55 0 0 0-1.5 2"></path>
                                    <path d="M5.76 6a9.55 9.55 0 0 0-1.5 2H8.24a9.55 9.55 0 0 0 1.5-2"></path>
                                    <path d="M5.76 18a9.55 9.55 0 0 0 1.5-2h4.48a9.55 9.55 0 0 0-1.5 2"></path>
                                </svg>
                                <a href="<?php echo $row['Website']; ?>" style="vertical-align: middle; line-height:2.5; color:#494949; margin-left: 10px; text-decoration: none; transition: color 0.3s ease;" onmouseover="this.style.color='rgb(107,225,162)'" onmouseout="this.style.color='black'">Website</a>
                            </div>
                                        
                            <div>

                                <?php if (!empty($row['city']) || !empty($row['Contact_Number']) || !empty($row['Country'])) { ?>
                                    <div class="icon-text" style="display:flex;align-items:center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                            <!-- Pin Body -->
                                            <path d="M12 2C7.73 2 4 5.73 4 10c0 4.25 8 13 8 13s8-8.75 8-13c0-4.27-3.73-8-8-8z"></path>

                                            <!-- Pin Head -->
                                            <circle cx="12" cy="10" r="2"></circle>
                                        </svg>
                                        <span style="margin-left:10px;vertical-align: middle; line-height:2.5; color:#494949;"><?php echo $row['city'] . ', ' . $row['Contact_Number'] . ', ' . $row['Country'] . '.'; ?></span>
                                        <!-- contact_number has been used for pincode in table by mistake -->
                                    </div>
                                <?php } ?>

                            </div>
                        </div>

                        <br>
                        <hr>
                        <div class="first-section">
                            <h3 style="font-family:Arial, sans-serif; font-size:20px; line-height:2.5;">SUPPLIER TYPES</h3>

                            <?php
                            $supplierTypesString = $row['Supplier_type'];
                            $supplierTypesArray = explode(',', $supplierTypesString);

                            // Check if 'Distributor' is in the array, and if so, display the corresponding row
                            if (in_array('Distributor', $supplierTypesArray)) {
                                echo '<div style="margin-bottom: 1px;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                                <rect x="2" y="3" width="20" height="9" rx="2" ry="2"></rect>
                                <rect x="2" y="14" width="20" height="9" rx="2" ry="2"></rect>
                                <line x1="6" y1="6" x2="6" y2="6"></line>
                                <line x1="6" y1="18" x2="6" y2="18"></line>
                              </svg>

                               <span style="margin-left:10px;color:#494949; vertical-align: middle;
                               ">Distributor</span></div> <br>';
                            }

                            // Check if 'Manufacturer' is in the array, and if so, display the corresponding row
                            if (in_array('Manufacturer', $supplierTypesArray)) {
                                echo '<div style="margin-bottom: 1px;"><i class="material-symbols-outlined" style="vertical-align: middle;color:charcoal;">build</i> <span style="margin-left:10px;color:#494949; vertical-align: middle;
        
                                ">Manufacturer</span></div> <br>';
                            }

                            // Check if 'Service Provider' is in the array, and if so, display the corresponding row
                            if (in_array('Service Provider', $supplierTypesArray)) {
                                echo '<div style="margin-bottom: 1px;"><i class="material-symbols-outlined" style="vertical-align: middle; color:charcoal;">group</i><span style="margin-left:10px;color:#494949; vertical-align: middle;
                                ">Service Provider</span></div><br>';
                            }
                            ?>
                        </div>
                        <hr>
                        <div class="first-section">
                            <?php
                            // Assuming $row['Company_Certificates'] contains the certificate string
                            $certificatesString = $row['Company_Certificates'];

                            // Check if certificates information is not empty
                            if (!empty($certificatesString)) {
                                echo '<div class="certificates" style="height: auto;">';
                                
                                echo '<h3 style="margin-bottom: 10px; margin-top: 10px; font-family: Arial, sans-serif; font-size: 20px; line-height: 2.0;">CERTIFICATES</h3>';

                                // Split the string into an array using the comma as a separator
                                $certificatesArray = explode(', ', $certificatesString);

                                // Define an array of dark colors for each certificate
                                $certificateColors = array(
                                    '#f39c12', // Orange
                                    '#f1c40f', // Yellow
                                    '#2ecc71', // Light Green
                                    '#3498db', // Sky Blue
                                    '#e74c3c', // Light Red (Pinkish)
                                    '#ecf0f1', // Light Grey
                                    '#bdc3c7', // Little Dark Shade of Yellow
                                    '#2ecc72'  // Little Different Light Shade of Green
                                );

                                // Counter to cycle through colors
                                $colorCounter = 0;

                                // Loop through the array and echo each certificate as a colored pill
                                foreach ($certificatesArray as $certificate) {
                                    // Get the color for the current certificate or use a default color (#494949)
                                    $color = isset($certificateColors[$colorCounter]) ? $certificateColors[$colorCounter] : '#494949';

                                    // Echo the certificate as a colored pill with white text
                                    echo '<span style="display: inline-block; border-radius:50px; margin-right: 5px; margin-bottom: 5px; padding: 5px 15px; color: white; background-color: ' . $color . ';">' . $certificate . '</span>';

                                    // Increment the color counter and reset if it exceeds the number of available colors
                                    $colorCounter = ($colorCounter + 1) % count($certificateColors);
                                }

                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
<hr>
                    <div class="second-half">

                        <div class="first-section">

                            <?php
                            // Assuming $row['yt_link'] contains the YouTube video link
                            $youtubeLink = $row['yt_link'];

                            // Check if the YouTube link is not empty
                            if (!empty($youtubeLink)) {
                                
                                echo '<h3 style="margin-bottom: 10px; margin-top: 10px; font-family: Arial, sans-serif; font-size: 20px; line-height: 2.0;">Company Video</h3>';
                                echo '<div class="company-video mb-3" id="player" style="height: 200px;"></div>';
                                echo '<script>';
                                echo 'function onYouTubeIframeAPIReady() {';
                                echo '    var player = new YT.Player("player", {';
                                echo '        height: "100%",';
                                echo '        width: "100%",';
                                echo '        videoId: "' . extractVideoId($youtubeLink) . '",';
                                echo '        playerVars: {';
                                echo '            \'autoplay\': 0,';
                                echo '            \'controls\': 1,';
                                echo '            \'rel\': 0,';
                                echo '            \'showinfo\': 0';
                                echo '        }';
                                echo '    });';
                                echo '}';
                                echo '</script>';
                            }
                            ?>
                        </div>
                        <div class="first-section">

                            <?php
                            // Assuming $row['file'] contains the file name
                            $file = $row['file'];

                            // Check if the file is not empty
                            if (!empty($file)) {
                                echo '<hr>';
                                echo '<h3 style="margin-bottom: 10px; margin-top: 10px; font-family: Arial, sans-serif; font-size: 20px; line-height: 2.0;">Company Presentation</h3>';
                                echo '<div class="company-presentation mb-3" style="height: 200px;">';
                                echo '    <a href="company_files/' . $file . '" onclick="openPdfInNewTab(event)" target="_blank" rel="noopener noreferrer">';
                                echo '        <embed src="company_files/' . $file . '" type="application/pdf" width="100%" height="100%">';
                                echo '    </a>';
                                echo '    <a href="company_files/' . $file . '" target="_blank" rel="noopener noreferrer">Preview</a>';
                                echo '</div><br>';
                            }
                            ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="right-div">
            <div class="inner-right-div">
                <div>
                    <h2>Company Overview</h2>
                    <p style="margin-top:-1px;"><?php echo $row['Company_Overview'] ?></p>

                </div>

            </div>

            <div class="inner-right-div" style="margin-top:20px">
                <div>
                    <h2>Products</h2>
                    <div class="products-div" style="">
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
                                $shortDescription = $product['product_description'];
                                $limitedShortDescription = substr($shortDescription, 0, 80);
                        ?>
                                <div class="card">
                                    <a href="product_detail.php?company=<?= urlencode($product['comp_name']) ?>&product=<?= urlencode($product['product_name']) ?>">
                                        <img class="products-image" src="products/<?php echo $first_image ?>" alt="Product logo" width=258 height=200>
                                    </a>
                                    <h2><?php echo $product['product_name'] ?></h2>
                                    <p><?php echo  $limitedShortDescription ?></p>

                                    <h4 style="line-height: 1.5;">
                                        <a href="product_detail.php?company=<?= urlencode($product['comp_name']) ?>&product=<?= urlencode($product['product_name']) ?>">Explore&nbsp;&rarr;</a>
                                    </h4>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No products Found";
                        }
                        ?>
                        <div class="form-popup-bg">
                            <div class="form-container">
                                <button id="btnCloseForm" class="close-button" style="background-color:#198754"><h2 id="btnCloseForm" style="color:white">X</h2></button>
                                <h1>Contact Us</h1>
                                <p>For more information. Please complete this form.</p>
                                <form action="contact_supplier_email.php" style="width: 100%" method="POST">
                                    <div class="popup">
                                        <h2></h2>
                                        <label for="fullname">Full Name</label>
                                        <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
                                        <label for="email">Email Address</label>
                                        <input type="email" id="email" name="email" placeholder="Email" required>
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" id="phone" name="phone" placeholder="Phone Number" required>
                                        <input type="hidden" name="comp_name" value="<?php echo $headingValue; ?>" />

                                        <label for="message">Message</label>
                                        <textarea id="message" name="message" rows="3" placeholder="Message" required></textarea>
                                        <center><button type="submit">Submit</button></center>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="inner-right-div" style="margin-top:20px">
                <h2>Business Categories</h2>
                <div style="display: flex; flex-wrap: wrap;">
                    <?php
                    // Assuming $row['Categories'] contains the categories string
                    $categoriesString = $row['Categories'];

                    // Split the string into an array using the comma as a separator
                    $categoriesArray = explode(',', $categoriesString);

                    // Loop through the array and echo each category as a green-bordered pill
                    foreach ($categoriesArray as $category) {
                        // Trim any leading or trailing whitespace from the category
                        $category = trim($category);

                        // Check if the category is not empty before displaying
                        if (!empty($category)) {
                            echo '<span style="border: 1px solid #006400; border-radius: 50px; padding: 5px 15px; margin: 5px; color: #006400;">' . $category . '</span>';
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="inner-right-div" style="margin-top:20px">
                <?php $aboutUsContent = $row['about_us'];
                // Assuming $row['company_images'] contains the comma-separated image names
                $companyImages = $row['company_images'];
                $image_names = explode(',', $companyImages);
                $image_count = count($image_names);
                $images_per_row = 3;

                ?>
                <h2>About Us</h2>
                <p><?php echo $aboutUsContent ?></p>
                <div class="image-container" style="display:flex;flex-direction:row;">
                    <?php
                    // Loop through the image names array
                    foreach ($image_names as $image_name) {
                        // Output the image HTML
                        echo '<div class="image-wrapper">';
                        echo '<img class="comp-images" width=150 height=150 src="company_images/' . $image_name . '" alt="Company Image">';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            <?php 
            if (mysqli_num_rows($result_customer_references) > 0 || (!$checknull)) 
            {
                
            ?>
            <div class="inner-right-div" style="margin-top:20px;">
                <div class="references-div" >
                    
                        <?php
                        if (mysqli_num_rows($result_customer_references) > 0) { ?>
                        <div class="cust-references" >
                        <h2>References</h2>
                
                        <?php
                            // Fetch all the records as an associative array
                            $customer_references = mysqli_fetch_all($result_customer_references, MYSQLI_ASSOC);
                        
                            // Loop through each record
                            foreach ($customer_references as $reference) {
                        ?>
                                <div class="content-section" style="height: calc(100% / <?php echo count($customer_references); ?>); display:flex; flex-direction:row">
                                    <img src="ref_logo/<?php echo $reference['ref_logo']; ?>" alt="image" class="image" height="100" width="100">
                                    <div class="text" style="margin-left:50px;margin-top:-0px">
                                        <h2><a class="ref-name" href="<?php echo $reference['website']; ?>" style="text-decoration: none; color: black; transition: color 0.3s ease;" onmouseover="this.style.color='rgb(107,225,162)'" onmouseout="this.style.color='black'"><?php echo $reference['ref_comp_name']; ?></a></h2>
                                        <h4 class="ref-categories"><?php echo $reference['categories_supplied']; ?></h4>
                                    </div>
                                </div>
                        <?php
                            }
                        } // No need for an else part here, leave it blank
                        ?>
                    </div>

                    <div class="graph" >
                        <?php if (!$checknull) { ?>
                            <h2>Financial Information</h2>
                            <div class="legend">
                                <div class="legend-item">
                                    <div class="legend-circle" style="background-color: green;"></div>
                                    <span>Revenue</span>
                                </div>
                                <div class="legend-item">
                                    <div class="legend-circle" style="background-color: lightgreen;"></div>
                                    <span>Income</span>
                                </div>
                            </div>
                            <canvas id="financeChart" width="400" height="200"></canvas>

                        <?php } ?>
                    </div>
                </div>
            </div>
            
            <?php
            }
            ?>

        </div>
    </div>


</body>
<!-- script for navbar -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Finance Trend Chart Data
        var financeData = {
            labels: ["2020", "2021", "2022", "2023"],
            datasets: [{
                label: 'Revenue',
                data: <?php echo isset($rowsfinance[0]['fy_revenue']) ? json_encode([$rowsfinance[0]['fy_revenue'], $rowsfinance[0]['sy_revenue'], $rowsfinance[0]['ty_revenue'], $rowsfinance[0]['ly_revenue']]) : json_encode([0, 0, 0, 0]) ?>,
                backgroundColor: 'green',
            }, {
                label: 'Income',
                data: <?php echo isset($rowsfinance[0]['fy_income']) ? json_encode([$rowsfinance[0]['fy_income'], $rowsfinance[0]['sy_income'], $rowsfinance[0]['ty_income'], $rowsfinance[0]['ly_income']]) : json_encode([0, 0, 0, 0]) ?>,
                backgroundColor: 'lightgreen',
            }]
        };

        // Finance Trend Chart Configuration
        var financeConfig = {
            type: 'bar',
            data: financeData,
            options: {
                scales: {
                    y: {
                        display: true, // Hide the y-axis
                    },
                    x: {
                        grid: {
                            display: false // Hide the x-axis background grid
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false, // Hide the legend
                    },
                    datalabels: {
                        color: 'black', // Text color
                        anchor: 'end', // Position of the value
                        align: 'end', // Alignment of the value
                        offset: 4, // Padding between the value and the bar
                        display: function(context) {
                            return context.dataset.data[context.dataIndex] > 0; // Display values only for positive bars
                        },
                        formatter: function(value) {
                            return value; // Format the value as needed
                        }
                    }
                }
            }
        };

        // Get the context of the canvas element
        var financeCtx = document.getElementById('financeChart').getContext('2d');

        // Create the Finance Trend Chart
        var financeChart = new Chart(financeCtx, financeConfig);
    });
</script>

<script>
    /*=============== SHOW MENU ===============*/
    const showMenu = (toggleId, navId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId)

        toggle.addEventListener('click', () => {
            // Add show-menu class to nav menu
            nav.classList.toggle('show-menu')

            // Add show-icon to show and hide the menu icon
            toggle.classList.toggle('show-icon')
        })
    }

    showMenu('nav-toggle', 'nav-menu')
</script>

<script>
    document.querySelectorAll('.heart-toggle').forEach(item => {
        item.addEventListener('click', event => {
            // Toggle visibility of filled heart icon
            let fillHeart = item.querySelector('.heart-fill');
            let visibilityStatus = fillHeart.style.visibility === 'visible' ? 'visible' : 'hidden';

            fillHeart.style.visibility = (fillHeart.style.visibility === 'visible') ? 'hidden' : 'visible';

            // Prepare data to send in AJAX request
            console.log(visibilityStatus);
            let compName = '<?php echo $_GET["company"]; ?>'; // Corrected variable name to match the PHP script
            let requestData = {
                comp_name: compName,
                visibility: visibilityStatus // Corrected key name to match the PHP script
            };

            // Send AJAX request
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'toggle_favorite.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    // Handle response here if needed
                    console.log(xhr.responseText);
                }
            };
            xhr.send(JSON.stringify(requestData));
        });
    });
</script>

<script>
    function downloadPDF(pdfPath) {
        // Create a temporary anchor element
        var a = document.createElement('a');
        // Set the href attribute to the PDF path
        a.href = pdfPath;
        // Set the download attribute with the desired filename
        a.download = 'Company_Presentation.pdf';
        // Append the anchor to the document body
        document.body.appendChild(a);
        // Trigger a click event on the anchor to initiate the download
        a.click();
        // Remove the anchor from the document body
        document.body.removeChild(a);
    }
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

<script>
    function closeForm() {
        $('.form-popup-bg').removeClass('is-visible');
    }

    $(document).ready(function($) {

        /* Contact Form Interactions */
        $('#btnOpenForm').on('click', function(event) {
            event.preventDefault();

            $('.form-popup-bg').addClass('is-visible');
        });

        //close popup when clicking x or off popup
        $('.form-popup-bg').on('click', function(event) {
            if ($(event.target).is('.form-popup-bg') || $(event.target).is('#btnCloseForm')) {
                event.preventDefault();
                $('.form-popup-bg').removeClass('is-visible');
            }
        });



    });
</script>


</html>