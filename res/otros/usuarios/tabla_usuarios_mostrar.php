<?php
    include 'dbconfig.php';

    try {
        // sql
        $stmt = $conn->prepare("SELECT * FROM usuarios"); // from $tabla
        $stmt->execute();

        // Establecer el modo de resultado a objeto para que pueda ser leído más fácilmente
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        // Comenzar la tabla HTML
        $echo = "<table border='1'>";
        $echo .= "<tr style='font-size:14px;'>";
        $echo .= "<th>ID</th>";
        $echo .= "<th>Usuario</th>";
        $echo .= "<th>Contraseña</th>";
        $echo .= "<th>Fecha Creación</th>";
        // $echo .= "<th>Fecha Actualización</th>";
        $echo .= "</tr>";

        // Recorrer los resultados y añadirlos a la tabla HTML
        foreach($stmt->fetchAll() as $k=>$v) {
            $echo .= "<tr style='font-size:11px;'>";
            $echo .= "<td>" . $v['id'] . "</td>";
            $echo .= "<td>" . $v['usuario'] . "</td>";
            $echo .= "<td>" . $v['contrasena'] . "</td>";
            $echo .= "<td>" . $v['fechaRegistro'] . "</td>";
            // $echo .= "<td>" . $v['fechaActualizacion'] . "</td>";
            $echo .= "</tr>";
        }
        $echo .= "</table>";
        echo $echo;

    } catch(PDOException $e) {
        echo "Error Mostrando<br/>";
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>
