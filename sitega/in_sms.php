<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 24.06.2020


require "connect.php"; 

$nomer = $_POST['nomer'];       

$nomer = str_replace('<br />', ' ', $nomer);

$sms_kod = mt_rand(100000, 999999);

$sms_kod = "123456";
mysqli_set_charset($conn,"utf8");

    $sql_gen2 = "SELECT Id FROM users WHERE telefon = '$nomer'";
    $result = mysqli_query($conn,"SET NAMES utf8");
            
    $result = mysqli_query($conn, $sql_gen2); 
             
    if ($result !== false && $result->num_rows > 0) {
        while($row=mysqli_fetch_array($result)){
            echo "bor";
            return;
        }
    } else{
        $mysql_qry = "INSERT INTO telefon_smslar (telefon,kod) VALUES ('$nomer','$sms_kod')";
        
        if($conn->query($mysql_qry) == TRUE){
        	echo "" . $sms_kod;
        } else {
        	echo 'no';
        }
    }
    
$conn->close();
?>
