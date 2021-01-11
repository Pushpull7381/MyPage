<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf8mb4">
    <title>포인트 랭킹</title>
  </head>
  <body>
<?php
  include 'connect.php';
  session_start();
    if(!isset($_SESSION['id'])) $_SESSION['id']=NULL;

      $sql="select * from users order by  point desc;";
      $result = mysqli_query($conn, $sql);

        $no=1;
        echo "<table width=580 bgcolor='#D8D8D8' style=\"marginLauto;text-align:center;\" table-layout:fixed; border=1><tr>";
	  echo "<td width=80>Ranking</td>";
	  echo "<td width=200>ID</td>";
	    echo "<td width=200>NAME</td>";
	    echo "<td width=100>Point</td>";
	      echo "</tr><table>";
	    while($row=$result->fetch_array()){
		    if($row['name'])		$row['name'] = htmlspecialchars($row['name']);
		    if($row['id'])		$row['id'] = htmlspecialchars($row['id']);
			      if($_SESSION['id']==$row['id']){
				                if($no==1){
							              echo "<table width=580 bgcolor='#FAFAFA' style=\"marginLauto;text-align:center;\" table-layout:fixed; border=1><tr>";
								                    echo "<td width=80><font color='#FF0000'><b>$no<a>st</a></b></font></td>";
								                    echo "<td width=200><font color='#FF0000'><b>$row[id]</b></font></td>";
										                  echo "<td width=200><font color='#FF0000'><b>$row[name]</b></font></td>";
										                  echo "<td width=100><font color='#FF0000'><b>$row[point]</b></font></td>";
												                $ranking_1=$row['id'];
												            }
						          else if($no==2) {
								              echo "<table width=580 bgcolor='#FAFAFA' style=\"marginLauto;text-align:center;\" table-layout:fixed; border=1><tr>";
									                  echo "<td width=80><font color='#FF0000'><b>$no<a>nd</a></b></font></td>";
									                  echo "<td width=200><font color='#FF0000'><b>$row[id]</b></font></td>";
											              echo "<td width=200><font color='#FF0000'><b>$row[name]</b></font></td>";
											              echo "<td width=100><font color='#FF0000'><b>$row[point]</b></font></td>";
												                  $ranking_2=$row['id'];
												                }
						          else if($no==3) {
								              echo "<table width=580 bgcolor='#FAFAFA' style=\"marginLauto;text-align:center;\" table-layout:fixed; border=1><tr>";
									                  echo "<td width=80><font color='#FF0000'><b>$no<a>rd</a></b></font></td>";
									                  echo "<td width=200><font color='#FF0000'><b>$row[id]</b></font></td>";
											              echo "<td width=200><font color='#FF0000'><b>$row[name]</b></font></td>";
											              echo "<td width=100><font color='#FF0000'><b>$row[point]</b></font></td>";
												                  $ranking_3=$row['id'];
												                }
						          else {
								            echo "<table width=580 bgcolor='#FAFAFA' style=\"marginLauto;text-align:center;\" table-layout:fixed; border=1><tr>";
									              echo "<td width=80><font color='#FF0000'>$no<a>th</a></font></font></td>";
									              echo "<td width=200><font color='#FF0000'>$row[id]</font></td>";
										                echo "<td width=200><font color='#FF0000'>$row[name]</font></td>";
										                echo "<td width=100><font color='#FF0000'>$row[point]</font></td>";
												          }
						        }
			          else{
					            if($no==1){
							                echo "<table width=580 bgcolor='#FAFAFA' style=\"marginLauto;text-align:center;\" table-layout:fixed; border=1><tr>";
									            echo "<td width=80><b>$no<a>st</a></b></td>";
									            echo "<td width=200><b>$row[id]</b></td>";
										                echo "<td width=200><b>$row[name]</b></td>";
										                echo "<td width=100><b>$row[point]<b></td>";
												            $ranking_1=$row['id'];
												          }
						              else if($no==2) {
								                  echo "<table width=580 bgcolor='#FAFAFA' style=\"marginLauto;text-align:center;\" table-layout:fixed; border=1><tr>";
										              echo "<td width=80><b>$no<a>nd</a></b></td>";
										              echo "<td width=200><b>$row[id]</b></td>";
											                  echo "<td width=200><b>$row[name]</b></td>";
											                  echo "<td width=100><b>$row[point]<b></td>";
													              $ranking_2=$row['id'];
													            }
						              else if($no==3) {
								                  echo "<table width=580 bgcolor='#FAFAFA' style=\"marginLauto;text-align:center;\" table-layout:fixed; border=1><tr>";
										              echo "<td width=80><b>$no<a>rd</a></b></td>";
										              echo "<td width=200><b>$row[id]</b></td>";
											                  echo "<td width=200><b>$row[name]</b></td>";
											                  echo "<td width=100><b>$row[point]<b></td>";
													              $ranking_3=$row['id'];
													            }
						              else {
								      	        echo "<table width=580 bgcolor='#FAFAFA' style=\"marginLauto;text-align:center;\" table-layout:fixed; border=1><tr>";
										          echo "<td width=80>$no<a>th</a></td>";
										          echo "<td width=200>$row[id]</td>";
											            echo "<td width=200>$row[name]</td>";
											            echo "<td width=100>$row[point]</td>";
												              }
						            }
			      			  $no++;
			      			    echo "</tr></table>";
			          }
	    ?><br>
<input type="button" value="메인으로" onclick="location.href='index.php'">

    <h1>포인트 랭킹(ID)<h1>
    <h2>1등 : <?=$ranking_1?></h2>
    <h2>2등 : <?=$ranking_2?></h2>
    <h2>3등 : <?=$ranking_3?></h2>
  </body>
</html>
