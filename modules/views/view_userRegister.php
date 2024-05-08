<div id="contenedor_registro">
    <div class="card border-0">
        <div class="card-body">
            <div id="mensaje_registro"></div>
        </div>
    </div>

    <!-- <div class="container mt-5"> -->
    <div class="container mt-0">
        <div class="row justify-content-center">
            <div class="col-12" style="padding:0">

                    <div class="card border border-info">
                        <div class="card-header bg-info">
                        <h4 class="mb-0 text-white">Registro de Usuario</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="usuario" class="font-weight-bold text-info">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="mi usuario" required>
                        </div>
                        <div class="form-group">
                            <label for="contrasena" class="font-weight-bold text-info">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="mi contraseña" required>
                        </div>

                        <div class="row justify-content-between mt-5 mb-3 mr-0 ml-0">
                            <!-- <button type="button" class="btn btn-primary" id="btn_registrar_usuario">Registrarse</button> -->
                            <button type="button" class="btn btn-warning" name="registrarUsuario" value="registrarUsuario" style="height:40px; min-width:150px"
                                href="javascript:;"
                                onclick="RegistrarUsuario();"
                            >Registrarse</button>
                            
                            <!-- <button type="button" class="btn btn-warning" name="btn_cerrar_registro" id="btn_cerrar_registro" style="height:40px; min-width:150px" -->
                            <button type="button" class="btn btn-warning" name="cerrar_registro" value="cerrar_registro" style="height:40px; min-width:150px"
                                href="javascript:;"
                                onclick="CerrarRegistro();"
                            >Cerrar Registro</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
