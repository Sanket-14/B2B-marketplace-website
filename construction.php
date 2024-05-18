
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
    <script defer src="app.js"></script>
    <!--Link to jQuery CDN (this runs the entire function)-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body data-theme="light_theme">
    <title style="color: black;">VoltBridge</title>
<style>
/* Dark theme colors */

/* Primary theme colors */
body[data-theme='light_theme'] {
  --white: #fff;
  --bg-color: #F8F8F8;
  --color: #00473c;
  --secondary-color: #00473c;
  --icon-bg-color: #333;   
  --icon-color: #333;
}

body {
  background: var(--bg-color);
  color: var(--color);
  text-align: center;
}

body[data-theme='dark_theme'] {
  --white: #fff;
  --bg-color: lightgrey;
  --color: #00473c;
  --secondary-color: #00473c;
  --icon-bg-color: #333;   
  --icon-color: #fff;
}

@keyframes fadeIn {
  from {top: 20%; opacity: 0;}
  to {top: 100; opacity: 1;}
}

@-webkit-keyframes fadeIn {
  from {top: 20%; opacity: 0;}
  to {top: 100; opacity: 1;}
}

.wrapper {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  animation: fadeIn 1000ms ease;
  -webkit-animation: fadeIn 1000ms ease;
  
}

h1 {
  font-size: 64px;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 0;
  line-height: 1;
  font-weight: 700;
}

.dot {
  color: var(--secondary-color);
}

p {
  text-align: center;
  margin: 18px;
  font-family: 'Muli', sans-serif;
  font-weight: normal;
}

.icons {
  text-align: center;
}

.icons i {
  color: var(--white);
  background: var(--icon-bg-color);
  height: 15px;
  width: 15px;
  padding: 13px;
  margin: 0 10px;
  border-radius: 50px;
  border: 2px solid transparent;
  transition: all 200ms ease;
  text-decoration: none;
  position: relative;
}

.icons i:hover, .icons i:active {
  color: var(--icon-color);
  background: none;
  border-color: var(--icon-bg-color);
  cursor: pointer !important;
  transform: scale(1.2);
  -webkit-transform: scale(1.2);
  text-decoration: none;
}
</style>

<div>
   <!-- navbar styling code in navbar_resp.css and script in navbar_resp.js - these files linked in index.php, 
       navbar_resp.php contains whole html code for navbar, saved as backup. -->

       <!-- navbar header is being called from headernav.php in assets folder. -->
<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/assets/php/"; include($IPATH."suppnav.php"); ?>
</div>

  <div class="wrapper">
  <h1>Coming soon<span class="dot">.</span></h1>
  <p>We are building our website.</p>
  
 </div>
 
 <script>
     function setThemePreference() {
  var d = new Date();
  /*
  * The getHours() method returns the hour (from 0 to 23) of the specified date and time.
  * Early mornig = 0 - 6
  * Morning = 6 - 12
  * Evening = 12 - 18
  * Night = 18 - 23
  */
  var currentHour = d.getHours();  
  
  if(currentHour >= 19 || currentHour <= 6) {
    document.body.setAttribute("data-theme", "dark_theme") 
  }else {
    document.body.setAttribute("data-theme", "light_theme") 
  }
}

window.onload = setThemePreference;
 </script>
</body>
</html>