<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Assign a Jeep</title>
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
				
				//1. check whether there is any jeep that is not assigned for a booking yet.
				$sel="SELECT * FROM `jeep` where Id NOT IN (SELECT Jeep_id from booking)" ;
				$str1= mysql_query($sel) or die(mysql_error());
				$rows= mysql_num_rows($str1);
				
				//2. get available jeeps those are assigned for another bookings
				//i) get jeeps those are not finished 10 trips for day
				$booking_date=$_GET['booking_date'];
				$arrival_time=$_GET['arrival_time'];
				$departure_time=$_GET['departure_time'];
				$booking_id=$_GET['id'];

				$sel2="SELECT Jeep_id,count(Booking_id) as max_booking_id FROM booking WHERE Date="."'".$booking_date."'"." and Jeep_id!=0 GROUP BY Jeep_id";
				$str2=mysql_query($sel2) or die(mysql_error());
				$rows2=mysql_num_rows($str2);

				$jeep_ids_lower_than_10_trips=Array();
				
				while($row=mysql_fetch_array($str2)){
					if($row['max_booking_id']<10){
						array_push($jeep_ids_lower_than_10_trips,$row['Jeep_id']);						
					}					
				}

				//ii) check availability of those jeeps for the given arrival time and departure time
				$available_jeeps=$jeep_ids_lower_than_10_trips;

				for($i=0;$i<count($jeep_ids_lower_than_10_trips);$i++){
					$sel3="SELECT Jeep_id FROM booking WHERE Date="."'".$booking_date."'"." and Jeep_id=".$jeep_ids_lower_than_10_trips[$i]." and Arrival_time<="."'".$arrival_time."'"." and Departure_time>="."'".$departure_time."'";
					
					$str3=mysql_query($sel3) or die(mysql_error());  
					$rows3=mysql_num_rows($str3);
					if($rows3!=0){
						$available_jeeps[$i]=0;
					}					
				}
				
				for($j=0;$j<count($jeep_ids_lower_than_10_trips);$j++){
					$sel4="SELECT Jeep_id FROM booking WHERE Date="."'".$booking_date."'"." and Jeep_id=".$jeep_ids_lower_than_10_trips[$j]." and Arrival_time>="."'".$arrival_time."'"." and Departure_time>="."'".$departure_time."'";
					
					$str4=mysql_query($sel4) or die(mysql_error()); 
					$rows4=mysql_num_rows($str4);
					if($rows4!=0){
						$available_jeeps[$j]=0;
					}
				}

				for($k=0;$k<count($jeep_ids_lower_than_10_trips);$k++){
					$sel5="SELECT Jeep_id FROM booking WHERE Date="."'".$booking_date."'"." and Jeep_id=".$jeep_ids_lower_than_10_trips[$k]." and Arrival_time>="."'".$arrival_time."'"." and Departure_time<="."'".$departure_time."'";
					$str5=mysql_query($sel5) or die(mysql_error());
					$rows5=mysql_num_rows($str5);
					if($rows5!=0){
						$available_jeeps[$k]=0;
					}
				}

				$no_of_available_jeeps=0;

				for($l=0;$l<count($available_jeeps);$l++){
					if($available_jeeps[$l]!=0){
						$no_of_available_jeeps++;
					}
				}
				

				if($rows==0 && $no_of_available_jeeps==0){
					echo '<h3 style= "text-align:center;"> <font color="red">No Available Jeeps </font></h3>';
					echo "<br>";			
				}
				else{

					echo '<h3 style= "text-align:center;" class="h3-head"> <font color="red"><center>Available Jeeps</center></font></h3>';
					echo '<table align="center" border=1 >
					<tr>
					<th> Id </th>
					<th> Name</th>
					<th> Vehicle No </th>
					<th> No of Trips for '; echo date("Y-m-d"); echo'</th> 								
					<th> Assign a Jeep </th>
					</tr>';
					while($row=mysql_fetch_array($str1))
					{	
						$id=$row['Id'];								
						
						echo "<tr>";
						echo "<td>".$row['Id']."</td>";
						echo "<td>".$row['Name']."</td>";						
						echo "<td>".$row['Vehicle_No']."</td>";
                        echo "<td>0</td>";	
                        echo '<td>';									
						echo '<a href="assign.php?id='.$id.'&booking_id='.$booking_id.'&booking_date='.$booking_date.'&arrival_time='.$arrival_time.'&departure_time='.$departure_time.'&vehicle_no='.$row['Vehicle_No'].'">Assign</a>';
						echo "</td>";
						echo "</tr>";
					}

					for($m=0;$m<count($available_jeeps);$m++){
						if($available_jeeps[$m]!=0){
							$jeep_select_qry="SELECT * FROM `jeep` WHERE Id=".$available_jeeps[$m] ;
							$jeep_result= mysql_query($jeep_select_qry) or die(mysql_error());							
							
							$count_trips_query="SELECT count(Booking_id) as no_trips FROM booking WHERE Date="."'".$booking_date."'"." and Jeep_id=".$available_jeeps[$m];
							$trip_count_result=mysql_query($count_trips_query) or die(mysql_error());

							echo "<tr>";
							echo "<td>".$available_jeeps[$m]."</td>";

							$vehicle_number='';

							while($row_jeep=mysql_fetch_array($jeep_result)){
								$vehicle_number=$row_jeep['Vehicle_No'];
								echo "<td>".$row_jeep['Name']."</td>";						
								echo "<td>".$row_jeep['Vehicle_No']."</td>";
							}				

							while($row_trip_count=mysql_fetch_array($trip_count_result)){
								echo "<td>".$row_trip_count['no_trips']."</td>";	
							}							
							
							echo '<td>';									
							echo '<a href="assign.php?id='.$available_jeeps[$m].'&booking_id='.$booking_id.'&booking_date='.$booking_date.'&arrival_time='.$arrival_time.'&departure_time='.$departure_time.'&vehicle_no='.$vehicle_number.'">Assign</a>';
							echo "</td>";
							echo "</tr>";
						}
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
