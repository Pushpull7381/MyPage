<?php
session_start();
  include"connect.php";
           ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>게시판</title>
  </head>
  <body>
    <h1>MINEE의 게시판</h1>
    <form action="board.php" >
      <select name="search">
        <option value="title">제목</option>
        <option value="description">내용</option>
        <option value="title_description">제목 + 내용</option>
        <option value="id">ID</option>
      </select>
      <input type="text" cols="20" name="content">
      <input type="submit" value="검색">
    </form>


    <?php

if(!isset($_GET['search'])) $serch='NULL';
else $search=$_GET['search'];
if(!isset($_GET['content'])) $content='NULL';
else $content=$_GET['content'];
if(!isset($_SESSION['name'])) $_SESSION['name']=NULL;
if(!isset($_SESSION['id'])) $_SESSION['id']=NULL;

    if($_SESSION['name'])		$_SESSION['name'] = htmlspecialchars($_SESSION['name']);
    if($_SESSION['id'])		$_SESSION['id'] = htmlspecialchars($_SESSION['id']);




        if(!isset($_GET['start'])) $start=0;
        else  {$start=$_GET['start'];} $idx=$start+1;
          $pageNum=10;


      if(isset($search)&&isset($content)) {
          if($search=="title"){

            $sql="SELECT * FROM topic WHERE title LIKE '%$content%' order by num desc limit $start, $pageNum;";
             $result = $conn->query($sql);
            $pageTotal = mysqli_num_rows($result);
              if($pageTotal==0){
                echo "<script>alert(\"검색결과가 존재하지 않습니다!\");</script>";
                echo "<script>window.history.back();</script>";
              }
          }
          else if($search=="description"){
            $sql="SELECT * FROM topic WHERE description LIKE '%$content%' order by num desc limit $start, $pageNum;";
             $result = $conn->query($sql);
            $pageTotal = mysqli_num_rows($result);
              if($pageTotal==0){
                echo "<script>alert(\"검색결과가 존재하지 않습니다!\");</script>";
                echo "<script>window.history.back();</script>";
              }
          }
          else if($search=="title_description"){
            $sql="SELECT * FROM topic WHERE description LIKE '%$content%' OR title LIKE '%$content%' order by num desc limit $start, $pageNum;";
             $result = $conn->query($sql);
            $pageTotal = mysqli_num_rows($result);
            if($pageTotal==0){
              echo "<script>alert(\"검색결과가 존재하지 않습니다!\");</script>";
              echo "<script>window.history.back();</script>";
            }
          }
          else if($search=="name"){
            $sql="SELECT * FROM topic WHERE name LIKE '%$content%' order by num desc limit $start, $pageNum;";
             $result = $conn->query($sql);
            $pageTotal = mysqli_num_rows($result);
            if($pageTotal==0){
              echo "<script>alert(\"검색결과가 존재하지 않습니다!\");</script>";
              echo "<script>window.history.back();</script>";
            }
          }
          else if($search=="id"){
            $sql="SELECT * FROM topic WHERE user_id LIKE '%$content%' order by num desc limit $start, $pageNum;";
            $result = $conn->query($sql);
            $pageTotal = mysqli_num_rows($result);
            if($pageTotal==0){
              echo "<script>alert(\"검색결과가 존재하지 않습니다!\");</script>";
              echo "<script>window.history.back();</script>";
            }
          }
        }
          else {
            $sql = "SELECT * FROM topic ORDER BY num DESC limit $start, $pageNum;";
            $result = $conn->query($sql);
            $pageTotal = mysqli_num_rows($result);
          }
        ?><br>
        <?php
          echo "<table bgcolor='#D8D8D8' style=\"marginLauto;text-align:center;\" width=1000 border=1 table-layout:fixed;><tr>";
          echo "<td width=100 style=\"word-break:break-all;\"></td>";
          echo "<td width=200 style=\"word-break:break-all;\"><b>ID</b></td>";
          echo "<td width=200 style=\"word-break:break-all;\"><b>CREATED</b></td>";
	  echo "<td width=500 style=\"word-break:break-all;\"><b>TITLE</b></td>";
          echo "</tr><table>";

           while($row=$result->fetch_array()){
		                if($row['user_id'])		$row['user_id'] = htmlspecialchars($row['user_id']);
				if($row['title'])		$row['title'] = htmlspecialchars($row['title']);
		   echo "<table bgcolor='#FAFAFA'style=\"marginLauto;text-align:center; word-break:break-all;\" width=1000 border=1><tr>";

                  echo "<td width=100>No. $idx</td>";

                  echo "<td width=200>$row[user_id]</td>";

                  echo "<td width=200>$row[created]</td>";

                  echo "<td width=500><a href=\"read.php?num=$row[num]\">$row[title]</a></td>";

		  echo "</tr></table>";
		  $idx++;

                                                      }
	  ?><br><?php
    if(!isset($search)||!isset($content))  {
    $sql = "SELECT * FROM topic ORDER BY num DESC;";
    $result = $conn->query($sql);
    $pageTotal = mysqli_num_rows($result);

     $pages = $pageTotal / $pageNum + 1;

       for($i=1; $i<$pages; $i++){
              $nextPage = $pageNum * ($i-1);
            echo "<a href=$_SERVER[PHP_SELF]?start=$nextPage> [$i] </a>";
                }
    }
    else if(isset($search)&&isset($content)) {
      if($search=="title"){
        $sql="SELECT * FROM topic WHERE title LIKE '%$content%';";
        $result = $conn->query($sql);
        $pageTotal = mysqli_num_rows($result);
      }
      else if($search=="description"){
        $sql="SELECT * FROM topic WHERE description LIKE '%$content%';";
        $result = $conn->query($sql);
        $pageTotal = mysqli_num_rows($result);
      }
      else if($search=="title_description"){
        $sql="SELECT * FROM topic WHERE description LIKE '%$content%' OR title LIKE '%$content%';";
        $result = $conn->query($sql);
        $pageTotal = mysqli_num_rows($result);
      }
      else if($search=="id"){
        $sql="SELECT * FROM topic WHERE user_id LIKE '%$content%';";
        $result = $conn->query($sql);
        $pageTotal = mysqli_num_rows($result);
      }
    $pages = $pageTotal / $pageNum + 1;
      for($i=1; $i<$pages; $i++){
            $nextPage = $pageNum * ($i-1);
            echo " <a href=$_SERVER[PHP_SELF]?search=$search&content=$content&start=$nextPage>   [$i] </a>";
              }

          }

                 ?>
    <br><br>
    <input type="button" value="글쓰기" onclick="location.href='create.php'">
    <input type="button" value="메인으로" onclick="location.href='index.php'">
  </body>
</html>
