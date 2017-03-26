<?php
$host = "localhost";
$user = "root";
$name = "percobaan001";
$pass ="";
$conn = mysql_connect($host,$user,$pass); 
$pilihdatabase = mysql_select_db($name, $conn) or die ("GAGAL");

?>