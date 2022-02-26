<?php 
require_once("../php/conex.php");
$videos = $bd->consulta("SELECT * FROM videos");
?>
<div class="container-fluid">
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header row">
					<div class="col-xs-3 col-sm-3 col-md-3">
						<h4>Videos</h4>
					</div>
				</div>
				<div class="body">
					<form id="formulario_videos">
						<?php 
						$cont = 1;
						foreach($videos as $datos): ?>
							<div class="card">
								<div class="header">
									<h2>
										Video #<?php echo $cont; ?>
										<small>SIDICA ADMIN</small>
									</h2>
								</div>
								<div class="body">
									<label for="url<?php echo $cont; ?>">URL</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="url<?php echo $cont; ?>" name="url<?php echo $cont; ?>" class="form-control" value="<?php echo $datos['url'] ?>" placeholder="Ingrese URL">
										</div>
									</div>
									<label for="titulo<?php echo $cont; ?>">Titulo</label>
									<div class="form-group">
										<div class="form-line">
											<input type="text" id="titulo<?php echo $cont; ?>" name="titulo<?php echo $cont; ?>" class="form-control" value="<?php echo utf8_encode($datos['titulo']); ?>" placeholder="Ingrese Titulo">
										</div>
									</div>
								</div>
							</div>
							<?php $cont++; ?>
						<?php endforeach; ?>
						<button type="button" id="btn_actu_video" class="btn btn-lg btn-primary m-t-15 waves-effect">Actualizar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>