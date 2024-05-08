<!-- <div class="container mt-5"> -->
<div class="card mb-5 border-0">
    <div class="row justify-content-between m-0 pb-3 pt-3">
        
        <?php if (isset($_SESSION['usuario'])) { ?>
            <div class="col-md-8 d-flex justify-content-center align-items-center">
                <h4 class="mb-0text-primary text-uppercase font-weight-bold">Panel de Usuario</h4>
            </div>
            
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <div class="d-flex justify-content-end align-items-center m-1">
                        <?php echo "Bienvenido " . $_SESSION['usuario'] . ""; ?>
                </div>

                <div class="d-flex justify-content-end align-items-center m-1">
                    <button type="button" class="btn btn-success" id="btn_logout">Salir</button>
                </div>
            </div>

        <?php  } ?>

    </div>
</div>