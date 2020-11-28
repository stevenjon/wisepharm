<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 07.08.2020


require "connect.php"; 

$ozg_id = $_POST['ozg_id'];   
$soni = $_POST['soni'];   

mysqli_set_charset($conn,"utf8");

$mysql_qry = "UPDATE korzina SET soni = '$soni' WHERE Id = $ozg_id";

if($conn->query($mysql_qry) == TRUE){
	echo "ok";
} else {
	echo 'no';
}

$conn->close();
?>
