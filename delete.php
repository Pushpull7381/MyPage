<?php
session_start();
include "connect.php";
$num=(int)$_GET['num'];//post num
$user_id=$_GET['user_id'];//writer's id
$result=mysqli_query($conn,"SELECT * FROM topic WHERE num ={$num};");

$row=mysqli_fetch_array($result);

if($user_id==$_SESSION['id'])
{
                    $result=mysqli_query($conn,"DELETE FROM topic WHERE num={$num};");
                                              echo "<script>alert(\"삭제되었습니다!\");</script>";
                                echo "<script>location.href='board.php';</script>";
}
else {
                  echo "<script>alert(\"삭제는 글쓴이만 가능합니다!\");</script>";
                           echo "<script>location.href='board.php';</script>";

}
     ?>
