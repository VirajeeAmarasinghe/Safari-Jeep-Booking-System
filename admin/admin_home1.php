<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin_home</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />   
    
    <link rel="stylesheet" href="../css/skel.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style-xlarge.css" />    	
    
    <style type="text/css">        
        footer{
            margin-top:-5% !important;
        }         
    </style>
</head>

<body style="background-color:#d9d9d9;">
    <?php session_start(); 
        include "../include.php";

        $sel="SELECT count(*)as new_bookings FROM `booking` where Jeep_id='NULL'" ;
        $str= mysql_query($sel);
        
        $new_bookings=0;

        while($row = mysql_fetch_assoc($str)) {            
            $new_bookings=$row['new_bookings'];
        } 
     
    ?>
    <!-- Header -->
    <header id="header">
        <h1><a href="../index.php">SafariChill</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;Hello <?php echo $_SESSION['admin']?>!! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to SafariChill</h1>
        <nav id="nav">
            <ul>
                <li><a href="admin_home1.php">Home</a></li> 
                <li><a href="add_jeep_view.php">Add Jeep</a></li>
                <li><a href="view_booking_admin.php">Booking</a>-<?php echo $new_bookings;?></li>
                <li><a href="#contact">Contact</a></li>                
                <li><a href="admin_logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Banner Image -->
    <section class="img-div">
        <a href="#" class="image fit"><img src="../images1/safari.jpeg" alt="" /></a>
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
                    
                    <ul class="tabular">                        
                        <li>
                            <h3>Phone</h3>
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