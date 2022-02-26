<?php 
require_once("conex.php");

$id_porta = $_POST['id_porta'];

$sql = "DELETE FROM portafolio WHERE id = $id_porta";
$query = $bd->consulta($sql);

if($query){
	echo "borrado";	
}else{
	echo "En estos momentos el servicio se encuestra congestionado por favor vuelva a intentar mas tarde";
}

?>