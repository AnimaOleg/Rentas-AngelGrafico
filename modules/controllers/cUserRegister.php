<?php
    include($_SERVER['DOCUMENT_ROOT'].'/2024/config.php');
    include_once MODULE_PATH . "models/mUserRegister.php";

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    // Instancia del controlador
    $controlador = new UserRegisterController();

    // Solicitudes del formulario
    if (isset($_POST['usuario']) && !empty($_POST["usuario"]) && isset($_POST['contrasena']) && !empty($_POST["contrasena"]) )
    {
        // $funcion = $_POST['funcion'];

        //En función del parámetro que nos llegue ejecutamos una función u otra
        // switch($funcion) {
        //     case 'btnRegister': 
        //         $controlador -> registrarUsuario($_POST["usuario"], $_POST["contrasena"]);
        //         break;
        //     default: break;
        // }
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        
        // Registrar usuario
        $controlador->registrarUsuario($usuario, $contrasena);
        
        // Cerrar la conexión a la base de datos
        $controlador->cerrarConexion();

        // Redirección - No Funciona
        // header('Location: ../../index.php');
        // die();
    }
    else{
        echo "Rellena Usuario y Contraseña";
        // header('Location: https://www.google.es/');
        // die();
    }


    class UserRegisterController
    {
        private $model;
        private $conn;

        public function __construct() {
            // Crear una instancia del modelo
            $this->model = new mUserRegister("usuarios");
            
            try {
                $this->conn = new PDO('mysql:host=localhost; dbname=angelgra_2024', 'angelgra_2024', 'ZjRGB)c{OC8X');
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function registrarUsuario($usuario, $contrasena)
        {
            try {
                // Preparar la declaración SQL
                $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)"; // $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES (:usuario, :contrasena)";
                $query = $this->conn->prepare($sql);

                // Contraseña encriptada
                // $contrasena_enc = password_hash($contrasena, PASSWORD_DEFAULT);
                $pass_fuerte = password_hash($contrasena, PASSWORD_BCRYPT);

                // Vincular los parámetros
                $query->bindParam(1, $usuario); // $query->bindParam(':usuario', $usuario);
                // $query->bindParam(2, $contrasena); // $query->bindParam(':contrasena', $contrasena);
                $query->bindParam(2, $pass_fuerte); // $query->bindParam(':contrasena', $contrasena);
                $query->execute();
                
                // Sesion Creada
                session_start();
                $_SESSION['usuario'] = $usuario;

                // echo $_SESSION['usuario'] ." Registrado Correctamente";
                echo "Registrado Correctamente";
                
            } catch(PDOException $e) {
                echo "Error Registro: ". $e->getMessage();
            }
            // $this->conn = null;
        }

        public function cerrarConexion() {
            // Cerrar la conexión a la base de datos al finalizar
            $this->model->cerrarConexion();
        }
    }

?>
