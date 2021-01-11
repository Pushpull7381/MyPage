<?php
  include 'connect.php';
    session_start();
    ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3><b>정보수정</b></h3>
    <form method="post"action="submit_edit_info.php">
      아이디 : <input type="text" value="<?=$_SESSION['id']?>" readonly><br>
      비밀번호 : <input type="password" name="password" required><br>
      이름 : <input type="text" name="name"value="<?=$_SESSION['name']?>" required><br>
      자기소개 : <textarea name="showyourself" rows="8" cols="80" required></textarea>
      <input type="submit" name="저장하기"></form>
    </form>
  </body>
</html>
