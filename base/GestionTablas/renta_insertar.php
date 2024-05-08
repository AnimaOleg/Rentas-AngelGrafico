<?php
    // http://localhost/2024/modules/tablas/tabla_contribuyente_insertar.php
    include 'dbconfig.php';

    // Fecha actual
    date_default_timezone_set("Europe/Madrid");
    $fecha_alta = date('Y/m/d H:i:s', time());

    /****************************
        INSERTO CONTRIBUYENTE
    ****************************/
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
        

        // // Asignar valores a los parámetros y ejecutar
        $_1 = $idSiguiente;
        $_2 = $idSiguiente;
        $_3 = $fecha_alta;
        $_4 = $fecha_alta;
        $_5 = $fecha_alta;
        $_6 = "Ricki ñ Ñ - " .$fecha_alta;
        $_7 = "Apellido";
        $_8 = "ReApellido";
        $_9 = "962480202";
        $_10 = "666999666";
        $_11 = "garbancito.tadeo-jones@pequeño.com";
        $_12 = "ES56 00000";
        $_13 = "REF #0000";
        $_14 = 0;
        
        // Preparar la declaración SQL
        $stmt = $conn->prepare("
            INSERT INTO contribuyente (
                contribuyente_numRenta, contribuyente_dni, contribuyente_fechaAlta, contribuyente_vigencia, contribuyente_fechaInicio,
                contribuyente_nombre, contribuyente_apellido1, contribuyente_apellido2, contribuyente_telefono, contribuyente_movil,
                contribuyente_email, contribuyente_numCuenta, contribuyente_numRef, enviado)
            VALUES (
                ?, ?, ?, ?, ?,
                ?, ?, ?, ?, ?,
                ?, ?, ?, ?)"
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
        $stmt->bindParam(14, $_14);
        
        $stmt->execute();
        echo "- Contribuyente añadido correctamente<br>";
        

        /****************************
          INSERTO CONYUGE
        ****************************/
        try {
            // // Asignar valores a los parámetros y ejecutar
            $_1 = $idSiguiente;
            $_2 = $idSiguiente;
            $_3 = $fecha_alta;
            $_4 = $fecha_alta;
            $_5 = $fecha_alta;
            $_6 = "Lolipop - ".$fecha_alta;
            $_7 = "Apellido";
            $_8 = "ReApellido";
            $_9 = "962480111";
            $_10 = "666222444";
            $_11 = "garbancita.tadeo-jones@pequeña.com";
            $_12 = "1234567890";
            $_13 = "ES56 9999";
            $_14 = "REF #9999";
            $_15 = "22'80";
            $_16 = "Efectivo";
            $_17 = " - - ";
    
            // Preparar la declaración SQL
            $stmt = $conn->prepare("
                INSERT INTO conyuge (
                    conyuge_pareja_de, conyuge_dni, conyuge_fechaAlta, conyuge_vigencia, conyuge_fechaInicio,
                    conyuge_nombre, conyuge_apellido1, conyuge_apellido2, conyuge_telefono, conyuge_movil,
                    conyuge_email, conyuge_csv, conyuge_numCuenta, conyuge_numRef, conyuge_precio, conyuge_metodoPago, conyuge_observaciones)
                VALUES (
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?, ?, ?)"
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
            $stmt->bindParam(14, $_14);
            $stmt->bindParam(15, $_15);
            $stmt->bindParam(16, $_16);
            $stmt->bindParam(17, $_17);
            
            $stmt->execute();
            echo "- Conyuge añadido correctamente<br> ";
            
        } catch(PDOException $e) {
            echo "Contribuyente - Error Insertando: No existe la tabla<br>";
            echo "Error: " . $e->getMessage()."<br>";
        }
    
        
    } catch(PDOException $e) {
        echo "Contribuyente - Error Insertando: No existe la tabla<br>";
        echo "Error: " . $e->getMessage()."<br>";
    }

    $conn = null;
?>
