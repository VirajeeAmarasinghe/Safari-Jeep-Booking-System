<?php
include "../include.php";

if(validation()){
    $pass = sha1($_POST["Password"]);

    $sel = "SELECT * FROM `admin` where Username='" . $_POST["Username"] . "' and Password='$pass'";

    $result = mysql_query($sel) or die(mysql_error());

    if (mysql_num_rows($result) == 0) {
        session_start();
        $_SESSION['error'] = 'Invalid username or password';
        header('Location: admin1.php');

    } else {

        session_start();
        $_SESSION['admin'] = $_POST["Username"];
        echo '<script language="javascript">document.location.href="admin_home1.php"</script>';
    }
}else{
    header('Location: admin1.php');
}




function validation(){
    $result=true;
    
    /* Form Required Field Validation */		  
             
                    
     if(empty($_POST["Username"])) {         			 
        $_SESSION['error'] ="Username field is required";
        $result=false; 			   
     }else if(empty($_POST["Password"])) {         			 
        $_SESSION['error'] ="Password field is required";
        $result=false; 			   
     }      
    
   return $result; 
}

?>
