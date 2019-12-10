<?php
session_start();
unset($_SESSION['admin']);
$_SESSION['msg'] = 'Logged out succesfully';

header('Location: admin1.php');

?>