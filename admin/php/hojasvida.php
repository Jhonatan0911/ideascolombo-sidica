<?php 
date_default_timezone_get("America/Bogota");
setlocale(LC_ALL, 'es_CO');

ini_set('memory_limit', '1024M');
set_time_limit(300);

include_once("conex.php");

require __DIR__.'/../../vendor/autoload.php';

use PhpOffice\PhpWord\PhpWord as Phpword;
use PhpOffice\PhpWord\IOFactory as IOFactory;
use PhpOffice\PhpWord\TemplateProcessor as TemplateProcessor;

function crearword($hojavida,$lineas){
	$template = new TemplateProcessor('../plantillas/formato_inscripcion.docx');

	$template->setValue("nombre_completo", ucwords(utf8_encode($hojavida['name'])));
	$template->setValue("ficha", utf8_encode($hojavida['f_formacion']));
	$template->setValue("programa_formacion", ucwords(utf8_encode($hojavida['program'])));
	$template->setValue("linea_investigacion", $lineas);
	$template->setValue("tipo_documento", ucwords(utf8_encode($hojavida['t_documento'])));
	$template->setValue("numero_docu", utf8_encode($hojavida['n_documento']));
	$template->setValue("correo", utf8_encode($hojavida['email_1']));
	$template->setValue("celular", utf8_encode($hojavida['n_telefono']));
	$template->setValue("fecha_naci", utf8_encode($hojavida['f_nacimiento']));
	$template->setValue("trimestre", utf8_encode($hojavida['trime']));
	
	return $template;
}
$sql = "SELECT concat(aprendiz.nombres,' ',aprendiz.apellidos) as name,programas.programa as program,trimestres.trimestre as trime,aprendiz.*,tipo_documento.tipo as t_documento,tipo_sangre.tipo as t_sangre FROM aprendiz 
INNER JOIN programas
INNER JOIN trimestres
INNER JOIN tipo_documento
INNER JOIN tipo_sangre
WHERE
aprendiz.id_prog = programas.id_prog AND
aprendiz.id_trim = trimestres.id_trim AND
aprendiz.id_doc = tipo_documento.id_doc AND
aprendiz.id_sa = tipo_sangre.id_sa";

$lineas = "SELECT lineas_investigacion.l_investigacion FROM lineas_investigacion
INNER JOIN aprendiz
INNER JOIN linea_asignada
WHERE
linea_asignada.id_apre = aprendiz.id_apre AND
linea_asignada.id_li = lineas_investigacion.id_li";


if(isset($_GET['id_apre']) && is_numeric($_GET['id_apre']) ){
	$id_apre = $_GET['id_apre'];
	$sql .= " AND aprendiz.id_apre = ".$id_apre;
	$lineas .= " AND aprendiz.id_apre = ".$id_apre;
	$linea = $bd->consulta($lineas);
	
	if( $hojavida = mysqli_fetch_array($bd->consulta($sql)) ){
		$lineas_in1 = "";
		foreach ($linea as $li) {
			$lineas_in1 .= "".utf8_encode($li['l_investigacion']).",";
		}

		$lineas_in = substr($lineas_in1,0,-1);

		$template = crearword($hojavida,$lineas_in);
		
		$nombre_arch = "HV_".utf8_encode($hojavida['n_documento']).".docx";

		header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document; charset=utf-8");
		header("Content-Disposition: attachment;filename=\"$nombre_arch\"");
		header("Cache-Control: max-age=0");
		ob_clean();
		$template->saveAs('php://output');
	}

} else {
	$word = [];

	$zip = new ZipArchive();

	$nombre_zip = "hojas_de_vidas.zip";
	$res = $zip->open($nombre_zip, ZipArchive::CREATE);

	$hojas_vida = $bd->consulta($sql);
	
	foreach ( $hojas_vida as $hv ) {
		
		$linea = $bd->consulta("SELECT lineas_investigacion.l_investigacion FROM lineas_investigacion
			INNER JOIN aprendiz
			INNER JOIN linea_asignada
			WHERE
			linea_asignada.id_apre = aprendiz.id_apre AND
			linea_asignada.id_li = lineas_investigacion.id_li AND 
			aprendiz.id_apre = ".$hv['id_apre']);

		$lineas_in1 = "";
		foreach ($linea as $li) {
			$lineas_in1 .= "".utf8_encode($li['l_investigacion']).",";
		}

		$lineas_in = substr($lineas_in1,0,-1);

		$template = crearword($hv,$lineas_in);

		$nombre_arch = "HV_".utf8_encode($hv['n_documento']).".docx";
		
		echo $hv['n_documento']."<br>";

		$ruta = "../HV/".$nombre_arch;
		$template->saveAs($ruta);

		$zip->addFile($ruta,basename($ruta));
		array_push($word, $ruta);
	}

	$zip->close();
	header("Content-type: application/octet-stream");
	header("Content-disposition: attachment; filename=$nombre_zip");

	readfile($nombre_zip);
	unlink($nombre_zip);

	for ($i=0; $i < count($word); $i++) { 
		unlink( $word[$i] );
	}
}
?>