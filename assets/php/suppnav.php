      
      <!-- styling code in navbar_resp.css and script in navbar_resp.js - these files linked in index.php, 
       navbar_resp.php contains whole html code for navbar, saved as backup. -->
      <head>
          <link rel="stylesheet" href="path/to/ri-icons.css">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ri-icons@latest/ri.css">

      </head>
      <!--=============== HEADER ===============-->
      <header class="header">
        <nav class="nav container">
           <div class="nav__data">
              <strong>
            <a href="index.php" class="nav__logo" style="text-decoration: none; font-size: 24px; color:white;">
                 <img class="imglogo" src="images/vblogo.jpg" alt="" >
           <span style="color: black; ">Volt<span style="color: rgb(40, 212, 120); ">Bridge
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
                 <li class="dropdown__item login_margin">
 


    
    <li class="dropdown__subitem">
      <a href="add_user.php" class="dropdown__sublink">
        <i class="ri-dashboard-line"></i> Add User
      </a>
    </li>
    <li class="dropdown__subitem">
      <a href="suppliardashboard.php" class="dropdown__sublink">
        <i class="ri-user-line"></i> Profile
      </a>
    </li>
    
    <li class="dropdown__subitem">
      <a href="my_listing.php?company=<?php echo $comp_name ?>" class="dropdown__sublink">
        <i class="ri-list-check"></i> My Listing
      </a>
    </li>
    <li class="dropdown__subitem">
      <a href="construction.php" class="dropdown__sublink">
        <i class="ri-heart-line"></i> Profile Preview
      </a>
    </li>
    <li class="dropdown__subitem">
      <a href="add_products.php" class="dropdown__sublink">
        <i class="ri-add-line"></i> Add Products
      </a>
    </li>
    <li class="dropdown__subitem">
      <a href="construction.php" class="dropdown__sublink">
        <i class="ri-message-line"></i> Messages
      </a>
    </li>
    <li class="dropdown__subitem">
      <a href="logout.php" class="dropdown__sublink">
        <i class="ri-logout-box-line"></i> Logout
      </a>
    </li>
    
</li>

                 

                 <!--=============== DROPDOWN 2 ===============-->
                


               
              </ul>
           </div>
        </nav>
     </header>



<!-- toggle code for responsive navbar -->
<script>
    /*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
          nav = document.getElementById(navId)
 
    toggle.addEventListener('click', () =>{
        // Add show-menu class to nav menu
        nav.classList.toggle('show-menu')
 
        // Add show-icon to show and hide the menu icon
        toggle.classList.toggle('show-icon')
    })
 }
 
 showMenu('nav-toggle','nav-menu')
</script>

