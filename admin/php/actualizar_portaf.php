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
	$file = $_FILES['img_porta_upda']['name'];
	$type = $_FILES['img_porta_upda']['type'];
	$tmp = $_FILES['img_porta_upda']['tmp_name'];
	

	//obtenemos la informacion del portafolio
	$id_porta = $_POST['id_porta'];
	$tipo = $_POST['tipo_portaUpdate'];
	

	if(isset($file) && ($type === 'image/png'||$type === 'image/jpeg'||$type === 'image/jpg')){
		
    	//comprobamos si existe un directorio para subir el archivo
    	//si no es así, lo creamos
		if(!is_dir("../../img/portfolio/")) {
			mkdir("../../img/portfolio/", 0777);
		}
		
    	//comprobamos si el archivo ha subido
		if ($file && move_uploaded_file($_FILES['img_porta_upda']['tmp_name'],"../../img/portfolio/".$file))
		{
			
			$sql = "UPDATE portafolio SET nameImg = '$file', tipo = $tipo WHERE id = ".$id_porta;
			$result = $bd->consulta($sql);

			if($result){
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