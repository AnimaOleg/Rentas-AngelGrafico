<?php
    // http://localhost/2024/modules/tablas/tabla_contribuyente_insertar.php
    include 'dbconfig.php';

    try {
        // Comprobar maximo ID para luego asignarle numRenta = id
        $sql = $conn->prepare("select max(id) as maxid from contribuyente");
        $sql->execute();
        
        // Resultado a Objeto asociativo        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $cuenta = $sql->rowCount();// echo "Total: ".$cuenta;
        
        // Cantidad de registros devueltos
        if($cuenta == 1){
            foreach($sql->fetchAll() as $k=>$v) { // Array Asociativo
                // Siguiente numRenta = id+1 del anterior - Es decir, numRenta = id
                if($v['maxid'] == null)
                    $idSiguiente = 1; // echo "maxid = null";
                else
                    $idSiguiente = $v['maxid']+1; // echo "maxid = ".$v['maxid'];
            }
        }
        
        // Fecha actual
        date_default_timezone_set("Europe/Madrid");
        $fecha_alta = date('Y/m/d H:i:s H', time());

        // // Asignar valores a los parámetros y ejecutar
        $_1 = $idSiguiente;
        $_2 = $idSiguiente;
        $_3 = $fecha_alta;
        $_4 = $fecha_alta;
        $_5 = $fecha_alta;
        $_6 = "Ricki - " .$fecha_alta;
        $_7 = "Apellido";
        $_8 = "ReApellido";
        $_9 = "962480202";
        $_10 = "666999666";
        $_11 = "garbancito.tadeo-jones@pequeño.com";
        $_12 = "ES56 00000";
        $_13 = "REF #0000";
        
        // Preparar la declaración SQL
        $stmt = $conn->prepare("
            INSERT INTO contribuyente (
                contribuyente_numRenta, contribuyente_dni, contribuyente_fechaAlta, contribuyente_vigencia, contribuyente_fechaInicio,
                contribuyente_nombre, contribuyente_apellido1, contribuyente_apellido2, contribuyente_telefono, contribuyente_movil,
                contribuyente_email, contribuyente_numCuenta, contribuyente_numRef)
            VALUES (
                ?, ?, ?, ?, ?,
                ?, ?, ?, ?, ?,
                ?, ?, ?)"
        );

        // Vincular los parámetros
        $stmt->bindParam(1, $_1);
        $stmt->bindParam(2, $_2);
        $stmt->bindParam(3, $_3);
        $stmt->bindParam(4, $_4);
        $stmt->bindParam(5, $_5);
        $stmt->bindParam(6, $_6);
        $stmt->bindParam(7, $_7);
        $stmt->bindParam(8, $_8);
        $stmt->bindParam(9, $_9);
        $stmt->bindParam(10, $_10);
        $stmt->bindParam(11, $_11);
        $stmt->bindParam(12, $_12);
        $stmt->bindParam(13, $_13);
        
        $stmt->execute();
        echo "Registro añadido correctamente";
        
    } catch(PDOException $e) {
        echo "Contribuyente - Error Insertando: No existe la tabla";
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
?>
