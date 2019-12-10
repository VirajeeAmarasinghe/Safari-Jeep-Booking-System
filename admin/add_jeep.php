<?php
    include "../include.php";

    if(validation()){
        $ins = "INSERT INTO `jeep`(`Name`,`Vehicle_No`)VALUES('" . $_POST['Name'] . "','" . $_POST['Vehicle_No'] . "')";
    
        mysql_query($ins) or die(mysql_error());    
    
        session_start();    
    
        $_SESSION['updt'] = 'Jeep Added succesfully..';
        header('location: add_jeep_view.php');
    }else{
        header('location: admin_home1.php');
    }    

    //validation function
    function validation(){
        $result=true;
        
        /* Form Required Field Validation */
                                         
         if(empty($_POST["Name"])) {         			 
            $_SESSION['error'] ="Name field is required";
            $result=false; 			   
         }else if(empty($_POST["Vehicle_No"])) {         			 
            $_SESSION['error'] ="Vehicle No field is required";
            $result=false; 			   
         }      
        
       return $result; 
    }
?>


