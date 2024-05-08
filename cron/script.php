<?php
  include("../base/GestionTablas/dbconfig.php");

  try
  {
    // CAMBIAR > 1 por 43200 que son 30 días
    // $query = "SELECT cont.id as cont_id, contribuyente_numRenta, contribuyente_dni, contribuyente_nombre, contribuyente_apellido1, contribuyente_apellido2 FROM contribuyente as cont LEFT JOIN conyuge as cony ON cont.id=cony.conyuge_pareja_de WHERE (TIMESTAMPDIFF(MINUTE, cont.contribuyente_fechaAlta, NOW()) > 1 OR cont.enviado=0";
    $query = "SELECT cont.id as cont_id, contribuyente_numRenta, contribuyente_dni, contribuyente_nombre, contribuyente_apellido1, contribuyente_apellido2, conyuge_metodoPago
    FROM contribuyente as cont LEFT JOIN conyuge as cony ON cont.id=cony.conyuge_pareja_de
    WHERE (TIMESTAMPDIFF(MINUTE, cont.contribuyente_fechaAlta, NOW()) > 1)";
    $query .= " AND cont.enviado=0";
    // $query = "SELECT * FROM contribuyente  WHERE (TIMESTAMPDIFF(MINUTE,contribuyente_fechaAlta,NOW()) > 20 OR enviado=0)";
  
    $sql = $conn->prepare($query);
    $sql->execute();
  } catch(PDOException $e) {
    echo "Error con la Consulta de Tiempos<br/>";
    echo "Error: " . $e->getMessage()."<br>";
  }

  $contador_envios_emails = 0; // Contar Envios  
  $contador_actualizacion_registros = 0; // Contar Actualizaciones
        
  // Iterar todos los registros que no cumplan las condiciones en la consulta anterior
  $sql->setFetchMode(PDO::FETCH_ASSOC);
  $result = $sql->fetchAll();
  // var_dump($result);

  foreach($result as $k=>$data)
  {
    // echo "Data: ".print_r($data)."<br>";

    if($data["conyuge_metodoPago"] != "Facturado")
    {
      if($data["cont_id"] != null)
      {
        // Fecha actual
        date_default_timezone_set("Europe/Madrid");
        $envioFecha = date('Y-m-d H:i:s', time());
        // $envioFecha = date('Y-m-d H:i:s H', time());
        // echo "ID: ".$data["cont_id"] . " : " .$envioFecha."<br>";
        
        // EMAIL
        $contador_envios_emails = enviarEmail($data, $contador_envios_emails);

        try
        {
          $query = "UPDATE contribuyente SET enviado=1, envioFecha='".$envioFecha."' WHERE id=".$data["cont_id"].";";
          $sql = $conn->prepare($query);
          $actualizado = $sql->execute();
          
          // Contar Actualizaciones
          if ($actualizado)
            $contador_actualizacion_registros++;
          
        } catch(PDOException $e) {
          echo "<br>Error Actualizando la Fecha de Envio<br/>";
          echo "Error: " . $e->getMessage()."<br>";
        }
      }

    }else{
      // echo "No actualizamos estados ya Facturados<br>";
    }
  }
  echo "Actualizados con Email: ".$contador_actualizacion_registros." registros<br>";
  echo "Emails enviados: ".$contador_envios_emails." registros<br>";
    
  function enviarEmail($data, $contador_envios_emails)
  {
    $to = "olegtortajada@gmail.com, info@angelgrafio.com";
    // $to = "olegtortajada@gmail.com";
    // $to = "info@angelgrafico.com";
    $subject = "Rentas - Recordatorio Email";
    $message = "<br>";
    // $message .= "<br><br>Mensaje: ";

    $message = "<html><head><title>Recordatorio de cobro pendiente</title></head><body>";

    $message .= "<p><h1>Recordatorio de cobro pendiente</h1>";
    $message .= "<h2>Datos:</h2></p>";
    $message .= "<p><b>- Nº de Renta: ".$data["contribuyente_numRenta"]."</b></p>";
    $message .= "<p><b>- Cliente: ".$data["contribuyente_nombre"]." ".$data["contribuyente_apellido1"]." ".$data["contribuyente_apellido2"]." - ".$data["contribuyente_dni"]."</b></p>";
    // $message .= "<p><b>- Conyuge: ".$data["conyuge_nombre"]." ".$data["conyuge_apellido1"]." ".$data["conyuge_apellido2"]. " - ".$data["conyuge_dni"]."</h4></p>";

    $message .= "</body></html>";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
    $headers .= 'From: Recordatorio de cobro pendiente <info@angelgrafico.com>' . "\r\n";
    // $headers .= 'Cc: myboss@example.com' . "\r\n";
    
    try
    {
      mail($to, $subject, $message, $headers);
      $contador_envios_emails++;
    }catch(Exception $e){
        echo "<br>Error enviando Email: ".$e;
    }
    return $contador_envios_emails;
  }