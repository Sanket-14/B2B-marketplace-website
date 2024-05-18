<?php
// session_start(); // Start the session
require('dbcon.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!-- styling code in navbar_resp.css and script in navbar_resp.js - these files linked in index.php, 
       navbar_resp.php contains whole html code for navbar, saved as backup. -->

<!--=============== HEADER ===============-->
<header class="header">
   <nav class="nav container">
      <div class="nav__data">
         <strong>
            <a href="index.php" class="nav__logo" style="text-decoration: none; font-size: 24px; color:white;">
               <img class="imglogo" src="images/vblogo.jpg" alt="">
               <span class="titlevb" style="color: black;">Volt<span class="titlevb" style="color: rgb(40, 212, 120); ">Bridge
            </a></strong>


         <div class="nav__toggle" id="nav-toggle">
            <i class="ri-menu-line nav__burger"></i>
            <i class="ri-close-line nav__close"></i>
         </div>
      </div>

      <!--=============== NAV MENU ===============-->
      <div class="nav__menu" id="nav-menu">
         <ul class="nav__list">


            <!--=============== DROPDOWN 1 ===============-->
            <li class="dropdown__item">
               <div class="nav__link addcomp">
                  <button class="add_compbtn">Add Your Company </button>
                  <i class="ri-arrow-down-s-line dropdown__arrow dropdown_arrow_1 "></i>
               </div>

               <ul class="dropdown__menu">
                  <div class="parent_link">
                     <li>
                        <a href="register.php" class="dropdown__link">
                           <!-- <i class="ri-user-line"></i> -->
                           As a Supplier
                        </a>
                     </li>

                     <li>
                        <a href="buyer_registration.php" class="dropdown__link" style="margin-top: 0.5rem;">
                           <!-- <i class="ri-user-6-line"></i> -->
                           As a Buyer
                        </a>
                     </li>
                  </div>
               </ul>
            </li>


            <!--=============== DROPDOWN 2 ===============-->
            <?php

            // Check if the user is logged in
            if (!isset($_COOKIE["buyer_remember_token"]) && !isset($_COOKIE["remember_token"])) {
               // If not logged in, display the login button
               echo '<li class="dropdown__item login_margin">
            <div class="nav__link loginbtn">
               <button class="loginword">
                  Login
               </button>
               <i class="ri-arrow-down-s-line dropdown__arrow loginbtn_arrow"></i>
            </div>
            <ul class="dropdown__menu">
               <div class="parent_link">
                  <li>
                     <a href="login.php" class="dropdown__link">
                        Supplier Login
                     </a>
                  </li>
                  <li>
                     <a href="buyer_login.php" class="dropdown__link" style="margin-top: 0.5rem;">
                        Buyer Login
                     </a>
                  </li>
               </div>
            </ul>
         </li>';
            } else if (isset($_COOKIE["buyer_remember_token"])) {
               // Fetch the user's information from the database using the company name
               $buyer_remember_token = $_COOKIE["buyer_remember_token"];
               $sql_header = "SELECT * FROM buyer_userdata WHERE buyer_rm_token = '$buyer_remember_token'";
               $result_header = $conn->query($sql_header);

               if ($result_header && $result_header->num_rows > 0) {
                   $row_header = $result_header->fetch_assoc();
                   // Get the user's first and last name initials
                   $firstInitial = !empty($row_header['buyer_first_name']) ? strtoupper($row_header['buyer_first_name'][0]) : '';
                   $lastInitial = !empty($row_header['buyer_last_name']) ? strtoupper($row_header['buyer_last_name'][0]) : '';
                   $_SESSION["buyer_comp_name"] = $row_header['buyer_comp_name'];
                   $_SESSION["buyer_user_email"] = $row_header['buyer_email'];
                   // Display the profile initials
                   echo '<li class="dropdown_item nav__list">
                         <div class="profile-circle">
                             <a href="buyer_dashboard.php" class="profile-image">' . $firstInitial . $lastInitial . '</a>
                         </div>
                         </li>';
               } else {
                   // Handle the case where no user data is found
                   echo '<li class="dropdown__item login_margin">
            <div class="nav__link loginbtn">
               <button class="loginword">
                  Login
               </button>
               <i class="ri-arrow-down-s-line dropdown__arrow loginbtn_arrow"></i>
            </div>
            <ul class="dropdown__menu">
               <div class="parent_link">
                  <li>
                     <a href="login.php" class="dropdown__link">
                        Supplier Login
                     </a>
                  </li>
                  <li>
                     <a href="buyer_login.php" class="dropdown__link" style="margin-top: 0.5rem;">
                        Buyer Login
                     </a>
                  </li>
               </div>
            </ul>
         </li>';
               }

            } else if (isset($_COOKIE["remember_token"])) {
               // Fetch the user's information from the database using the company name
               $remember_token = $_COOKIE["remember_token"];
               $sql_header = "SELECT * FROM userdata WHERE rm_token = '$remember_token'";
               $result_header = $conn->query($sql_header);

               if ($result_header && $result_header->num_rows > 0) {
                   $row_header = $result_header->fetch_assoc();
                   // Get the user's first and last name initials
                   $firstInitial = !empty($row_header['first_name']) ? strtoupper($row_header['first_name'][0]) : '';
                   $lastInitial = !empty($row_header['last_name']) ? strtoupper($row_header['last_name'][0]) : '';
                   $_SESSION["comp_name"] = $row_header['comp_name'];
                   $_SESSION["user_email"] = $row_header['email'];
                   // Display the profile initials
                   echo '<li class="dropdown_item nav__list">
                         <div class="profile-circle">
                             <a href="suppliardashboard.php" class="profile-image">' . $firstInitial . $lastInitial . '</a>
                         </div>
                         </li>';
               } else {
                   // Handle the case where no user data is found
                   echo '<li class="dropdown__item login_margin">
            <div class="nav__link loginbtn">
               <button class="loginword">
                  Login
               </button>
               <i class="ri-arrow-down-s-line dropdown__arrow loginbtn_arrow"></i>
            </div>
            <ul class="dropdown__menu">
               <div class="parent_link">
                  <li>
                     <a href="login.php" class="dropdown__link">
                        Supplier Login
                     </a>
                  </li>
                  <li>
                     <a href="buyer_login.php" class="dropdown__link" style="margin-top: 0.5rem;">
                        Buyer Login
                     </a>
                  </li>
               </div>
            </ul>
         </li>';
               }
            }

            ?>

         </ul>
      </div>
   </nav>
</header>

<!-- toggle code for responsive navbar -->
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
