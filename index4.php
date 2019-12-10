<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css1/style.css" />	
		
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
		
		<style>
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				background: #7f9b4e url(images1/login.jpg) no-repeat center top !important;
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				background-size: cover !important;
			}

			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}

			h1 {
    			color:white;
			}

			.main form h1{
				color: red;
            	font-weight:500;
            	font-size:40px;
			}

			.main form p{
				color:#000000;
				font-weight:800 !important;
				margin-bottom:2px;
			}

			.main form p input[type="text"],.main form p input[type="password"]{
				color:#333333 !important;
				height:30px;
			}

			.main form p input[type="submit"]{
				height:50px;
				font-size:15px;
				margin-top:8px;
    			padding-bottom: 12px;
				padding-top: 5px;
				background-color:#212226 !important;
				border:1px solid transparent;
				margin-bottom:10px;
			}

			.main form p input[type="submit"]:hover{
				background: white !important;
				border: 1px solid #212226 !important;
				color: #212226 !important;
			}

			.main form p a {
				color:#009900;
			}
		</style>
    </head>

    <body>
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

			<?php
				session_start();
				

				if(isset($_SESSION['error']))
				{
					echo '<p class="error-message"> <font size="6" color="red"> <center><i>';
					echo $_SESSION['error'];
					echo "</i> </center></font></p>";
					unset($_SESSION['error']);
				}
				
				if(isset($_SESSION['reg']))
				{
						echo '<p class="message"> <font size="5" color="green"> <center><i>';
						echo $_SESSION['reg'];
						echo "</i></center></font></p>";
						unset($_SESSION['reg']);
				}

				if(isset($_SESSION['change']))
				{
						echo '<p class="message"> <font size="5" color="green"> <center><i>';
						echo $_SESSION['change'];
						echo "</i></center></font></p>";
						unset($_SESSION['change']);
				}
				
			?>

			<section class="main">
				<form class="form-4" action="login.php" method ="POST" >
				    <h1>Login</h1>
				    <p>
				        Email
				        <input type="email" class="form-control" name="Email" placeholder="eg:Isuri123@gmail.com" required>
				    </p>
				    <p>
				        Password
				        <input type="password" class="form-control" name='Password' placeholder="eg:Isuri123" required>
				    </p>

				    <p>
				        <input type="submit" class="btn btn-primary" name="submit" value="Continue">
				    </p>
				    <p>			
				    	&nbsp;
				    	<a href="register1.php"> Register Now</a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="forgetpass.php">Forget Password</a>
				    </p>
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
