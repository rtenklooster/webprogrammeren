<?php
$hostname = getHostName();

if($hostname == "MacBook-Pro-van-Richard.local" || $hostname == "SURFACE-RICHARD" || $hostname = "LenovoY500"){
$host = "localhost";
$user = "root";
$pass = "";
$name = "pizza";
}else{
$host = "localhost";
$user = "abihas";
$pass = "bdgoiusdfgjhs987r2342098fgdgbdk";
$name = "pizza";
}
try
{
     $db = new PDO("mysql:host={$host};dbname={$name}",$user,$pass);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     //echo $e->getMessage(); # niet in productie gebruiken.
}

?>
