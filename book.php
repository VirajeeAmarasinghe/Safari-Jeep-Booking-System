<?php
	include "include.php";

	session_start();
	$ins="INSERT INTO `booking`(`user`,`Date`,`Arrival_time`,`Departure_time`)VALUES('".$_SESSION['user_email']."','".$_POST['Date']."','".$_POST['Arrival_time']."','".$_POST['Departure_time']."')";
	
	echo $ins;
	mysql_query($ins) or die(mysql_error());
		
	$_SESSION['message'] = 'Booking is successfully done';
	header('location: booking_view.php');
	
?>