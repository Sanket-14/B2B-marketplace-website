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
           
.overview{
    background-color: var(--cta); /* Change background color to orange */
}

/* ... other existing styles ... */

.overview-flex__text-link{
    /* Update the green color to orange */
    background: #23D375FF;  /* Change to orange */
    color: var(--white); 
    text-decoration:none;/* Text color black */
}

.overview-flex__text-link:hover{
    background: white; /* Change hover background to orange */
    color: black;
    border-color: #23D375FF; 
    text-decoration:none;
    /* ... other existing styles ... */
}

/* ... other existing styles ... */

.overview__facts{
    background: var(--dark-black); /* Change to orange */

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

    </style>

    
</head>
<body>


<!-- * -->
    <!--Main Div for the entire hero image-->
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
<div class="container">
<div class="main-content">
        <!-- Main header "Buyer" -->
       <div class="container2" style="min-height: 95vh;">

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
                     <p style="text-align: center;">Elevate your B2B presence and fuel business growth online.</p>
                     <hr class="my-4" style="border-color: #020000;">
                     <h4 style="color: grey;"> Enter the mail you want to invite</h4>

                </div>
            </div>

            <div id="registration-form">

            <form  action="add_user.php" method="POST">
            <div class="row">
                
            </div>

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
    </div>
    </div>
  <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function(){
            loader.style.display ="none";
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <!--Bootstrap jQuery and Javascript-->
        
    
</body>
</html>