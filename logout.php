<?php
	session_start();
	unset($_SESSION['user']);
	$_SESSION['msg'] = 'Logged out succesfully';	
	header('Location: index4.php');
?>