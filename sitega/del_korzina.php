<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 06.09.2020


require "connect.php"; 

$id = $_POST['id']; 
  
mysqli_set_charset($conn,"utf8");
 
$mysql_qry = "DELETE FROM korzina WHERE Id = '$id'";

if($conn->query($mysql_qry) == TRUE){
	echo "ok";
} 

$conn->close();
?>
