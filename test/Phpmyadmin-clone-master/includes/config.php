<?php
ob_start();

session_start();

date_default_timezone_set("Asia/Kolkata");
try{
    $host = 'localhost';
    $dbname = 'angelgra_2024';
    $username = 'angelgra_2024';
    $password = 'ZjRGB)c{OC8X';
    
    $con=new PDO("mysql:dbname=$dbname;host=$host;port=3306",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e){
    echo "Connection failed".$e->getMessage();
}
?>