<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 06.07.2020


require "connect.php"; 

$malumot = $_POST['malumot']; 
$user_id = $_POST['user_id']; 
  
mysqli_set_charset($conn,"utf8");
 
$mysql_qry = "DELETE FROM tovarlar WHERE user_id = '$user_id'";

if($conn->query($mysql_qry) == TRUE){
	
} 
if($conn->query($malumot) == TRUE){
    echo "ok";
} else {
    echo 'no';
}
$conn->close();
?>
