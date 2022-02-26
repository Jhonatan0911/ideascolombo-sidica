<?php 

require_once("conex.php");

$consulta1 = "SELECT * FROM noticia_notificacion ORDER BY id_noti DESC";
$registro1 = $bd->consulta($consulta1);


$tabla = "";
foreach ($registro1 as $datos1) {
	$detalles = '<button data-tipo=\"update\" data-id_noti=\"'.$datos1['id_noti'].'\" class=\"btn btn-primary btn-circle waves-effect waves-circle waves-float\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Actualizar\"><i class=\"material-icons\">replay</i></button> <button data-tipo=\"delete\" data-id_noti=\"'.$datos1['id_noti'].'\" class=\"btn btn-danger btn-circle waves-effect waves-circle waves-float\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\"><i class=\"material-icons\">delete_forever</i></button>';

	$tabla.='{
		"#":"'.$datos1['id_noti'].'",
		"Titulo de noticia":"'.utf8_encode($datos1['titulo']).'",
		"Fecha":"'.utf8_encode($datos1['fecha']).'",
		"Opciones":"'.$detalles.'"
	},';		
}

	//eliminamos la coma que sobra
$tabla = substr($tabla,0, strlen($tabla) - 1);

echo '{"data":['.$tabla.']}';	

?>