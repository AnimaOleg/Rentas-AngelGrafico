<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container">
      <h2>Registro</h2>
      <!-- Trigger the modal with a button -->
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
              <p>Some text in the modal.</p>
              <?php
                include("../../modules/views/view_userRegister.php");
              ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-save btn-primary" data-dismiss="modal">Save</button> -->
              <button type="button" class="btn btn-primary" id="btn-modalUserRegister">Save</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Small modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>

      <div class="modal fade bd-example-modal-sm" id="mySmallModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            
            <!-- <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">MENSAJE</h4>
            </div> -->
            <div class="modal-body" style="min-height: 50px">
            MENSAJE
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

          </div>
        </div>
      </div>

      <script>
        // https://getbootstrap.com/docs/4.1/components/modal/
        
        // para abrirlo sería:
        // $('#exampleModal').modal({ show:true });
        // y para cerrarlo sería:
        // $('#exampleModal').modal('hide')
        
        // Si al cerrar el modal quereis ejecutar código javascript sería así:
        // $("#exampleModal").on("hidden.bs.modal", function () {
        //     // Aquí va el código a ejecutar cuando se dispara el evento de cerrar la ventana modal
        // });

        
        // Si al cerrar el modal quereis ejecutar código javascript sería así:
        $("#mySmallModal").on("shown.bs.modal", function () {
            // Aquí va el código a ejecutar cuando se dispara el evento de cerrar la ventana modal
            // setTimeout(function(){
            //   //console.log("Hola Mundo");
            //   $('#mySmallModal').modal('hide')
            // }, 22000);

        });

      </script>

    </div>

  </body>
</html>

<!-- Agregamos nuestro script personalizado -->
<script src="modal_example.js"></script>