<?php
include($_SERVER['DOCUMENT_ROOT'].'/2024/config.php');
include_once MODULE_PATH . "login/models/mLogin.php";
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
class LoginController {
    private $model;

    public function __construct() {
        // Crear una instancia del modelo
        $this->model = new mLogin();
    }

    public function verificarLogin($usuario, $contrasena) {
        // Verificar credenciales utilizando el modelo
        $credencialesValidas = $this->model->verificarCredenciales($usuario, $contrasena);

        // Insertar registro de conexión si las credenciales son válidas
        if ($credencialesValidas) {
            $this->registrarConexion($usuario, $_SERVER['HTTP_USER_AGENT']);
            echo "Inicio de sesión exitoso";
        } else {
            echo "Error: Usuario o contraseña incorrectos";
        }
    }

    public function registrarConexion($usuario, $navegador) {
        // Obtener el id del usuario
        $usuarioId = $this->obtenerIdUsuario($usuario);

        // Insertar registro en la tabla de conexiones
        $query = "INSERT INTO conexiones (nIdUsuario, sNavegador) VALUES ($usuarioId, '$navegador')";
        mysqli_query($this->model->conexion, $query);
    }

    public function obtenerIdUsuario($usuario) {
        // Obtener el id del usuario por su nombre de usuario
        $query = "SELECT id FROM usuarios WHERE nIdUsuario = '$usuario'";
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

// Crear una instancia del controlador
$loginController = new LoginController();

// Manejar las solicitudes del formulario
if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Verificar las credenciales
    $loginController->verificarLogin($usuario, $contrasena);

    // Cerrar la conexión a la base de datos
    $loginController->cerrarConexion();
}
?>
