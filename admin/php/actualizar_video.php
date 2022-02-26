<?php 
require_once("conex.php");
$conexx = $bd->conexion();

function comillas($filtro){
	$buscar  = array('"');
	$reemplazar = array("'");
	$texto = $filtro;
	$res = str_replace($buscar, $reemplazar, $texto);
	return $res;
}

//variables primer video id = 1
$url1 = $_POST['url1'];
$titulo1 = comillas(utf8_decode(mysqli_real_escape_string($conexx,$_POST['titulo1'])));

//variables primer video id = 2
$url2 = $_POST['url2'];
$titulo2 = comillas(utf8_decode(mysqli_real_escape_string($conexx,$_POST['titulo2'])));

//variables primer video id = 3
$url3 = $_POST['url3'];
$titulo3 = comillas(utf8_decode(mysqli_real_escape_string($conexx,$_POST['titulo3'])));

$sql1 = "UPDATE videos SET url = '$url1', titulo = '$titulo1' WHERE id_video = 1";
$query1 = $bd->consulta($sql1);
if ($query1) {
	$sql2 = "UPDATE videos SET url = '$url2', titulo = '$titulo2' WHERE id_video = 2";
	$query2 = $bd->consulta($sql2);
	if ($query2) {
		$sql3 = "UPDATE videos SET url = '$url3', titulo = '$titulo3' WHERE id_video = 3";
		$query3 = $bd->consulta($sql3);
		if ($query3) {
			echo "Actualización Exitosa";
		}else{
			echo "En estos momentos el sistema se encuentra en actualizacion por favor intente mas tarde..";
		}
	}else{
		echo "En estos momentos el sistema se encuentra en actualizacion por favor intente mas tarde.";
	}
}else{
	echo "En estos momentos el sistema se encuentra en actualizacion por favor intente mas tarde";
}
?>