<?php 
require_once("../../php/conex.php");

function randomColor(){
	$str = "#";
	for($i = 0 ; $i < 6 ; $i++){
		$randNum = rand(0, 15);
		switch ($randNum) {
			case 10: $randNum = "A"; 
			break;
			case 11: $randNum = "B"; 
			break;
			case 12: $randNum = "C"; 
			break;
			case 13: $randNum = "D"; 
			break;
			case 14: $randNum = "E"; 
			break;
			case 15: $randNum = "F"; 
			break; 
		}
		$str .= $randNum;
	}
	return $str;
}
$anio = $_POST['anio'];
$linea_inv = [];
$lineas = [];
$valores = [];
$color = [];
$boC1 = "#fff";
$save_baC1 = [];
$save_boC1 = [];


$sql_li = $bd->consulta("SELECT * FROM lineas_investigacion");
foreach ($sql_li as $key_li) {
	array_push($lineas, utf8_encode($key_li['l_investigacion']));

	if ($anio == 0) {
		$sql_liv = $bd->consulta("SELECT count(id_la) as cont FROM linea_asignada WHERE id_li = {$key_li['id_li']}");
		foreach ($sql_liv as $val) {
			$baC1 = randomColor();
			array_push($valores, $val['cont']);
			array_push($save_baC1, $baC1);
			array_push($save_boC1, $boC1);
		}
	} else {
		$sql_liv = $bd->consulta("SELECT count(la.id_la) as cont FROM linea_asignada as la
			INNER JOIN aprendiz as apre ON apre.id_apre = la.id_apre
			WHERE 
			la.id_li = ".$key_li['id_li']." AND
			YEAR(apre.fecha_registro) = '".$anio."'");

		foreach ($sql_liv as $val) {
			$baC1 = randomColor();
			array_push($valores, $val['cont']);
			array_push($save_baC1, $baC1);
			array_push($save_boC1, $boC1);
		}
	}
}
$color[0] = $save_baC1;
$color[1] = $save_boC1;


$general[1] = $lineas;
$general[2] = $valores;
$general[3] = $color;

echo json_encode($general);
?>