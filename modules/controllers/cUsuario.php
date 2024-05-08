<?php
    include($_SERVER['DOCUMENT_ROOT'].'/2024/config.php');
    include_once MODULE_PATH . "models/mTabla.php";
    // require "../dbconfig.php"; // include_once DBCONFIG;

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    // Instancia del controlador
    $controlador = new UserController();

    // Solicitudes del formulario
    if (isset($_GET['funcion']) && !empty($_GET["funcion"]))
    {
        $funcion = $_GET['funcion'];

        //En función del parámetro que nos llegue ejecutamos una función u otra
        switch($funcion) {
            case 'btn_tabla_usuarios_mostrar': 
                $controlador -> tabla_usuarios_mostrar();
                break;
            case 'btn_tabla_usuarios_crear': 
                $controlador -> tabla_usuarios_crear();
                break;
            case 'btn_tabla_usuarios_vaciar': 
                $controlador -> tabla_usuarios_vaciar();
                break;
            case 'btn_tabla_usuarios_borrar': 
                $controlador -> tabla_usuarios_borrar();
                break;
            case 'btn_tabla_usuarios_insertar': 
                $controlador -> tabla_usuarios_insertar();
                break;
            default: break;
        }
        
        // Cerrar la conexión a la base de datos
        $controlador->cerrarConexion();
    }


    class UserController
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

        public function tabla_usuarios_mostrar()
        {
            try {
                // Preparar la sentencia SQL para seleccionar todos los datos
                $stmt = $this->conn->prepare("SELECT * FROM usuarios"); // from $tabla
                $this->conn->exec("set names utf8"); // utf8mb3_general_mysql500_ci
                $stmt->execute();
        
                // Establecer el modo de resultado a objeto para que pueda ser leído más fácilmente
                // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                
                // Comenzar la tabla HTML
                $echo = "<table border='1'>";
                $echo .= "<tr style='font-size:14px;'>";
                $echo .= "<th>ID</th>";
                $echo .= "<th>Usuario</th>";
                $echo .= "<th>Contraseña</th>";
                $echo .= "<th>Fecha Creación</th>";
                // $echo .= "<th>Fecha Actualización</th>";
                $echo .= "</tr>";
        
                // Recorrer los resultados y añadirlos a la tabla HTML
                foreach($stmt->fetchAll() as $k=>$v) {
                    $echo .= "<tr style='font-size:11px;'>";
                    $echo .= "<td>" . $v['id'] . "</td>";
                    $echo .= "<td>" . $v['usuario'] . "</td>";
                    $echo .= "<td>" . $v['contrasena'] . "</td>";
                    $echo .= "<td>" . $v['fechaRegistro'] . "</td>";
                    // $echo .= "<td>" . $v['fechaActualizacion'] . "</td>";
                    $echo .= "</tr>";
                }
                $echo .= "</table>";
                echo $echo;

            } catch(PDOException $e) {
                echo "Error Mostrando<br/>";
                echo "Error: " . $e->getMessage();
            }
        }

        public function tabla_usuarios_crear()
        {
            try
            {
                $query = "CREATE TABLE IF NOT EXISTS Usuarios (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    usuario VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL UNIQUE,
                    contrasena VARCHAR(255) NOT NULL,
                    fechaRegistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    fechaActualizacion TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

                // Preparar la sentencia SQL para seleccionar todos los datos
                $stmt = $this->conn->prepare($query);
                $result = $stmt->execute();

                if ($result)
                    echo "Tabla Creada o ya existia";
                else
                    echo "Error Creando: No existe Base de Datos o Usuario o falta de permisos";

            } catch(PDOException $e) {
                echo "Error Creando<br/>";
                echo "Error: " . $e->getMessage();
            }
        }
        
        public function tabla_usuarios_vaciar()
        {
            $query = "TRUNCATE TABLE usuarios";
            $resultado = mysqli_query($this->model->conexion, $query);

            if ($resultado)
                echo "Tabla Vaciada correctamente";
            else
                echo "Error Borrando: No existe la tabla";
            $this->conn = null;
        }

        public function tabla_usuarios_borrar()
        {
            $query = "DROP TABLE usuarios";
            $resultado = mysqli_query($this->model->conexion, $query);

            if ($resultado)
                echo "Tabla Borrada correctamente";
            else
                echo "Error Borrando: No existe la tabla";
        }

        public function tabla_usuarios_insertar()
        {
            try {
                // Asignar valores a los parámetros y ejecutar
                $usuario = 'a';
                $contrasena = "a";
                $pass_fuerte = password_hash($contrasena, PASSWORD_BCRYPT);

                // Preparar la declaración SQL
                $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)"; // $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES (:usuario, :contrasena)";
                $query = $this->conn->prepare($sql);

                // Vincular los parámetros
                $query->bindParam(1, $usuario); // $query->bindParam(':usuario', $usuario);
                $query->bindParam(2, $pass_fuerte); // $query->bindParam(':contrasena', $contrasena);
                $query->execute();
                echo "Registro añadido correctamente";

            } catch(PDOException $e) {
                echo "Error Insertando<br/>";
                echo "Error: " . $e->getMessage();
            }
        }

        public function cerrarConexion() {
            // Cerrar la conexión a la base de datos al finalizar
            $this->model->cerrarConexion();
        }

    }
?>
