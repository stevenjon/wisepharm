<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 03.06.2020
header('Content-type: text/html; charset=UTF-8');
require "connect.php";
require "check_user.php";

$malumot = $_GET['malumot'];
$page_number = isset($_GET['page']) ? $_GET['page'] : 1;
$bosh = ($page_number - 1 ) * 20; 
$max_narx = isset($_GET['max']) ? $_GET['max'] : '0'; 
$min_narx = isset($_GET['min']) ? $_GET['min'] : '0';  
$foiz = isset($_GET['foiz']) ? $_GET['foiz'] : '1';  
$user_id = $GET['us_id'];  
$vil_id = isset($_GET['vil']) ? $_GET['vil'] : '0';
$optom_id = "0";  
if( isset($_GET['optom_id'])){  
    $optom_id = $_GET['optom_id'];  
}  
// $shah_id = $_POST['shah_id'];  
// $mac = $_POST['mac'];     
$malumot = "'".$malumot."'";
   
$count=1;
// $user_holati = check_user_holati($user_id, $conn);
$user_holati=1;
if($user_holati == "1"){
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
        $qoshimcha = $qoshimcha.")";
    }
    
    if($vil_id != "0"){
        $qoshimcha = $qoshimcha." AND us.viloyat_id IN ($vil_id) ";
    }
    // if($shah_id != "0"){
    //     $qoshimcha = $qoshimcha." AND us.shahar_id IN ($shah_id) ";
    // }
     if($optom_id != "0"){
        $qoshimcha = $qoshimcha." AND us.Id IN ($optom_id) ";
    }
    
    if($max_narx != "0"){
        if($foiz == "1"){
            $qoshimcha = $qoshimcha." AND narxi100 <= $max_narx AND user_id NOT LIKE '$user_id' ORDER BY cast(narxi100 as unsigned) ASC"; 
        } else if($foiz == "2"){
            $qoshimcha = $qoshimcha." AND narxi50 <= $max_narx AND user_id NOT LIKE '$user_id' ORDER BY cast(narxi50 as unsigned) ASC"; 
        } else if($foiz == "3"){
            $qoshimcha = $qoshimcha." AND narxi25 <= $max_narx AND user_id NOT LIKE '$user_id' ORDER BY cast(narxi25 as unsigned) ASC"; 
        } 
    } else{
        $qoshimcha = $qoshimcha."  AND user_id NOT LIKE '$user_id'  ORDER BY cast(narxi100 as unsigned) ASC";

    }
  $sql_sorov = "SELECT prices.Id AS Id, user_id, nomi, narxi100, narxi50, narxi25, qoldiq, skidka, srok, firmasi, olchov_turi, time, us.manzil AS manzil, us.telefon AS telefon, us.telefon2 AS telefon2, us.firma_nomi AS firma_nomi, us.viloyat_id AS viloyat_id, us.shahar_id AS shahar_id, us.shahar_nomi AS shahar_nomi, us.viloyat_nomi AS viloyat_nomi FROM prices INNER JOIN (SELECT u.Id AS Id, u.manzil AS manzil, u.telefon AS telefon, u.telefon2 AS telefon2, u.firma_nomi AS firma_nomi, sh.viloyat_id AS viloyat_id, sh.Id AS shahar_id, sh.nomi AS shahar_nomi, sh.viloyat_nomi AS viloyat_nomi FROM users AS u LEFT JOIN (SELECT s.Id AS Id, s.nomi AS nomi, s.viloyat_id AS viloyat_id, v.nomi AS viloyat_nomi FROM shaharlar AS s LEFT JOIN viloyatlar AS v ON s.viloyat_id = v.Id) AS sh ON u.shahar_id = sh.Id ) AS us ON user_id = us.Id WHERE (nomi LIKE CONCAT('%', $malumot, '%') OR nomi LIKE CONCAT('%', $cyr, '%') OR nomi LIKE CONCAT('%', $upp_l, '%') OR nomi LIKE CONCAT('%', $upp_c, '%') OR nomi LIKE CONCAT('%', $latin, '%') OR nomi LIKE CONCAT('%', $upp, '%') ".$qoshimcha." LIMIT $bosh, 20";
    

    // ;
   
    $javob = mysqli_query($conn,"SET NAMES utf8");
    $javob = mysqli_query($conn, $sql_sorov) or die("bo'madi"); 
    $results  = array();
    $dorilar = array();
    if ($javob !== false && $javob->num_rows > 0) {
    	while($row=mysqli_fetch_array($javob)){
    
    		$sorov_id=str_replace('|', ' ',$row['Id']); 
    		$user_id=str_replace('|', ' ',$row['user_id']); 
    		$nomi=str_replace('|', ' ',$row['nomi']); 
    		$narxi100=str_replace('|', ' ',$row['narxi100']); 
    		$narxi50=str_replace('|', ' ',$row['narxi50']); 
    		$narxi25=str_replace('|', ' ',$row['narxi25']); 
    		$srok=str_replace('|', ' ',$row['srok']); 
    		$firmasi=str_replace('|', ' ',$row['firmasi']); 
    		$upakovka_turi=str_replace('|', ' ',$row['olchov_turi']); 
    		$time=str_replace('|', ' ',$row['time']); 
    		$manzil=str_replace('|', ' ',$row['manzil']); 
    		$telefon=str_replace('|', ' ',$row['telefon']); 
    		$telefon2=str_replace('|', ' ',$row['telefon2']); 
    		$firma_nomi=str_replace('|', ' ',$row['firma_nomi']); 
    		$viloyat_id=str_replace('|', ' ',$row['viloyat_id']); 
    		$shahar_id=str_replace('|', ' ',$row['shahar_id']); 
    		$shahar_nomi=str_replace('|', ' ',$row['shahar_nomi']);
    		$viloyat_nomi=str_replace('|', ' ',$row['viloyat_nomi']);
    		$qoldiq=str_replace('|', ' ',$row['qoldiq']);
    		$skidka=str_replace('|', ' ',$row['skidka']);
     
    		$narx = "";
    		if($foiz == "1"){
                $narx = $narxi100; 
            } else if($foiz == "2"){
                $narx = $narxi50; 
            } else if($foiz == "3"){
                $narx = $narxi25; 
            } 
            
    		$narx = str_replace(' ', '', $narx);  
    		$narx = str_replace(',', '.', $narx);  
            if($narx == ""){
               $narx = "0"; 
            }
            $narx2 = number_format($narx, 2, '.', ' ');
            $skidka = $skidka." фоиз скидка билан";
            $dori = ['optomchi' => $firma_nomi, 'tovar'=> $nomi, 'narxi'=> (int)$narx, 'turi'=> $upakovka_turi, 'time'=> $time, 'firma_nomi' => $firmasi, 'vil' => $viloyat_nomi, 'telefon'=> $telefon, 'id' => $sorov_id];
            array_push($dorilar, $dori);
    		$count++;
        }   
        
        $sql_sorov_soni = "SELECT COUNT(prices.Id) AS soni FROM prices INNER JOIN (SELECT u.Id AS Id, u.manzil AS manzil, u.telefon AS telefon, u.telefon2 AS telefon2, u.firma_nomi AS firma_nomi, sh.viloyat_id AS viloyat_id, sh.Id AS shahar_id, sh.nomi AS shahar_nomi, sh.viloyat_nomi AS viloyat_nomi FROM users AS u LEFT JOIN (SELECT s.Id AS Id, s.nomi AS nomi, s.viloyat_id AS viloyat_id, v.nomi AS viloyat_nomi FROM shaharlar AS s LEFT JOIN viloyatlar AS v ON s.viloyat_id = v.Id) AS sh ON u.shahar_id = sh.Id ) AS us ON user_id = us.Id WHERE (nomi LIKE CONCAT('%', $malumot, '%') OR nomi LIKE CONCAT('%', $cyr, '%') OR nomi LIKE CONCAT('%', $upp_l, '%') OR nomi LIKE CONCAT('%', $upp_c, '%') OR nomi LIKE CONCAT('%', $latin, '%') OR nomi LIKE CONCAT('%', $upp, '%') ".$qoshimcha."";
    
        $javob2 = mysqli_query($conn, $sql_sorov_soni) or die("bomadilar"); 
        
        if ($javob2 !== false && $javob2->num_rows > 0) {
            while($row=mysqli_fetch_array($javob2)){
                $soni=['soni' => $row['soni']]; 
                array_push($results, $soni);
            }
        }
        array_push($results, $dorilar);
        $results = json_encode($results, JSON_UNESCAPED_UNICODE);
        echo $results;
        try{
            $conn->close();
        } catch(Exception $e){
                
        }
    	return; 
    }
    echo 'no';
    try{
        $conn->close();
    } catch(Exception $e){
         
    }
} else{ 
    echo 'no_r';
    try{
        $conn->close();
    } catch(Exception $e){
         
    }
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