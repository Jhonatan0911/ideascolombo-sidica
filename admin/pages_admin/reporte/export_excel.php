<?php
	//Incluimos librería y archivo de conexión
require_once('../../ClassExcel/PHPExcel.php');
require_once("../../php/conex.php");
$idli = $_POST['idli'];


	///Consulta
$linea = mysqli_fetch_array($bd->consulta("SELECT * FROM lineas_investigacion WHERE id_li = $idli"));


$result = $bd->consulta("SELECT concat(aprendiz.nombres,' ',aprendiz.apellidos) as name,programas.programa as program,trimestres.trimestre as trime,aprendiz.*,tipo_documento.tipo as t_documento,tipo_sangre.tipo as t_sangre FROM aprendiz
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
	linea_asignada.id_li = {$idli}");

	$fila = 9; //Establecemos en que fila iniciara a imprimir los datos
	
	$gdImage = imagecreatefrompng('../../img/LogoS_excel.png');
	//Logotipo
	
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
	));
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:L6')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A8:L8')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('D2', 'Reporte:');
	$objPHPExcel->getActiveSheet()->setCellValue('D3', 'Registrados en la linea de investigación: '.utf8_encode($linea['l_investigacion']));
	$objPHPExcel->getActiveSheet()->mergeCells('D2:I2');
	$objPHPExcel->getActiveSheet()->mergeCells('D3:I3');
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('A8', 'Nombre Completo');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('B8', 'Programa de Formación');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('C8', 'Ficha Formación');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(13);
	$objPHPExcel->getActiveSheet()->setCellValue('D8', 'Trimestre');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('E8', 'Tipo documento');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	$objPHPExcel->getActiveSheet()->setCellValue('F8', 'Número documento');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(18);
	$objPHPExcel->getActiveSheet()->setCellValue('G8', 'Fecha Nacimiento');
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(9);
	$objPHPExcel->getActiveSheet()->setCellValue('H8', 'Edad');
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(13);
	$objPHPExcel->getActiveSheet()->setCellValue('I8', 'Tipo Sangre');
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(35);
	$objPHPExcel->getActiveSheet()->setCellValue('J8', 'Dirección');
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
	$objPHPExcel->getActiveSheet()->setCellValue('K8', 'Email');
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
	$objPHPExcel->getActiveSheet()->setCellValue('L8', 'Teléfono');
	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $result->fetch_assoc()){
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,utf8_encode($rows['name']));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,utf8_encode($rows['program']));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,utf8_encode($rows['f_formacion']));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila,utf8_encode($rows['trime']));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila,utf8_encode($rows['t_documento']));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila,utf8_encode($rows['n_documento']));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila,utf8_encode($rows['f_nacimiento']));
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila,utf8_encode($rows['edad']));
		$objPHPExcel->getActiveSheet()->setCellValue('I'.$fila,utf8_encode($rows['t_sangre']));
		$objPHPExcel->getActiveSheet()->setCellValue('J'.$fila,utf8_encode($rows['direccion']));
		$objPHPExcel->getActiveSheet()->setCellValue('K'.$fila,utf8_encode($rows['email_1']));
		$objPHPExcel->getActiveSheet()->setCellValue('L'.$fila,utf8_encode($rows['n_telefono']));
		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A9:L".$fila);

	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="Reporte_Semillero_LI'.$linea['id_li'].'.xlsx"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
	
	?>