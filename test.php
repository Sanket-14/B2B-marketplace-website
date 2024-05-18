
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
  
    


</head>
<body>
    <title style="color: black;">VoltBridge</title>
<style>
   .body{
        min-height: 100vh!important;
    }
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
        .container2{
            display:flex;
            justify-content:center;
            align-items:center;
        }
         .hero {
    display: table;
    position: relative;
    background-image: url('images/home1.png');
    background-size: cover;
    padding: 20px 0;
    color: #fff;
    width: 100%;
     /* Adjusted width */
    height:100%; /* Adjusted height */
}

.hero::after {
    content: '';
    position: absolute;
    background: rgba(23, 26, 31, 0.8); /* Transparent black overlay */
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
}
  .box-right{
      
  }
     
       
            
        
        
</style>
            


 <div>
   <!-- navbar styling code in navbar_resp.css and script in navbar_resp.js - these files linked in index.php, 
       navbar_resp.php contains whole html code for navbar, saved as backup. -->

       <!-- navbar header is being called from headernav.php in assets folder. -->
<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."suppnav.php"); ?>
</div>

<div class="hero fadeFromTop">
        <!--Function to randomly pick an image from array-->
        <script type="text/javascript">
    $(function() {
        var images = ['home1.png'];
        var currentIndex = 0;
        var backgroundElement = $('.hero');

        function changeBackground() {
            backgroundElement.css({'background-image': 'url(images/' + images[currentIndex] + ')'});
            currentIndex = (currentIndex + 1) % images.length;
        }

        // Change background initially
        changeBackground();

        // Automatically change background at an interval (e.g., every 5 seconds)
        setInterval(changeBackground, 10000); // Change every 5 seconds (5000 milliseconds)
    });
</script>
  <!----------------------- Main Container -------------------------->

<div class="container2" style="min-height: 95vh;">

    <!-- -------------------------left right containers----------------------- -->
        
   <div class="row">


    <!-- -----------------------right card------------------------- -->

    <div class="col-lg-7">
        
    <!----------------------- content-------------------------->
    <div class="row border rounded-5 p-1 bg-light shadow box-area" >

        <div class="box-right">
          <div class="row">
                <div class="header-text mb-4">
                     <h3 style="text-align: center;">Welcome to <strong><a class="navbar-brand" href="#">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong></h3>
                     <p style="text-align: center;">Elevate your B2B presence and fuel business growth online.</p>
                     <hr class="my-4" style="border-color: #020000;">
                     <h4 style="color: grey;"> Enter the mail you want to invite</h4>

                </div>
            </div>

            <div id="registration-form">

            <form  action="add_user.php" method="POST">
            

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control bg-light" id="email" name="email" placeholder="Email" required>
                    </div>
                </div>

            </div>

                
                </div>
            </div>

            
        <div class="input-group mb-3" style="justify-content:center">
            <button class="btn btn-lg btn-success fs-6" style=" width: 20rem;" type="submit">Send Invitation</button>
        </div>
    


        </form>
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