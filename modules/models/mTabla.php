<?php
    include_once BASE_PATH . "/Model.php";

    class mTabla extends Model
    {
        public $tabla;

        public function __construct($tabla = "usuarios")
        {
            parent::__construct(); // Llama al constructor de la clase padre (Model)
            $this->tabla = $tabla;
        }

        // public function verificarCredenciales($usuario, $contrasena)
        // {
        //     $usuario = mysqli_real_escape_string($this->conexion, $usuario);
        //     $contrasena = mysqli_real_escape_string($this->conexion, $contrasena);

        //     $condiciones = array(
        //         'usuario' => $usuario,
        //         'contrasena' => $contrasena
        //     );

        //     return $this->existeRegistro($condiciones);
        // }

        public function cerrarConexion() {
            parent::cerrarConexion();
        }
    }
?>