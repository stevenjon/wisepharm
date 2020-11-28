<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 03.06.2020
header('Content-type: text/html; charset=UTF-8');
require "connect.php";

$malumot = $_POST['malumot']; 
   
$count=1;

$cyr = latin_to_cyril($malumot);
$latin = cyril_to_latin($malumot);
$upp = ucfirst($malumot);
$upp_l = ucfirst($latin);
$upp_c = ucfirst($cyr);

$qoshimcha = "";

if(count(explode(' ', $malumot)) > 1){
    
    $array = explode(" ", $malumot);
    $length = count($array);
    for ($i = 0; $i < $length; $i++) {
        $soz = $array[$i];
        if ($soz !== ''){
            $s_cyr = latin_to_cyril($soz);
            $s_lat = cyril_to_latin($soz);
            
            $u_1 = ucfirst($soz);
            $u_2 = ucfirst($s_cyr);
            $u_3 = ucfirst($s_lat);

            $qoshimcha = $qoshimcha." OR nomi LIKE '%$soz%' "." OR nomi LIKE '%$s_cyr%' "." OR nomi LIKE '%$s_lat%' "." OR nomi LIKE '%$u_1%' "." OR nomi LIKE '%$u_2%' "." OR nomi LIKE '%$u_3%' ";
        }
    } 
    
}

$sql_sorov = "SELECT DISTINCT(nomi) FROM prices WHERE nomi LIKE '%$malumot%' OR nomi LIKE '%$cyr%' OR nomi LIKE '%$upp_l%' OR nomi LIKE '%$upp_c%' OR nomi LIKE '%$latin%' OR nomi LIKE '%$upp%' ".$qoshimcha." LIMIT 15";
//$sql_sorov = "SELECT Id,user_id,nomi,narxi,srok,firmasi,upakovka_turi FROM prices WHERE nomi LIKE '%$malumot%' OR nomi LIKE '%$cyr%' OR nomi LIKE '%$upp_l%' OR nomi LIKE '%$upp_c%' OR nomi LIKE '%$latin%' OR nomi LIKE '%$upp%' ".$qoshimcha." LIMIT 10";

$javob = mysqli_query($conn,"SET NAMES utf8");
$javob = mysqli_query($conn, $sql_sorov); 

if ($javob !== false && $javob->num_rows > 0) {
	while($row=mysqli_fetch_array($javob)){

// 		$sorov_id=$row['Id']; 
// 		$user_id=$row['user_id']; 
		$nomi=$row['nomi']; 
// 		$narxi=$row['narxi']; 
// 		$srok=$row['srok']; 
// 		$firmasi=$row['firmasi']; 
// 		$upakovka_turi=$row['upakovka_turi']; 
 
		$nomi = str_replace('\'', '&', $nomi);  
		
		echo nl2br("".$nomi."~");   
		//echo nl2br("".$user_id."|".$nomi."|".$narxi."|".$srok."|".$firmasi."|".$upakovka_turi."~");   
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