<?php
session_start();
include "connect.php";
$id=(int)$_GET['num'];
$user_id=$_SESSION['id'];
$name=$_SESSION['name'];
$comment=$_POST['comment'];
$write_time=date("Y-m-d H:i:s");

$sql="
  INSERT INTO comment
    (cmt_id, cmt_name, cmt_description, cmt_created, read_num)
    VALUES(
      '{$user_id}',
      '{$name}',
      '{$comment}',
      '{$write_time}',
      '{$id}'
      )
";
$result=mysqli_query($conn, $sql);
if($result!=false){
          echo "<script>window.history.back();</script>";
}
include 'point_plus_5.php';
 ?>
