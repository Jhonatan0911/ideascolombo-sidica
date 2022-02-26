<?php
session_start();
if(!isset($_SESSION['id_admin'])){
	header("Location:../index.php");
}

require_once('../php/conex.php');
$id_apre = $_POST['id_apre'];
//$id_apre = 8;

//datos del aprendiz
//SQL trae los datos del aprendiz sin proyecto asignado
$sql_aprendiz = "SELECT concat(aprendiz.nombres,' ',aprendiz.apellidos) as name,img_perfiles.img_ruta as rimga,img_perfiles.img_nombre as nimga,programas.programa as program,trimestres.trimestre as trime,aprendiz.*,tipo_documento.tipo as t_documento,tipo_sangre.tipo as t_sangre FROM aprendiz 
INNER JOIN img_perfiles
INNER JOIN programas
INNER JOIN trimestres
INNER JOIN tipo_documento
INNER JOIN tipo_sangre
WHERE
img_perfiles.id_apre = aprendiz.id_apre AND
aprendiz.id_prog = programas.id_prog AND
aprendiz.id_trim = trimestres.id_trim AND
aprendiz.id_doc = tipo_documento.id_doc AND
aprendiz.id_sa = tipo_sangre.id_sa AND
aprendiz.id_apre = {$id_apre}";
//SQL trae los datos del aprendiz con proyecto asignado
$sql_aprendiz_p = "SELECT concat(aprendiz.nombres,' ',aprendiz.apellidos) as name,proyectos.nombre_proyec as nproye,proyectos.proyec_rutaimg as rimgp,proyectos.proyec_nomimg as nimgp,img_perfiles.img_ruta as rimga,img_perfiles.img_nombre as nimga,programas.programa as program,trimestres.trimestre as trime,aprendiz.*,tipo_documento.tipo as t_documento,tipo_sangre.tipo as t_sangre FROM aprendiz 
INNER JOIN img_perfiles
INNER JOIN programas
INNER JOIN trimestres
INNER JOIN proyectos
INNER JOIN proyectos_asignados
INNER JOIN tipo_documento
INNER JOIN tipo_sangre
WHERE
proyectos_asignados.id_apre = aprendiz.id_apre AND
proyectos_asignados.id_proyec = proyectos.id_proyec AND
img_perfiles.id_apre = aprendiz.id_apre AND
aprendiz.id_prog = programas.id_prog AND
aprendiz.id_trim = trimestres.id_trim AND
aprendiz.id_doc = tipo_documento.id_doc AND
aprendiz.id_sa = tipo_sangre.id_sa AND
aprendiz.id_apre = {$id_apre}";
//SQL trae las lineas de investigación que se encuentra el estudiante
$sql_linea = "SELECT lineas_investigacion.l_investigacion FROM lineas_investigacion
INNER JOIN aprendiz
INNER JOIN linea_asignada
WHERE
linea_asignada.id_apre = aprendiz.id_apre AND
linea_asignada.id_li = lineas_investigacion.id_li AND
aprendiz.id_apre = {$id_apre}";
//SQL que valida si el aprendiz tiene asignado un proyecto
$sql_valiP = mysqli_fetch_array($bd->consulta("SELECT count(*) as cont FROM proyectos INNER JOIN proyectos_asignados INNER JOIN aprendiz
	WHERE aprendiz.id_apre = proyectos_asignados.id_apre AND proyectos.id_proyec = proyectos_asignados.id_proyec AND aprendiz.id_apre = {$id_apre}"));

$result1 = $bd->consulta($sql_aprendiz);
$result1_1 = $bd->consulta($sql_aprendiz_p);
$result2 = $bd->consulta($sql_linea);

if($sql_valiP['cont'] == 0){ ?>
	<?php 
	foreach($result1 as $datos): ?>
		<div class="card">
			<div class="header bg-cyan">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-6">
						<h2>
							<?php echo utf8_encode($datos['name']); ?> <small>Detalles personales del aprendiz</small>
						</h2>
					</div>
				<!--<div class="col-md-1 col-md-push-7 col-sm-2 col-sm-push-6 col-xs-2 col-xs-push-4">
					<a href="javascript:void(0);">
						<img src="../img/logo.png" class="img-responsive" width="50" height="50">
					</a>
				</div>-->
			</div>
		</div>
		<div class="body">
			<div class="row">
				<div class="col-md-6 col-md-push-4 col-sm-6 col-sm-push-4 col-xs-6 col-xs-push-2">
					<a href="javascript:void(0);" class="thumbnail img-size">
						<img src="<?php echo $datos['rimga'] ?><?php echo $datos['nimga'] ?>" class="img-size img-responsive">
					</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<th>Programa</th>
							<td><?php echo utf8_encode($datos['program']); ?></td>
						</tr>
						<tr>
							<th>Ficha</th>
							<td><?php echo $datos['f_formacion']; ?></td>
						</tr>
						<tr>
							<th>Trimestre</th>
							<td><?php echo $datos['trime']; ?></td>
						</tr>
						<tr>
							<th>Lineas de investigación</th>
							<td>
								<?php foreach($result2 as $linea): ?>
									<?php echo utf8_encode($linea['l_investigacion']); ?><br>
								<?php endforeach; ?>
							</td>
						</tr>
						<tr>
							<th>Tipo Documento</th>
							<td><?php echo utf8_encode($datos['t_documento']); ?></td>
						</tr>
						<tr>
							<th>Número Documento</th>
							<td><?php echo $datos['n_documento']; ?></td>
						</tr>
						<tr>
							<th>Fecha De Nacimiento</th>
							<td><?php echo $datos['f_nacimiento']; ?></td>
						</tr>
						<tr>
							<th>Edad</th>
							<td><?php echo $datos['edad']; ?></td>
						</tr>
						<tr>
							<th>Tipo Sangre</th>
							<td><?php echo $datos['t_sangre']; ?></td>
						</tr>
						<tr>
							<th>Dirección</th>
							<td><?php echo $datos['direccion']; ?></td>
						</tr>
						<tr>
							<th>Email</th>
							<td><?php echo $datos['email_1']; ?></td>
						</tr>
						<tr>
							<th>Teléfono</th>
							<td><?php echo $datos['n_telefono']; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div>
		<button type="button" class="volver btn btn-success waves-effect col-sm-3 col-md-2">Volver</button>
	</div>
	<br><br>
<?php  endforeach; ?>
<?php }
else{ ?>
	<?php
	
	foreach($result1_1 as $datos2): ?>
		<div class="card">
			<div class="header bg-cyan">
				<div class="row hidden-print ">
					<div class="col-md-4 col-sm-4 col-xs-6">
						<h2>
							<?php echo utf8_encode($datos2['name']); ?> <small>Detalles personales del aprendiz</small>
						</h2>
					</div>
					<div class="col-md-2 col-md-push-6 col-sm-3 col-sm-push-5 col-xs-3 col-xs-push-3">
						<a href="javascript:void(0);">
							<img src="<?php echo $datos2['rimgp'] ?><?php echo $datos2['nimgp'] ?>" class="img-responsive" width="90">
						</a>
					</div>
				</div>
			</div>
			<div class="body">
				<div class="row">
					<div class="col-md-6 col-md-push-4 col-sm-6 col-sm-push-4 col-xs-6 col-xs-push-2">
						<a href="javascript:void(0);" class="thumbnail img-size">
							<img src="<?php echo $datos2['rimga'] ?><?php echo $datos2['nimga'] ?>" class="img-size img-responsive">
						</a>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<th>Proyecto</th>
								<td><?php echo utf8_encode($datos2['nproye']); ?></td>
							</tr>
							<tr>
								<th>Programa</th>
								<td><?php echo utf8_encode($datos2['program']); ?></td>
							</tr>
							<tr>
								<th>Ficha</th>
								<td><?php echo $datos2['f_formacion']; ?></td>
							</tr>
							<tr>
								<th>Trimestre</th>
								<td><?php echo $datos2['trime']; ?></td>
							</tr>
							<tr>
								<th>Lineas de investigación</th>
								<td>
									<?php foreach($result2 as $linea): ?>
										<?php echo utf8_encode($linea['l_investigacion']); ?><br>
									<?php endforeach; ?>
								</td>
							</tr>
							<tr>
								<th>Tipo Documento</th>
								<td><?php echo utf8_encode($datos2['t_documento']); ?></td>
							</tr>
							<tr>
								<th>Número Documento</th>
								<td><?php echo $datos2['n_documento']; ?></td>
							</tr>
							<tr>
								<th>Fecha De Nacimiento</th>
								<td><?php echo $datos2['f_nacimiento']; ?></td>
							</tr>
							<tr>
								<th>Edad</th>
								<td><?php echo $datos2['edad']; ?></td>
							</tr>
							<tr>
								<th>Tipo Sangre</th>
								<td><?php echo $datos2['t_sangre']; ?></td>
							</tr>
							<tr>
								<th>Dirección</th>
								<td><?php echo $datos2['direccion']; ?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?php echo $datos2['email_1']; ?></td>
							</tr>
							<tr>
								<th>Teléfono</th>
								<td><?php echo $datos2['n_telefono']; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div>
			<button type="button" class="volver btn btn-success waves-effect col-sm-3 col-md-2">Volver</button>
		</div>
		<br><br>
	<?php  endforeach; ?>
<?php };
?>