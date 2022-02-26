<?php 
require_once("conex.php");

function resizeImagen($ruta, $nombre, $alto, $ancho,$nombreN,$extension, $cld){
	$rutaImagenOriginal = $ruta.$nombre;
	if($extension == 'GIF' || $extension == 'gif'){
		$img_original = imagecreatefromgif($rutaImagenOriginal);
	}
	if($extension == 'jpg' || $extension == 'JPG' || $extension == 'jpeg' || $extension == 'JPEG'){
		$img_original = imagecreatefromjpeg($rutaImagenOriginal);
	}
	if($extension == 'png' || $extension == 'PNG'){
		$img_original = imagecreatefrompng($rutaImagenOriginal);
	}
	$max_ancho = $ancho;
	$max_alto = $alto;
	list($ancho,$alto)=getimagesize($rutaImagenOriginal);
	$x_ratio = $max_ancho / $ancho;
	$y_ratio = $max_alto / $alto;
if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
	$ancho_final = $ancho;
	$alto_final = $alto;
} elseif (($x_ratio * $alto) < $max_alto){
	$alto_final = ceil($x_ratio * $alto);
	$ancho_final = $max_ancho;
} else{
	$ancho_final = ceil($y_ratio * $ancho);
	$alto_final = $max_alto;
}
$tmp=imagecreatetruecolor($ancho_final,$alto_final);
imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
imagedestroy($img_original);
$calidad=$cld;
imagejpeg($tmp,$ruta.$nombreN,$calidad);
}

//comprobamos que sea una petición ajax
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
{
	//guardamos en una variable la funcion conexion
	$conex = $bd->conexion();
    //obtenemos el archivo a subir
    //imagen 1
	$file = $_FILES['img_noti-corta']['name'];
	$type = $_FILES['img_noti-corta']['type'];
	$tmp = $_FILES['img_noti-corta']['tmp_name'];
	//imagen 2
	$file2 = $_FILES['img_noti-gener']['name'];
	$type2 = $_FILES['img_noti-gener']['type'];
	$tmp2 = $_FILES['img_noti-gener']['tmp_name'];

	function comillas($filtro){
		$buscar  = array('"');
		$reemplazar = array("'");
		$texto = $filtro;
		$res = str_replace($buscar, $reemplazar, $texto);
		return $res;
	}

	//obtenemos la informacion de la noticia
	$titulo_cr = comillas(utf8_decode(mysqli_real_escape_string($conex,$_POST['titulo_noti-corta'])));
	$fecha_cr = comillas(utf8_decode(mysqli_real_escape_string($conex,$_POST['fecha_noti-corta'])));
	$titulo_g = comillas(utf8_decode(mysqli_real_escape_string($conex,$_POST['titulo_noti-gener'])));
	$fecha_g = comillas(utf8_decode(mysqli_real_escape_string($conex,$_POST['fecha_noti-gener'])));
	$descripcion_g = comillas(utf8_decode(mysqli_real_escape_string($conex,$_POST['descrip_noti-gener'])));
	$id_noti = utf8_decode(mysqli_real_escape_string($conex,$_POST['id_noti']));

	if(isset($file) && ($type === 'image/png'||$type === 'image/jpeg'||$type === 'image/jpg') && isset($file2) && ($type2 === 'image/png'||$type2 === 'image/jpeg'||$type2 === 'image/jpg') ){
		
    	//comprobamos si existe un directorio para subir el archivo
    	//si no es así, lo creamos
		if(!is_dir("../../img/blog/")) {
			mkdir("../../img/blog/", 0777);
		}
		
    	//comprobamos si el archivo ha subido
		if ($file && move_uploaded_file($_FILES['img_noti-corta']['tmp_name'],"../../img/blog/".$file) && $file2 && move_uploaded_file($_FILES['img_noti-gener']['tmp_name'],"../../img/blog/".$file2) )
		{
			
			$partirImg = explode("/",$type);
			$ext = $partirImg[1];

			$partirImg2 = explode("/",$type2);
			$ext2 = $partirImg2[1];

			resizeImagen("../../img/blog/", $file, 370, 560,"new_".$file,"$ext", 80);
			resizeImagen("../../img/blog/", $file2, 565, 1200,"new_".$file2,"$ext2", 80);

			$noti_corta = "UPDATE noticia_notificacion SET titulo = '$titulo_cr', fecha = '$fecha_cr', name_img = '$file' WHERE id_noti = ".$id_noti;
			$result = $bd->consulta($noti_corta);

			$noti_gene = "UPDATE noticia_general SET titulo = '$titulo_g',fecha = '$fecha_g' ,name_img = '$file2' ,descripcion = '$descripcion_g' WHERE id_noti = ".$id_noti;

			$result2 = $bd->consulta($noti_gene);
			
			if($result && $result2){
				echo "Actualización Exitosa";
			}
		}
		else{
			echo "En estos momentos el servicio se encuestra congestionado por favor vuelva a intentar mas tarde";
		}
	}
	else{
		echo "Verificar que las imagenes sean tipo: JPG - JPEG - PNG";
	}
}else{
	throw new Exception("Error Processing Request", 1);
}

?>