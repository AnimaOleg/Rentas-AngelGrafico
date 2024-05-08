
<?php
    include("../../config.php");
    include(BASE_PATH."export_data.php");
?>

<div class="container mt-0">
    <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-xl-12 pb-4">

            <div class="card mb-5">

                <div class="card-header bg-info">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-0 text-white">Contribuyentes</h4>
                    
                        <div class="btn-group pull-right d-flex justify-content-end">
                            <form action=" <?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                <!-- <button type="submit" id="btn_tabla_exportar" name='export_data' value="Exportar" class="btn btn-primary border-white">Exportar</button> -->
                                <!-- <button type="button" class="btn btn-primary border-white" id="btn_tabla_exportar" >Exportar</button> -->
                                
                                <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export to excel</button>
                            </form>

                        </div>
                    </div>
                </div>  

                <div class="card-body">
                    <!-- Estilo SACADO DE :: https://www.creativosonline.org/27-headers-y-footers-css-para-tu-blog-o-pagina-web.html -->
                    <!-- Header fixed angulado :: https://codepen.io/GeorgePark/pen/PEOKyY -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Num. Renta</th>
                                <th>DNI</th>
                                <th>Vigencia</th>
                                <th>Fecha de Inicio</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Móvil</th>
                                <th>Email</th>
                                <th>Número de Cuenta</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>

                        <tbody id="body-clientes"/>

                    </table>
                </div>
                
            </div>

        <!-- <div class="container mt-5"> -->
        </div>
    </div>
</div>