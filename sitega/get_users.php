<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 30.06.2020
header('Content-type: text/html; charset=UTF-8');
require "connect.php";
 
$user_id = $_POST['us_id'];  
   
$count=1;
 
$sql_sorov = "SELECT us.Id AS Id, us.firma_nomi AS nomi, us.file_nomi AS file_nomi, vil.nomi AS vil_nomi, shah.nomi AS shah_nomi, us.manzil AS manzil, us.telefon AS telefon, us.telefon2 AS telefon2, pri.time AS vaqti FROM users AS us LEFT JOIN viloyatlar AS vil ON us.viloyat_id = vil.Id LEFT JOIN shaharlar AS shah ON us.shahar_id = shah.Id LEFT JOIN (SELECT Max(user_id) AS user_id, time FROM `prices` GROUP BY time) AS pri ON us.Id = pri.user_id WHERE us.turi = '1' ORDER BY us.firma_nomi ASC";


$javob = mysqli_query($conn,"SET NAMES utf8");
$javob = mysqli_query($conn, $sql_sorov); 

if ($javob !== false && $javob->num_rows > 0) {
	$results = array();
	while($row=mysqli_fetch_array($javob)){

		$sorov_id = str_replace('|', ' ',$row['Id']);  
		$nomi  = str_replace('|', ' ',$row['nomi']); 
		$file_nomi  = str_replace('|', ' ',$row['file_nomi']); 
		$vil_nomi = str_replace('|', ' ',$row['vil_nomi']); 
		$shah_nomi = str_replace('|', ' ',$row['shah_nomi']); 
		$manzil = str_replace('|', ' ',$row['manzil']); 
		$telefon = str_replace('|', ' ',$row['telefon']); 
		$telefon2 = str_replace('|', ' ',$row['telefon2']); 
		$vaqti  = str_replace('|', ' ',$row['vaqti']);

		$result = ['id'=> $sorov_id, 'nomi' => $nomi, 'vil'=> $vil_nomi, 'shah'=> $shah_nomi, 'manzil'=> $manzil, 'tel1'=> $telefon, 'tel2'=> $telefon2, 'vaqti'=> $vaqti, 'file_nomi'=>$file_nomi]; 
		array_push($results, $result);

		 
		$count++;
    }
    if($count>0){
        try{
        	 $results = json_encode($results, JSON_UNESCAPED_UNICODE);
        echo $results;
            $conn->close();
        } catch(Exception $e){
            
        }
		return;
    }
}
echo 'no';
try{
    $conn->close();
} catch(Exception $e){
     
} 
?>