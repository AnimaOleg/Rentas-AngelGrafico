<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Gestión de Tablas</h4>
                </div>

                <div class="card-body">
                    <div class="container">
                        <form id="form">
                            <div class="row justify-content-start">
                                <div class="col-12 font-weight-bold">
                                    <span>Tabla:</span>
                                </div>

                                <div class="col-4">
                                    <select name="select" class="text-info" style="font-size: 18px; height: 38px; padding: 0 10px">
                                        <!-- <option value="tabla--" selected class="text-info"></option> -->
                                        <option value="tabla_usuarios" selected class="text-success">Usuarios</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row justify-content-start">
                                <div class="mt-4">
                                    <button type="button" class="btn btn-info" id="btn_tabla_usuarios_mostrar">Mostrar Datos</button>
                                    <button type="button" class="btn btn-success" id="btn_tabla_usuarios_crear">Crear Tabla</button>
                                    <button type="button" class="btn btn-danger" id="btn_tabla_usuarios_vaciar">Vaciar Datos</button>
                                    <button type="button" class="btn btn-danger" id="btn_tabla_usuarios_borrar">Borrar Tabla</button>
                                    <button type="button" class="btn btn-primary" id="btn_tabla_usuarios_insertar">Insertar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer" id="card_footer_gestionTablas"/>

            </div>

        </div>
    </div>
</div>