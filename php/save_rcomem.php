<?php 
require_once("conex.php");
date_default_timezone_set('America/Bogota');
$conex = $bd->conexion();

$fecha = new DateTime();
$fecha = $fecha->format('Y-m-d H:i:s');

$name = utf8_decode($conex->escape_string($_POST['name']));
$email = utf8_decode($conex->escape_string($_POST['email']));
$message = utf8_decode($conex->escape_string($_POST['message']));
$id_com = utf8_decode($conex->escape_string($_POST['id_com']));

//avater-1.jpg

$sentencia = "INSERT INTO noticia_respuesta(nombre, fecha, respuesta, correo, name_img, id_com) VALUES ('$name','$fecha','$message','$email','avater-2.jpg',$id_com)";
$sql = $bd->consulta($sentencia);
if($sql){
	echo "bien";
}else{
	echo $sentencia;
}
?>