<?php
include 'dbconfig.php';

try {
    // Crear la conexión
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear la sentencia SQL para crear la tabla
    $sql = "CREATE TABLE IF NOT EXISTS nombre_de_tu_tabla (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    columna1 VARCHAR(30) NOT NULL,
    columna2 INT(10) NOT NULL,
    columna3 TIMESTAMP
    )";

    // Ejecutar la sentencia SQL
    $conn->exec($sql);
    echo "Tabla creada exitosamente";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
