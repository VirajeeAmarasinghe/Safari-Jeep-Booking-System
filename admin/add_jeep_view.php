<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add_Jeep</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />   
    
    <link rel="stylesheet" href="../css/skel.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/style-xlarge.css" />
    
    
    <style type="text/css"> 

        input[type="text"] {
            width: 500px;
            display: block;            
            height: 40px;   
            border:1px solid #ffffff;  
            margin-left:10px;
            margin-top:10px;
        }

        input[type="submit"] {
            width: 500px;
            position: absolute;            
            background: #00b33c;
            color: #fff;
            font-family: Tahoma, Geneva, sans-serif;            
            -webkit-border-radius: 15px;
            -moz-border-radius: 15px;
            border-radius: 15px;
            border: 1px solid #999;
            text-align:center;    
            margin-left:10px;
            margin-top:10px;        
        }

        input.btn:hover {
            background: #d9d9d9;
            border: 1px solid #00b33c;
            color: #00b33c !important;
        }

        form {
            background-color:#a6a6a6;
            margin: auto;
            position: relative;
            width: 550px;
            height: 300px;
            font-family: Tahoma, Geneva, sans-serif;
            font-size: 14px;
            font-style: italic;
            line-height: 24px;
            font-weight: bold;
            color: #000000;
            text-decoration: none;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            padding: 10px;
            border: 1px solid #999;
            border: inset 1px solid #333;
            -webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
            -moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);            
        }

        input::-webkit-input-placeholder {
            color: #999999;
        }

        #content{
            margin-top:30px;
            margin-bottom:40px;
        }

        textarea#feedback {
            width: 375px;
            height: 150px;
        }

        textarea.message {
            display: block;
        }

        h2 {
            color: red;
            font-weight:500;
            font-size:40px;
        }        
        
        footer{
            margin-top:-2.5%;
            padding-top:80px !important;
        }
                
    </style>
</head>

<body style="background-color:#ffff80">
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
    
    <div class="container" id="content">
        <?php           
            if(isset($_SESSION['updt']))
            {
                echo '<p class="message"> <font size="5" color="green"> <center><i>';
                echo $_SESSION['updt'];
                echo "</i></center></font></p>";
                unset($_SESSION['updt']);
            }
            if(isset($_SESSION['error']))
            {
                echo '<p class="message"> <font size="5" color="red"> <center><i>';
                echo $_SESSION['error'];
                echo "</i></center></font></p>";
                unset($_SESSION['error']);
            }
		?>

        <center>
            <h2>Add Jeep</h2>
        </center>
        <form action="add_jeep.php" method="POST">
            Name
            <input class="form-control" placeholder="Enter bus name" type="text" name="Name" required>                
            <br> Vehicle No
            <input class="form-control" type="text" placeholder="Vehicle No" name="Vehicle_No" id="Vehicle_No" required>
            <br>
            <input class="btn btn-primary" type="submit" value="Add">
        </form>
        <br>

    </div>

    <!-- Footer Image -->
    <section class="img-div">
        <a href="#" class="image fit"><img src="../images1/safari_bottom_banner.jpeg" alt="" /></a>
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
                    
                    <ul class="alt">                        
                        <li>(011) 223-2839</li>                           
                        <li>(076) 456-7891</li>
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


