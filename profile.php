<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Profile</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
		
		
		<style type="text/css">			

			h2{
				color:red !important;
				font-weight:500 !important;
            	font-size:40px !important;
			}

			h4{				
				font-weight:500 !important;
			}			

			td{
				font-weight:500 !important;				
			}

			.td-title{
				background-color:#e6e6e6;
				width:20%;
			}

			.td-value{
				width:20%;
			}

			table tbody td{
				border:1px solid #95a5a6 !important;
			}

			footer{
            	margin-top:-5% !important;
        	}

			a[type="submit"] {
				width: 1180px;
				position: absolute;            
				background: #00b33c;
				color: #fff;
				font-family: Tahoma, Geneva, sans-serif;            
				-webkit-border-radius: 15px;
				-moz-border-radius: 15px;
				border-radius: 15px;
				border: 1px solid #999;
				text-align:center;    
				margin-left:10px;
				margin-top:10px; 
				text-decoration:none; 
				padding:5px 0 5px 0;      
			}

			a.btn:hover {
				background: #d9d9d9 !important;
				border: 2px solid #00b33c;
				color: #00b33c !important;
			}
		</style>
	</head>
	<body style="background-color:#ffff80;">

		<?php session_start();?>

		<!-- Header -->
		<header id="header">
			<h1><a href="generic.php">SafariChill</a></h1>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        	&nbsp;&nbsp;&nbsp;Hello <?php echo $_SESSION['user']; ?>!! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to SafariChill</h1>
			<nav id="nav">
				<ul>
					<li><a href="generic.php">Home</a></li>	
					<li><a href="booking_view.php">New Booking</a></li>					
					<li><a href="history1.php">Booking History</a></li>
					<li><a href="profile.php">View Profile</a></li>					
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
		</header>

		<div class="container">			

			<!-- Main -->
			<section id="main" class="wrapper">				
				<center><h2>Your Profile</h2> </center>

				<?php
					include "include.php";

					$sel="SELECT * FROM `user` where Username='".$_SESSION['user']."'" ;
					$str= mysql_query($sel);
					$rows= mysql_num_rows($str);
					if($rows==0 || $rows>1){
						header('Refresh:5; url=generic.php');

						echo '<h3 style= "text-align:center;"> <font color="red">Data Base Error </font></h3>';
						echo "<br>";
						echo '<p style= "text-align:center">Redirecting to the home page in 5 seconds</p>';
					}else{

						while($row=mysql_fetch_array($str)){
							echo '<div class="container">';
							echo '<table style="width:100%" align="center">';

							echo "<tr>";

							echo "<td class='td-title'>";
							echo '<h4> <i>First Name:</i></h4>';
							echo "</td>";

							echo "<td class='td-value'>";
							echo $row['Fname'];
							echo "</td>";

							echo "</tr>";

							echo "<tr>";
							echo "<td class='td-title'>";
							echo '<h4> <i>Last Name:</i></h4>';
							echo "</td>";

							echo "<td class='td-value'>";
							echo $row['Lname'];
							echo "</td>";

							echo "</tr>";

							echo "<tr>";

							echo "<td class='td-title'>";
							echo '<h4> <i>Username:</i></h4>';
							echo "</td>";

							echo "<td class='td-value'>";
							echo $row['Username'];
							echo "</td>";

							echo "</tr>";

							echo "<tr>";

							echo "<td class='td-title'>";
							echo '<h4> <i>Email:</i></h4>';
							echo "</td>";

							echo "<td class='td-value'>";
							echo $row['Email'];
							echo "</td>";
							echo "</tr>";

							echo "<tr>";

							echo "<td class='td-title'>";
							echo '<h4> <i>Pet Name:</i></h4>';
							echo "</td>";

							echo "<td class='td-value'>";
							echo $row['Security'];
							echo "</td>";

							echo "</tr>";

							echo "</table>";
							echo "</div>";
						}
						echo '<a href="update.php" class="btn btn-primary" type="submit">Update Profile</a>';
					}
				?>

			<br>			
		</div>

		<!-- Banner Image -->		
		<section id="banner-img">
			<img src="images1/safari_bottom_banner.jpeg" class="image fit">			
		</section>	

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
							<li>							
								(011) 223-2839
							</li>
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
