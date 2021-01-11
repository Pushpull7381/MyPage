<?php
session_start();
include 'connect.php';
$name=$_POST['name'];
$password=$_POST['password'];
$showyourself=$_POST['showyourself'];

$query = "UPDATE users SET name='$name', pw='$password', showyourself='$showyourself' WHERE id='$_SESSION[id]';";
$result=mysqli_query($conn, $query);

echo "<script>window.alert('수정완료!');</script>";
echo "<script>location.href='index.php';</script>";

 ?>
