
<?php
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8">
     <title>Minee</title>
  </head>
  <body>
<center>
<br><br><br><br><br>
   <h1><b>MINEEE의 페이지</b></h1>
<br>
  <?php
  if(!isset($_SESSION['id'])){
?>
    <p>로그인 부탁드려요~!</p>
    <p><a href="register.php">Register</a></p>
    <p><a href="login.php">Login</a></p>
    <p><a href="board.php">BOARD</a></p>
    <p><a href="point_ranking.php">포인트 랭킹</a></p>
  <?php
    }
      else {
?>
        <h3><b><?=$_SESSION['id']?></b>님 반가워요~!</h3>
        <p><a href="edit_info.php">정보수정</a></p>
        <p><a href='logout.php'>Logout</a></p>
        <p><a href="board.php">BOARD</a></p>
        <p><a href="point_ranking.php">포인트 랭킹</a></p>
      <?php
    }
?><br><br><br>
       <table bgcolor="#FFDAB9"style=\"marginLauto;text-align:center;\" table-layout:fixed; border=1>
        <td width=100><h3>포인트</h3></td>
        <td width=200><h4>글작성 : 10점</h4></td>
        <td width=200><h4>댓글 작성 : 5점 </h4></td></tr></table>

</center>
 </body>
</html>
