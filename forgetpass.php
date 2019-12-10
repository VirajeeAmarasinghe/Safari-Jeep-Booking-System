<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Forget_password </title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <link rel="shortcut icon" href="images1/favicon.png"> 
        <link rel="stylesheet" type="text/css" href="../css1/style.css" />		
		<link rel="stylesheet" href="../css/skel.css" />
		<link rel="stylesheet" href="../css/style.css" />
		<link rel="stylesheet" href="../css/style-xlarge.css" />
				
		<style>	
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				background: #ffff80 url(images1/login.jpg) no-repeat center top !important;
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				background-size: cover !important; 
			}

			.container > header h1,
			.container > header h2 {
				color: #fff;				
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}

			a {
    			color: hotpink;
			}

			.main form{
				width:410px !important;
				color:#000000;
				font-weight:800 !important;
				margin-bottom:2px;
			}

			.main form h1{
				color: red;
            	font-weight:500;
				font-size:28px;						
			}

			.main form input[type="email"],.main form input[type="text"],.main form input[type="password"]{
				color:#333333 !important;
				height:30px;
			}

			form input[type="submit"]{
				height:50px !important;
				font-size:15px !important;
				margin-top:8px !important;
    			padding-bottom: 12px !important;
				padding-top: 5px !important;
				background-color:#212226 !important;
				border:1px solid transparent !important;
				margin-bottom:20px !important;
			}

			form input[type="submit"]:hover {
				background: white !important;
				border: 1px solid #212226 !important;
				color: #212226 !important;
        	}

			.main{
				margin-left:40px;
			}

		</style>
    </head>
    <body >

		<header id="header">
			<h1><a href="../index.php">SafariChill</a></h1>
			<nav id="nav">
				<ul>
					<li><a href="../index.php">Home</a></li>
					<li><a href="../index4.php">Users</a></li>
					<li><a href="admin1.php">Admin</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</nav>
		</header>

        <div class="container">		

			<table > 			
				<?php
					session_start();
					if(isset($_SESSION['error']))
					{
						echo '<p class="message"> <font size="5" color="red"> <center><i>';
						echo $_SESSION['error'];
						echo "</i></center></font></p>";
						unset($_SESSION['error']);
					}
				?>
			</table>
			
			<section class="main">
				<form class="form-4" action="retrieve.php" method ="POST" >
				    <h1>Forgot your passowrd?</h1>
				   	Email<br> 
  					<input class="form-control" placeholder="eg:isuri@gmail.com" type="email" name="Email" required>
  					<br>
					What was the name of your pet?<br>
  					<input class="form-control" placeholder="Enter the answer which you have provided during registration" type="text" name="Security" required>
   					<br>
					New password<br>
  					<input class="form-control" placeholder="Enter a new password" type="password" name="New" required>
 
  					<input class="btn btn-primary" type="submit" value="Change">     
				</form>​
			</section>
			
        </div>

		<!-- Footer -->
		<footer id="footer">
			<div class="container">
				<div class="row">
					<section class="4u 6u(medium) 12u$(small)" id="contact">
						<h3>Address</h3>
						<ul class="alt">
							<li>No 1/10</li>
							<li>Polonnoruwa Rd</li>
							<li>Minneriya</li>                        
						</ul>
					</section>
					<section class="4u 6u$(medium) 12u$(small)">
						<h3>Mail</h3>
						<ul class="alt">
							<li>SafariChill@gmail.com</li>                        
						</ul>
					</section>
					<section class="4u$ 12u$(medium) 12u$(small)">
						<h3>Phone</h3>
						
						<ul class="alt">                        
							<li>(011) 223-2839</li>                           
							<li>(076) 456-7891</li>
						</ul>
					</section>
					
				</div>
				<ul class="copyright">
					<li>&copy; SafariChill. <span id="year"></span> All rights reserved.</li>                
				</ul>
			</div>
    	</footer>

		<script src="../js1/modernizr.custom.63321.js"></script>
       	<script src="../js/jquery.min.js"></script>
		<script src="../js/skel.min.js"></script>
		<script src="../js/skel-layers.min.js"></script>
		<script src="../js/init.js"></script>

		<script>
      		// Get the current year for the copyright
      		$('#year').text(new Date().getFullYear());
    	</script>
    </body>
</html>