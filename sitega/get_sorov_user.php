<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 03.06.2020
header('Content-type: text/html; charset=UTF-8');
require "connect.php";

$malumot = $_POST['malumot']; 
$max_narx = $_POST['max_narx']; 
$min_narx = $_POST['min_narx'];  
$foiz = $_POST['foiz'];  
$user_id = $_POST['us_id'];  
   
$count=1;

$cyr = latin_to_cyril($malumot);
$latin = cyril_to_latin($malumot);
$upp = ucfirst($malumot);
$upp_l = ucfirst($latin);
$upp_c = ucfirst($cyr);

$qoshimcha = "";

// if(count(explode(' ', $malumot)) > 1){
    
//     $array = explode(" ", $malumot);
//     $length = count($array);
//     for ($i = 0; $i < $length; $i++) {
//         $soz = $array[$i];
//         if ($soz !== ''){
//             $s_cyr = latin_to_cyril($soz);
//             $s_lat = cyril_to_latin($soz);
            
//             $u_1 = ucfirst($soz);
//             $u_2 = ucfirst($s_cyr);
//             $u_3 = ucfirst($s_lat);

//             $qoshimcha = $qoshimcha." OR nomi LIKE '%$soz%' "." OR nomi LIKE '%$s_cyr%' "." OR nomi LIKE '%$s_lat%' "." OR nomi LIKE '%$u_1%' "." OR nomi LIKE '%$u_2%' "." OR nomi LIKE '%$u_3%' ";
//         }
//     } 
    
// }

if($min_narx != "0"){
    if($foiz == "1"){
        $qoshimcha = $qoshimcha.") AND narxi100 >= $min_narx "; 
    } else if($foiz == "2"){
        $qoshimcha = $qoshimcha.") AND narxi50 >= $min_narx "; 
    } else if($foiz == "3"){
        $qoshimcha = $qoshimcha.") AND narxi25 >= $min_narx "; 
    } 
} else{
    $qoshimcha = $qoshimcha.") ";
}

if($max_narx != "0"){
    if($foiz == "1"){
        $qoshimcha = $qoshimcha." AND narxi100 <= $max_narx AND prices.user_id LIKE '$user_id' ORDER BY cast(narxi100 as unsigned) ASC"; 
    } else if($foiz == "2"){
        $qoshimcha = $qoshimcha." AND narxi50 <= $max_narx AND prices.user_id LIKE '$user_id' ORDER BY cast(narxi50 as unsigned) ASC"; 
    } else if($foiz == "3"){
        $qoshimcha = $qoshimcha." AND narxi25 <= $max_narx AND prices.user_id LIKE '$user_id' ORDER BY cast(narxi25 as unsigned) ASC"; 
    } 
} else{
    $qoshimcha = $qoshimcha."  AND prices.user_id LIKE '$user_id'  ORDER BY cast(narxi100 as unsigned) ASC";
}
$sql_sorov = "SELECT Id AS Id, nomi, narxi100, narxi50, narxi25, srok, firmasi, olchov_turi, time FROM prices  WHERE (nomi LIKE '%$malumot%' OR nomi LIKE '%$cyr%' OR nomi LIKE '%$upp_l%' OR nomi LIKE '%$upp_c%' OR nomi LIKE '%$latin%' OR nomi LIKE '%$upp%' ".$qoshimcha."";


$javob = mysqli_query($conn,"SET NAMES utf8");
$javob = mysqli_query($conn, $sql_sorov); 

if ($javob !== false && $javob->num_rows > 0) {
	while($row=mysqli_fetch_array($javob)){

		$sorov_id=str_replace('|', ' ',$row['Id']);  
		$nomi=str_replace('|', ' ',$row['nomi']); 
		$narxi100=str_replace('|', ' ',$row['narxi100']); 
		$narxi50=str_replace('|', ' ',$row['narxi50']); 
		$narxi25=str_replace('|', ' ',$row['narxi25']); 
		$srok=str_replace('|', ' ',$row['srok']); 
		$firmasi=str_replace('|', ' ',$row['firmasi']); 
		$upakovka_turi=str_replace('|', ' ',$row['olchov_turi']); 
		$time=str_replace('|', ' ',$row['time']); 
   
		$narxi100 = get_decimal($narxi100);
     	$narxi50 = get_decimal($narxi50);
		$narxi25 = get_decimal($narxi25);
   
		echo nl2br("".$sorov_id."|".$nomi."|".$narxi100."|".$narxi50."|".$narxi25."|".$srok."|".$firmasi."|".$upakovka_turi."|".$time."~");   
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