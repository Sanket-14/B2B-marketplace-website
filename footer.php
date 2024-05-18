
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Footer Design</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
body{
	/* width:110%; */
	line-height: 1.5;
	font-family: 'Poppins', sans-serif;
	margin:0px;
	/* margin-right:-50px; */
	position: absolute;
	overflow-x:hidden;
}
*{
	margin:0;
	padding:0;
	box-sizing: border-box;
}
.footer {
    /* background-color: #FAFAFBFF; */
	background-color: white;
    padding: 20px 0;
    color: #171A1FFF;
    height:200px;
  }

  .footer-links {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
  }

  .footer-links a {
    color: #171A1FFF;
    text-decoration: none;
  }

  .footer-links a:hover {
    text-decoration: underline;
  }

  .copyright {
    text-align: center;
    margin-top: 20px;
  }

  .social-links {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-top: 20px;
  }

  .social-links a {
    color: blue;
    fill:blue;
    margin-left: 15px;
    font-size: 20px;
  }
.container{

	max-width: 100%; /* Set the container to 100% width */
    margin: auto;
    display: flex;
	/* max-width:2600px;
	margin:auto;
	
	display:flex; */
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
}
.footer{
	background-color: #FAFAFBFF;
    padding: 70px 0;
	/* width: 110%; */
	
	

}
.footer-col{
   width: 25%;
   padding: 0 20px;
}
.footer-col h4{
	font-size: 18px;
	color: #171A1FFF;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:0;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #171A1FFF;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: #ffffff;
	padding-left: 8px;
}
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	color: #24262b;
	background-color: #ffffff;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
}
}




  </style>
</head>
<body>

  <footer class="footer" style="width:100%; background-color: white;" >
  	 <div class="container" style="display:block;">
  	 	<div class="footer-links" style="text-decoration:none; ">
			<a href=#>About us</a>
			<a href=#>Contact us</a>
			<a href=#>FAQs</a>
			<a href=#>Data Privacy</a>
  	 	</div>
		<hr>
		<div class="copyright">
			<p>&copy; 2024 VoltBridge. All Rights Reserved.</p>
        </div>
		<div class="social-links">
			<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        </div>
  	 </div>
  </footer>

</body>
</html>
