<?php
        require('dbcon.php');
        ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="./images/logo.png">
  <!--=============== REMIXICONS for navbar styling ===============-->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="navbar_resp.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />


  <link rel="stylesheet" href="index_hero.css">


  <!-- <link rel="stylesheet" href="style2.css"> -->



  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/> -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet"> -->
 
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <!-- note: for fadefromtop we need swiperlibrary, it is internet dependent - doesent word without net -->
  <!--Link to jQuery CDN (this runs the entire function)-->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <!--Bootstrap 4.1 CDN for button and container-->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
  <title style="color: black;">VoltBridge</title>




  </style>


</head>

<body>

  <div>
    <!-- navbar styling code in navbar_resp.css and script in navbar_resp.js - these files linked in index.php, 
       navbar_resp.php contains whole html code for navbar, saved as backup. -->

    <!-- navbar header is being called from headernav.php in assets folder. -->
    <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/php/";
    include($IPATH . "headernav.php"); ?>
  </div>

  <!--Main Div for the entire hero image-->
  <div class="hero fadeFromTop">
<!-- fadeFromTop class removed -->

    <!--Function to randomly pick an image from array-->
    <script type="text/javascript">
      $(function() {
        // Define the image array here
        var images = ['home1.png', 'hm1.jpg', 'hm2.jpg', 'hm3.jpg', 'hm4.jpg', 'hm5.jpg', 'hm6.jpg', 'hm7.jpg'];

        var currentIndex = 0;
        var backgroundElement = $('.hero');

        function changeBackground() {
          backgroundElement.css({
            'background-image': 'url(images/' + images[currentIndex] + ')'
          });
          currentIndex = (currentIndex + 1) % images.length;
        }

        // Change background initially
        changeBackground();

        // Automatically change background at an interval (e.g., every 5 seconds)
        setInterval(changeBackground, 5000); // Change every 5 seconds (5000 milliseconds)
      });
    </script>


    <div class="bcontainer text-center">
      <!-- <div class="row"> </div> -->

      <!--Website Name-->
      <div class=" mycontent">
        <!--Website Tagline-->
        <h1>
          <p height="5rem"><b>Streamlining B2B Connections In EV Supply Chain</b></p>
        </h1>

        <!-- <h5 style="margin-top:-20px"> <p><b> </b></p></h5> -->
        <br>
        <!--Button that should link to the next section of your website-->
        
        <!-- appliead justify content center property to form and eliminated its previously set left margin causing block space inline -->
        <form class="myform" action="listing.php" METHOD="GET">
          <div class="search-container">
            <div class="search-icon">
              <span><i class="ri-search-line"></i></span>
            </div>
            <input name="search" type="text" class="search-input" placeholder="Search term e.g Castings, Magnet Wire....">
            <button type="submit" class="submit-button">Search</button>
          </div>
        </form>

      </div>
    </div>
  </div>

<!-- ---------- why voltbrdige green starts here----------------- -->
<div class="tme">

   <div class="fadeFromTop timeline-block timeline-block-right">
      <div class="marker"></div>
      <div class="fadeFromTop timeline-content fadeFromTop">
         <h3>Discover EV Suppliers</h3>
         <span></span>
         <p>Struggling to navigate the complex EV market? Say goodbye to endless searches and inconsistent information. Our platform's search functionality is tailored to the unique needs of the EV industry. Buyers can easily filter suppliers based on criteria like product type, supplier category, and location. This precision search simplifies finding the perfect supplier, saving time and enhancing decision-making. </p>
         <div class="button-container">
         <a href="infotab2.php"><button class="learn-more-button">Learn more</button></a>

         </div>
      </div>
   </div>

   <div class="fadeFromTop timeline-block timeline-block-left" style="justify-content:start; ">
      <div class=""></div>
      <div class="timeline-content content-whyvoltbridge fadeFromTop">
         <h3 style="text-align: left;">? Why VoltBridge </h3>
         <span></span>
         <p style="text-align-last:end;">VoltBridge is a unique B2B platform designed to streamline connections between buyers and suppliers within the dynamic E-mobility industry. Our platform's product listings are designed to give buyers a clear and comprehensive view of what suppliers offer. Each listing is detailed with high-quality images, in-depth descriptions, ensuring buyers have all the information they need at their fingertips</p>
      </div>
   </div>

   <div class="fadeFromTop timeline-block timeline-block-right" >
      <div class="marker"></div>
      <div class="timeline-content fadeFromTop" >
         <h3>Showcase EV Experties</h3>
         <span></span>
         <p>Visibility is the key in the evolving EV market, puts your products and services in front of the right customers, effortlessly. Present your product range in an organized manner. Group related products and provide comprehensive descriptions for each, making it easy for buyers to navigate and understand your offerings. Showcase the best of what you offer with high-quality images of your products.</p>
         <div class="button-container">
         <a href="infotab1.php"><button class="learn-more-button">Learn more</button></a>
         </div>
      </div>
   </div>
</div>

<!-- ------------- why voltbrdige green ends here----------------- -->



  <!-- <div class="features nav-section" id="features">
        <section class="features__text">
            <h2 class="fadeFromTop">Why VoltBridge ?</h2>
            <p class="fadeFromTop">"VoltBridge is a unique B2B platform designed to streamline connections between buyers and suppliers within the dynamic E-mobility industry"</p>
        </section>
    </div> -->

  <!-- search bar and container ends-->
  <!-- <div class="outer-div">
    <div class="inner_div">
      <h2 class="whyvoltbridge">Why VoltBridge ?</h2>
      <p>"VoltBridge is a unique B2B platform designed to streamline connections between buyers and suppliers within the dynamic E-mobility industry"</p>
    </div>
  </div> -->

  <!-- description ends -->
  
<?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/whatsapp chat/";
    include($IPATH . "widget.php"); ?>




  <footer class="footer">
    <!-- <div class="fcontainer"> -->
      <div class="footer-links">
        <!--  <a href="aboutus.php">About Us</a> -->
        <a href="contact_us.php">Contact Us</a>
        <a href="FAQ.php">FAQs</a>
        <a href="privacy.php">Data Privacy</a>
          <div class="social-links">
        <!-- <a href="https://www.linkedin.com/company/voltbridge/" target="_blank"><i class="fab fa-linkedin-in"></i></a> -->
           <a href="https://www.linkedin.com/company/voltbridge/" target="_blank"><i class="ri-linkedin-box-fill"></i></a>
        <!-- Add more social media icons as needed -->
          </div>
      </div>
      <hr>
      <div class="copyright">
        <p>&copy; 2024 VoltBridge. All Rights Reserved.</p>
      </div>

   
    <!-- </div> -->
  </footer>



 <script defer src="app.js"></script>

  <script>
        // Function to check if an element is in the viewport
function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// Function to handle scroll event
function handleScroll() {
    var elements = document.querySelectorAll('.fadeFromTop');
    elements.forEach(function(el) {
        if (isElementInViewport(el)) {
            el.classList.add('.fft-active');
        }
    });
}

// Listen for the scroll event
window.addEventListener('scroll', handleScroll);

// Trigger the function initially to check if any elements are already in the viewport
handleScroll();



    </script>






</body>

</html>