<?php
	//Incluimos librería y archivo de conexión
require_once('../../ClassExcel/PHPExcel.php');
require_once("../../php/conex.php");


	//Consulta
$consulta = "SELECT * FROM ideascolombo";
$registro = $bd->consulta($consulta);

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
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:H6')->applyFromArray($estiloTituloReporte);
	$objPHPExcel->getActiveSheet()->getStyle('A8:H8')->applyFromArray($estiloTituloColumnas);
	
	$objPHPExcel->getActiveSheet()->setCellValue('D2', 'Reporte:');
	$objPHPExcel->getActiveSheet()->setCellValue('D3', 'Propuestas Ideas Colombo 2020');
	$objPHPExcel->getActiveSheet()->mergeCells('D2:I2');
	$objPHPExcel->getActiveSheet()->mergeCells('D3:I3');
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('A8', 'Título Propuesta');
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('B8', 'Instructor');
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('C8', 'Aprendiz');
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('D8', 'Ficha');
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('E8', 'Programa');
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('F8', 'E-Mail');
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(37);
	$objPHPExcel->getActiveSheet()->setCellValue('G8', 'Teléfono');
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);
	$objPHPExcel->getActiveSheet()->setCellValue('H8', 'Propuesta');
	
	//Recorremos los resultados de la consulta y los imprimimos
	while($rows = $registro->fetch_assoc()){

		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,utf8_encode($rows['titulo_propuesta']));
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,utf8_encode($rows['nombre_inst']));
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,utf8_encode($rows['nombre_apre']));
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila,utf8_encode($rows['ficha']));
		$objPHPExcel->getActiveSheet()->setCellValue('E'.$fila,utf8_encode($rows['programa']));
		$objPHPExcel->getActiveSheet()->setCellValue('F'.$fila,utf8_encode($rows['correo']));
		$objPHPExcel->getActiveSheet()->setCellValue('G'.$fila,utf8_encode($rows['telefono']));
		$objPHPExcel->getActiveSheet()->setCellValue('H'.$fila,utf8_encode($rows['propuesta']));
		
		$fila++; //Sumamos 1 para pasar a la siguiente fila
	}
	
	$fila = $fila-1;
	
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A9:H".$fila);

	$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	
	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="ReportePropuestas2020.xlsx"');
	header('Cache-Control: max-age=0');
	
	$writer->save('php://output');
	
	?>