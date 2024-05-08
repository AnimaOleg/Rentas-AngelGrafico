<?php
    // http://localhost/2024/modules/tablas/tabla_contribuyente_crear.php
    include 'dbconfig.php';

    try {
        // Crear la conexión
        // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Crear la sentencia SQL para crear la tabla
            // $sql = "CREATE TABLE IF NOT EXISTS Contribuyente (
            //     id int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
            //     contribuyente_numRenta int(6) UNSIGNED UNIQUE,
            //     contribuyente_dni varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            //     contribuyente_fechaAlta timestamp,
            //     contribuyente_vigencia timestamp,
            //     contribuyente_fechaInicio timestamp,
            //     contribuyente_nombre varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     contribuyente_apellido1 varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     contribuyente_apellido2 varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     contribuyente_telefono int(9),
            //     contribuyente_movil int(9),
            //     contribuyente_email varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     contribuyente_numCuenta varchar(28),
            //     contribuyente_numRef varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     PRIMARY KEY (id)
            // ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

            $sql = "CREATE TABLE IF NOT EXISTS Contribuyente (
                id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
                contribuyente_numRenta int(6) UNSIGNED UNIQUE,
                contribuyente_dni varchar(9) NOT NULL,
                contribuyente_fechaAlta datetime,
                contribuyente_vigencia datetime,
                contribuyente_fechaInicio datetime,
                contribuyente_nombre varchar(30),
                contribuyente_apellido1 varchar(30),
                contribuyente_apellido2 varchar(30),
                contribuyente_telefono int(9),
                contribuyente_movil int(9),
                contribuyente_email varchar(255) ,
                contribuyente_numCuenta varchar(28),
                contribuyente_numRef varchar(30),
                enviado TINYINT,
                envioFecha datetime
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT";
            
            $conn->exec($sql);
            echo "Tabla Contribuyente creada correctamente o ya existia";

    } catch(PDOException $e) {
        echo "Error Creando Tabla Contribuyente: No existe la Base de Datos o el Usuario<br/>";
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
?>
