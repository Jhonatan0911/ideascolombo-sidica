<?php 
require_once("../php/conex.php");
$tipo_porta = $bd->consulta("SELECT * FROM tipo_portafolio");
?>
<div class="container-fluid">
	<div class="row clearfix">
		<div id="tb_noti" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<h4>Portafolio:</h4>
					</div>
					<div class="col-xs-offset-6 col-xs-2 col-sm-offset-7 col-sm-2 col-md-offset-7 col-md-2">
						<button type="button" id="add_porta" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Nuevo">
							<i class="material-icons">add</i>
						</button>
					</div>
				</div>
				<div class="body">
					<div class="table-responsive">
						<table id="example_porta" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre de la imagen</th>
									<th>Tipo de imagen</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- MODAL PARA ACTUALIZAR -->
<div class="modal fade" id="modal_actuPorta" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel">ACTUALIZAR:</h4>
			</div>
			<div class="modal-body">
				<form enctype="multipart/form-data" class="form-horizontal" id="form_portafolio">
					<div class="col-xs-12">
						<div id="porta_update" class="card">
							<div class="header">
								<h2>
									Datos del portafolio
								</h2>
							</div>
							<div class="body">
								<div class="row clearfix">
									<div id="tipos" class="col-md-6 col-md-offset-1 col-sm-4 col-offset-sm-4 col-xs-5 col-offset-xs-5">
										<select id="tipo_portaUpdate" name="tipo_portaUpdate" class="form-control show-tick">
											<option value="0">-- Por favor Seleccione --</option>
											<?php foreach($tipo_porta as $tipo): ?>
												<option value="<?php echo $tipo['id'] ?>"><?php echo utf8_encode($tipo['tipo']) ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label>Imagen Actual</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<img id="img_previPorta" style="height: 200px;width: 200px;" class="img-fluid">
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="img_porta_upda">Nueva Imagen</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="file" id="img_porta_upda" name="img_porta_upda" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="btn_savePorta" type="button" class="btn btn-link waves-effect">Guardar Cambios</button>
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<!-- MODAL PARA AGREGAR -->
<div class="modal fade" id="modal_add_porta" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel">AGREGAR:</h4>
			</div>
			<div class="modal-body">
				<form enctype="multipart/form-data" class="form-horizontal" id="form_addPortafolio">
					<input type="hidden" id="id_porta" value="">
					<div class="col-xs-12">
						<div id="porta_img" class="card">
							<div class="header">
								<h2>
									Datos para el portafolio
								</h2>
							</div>
							<div class="body">
								<div class="row clearfix">
									<div class="col-md-6 col-md-offset-1 col-ms-6 col-ms-offset-3 col-xs-12">
										<select id="tipo_porta" name="tipo_porta" class="form-control show-tick">
											<option value="0" selected>-- Por favor Seleccione --</option>
											<?php foreach($tipo_porta as $tipo): ?>
												<option value="<?php echo $tipo['id'] ?>"><?php echo utf8_encode($tipo['tipo']) ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="img_porta_add">Imagen</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="file" id="img_porta_add" name="img_porta_add" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button id="btn_addd" type="button" class="btn btn-link waves-effect">Guardar</button>
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>