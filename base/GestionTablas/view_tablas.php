<?php
    include('../../config.php');
    session_start();
?>

<!-- Puedes personalizar la vista según tus necesidades -->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Otras Funcionalidades</title>
        <!-- Enlaces -locales- a Bootstrap y jQuery -->
        <link href="res/libs/initial_stable/bootstrap-4.3.1/bootstrap.min.css" rel="stylesheet">
        <script src="res/libs/initial_stable/jquery-3.3.1/jquery-3.3.1.min.js"></script>
        <script src="res/libs/initial_stable/popper-1.14.7/popper.min.js"></script>
        <script src="res/libs/initial_stable/bootstrap-4.3.1/bootstrap.min.js"></script>
        <!-- Estilo personalizado -->
        <link href="res/libs/styles/style.css" rel="stylesheet" type="text/css" />
        <!-- Scripts personalizado -->
        <script src="res/otros/usuarios/tabla_usuarios.js"></script>
        <script src="test/tablas/scripts/test_tabla.js"></script>
    </head>

    <body>
        <button type="button" class="btn btn-warning" name="cerrarGestionDeTablas" value="cerrarGestionDeTablas" style="height:40px; min-width:150px"
                href="javascript:;"
                onclick="CerrarGestionDeTablas();"
        >Cerrar Gestión de Tablas</button>
        <?php
            include(USUARIOS_TABLA_PATH."view_tabla_usuario.php"); // Gestión de Tablas
            include(TEST_TABLA_VIEWS_PATH."view_test_tabla.php"); // Test con Tablas
        ?>
    </body>

    <script>
        function CerrarGestionDeTablas() {
            // alert("CerrarGestionDeTablas");

            $.ajax({
                url:'base/GestioNTablas/view_tablas_gestion.php',
                type: 'post',
                success: function (response) {
                    console.log(response);
                    // $("#contenedor_tablasGestion").html(response);
                    window.location.replace("index");
                }
            });
        }
    </script>

</html>