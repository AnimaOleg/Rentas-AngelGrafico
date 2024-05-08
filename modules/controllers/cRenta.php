<?php
    include($_SERVER['DOCUMENT_ROOT'].'/2024/config.php');
    include_once MODULE_PATH."models/mTabla.php";
    include_once BASE_PATH."functions.php";
    // include_once MODULE_PATH."models/mCliente.php";
    // require "../dbconfig.php";
    // include_once DBCONFIG;

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    // Instancia del controlador
    $controlador = new ClienteController();

    // Solicitudes del formulario
    if (isset($_POST['funcion']) && !empty($_POST["funcion"]))
    {
        $funcion = $_POST['funcion'];
        
        // Variables Contribuyente
        $cont_numRenta=null;
        $cont_dni=null;
        $cont_vigencia=null;
        $cont_fechaInicio=null;
        $cont_nombre=null;
        $cont_apellido1=null;
        $cont_apellido2=null;
        $cont_telefono=null;
        $cont_movil=null;
        $cont_email=null;
        $cont_numRef=null;
        $cont_numCuenta=null;
        // Datos Contribuyente
        if(isset($_POST["cont_numRenta"])) $cont_numRenta = $_POST["cont_numRenta"];
        if(isset($_POST["cont_dni"])) $cont_dni = $_POST["cont_dni"];
        if(isset($_POST["cont_vigencia"])) $cont_vigencia = $_POST["cont_vigencia"];
        if(isset($_POST["cont_fechaInicio"])) $cont_fechaInicio = $_POST["cont_fechaInicio"];
        if(isset($_POST["cont_nombre"])) $cont_nombre = $_POST["cont_nombre"];
        if(isset($_POST["cont_apellido1"])) $cont_apellido1 = $_POST["cont_apellido1"];
        if(isset($_POST["cont_apellido2"])) $cont_apellido2 = $_POST["cont_apellido2"];
        if(isset($_POST["cont_telefono"])) $cont_telefono = $_POST["cont_telefono"];
        if(isset($_POST["cont_movil"])) $cont_movil = $_POST["cont_movil"];
        if(isset($_POST["cont_email"])) $cont_email = $_POST["cont_email"];
        if(isset($_POST["cont_numRef"])) $cont_numRef = $_POST["cont_numRef"];
        if(isset($_POST["cont_numCuenta"])) $cont_numCuenta = $_POST["cont_numCuenta"];

        // Variables Conyuge
        $cony_pareja_de=null;
        $cony_dni=null;
        $cony_vigencia=null;
        $cony_fechaInicio=null;
        $cony_nombre=null;
        $cony_apellido1=null;
        $cony_apellido2=null;
        $cony_telefono=null;
        $cony_movil=null;
        $cony_email=null;
        $cony_csv=null;
        $cony_numRef=null;
        $cony_numCuenta= null;
        $cony_precio=null;
        $cony_metodoPago=null;
        $cony_observaciones=null;
        // Datos Conyuge
        if(isset($_POST["cony_pareja_de"])) $cony_pareja_de = $_POST["cony_pareja_de"];
        if(isset($_POST["cony_dni"])) $cony_dni = $_POST["cony_dni"];
        if(isset($_POST["cony_vigencia"])) $cony_vigencia = $_POST["cony_vigencia"];
        if(isset($_POST["cony_fechaInicio"])) $cony_fechaInicio = $_POST["cony_fechaInicio"];
        if(isset($_POST["cony_nombre"])) $cony_nombre = $_POST["cony_nombre"];
        if(isset($_POST["cony_apellido1"])) $cony_apellido1 = $_POST["cony_apellido1"];
        if(isset($_POST["cony_apellido2"])) $cony_apellido2 = $_POST["cony_apellido2"];
        if(isset($_POST["cony_telefono"])) $cony_telefono = $_POST["cony_telefono"];
        if(isset($_POST["cony_movil"])) $cony_movil = $_POST["cony_movil"];
        if(isset($_POST["cony_email"])) $cony_email = $_POST["cony_email"];
        if(isset($_POST["cony_csv"])) $cony_csv = $_POST["cony_csv"];
        if(isset($_POST["cony_numRef"])) $cony_numRef = $_POST["cony_numRef"];
        if(isset($_POST["cony_numCuenta"])) $cony_numCuenta = $_POST["cony_numCuenta"];
        if(isset($_POST["cony_precio"])) $cony_precio = $_POST["cony_precio"];
        if(isset($_POST["cony_metodoPago"])) $cony_metodoPago = $_POST["cony_metodoPago"];
        // $cony_metodoPago = "ninguno";
        if(isset($_POST["cony_observaciones"])) $cony_observaciones = $_POST["cony_observaciones"];

        //En función del parámetro que nos llegue ejecutamos una función u otra
        switch($funcion) 
        {
            case 'btn_registro_buscar':
                $controlador->buscar($cont_numRenta, $cont_dni , $cony_dni);
                break;

            case 'btn_registro_insertar':
                // Contribuyente
                $controlador->insertar(
                    $cont_numRenta, $cont_dni, $cont_vigencia, $cont_fechaInicio, $cont_nombre,
                    $cont_apellido1, $cont_apellido2, $cont_telefono, $cont_movil, $cont_numRef, $cont_email,
                    $cont_numCuenta, $cony_dni, $cony_vigencia, $cony_fechaInicio, $cony_nombre,
                    $cony_apellido1, $cony_apellido2, $cony_telefono, $cony_movil, $cony_email,
                    $cony_csv, $cony_numRef, $cony_numCuenta, $cony_precio, $cony_metodoPago, $cony_observaciones
                                
                    );
                break;

            default: break;
        }

        // Cerrar la conexión a la base de datos
        $controlador->cerrarConexion();
    }


    class ClienteController
    {
        private $model;
        // private $pdo;
        private $conn;

        public function __construct() {
            try {
                $this->conn = new PDO('mysql:host=localhost; dbname=angelgra_2024', 'angelgra_2024', 'ZjRGB)c{OC8X');
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(Exception $e) {
                die($e->getMessage());
            }
            $this->model = new mTabla("usuarios"); // modelo con tabla
        }

        public function insertar(
            $cont_numRenta, $cont_dni, $cont_vigencia, $cont_fechaInicio, $cont_nombre,
            $cont_apellido1, $cont_apellido2, $cont_telefono, $cont_movil, $cont_numRef, $cont_email,
            $cont_numCuenta, $cony_dni, $cony_vigencia, $cony_fechaInicio, $cony_nombre,
            $cony_apellido1, $cony_apellido2, $cony_telefono, $cony_movil, $cony_email,
            $cony_csv, $cony_numRef, $cony_numCuenta, $cony_precio, $cony_metodoPago, $cony_observaciones
            )
        {
            $echo_resultado = "";
            // Fecha Actual
            date_default_timezone_set("Europe/Madrid");
            $fecha_alta = date('Y/m/d H:i:s H', time());
            
            // INSERCIÓN del Contribuyente
            if($cont_dni != null)
            {
                if($cont_numRenta != null)
                {
                    try 
                    {
                        // AÑADIR numRenta = id+1
                        // $cont_numCuenta = IgualarDniANumRenta();
                        
                        // Valores a los parámetros
                        $_1 = $cont_numRenta;
                        $_2 = $cont_dni;
                        $_3 = $fecha_alta;
                        if($cont_vigencia==null)
                            $_4 = null;
                        else
                            $_4 = $cont_vigencia;
                        $_5 = $cont_fechaInicio;
                        $_6 = $cont_nombre;
                        $_7 = $cont_apellido1;
                        $_8 = $cont_apellido2;
                        $_9 = $cont_telefono;
                        $_10 = $cont_movil;
                        $_11 = $cont_email;
                        $_12 = $cont_numRef;
                        $_13 = $cont_numCuenta;
                        $_14 = 0;
                
                        // Preparar la declaración SQL
                        $stmt = $this->conn->prepare("
                            INSERT INTO contribuyente (
                                contribuyente_numRenta, contribuyente_dni, contribuyente_fechaAlta, contribuyente_vigencia, contribuyente_fechaInicio,
                                contribuyente_nombre, contribuyente_apellido1, contribuyente_apellido2, contribuyente_telefono, contribuyente_movil,
                                contribuyente_email, contribuyente_numRef, contribuyente_numCuenta, enviado)
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
                        
                        $result_contribuyente = $stmt->execute();
                        if($result_contribuyente == 1){
                            $echo_resultado .= "Añadido:<br>";
                            $echo_resultado .= "Nº Renta: ".$cont_numRenta.",<br>";
                            $echo_resultado .= "Contribuyente DNI: ".$cont_dni;
                            // $echo_resultado .= "Vigencia: ".$cont_vigencia;
                        }


                        // INSERCIÓN del Conyuge
                        if($result_contribuyente==1)
                        {
                            if($cony_dni != null)
                            {
                                try 
                                {

                                    // Comprobar maximo ID para luego asignarle cont_numRenta = id
                                    $sql = $this->conn->prepare("select id from contribuyente where contribuyente_numRenta=$cont_numRenta");
                                    $sql->execute();
                                    // Resultado a Objeto asociativo        
                                    $sql->setFetchMode(PDO::FETCH_ASSOC);
                                    $cuenta = $sql->rowCount();
                                    
                                    // Existe el Contribuyente
                                    if($cuenta == 1)
                                    {
                                        foreach($sql->fetchAll() as $k=>$v)
                                            $contribuyente_id = $v['id'];

                                        // Valores a los parámetros
                                        // $_1 = $idPareja;
                                        $_1 = $contribuyente_id;
                                        $_2 = $cony_dni;
                                        $_3 = $fecha_alta;
                                        if($cony_vigencia==null)
                                            $_4 = null;
                                        else
                                            $_4 = $cony_vigencia;
                                        $_5 = $cony_fechaInicio;
                                        $_6 = $cony_nombre;
                                        $_7 = $cony_apellido1;
                                        $_8 = $cony_apellido2;
                                        $_9 = $cony_telefono;
                                        $_10 = $cony_movil;
                                        $_11 = $cony_email;
                                        $_12 = $cony_csv;
                                        $_13 = $cony_numRef;
                                        $_14 = $cony_numCuenta;
                                        $_15 = $cony_precio;
                                        $_16 = $cony_metodoPago;
                                        $_17 = $cony_observaciones;

                                        // Preparar la declaración SQL
                                        $stmt = $this->conn->prepare("
                                        INSERT INTO conyuge (
                                            conyuge_pareja_de, conyuge_dni, conyuge_fechaAlta, conyuge_vigencia, conyuge_fechaInicio,
                                            conyuge_nombre, conyuge_apellido1, conyuge_apellido2, conyuge_telefono, conyuge_movil,
                                            conyuge_email, conyuge_csv, conyuge_numRef, conyuge_numCuenta, conyuge_precio, conyuge_metodoPago, conyuge_observaciones)
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
                                        
                                        $result_conyuge = $stmt->execute();
                                        if($result_conyuge == 1)
                                            $echo_resultado .= ",<br>Conyuge DNI: ".$cony_dni;
                                            // echo ", Conyuge Añadido";
                                    }
                                } catch(PDOException $e) {
                                    // echo "Contribuyente Error: " . $e->getMessage();
                                    $echo_resultado .= "ERROR Conyuge:<br>Más información:<br>" . $e->getMessage();
                                }




                            }else{
                                $echo_resultado .= "<br>Sin el 'DNI' del Conyuge, no se inserta Conyuge";
                            }
                        }
                    } catch(PDOException $e) {
                        $echo_resultado .= "ERROR: Alomejor ya existe ese 'Nº Renta' del Contribuyente.";
                        // $echo_resultado .= "<br>Más información:<br>".$e->getMessage();
                    }
                }else{
                    $echo_resultado .= "Rellena el 'Nº Renta' del Contribuyente";
                }
            }else{
                $echo_resultado .= "Rellena el 'DNI' del Contribuyente";
            }

            echo json_encode($echo_resultado);
        }


        // public function IgualarDniANumRenta()
        // {
        //     // Comprobar maximo ID para luego asignarle cont_numRenta = id
        //     $sql = $this->conn->prepare("select max(contribuyente_numRenta) as max_numRenta from contribuyente");
        //     $sql->execute();
        //     // Resultado a Objeto asociativo        
        //     $sql->setFetchMode(PDO::FETCH_ASSOC);
        //     $cuenta = $sql->rowCount(); // echo "Total: ".$cuenta;
            
        //     // Cantidad de registros devueltos
        //     if($cuenta == 1){
        //         foreach($sql->fetchAll() as $k=>$v) { // Array Asociativo

        //             // Siguiente cont_numRenta = id+1 del anterior - Es decir, cont_numRenta = id
        //             if($v['max_numRenta'] == null)
        //                 $cont_numRenta = 1; // echo "maxid = null";
        //             else
        //                 $cont_numRenta = $v['max_numRenta']+1;
        //         }
        //     }
        //     return $cont_numRenta;
        // }


        public function buscar($cont_numRenta=null, $cont_dni=null, $cony_dni=null)
        {
            $sql = "SELECT * FROM contribuyente as cont LEFT JOIN conyuge as cony ON cont.id = cony.conyuge_pareja_de";
            
            // Nº Renta - Contribuyente
            if($cont_numRenta != null)
            {
                $sql .= " WHERE cont.contribuyente_numRenta=".$cont_numRenta;
                
                // DNI - Contribuyente
                // if($cont_dni != null) 
                //     $sql .= " AND cont.contribuyente_dni=".$cont_dni;
                // else $echo_resultado = "cont_dni NULL";
                
                try
                {
                    //Preparar la sentencia SQL para seleccionar todos los datos
                    $stmt = $this->conn->prepare($sql); // from $tabla
                    $stmt->execute();
                    $count = $stmt->rowCount();
                    // Fetches the remaining rows from a result set
                    $data = $stmt->fetch(PDO::FETCH_ASSOC); // $data = $stmt->fetchAll(); // Sale Array(Array)


                    
                    if($count == 0){
                        $echo_resultado = "No existe: Nº Renta: ".$cont_numRenta;
                    }else if($count == null){
                        $echo_resultado = "No hay registros con esa busqueda";
                    }else if($count == 1)
                    {
                        // Formateo de Fechas
                        // https://www.javatpoint.com/how-to-change-date-format-in-php
                        if($data["contribuyente_vigencia"] != null)
                            $data["contribuyente_vigencia"] = date("Y-m-d", strtotime($data["contribuyente_vigencia"]));
                        $data["contribuyente_fechaInicio"] = date("Y-m-d", strtotime($data["contribuyente_fechaInicio"]));
                        if($data["conyuge_vigencia"] != null)
                            $data["conyuge_vigencia"] = date("Y-m-d", strtotime($data["conyuge_vigencia"]));
                        if($data["conyuge_fechaInicio"] != null)
                            $data["conyuge_fechaInicio"] = date("Y-m-d", strtotime($data["conyuge_fechaInicio"]));

                        $echo_resultado = $data;
                    }else
                        $echo_resultado = "Buscar-1 MAL";
                    

                } catch(PDOException $e) {
                    $echo_resultado = "ERROR BUSCANDO:<br>" . $e->getMessage();
                }

            }

            // DNI - Contribuyente
            else if($cont_dni != null)
            {
                $sql .= " WHERE cont.contribuyente_dni=".$cont_dni;
                try
                {
                    //Preparar la sentencia SQL para seleccionar todos los datos
                    $stmt = $this->conn->prepare($sql); // from $tabla
                    $stmt->execute();
                    $count = $stmt->rowCount();
                    // Fetches the remaining rows from a result set
                    $data = $stmt->fetch(PDO::FETCH_ASSOC); // $data = $stmt->fetchAll(); // Sale Array(Array)

                    
                    if($count == 0)
                        $echo_resultado = "No existe: DNI Contribuyente: ".$cont_dni;
                    else if($count == null)
                        $echo_resultado = "No hay registros con esa busqueda";
                    else if($count == 1)
                    {
                        // Formateo de Fechas
                        if($data["contribuyente_vigencia"] != null)
                            $data["contribuyente_vigencia"] = date("Y-m-d", strtotime($data["contribuyente_vigencia"]));
                        $data["contribuyente_fechaInicio"] = date("Y-m-d", strtotime($data["contribuyente_fechaInicio"]));
                        if($data["conyuge_vigencia"] != null)
                            $data["conyuge_vigencia"] = date("Y-m-d", strtotime($data["conyuge_vigencia"]));
                        if($data["conyuge_fechaInicio"] != null)
                            $data["conyuge_fechaInicio"] = date("Y-m-d", strtotime($data["conyuge_fechaInicio"]));

                        $echo_resultado = $data;
                    }
                    else
                        $echo_resultado = "Buscar-2 MAL";
                    

                } catch(PDOException $e) {
                    $echo_resultado = "ERROR BUSCANDO:<br>" . $e->getMessage();
                }

            }
            
            // DNI - Conyuge
            else if($cony_dni != null)
            {
                $sql .= " WHERE cony.conyuge_dni=".$cony_dni;
                try
                {
                    //Preparar la sentencia SQL para seleccionar todos los datos
                    $stmt = $this->conn->prepare($sql); // from $tabla
                    $stmt->execute();
                    $count = $stmt->rowCount();
                    // Fetches the remaining rows from a result set
                    $data = $stmt->fetch(PDO::FETCH_ASSOC); // $data = $stmt->fetchAll(); // Sale Array(Array)

                    if($count == 0)
                        $echo_resultado = "No existe: DNI Conyuge: ".$cony_dni;
                    else if($count == null)
                        $echo_resultado = "No hay registros con esa busqueda";
                    else if($count == 1)
                    {
                        // Formateo de Fechas
                        
                        if($data["contribuyente_vigencia"] != null)
                            $data["contribuyente_vigencia"] = date("Y-m-d", strtotime($data["contribuyente_vigencia"]));
                        $data["contribuyente_fechaInicio"] = date("Y-m-d", strtotime($data["contribuyente_fechaInicio"]));
                        if($data["conyuge_vigencia"] != null)
                            $data["conyuge_vigencia"] = date("Y-m-d", strtotime($data["conyuge_vigencia"]));
                        if($data["conyuge_fechaInicio"] != null)
                            $data["conyuge_fechaInicio"] = date("Y-m-d", strtotime($data["conyuge_fechaInicio"]));

                        $echo_resultado = $data;
                    }else
                        $echo_resultado = "Buscar-3 MAL";
                    
                } catch(PDOException $e) {
                    $echo_resultado = "ERROR BUSCANDO:<br>" . $e->getMessage();
                }

            }else{
                $echo_resultado = "Rellena Nº Renta / Contribuyente-DNI / Conyugue-DNI";
            }
            
            $this->conn = null;
            echo json_encode($echo_resultado);
        }
        

        public function cerrarConexion() {
            // Cerrar la conexión a la base de datos al finalizar
            $this->model->cerrarConexion();
        }

    }
?>
