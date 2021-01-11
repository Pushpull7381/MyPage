<?php
  session_start();

         if($_SESSION['id']===null) {

		 	                       echo"<script>alert(\"로그인해주세요!\");</script>";
					       			                               echo "<script>location.replace('login.php');</script>";
					              }
  			                                  ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>write</title>
   </head>
   <body>
       <h1>글쓰기</h1>
     <form action="process_create.php" method="POST">
       <input type="text" name="name" value="<?=$_SESSION['id']?>" readonly>
       <p><input type="text" name="title" placeholder="제목" required></p>
      <p><textarea name="description" placeholder="본문" required></textarea></p>
      <p><input type="password" name="pw_write" placeholder="글 비밀번호(20자 이내)" required></p>
      <p><input type="submit"></p>
     </form>
   </body>
 </html>
