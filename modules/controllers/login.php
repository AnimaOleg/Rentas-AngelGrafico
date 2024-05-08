<?php
    include($_SERVER['DOCUMENT_ROOT'].'/2024/config.php');
    include_once MODULE_PATH . "models/mLogin.php";

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    // Crear una instancia del controlador
    $loginController = new LoginController();

    // Manejar las solicitudes del formulario
    if (isset($_POST['usuario']) && isset($_POST['contrasena']) )
    {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        // Verificar las credenciales
        $loginController->verificarLogin($usuario, $contrasena);

        // Cerrar la conexión a la base de datos
        $loginController->cerrarConexion();
    }

    class LoginController
    {
        private $model;

        public function __construct() {
            $this->model = new mLogin();// Crear una instancia del modelo
        }

        public function verificarLogin($usuario, $contrasena)
        {
            // Verificar credenciales utilizando el modelo
            $credencialesValidas = $this->model->verificarCredenciales($usuario, $contrasena);

            // Insertar registro de conexión si las credenciales son válidas
            if ($credencialesValidas)
            {
                // Activar conexiones, no existe la tabla. VER como detectar el navegador
                // $this->registrarConexion($usuario, $_SERVER['HTTP_USER_AGENT']);
                
                session_start();
                $_SESSION['usuario'] = $usuario;
                echo "Login: Sesión Iniciada";
            } else {
                echo "Login: Error, Usuario o contraseña incorrectos";
            }
        }

        public function registrarConexion($usuario, $navegador)
        {
            // Obtener el id del usuario
            $usuarioId = $this->obtenerIdUsuario($usuario);

            // Insertar registro en la tabla de conexiones
            $query = "INSERT INTO conexiones (usuario, sNavegador) VALUES ($usuarioId, '$navegador')";
            mysqli_query($this->model->conexion, $query);
        }

        public function obtenerIdUsuario($usuario)
        {
            // Obtener el id del usuario por su nombre de usuario
            $query = "SELECT id FROM usuarios WHERE usuario = '$usuario'";
            $resultado = mysqli_query($this->model->conexion, $query);

            if ($fila = mysqli_fetch_assoc($resultado)) {
                return $fila['id'];
            }

            return null;
        }

        public function cerrarConexion() {
            // Cerrar la conexión a la base de datos al finalizar
            $this->model->cerrarConexion();
        }
    }

?>
