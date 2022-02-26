<?php
	//Incluimos librería y archivo de conexión
require_once('../../ClassExcel/PHPExcel.php');
require_once("../../php/conex.php");
$id_li = $_GET['id_li'];

//Consulta datos iniciales del aprendiz
$result = $bd->consulta("SELECT aprendiz.fecha_registro as fechr,aprendiz.id_apre as id_apre,aprendiz.nombres as nombre ,aprendiz.apellidos as apell,tipo_documento.tipo as tdoc,aprendiz.n_documento as ndoc,aprendiz.f_nacimiento as fnaci,aprendiz.edad as edad,tipo_sangre.tipo as tsan,aprendiz.direccion as direc,programas.programa as prog,aprendiz.f_formacion as ffor,trimestres.trimestre as trime,aprendiz.email_1 as mail,aprendiz.n_telefono as tel FROM aprendiz
	INNER JOIN programas
	INNER JOIN trimestres
	INNER JOIN linea_asignada
	INNER JOIN lineas_investigacion
	INNER JOIN tipo_documento
	INNER JOIN tipo_sangre
	WHERE
	aprendiz.id_prog = programas.id_prog AND
	aprendiz.id_trim = trimestres.id_trim AND
	linea_asignada.id_apre = aprendiz.id_apre AND
	linea_asignada.id_li = lineas_investigacion.id_li AND
	aprendiz.id_doc = tipo_documento.id_doc AND
	aprendiz.id_sa = tipo_sangre.id_sa AND
	linea_asignada.id_li = {$id_li}");

	$fila = 9; //Establecemos en que fila iniciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('../../img/LogoS_excel.png');//Logotipo
	
	//Objeto de PHPExcel
	$objPHPExcel  = new PHPExcel();
	
	//Propiedades de Documento
	$objPHPExcel->getProperties()->setCreator("Fabrica de software")->setDescription("Semillero de investigación");
	
	//Establecemos la pestaña activa y nombre a la pestaña
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Reporte");
	
	$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
	$objDrawing->setName('Logotipo');
	$objDrawing->setDescription('Logotipo');
	$objDrawing->setImageResource($gdImage);
	$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
	$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
	
	$objDrawing->setCoordinates('A1');
	$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
	
	$estiloTituloReporte = array(
		'font' => array(
			'name'      => 'Agency FB',
			'bold'      => false,
			'italic'    => false,
			'strike'    => false,
			'size' =>22
		),
		'fill' => array(
			'type'  => PHPExcel_Style_Fill::FILL_SOLID
		),
		'borders' => array(
			'allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_NONE
			)
		),
		'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		)
	);
	
	$estiloTituloColumnas = array(
		'font' => array(
			'name'  => 'Agency FB',
			'bold'  => true,
			'size' =>16,
			'color' => array(
				'rgb' => 'FFFFFF'
			)
		),
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb' => '538DD5')
		),
		'borders' => array(
			'allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN
			)
		),
		'alignment' =>  array(
			'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
		)
	);
	
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
		'font' => array(
			'name'  => 'Agency FB',
			'size' =>16,
			'color' => array(
				'rgb' => '000000'
			)
		),
		'fill' => array(
			'type'  => PHPExcel_Style_Fill::FILL_SOLID
		),
		'borders' => array(
			'allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN
			)
		),
		'alignment' =>  array(
			'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
		)
	));
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:Q6')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A8:Q8')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('D2', 'Reporte:');

	switch ($id_li) {
		case 1:
		$objPHPExcel->getActiveSheet()->setCellValue('D3', 'Aprendices Registrados En La Linea Inv. : 24 HORAS');
		break;
		
		case 2:
		$objPHPExcel->getActiveSheet()->setCellValue('D3', 'Aprendices Registrados En La Linea Inv. : Diseño e Ingeniería (DINGE)');
		break;

		case 3:
		$objPHPExcel->getActiveSheet()->setCellValue('D3', 'Aprendices Registrados En La Linea Inv. : Electrónica y Telecomunicaciones (ELTEL)');
		break;

		case 4:
		$objPHPExcel->getActiveSheet()->setCellValue('D3', 'Aprendices Registrados En La Linea Inv. : Fábrica de Software');
		break;

		case 5:
		$objPHPExcel->getActiveSheet()->setCellValue('D3', 'Aprendices Registrados En La Linea Inv. : Tecnologías Virtuales (TEVIR)');
		break;

		case 6:
		$objPHPExcel->getActiveSheet()->setCellValue('D3', 'Aprendices Registrados En La Linea Inv. : Materiales');
		break;
	}
	
	$objPHPExcel->getActiveSheet()->mergeCells('D2:I2');
	$objPHPExcel->getActiveSheet()->mergeCells('D3:I3');
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('A8', 'Fecha de registro');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('B8', 'Nombres');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('C8', 'Apellidos');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('D8', 'Tipo de documento');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('E8', 'Número de documento');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('F8', 'Fecha de nacimiento');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('G8', 'Edad');
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('H8', 'Tipo de sangre');
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('I8', 'Dirección');
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('J8', 'Programa de formación');
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('K8', 'Ficha de formación');
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('L8', 'Trimestre en curso');
	$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('M8', 'Dirección de correo electrónico');
	$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('N8', 'Número telefónico');
	$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('O8', 'Línea de investigación');
	$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('P8', 'Selecciona los días de tu preferencia [Tarde]');
	$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('Q8', 'Selecciona los días de tu preferencia [Mañana]');
	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $result->fetch_assoc()){
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,utf8_encode($rows['fechr']));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,utf8_encode($rows['nombre']));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,utf8_encode($rows['apell']));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila,utf8_encode($rows['tdoc']));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila,utf8_encode($rows['ndoc']));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila,utf8_encode($rows['fnaci']));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila,utf8_encode($rows['edad']));
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila,utf8_encode($rows['tsan']));
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$fila,utf8_encode($rows['direc']));
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila,utf8_encode($rows['prog']));
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$fila,utf8_encode($rows['ffor']));
		$objPHPExcel->getActiveSheet()->setCellValue('L'.$fila,utf8_encode($rows['trime']));
		$objPHPExcel->getActiveSheet()->setCellValue('M'.$fila,utf8_encode($rows['mail']));
		$objPHPExcel->getActiveSheet()->setCellValue('N'.$fila,utf8_encode($rows['tel']));

		//consulta de linea de investigacion
		$linea_inv = $bd->consulta("SELECT l_investigacion as linv FROM lineas_investigacion
			INNER JOIN aprendiz
			INNER  JOIN linea_asignada
			WHERE
			linea_asignada.id_apre = aprendiz.id_apre AND 
			linea_asignada.id_li = lineas_investigacion.id_li AND 
			linea_asignada.id_apre = ".$rows['id_apre']);

		if($linea_inv->num_rows > 0){
			$txt_linea_inv = "";

			while($linea = $linea_inv->fetch_assoc()){
				$txt_linea_inv .= "".utf8_encode($linea['linv']).", ";
			}
			$txt_linea_inv = substr($txt_linea_inv,0,-2);

			$objPHPExcel->getActiveSheet()->setCellValue('O'.$fila,$txt_linea_inv);
		}else{
			$objPHPExcel->getActiveSheet()->setCellValue('O'.$fila," ");
		}

		//consulta de horario tarde
		$dia_td = $bd->consulta("SELECT dia as diat FROM dias_tarde
			INNER JOIN aprendiz
			INNER  JOIN reserva_tarde
			WHERE
			reserva_tarde.id_apre = aprendiz.id_apre AND 
			reserva_tarde.id_dt = dias_tarde.id_dt AND 
			reserva_tarde.id_apre = ".$rows['id_apre']);

		if($dia_td->num_rows > 0){
			$txt_dia_td = "";

			while($dia = $dia_td->fetch_assoc()){
				$txt_dia_td .= "".utf8_encode($dia['diat']).", ";
			}
			$txt_dia_td = substr($txt_dia_td,0,-2);

			$objPHPExcel->getActiveSheet()->setCellValue('P'.$fila,$txt_dia_td);
		}else{
			$objPHPExcel->getActiveSheet()->setCellValue('P'.$fila," ");
		}
		
		//consulta de horario mañana
		$dia_mn = $bd->consulta("SELECT dia as diam FROM dias_maniana
			INNER JOIN aprendiz
			INNER  JOIN reserva_maniana
			WHERE
			reserva_maniana.id_apre = aprendiz.id_apre AND 
			reserva_maniana.id_dm = dias_maniana.id_dm AND 
			reserva_maniana.id_apre = ".$rows['id_apre']);

		if($dia_mn->num_rows > 0){
			$txt_dia_mn = "";

			while($dia = $dia_mn->fetch_assoc()){
				$txt_dia_mn .= "".utf8_encode($dia['diam']).", ";
			}
			$txt_dia_mn = substr($txt_dia_mn,0,-2);

			$objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila,$txt_dia_mn);
		}else{
			$objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila," ");
		}

		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A9:Q".$fila);

	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	switch ($id_li) {
		case 1:
		header('Content-Disposition: attachment;filename="exportacion_24horas.xlsx"');
		break;
		
		case 2:
		header('Content-Disposition: attachment;filename="exportacion_dinge.xlsx"');
		break;

		case 3:
		header('Content-Disposition: attachment;filename="exportacion_eltel.xlsx"');
		break;

		case 4:
		header('Content-Disposition: attachment;filename="exportacion_FS.xlsx"');
		break;

		case 5:
		header('Content-Disposition: attachment;filename="exportacion_tevir.xlsx"');
		break;

		case 6:
		header('Content-Disposition: attachment;filename="exportacion_materiales.xlsx"');
		break;
	}
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
	?>