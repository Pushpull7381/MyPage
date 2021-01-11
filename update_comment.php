<?php
session_start();
include"connect.php";
$num=$_GET['num'];

$description=$_POST['comment_update'];
$write_time=date("Y-m-d H:i:s");


    $query = "SELECT * FROM comment WHERE cmt_num=$num;";
    $result=mysqli_query($conn, $query);
        $row=mysqli_fetch_array($result);


            $query = "UPDATE comment SET cmt_description='$description',
                            cmt_created='$write_time' WHERE cmt_num=$num";
            $result=mysqli_query($conn, $query);

        echo "<script>window.alert('수정완료!');</script>";
        echo "<script>location.href='board.php';</script>";

         ?>
