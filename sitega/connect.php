<?php
$HostUser ='root';
$HostPass ='mysql';
$HostName ='localhost';
$DatabaseName ='wisepharm'; 

// $HostUser ='balan925';
// $HostPass ='lXfS51YT%!';
// $HostName ='localhost';
// $DatabaseName ='balan925_wisepharm'; 
$conn = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 
?>