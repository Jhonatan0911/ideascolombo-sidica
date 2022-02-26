<?php 
require_once("conex.php");

$id_noti = $_POST['id_noti'];

$noticia_corta = "SELECT * FROM noticia_notificacion WHERE id_noti = $id_noti";
$noticia_general = "SELECT titulo, fecha, name_img, descripcion FROM noticia_general WHERE id_noti = $id_noti";
$datos = [];

$query1 = $bd->consulta($noticia_corta);
$query2 = $bd->consulta($noticia_general);

$valor1 = $query1->num_rows;
$valor2 = $query2->num_rows;

if ($valor1 > 0 && $valor2 > 0) {
	foreach($query1 as $info1){
		
		array_push($datos, [
			"id_noti" => $info1['id_noti'],
			"titulo_nc" => utf8_encode($info1['titulo']),
			"fecha_nc" => utf8_encode($info1['fecha']),
			"nameimg_nc" => utf8_encode($info1['name_img'])
		]);
	}
	
	foreach($query2 as $info2){

		array_push($datos, [
			"titulo_ng" => utf8_encode($info2['titulo']),
			"fecha_ng" => utf8_encode($info2['fecha']),
			"nameimg_ng" => utf8_encode($info2['name_img']),
			"descripcion_ng" => utf8_encode($info2['descripcion'])
		]);
	}

	echo json_encode($datos);
}else{
	echo "No Se encontro Noticia registrada!";
}

?>