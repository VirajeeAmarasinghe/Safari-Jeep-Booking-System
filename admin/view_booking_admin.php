<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>New_booking_details</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />	
		
		<link rel="stylesheet" href="../css/skel.css" />
		<link rel="stylesheet" href="../css/style.css" />
		<link rel="stylesheet" href="../css/style-xlarge.css" />
		
		
		<style type="text/css">	

			th{
				color:black !important;
			}
			
			td{
				font-size:0.9em;
				font-weight:500 !important;
				color:#666 !important;
			}

			td a{
				font-weight:400;
			}

			.h3-head{
				font-weight:500 !important;
				font-size:40px !important;
			}

			footer{
            	margin-top:-3% !important;
			}
			
			#content{
				margin-top:5%;
			}

		</style>
	</head>

	<body style="background-color:#ffff80">

		<?php session_start(); 
			include "../include.php";

			$sel="SELECT count(*)as new_bookings FROM `booking` where Jeep_id='NULL'" ;
			$str= mysql_query($sel);
			
			$new_bookings=0;

			while($row = mysql_fetch_assoc($str)) {            
				$new_bookings=$row['new_bookings'];
			} 
		?>

		<!-- Header -->
		<header id="header">
			<h1><a href="../index.php">SafariChill</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;Hello <?php echo $_SESSION['admin']?>!! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to SafariChill</h1>
			<nav id="nav">
				<ul>
					<li><a href="admin_home1.php">Home</a></li> 
					<li><a href="add_jeep_view.php">Add Jeep</a></li>
					<li><a href="view_booking_admin.php">Booking</a>-<?php echo $new_bookings;?></li>
					<li><a href="#contact">Contact</a></li>                
					<li><a href="admin_logout.php">Logout</a></li>
				</ul>
			</nav>
		</header>

		<div class="container" id="content">
			
			<?php           
				
				if(isset($_SESSION['mail_error'])){
					echo '<p class="message"> <font size="4" color="red"><center> <i>';
					echo $_SESSION['mail_error'];					
					echo "</i></center></font></p>";
					unset($_SESSION['mail_error']);
				}

				if(isset($_SESSION['mail_success'])){
					echo '<p class="message"> <font size="4" color="green"><center> <i>';
					echo $_SESSION['mail_success'];					
					echo "</i></center></font></p>";
					unset($_SESSION['mail_success']);
				}

				if(isset($_SESSION['assign'])){
					echo '<p class="message"> <font size="4" color="green"><center> <i>';
					echo $_SESSION['assign'];					
					echo "</i></center></font></p>";
					unset($_SESSION['assign']);
				}
				
			?>

			<?php				
				
				$sel="SELECT * FROM `booking` where Jeep_id='Null'" ;
				$str= mysql_query($sel) or die(mysql_error());
				$rows= mysql_num_rows($str);
				

				if($rows==0){
					echo '<h3 style= "text-align:center;"> <font color="red">No New Bookings </font></h3>';
					echo "<br>";			
				}
				else{

					echo '<h3 style= "text-align:center;" class="h3-head"> <font color="red"><center>New Bookings</center></font></h3>';
					echo '<table align="center" border=1 >
					<tr>
					<th> Id </th>
					<th> Date</th>
					<th> Arrival Time </th>
					<th> Departure Time </th>					
					<th> User </th>					
					<th> Assign a Jeep </th>
					</tr>';
					while($row=mysql_fetch_array($str))
					{	
						$id=$row['Booking_id'];				
						
						echo "<tr>";
						echo "<td>".$row['Booking_id']."</td>";
						echo "<td>".$row['Date']."</td>";						
						echo "<td>".$row['Arrival_time']."</td>";
						echo "<td>".$row['Departure_time']."</td>";
						echo "<td>".$row['user']."</td>";					
						echo "<td>";				
						echo '<a href="assign_jeep.php?id='.$id.'&booking_date='.$row['Date'].'&arrival_time='.$row['Arrival_time'].'&departure_time='.$row['Departure_time'].'">Assign a Jeep</a>';
						echo "</td>";
						echo "</tr>";
					}
					echo "</table>";
				}
			?>
       		<br>      		
		</div>

		<!-- Footer Image -->
		<section class="img-div">
        	<a href="#" class="image fit"><img src="../images1/safari_bottom_banner.jpeg" alt="" /></a>
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
