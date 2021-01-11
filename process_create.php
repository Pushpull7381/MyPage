<?php
session_start();
$REMOTE_ADDR=$_SERVER['REMOTE_ADDR'];
include 'connect.php';

if($_POST['title']==null) {
                  echo "<script>alert(\"제목 조작은 나빠요!\");</script>";
                            echo "<script>location.replace('create.php');</script>";
                  }
if($_POST['description']==null) {
          echo "<script>alert(\"내용 조작은 나빠요!\");</script>";
            echo "<script>location.replace('create.php');</script>";
}
if($_POST['name']==null) {
          echo "<script>alert(\"ID조작은 나빠요!\");</script>";
            echo "<script>location.replace('create.php');</script>";
}
$sql="
  INSERT INTO topic
    (title, description, created, user_id, pw_write, ip)
    VALUES(
      '{$_POST['title']}',
      '{$_POST['description']}',
      NOW(),
      '{$_SESSION['id']}',
          '{$_POST['pw_write']}',
      '{$REMOTE_ADDR}'
         )
";
$result=mysqli_query($conn, $sql);
if($result==false){
                  echo '다시 써여!';
                            error_log(mysqli_error($conn));
}
include 'point_plus_10.php';
echo "<script>alert(\"성공적으로 글이 등록되었습니다~!\");</script>";
echo "<script>location.href='board.php';</script>";
?>
~     
