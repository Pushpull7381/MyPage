<?php
session_start();
include "connect.php";
$id=(int)$_GET['num'];


$result=mysqli_query($conn,"SELECT * FROM topic WHERE num = {$id};");
$row=mysqli_fetch_array($result);
?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>글 수정하기</title>
   </head>
   <body>
        <h1>글 수정하기</h1>
     <form action="update.php" method="POST">
        <input type="text" name="user_id" value="<?=$_SESSION['id']?>" readonly>
        <p><input type="text" name="title" value="<?=$row['title']?>" placeholder="제목"></p>
      <p><textarea name="description" value="<?=$row['description']?>"placeholder="본문"></textarea></p>
      <p><input type="password" name="pw_write" placeholder="글 비밀번호(20자 이내)"></p>
      <input type="hidden" name="num" value="<?=$id?>">
      <p><input type="submit"></p>
     </form>
   </body>
 </html>
