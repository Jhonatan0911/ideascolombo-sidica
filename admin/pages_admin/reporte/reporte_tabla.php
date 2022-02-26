<?php 

require_once("../../php/conex.php");
$idli = $_POST['idli'];


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
	?>
	<div class="header">
		<form action="reporte/export_excel.php" method="POST">
			<input type="hidden" id="idli" name="idli" value="<?php echo $idli; ?>">
			<button type="submit" class="btn bg-blue btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Descargar" id="btn_excel"><i class="material-icons">file_download</i></button>
		</form>
	</div>

	<div class="body">
		<div class="row clearfix">
			<h1>Reporte estudiantes registrados en: "<?php echo utf8_encode($linea['l_investigacion']); ?>" </h1>
		</div>
		<div class="row clearfix">
			<div class="table-responsive">
				<table id="tablita" class="table table-hover table-striped">
					<thead>
						<tr>
							<th>Nombre Completo</th>
							<th>Programa Formación</th>
							<th>Ficha Formación</th>
							<th>Trimestre</th>
							<th>Tipo documento</th>
							<th>Numero documento</th>
							<th>Fecha Nacimiento</th>
							<th>Edad</th>
							<th>Tipo Sangre</th>
							<th>Dirección</th>
							<th>Email</th>
							<th>Teléfono</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($result as $datos): ?>
							<tr>
								<td><?php echo utf8_encode($datos['name']); ?></td>
								<td><?php echo utf8_encode($datos['program']); ?></td>
								<td><?php echo utf8_encode($datos['f_formacion']); ?></td>
								<td><?php echo utf8_encode($datos['trime']); ?></td>
								<td><?php echo utf8_encode($datos['t_documento']); ?></td>
								<td><?php echo utf8_encode($datos['n_documento']); ?></td>
								<td><?php echo utf8_encode($datos['f_nacimiento']); ?></td>
								<td><?php echo utf8_encode($datos['edad']); ?></td>
								<td><?php echo utf8_encode($datos['t_sangre']); ?></td>
								<td><?php echo utf8_encode($datos['direccion']); ?></td>
								<td><?php echo utf8_encode($datos['email_1']); ?></td>
								<td><?php echo utf8_encode($datos['n_telefono']); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>