<?php
    // http://localhost/2024/modules/tablas/tabla_conyugue_crear.php
    include 'dbconfig.php';

    try {
        // Crear la conexión
        // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Crear la sentencia SQL para crear la tabla
            // $sql = "CREATE TABLE IF NOT EXISTS conyuge (
            //     id int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
            //     -- conyuge_pareja_de int(6) NOT NULL ON DELETE CASCADE,
            //     conyuge_pareja_de int(6) UNSIGNED NOT NULL,
            //     conyuge_dni varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
            //     conyuge_fechaAlta datetime,
            //     conyuge_vigencia datetime,
            //     conyuge_fechaInicio datetime,
            //     conyuge_nombre varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     conyuge_apellido1 varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     conyuge_apellido2 varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     conyuge_telefono int(9),
            //     conyuge_movil int(9),
            //     conyuge_email varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     conyuge_csv varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     conyuge_numCuenta varchar(28) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     conyuge_numRef varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     conyuge_precio float(10, 2),
            //     conyuge_metodoPago varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     conyuge_observaciones varchar(250) CHARACTER SET utf8 COLLATE utf8_spanish_ci,
            //     PRIMARY KEY (id)
            // ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

            // FOREIGN KEY (conyuge_pareja_de) REFERENCES Conyuge(id) ON DELETE CASCADE
            // Esto no funciona con InnoDB
            // CONSTRAINT FK_Conyugue_pareja_de FOREIGN KEY (conyuge_pareja_de) REFERENCES Contribuyente(id) ON DELETE CASCADE


            $sql = "CREATE TABLE IF NOT EXISTS conyuge (
                id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
                -- conyuge_pareja_de int(6) NOT NULL ON DELETE CASCADE,
                conyuge_pareja_de int(6) UNSIGNED NOT NULL,
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
            echo "<br>- Añadida Clave Ajena";

    } catch(PDOException $e) {
        echo "Error Creando Tabla Conyugue: No existe la Base de Datos o el Usuario<br/>";
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
?>
