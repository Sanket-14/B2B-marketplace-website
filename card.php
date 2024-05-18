<?php 
require('dbcon.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="card.css">
    <title>Product Card</title>
<style>

.product-card-<?php echo $counter; ?> {
    width: 65vw;
    height: 10vh;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    /*box-shadow: 0 1px 2px rgba(0, 0, 0, 1);*/
    padding: 16px;
    box-sizing: border-box;
    position: relative;
    display: block;
    margin-bottom: 20px;
    transition: background-color 0.3s ease; /* Add a smooth transition effect */
}

 .product-card-<?php echo $counter; ?>:hover {
    background-color: #d4f4dd; /* Light green color */
}


  </style>

<style>
    .contact-supplier-btn {
    background-color: #fff; /* Green color for the button */
    color: green; /* White text color */
    padding: 8px 16px;
    border-color: green;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.contact-supplier-btn:hover {
    background-color: #fff; /* Change background color to white on hover */
    color: #000;
}
.icon {
    margin-right: 5px;
}
.product-card-<?php echo $counter; ?> {
     width: 65vw; 
    height: 200px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    /* box-shadow: 0 1px 2px rgba(0, 0, 0, 1); */
    padding: 16px;
    box-sizing: border-box;
    position: relative;
    display: block;
    margin-bottom: 20px;
    transition: background-color 0.3s ease;
}

.description {
    overflow: hidden;
    /* Optionally set a max-height for two lines */
    max-height: 3em; /* Adjust as needed */
    /* Allow text to wrap onto two lines */
    display: -webkit-box;
    -webkit-line-clamp: 2; /* Limit to two lines */
    -webkit-box-orient: vertical;
    width: 670px;
}
.comp_image{
    margin-top:10px;
}


</style>

<style>

    @media (max-width:768px) {
        .company-logo img {
        margin-top: -15px;
        width: 15vw;
        height: 15vh;
        object-fit: contain;
        }
        .product-card-<?php echo $counter; ?> {
            width:100%;
            height:auto;
            padding-bottom:0;
        }
        .heading{
            padding-top:5px;
            font-size:1rem;
        }
        .description{
            width:50vw;
        }
        .location {
            font-size:0.8rem;
        }
   
 }
    
</style>


</head>



<body>



<?php
// Ensure the $counter variable is defined before including this file
if (!isset($counter)) {
    $counter = 1;
}
?>

<!-- card.php -->

<div class="product-card-<?php echo $counter; ?>">
<a style="text-decoration:none" href="javascript:void(0);" onclick="redirectToNewPage(<?php echo $counter; ?>)"> 

    <div class="header">
    <h1 style="margin-top:-10px;font-family: 'Source Sans Pro', sans-serif; font-weight: 700; margin-bottom:7px; letter-spacing: 0.15px;" class="heading"></h1>


        <div class="overview">
    <p class="description" style=" margin-top: 5px; margin-bottom: 8px; margin-left:3px; font-family: 'Source Sans Pro', Helvetica, sans-serif; white-space: normal;"></p>
</div>


       <div style="margin-top: 1px; margin-bottom: 8px; margin-left:3px;" class="location">
    </a>

    <svg class="svg" width="24" height="24" xmlns="http://www.w3.org/2000/svg"  fill="none">
        <!-- Transparent circular background -->
        <circle cx="12" cy="12" r="11" fill="none"/>
        <!-- Globe icon -->
        <path fill="currentColor" d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M4.882 1.731a.48.48 0 0 0 .14.291.487.487 0 0 1-.126.78l-.291.146a.7.7 0 0 0-.188.135l-.48.48a1 1 0 0 1-1.023.242l-.02-.007a1 1 0 0 0-.462-.04 7 7 0 0 1 2.45-2.027m-3 9.674.86-.216a1 1 0 0 0 .758-.97v-.184a1 1 0 0 1 .445-.832l.04-.026a1 1 0 0 0 .152-1.54L3.121 6.621a.414.414 0 0 1 .542-.624l1.09.818a.5.5 0 0 0 .523.047.5.5 0 0 1 .724.447v.455a.8.8 0 0 0 .131.433l.795 1.192a1 1 0 0 1 .116.238l.73 2.19a1 1 0 0 0 .949.683h.058a1 1 0 0 0 .949-.684l.73-2.189a1 1 0 0 1 .116-.238l.791-1.187A.45.45 0 0 1 11.743 8c.16 0 .306.084.392.218.557.875 1.63 2.282 2.365 2.282l.04-.001a7.003 7.003 0 0 1-12.658.905Z"/>
    </svg>
    <a style="text-decoration:none" href="javascript:void(0);" onclick="redirectToNewPage(<?php echo $counter; ?>)"> 

    <p class="p-location" style="margin-bottom: 9px;"></p>
</div>
        <!--<p class="certificates"></p>-->
        <!--for business category pills-->
        <p class="business-categories"></p>
        
        </div>
    <div class="company-logo">
    <a style="text-decoration:none" href="javascript:void(0);" onclick="redirectToNewPage(<?php echo $counter; ?>)"> 
        <img style="" class="comp_image" src="" alt="logo">
        </a> 
       
    </div> 
    </a>

    
</div>



</body>
<script>
    function redirectToNewPage(counter) {
    // Get the text content of the <h1> element within the specific card
    var headingValue = document.querySelector('.product-card-' + counter + ' .heading').innerText;

    // Encode the value to ensure it's properly passed in the URL
    var encodedValue = encodeURIComponent(headingValue);
    
    // Redirect to newpage.php with the value as a query parameter
    window.location.href = 'newpage.php?company=' + encodedValue;
}
</script>
</html>


