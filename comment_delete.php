<?php
session_start();
include "connect.php";
$num=(int)$_GET['num'];
$user_id=$_GET['cmt_id'];


if($_SESSION['id']==$user_id){
            $result=mysqli_query($conn,"DELETE from     comment WHERE cmt_num = {$num};");
                $row=mysqli_fetch_array($result);
                echo "<script>alert(\"삭제되었습니다!\");</script>";
                    echo "<script>window.history.back();</script>";
}

else{
                  echo "<script>alert(\"글쓴이만 삭제가능합니다!\");</script>";
                      echo "<script>window.history.back();</script>";
}

?>
