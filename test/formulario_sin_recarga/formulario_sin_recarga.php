<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <!-- jQuery library -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <!-- <script type="text/javascript" src ="script.js"></script> -->
    
    </head>
    <body>
        <div id="mi-div" style="color: red">
            Nombre: <input type="text" id="nombre"> <br>
            Mensaje: <input type="text" id="mensaje"> <br>
            <input type="button" name="enviar" value="Enviar" href="javascript:;" onclick="Hola($('#nombre').val(),$('#mensaje').val());">
        </div>

        <div id="resultado"></div>
    </body>
</html>

<script>
    function Hola(nombre,mensaje) {
        var parametros = {"Nombre":nombre, "Mensaje":mensaje};

        $.ajax({
            data:parametros,
            url:'procesoAjax.php',
            type: 'post',
            beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor");
            },
            success: function (response) {
                $("#resultado").html(response);
            }
        });
    }
</script>


