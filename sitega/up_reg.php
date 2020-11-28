<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 24.06.2020


require "connect.php"; 

$nomi = $_POST['nomi']; 
$manzil = $_POST['manzil']; 
$telefon = $_POST['telefon']; 
$telefon2 = $_POST['telefon2']; 
$vil_id = $_POST['vil_id']; 
$shah_id = $_POST['shah_id']; 
// $login = $_POST['login']; 
// $parol = $_POST['parol']; 
// $comp_soni = $_POST['comp_soni'];
// $turi = $_POST['turi'];
// $tel_soni = $_POST['tel_soni']; 
$user_id = $_POST['user_id']; 

        $xato_firma_nomi = "a";
        $xato_telefon = "b";
        $xato_login = "c"; 

mysqli_set_charset($conn,"utf8");

$sql_gen3 = "SELECT Id FROM users WHERE firma_nomi = '$nomi' AND Id NOT LIKE '$user_id'";
$result3 = mysqli_query($conn,"SET NAMES utf8");
        
$result3 = mysqli_query($conn, $sql_gen3); 
         
if ($result3 !== false && $result3->num_rows > 0) {
    while($row2=mysqli_fetch_array($result3)){
        echo $xato_firma_nomi;
        return;
    }
} else{
    
    $sql_gen2 = "SELECT Id FROM users WHERE telefon = '$telefon' AND Id NOT LIKE '$user_id'";
    $result2 = mysqli_query($conn,"SET NAMES utf8");
            
    $result2 = mysqli_query($conn, $sql_gen2); 
             
    if ($result2 !== false && $result2->num_rows > 0) {
        while($row=mysqli_fetch_array($result2)){
            echo $xato_telefon;
            return;
        }
    } else{
             {
                $bosh_sana = "";
                $tugash_sana = "";
                
                $timestamp = time();
                $bosh_sana = date("Y-m-d 00:00:01", $timestamp);
                
                $date = strtotime("+60 day");
                $tugash_sana = date('Y-m-d 23:59:59', $date);
                
                $mysql_qry2 = "UPDATE users SET firma_nomi = '$nomi', viloyat_id='$vil_id', shahar_id='$shah_id', manzil='$manzil', telefon ='$telefon', telefon2='$telefon2' WHERE Id = '$user_id'";
            
                if($conn->query($mysql_qry2) == TRUE){
                    $last_id = $conn->insert_id;
                    echo 'ok';
                } else {
                	echo 'no';
                }
            }
        }
    
} 

$conn->close();
?>