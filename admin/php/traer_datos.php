<?php

require_once("conex.php");

$consulta1 = "SELECT aprendiz.id_apre as id, CONCAT(aprendiz.nombres,' ',aprendiz.apellidos) as nombre, programas.programa as prog, aprendiz.f_formacion as fich FROM aprendiz
INNER JOIN programas
WHERE
aprendiz.id_prog = programas.id_prog AND 
aprendiz.id_roles = 2 ORDER BY id";
$registro1 = $bd->consulta($consulta1);


$tabla = "";
foreach ($registro1 as $datos1) {
	$consulta2 = "SELECT l_investigacion as linve FROM lineas_investigacion
	INNER JOIN linea_asignada
	WHERE
	linea_asignada.id_li = lineas_investigacion.id_li AND
	linea_asignada.id_apre = {$datos1['id']} ORDER BY linve";
	$registro2 = $bd->consulta($consulta2);
	
	$detalles = '<button data-ids=\"'.$datos1['id'].'\" class=\"detall btn btn-default btn-circle waves-effect waves-cyan waves-circle waves-float pull-right\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Detalles\"><i class=\"material-icons\">assignment_ind</i></button> <a href=\"../php/hojasvida.php?id_apre='.$datos1['id'].'\" class=\"hv btn btn-default btn-circle waves-effect waves-cyan waves-circle waves-float pull-right\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Descargar HV\"><i class=\"material-icons\">file_download</i></a>';

	$tabla.='{
		"#":"'.$datos1['id'].'",
		"Nombre Completo":"'.utf8_encode($datos1['nombre']).'",
		"Programa De Formación":"'.utf8_encode($datos1['prog']).'",
		"Ficha De Formación":"'.$datos1['fich'].'",
		"Linea De Investigación":"';

		foreach ($registro2 as $datos2) {
			$tabla.=''.'- '.utf8_encode($datos2['linve']).'<br>'.'';
		}

		$tabla.='",
		"Detalles":"'.$detalles.'"
	},';		
}

	//eliminamos la coma que sobra
$tabla = substr($tabla,0, strlen($tabla) - 1);

echo '{"data":['.$tabla.']}';	

?>