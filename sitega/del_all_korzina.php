<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 06.09.2020


require "connect.php"; 

$user_id = $_POST['us_id']; 
  
$mysql_qry = "DELETE FROM korzina WHERE user_id = '$user_id'";
     
    if($conn->query($mysql_qry) == TRUE){
        echo "ok";   
    } else {
        echo 'no';
    }
$conn->close();
?>