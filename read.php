<?php
session_start();
include "connect.php";
$id=(int)$_GET['num'];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>글읽기</title>
  </head>
  <body>
    <?php
    $result=mysqli_query($conn,"SELECT * FROM topic WHERE num = {$id};");
    $row=mysqli_fetch_array($result);
    if($row['user_id'])		$row['user_id'] = htmlspecialchars($row['user_id']);
    if($row['title'])		$row['title'] = htmlspecialchars($row['title']);
    if($row['description'])	$row['description'] = htmlspecialchars($row['description']);
?>
            <h2> 제목</h2><p><?=$row['title']?></p>
            <h2> ID</h2><p><?=$row['user_id']?></p>
            <h2> 날짜</h2><p><?=$row['created']?></p>
            <h2> 본문</h2><p><?=$row['description']?></p>
  <form class="수정하기" action="chk_pw.php?num=<?=$_GET['num']?>" method="post">
  <input type="password" name="edit" placeholder="글 비밀번호(20자이내)">
    <input type="submit" name="수정하기" value="수정하기"></form>
	<input type="button" value="뒤로가기" onclick="location.href='board.php'">
	<input type="button" value="식제하기"onclick="location.href='delete.php?num=<?=$_GET['num']?>&user_id=<?=$row['user_id']?>'">

        <br><br><br>
        <?php
        if(isset($_SESSION['id'])) {
         ?>
        댓글<br>
        <form action="read_comment.php?num=<?=$_GET['num']?>" method="post">
          <textarea name="comment" rows="8" cols="80"></textarea>
          <input type="submit" value="댓글달기">
          <br><br><br></form>
<?php
			}
         echo"댓글보기";
?>
     <br><br><br>
<?php
         $sql='select * from comment';
	 $result=$conn->query($sql);
	       while($row = $result->fetch_assoc()) {
		if($row['cmt_description'])		$row['cmt_description'] = htmlspecialchars($row['cmt_description']);
		       	      $datetime = explode(' ', $row['cmt_created']);
			              $date = $datetime[0];
			              $time = $datetime[1];
				              if($date == Date('Y-m-d'))
						      	           $row['created'] = $time;
					              else
							      		       $row['created'] = $date;

				              if($row['read_num']==$id) {
?>
       <table width=1000 border=1><tr>
       <td width=100 class="author"><?php echo $row['cmt_name']?></td>
       <td width=700class="comment"><?php echo $row['cmt_description']?></td>
       <td width=200 class="date"><?php echo $row['cmt_created']?></td>
       <input type="button" value="수정하기" onclick="location.href='comment_edit.php?num=<?=$row['cmt_num']?>&cmt_id=<?=$row['cmt_id']?>'">
       <input type="button" value="삭제하기" onclick="location.href='comment_delete.php?num=<?=$row['cmt_num']?>&cmt_id=<?=$row['cmt_id']?>'">
	</tr></table>
       <br>

<?php
						      					 }
				      		    }
?>

  </form>
 </body>
</html>
