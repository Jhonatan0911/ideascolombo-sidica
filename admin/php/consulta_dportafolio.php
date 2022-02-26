<?php 
require_once("conex.php");

$id_porta = $_POST['id_porta'];

$portafolio = "SELECT portafolio.id as id, portafolio.nameImg as nameImg, tipo_portafolio.id as tipo FROM portafolio INNER JOIN tipo_portafolio WHERE portafolio.tipo = tipo_portafolio.id AND portafolio.id = $id_porta";
$datos = [];

$query = $bd->consulta($portafolio);

$valor = $query->num_rows;

if ($valor > 0) {
	foreach($query as $info){
		
		array_push($datos, [
			"id_porta" => $info['id'],
			"nameImg" => $info['nameImg'],
			"tipo" => $info['tipo']
		]);
	}
	echo json_encode($datos);
}else{
	echo "No Se encontró portafolio registrado!";
}

?>