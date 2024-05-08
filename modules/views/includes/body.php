<body>
    <?php
        // Verificar si hay alguien en sesión
        if (!isset($_SESSION['usuario'])) {
            include(INCLUDES_PATH."header.php");

            include(INCLUDES_PATH."container_header.php");
    
            // Mostrar el formulario de inicio de sesión solo si no hay nadie en sesión
            include(VIEWS_PATH."view_login.php");
            include(GESTION_TABLAS_PATH."view_tablas_gestion.php");
            
            include(INCLUDES_PATH."container_footer.php");


            // mostrarIP(false);

        } else {
            // Si hay alguien en sesión, puedes redirigirlo a otra página o mostrar otro contenido
            include(VIEWS_PATH."view_panel_crm.php");
        }
    ?>
</body>