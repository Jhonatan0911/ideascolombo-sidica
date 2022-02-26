<?php

require_once("conex.php");

function parse( $text ){
	$parsedText = str_replace(chr(10), "", $text);
	$parsedText = str_replace(chr(13), "", $parsedText);
	return $parsedText = str_replace("\"","'",$parsedText);
}

$consulta = "SELECT * FROM ideascolombo";
$registro = $bd->consulta($consulta);


$data = "";
foreach ($registro as $datos) {

	$data.= '{
		"Título Propuesta" : "'.parse( strtoupper( utf8_encode( $datos['titulo_propuesta'] ) ) ).'",
		"Instructor" : "'.parse( strtoupper( utf8_encode( $datos['nombre_inst'] ) ) ).'",
		"Aprendices" : "'.parse( strtoupper( utf8_encode( $datos['nombre_apre'] ) ) ).'",
		"Ficha" : "'.parse( strtoupper( utf8_encode( $datos['ficha'] ) ) ).'",
		"Programa Formación" : "'.parse( strtoupper( utf8_encode( $datos['programa'] ) ) ).'",
		"Correo" : "'.parse( strtoupper( utf8_encode( $datos['correo'] ) ) ).'",
		"Teléfono" : "'.parse( strtoupper( utf8_encode( $datos['telefono'] ) ) ).'",
		"Propuesta" : "'.parse( strtoupper( utf8_encode( $datos['propuesta'] ) ) ).'" 
	},';	
}

	//eliminamos la coma que sobra
$data = substr($data,0, strlen($data) - 1);

echo '{"data":['.$data.']}';	
?>