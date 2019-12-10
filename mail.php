<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

session_start();

$booking_date=$_GET['booking_date'];
$arrival_time=$_GET["arrival_time"];
$departure_time=$_GET['departure_time'];
$vehicle_no=$_GET["vehicle_no"];


$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'youremailaddress';          // SMTP username  //edit here
$mail->Password = 'youremailpassword'; // SMTP password  //edit here
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('sendersemailaddress', 'SafariChill');   //edit here
$mail->addReplyTo('sendersemailaddress', 'SafariChill');  //edit here
$mail->addAddress('recipientemailaddress');   // Add a recipient  //edit here
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>Your Safari Jeep was Reserved</h1>';
$bodyContent .= '<h4>Your Safari Jeep was Reserved</h4><p>Vehicle No:'.$vehicle_no.'</p><p>Booking Date:'.$booking_date.'</p><p>Arrival Time:'.$arrival_time.'</p><p>Departure Time:'.$departure_time.'</p><p>Venue:SafariChill Entrance</p>';

$mail->Subject = 'Email from SafariChill';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    $_SESSION['mail_error']='Email could not be sent.';
    header('location: admin/assign_jeep.php');
    
} else {    
    $_SESSION['mail_success']='Email has been sent';
    header('location: admin/view_booking_admin.php');
}
?>