<?php
	include "include.php";

	session_start();

	$id=$_GET['id'];
	$del="Delete from `booking` where Booking_id='".$id."'";	

	mysql_query($del) or die(mysql_error());
	
	$_SESSION['del'] = 'Cancelled succesfully.';	

	header('location: history1.php');
	
?>