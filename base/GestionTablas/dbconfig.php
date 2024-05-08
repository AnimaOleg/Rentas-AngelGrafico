<?php
    $host = 'localhost';
    $dbname = 'angelgra_2024';
    $username = 'angelgra_2024';
    $password = 'ZjRGB)c{OC8X';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Establecer el modo de error PDO a excepción
        //echo "Conexión correcta";

    } catch(PDOException $e) {
        echo "Conexión fallida: " . $e->getMessage();
    }
?>
