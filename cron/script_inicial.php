<?php
// Incluye el archivo de conexión a la base de datos.
include("conexion.php");

// Realiza una consulta a la base de datos para seleccionar todos los registros en la tabla 'contribuyente'
// donde la diferencia en minutos entre la columna 'envioFecha' y el momento actual (NOW()) es mayor a 20
// o la fecha es igual a '0000-00-00 00:00:00', lo que indica una fecha no válida o no establecida.
// Ajustamos la consulta para incluir registros donde envioFecha es NULL.
// $result = $mysqli->query("SELECT * FROM contribuyente WHERE (TIMESTAMPDIFF(MINUTE,envioFecha,NOW()) > 20 OR fecha='0000-00-00 00:00:00' OR envioFecha IS NULL)");

// Comprueba si la consulta anterior retornó algún resultado (es decir, si hay filas que cumplen con la condición).
// if ($result->num_rows) {
  // print_r($result);
  // Eliminamos registros donde la diferencia de tiempo es mayor a 20 minutos o envioFecha es '0000-00-00 00:00:00'.
  // $mysqli->query("DELETE FROM contribuyente WHERE TIMESTAMPDIFF(MINUTE,envioFecha,NOW()) > 20 OR envioFecha='0000-00-00 00:00:00'");

  // Para mayor claridad y eficiencia, la condición para eliminar donde envioFecha es NULL
  // se ha combinado en la consulta anterior usando OR. Esto elimina la necesidad de tener
  // múltiples consultas DELETE para condiciones diferentes.
// }
