<?php
include('config.php');
session_start();
?>

<!-- Puedes personalizar la vista según tus necesidades -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <!-- Agregamos los enlaces a Bootstrap y jQuery -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <?php
            // Verificar si hay alguien en sesión
            if (!isset($_SESSION['usuario'])) {
                // Mostrar el formulario de inicio de sesión solo si no hay nadie en sesión
                include("modules/login/views/login_view.php");
            } else {
                // Si hay alguien en sesión, puedes redirigirlo a otra página o mostrar otro contenido
                echo "¡Bienvenido, " . $_SESSION['usuario'] . "!";
            }
        ?>
    </div>

</body>
</html>