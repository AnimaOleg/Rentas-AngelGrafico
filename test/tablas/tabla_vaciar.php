<?php
    include 'dbconfig.php';

    try {
        // Crear la conexión
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL
        $sql = "TRUNCATE TABLE nombre_de_tu_tabla";
        $conn->exec($sql);
        echo "Tabla Vaciada correctamente";

    } catch(PDOException $e) {
        // echo $sql . "<br>" . $e->getMessage();
        echo "Error Vaciando: No existe la tabla";
    }

    $conn = null;
?>
