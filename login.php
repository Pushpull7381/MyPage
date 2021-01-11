<?php
session_start();
if(!isset($_SESSION['id'])) {
        ?>

<center><br><br><br>
<form name="login_form" action="login_check.php" method="POST">
   ID : <input type="text" name="id"><br>
   PW : <input type="password" name="pw"><br><br>
   <input type="submit" name="login" value="Login">
<input type="button" value="회원가입" onclick="location.href='register.php'"></form>
<a href='index.php'><input type='button' value='메인으로'></a>

</form>
</center>

<?php
}
else{


                echo"<center><br><br><br><br>";
                echo $_SESSION['name']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
                        echo "&nbsp;<a href='logout.php'><input type='button' value='Logout'></a>";
                        echo "&nbsp;<a href='board.php'><input type='button' value='게시판'></a>";
                        echo "&nbsp;<a href='index.php'><input type='button' value='메인으로'></a>";
                                echo "</center>";
                                }

?>
