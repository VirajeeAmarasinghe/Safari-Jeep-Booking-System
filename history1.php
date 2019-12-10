<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Booking History</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />		
		
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />		
		
		<style type="text/css">

			/*.major h3{
				font-weight:500;
            	font-size:42px;
			}*/			

			.wrapper h2{
				color:red;
				font-weight:500;
            	font-size:40px;
			}
			
			table tbody tr{
				border:1px solid #95a5a6 !important;
			}

			#tr-heading{
				background-color:#e6e6e6;
			}

			td{
				color:black;
			}

			td a{
				font-weight:400;
			}

			footer{
            	margin-top:-5% !important;
           }
		</style>
	</head>

	<body style="background-color:#ffff80;">
		<?php
			session_start();
		?>

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
			<?php				

				if(isset($_SESSION['del'])){
					echo '<p class="message"> <font size="4" color="green"><center> <i>';
					echo $_SESSION['del'];					
					echo "</i></center></font></p>";
					unset($_SESSION['del']);
				}	
			?>

			<!-- Main -->
			<section id="main" class="wrapper">				
				<center><h2>Booking History</h2></center>

				<?php
					include "include.php";					
					$sel="SELECT booking.Booking_id, booking.user,booking.Date,booking.Arrival_time,booking.Departure_time, jeep.Vehicle_No FROM booking INNER JOIN jeep ON booking.Booking_id=jeep.Id where user='".$_SESSION['user_email']."'" ;
					$str= mysql_query($sel);
					$rows= mysql_num_rows($str);

					
					
					if($rows==0 )
					{
						echo '<h3 style= "text-align:center;"> <font color="red">You have not booked any buses </font></h3>';
						echo "<br>";
					}
					else
					{
						
						echo '<table align="center" border=1 >
						<tr id="tr-heading">
						<th>Booking ID </th>
						<th> Date</th>
						<th> Arrival Time </th>
						<th> Departure Time</th>
						<th> Jeep No </th>						
						<th> Cancel Booking</th>
						</tr>';
						while($row=mysql_fetch_array($str))
						{							
							$Date= $row['Date'];
							$dt = new DateTime($Date);
							$arrival_time= $row['Arrival_time'];
							$departure_time= $row['Departure_time'];
							$vehicle_no=$row['Vehicle_No'];
							$book_id=$row['Booking_id'];
							echo "<tr>";

							echo '<td>'.$book_id."</td>";
							echo "<td>".$dt->format('Y-m-d')."</td>";
							echo "<td>".$arrival_time."</td>";
							echo "<td>".$departure_time."</td>";
							echo "<td>".$vehicle_no."</td>";						
							echo '<td>';
							echo '<a href="cancel.php?id='.$book_id.'">Cancel Booking</a>';
							echo "</td>";
							echo "</tr>";
						}
						echo "</table>";
					}
				?>
			</section>

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
