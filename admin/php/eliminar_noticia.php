<?php 
require_once("conex.php");

$id_noti = $_POST['id_noti'];


$sql_g = "DELETE FROM noticia_general WHERE id_noti = $id_noti";

$query2 = $bd->consulta($sql_g);


if($query2){
	$sql_cr = "DELETE FROM noticia_notificacion WHERE id_noti = $id_noti";
	$query1 = $bd->consulta($sql_cr);
	if($query1){
		echo "borrado";
	}else{
		echo "En estos momentos el servicio se encuestra congestionado por favor vuelva a intentar mas tarde.";
	}
	
}else{
	echo "En estos momentos el servicio se encuestra congestionado por favor vuelva a intentar mas tarde";
}

?>