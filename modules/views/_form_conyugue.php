<!-- Fila 1 -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="conyuge_dni" style="color:green">DNI</label>
            <input
                value="<?php
                    if(isset($datos['conyuge_dni']))
                        echo $datos['conyuge_dni'];
                ?>" 
                type="text" class="form-control" id="conyuge_dni" aria-describedby="conyuge_dni" placeholder="DNI"
                style="border: 2px solid green"
            >
            <small id="dniHelp" class="form-text  text-danger">Buscable</small>
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="conyuge_vigencia">Vigencia</label>
            <input
                value="<?php
                    if(isset($datos['conyuge_vigencia'])){
                        $fecha = DateTime::createFromFormat("Y-m-d H:i:s", $datos['conyuge_vigencia'], new DateTimeZone("Europe/Madrid"));
                        echo $fecha->format("Y-m-d");
                    }
                ?>" 
                type="date" class="form-control" id="conyuge_vigencia" placeholder="Vigencia">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="conyuge_fechaInicio">Fecha Inicio</label>
            <input
                value="<?php
                    if(isset($datos['conyuge_fechaInicio'])){
                        $fecha = DateTime::createFromFormat("Y-m-d H:i:s", $datos['conyuge_fechaInicio'], new DateTimeZone("Europe/Madrid"));
                        echo $fecha->format("Y-m-d");
                    }else
                        echo date('Y-m-d');
                ?>" 
                type="date" class="form-control" id="conyuge_fechaInicio" placeholder="Fecha Inicio">
        </div>
    </div>
</div>

<!-- Fila 2 -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="conyuge_nombre">Nombre</label>
            <input
                value="<?php
                    if(isset($datos['conyuge_nombre']))
                        echo $datos['conyuge_nombre'];
                ?>" 
                type="text" class="form-control" id="conyuge_nombre" placeholder="Nombre">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="conyuge_apellido1">1er Apellido</label>
            <input
                value="<?php
                    if(isset($datos['conyuge_apellido1']))
                        echo $datos['conyuge_apellido1'];
                ?>" 
                type="text" class="form-control" id="conyuge_apellido1" placeholder="1er Apellido">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="conyuge_apellido2">2º Apellido</label>
            <input
                value="<?php
                    if(isset($datos['conyuge_apellido2']))
                        echo $datos['conyuge_apellido2'];
                ?>" 
                type="text" class="form-control" id="conyuge_apellido2" placeholder="2º Apellido">
        </div>
    </div>
</div>

<!-- Fila 3 -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="conyuge_telefono">Nº Tel.</label>
            <input
                value="<?php
                    if(isset($datos['conyuge_telefono']))
                        echo $datos['conyuge_telefono'];
                ?>" 
                type="text" class="form-control" id="conyuge_telefono" placeholder="Nº Tel.">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="conyuge_movil">Móvil</label>
            <input
                value="<?php
                    if(isset($datos['conyuge_movil']))
                        echo $datos['conyuge_movil'];
                ?>" 
                type="text" class="form-control" id="conyuge_movil" placeholder="Móvil">
        </div>
    </div>

    <div class="col-sm">
        <div class="form-group">
            <label for="conyuge_email">Mail</label>
            <input
                value="<?php
                    if(isset($datos['conyuge_email']))
                        echo $datos['conyuge_email'];
                ?>" 
                type="text" class="form-control" id="conyuge_email" placeholder="Mail">
        </div>
    </div>
</div>

<!-- Fila 4 -->
<div class="row">
    <div class="col-sm">
        <div class="form-group">
            <label for="conyuge_csv">CSV</label>
            <input
                value="<?php
                    if(isset($datos['conyuge_csv']))
                        echo $datos['conyuge_csv'];
                ?>" 
                type="text" class="form-control" id="conyuge_csv" placeholder="CSV">
        </div>
    </div>
    <!-- <div class="col-sm">
        <div class="form-group">
            <label for="conyuge_añadirCSV">Añadir CSV</label>
            <input
                type="text" class="form-control" id="conyuge_añadirCSV" placeholder="Añadir CSV">
        </div>
    </div> -->
</div>

<!-- Fila 5 -->
<div class="row">
    
<div class="col-sm">
        <div class="form-group">
            <label for="conyuge_numRef">REF</label>
            <input
                value="<?php
                    if(isset($datos['conyuge_numRef']))
                        echo $datos['conyuge_numRef'];
                ?>" 
                type="text" class="form-control" id="conyuge_numRef" placeholder="Nº Referencia">
        </div>
    </div>


    <div class="col-sm">
        <div class="form-group">
            <label for="conyuge_numCuenta">Nº Cuenta</label>
            <input
                value="<?php
                    if(isset($datos['conyuge_numCuenta']))
                        echo $datos['conyuge_numCuenta'];
                ?>" 
                type="text" class="form-control" id="conyuge_numCuenta" placeholder="Nº Cuenta">
        </div>
    </div>
</div>

<!-- Fila 6 -->
<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label for="conyuge_precio">Precio</label>
            <input
                value="<?php
                    if(isset($datos['conyuge_precio']))
                        echo $datos['conyuge_precio'];
                ?>" 
                type="text" class="form-control" id="conyuge_precio" placeholder="Precio">
        </div>
    </div>
    
    <div class="col-8 justify-content-center row align-items-center">
        <!-- <fieldset class="form-group"> -->
        <fieldset class="row align-items-center">
            
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="conyuge_metodoPago" id="conyuge_efectivo" value="Efectivo"
                    <?php
                        if(isset($datos['conyuge_metodoPago']))
                            if($datos['conyuge_metodoPago']=="Efectivo")
                                echo " checked='checked'";
                    ?>
                >
                <label class="form-check-label" for="conyuge_efectivo">
                    Efectivo
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="conyuge_metodoPago" id="conyuge_transferencia" value="Transferencia"
                    <?php
                        if(isset($datos['conyuge_metodoPago']))
                            if($datos['conyuge_metodoPago']=="Transferencia")
                                echo " checked='checked'";
                    ?>
                >
                <label class="form-check-label" for="conyuge_transferencia">
                    Transferencia
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="conyuge_metodoPago" id="conyuge_facturado" value="Facturado"
                    <?php
                        if(isset($datos['conyuge_metodoPago']))
                            if($datos['conyuge_metodoPago']=="Facturado")
                                echo " checked='checked'";
                    ?>
                >
                <label class="form-check-label" for="conyuge_facturado">
                    Facturado
                </label>
            </div>
                
        </fieldset>
    </div>
</div>

<!-- Fila 7 -->
<div class="form-group">
    <label for="conyuge_observaciones">Obseravaciones</label>
    <textarea class="form-control" id="conyuge_observaciones" name="conyuge_observaciones" rows="4">
<?php
        if(isset($datos['conyuge_observaciones']))
            echo $datos['conyuge_observaciones'];
?></textarea>
</div>