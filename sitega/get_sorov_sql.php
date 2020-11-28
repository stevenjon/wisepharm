<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 03.06.2020
header('Content-type: text/html; charset=UTF-8');
require "connect.php";

$malumot = $_POST['malumot']; 
$user_id = $_POST['us_id'];  
   
$count=1;

$cyr = latin_to_cyril($malumot);
$latin = cyril_to_latin($malumot);
$upp = ucfirst($malumot);
$upp_l = ucfirst($latin);
$upp_c = ucfirst($cyr);
 

$sql_sorov = "SELECT Id AS Id, nomi, narxi, ostatka, srok, firmasi, olchov_turi, time FROM tovarlar WHERE (nomi LIKE '%$malumot%' OR nomi LIKE '%$cyr%' OR nomi LIKE '%$upp_l%' OR nomi LIKE '%$upp_c%' OR nomi LIKE '%$latin%' OR nomi LIKE '%$upp%') AND user_id LIKE '$user_id' LIMIT 25";

$javob = mysqli_query($conn,"SET NAMES utf8");
$javob = mysqli_query($conn, $sql_sorov); 

if ($javob !== false && $javob->num_rows > 0) {
	while($row=mysqli_fetch_array($javob)){

		$sorov_id=str_replace('|', ' ',$row['Id']);  
		$nomi=str_replace('|', ' ',$row['nomi']); 
		$narxi = str_replace('|', ' ',$row['narxi']); 
		$ostatka = str_replace('|', ' ',$row['ostatka']); 
		$srok=str_replace('|', ' ',$row['srok']); 
		$firmasi=str_replace('|', ' ',$row['firmasi']); 
		$upakovka_turi=str_replace('|', ' ',$row['olchov_turi']); 
		$time=str_replace('|', ' ',$row['time']); 
   
		$narxi = get_decimal($narxi);
   
		echo nl2br("".$sorov_id."|".$nomi."|".$narxi."|".$ostatka."|".$srok."|".$firmasi."|".$upakovka_turi."|".$time."~");   
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