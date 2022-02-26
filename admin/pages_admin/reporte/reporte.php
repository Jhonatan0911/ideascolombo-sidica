<?php 
require_once("../../php/conex.php");
$sql_li = $bd->consulta("SELECT * FROM lineas_investigacion 
	ORDER BY l_investigacion");
	?>
	<div id="uno" class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div id="recorrer" >
				<div class="card">
					<div class="body">
						<div class="row clearfix">
							<p>
								<h5><em>Lineas de Investigación:</em></h5>
							</p>

							<div>
								<form id="form_1">
									<div class="row clearfix">
										<div class="col-md-9">
											<select id="li1" class="form-control show-tick">
												<option value="0" selected>--- Elige una linea de investigación ---</option>
												<?php foreach($sql_li as $li): ?>
													<option value="<?php echo $li['id_li'] ?>"><?php echo utf8_encode($li['l_investigacion']); ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-md-3">
											<input type="button" name="btn2" id="btn2" class="btn btn-primary" value="Generar">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="content_tb" class="row clearfix" style="display: none;">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div id="tabla_reporte">

				</div>
			</div>
		</div>
	</div>
