<?php 
require_once("conex.php");
date_default_timezone_set('America/Bogota');
$conex = $bd->conexion();

$fecha = new DateTime();
$fecha = $fecha->format('Y-m-d H:i:s');

$name = utf8_decode($conex->escape_string($_POST['name']));
$email = utf8_decode($conex->escape_string($_POST['email']));
$message = utf8_decode($conex->escape_string($_POST['message']));
$id_noti = utf8_decode($conex->escape_string($_POST['id_noti']));

//avater-1.jpg

$sentencia = "INSERT INTO noticia_comentario(nombre, fecha, comentario, correo, name_img, id_noti) VALUES ('$name','$fecha','$message','$email','avater-2.jpg',$id_noti)";
$sql = $bd->consulta($sentencia);
if($sql){
	echo "bien";
}else{
	echo "error";
}
?>