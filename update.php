<?php
session_start();
include"connect.php";
$id=(int)$_POST['num'];
$title=$_POST['title'];
$description=$_POST['description'];
$pw_write=$_POST['pw_write'];
$write_time=date("Y-m-d H:i:s");
$REMOTE_ADDR=$_SERVER['REMOTE_ADDR'];

    $query = "SELECT * FROM topic WHERE num=$id";
    $result=mysqli_query($conn, $query);
            $row=mysqli_fetch_array($result);


                $query = "UPDATE topic SET title='$title',
                                                    description='$description', pw_write='$pw_write', created='$write_time', ip='$REMOTE_ADDR' WHERE num=$id";
                $result=mysqli_query($conn, $query);

            echo "<script>window.alert('수정완료!');</script>";
            echo "<script>location.href='read.php?num=$id';</script>";


                 ?>
