<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>update_Profile</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
	
		<link rel="stylesheet" href="../css/skel.css" />
		<link rel="stylesheet" href="../css/style.css" />
		<link rel="stylesheet" href="../css/style-xlarge.css" />		
		
		<style type="text/css">

			#main{
				margin-top:-30px !important;
			}
		
			input[type="text"] {
				width: 500px !important;
				display: block;            
				height: 40px;   
				border:1px solid #ffffff !important;  
				margin-left:10px;
				margin-top:10px;
       		}

        	input[type="submit"] {
				width: 500px;
				position: absolute;            
				background: #00b33c !important;
				color: #fff !important;
				font-family: Tahoma, Geneva, sans-serif;            
				-webkit-border-radius: 15px;
				-moz-border-radius: 15px;
				border-radius: 15px !important;
				border: 1px solid #999 !important;
				text-align:center;    
				margin-left:10px;
				margin-top:10px;        
        	}

			input.btn:hover {
				background: #d9d9d9 !important;
				border: 2px solid #00b33c !important;
				color: #00b33c !important;
			}

			form {
				background-color:#a6a6a6;
				margin-left:320px !important;
				position: relative;
				width: 550px;
				height: 500px;
				font-family: Tahoma, Geneva, sans-serif;
				font-size: 14px;
				font-style: italic;
				line-height: 24px;
				font-weight: bold;
				color: #000000;
				text-decoration: none;
				-webkit-border-radius: 10px;
				-moz-border-radius: 10px;
				border-radius: 10px;
				padding: 10px;
				border: 1px solid #999;
				border: inset 1px solid #333;
				-webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
				-moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
				box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);            
			}

			input::-webkit-input-placeholder {
				color: #999999;
			}		

			h2{
				color:red !important;
				font-weight:500 !important;
            	font-size:40px !important;
			}

			footer{
            	margin-top:-5% !important;
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
				

				<?php			

					if(isset($_SESSION['updt'])){
						echo '<p class="message"> <font size="4" color="green"><center> <i>';
						echo $_SESSION['updt'];					
						echo "</i></center></font></p>";
						unset($_SESSION['updt']);
					}	
				?>

				<!-- Main -->
				<section id="main" class="wrapper">					
					<center>
						<h2>Update Profile</h2>
					</center>

					<?php 
						include "include.php";

						$sel="SELECT * FROM `user` where Email='".$_SESSION['user_email']."'" ;
						$str= mysql_query($sel);
						$rows= mysql_num_rows($str);

						if($rows==0 || $rows>1)
						{
							header('Refresh:5; url=web_home.php');

							echo '<h3 style= "text-align:center;"> <font color="red">Data Base Error </font></h3>';
							echo "<br>";
							echo '<p style= "text-align:center">Redirecting to the home page in 5 seconds</p>';
						}
						else
						{
							$row=mysql_fetch_array($str);
						}	
					?>

					<div class="container" >	
						<a name="register"></a>
						<form action="change.php" method ="POST" class="form-horizontal"> 
							First name
							<input class="form-control" name="Fname" type="text" value="<?php echo $row['Fname'];?>">
							<br>Last name
							<input class="form-control" name="Lname" value="<?php echo $row['Lname'];?>" type="text">
							<br>Pet Name
							<input class="form-control" name="Security" value= "<?php echo $row['Security'];?>" type="text">
							<br> New Password
							<input class="form-control" name="Password" placeholder="choose a new password" type ="password"> 
							<br>
							<input type="submit" class="btn btn-primary" name="sub" value="Update">
							<br>
						</form>
					</div>
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