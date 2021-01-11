<?php
session_start();
include "connect.php";
$num=$_GET['num'];
$user_id=$_GET['cmt_id'];


if($_SESSION['id']==$user_id){

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $result=mysqli_query($conn,"SELECT * FROM comment WHERE cmt_num = {$num};") or die(mysqli_error($conn));
    $row=mysqli_fetch_array($result);

            if($row['cmt_id']==$_SESSION['id'])
		    		    {
					    			        ?>

    <form action="update_comment.php?num=<?=$num?>" method="post">
      댓글수정
      <p>
    <textarea name="comment_update" rows="8" cols="80"></textarea>
    <input type="submit" name="수정하기">
      </p>
    </form>

    <?php
  }
}
    else{
	        	      echo "<script>alert(\"수정권한이 없습니다!\");</script>";
			        echo "<script>window.history.back();</script>";
			          }
    ?>
	      </body>
	      </html>
