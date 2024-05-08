<div id="contenedor_login">
    <div class="card border-0">
        <div class="card-body">
            <div id="mensaje_login"></div>
        </div>
    </div>

    <div class="card border border-info">
        <div class="card-header bg-info">
            <h4 class="mb-0 text-white">Inicio de Sesión</h4>
            
        </div>

        <div class="card-body">
            <!-- Formulario de inicio de sesión -->
            <form id="loginForm">
                <div class="form-group">
                    <label for="usuario" class="font-weight-bold text-info">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>
                
                <div class="form-group">
                    <label for="contrasena" class="font-weight-bold text-info">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>

                <div class="row justify-content-between mt-5 mb-3 mr-0 ml-0">
                    <button type="button" class="btn btn-primary" id="btn_login">Iniciar sesión</button>
                    <button type="button" class="btn btn-link" id="btn_registerUserView">Registro de Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function()
    {
        mensaje_login = document.getElementById("mensaje_login");
        contenedor_login = document.getElementById("contenedor_login");

        $("#btn_login").click(function() {
            usuario = document.getElementById("usuario").value;
            contrasena = document.getElementById("contrasena").value;

            $.ajax({
                type: "POST",
                url: "modules/controllers/login.php",
                data: {usuario, contrasena},
                // beforeSend: function () {
                //     // $("#mensaje_login").html("Procesando Inicio de Sesión");
                //     mensaje_login.innerHTML = "Procesando Inicio de Sesión";
                //     mensaje_login.classList.remove("text-danger");
                //     mensaje_login.classList.remove("text-success");
                //     mensaje_login.className += " text-primary";
                // },
                success: function (response) {
                    // alert(response);
                    mensaje_login.innerHTML = response;

                    // Control de Respuestas(mensajes)
                    if(response == "Login: Error, Usuario o contraseña incorrectos"){
                        mensaje_login.classList.remove("text-success");
                        mensaje_login.classList.remove("text-primary");
                        mensaje_login.className += " text-danger";
                    }
                    else if(response == "Login: Sesión Iniciada"){
                        mensaje_login.classList.remove("text-danger");
                        mensaje_login.classList.remove("text-primary");
                        mensaje_login.className += " text-success";
                        // Redirección
                        location.href = "index";
                    }
                }
            });

        });
        
        $("#btn_registerUserView").click(function() {
            $.ajax({
                type: "GET",
                url: "modules/views/view_userRegister.php",
                // data: {usuario, contrasena},
                // beforeSend: function () {
                //     mensaje_login.innerHTML = "Abriendo Registro";
                // },
                success: function (response) {
                    // alert(response);
                    contenedor_login.innerHTML = response;
                    // mensaje_registro.innerHTML = response;
                    // location.href = "modules/views/view_userRegister";
                }
            });
        })

        
    });
</script>