<?php
	include "../include.php";

    session_start();
    
    $jeep_id=$_GET['id'];
	$booking_id=$_GET['booking_id'];
	$booking_date=$_GET['booking_date'];
	$arrival_time=$_GET["arrival_time"];
	$departure_time=$_GET['departure_time'];
	$vehicle_no=$_GET["vehicle_no"];	

	$upd= "UPDATE booking SET Jeep_id=$jeep_id WHERE Booking_id=$booking_id";

    //update booking
    	
	mysql_query($upd) or die(mysql_error());

	$_SESSION['assign'] = 'Jeep is assigned successfully';

	header("location: ../mail.php?booking_date='.$booking_date.'&arrival_time='.$arrival_time.'&departure_time='.$departure_time.'&vehicle_no='.$vehicle_no.'");
		
?>