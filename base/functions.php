<?php
    function destruir_session()
    {
        // Initialize the session.
        // If you are using session_name("something"), don't forget it now!
        session_start();

        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
    }

    function mostrar_post(){
        echo "POST:<br>";
        foreach ($_POST as $key => $value) {
            echo "<tr>";
            echo "<td>";
            echo $key;
            echo "</td>";
            echo "<td>";
            echo $value;
            echo "</td>";
            echo "</tr>";
        } echo "<br>";
    }

    function mostrar()
    {
        // try {
        //     // Preparar la sentencia SQL para seleccionar todos los datos
        //     $stmt = $this->conn->prepare("SELECT * FROM contribuyente order by numRenta"); // from $tabla
        //     $stmt->execute();

        //     // Establecer el modo de resultado a objeto para que pueda ser leído más fácilmente
        //     $stmt->setFetchMode(PDO::FETCH_ASSOC);

        //     // Recorrer los resultados y añadirlos al body del html
        //     if ($data = $stmt->fetch()) {
        //         do {
        //             ?>
        //             <tr>
        //                 echo $data["numRenta"];
        //                 echo $data["dni"];
        //                 echo $data["vigencia"];
        //                 echo $data["fechaInicio"];
        //                 echo $data["nombre"].' '.$data["apellido1"].' '.$data["apellido1"];
        //                 echo $data["telefono"];
        //                 echo $data["movil"];
        //                 echo $data["email"];
        //                 echo $data["numCuenta"];
        //                 <td style="margin: auto;"><i class="bi bi-pencil-fill" ></i></td>
        //             </tr>
        //         <?php
        //         } while ($data = $stmt->fetch());
        //     } else {
        //         echo 'No hay datos';
        //     }

        // } catch(PDOException $e) {
        //     echo "Error Mostrando<br/>";
        //     echo "Error: " . $e->getMessage();
        // }
        // $this->conn = null;
    }


    function mostrarIP($condicion){
        if($condicion){
            // https://www.eslomas.com/2005/04/obtencion-ip-real-php/comment-page-2/
            $ip_list_array  = array( "45.149.183.138", "127.0.0.1", "::1", );
            if(in_array($_SERVER['REMOTE_ADDR'], $ip_list_array))
            {
                print "Tu dirección IP es: ".$_SERVER['REMOTE_ADDR'];
            }
            else 
                echo "mi IP NO en array";
        }
    }