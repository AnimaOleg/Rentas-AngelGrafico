<?php
    include 'dbconfig.php';

    try {
        // Crear la conexión
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar la sentencia SQL para seleccionar todos los datos
        // $stmt = $conn->prepare("SELECT * FROM ".$tabla);
        $stmt = $conn->prepare("SELECT * FROM nombre_de_tu_tabla");
        $stmt->execute();

        // Establecer el modo de resultado a objeto para que pueda ser leído más fácilmente
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // Comenzar la tabla HTML
        echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Columna1</th>
            <th>Columna2</th>
            <th>Columna3</th>
        </tr>";

        // Recorrer los resultados y añadirlos a la tabla HTML
        foreach($stmt->fetchAll() as $k=>$v) {
            echo "<tr>";
            echo "<td>" . $v['id'] . "</td>";
            echo "<td>" . $v['columna1'] . "</td>";
            echo "<td>" . $v['columna2'] . "</td>";
            echo "<td>" . $v['columna3'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
    } catch(PDOException $e) {
        // echo "Error: " . $e->getMessage();
        echo "Error Mostrando: No existe la tabla";
    }

    $conn = null;
?>
