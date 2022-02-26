<?php 
function fechas(){
	$text = "";
	$anio = date("Y");
	$anioIni = "2017";
	while ($anio != $anioIni) {
		$text .= "<option value=\"".$anio."\" >".$anio."</option>";
		$anio--;
	}

	return $text;
}
?>
<div id="uno" class="row clearfix">
	<div class="col-md-10 col-md-push-1">
		<div class="card">
			<div class="header">
				<h3><strong><em>Bienvenido</em></strong></h3>
			</div>
			<div class="body">
				<h5 class="card-title">Reporte General - Lineas De investigación</h5>
				<p class="card-text">En esta área podrá realizar la consulta del reporte por gráfica de todas los aprendices registrados en cada una de las Lineas De investigación.</p>
				<div class="row">
					<div class="col-md-9">
						<select id="fecha" class="form-control show-tick">
							<option value="0" selected="">Todos</option>
							<?php echo fechas(); ?>
						</select>
					</div>
					<div class="col-md-3">
						<button id="generar" class="btn btn-primary">Generar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row clearfix">
	<div class="col-md-10 col-md-push-1">
		<div id="dos_vista" class="card" style="display: none">
			<div class="body">
				<div id="graf_gener">
					<div>
						<canvas id="dos" style="border: 1px solid #ccc"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>