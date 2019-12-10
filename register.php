<?php
	include "include.php";

	$pass=sha1($_POST["Password"]);	

	$sel="SELECT * FROM `user` where Email='".$_POST["Email"]."'";

	$res=mysql_query($sel) or die(mysql_error());

	if(mysql_num_rows($res) == 0){
		$mail=$_POST["Email"];

		if(empty($mail)==false){			

			$ins="INSERT INTO `user`(`Fname`,`Lname`,`Email`,`Username`,`Password`,`Security`)VALUES('".$_POST['Fname']."','".$_POST['Lname']."','".$_POST['Email']."','".$_POST['Username']."','$pass','".$_POST['Security']."')";

			mysql_query($ins) or die(mysql_error());

	
			session_start();
				
			$_SESSION['reg'] = 'Registered succesfully...Login now!!';
			header('location: index4.php');
		}else{
				session_start();
				$_SESSION['reg_error'] = 'Invalid email!!';
				header('location: register1.php');
		}			
	}else{
		session_start();
		$_SESSION['reg_error'] = 'Email registered already!!';
		header('location: register1.php');
	}
?>