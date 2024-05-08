<?php ?>

<div id="resultado">AA</div>

<?php
    if(!isset($_POST["Nombre"]) && !isset($_POST["Mensaje"])){
        echo "-------";
    }else{
        echo "Resultado POST:<br> ".$_POST["Nombre"]." ".$_POST["Mensaje"];
    }
?>