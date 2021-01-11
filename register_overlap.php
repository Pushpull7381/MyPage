<?php
    include "connect.php";
        $sql="SELECT count(*) from users where id=\"$_POST['id']\"";
        $result=mysql_query($sql);
            $row=mysql_fetch_array($result);

            if($row>0){
                          echo "<script>alert('이미 누가 사용중이네요ㅠㅡㅠ'); </script>";
                                echo "<scirpt>window.history.back();</script>";
                                exit();
                                    }
                  ?>
