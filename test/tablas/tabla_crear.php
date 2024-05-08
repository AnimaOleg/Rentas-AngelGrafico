<?php
    include 'dbconfig.php';

    try {
        // Crear la conexión
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // Verificar si la tabla existe
        $sql_exists = "SHOW TABLES LIKE 'nombre_de_tu_tabla'";
        $stmt = $conn->prepare($sql_exists);
        $stmt->execute();
        $tabla_existe = $stmt->rowCount() > 0;

        if ($tabla_existe) {
            echo "❌ Tabla ya existe <button id='deleteTable'>Borrar y recrear tabla</button>";
        }else{
            // Crear la sentencia SQL para crear la tabla
            $sql = "CREATE TABLE IF NOT EXISTS nombre_de_tu_tabla (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                columna1 VARCHAR(30) NOT NULL,
                columna2 INT(10) NOT NULL,
                columna3 TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            $conn->exec($sql);
            echo "✅ Tabla Creada correctamente";
        }

    } catch(PDOException $e) {
        echo "❌ Error Creando: No existe la Base de Datos o el Usuario<br/>";
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Manejar clic en el bot��n
    const deleteButton = document.getElementById('deleteTable');
    if (deleteButton) {
        deleteButton.addEventListener('click', function() {
            if (confirm('⚠️ 7Est��s seguro de que quieres borrar y recrear la tabla?')) {
                // Realizar una solicitud para eliminar y recrear la tabla
                fetch('tabla_borrar.php')
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    // Recargar la p��gina para ver los cambios
                    //location.reload();
                })
                .catch(error => console.error('Error:', error));
            }
        });
    }
});
</script>

