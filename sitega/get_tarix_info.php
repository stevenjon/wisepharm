<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 30.06.2020
header('Content-type: text/html; charset=UTF-8');
require "connect.php";
 
$user_id = $_POST['us_id'];  
   
$count=1;
 
$sql_sorov = "SELECT zak.Id AS Id, zak.zakaz_raqam AS zakaz_raqam, zak.optom_id AS optom_id, opt.firma_nomi AS firma_nomi, opt.manzil AS manzil, opt.telefon AS telefon, opt.telefon2 AS telefon2, zak.tovar_id AS tovar_id, zak.nomi AS nomi, zak.firmasi AS firmasi, zak.narxi AS narxi, zak.soni AS soni, (REPLACE(narxi,' ','') * soni) AS summasi, zak.ed_izm AS ed_izm, zak.srok AS srok, zak.tovar_time AS tovar_vaqti, zak.tovar_holati AS holati, zak.time_update AS qabul_vaqti FROM `zakazlar` AS zak INNER JOIN users AS opt ON zak.optom_id = opt.Id  WHERE zak.user_id = '$user_id' ORDER BY holati ASC";


$javob = mysqli_query($conn,"SET NAMES utf8");
$javob = mysqli_query($conn, $sql_sorov); 

if ($javob !== false && $javob->num_rows > 0) {
    $results = array();
	while($row=mysqli_fetch_array($javob)){

		$sorov_id = str_replace('|', ' ',$row['Id']);  
		$zakaz_raqam = str_replace('|', ' ',$row['zakaz_raqam']); 
		$optom_id = str_replace('|', ' ',$row['optom_id']); 
		$firma_nomi = str_replace('|', ' ',$row['firma_nomi']); 
		$manzil = str_replace('|', ' ',$row['manzil']); 
		$telefon = str_replace('|', ' ',$row['telefon']);
		$telefon2 = str_replace('|', ' ',$row['telefon2']);  
		$tovar_id = str_replace('|', ' ',$row['tovar_id']); 
		$nomi = str_replace('|', ' ',$row['nomi']); 
		$firmasi = str_replace('|', ' ',$row['firmasi']); 
		$narxi = str_replace('|', ' ',$row['narxi']); 
		$soni = str_replace('|', ' ',$row['soni']); 
		$summasi = str_replace('|', ' ',$row['summasi']); 
		$ed_izm = str_replace('|', ' ',$row['ed_izm']); 
		$srok = str_replace('|', ' ',$row['srok']); 
		$tovar_vaqti = str_replace('|', ' ',$row['tovar_vaqti']); 
		$holati = str_replace('|', ' ',$row['holati']); 
		$qabul_vaqti = str_replace('|', ' ',$row['qabul_vaqti']); 
   
		$summasi = get_decimal($summasi); 
		$narxi = get_decimal($narxi); 
   
        // $qays = "";
        // if($holati == "1"){
        //     $qays = "Қабул қилинган вақти: ";
        // } else if($holati == "0"){
        //     $qays = "Буюртма вақти: ";
        // } else if($holati == "2"){
        //     $qays = "Бекор қилинган вақти: ";
        // }
        $result = ['zakaz_raqam'=> $zakaz_raqam, 'holati'=> $holati, 'firma_nomi'=>$firma_nomi,'nomi'=> $nomi, 'narxi'=>$narxi, 'soni'=>$soni, 'summasi'=> $summasi, 'srok'=> $srok, 'firmasi'=> $firmasi, 'manzil'=>$manzil, 'tel1'=> $telefon, 'tel2'=>$telefon2, 'turi'=> $ed_izm];
        array_push($results,$result);
		      
		$count++;
    }
    if($count>0){
         $results = json_encode($results, JSON_UNESCAPED_UNICODE);
        echo $results;
        try{
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
    function get_decimal($narxi100 = null) {
       	$narxi100 = str_replace(' ', '', $narxi100);  
		$narxi100 = str_replace(',', '.', $narxi100);  
        if($narxi100 == ""){
           $narxi100 = "0"; 
        }
        $narxi100 = number_format($narxi100, 2, '.', ' ');
        return $narxi100;
    }
    
    function cyril_to_latin($textlat = null) {
        $cyr = array(
            'ж',  'ч',  'щ',   'ш',  'ю',  'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'я',
            'Ж',  'Ч',  'Щ',   'Ш',  'Ю',  'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Я');
        
        $lat = array(
            'j', 'ch', 'sh', 'sh', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'ts', 'y', 'x', 'ya',
            'J', 'Ch', 'Sh', 'Sh', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'Ts', 'Y', 'X', 'Ya');
        return str_replace($cyr, $lat, $textlat);
    }
    
    function latin_to_cyril($textlat = null) {
        $cyr = array(
            'ж',  'ч',  'щ',   'ш',  'ю',  'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'я',
            'Ж',  'Ч',  'Щ',   'Ш',  'Ю',  'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Я');
        
        $lat = array(
            'j', 'ch', 'sh', 'sh', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'ts', 'y', 'x', 'ya',
            'J', 'Ch', 'Sh', 'Sh', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'Ts', 'Y', 'X', 'Ya');
        
        return str_replace($lat, $cyr, $textlat); 
    }
?>