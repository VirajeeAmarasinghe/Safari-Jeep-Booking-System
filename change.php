<?php
	include "include.php";

	session_start();

	if ($_POST["Password"] == null) {
		$upd = "UPDATE `user` SET Fname='" . $_POST["Fname"] . "',Lname='" . $_POST["Lname"] . "',Security='" . $_POST["Security"] . "' WHERE Email='" . $_SESSION['user_email'] . "'";
	} else {
		$pass = sha1($_POST["Password"]);    
		$upd = "UPDATE `user` SET Fname='" . $_POST["Fname"] . "',Lname='" . $_POST["Lname"] . "',Security='" . $_POST["Security"] . "',Password='$pass' WHERE Email='" . $_SESSION['user_email'] . "'";
	}

	mysql_query($upd) or die(mysql_error());

	$_SESSION['updt'] = 'Profile updated successfully...';
	header('location: update.php');

?>
