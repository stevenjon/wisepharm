<?php

// Created by Ibrohimjon Ahmadjonov Ilhomjon o'g'li on 15.08.2020
header('Content-type: text/html; charset=UTF-8');
 
$holati = "0";
 
function check_user_holati($user_id = null,$mac_id = null, $conn = null) {
    
    if($user_id != null && $conn != null){  
        $sql = "SELECT holati, bosh_sana, tugash_sana FROM users WHERE Id = '$user_id'";
         
        $result = mysqli_query($conn,"SET NAMES utf8");
        
        $result = mysqli_query($conn, $sql); 
        
        $count=1;
        
        if ($result !== false && $result->num_rows > 0) {
        	while($row=mysqli_fetch_array($result)){
         
        		$holati=$row['holati'];     
        		$bosh_sana=$row['bosh_sana'];   
        		$tugash_sana=$row['tugash_sana'];   
        		
        		
                date_default_timezone_set('Asia\Tashkent');
                
                $timestamp = time();
                $hozirgi = date("Y-m-d 00:00:02", $timestamp);
                
        		$time_hozirgi  = strtotime($hozirgi);
        		$time_bosh  = strtotime($bosh_sana);
        		$time_tugash  = strtotime($tugash_sana);
        		$vaqti = "";
        		if($time_hozirgi >= $time_bosh && $time_hozirgi <= $time_tugash){
        		    if($mac_id != null){
            		    $sql_gen4 = "SELECT Id, holati FROM computers WHERE user_id = '$user_id' AND mac_id = '$mac_id'";
                        $result4 = mysqli_query($conn,"SET NAMES utf8");
                                
                        $result4 = mysqli_query($conn, $sql_gen4); 
                                 
                        if ($result4 !== false && $result4->num_rows > 0) {
                            while($row2=mysqli_fetch_array($result4)){
            	            	$mac_holati=$row2['holati'];     
                                 if($mac_holati != "1"){
                                    $holati = "0";
                                 } 
                            } 
                        } else{
            		        $holati = "1";
                        }
        		    }
        		} else{
        		    $holati = "0";
        		} 
        	} 
        }  
    } 
    return $holati;
}
?>