<?php
    include(INCLUDES_PATH."header.php");
?>

<div class="container mt-0">
    <div class="row justify-content-md-center">
        <div class="col-md-auto pb-2 text-success">
            <!-- Mensaje - Resultado -->
            <div id='mensaje_result' class='text-danger' style="font-size:0.8rem; min-height: 60px; background-color: light-gray">
                <?php
                    $datos = null;

                    if(isset($_SESSION["datos"])){
                        $datos = $_SESSION["datos"];
                        // print_r($datos);
                    }

                    if(isset($_SESSION["mensaje"])){
                        echo $_SESSION["mensaje"];
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Validation Bootstrap 5: https://getbootstrap.com/docs/5.0/forms/validation/ -->
<!-- <form class="row g-3 needs-validation" novalidate> -->
<!-- <form class="row g-3 needs-validation" novalidate id="formulario"> -->
<form class="row g-3 needs-validation" style="margin:0;">
    <div class="container mt-0">
        <div class="row justify-content-md-center">
            
            <!-- Button -->
            <div class="col-md-auto pb-2">
                <button type="submit" class="btn btn-success"
                        id="btn_registroBuscar">
                    <i class="bi bi-search" ></i>
                    Buscar Registro
                </button>
                <button type="button" id="btn_registroBuscar" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-sm">
                    <i class="bi bi-search" ></i>
                    Buscar Registro
                    </button>

            </div>

            <div class="col-md-auto pb-2">
                <button type="Insertar Contribuyente" class="btn btn-success"
                        id="btn_registroInsertar">
                    <i class="bi bi-person-plus-fill" ></i>
                    Insertar Registro
                </button>
            </div>
            
            <div class="col-md-auto pb-2">
                <button type="button" class="btn btn-success"
                        id="btn_enviarEmail">
                    <i class="bi bi-person-plus-fill" ></i>
                    Enviar Email
                </button>
            </div>

        </div>
    </div>
    
    <div class="container mt-0">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-xl-8 pb-2">

                <!-- Nº Renta - Contribuyente -->
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="contribuyente_numRenta" style="color:green">Nº Renta</label>
                            <input 
                                value="<?php
                                    if(isset($datos['contribuyente_numRenta']))
                                        echo $datos['contribuyente_numRenta'];
                                ?>" 
                                type="text" class="form-control" id="contribuyente_numRenta" aria-describedby="contribuyente_numRenta" placeholder="Nº Renta"
                                style="border: 2px solid green"
                                >
                            <small id="contribuyente_numRenta" class="form-text text-danger">Buscable</small>
                        </div>
                    </div>
                </div>
                
                <!-- Datos Contribuyente -->
                <div class="card mb-2">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">Datos Contribuyente</h4>
                    </div>
                    <div class="card-body">
                        <?php include(VIEWS_PATH."form_contribuyente.php"); ?>
                    </div>
                </div>

                <!-- Datos Conyugue -->
                <div class="card mb-2">
                    <div class="card-header bg-info">
                        <h4 class="mb-0 text-white">Datos Conyugue</h4>
                    </div>
                    <div class="card-body">
                        <?php include(VIEWS_PATH."form_conyugue.php"); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>


    <!-- MODAL -->
    <div class="modal fade bd-example-modal-sm" id="mySmallModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-body" style="min-height: 50px">
                    <!-- MENSAJE -->
                    <div id='mensaje_result' class='text-danger' style="font-size:0.8rem; min-height: 60px; background-color: light-gray">
                        <?php
                            $datos = null;

                            if(isset($_SESSION["datos"])){
                                $datos = $_SESSION["datos"];
                                // print_r($datos);
                            }

                            if(isset($_SESSION["mensaje"])){
                                echo $_SESSION["mensaje"];
                            }
                            print_r($_SESSION['mensaje']);
                        ?>
                    </div>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

            </div>
        </div>
    </div>

    <script>
    // https://getbootstrap.com/docs/4.1/components/modal/
    
    // para abrirlo sería:
    // $('#exampleModal').modal({ show:true });
    // y para cerrarlo sería:
    // $('#exampleModal').modal('hide')
    
    // Si al cerrar el modal quereis ejecutar código javascript sería así:
    // $("#exampleModal").on("hidden.bs.modal", function () {
    //     // Aquí va el código a ejecutar cuando se dispara el evento de cerrar la ventana modal
    // });

    
    // Si al cerrar el modal quereis ejecutar código javascript sería así:
    $("#mySmallModal").on("shown.bs.modal", function () {
        // Aquí va el código a ejecutar cuando se dispara el evento de cerrar la ventana modal
        setTimeout(function(){
            //console.log("Hola Mundo");
            $('#mySmallModal').modal('hide')
        }, 1000);

    });
</script>


<?php
    
    $datos = null;
    unset($_SESSION["datos"]);
    unset($_SESSION["mensaje"]);
?>