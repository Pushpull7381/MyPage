<?php
session_start();
include 'connect.php';

if($conn->connect_error) {
		  die('서버 비상비상비상!');
}
$input_id=$_POST['id'];
$input_pw=$_POST['pw'];
$input_name=$_POST['name'];
$input_showyourself=$_POST['showyourself'];

if($input_id==null) {
		  echo "<script>alert(\"ID 입력 부탁드려요!\");</script>";
		  	    echo "<script>location.replace('register.php');</script>";
}
if($input_pw==null) {
		  echo "<script>alert(\"비밀번호 입력 부탁드려요!\");</script>";
		  	    echo "<script>location.replace('register.php');</script>";
}
if($input_name==null) {
		  echo "<script>alert(\"이름 입력 부탁드려요!\");</script>";
		  	    echo "<script>location.replace('register.php');</script>";
}
if($input_showyourself==null) {
		  echo "<script>alert(\"자기소개 입력 부탁드려요!\");</script>";
		  	    echo "<script>location.replace('register.php');</script>";
}


$result=mysqli_query($conn,"select id from users;");

while($row = mysqli_fetch_array($result)){
		if($row['id']==$input_id){
			echo "<script>alert(\"이미사용중인 아이디입니다ㅠㅡㅠ\")</script>";
			echo "<script>location.href='register.php';</script>";
			die;
						}
}
$sql="INSERT INTO users(id, name, pw, showyourself) VALUES('{$input_id}', '{$input_name}', '{$input_pw}', '{$input_showyourself}')";
$result=mysqli_query($conn, $sql);

echo "<script>alert(\"회원가입에 성공하셨어요~!~!~!\");</script>";
  echo "<script>location.href='index.php';</script>";


?>
