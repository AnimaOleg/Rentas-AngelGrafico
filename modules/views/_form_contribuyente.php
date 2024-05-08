<?php
// if (isset($_POST['funcion']) && !empty($_POST["funcion"]))
//     if($_POST["contribuyente__numRenta"]){
//         echo "cont_numRenta:(form_contribuyente.php)" . $_POST["cont_numRenta"] . "<br>";
//     }else{
//         echo "Rellena 'cont_numRenta'";
//     }
?>

<!-- Fila 1 -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_dni" style="color:green">DNI</label>
            <input
                value="<?php
                    if(isset($datos['contribuyente_dni']))
                        echo $datos['contribuyente_dni'];
                ?>" 
                type="text" class="form-control" id="contribuyente_dni" aria-describedby="contribuyente_dni" placeholder="DNI"
                style="border: 2px solid green"
            >
            <small id="dniHelp" class="form-text text-danger">Buscable</small>
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_vigencia">Vigencia</label>
            <input
                value="<?php
                    if(isset($datos['contribuyente_vigencia'])){
                        // https://www.jairogarciarincon.com/clase/programacion-en-php/formato-de-fechas
                        //Recoger una fecha de un DATETIME SQL (yyyy-mm-dd hh:ii:ss)
                        $fecha = DateTime::createFromFormat("Y-m-d H:i:s", $datos['contribuyente_vigencia'], new DateTimeZone("Europe/Madrid"));
                        echo $fecha->format("Y-m-d");
                    }
                ?>" 
                type="date" class="form-control" id="contribuyente_vigencia" placeholder="Vigencia">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_fechaInicio">Fecha Inicio</label>
            <input
                value="<?php
                    if(isset($datos['contribuyente_fechaInicio'])){
                        $fecha = DateTime::createFromFormat("Y-m-d H:i:s", $datos['contribuyente_fechaInicio'], new DateTimeZone("Europe/Madrid"));
                        echo $fecha->format("Y-m-d");
                    }else
                        echo date('Y-m-d');
                ?>" 
                type="date" class="form-control" id="contribuyente_fechaInicio" placeholder="Fecha Inicio">
        </div>
    </div>
</div>

<!-- Fila 2 -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_nombre">Nombre</label>
            <input
                value="<?php
                    if(isset($datos['contribuyente_nombre']))
                        echo $datos['contribuyente_nombre'];
                ?>" 
                type="text" class="form-control" id="contribuyente_nombre" placeholder="Nombre">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_apellido1">1er Apellido</label>
            <input
                value="<?php
                    if(isset($datos['contribuyente_apellido1']))
                        echo $datos['contribuyente_apellido1'];
                ?>" 
                type="text" class="form-control" id="contribuyente_apellido1" placeholder="1er Apellido">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_apellido2">2º Apellido</label>
            <input
                value="<?php
                    if(isset($datos['contribuyente_apellido2']))
                        echo $datos['contribuyente_apellido2'];
                ?>" 
                type="text" class="form-control" id="contribuyente_apellido2" placeholder="2º Apellido">
        </div>
    </div>
</div>

<!-- Fila 3 -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_telefono">Nº Tel.</label>
            <input
                value="<?php
                    if(isset($datos['contribuyente_telefono']))
                        echo $datos['contribuyente_telefono'];
                ?>" 
                type="text" class="form-control" id="contribuyente_telefono" placeholder="Nº Tel.">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_movil">Móvil</label>
            <input
                value="<?php
                    if(isset($datos['contribuyente_movil']))
                        echo $datos['contribuyente_movil'];
                ?>" 
                type="text" class="form-control" id="contribuyente_movil" placeholder="Móvil">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_email">Mail</label>
            <input
                value="<?php
                    if(isset($datos['contribuyente_email']))
                        echo $datos['contribuyente_email'];
                ?>" 
                type="text" class="form-control" id="contribuyente_email" placeholder="Mail">
        </div>
    </div>
</div>


<!-- Fila 4 -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_numRef">REF</label>
            <input
                value="<?php
                    if(isset($datos['contribuyente_numRef']))
                        echo $datos['contribuyente_numRef'];
                ?>" 
                type="text" class="form-control" id="contribuyente_numRef" placeholder="Nº Referencia">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_numCuenta">Nº Cuenta</label>
            <input
                value="<?php
                    if(isset($datos['contribuyente_numCuenta']))
                        echo $datos['contribuyente_numCuenta'];
                ?>" 
                type="text" class="form-control" id="contribuyente_numCuenta" placeholder="Nº Cuenta">
        </div>
    </div>
</div>