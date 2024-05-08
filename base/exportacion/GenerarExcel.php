<?php
	session_start();
	// include_once('db_excel.php');
	include("../GestionTablas/dbconfig.php");
?>
<!DOCTYPE html>
<html lang="es-es">

	<head>
		<meta charset="utf-8">
		<title>Contacto</title>
	<head>

	<body>
		<?php
			// Fecha
			$date = date('d/m/Y H:i:s', time());
			$fecha_excel = date('d/m/Y - H:i:s', time());

			// Crear la tabla HTML
			$html = '<table border="1">';
			$html .= '<tr>';
			$html .= '<td colspan="29" class="titulo_completo">'.'<span class="titulo_span">Registro de Renta</span>'.' - '.$fecha_excel.'</td>';
			$html .= '</tr>';

			// Contribuyente - Cabecera
			$html .= '<tr>';
			$html .= '<td colspan="14" class="cabecera_contribuyente">Contribuyente</td>';
			$html .= '<td colspan="15" class="cabecera_conyuge">Conyuge</td>';
			$html .= '</tr>';

			// Contribuyente - Campos
			$html .= '<tr>';
			$html .= '<td class="contribuyente"><b>Nº Renta</b></td>';
			$html .= '<td class="contribuyente"><b>DNI</b></td>';
			$html .= '<td class="contribuyente"><b>Vigencia</b></td>';
			$html .= '<td class="contribuyente"><b>Fecha Inicio</b></td>';
			$html .= '<td class="contribuyente"><b>Nombre</b></td>';
			$html .= '<td class="contribuyente"><b>Apellido 1</b></td>';
			$html .= '<td class="contribuyente"><b>Apellido 2</b></td>';
			$html .= '<td class="contribuyente"><b>Teléfono</b></td>';
			$html .= '<td class="contribuyente"><b>Móvil</b></td>';
			$html .= '<td class="contribuyente"><b>Email</b></td>';
			$html .= '<td class="contribuyente"><b>Nº Cuenta</b></td>';
			$html .= '<td class="contribuyente"><b>Nº REF</b></td>';

			$html .= '<td class="contribuyente"><b>Enviado</b></td>';
			$html .= '<td class="contribuyente"><b>Fecha Envio</b></td>';

			// Conyuge - Cabecera
			$html .= '<td class="conyuge"><b>DNI</b></td>';
			$html .= '<td class="conyuge"><b>Vigencia</b></td>';
			$html .= '<td class="conyuge"><b>Fecha Inicio</b></td>';
			$html .= '<td class="conyuge"><b>Nombre</b></td>';
			$html .= '<td class="conyuge"><b>Apellido 1</b></td>';
			$html .= '<td class="conyuge"><b>Apellido 2</b></td>';
			$html .= '<td class="conyuge"><b>Teléfono</b></td>';
			$html .= '<td class="conyuge"><b>Móvil</b></td>';
			$html .= '<td class="conyuge"><b>Email</b></td>';
			$html .= '<td class="conyuge"><b>CSV</b></td>';
			$html .= '<td class="conyuge"><b>Nº Cuenta</b></td>';
			$html .= '<td class="conyuge"><b>Nº REF</b></td>';
			$html .= '<td class="conyuge"><b>Precio</b></td>';
			$html .= '<td class="conyuge"><b>Método Pago</b></td>';
			$html .= '<td class="conyuge"><b>Observaciones</b></td>';
			$html .= '</tr>';


			$opciones = "";
			// Contribuyente-NºRenta

			// if(isset($_POST["cont_numRenta"]) && $_POST["cont_numRenta"] == "")
			// 	$opciones .= "";
			// else
			// 	$opciones .= "WHERE contribuyente_numRenta=".$_POST["cont_numRenta"];

			// $numRenta = null;
			// if(isset($_POST["cont_numRenta"]))
			// {
			// 	$numRenta = $_POST["cont_numRenta"];
			// 	echo "Nº Renta = ".$numRenta."<br>\n";

			// 	if($numRenta != ""){
			// 		$opciones .= "WHERE contribuyente_numRenta=".$numRenta;
			// 	}else
			// 		echo "Renta VACIO<br>\n";
			// }


			// else{
			// 	$numRenta = $_POST["cont_numRenta"];
			// 	echo "Nº Renta = ".$_POST["cont_numRenta"];
			// 	$opciones .= "WHERE contribuyente_numRenta=".$numRenta;
			// }

			// if(isset($_POST["cont_numRenta"]) && $_POST["cont_numRenta"] != ""){
			// 	$opciones .= "WHERE contribuyente_numRenta=".$numRenta;
			// }
			// // Contribuyente-DNI
			// else if(isset($_POST["cont_dni"]) && $_POST["cont_dni"] != "")
			// 	$opciones .= "WHERE contribuyente_dni='".$_POST["cont_dni"]."';";
			// // Conyuge-DNI
			// else if(isset($_POST["cony_dni"]) && $_POST["cony_dni"] != "")
			// 	$opciones .= "WHERE conyuge_dni='".$_POST["cony_dni"]."';";
			
			//Seleccionar todos los elementos de la tabla
			// $result_msg_contatos = "SELECT * FROM contribuyente as cont LEFT JOIN conyuge as cony ON cont.id = cony.conyuge_pareja_de ".$opciones . " ORDER BY contribuyente_fechaAlta DESC";
			$result_msg_contatos = "SELECT * FROM contribuyente as cont LEFT JOIN conyuge as cony ON cont.id=cony.conyuge_pareja_de ".$opciones.";";
			// echo $result_msg_contatos;
			
			// $resultado_msg_contatos = mysqli_query($conectar, $result_msg_contatos);
			// while ($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos))
			// {



			$sql = $conn->prepare($result_msg_contatos);
			$sql->execute();
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			foreach($sql->fetchAll() as $k=>$row_msg_contatos)
			{

				// if($numRenta == $row_msg_contatos["contribuyente_numRenta"]){

					$html .= '<tr>';
					// Contribuyente
					$html .= '<td>' . $row_msg_contatos["contribuyente_numRenta"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["contribuyente_dni"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["contribuyente_vigencia"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["contribuyente_fechaInicio"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["contribuyente_nombre"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["contribuyente_apellido1"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["contribuyente_apellido2"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["contribuyente_telefono"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["contribuyente_movil"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["contribuyente_email"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["contribuyente_numCuenta"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["contribuyente_numRef"] . '</td>';

					$html .= '<td>' . $row_msg_contatos["enviado"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["envioFecha"] . '</td>';
					// Conyuge
					$html .= '<td>' . $row_msg_contatos["conyuge_dni"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_vigencia"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_fechaInicio"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_nombre"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_apellido1"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_apellido2"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_telefono"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_movil"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_email"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_csv"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_numCuenta"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_numRef"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_precio"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_metodoPago"] . '</td>';
					$html .= '<td>' . $row_msg_contatos["conyuge_observaciones"] . '</td>';
					$html .= '</tr>';
				// }
			}
		
		?>
		<!-- Estilo -->
		<style>
			.titulo_completo{
				color:white;
				background-color:black;
				text-align:center;
			}
			.titulo_span{
				font-size:20px;
				font-weight:bold;
			}
			.cabecera_contribuyente{
				color:white;
				background-color:blue;
				font-size:16px;
				text-align:center;
				font-weight:bold
			}
			.cabecera_conyuge{
				color:white;
				background-color:green;
				font-size:16px;
				text-align:center;
				font-weight:bold;
			}
			.contribuyente{
				font-size:16px;
 				color:blue;
			}
			.conyuge{
				font-size:16px;
 				color:green;
			}
		</style>

		<?php
			$arquivo = 'Renta - '.$date.'.xls';
			// Configuración en la cabecera
			header("Expires: Mon, 26 Jul 2227 05:00:00 GMT");
			header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
			header("Cache-Control: no-cache, must-revalidate");
			header("Pragma: no-cache");
			header("Content-type: application/x-msexcel");
			// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); // No funciona bien para .xlsx
			header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
			header("Content-Description: PHP Generado Data");
			// Envia contenido al archivo
			echo $html;
			// exit;
		?>
	</body>

</html>