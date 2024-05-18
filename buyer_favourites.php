<?php
// Assuming $session['comp_name'] holds the company name value
session_start();
// Include the database connection file
include 'dbcon.php';
$error="";

try {
    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT buyer_favourites FROM buyer_company_data WHERE buyer_comp_name = ?");

    // Bind the comp_name parameter
    $stmt->bind_param('s', $_SESSION['buyer_comp_name']);

    // Execute the query
    $stmt->execute();

    // Store the result
    $stmt->store_result();

    // Check if any rows were returned
    if ($stmt->num_rows > 0) {
        // Bind the result
        $stmt->bind_result($buyer_favourites);

        // Fetch the result
        $stmt->fetch();

        // Output the data from the buyer_favourites column
        $favourites_array = explode(',', $buyer_favourites);
    } else {
        echo "No data found for company name: " . $_SESSION['buyer_comp_name'];
    }

    // Close the statement
    $stmt->close();

} catch (PDOException $e) {
    // Display error message if connection fails
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="register2.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <!-- register2 holds the styling for new designed ui -->

    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    
    <title>User Registration Form</title>
    <style>
            .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        .message-block {
            display: <?php echo $error ? 'block' : 'none'; ?>;
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
            clear: both;
        }
    </style>
     <style>
                    .custom-table {
                        border-collapse: collapse;
                        width: 50%; /* Adjust the width as per your requirement */
                        margin: 20px auto; /* Center the table */
                    }
                    .custom-table th, .custom-table td {
                        border: 2px solid pink;
                        padding: 8px;
                        text-align: Center;
                    }
                    .custom-table th {
                        background-color: #f2f2f2;
                    }
                  </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-expand-lg shadow navbar-light" style="height: 3.5rem;">
        <div class="container-fluid">
          <div class="navbar-header">
            <img src="./images/vblogo.jpg" style="width: 17px; height: auto; margin-left: 15px; margin-bottom: 10px;">
            <strong><a class="navbar-brand" href="./index.php">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong>
          </div>
        </div>
    </nav>
    <!-- <div class="row">
        <div class="col-lg-12 fs-6 m-3">
            <h2>Welcome to Voltbridge!</h2><br>
            <h4>Elevate your B2B presence and fuel business growth online.<h4>
        </div>

    </div> -->
    <!----------------------- Main Container -------------------------->

<div class="container d-flex justify-content-center align-items-center " style="min-height: 95vh;">

    <!-- -------------------------left right containers----------------------- -->
        
   <div class="row">

    <!-- ------------------------------------------------------------- -->

    <!-- <div class="col-lg-4">
        <div class="row border rounded-5 p-3 shadow box bg-white">

            <div class="featured-image">
              <div class="row">
                <img src="./images/vbsteph1w.png" alt="" class="img-fluid rounded-circle" style="max-width: 100%;">
                    
              </div>
           </div> 
    
        </div>
    </div> -->
    
    <!-- ---------------------spacing betn to cards--------------------------- -->

    <div class="col-lg-1">
    </div>

    <!-- -----------------------right card------------------------- -->

    <div class="col-lg-7">
        
    <!----------------------- content-------------------------->
    <div class="row border rounded-5 p-1 bg-light shadow box-area" >

        <div class="col-lg-12 col-sm-10 right-box">
          <div class="row">
                <div class="header-text mb-4">
                     <h3 style="text-align: center;">Welcome to <strong><a class="navbar-brand" href="#">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong></h3>
                     <hr class="my-4" style="border-color: #020000;">
                    

                </div>
                <h3 style="text-align:center">Favourites</h3>

            </div>

            <div id="registration-form">

            <?php 
              if ($favourites_array[0]==NULL) {
                echo "<div style='text-align:center'>No favorites found</div>";
            } else {
                echo "<table class='custom-table'>";
                foreach ($favourites_array as $value) {
                    echo "<tr><td><a href='newpage.php?company=$value'>$value</a></td></tr>";
                }
                echo "</table>";
            }

             ?>



          
        <div style="text-align:center">
        <a  style="color:#228b22;" class="btn btn-default" href="buyer_dashboard.php">Dashboard</a>
        </div>  

    </div>
        
        

        <!-- for message block in original file -->
        <div style="width:100%"  class="message-block" style="display: <?php echo $error ? 'block' : 'none'; ?>;">
            <p class="error-message"><?php echo $error; ?></p>
        </div>

       </div> 

    </div>

    </div>
   </div>
    

</div>


<script>
    // Use noConflict mode to avoid conflicts with other libraries
    $.noConflict();

    jQuery(document).ready(function ($) {
        // Initialize Select2
        $('#countryCode').select2();

        // Handle search functionality
        $('#countryCode').on('select2:open', function (e) {
            $('.select2-search__field').attr('placeholder', 'Search...');
            $('.select2-search__field').attr('aria-controls', 'countryCode');
        });
    });
</script>
   

</body>
</html>


