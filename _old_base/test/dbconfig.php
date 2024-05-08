<?php
$host = 'localhost'; // o la IP del servidor de base de datos
$dbname = 'angelgra_2024';
$username = 'angelgra_2024';
$password = 'ZjRGB)c{OC8X';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Establecer el modo de error PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa"; 
}
catch(PDOException $e) {
    echo "Conexión fallida: " . $e->getMessage();
}
?>
