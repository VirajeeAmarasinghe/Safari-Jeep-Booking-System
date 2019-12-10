<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Index Page</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />	
		<link rel="shortcut icon" href="images1/favicon.png"> 		
		
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />	
		
		<style>
			#header {
				background-color:#212226 !important;
			}

			.wrapper header p b{
				color:#2c3e50;
			}
		</style>
	</head>

	<body class="landing">

		<!-- Header -->
		<header id="header">
			<h1><a href="index.php">SafariChill</a></h1>
			<nav id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="index4.php">Users</a></li>				
					<li><a href="#contact">Contact</a></li>
				</ul>
			</nav>
		</header>

		<!-- Banner -->
		<section id="banner">
			<h2>Welcome to SafariChill</h2>
			<p>Online Safari Jeep Bookings <br> Brought To You By safarichill.org</p>
			<ul class="actions">
				<li>
					<a href="#about" class="button big">Learn More</a>
				</li>
			</ul>
		</section>

		<!-- One -->
		<a name="about"></a>
		<section id="one" class="wrapper style1 align-center">
			<div class="container">
				<header>
					<h2>SafariChill</h2>
					<p> <b>SafariChill is a online safari jeep reservation system. <br>Try SafariChill experience today.</b></p>
				</header>
				<div class="row 200%">
					<section class="4u 12u$(small)">
						<i class="icon big rounded fa-clock-o"></i>
						<p>You can book the tickets before one month<br> You can cancel the tickets one day before the journey with 100% refund</p>
					</section>
					<section class="4u 12u$(small)">
						<i class="icon big rounded fa-comments"></i>
						<p>You can comment/mail your queries to our contacts</p>
					</section>
					<section class="4u$ 12u$(small)">
						<i class="icon big rounded fa-user"></i>
						<p>You can create your personal account and can see your booking history</p>
					</section>
				</div>
			</div>
		</section>		

		<a name="contact"></a>
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
