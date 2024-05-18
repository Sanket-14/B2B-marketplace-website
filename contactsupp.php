<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Popup contact form</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
  <style>
    @font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmSU5fBBc9.ttf) format('truetype');
}
@font-face {
  font-family: 'Roboto';
  font-style: normal;
  font-weight: 500;
  src: url(https://fonts.gstatic.com/s/roboto/v30/KFOlCnqEu92Fr1MmEU9fBBc9.ttf) format('truetype');
}
html,
body {
  background-color: #fff;
}
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
  background-color: #2d3638;
  border-radius: 10px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 700px;
  margin-left: auto;
  margin-right: auto;
  position: relative;
  padding: 40px;
  color: #fff;
}
.close-button {
  background: none;
  color: #fff;
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
    </style>
</head>
<body>
<!-- partial:index.partial.html -->
<h1>Contact us Today!</h1>
<button id="btnOpenForm">Open Form</button>

<div class="form-popup-bg">
  <div class="form-container">
    <button id="btnCloseForm" class="close-button">X</button>
    <h1>Contact Us</h1>
    <p>For more information. Please complete this form.</p>
    <form action="">
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" />
      </div>
      <div class="form-group">
        <label for="">Company Name</label>
        <input class="form-control" type="text" />
      </div>
      <div class="form-group">
        <label for="">E-Mail Address</label>
        <input class="form-control" type="text" />
      </div>
      <div class="form-group">
        <label for="">Phone Number</label>
        <input class="form-control" type="text" />
      </div>
      <button>Submit</button>
    </form>
  </div>
</div>
<!-- partial -->
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
      $(this).removeClass('is-visible');
    }
  });
  
  
  
  });
  </script>

</body>
</html>
