<?php 

require_once("conex.php");

$consulta1 = "SELECT portafolio.id as id, portafolio.nameImg as nameImg, tipo_portafolio.tipo as tipo FROM portafolio INNER JOIN tipo_portafolio WHERE portafolio.tipo = tipo_portafolio.id";
$registro1 = $bd->consulta($consulta1);


$tabla = "";
foreach ($registro1 as $datos1) {
	$detalles = '<button data-tipo=\"update\" data-id_porta=\"'.$datos1['id'].'\" class=\"btn btn-primary btn-circle waves-effect waves-circle waves-float\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Actualizar\"><i class=\"material-icons\">replay</i></button> <button data-tipo=\"delete\" data-id_porta=\"'.$datos1['id'].'\" class=\"btn btn-danger btn-circle waves-effect waves-circle waves-float\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Eliminar\"><i class=\"material-icons\">delete_forever</i></button>';

	$tabla.='{
		"#":"'.$datos1['id'].'",
		"Nombre de la imagen":"'.$datos1['nameImg'].'",
		"Tipo de imagen":"'.utf8_encode($datos1['tipo']).'",
		"Opciones":"'.$detalles.'"
	},';		
}

	//eliminamos la coma que sobra
$tabla = substr($tabla,0, strlen($tabla) - 1);

echo '{"data":['.$tabla.']}';	

?>