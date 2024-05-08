<?php
include 'dbconfig.php';

try {
    // Preparar la declaración SQL
    $stmt = $conn->prepare("INSERT INTO nombre_de_tu_tabla (columna1, columna2) VALUES (:columna1, :columna2)");

    // Vincular los parámetros
    $stmt->bindParam(':columna1', $valorColumna1);
    $stmt->bindParam(':columna2', $valorColumna2);
    // ...continuar para cada columna...

    // Asignar valores a los parámetros y ejecutar
    $valorColumna1 = 'Valor 1';
    $valorColumna2 = 2024;
    // ...continuar para cada columna...
    $stmt->execute();

    echo "Nuevo registro creado exitosamente";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
