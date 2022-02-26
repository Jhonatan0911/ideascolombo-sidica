<?php 
require_once("conex.php");
date_default_timezone_set('America/Bogota');
$conex = $bd->conexion();

$respuesta = [
	"exito" => false,
	"msj" => "Hubo un error al procesar la petición"
];

$titulopropuesta = utf8_decode($conex->escape_string($_POST['proyectoTxt']));
$nombreintru = utf8_decode($conex->escape_string($_POST['nombreInsTxt']));
$nombreapre = utf8_decode($conex->escape_string($_POST['nombreApreTxt']));
$programa = utf8_decode($conex->escape_string($_POST['programaTxt']));
$ficha = utf8_decode($conex->escape_string($_POST['fichaTxt']));
$correo = utf8_decode($conex->escape_string($_POST['emailTxt']));
$telefono = utf8_decode($conex->escape_string($_POST['telTxt']));
$propuesta = utf8_decode($conex->escape_string($_POST['ideaTxt']));

$sentencia = "INSERT INTO ideascolombo(titulo_propuesta, nombre_inst, nombre_apre, ficha, programa, correo, telefono, propuesta, fecha) VALUES ( '$titulopropuesta', '$nombreintru', '$nombreapre', $ficha, '$programa', '$correo', $telefono, '$propuesta', '".date("Y-m-d")."' )";

$sql = $bd->consulta($sentencia);

if ( $sql ) {
	$respuesta['exito'] = true;
	$respuesta['msj'] = "Propuesta registrada exitosamente  $sentencia";
} else {
	
	$respuesta['exito'] = false;
	$respuesta['msj'] = $sql;
}

echo json_encode( $respuesta );
?>