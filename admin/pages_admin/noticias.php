<div class="container-fluid">
	<div class="row clearfix">
		<div id="tb_noti" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<h4>Noticias</h4>
					</div>
					<div class="col-xs-offset-6 col-xs-2 col-sm-offset-7 col-sm-2 col-md-offset-7 col-md-2">
						<button type="button" id="add" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top" title="Nuevo">
							<i class="material-icons">add</i>
						</button>
					</div>
				</div>
				<div class="body">
					<div class="table-responsive">
						<table id="example_noti" class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Titulo de noticia</th>
									<th>Fecha</th>
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
<div class="modal fade" id="modal_actu" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel">ACTUALIZAR:</h4>
			</div>
			<div class="modal-body">
				<form enctype="multipart/form-data" class="form-horizontal" id="form_noticia">
					<input type="hidden" id="id_noti" value="">
					<div class="col-xs-12 justify-content-end">
						<div id="noti_corta" class="card">
							<div class="header">
								<h2>
									Noticia Corta
								</h2>
							</div>
							<div class="body">
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="titulo_noti-corta">Titulo</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="text" id="titulo_noti-corta" name="titulo_noti-corta" class="form-control" placeholder="Ingresar Titulo de la noticia">
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="fecha_noti-corta">Fecha</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="text" id="fecha_noti-corta" name="fecha_noti-corta" class="form-control" placeholder="Ingresar Fecha de la noticia">
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label>Imagen Actual</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">		
										<img id="img_previ" style="height: 200px;width: 200px;" class="img-fluid">
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="img_noti-corta">Nueva Imagen</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="file" id="img_noti-corta" name="img_noti-corta" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div id="noti_gene" class="card">
							<div class="header">
								<h2>
									Noticia General
								</h2>
							</div>
							<div class="body">
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="titulo_noti-gener">Titulo</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="text" id="titulo_noti-gener" name="titulo_noti-gener" class="form-control" placeholder="Ingresar Titulo de la noticia">
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="fecha_noti-gener">Fecha</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="text" id="fecha_noti-gener" name="fecha_noti-gener" class="form-control" placeholder="Ingresar Fecha de la noticia">
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label>Imagen Actual</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<img id="img_previ2" style="height: 200px;width: 200px;" class="img-fluid">
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="img_noti-gener">Nueva Imagen</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="file" id="img_noti-gener" name="img_noti-gener" class="form-control">
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="descrip_noti-gener">Descripción</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<textarea style="height: 120px;" id="descrip_noti-gener" name="descrip_noti-gener" class="form-control" placeholder="Ingresar Descripción de la noticia"></textarea>
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
				<button id="btn_save" type="button" class="btn btn-link waves-effect">Guardar Cambios</button>
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<!-- MODAL PARA AGREGAR -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="largeModalLabel">AGREGAR:</h4>
			</div>
			<div class="modal-body">
				<form enctype="multipart/form-data" class="form-horizontal" id="form_addNoticia">
					<input type="hidden" id="id_noti" value="">
					<div class="col-xs-12 justify-content-end">
						<div id="noti_corta_add" class="card">
							<div class="header">
								<h2>
									Noticia Corta
								</h2>
							</div>
							<div class="body">
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="titulo_noti-corta_add">Titulo</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="text" id="titulo_noti-corta_add" name="titulo_noti-corta_add" class="form-control" placeholder="Ingresar Titulo de la noticia">
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="fecha_noti-corta_add">Fecha</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="text" id="fecha_noti-corta_add" name="fecha_noti-corta_add" class="form-control" placeholder="Ingresar Fecha de la noticia">
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="img_noti-corta_add">Imagen</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="file" id="img_noti-corta_add" name="img_noti-corta_add" class="form-control">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div id="noti_gene_add" class="card">
							<div class="header">
								<h2>
									Noticia General
								</h2>
							</div>
							<div class="body">
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="titulo_noti-gener_add">Titulo</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="text" id="titulo_noti-gener_add" name="titulo_noti-gener_add" class="form-control" placeholder="Ingresar Titulo de la noticia">
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="fecha_noti-gener_add">Fecha</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="text" id="fecha_noti-gener_add" name="fecha_noti-gener_add" class="form-control" placeholder="Ingresar Fecha de la noticia">
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="img_noti-gener_add">Imagen</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<input type="file" id="img_noti-gener_add" name="img_noti-gener_add" class="form-control">
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
										<label for="descrip_noti-gener_add">Descripción</label>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
										<div class="form-group">
											<div class="form-line">
												<textarea style="height: 120px;" id="descrip_noti-gener_add" name="descrip_noti-gener_add" class="form-control" placeholder="Ingresar Descripción de la noticia"></textarea>
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
				<button id="btn_add" type="button" class="btn btn-link waves-effect">Guardar</button>
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>