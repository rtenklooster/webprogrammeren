<?php
$host = "localhost";
$user = "root";
$pass = "abihas";
$name = "bdgoiusdfgjhs987r2342098fgdgbdk";

try
{
     $db = new PDO("mysql:host={$host};dbname={$name}",$user,$pass);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}

?>
