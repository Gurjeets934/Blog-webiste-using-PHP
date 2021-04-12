<?php
date_default_timezone_set('Asia/Calcutta');
$dt=date("y-m-d h:i:s");

$servername="localhost";
$username="root";
$password="";
$dbname="blogger";
$conn= new MySQLi($servername,$username,$password,$dbname);
if(!$conn)
die("connection failed:".mysqli_connection_error());
?>
