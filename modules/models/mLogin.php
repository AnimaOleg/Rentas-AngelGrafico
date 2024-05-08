<?php
    include_once BASE_PATH . "/Model.php";

    class mLogin extends Model
    {
        private $conn;
        public $tabla;

        public function __construct($tabla = "usuarios")
        {

            $model = new Model();
            $this->conn = $model->conexion;
            // try {
            //     $this->conn = new PDO('mysql:host=localhost; dbname=angelgra_2024', 'angelgra_2024', 'ZjRGB)c{OC8X');
            //     $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // } catch(Exception $e) {
            //     die($e->getMessage());
            // }
            

            parent::__construct(); // Llama al constructor de la clase padre (Model)
            $this->tabla = $tabla;
        }

        public function verificarCredenciales($usuario, $contrasena)
        {
            $usuario = mysqli_real_escape_string($this->conexion, $usuario);
            $contrasena = mysqli_real_escape_string($this->conexion, $contrasena);
            
            $queryusuario = mysqli_query($this->conn, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
            $nr 		= mysqli_num_rows($queryusuario);
            $mostrar	= mysqli_fetch_array($queryusuario);

            if (($nr == 1) && (password_verify($contrasena, $mostrar['contrasena'])) )
            {
                $condiciones = array(
                    'usuario' => $usuario,
                    // 'contrasena' => $contrasena
                    'contrasena' => $mostrar['contrasena']
                );

                return $this->existeRegistro($condiciones);
            }
            else
                return 0;

        }

        public function cerrarConexion() {
            parent::cerrarConexion();
        }
    }
?>