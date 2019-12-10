<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <link rel="shortcut icon" href="images1/favicon.png">

        <link rel="stylesheet" type="text/css" href="css1/style.css" />	
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
		
		
		<style>
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				background: #ffff80 url(images1/login.jpg) no-repeat center top !important;
				/*-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				background-size: cover !important;*/
			}

			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}			

			form h1{
				color: red;
            	font-weight:500 !important;
            	font-size:40px !important;
				text-align:center;
			}

			form input[type="text"],form input[type="password"]{
				color:#333333 !important;
				height:30px !important;
				margin-top:2px;
			}

			form{
				color:#000000 !important;
				font-weight:800 !important;	
				margin-top:-10px !important;
				margin-bottom:-14px !important;			
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

		</style>
    </head>

    <body style="background-color:#ffff00;">
    	<header id="header">
			<h1><a href="index.php">SafariChill</a></h1>
			<nav id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>					
					<li><a href="index4.php">Users</a></li>					
					<li><a href="#contact">Contact</a></li>
				</ul>
			</nav>
		</header>

        <div class="container">
			<table >	
				<?php
					session_start();
					if(isset($_SESSION['reg_error']))
					{
						echo '<p class="message"> <font size="5" color="red"> <center><i>';
						echo $_SESSION['reg_error'];
						echo "</i></center></font></p>";
						unset($_SESSION['reg_error']);
					}
					if(isset($_SESSION['reg']))
					{
						echo '<p class="message"> <font size="5" color="green"> <center><i>';
						echo $_SESSION['reg'];
						echo "</i></center></font></p>";
						unset($_SESSION['reg']);
					}
				?>
			</table>

			<section class="main">
				<form action="register.php" method ="POST" class="form-4" >
				 	<h1>Register</h1>
					First name
					<input class="form-control" name="Fname" placeholder="eg:Amali" type="text" required>
					Last name
					<input class="form-control" name="Lname" placeholder="eg:Somaratne" type="text" required>
 					Email
					<input class="form-control" name="Email" placeholder="eg:amali@gmail.com" type="email" required>
					Username
					<input class="form-control" name="Username" placeholder="choose a username" type="text" required>
    				Password
					<input class="form-control" name="Password" placeholder="choose a password" type ="password" required>
  					Name of your pet?
					<input class="form-control" name="Security" placeholder="please answer the security question" type ="text" required>
 					<input type="submit" class="btn btn-primary" name="sub" value="Register">
				</form>
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

		<script src="js1/modernizr.custom.63321.js"></script>
       	<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>

		<script>
			// Get the current year for the copyright
			$('#year').text(new Date().getFullYear());
    	</script>
    </body>
</html>
