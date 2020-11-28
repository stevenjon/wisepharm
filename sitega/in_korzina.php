<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 04.08.2020


require "connect.php"; 
 
$user_id = $_POST['user_id']; 
$tel_id = ''; 
$optom_id = '5'; 
$tovar_id = $_POST['tovar_id']; 
$nomi = $_POST['nomi']; 
$firmasi = $_POST['firmasi']; 
$narxi = $_POST['narxi']; 
$skidka = '0 foiz skidka bilan'; 
$soni = $_POST['soni']; 
$ed_izm = ''; 
$srok = $_POST['srok']; 
$tovar_time = $_POST['vaqti']; 
  
mysqli_set_charset($conn,"utf8");
 
$mysql_qry = "INSERT INTO korzina (user_id,tel_id,optom_id,skidka,tovar_id,nomi,firmasi,narxi,ed_izm,soni,srok,tovar_time) VALUES ('$user_id','$tel_id','$optom_id','$skidka','$tovar_id','$nomi','$firmasi','$narxi','$ed_izm','{$soni}','$srok',NOW())";
 
if($conn->query($mysql_qry) == TRUE){
    echo "ok";
} else {
    echo 'no';
}
$conn->close();
?>
