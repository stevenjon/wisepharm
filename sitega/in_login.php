<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 25.06.2020


require "connect.php"; 
 
$login = $_POST['login']; 
$parol = $_POST['parol']; 
// $mac_id = $_POST['mac_id']; 
// $malum = $_POST['malum'];  

$xato_login = "a"; 
$xato_dastur_tugadi = "b";
$xato_komp_ochirilgan = "c";
$xato_komp_soni_yoq = "d";
$xato_komp_xato = "e";
$xato_login_ochiq = "f";

mysqli_set_charset($conn,"utf8");

$sql_gen3 = "SELECT Id,holati, bosh_sana, tugash_sana, firma_nomi, viloyat_id, shahar_id, manzil, telefon, telefon2, comp_soni FROM users WHERE login = '$login' AND parol = '$parol'AND turi = '2'";
$result3 = mysqli_query($conn,"SET NAMES utf8");
        
$result3 = mysqli_query($conn, $sql_gen3); 
         
if ($result3 !== false && $result3->num_rows > 0) {
    while($row=mysqli_fetch_array($result3)){
       
		$user_id=$row['Id'];     
		$holati=$row['holati'];   
		$bosh_sana=$row['bosh_sana'];   
		$tugash_sana=$row['tugash_sana'];   
		$firma_nomi=$row['firma_nomi'];   
		$viloyat_id=$row['viloyat_id'];   
		$shahar_id=$row['shahar_id'];   
		$manzil=$row['manzil'];   
		$telefon=$row['telefon'];   
		$telefon2=$row['telefon2'];   
		$comp_soni=$row['comp_soni'];   
		
		if($comp_soni == ""){
		    $comp_soni = "0";
		}
		
		if($telefon2 == ""){
		    $telefon2 = "0";
		}
		
		if($telefon == ""){
		    $telefon = "0";
		}
		
		if($manzil == ""){
		    $manzil = "0";
		}
		
		if($holati == ""){
		    $holati = "0";
		}
				
		if($shahar_id == ""){
		    $shahar_id = "0";
		}

        echo $user_id;
      //   if($holati == "1"){
    		// date_default_timezone_set('Asia\Tashkent');
            
      //       $timestamp = time();
      //       $hozirgi = date("Y-m-d 00:00:02", $timestamp);
            
    		// $time_hozirgi  = strtotime($hozirgi);
    		// $time_bosh  = strtotime($bosh_sana);
    		// $time_tugash  = strtotime($tugash_sana);
    		// $vaqti = "";
    		// if($time_hozirgi >= $time_bosh && $time_hozirgi <= $time_tugash){
    		    
    		//     $sql_gen4 = "SELECT Id, holati FROM computers WHERE user_id = '$user_id' AND mac_id = '$mac_id'";
      //           $result4 = mysqli_query($conn,"SET NAMES utf8");
                        
      //           $result4 = mysqli_query($conn, $sql_gen4); 
                         
      //           if ($result4 !== false && $result4->num_rows > 0) {
      //               while($row2=mysqli_fetch_array($result4)){
    	 //            	$komp_id=$row2['Id'];     
    	 //            	$mac_holati=$row2['holati'];     
      //                    if($mac_holati != "1"){
      //                       echo $xato_komp_ochirilgan;
      //                       return;
      //                    }  else{
    		//                 // echo nl2br("".$user_id."|".$firma_nomi."|".$viloyat_id."|".$shahar_id."|".$manzil."|".$telefon."|".$telefon2."|".$komp_id."~");   
      //                    }
      //               } 
      //           } else{
                    
      //               $sql_gen1 = "SELECT COUNT(Id) AS soni FROM computers WHERE user_id = '$user_id'";
      //               $result1 = mysqli_query($conn,"SET NAMES utf8");
                            
      //               $result1 = mysqli_query($conn, $sql_gen1); 
                             
      //               if ($result1 !== false && $result1->num_rows > 0) {
      //                   while($row2=mysqli_fetch_array($result1)){
    	 //            	    $mac_soni = $row2['soni'];     
      //                       if($mac_soni < $comp_soni){
                                
      //                           $mysql_qry = "INSERT INTO computers (user_id,mac_id,malumot,holati) VALUES ('$user_id','$mac_id','$malum','1')";
            
      //                           if($conn->query($mysql_qry) == TRUE){
      //                               $komp_id = $conn->insert_id;
    		//                         // echo nl2br("".$user_id."|".$firma_nomi."|".$viloyat_id."|".$shahar_id."|".$manzil."|".$telefon."|".$telefon2."|".$komp_id."~");  
      //                           } else { 
      //                               echo $xato_komp_xato;
      //                               return;
      //                           }
                                
      //                       } else{
      //                           echo $xato_komp_soni_yoq;
      //                           return;
      //                       }
      //                   }
      //               } else{
                    
      //                   if(0 < $comp_soni){
                                
      //                       $mysql_qry = "INSERT INTO computers (user_id,mac_id,malumot,holati) VALUES ('$user_id','$mac_id','$malum','1')";
            
      //                       if($conn->query($mysql_qry) == TRUE){
      //                               $komp_id = $conn->insert_id;
    		//                     // echo nl2br("".$user_id."|".$firma_nomi."|".$viloyat_id."|".$shahar_id."|".$manzil."|".$telefon."|".$telefon2."|".$komp_id."~");  
      //                       } else { 
      //                           echo $xato_komp_xato;
      //                           return;
      //                       }
                                
      //                   } else{
      //                       echo $xato_komp_soni_yoq;
      //                       return;
      //                   }
                        
      //               }
                    
      //           }
    		// } else{
      //           echo $xato_dastur_tugadi;
      //           return;
    		// }
      //   } else{
            
      //       echo $xato_login_ochiq;
      //       return;
      //   }
    }
} else{
    echo "xato";
} 

$conn->close();
?>
