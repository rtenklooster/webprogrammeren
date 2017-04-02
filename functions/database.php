<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "pizza";

try
{
     $DB_con = new PDO("mysql:host={$host};dbname={$name}",$user,$pass);
     $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
     echo $e->getMessage();
}
?>
