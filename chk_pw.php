<?php
  include 'connect.php';
    session_start();

    $chk_pw=$_POST['edit'];
      $id=(int)$_GET['num'];

      $result=mysqli_query($conn,"SELECT * FROM topic WHERE num = {$id};");
        $row=mysqli_fetch_array($result);

      if($_SESSION['id']!=$row['user_id']){
                echo"<script>alert(\"글 수정은 본인만 가능합니다!\");</script>";
                  echo "<script>window.history.back();</script>";

      }
      else{

                if ($row['pw_write']==$chk_pw) {
                        echo"<script>alert(\"비밀번호가 일치합니다!\");</script>";
                        echo"<script>location.href=\"edit.php?num=$id\"</script>";

                              }
                  else{
                            echo "<script>alert(\"땡!\");</script>";
                              echo "<script>window.history.back();</script>";

                              }
                }

 ?>
