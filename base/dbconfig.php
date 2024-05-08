<?php
    $host = 'localhost';
    $dbname = 'angelgra_2024';
    $username = 'angelgra_2024';
    $password = 'ZjRGB)c{OC8X';

    // try {
    //     // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //     $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Establecer el modo de error PDO a excepción
    //     //echo "Conexión correcta";

    // } catch(PDOException $e) {
    //     echo "Conexión fallida: " . $e->getMessage();
    // }

    /* Database connection start */
    $servername = "localhost";
    $username = "angelgra_2024";
    $password = "ZjRGB)c{OC8X";
    $dbname = "angelgra_2024";
    $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
    mysqli_set_charset($conexion, "utf8");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>