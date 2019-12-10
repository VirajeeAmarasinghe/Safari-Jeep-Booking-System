<?php
	include "include.php";

	$pass=sha1($_POST["Password"]);

	$sel="SELECT * FROM `user` where Email='".$_POST["Email"]."' and Password='$pass'";

	$result=mysql_query($sel) or die(mysql_error());

	if(mysql_num_rows($result) == 0)
	{
		session_start();
		$_SESSION['error'] = 'Invalid username or password';
		header('Location: index4.php');
		
	}else{		
		session_start();
		while($row=mysql_fetch_array($result)){
			$_SESSION['user']=$row["Username"];
			$_SESSION['user_email']=$row["Email"];
		}
		
		echo '<script language="javascript">document.location.href="generic.php"</script>';
	}


?>
