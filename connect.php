<?php
$db_host="localhost";
$db_user="root";
$db_password="Mine_7381";
$db_name="minee_real";

$conn = mysqli_connect('localhost','root','Mine_7381','minee_real');
$con = new mysqli($db_host, $db_user, $db_password, $db_name);
if ($con->connect_errno) { die('Connection Error : '.$con->connect_error);}
?>
