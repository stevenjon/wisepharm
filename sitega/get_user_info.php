<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 18.07.2020

require "connect.php"; 
  
$user_id = $_POST['us_id'];   
$sql_gen3 = "SELECT users.Id AS Id, turi, firma_nomi, login, parol, holati, users.viloyat_id AS viloyat_id,users.shahar_id AS shahar_id, vil.nomi AS viloyat_nomi, shah.nomi AS shahar_nomi, manzil, telefon, telefon2, bosh_sana, tugash_sana, comp_soni, tel_soni, demo FROM users LEFT JOIN viloyatlar AS vil ON users.viloyat_id = vil.Id LEFT JOIN shaharlar AS shah ON users.shahar_id = shah.Id WHERE users.Id='$user_id' ORDER BY turi ASC";

$javob = mysqli_query($conn,"SET NAMES utf8");
$result3 = mysqli_query($conn, $sql_gen3); 
         
if ($result3 !== false && $result3->num_rows > 0) {
	$results = array();
    while($row=mysqli_fetch_array($result3)){
       
		$user_id=$row['Id'];     
		$turi=$row['turi'];      
		$firma_nomi=$row['firma_nomi'];   
		$login=$row['login'];
		$parol=$row['parol'];
		$holati=$row['holati']; 
		$viloyat_id=$row['viloyat_id'];   
		$shahar_id=$row['shahar_id'];   
		$viloyat_nomi=$row['viloyat_nomi'];   
		$shahar_nomi=$row['shahar_nomi'];   
		$manzil=$row['manzil'];   
		$telefon=$row['telefon'];   
		$telefon2=$row['telefon2'];   
		$bosh_sana=$row['bosh_sana'];   
		$tugash_sana=$row['tugash_sana']; 
		$comp_soni=$row['comp_soni'];   
		$tel_soni=$row['tel_soni'];   
		$demo=$row['demo'];   
		
		if($comp_soni == ""){
		    $comp_soni = "0";
		}
		
		if($tel_soni == ""){
		    $tel_soni = "0";
		}
		
		if($telefon2 == ""){
		    $telefon2 = "0";
		}
		
		if($telefon == ""){
		    $telefon = "0";
		}
		
		if($manzil == ""){
		    $manzil = "0";
		}
		
		if($holati == ""){
		    $holati = "0";
		}
		$result = ['id'=> $user_id, 'nomi'=> $firma_nomi, 'vil_id'=>$viloyat_id, 'shah_id'=> $shahar_id, 'manzil'=> $manzil, 'tel1'=>$telefon, 'tel2'=>$telefon2];
		array_push($results, $result);
        date_default_timezone_set('Asia\Tashkent');
        
        $timestamp = time();
        $hozirgi = date("Y-m-d 00:00:02", $timestamp);
        
		$time_hozirgi  = strtotime($hozirgi);
		$time_bosh  = strtotime($bosh_sana);
		$time_tugash  = strtotime($tugash_sana);
		$vaqti = "";
		$qoldiq = 0;

		if($time_hozirgi >= $time_bosh && $time_hozirgi <= $time_tugash){
		    $datediff = $time_tugash - $time_hozirgi;
            
            $qoldiq =  round($datediff / (60 * 60 * 24));
		    
		} else {
		    $holati = "0";
            $mysql_qry = "UPDATE users SET holati = '0' WHERE Id = '$user_id'";
            
            if($conn->query($mysql_qry) == TRUE){
            	
            } else {
            	echo 'no';
            }
            
		}    	 
      
    }

    $results = json_encode($results, JSON_UNESCAPED_UNICODE);
        		echo $results;
} else{
    echo "no_c";
    return;
} 

$conn->close();
?>
