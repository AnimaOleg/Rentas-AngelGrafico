<?php
    include(INCLUDES_PATH."header.php");
?>

<div class="container mt-0">
    <div class="row justify-content-md-center">
        <div class="col-md-auto pb-2 text-success">
        <!-- Spinner -->
        <div class="d-flex justify-content-center" style="min-height: 50px">
            <div class="spinner-border" id="mensaje_result_spinner" role="status" style="display: none">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Mensaje - Resultado -->
        <div id='mensaje_result' class='text-danger' style="font-size: 1rem; min-height: 60px; background-color: light-gray"></div>
            
        </div>
    </div>
</div>

<form class="row g-3 needs-validation" style="margin:0;" id="form_panel_crm">
    <div class="container mt-0">
        <div class="row justify-content-md-center">
            
            <!-- Buscar Registro -->
            <div class="col-md-auto pb-2">
                <button type="button" class="btn btn-success" name="buscarRegistro" value="buscarRegistro" 
                    href="javascript:;" onclick="BuscarRegistro();">
                    <i class="bi bi-search" ></i>
                    Buscar Registro
                </button>
            </div>
            
            <!-- Insertar Registro -->
            <div class="col-md-auto pb-2">
                <button type="button" class="btn btn-success" name="insertarRegistro" value="insetarRegistro"
                    href="javascript:;" onclick="InsertarRegistro();">
                    <i class="bi bi-person-plus-fill" ></i>
                    Insertar Registro
                </button>

            </div>
            
            <!-- Modal -->
            <!-- <button type="button" id="btn_registroBuscar" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">
                <i class="bi bi-search" ></i>
                Modal
            </button> -->

            <!-- Enviar Email -->
            <div class="col-md-auto pb-2">
                <button type="button" class="btn btn-white"
                        id="btn_enviarEmail">
                    <i class="bi bi-envelope"></i>
                    Enviar Email
                </button>
            </div>
                
            <!-- Exportar Registro -->
            <div class="col-md-auto pb-2">
                <button type="button" class="btn btn-white" name="insertarRegistro" value="insetarRegistro"
                    href="javascript:;" onclick="ExportarDatos();">
                    <i class="bi bi-save"></i>
                    Exportar Registro
                </button>
            </div>

            <!-- Exportar Todo -->
            <!-- <div class="col-md-auto pb-2">
                <a href="base/exportacion/plantilla.php">Exportar TODO</a>
                <form action="base/exportacion/plantilla.php">
                    <input type="submit" value="Go to Google" />
                </form>
            </div> -->

            <!-- Limpiar Formulario -->
            <div class="col-md-auto pb-2">
                <button type="button" class="btn btn-danger" name="insertarRegistro" value="insetarRegistro"
                    href="javascript:;" onclick="LimpiarFormulario();">
                    <i class="bi bi-eraser-fill"></i>
                    Limpiar Formulario
                </button>
            </div>

        </div>
    </div>
    
    <div class="container mt-0">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-xl-8 pb-2">

                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <!-- Nº Renta - Contribuyente -->
                            <label for="contribuyente_numRenta">Nº Renta</label>
                            <input type="text" class="form-control" id="contribuyente_numRenta" aria-describedby="contribuyente_numRenta" placeholder="Nº Renta" style="border: 2px solid green">

                            <small id="contribuyente_numRenta" class="form-text text-success">Buscable</small>
                        </div>
                    </div>
                </div>
                
                <div class="card mb-2">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">Datos Contribuyente</h4>
                    </div>
                    <div class="card-body">
                        <!-- Datos Contribuyente -->
                        <?php include(VIEWS_PATH."form_contribuyente.php"); ?>
                    </div>
                </div>

                <div class="card mb-2">
                    <div class="card-header bg-info">
                        <h4 class="mb-0 text-white">Datos Conyugue</h4>
                    </div>
                    <div class="card-body">
                        <!-- Datos Conyugue -->
                        <?php include(VIEWS_PATH."form_conyugue.php"); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

<script>
    function BuscarRegistro()
    {
        // alert("BuscarRegistro");
        cont_numRenta = document.getElementById("contribuyente_numRenta").value;
        cont_dni = document.getElementById("contribuyente_dni").value;
        cony_dni = document.getElementById("conyuge_dni").value;

        const spinner = document.getElementById('mensaje_result_spinner');
        $.ajax({
            type: "POST",
            url: "modules/controllers/cRenta.php",
            data: {
                funcion: "btn_registro_buscar",
                cont_numRenta: cont_numRenta,
                cont_dni: cont_dni,
                cony_dni: cony_dni
            },
            beforeSend: function () {
                // Spiner Visible
                $("#mensaje_result").html("");
                if(spinner != null) spinner.style.display = 'block';
            },
            success: function (result) 
            {
                // console.log(result);
                // console.log("Renta: "+cont_numRenta+", cont_dni: "+cont_dni+", cony_dni: "+cony_dni);
                array = JSON.parse(result);
                // console.log(array);

                // Spiner Invisible
                setTimeout(() => {
                    spinner.style.display = 'none';
                }, 50);
                
                // Comprobación del tipo devuelto, para ver si hay dato o mensaje de error - https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Operators/typeof
                if(typeof array==="object")
                    $("#mensaje_result").html("Registro Cargado");
                else
                    $("#mensaje_result").html("No hay Registro");

                // Datos Contribuyente
                $("#contribuyente_numRenta").val(array["contribuyente_numRenta"]);
                $("#contribuyente_dni").val(array["contribuyente_dni"]);
                $("#contribuyente_vigencia").val(array["contribuyente_vigencia"]);
                $("#contribuyente_fechaInicio").val(array["contribuyente_fechaInicio"]);
                $("#contribuyente_nombre").val(array["contribuyente_nombre"]);
                $("#contribuyente_apellido1").val(array["contribuyente_apellido1"]);
                $("#contribuyente_apellido2").val(array["contribuyente_apellido2"]);
                $("#contribuyente_telefono").val(array["contribuyente_telefono"]);
                $("#contribuyente_movil").val(array["contribuyente_movil"]);
                $("#contribuyente_email").val(array["contribuyente_email"]);
                $("#contribuyente_numRef").val(array["contribuyente_numRef"]);
                $("#contribuyente_numCuenta").val(array["contribuyente_numCuenta"]);

                // Datos Conyuge
                $("#conyuge_dni").val(array["conyuge_dni"]);
                $("#conyuge_vigencia").val(array["conyuge_vigencia"]);
                $("#conyuge_fechaInicio").val(array["conyuge_fechaInicio"]);
                $("#conyuge_nombre").val(array["conyuge_nombre"]);
                $("#conyuge_apellido1").val(array["conyuge_apellido1"]);
                $("#conyuge_apellido2").val(array["conyuge_apellido2"]);
                $("#conyuge_telefono").val(array["conyuge_telefono"]);
                $("#conyuge_movil").val(array["conyuge_movil"]);
                $("#conyuge_email").val(array["conyuge_email"]);
                $("#conyuge_csv").val(array["conyuge_csv"]);
                $("#conyuge_numRef").val(array["conyuge_numRef"]);
                $("#conyuge_numCuenta").val(array["conyuge_numCuenta"]);
                $("#conyuge_precio").val(array["conyuge_precio"]);
                // Ajuste para Radio Buttons
                var metodoPago = array["conyuge_metodoPago"];
                if(metodoPago == null || metodoPago == ""){
                        document.getElementById("conyuge_efectivo").checked = false;
                        document.getElementById("conyuge_transferencia").checked = false;
                        document.getElementById("conyuge_facturado").checked = false;
                } else {
                    if(metodoPago == "Efectivo")
                        document.getElementById("conyuge_efectivo").checked = true;
                    else if(metodoPago == "Transferencia")
                        document.getElementById("conyuge_transferencia").checked = true;
                    else if(metodoPago == "Facturado")
                        document.getElementById("conyuge_facturado").checked = true;
                }
                $("#conyuge_observaciones").val(array["conyuge_observaciones"]);
            }
            ,
            error: function () {
                alert("Algo salio mal");
                return true;
            }
        });
    }
    
    function InsertarRegistro(){
        // alert("btn_registroInsertar");

        // Datos Formulario - Contribuyente
        cont_numRenta = document.getElementById("contribuyente_numRenta").value;
        cont_dni = document.getElementById("contribuyente_dni").value;
        cont_vigencia = document.getElementById("contribuyente_vigencia").value;
        cont_fechaInicio = document.getElementById("contribuyente_fechaInicio").value;
        cont_nombre = document.getElementById("contribuyente_nombre").value;
        cont_apellido1 = document.getElementById("contribuyente_apellido1").value;
        cont_apellido2 = document.getElementById("contribuyente_apellido2").value;
        cont_telefono = document.getElementById("contribuyente_telefono").value;
        cont_movil = document.getElementById("contribuyente_movil").value;
        cont_email = document.getElementById("contribuyente_email").value;
        cont_numRef = document.getElementById("contribuyente_numRef").value;
        cont_numCuenta = document.getElementById("contribuyente_numCuenta").value;

        // Datos Formulario - Conyuge
        cony_dni = document.getElementById("conyuge_dni").value;
        cony_vigencia = document.getElementById("conyuge_vigencia").value;
        cony_fechaInicio = document.getElementById("conyuge_fechaInicio").value;
        cony_nombre = document.getElementById("conyuge_nombre").value;
        cony_apellido1 = document.getElementById("conyuge_apellido1").value;
        cony_apellido2 = document.getElementById("conyuge_apellido2").value;
        cony_telefono = document.getElementById("conyuge_telefono").value;
        cony_movil = document.getElementById("conyuge_movil").value;
        cony_email = document.getElementById("conyuge_email").value;
        cony_csv = document.getElementById("conyuge_csv").value;
        cony_numRef = document.getElementById("conyuge_numRef").value;
        cony_numCuenta = document.getElementById("conyuge_numCuenta").value;
        cony_precio = document.getElementById("conyuge_precio").value;
        cony_observaciones = document.getElementById("conyuge_observaciones").value;
        
        cony_metodoPago = "---";
        var radios = document.getElementsByName('conyuge_metodoPago');
        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                // do whatever you want with the checked radio
                // alert(radios[i].value);
                cony_metodoPago = radios[i].value;
                // only one radio can be logically checked, don't check the rest
                break;
            }
        }

        const spinner = document.getElementById('mensaje_result_spinner');
        $.ajax({
            type: "POST",
            url: "modules/controllers/cRenta.php",
            data: {
                funcion: "btn_registro_insertar",
                
                // Datos Contribuyente
                "cont_numRenta":cont_numRenta, "cont_dni":cont_dni, "cont_vigencia":cont_vigencia, "cont_fechaInicio":cont_fechaInicio, "cont_nombre":cont_nombre,
                "cont_apellido1":cont_apellido1, "cont_apellido2":cont_apellido2, "cont_telefono":cont_telefono, "cont_movil":cont_movil, "cont_email":cont_email,
                "cont_numRef":cont_numRef,
                "cont_numCuenta":cont_numCuenta,
                
                // Datos Conyuge
                "cony_dni":cony_dni, "cony_vigencia":cony_vigencia, "cony_fechaInicio":cony_fechaInicio, "cony_nombre":cony_nombre, "cony_apellido1":cony_apellido1,
                "cony_apellido2":cony_apellido2, "cony_telefono":cony_telefono, "cony_movil":cony_movil, "cony_email":cony_email, "cony_csv":cony_csv,
                "cony_numRef":cony_numRef, "cony_numCuenta":cony_numCuenta, "cony_precio":cony_precio, "cony_metodoPago":cony_metodoPago, "cony_observaciones":cony_observaciones
            },
            beforeSend: function () {
                // Spiner Visible
                $("#mensaje_result").html("");
                if(spinner != null) spinner.style.display = 'block';
            },
            success: function (result)
            {
                console.log(result);
                array = JSON.parse(result);
                console.log(array);

                // Spiner Invisible
                setTimeout(() => {
                    spinner.style.display = 'none';
                }, 50);
                
                // Mensaje en caso de fallo al recuperar datos
                $("#mensaje_result").html(array);
                
                // alert("Success - Renta.js: " + result);
                // $("#mensaje_result").html(result);

                item = document.getElementById("mensaje_result");
                if(result == "Rellena el DNI del Contribuyente")
                {
                    // Quitar estilos
                    item.classList.remove("text-info");
                    item.classList.remove("text-success");
                    item.classList.remove("text-danger");
                    // Añadir estilo
                    item.className += " text-danger";

                }else{
                    // Quitar estilos
                    item.classList.remove("text-info");
                    item.classList.remove("text-success");
                    item.classList.remove("text-danger");
                    // Añadir estilo
                    item.className += " text-info";

                }

            }
        });
    }

    function ExportarDatos()
    {
        const spinner = document.getElementById('mensaje_result_spinner');
        cont_numRenta = document.getElementById("contribuyente_numRenta").value;
        cont_dni = document.getElementById("contribuyente_dni").value;
        cony_dni = document.getElementById("conyuge_dni").value;
        // alert("cont_numRenta: '"+cont_numRenta+"', cont_dni: '"+cont_dni+"', cony_dni: '"+cony_dni+"'");

        $.ajax({
                type: "POST",
                url: "base/exportacion/GenerarExcel.php",
                data: {
                    funcion: "btn_exportar_especifico",
                    cont_numRenta: cont_numRenta,
                    cont_dni: cont_dni,
                    cony_dni: cony_dni
                },
                beforeSend: function () {
                    // Spiner Visible
                    if(spinner != null) spinner.style.display = 'block';
                },
                success: function (result) 
                {
                    console.log(result);

                    // Spiner Invisible
                    setTimeout(() => {
                        spinner.style.display = 'none';
                    }, 50);
                    
                    // Mensaje en caso de fallo al recuperar datos
                    location.href = "base/exportacion/GenerarExcel.php";
                    $("#mensaje_result").html("Registro Exportado");
                }
            });
    }


    // function ExportarTodo(){
    //     // alert("ExportarTodo");

    //     const spinner = document.getElementById('mensaje_result_spinner');
    //     $.ajax({
    //         type: "POST",
    //         // url: "base/export_data.php",
    //         url: "base/exportacion/plantilla.php",
    //         data: {
    //             // funcion: "btn_registro_buscar",
    //             // cont_numRenta: cont_numRenta,
    //             // cont_dni: cont_dni,
    //             // cony_dni: cony_dni
    //         },
    //         beforeSend: function () {
    //             // Spiner Visible
    //             if(spinner != null) spinner.style.display = 'block';
    //         },
    //         success: function (result) 
    //         {
    //             console.log(result);
    //             // array = JSON.parse(result);
    //             // console.log(array);

    //             // Spiner Invisible
    //             setTimeout(() => {
    //                 spinner.style.display = 'none';
    //             }, 50);
                
    //             // Mensaje en caso de fallo al recuperar datos
    //             $("#mensaje_result").html("Todo Exportado");

    //         }
    //     });
    // }

    function LimpiarFormulario(){
        // alert("LimpiarFormulario");
        document.getElementById("form_panel_crm").reset();
        $("#mensaje_result").html("Formulario limpiado");
    }
</script>

<!-- MODAL -->
<div class="modal fade bd-example-modal-sm" id="mySmallModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-body" style="min-height: 50px">
                <!-- MENSAJE -->
                <div id='mensaje_result' class='text-danger' style="font-size:0.8rem; min-height: 60px; background-color: light-gray">
                    MENSAJE
                </div>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

        </div>
    </div>
</div>

<script>
    // Si al cerrar el modal quereis ejecutar código javascript sería así:
    $("#mySmallModal").on("shown.bs.modal", function () {
        setTimeout(function(){
            $('#mySmallModal').modal('hide')
        }, 1000);
    });
</script>