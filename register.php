<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
        <title>회원가입</title>
<body>
<center>
<form method="post" action="confirm.php" name="confirmok">
    <h1>회원가입</h1>
    <p>이름 : <input type="text" name="name" placeholder="이름입력" required></p>
    <p>아이디 : <input type="text" name="id" placeholder="id입력" required></p>
    <p>비밀번호 : <input type="password" name="pw" placeholder="pw입력" required></p>
    <p>자기소개 : <textarea name="showyourself" placeholder="자기소개부탁드려요~" required></textarea></p>
    <p><input type="submit" value="제출">
      <input type=reset value="다시작성"></p>
</center>
</form>
</body>
</html>
