<?php
class Model {
    public $conexion;
    public $tabla;

    public function __construct($tabla = null) {
        // Configuración de la base de datos
        $host = "localhost";
        $usuario_bd = "angelgra_2024";
        $contrasena_bd = "ZjRGB)c{OC8X";
        $nombre_bd = "angelgra_2024";

        $this->conexion = new mysqli($host, $usuario_bd, $contrasena_bd, $nombre_bd);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

        $this->tabla = $tabla;
        echo $this->tabla;
    }

    
    public function cerrarConexion() {
        if ($this->conexion) {
            $this->conexion->close();
        }
    }

    public function insertar($datos) {
        if (empty($this->tabla)) {
            die("Error: La tabla no está especificada.");
        }

        // Implementa la lógica para insertar en la tabla
    }

    public function actualizar($datos, $condicion) {
        if (empty($this->tabla)) {
            die("Error: La tabla no está especificada.");
        }

        // Implementa la lógica para actualizar en la tabla
    }

    public function eliminar($condicion) {
        if (empty($this->tabla)) {
            die("Error: La tabla no está especificada.");
        }

        // Implementa la lógica para eliminar en la tabla
    }

    public function existeRegistro($condiciones) {
    
        if (empty($this->tabla)) {
            die("Error: La tabla no está especificada.");
        }

        if (!is_array($condiciones)) {
            die("Las condiciones deben ser un array asociativo.");
        }

        $condicionesSQL = array_map(
            function ($campo, $valor) {
                return "$campo = '$valor'";
            },
            array_keys($condiciones),
            array_values($condiciones)
        );

        $condicionesSQL = implode(" AND ", $condicionesSQL);

        $query = "SELECT COUNT(*) as count FROM angelgra_2024.$this->tabla WHERE $condicionesSQL";
       
       
        echo  $this->conexion;
        $resultado = $this->conexion->query($query);
        echo $resultado;
        if ($resultado) {
            $fila = $resultado->fetch_assoc();
            $cantidad = $fila['count'];

            return $cantidad > 0; // Devuelve true si existe al menos un registro
        } else {
            die("Error en la consulta: " . $this->conexion->error);
        }
    }
}
?>
