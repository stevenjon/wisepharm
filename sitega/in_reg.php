<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 24.06.2020


require "connect.php"; 

$nomi = filter_var($_POST['nomi'], FILTER_SANITIZE_STRING);
$manzil = filter_var($_POST['manzil'], FILTER_SANITIZE_STRING); 
$telefon = $_POST['telefon']; 
$telefon2 = $_POST['telefon2']; 
$vil_id = $_POST['vil_id']; 
$shah_id = $_POST['shah_id']; 
$login = filter_var($_POST['login'], FILTER_SANITIZE_STRING); 
$parol = filter_var($_POST['parol'], FILTER_SANITIZE_STRING); 
// $mac_id = $_POST['mac_id']; 
// $malum = $_POST['malum']; 
$comp_soni = $_POST['comp_soni']; 
$turi =2; 
$tel_soni = $_POST['tel_soni']; 

$xato_firma_nomi = "a";
$xato_telefon = "b";
$xato_login = "c";
$xato_comp = "d";

mysqli_set_charset($conn,"utf8");

$sql_gen3 = "SELECT Id FROM users WHERE firma_nomi = '$nomi'";
$result3 = mysqli_query($conn,"SET NAMES utf8");
        
$result3 = mysqli_query($conn, $sql_gen3); 
         
if ($result3 !== false && $result3->num_rows > 0) {
    while($row2=mysqli_fetch_array($result3)){
        echo $xato_firma_nomi;
        return;
    }
} else{
    
    $sql_gen2 = "SELECT Id FROM users WHERE telefon = '$telefon'";
    $result2 = mysqli_query($conn,"SET NAMES utf8");
            
    $result2 = mysqli_query($conn, $sql_gen2); 
             
    if ($result2 !== false && $result2->num_rows > 0) {
        while($row=mysqli_fetch_array($result2)){
            echo $xato_telefon;
            return;
        }
    } else{
        
        $sql_gen4 = "SELECT Id FROM users WHERE login = '$login'";
        $result4 = mysqli_query($conn,"SET NAMES utf8");
                
        $result4 = mysqli_query($conn, $sql_gen4); 
                 
        if ($result4 !== false && $result4->num_rows > 0) {
            while($row=mysqli_fetch_array($result4)){
                echo $xato_login;
                return;
            }
        } else{
                $bosh_sana = "";
                $tugash_sana = "";
                
                $timestamp = time();
                $bosh_sana = date("Y-m-d 00:00:01", $timestamp);
                
                $date = strtotime("+60 day");
                $tugash_sana = date('Y-m-d 23:59:59', $date);
                
                $mysql_qry2 = "INSERT INTO users (turi,firma_nomi,login,parol,holati,viloyat_id,shahar_id,manzil,telefon,telefon2,bosh_sana,tugash_sana,comp_soni,tel_soni,file_nomi) VALUES ('$turi','$nomi','$login','$parol','1','$vil_id','$shah_id','$manzil','$telefon','$telefon2','$bosh_sana','$tugash_sana','$comp_soni','$tel_soni',' ')";
            
                if($conn->query($mysql_qry2) == TRUE){
                    $last_id = $conn->insert_id;
                    $mysql_qry = "INSERT INTO computers (user_id,mac_id,malumot,holati) VALUES ('$last_id','$mac_id','$malum','1')";
        
                    if($conn->query($mysql_qry) == TRUE){
                        $komp_id = $conn->insert_id;
                	    echo $last_id;
                    } else {
                    	echo 'no';
                    }
                } else {
                	echo 'no';
                }
            }
        }
    } 

$conn->close();
?>
