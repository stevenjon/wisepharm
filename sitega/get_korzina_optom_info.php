<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 30.06.2020
header('Content-type: text/html; charset=UTF-8');
require "connect.php";
 
$user_id = $_POST['us_id'];  
   
$count=1;
 
$sql_sorov = "SELECT kor.Id AS Id, kor.tel_id AS tel_id, kor.optom_id AS optom_id, kor.tovar_id AS tovar_id, kor.nomi AS nomi, kor.firmasi AS firmasi, kor.narxi AS narxi, kor.skidka AS skidka, kor.soni AS soni, ( REPLACE (kor.narxi, ' ', '') * kor.soni ) AS summasi, kor.ed_izm AS ed_izm, kor.srok AS srok, kor.tovar_time AS tovar_vaqti, kor.time_create AS buy_vaqti, IFNULL(us.fio,'Компютер орқали') AS fio FROM korzina AS kor LEFT JOIN telefonlar AS us ON kor.tel_id = us.Id WHERE kor.user_id = '$user_id' ORDER BY kor.tel_id ASC, time_create ASC";


$javob = mysqli_query($conn,"SET NAMES utf8");
$javob = mysqli_query($conn, $sql_sorov); 

if ($javob !== false && $javob->num_rows > 0) {
	while($row=mysqli_fetch_array($javob)){

		$sorov_id = str_replace('|', ' ',$row['Id']);  
		$tel_id = str_replace('|', ' ',$row['tel_id']); 
		$optom_id = str_replace('|', ' ',$row['optom_id']); 
		$tovar_id = str_replace('|', ' ',$row['tovar_id']); 
		$nomi = str_replace('|', ' ',$row['nomi']); 
		$firmasi = str_replace('|', ' ',$row['firmasi']); 
		$narxi = str_replace('|', ' ',$row['narxi']); 
		$skidka = str_replace('|', ' ',$row['skidka']); 
		$soni = str_replace('|', ' ',$row['soni']); 
		$summasi = str_replace('|', ' ',$row['summasi']); 
		$ed_izm = str_replace('|', ' ',$row['ed_izm']); 
		$srok = str_replace('|', ' ',$row['srok']); 
		$tovar_vaqti = str_replace('|', ' ',$row['tovar_vaqti']); 
		$buy_vaqti = str_replace('|', ' ',$row['buy_vaqti']); 
		$fio = str_replace('|', ' ',$row['fio']);  
		
		$summasi = get_decimal($summasi); 
		$narxi = get_decimal($narxi); 
    
   
		echo nl2br("".$sorov_id."|".$tel_id."|".$optom_id."|".$fio."|".$tovar_id."|".$nomi."|".$firmasi."|".$narxi."|".$soni."|".$skidka."|".$summasi."|".$ed_izm."|".$srok."|".$tovar_vaqti."|".$buy_vaqti."~");   
		$count++;
    }
    if($count>0){
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