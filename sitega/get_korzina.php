<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 07.08.2020
header('Content-type: text/html; charset=UTF-8');
require "connect.php";
 
$user_id = $_POST['us_id'];  
   
$count=1;
 
$sql_sorov = "SELECT kor.tel_id AS tel_id, SUM(kor.soni) AS soni, SUM(kor.soni * REPLACE(kor.narxi,' ','')) AS summasi, IFNULL(tel.fio,'Компютер орқали') AS fio FROM korzina AS kor LEFT JOIN telefonlar AS tel ON kor.tel_id = tel.Id WHERE kor.user_id='$user_id' GROUP BY kor.tel_id ORDER BY kor.tel_id ASC";


$javob = mysqli_query($conn,"SET NAMES utf8");
$javob = mysqli_query($conn, $sql_sorov); 

if ($javob !== false && $javob->num_rows > 0) {
    $results = array();
	while($row=mysqli_fetch_array($javob)){

		$tel_id = str_replace('|', ' ',$row['tel_id']);   
		$soni = str_replace('|', ' ',$row['soni']); 
		$summasi = str_replace('|', ' ',$row['summasi']); 
		$fio = str_replace('|', ' ',$row['fio']); 
		
		$summasi = get_decimal($summasi);
        $result = ['tel_id'=> $tel_id, 'soni'=> $soni, 'summasi' => $summasi, 'fio' => $fio];
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