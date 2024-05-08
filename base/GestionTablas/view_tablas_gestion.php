<div class="card mt-5">
    <div class="card-header">
        <h4 class="mb-0">Otras Funcionalidades</h4>
    </div>

    <div class="card-body">
        <div id="contenedor_tablasGestion">
            <button type="button" class="btn btn-warning" name="verGestionDeTablas" value="verGestionDeTablas" style="height:40px; min-width:150px"
                    href="javascript:;"
                    onclick="VerGestionDeTablas();"
            >Ver Gestión de Tablas</button>
        </div>
    </div>
</div>

<script>
    function VerGestionDeTablas() {
        // alert("VerGestionDeTablas");

        $.ajax({
            url:'base/GestionTablas/view_tablas.php',
            type: 'post',
            success: function (response) {
                $("#contenedor_tablasGestion").html(response);
            }
        });
    }
</script>

