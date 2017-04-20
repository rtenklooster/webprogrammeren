<?php
$hostname = getHostName();

if ($hostname == "MacBook-Pro-van-Michael-2239.local") {
        $host = "localhost";
        $user = "abihas";
        $pass = "bdgoiusdfgjhs987r2342098fgdgbdk";
        $name = "pizza";
    } else {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $name = "pizza";
    }
try {
     $db = new PDO("mysql:host={$host};dbname={$name}",$user,$pass);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch (PDOException $e)
    {
        echo $e->getMessage();
    }
?>
