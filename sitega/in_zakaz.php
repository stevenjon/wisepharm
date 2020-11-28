<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 01.06.2020


require "connect.php"; 

// $zakaz = $_POST['zakaz']; 
// $komp = $_POST['komp']; 
// $ox_raqam = $_POST['ox_raqam']; 
$user_id = $_POST['user_id']; 
$zakaz_raqam; 
   
  
$sql_gen3 = "SELECT * FROM zakazlar ORDER BY id DESC LIMIT 1";

$javob = mysqli_query($conn,"SET NAMES utf8");
$result3 = mysqli_query($conn, $sql_gen3); 
         
if ($result3 !== false && $result3->num_rows > 0) {
    while($row=mysqli_fetch_array($result3)){
       
		$zakaz_raqam=$row['Id'] + 1;  
    }
}else {
    $zakaz_raqam = 1;
} 
   
$sql_sorov = "INSERT INTO `zakazlar`(`user_id`, `zakaz_tel_id`, `comp_id`, `zakaz_id`, `zakaz_raqam`, `optom_id`, `tovar_id`, `nomi`, `firmasi`, `narxi`, `soni`, `ed_izm`, `srok`, `tovar_time`) SELECT user_id,tel_id, '$komp', '$ox_raqam', '$zakaz_raqam', optom_id, tovar_id, nomi, firmasi, narxi, soni, ed_izm, srok, tovar_time FROM korzina WHERE user_id = '$user_id'";
  
if($conn->query($sql_sorov) == TRUE){
     
    $mysql_qry = "DELETE FROM korzina WHERE user_id = '$user_id'";
     
    if($conn->query($mysql_qry) == TRUE){
        echo "ok";   
    } else {
        echo 'no';
    }
} else {
    echo 'no';
}
$conn->close();
?>
