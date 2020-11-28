<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 08.07.2020
header('Content-type: text/html; charset=UTF-8');
require "connect.php";
 
$user_id = $_POST['us_id'];  
   
$count=1;
 
$sql_sorov = "SELECT Id, user_id, nomi, malumot, time_create FROM yangilik WHERE Id > $user_id ORDER BY Id ASC";

$javob = mysqli_query($conn,"SET NAMES utf8");
$javob = mysqli_query($conn, $sql_sorov); 

if ($javob !== false && $javob->num_rows > 0) {
	while($row=mysqli_fetch_array($javob)){

		$Id = str_replace('|', ' ',$row['Id']);   
		$nomi = str_replace('|', ' ',$row['nomi']); 
		$malumot = str_replace('|', ' ',$row['malumot']); 
		$time_create = str_replace('|', ' ',$row['time_create']);
		 
   
		echo nl2br("".$Id."|".$nomi."|".$malumot."|".$time_create."~");   
        
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