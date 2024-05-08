<?php
    // http://localhost/2024/modules/tablas/renta_crear.php
    include 'dbconfig.php';

    try {
        // Crear la conexión
        // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /* Creacion CONTRIBUYENTE */
        $sql = "CREATE TABLE IF NOT EXISTS contribuyente (
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
        echo "- Tabla Contribuyente creada correctamente o ya existia<br>";

        /* CREACION CONYUGE*/
        try
        {
            $sql = "CREATE TABLE IF NOT EXISTS conyuge (
                id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
                conyuge_pareja_de TINYINT UNSIGNED NOT NULL,
                conyuge_dni varchar(9) NOT NULL,
                conyuge_fechaAlta datetime,
                conyuge_vigencia datetime,
                conyuge_fechaInicio datetime,
                conyuge_nombre varchar(30),
                conyuge_apellido1 varchar(30),
                conyuge_apellido2 varchar(30),
                conyuge_telefono int(9),
                conyuge_movil int(9) DEFAULT NULL,
                conyuge_email varchar(255),
                conyuge_csv varchar(250),
                conyuge_numCuenta varchar(28),
                conyuge_numRef varchar(30),
                conyuge_precio float(10, 2) DEFAULT NULL,
                conyuge_metodoPago varchar(50),
                conyuge_observaciones text,
                PRIMARY KEY (id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;";

            $conn->exec($sql);
            echo "- Tabla Conyugue creada correctamente o ya existia<br>";
            
            // Clave Ajena
            $sql_alter = "ALTER TABLE conyuge ADD CONSTRAINT FK_Conyugue_conyuge_pareja_de FOREIGN KEY (conyuge_pareja_de) REFERENCES contribuyente(id) ON UPDATE CASCADE ON DELETE CASCADE;";
            $conn->exec($sql_alter);
            echo "<br>- Conyuge: Añadida Clave Ajena";

        } catch(PDOException $e) {
            echo "Error Creando Tabla Conyugue: No existe la Base de Datos o el Usuario<br/>";
            echo "Error: " . $e->getMessage()."<br>";
        }

    } catch(PDOException $e) {
        echo "Error Creando Tabla Contribuyente: No existe la Base de Datos o el Usuario<br/>";
        echo "Error: " . $e->getMessage()."<br>";
    }

    $conn = null;