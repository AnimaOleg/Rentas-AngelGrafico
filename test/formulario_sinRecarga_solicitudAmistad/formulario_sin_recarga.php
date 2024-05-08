<?php ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<button id="amistad" data-emisor="5" data-receptor="10">Enviar solicitud de amistad</button>

<script>
    // Asignar evento al formulario
    $('#amistad').on('click', enviar);

    function enviar(event){
        // Creo que no sería necesario, pero no está de más
        event.preventDefault();

        // Obtener emisor y receptor
        let emisor = $('#amistad').data('emisor');
        let receptor = $('#amistad').data('receptor');
        // Obtener valor de botón
        let boton = $('#amistad').text();
        // Crear URL y cambiar valor del botón
        let url;
        if(boton == 'Enviar solicitud de amistad') {
            // url = '../amigos/solicitud-enviada.php';
            url = 'procesoAjax.php';
        } else {
            url = '../amigos/eliminar-solicitud.php';
        }
        console.log(emisor, receptor, url);

        $.ajax({
            type:'post',
            url:url,
            // url:"procesoAjax.php",
            data:'emisor='+emisor +'&receptor='+receptor,
            
            beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor");
            },
            success:function(resp){
                // alert("SUCCESS");

                $("#resultado").html(resp);
                if(boton == 'Enviar solicitud de amistad') {
                    $('#amistad').text('Cancelar solicitud');
                } else {
                    $('#amistad').text('Enviar solicitud de amistad');
                }
            }
        });
        // ********** Borrar desde aquí ***********
        // Solo para comprobar que el botón cambia
                if(boton == 'Enviar solicitud de amistad') {
                    $('#amistad').text('Cancelar solicitud');
                } else {
                    $('#amistad').text('Enviar solicitud de amistad');
                }
        // Borra este bloque, solo debe pasar cuando la petición AJAX se realizó
        // ******** Hasta aquí ********************    
    }
</script>