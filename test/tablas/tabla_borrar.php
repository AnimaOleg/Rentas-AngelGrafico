<?php
//     include 'dbconfig.php';

//     try {
//         // Crear la conexi贸n
//         $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
//         $sql = "DROP TABLE nombre_de_tu_tabla";
//         $conn->exec($sql);
//         echo "Tabla Borrada correctamente";

//     } catch(PDOException $e) {
//         // echo $sql . "<br>" . $e->getMessage();
//         echo "Error Borrando: No existe la tabla";
//     }

//     $conn = null;
?>
<?php
include 'dbconfig.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Verificar si la tabla existe
    $sql_exists = "SHOW TABLES LIKE 'nombre_de_tu_tabla'";
    $stmt = $conn->prepare($sql_exists);
    $stmt->execute();
    $tabla_existe = $stmt->rowCount() > 0;

    if ($tabla_existe) {
        // Eliminar la tabla si existe
        $sql_delete = "DROP TABLE IF EXISTS nombre_de_tu_tabla";
        $conn->exec($sql_delete);
    
        // Recrear la tabla
        // $sql_create = "CREATE TABLE nombre_de_tu_tabla (
        //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //     columna1 VARCHAR(30) NOT NULL,
        //     columna2 INT(10) NOT NULL,
        //     columna3 TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        // )";
        // $conn->exec($sql_create);
    
        echo "✅ La tabla ha sido borrada correctamente.";
    }else{
        echo "❌ la tabla no existe.";
    }

    
} catch(PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}

$conn = null;
?>
