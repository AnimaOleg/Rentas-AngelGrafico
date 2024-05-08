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
            <label for="contribuyente_dni">DNI</label>
            <input type="text" class="form-control" id="contribuyente_dni" aria-describedby="contribuyente_dni" placeholder="DNI"
                style="border: 2px solid green"
            >
            <small id="dniHelp" class="form-text text-success">Buscable</small>
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_vigencia">Vigencia</label>
            <input type="date" class="form-control" id="contribuyente_vigencia" placeholder="Vigencia">
        </div>
    </div>


    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_fechaInicio">Fecha Inicio</label>
            <input type="date" class="form-control" id="contribuyente_fechaInicio" placeholder="Fecha Inicio" value="<?php echo date('Y-m-d'); ?>">
        </div>
    </div>
</div>

<!-- Fila 2 -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_nombre">Nombre</label>
            <input type="text" class="form-control" id="contribuyente_nombre" placeholder="Nombre">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_apellido1">1er Apellido</label>
            <input type="text" class="form-control" id="contribuyente_apellido1" placeholder="1er Apellido">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_apellido2">2º Apellido</label>
            <input type="text" class="form-control" id="contribuyente_apellido2" placeholder="2º Apellido">
        </div>
    </div>
</div>

<!-- Fila 3 -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_telefono">Nº Tel.</label>
            <input type="text" class="form-control" id="contribuyente_telefono" placeholder="Nº Tel.">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_movil">Móvil</label>
            <input type="text" class="form-control" id="contribuyente_movil" placeholder="Móvil">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_email">Mail</label>
            <input type="text" class="form-control" id="contribuyente_email" placeholder="Mail">
        </div>
    </div>
</div>


<!-- Fila 4 -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_numRef">REF</label>
            <input type="text" class="form-control" id="contribuyente_numRef" placeholder="Nº Referencia">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="contribuyente_numCuenta">Nº Cuenta</label>
            <input type="text" class="form-control" id="contribuyente_numCuenta" placeholder="Nº Cuenta">
        </div>
    </div>
</div>