<?php
require_once("php/conex.php");
$programa = $bd->consulta("SELECT * FROM programas");
$linea = $bd->consulta("SELECT * FROM lineas_investigacion");
$t_doc = $bd->consulta("SELECT * FROM tipo_documento");
$t_san = $bd->consulta("SELECT * FROM tipo_sangre");
$trim = $bd->consulta("SELECT * FROM trimestres");
$tsangre = $bd->consulta("SELECT * FROM tipo_sangre");
$noticias6 = $bd->consulta("SELECT * FROM noticia_notificacion ORDER BY id_noti DESC LIMIT 6");
$noticias = $bd->consulta("SELECT * FROM noticia_notificacion ORDER BY id_noti DESC LIMIT 100 OFFSET 6");
$tipoRol = $bd->consulta("SELECT * FROM roles WHERE id_roles > 1");
$videos = $bd->consulta("SELECT * FROM videos");
$portafolio = $bd->consulta("SELECT portafolio.nameImg as nameimg, tipo_portafolio.tipo as tipo FROM portafolio INNER JOIN tipo_portafolio WHERE portafolio.tipo = tipo_portafolio.id ORDER BY rand()");
?>
<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="Sennova, Sidica, Fabrica Software, Sena, Colombo Alemán">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="Juan David Castro">
	<link href="img/favicoSENA.png" rel="icon" type="image/x-icon">
	<title>Ideas Colombo</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/line-icons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/menu_sideslide.css">
	<link rel="stylesheet" href="css/alertify.min.css">
	<link rel="stylesheet" href="css/themes/bootstrap.min.css">
	<link rel="stylesheet" href="css/main2.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/materialdesignicons.min.css">
	<link rel="stylesheet" id="colors" href="css/colors/morado.css" type="text/css">
	<style>
		.bg-white .navbar-nav .nav-link:hover {
			color: #6A1849 !important;
		}

		body {
			font-family: Raleway !important;
			font-style: normal !important;
			background-color: #FBF7ED !important;
		}

		/* Colores globales */
		.primary {
			color: #025554 !important;
		}

		.secondary {
			color: #E99C3C !important;
		}

		/* Fondos globales */
		.bg-primary {
			background-color: #025554 !important;
		}

		.bg-secondary {
			background-color: #E99C3C !important;
		}

		.bg-third {
			background-color: #FBF7ED !important;
		}

		/* Botones globales */
		.btn-primary {
			background-color: #027B78 !important;
			border-color: #027B78 !important;
		}

		.btn-secondary {
			background-color: #E99C3C !important;
			border-radius: 20px !important;
			border-color: #E99C3C !important;
		}

		.btn-third {
			background-color: #FBF7ED !important;
		}

		.btn-primary:hover {
			background-color: hsl(179, 97%, 20%) !important;
		}

		.btn-secondary:hover {
			background-color: hsl(33, 80%, 45%) !important;
		}

		.btn-third:hover {
			background-color: hsl(0, 0%, 70%) !important;
		}

		a {
			font-size: 1em !important;
		}

		.menu a {
			position: relative;
			display: block;
			padding: 5px;
		}

		.menu a::before {
			content: '';
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
			height: 2px;
			background: linear-gradient(to right, #04a7a4, #037472, #013b3a);
			z-index: 1;
			transform: scaleX(0);
			transform-origin: left;
			transition: transform 0.5s ease-in-out;
		}

		.menu a:hover::before {
			transform: scaleX(1);
		}

		.w100 {
			max-width: 100vw !important;
			width: 100vw !important;
		}
		.modal-backdrop{
			display: none !important;
		}
		.modal-header{
			border-bottom-width: 0px !important;
			padding-bottom: 0px !important;
		}
		.modal-body{
			padding-top: 0px !important;
		}

	</style>
	<!-- Google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Tailwind -->
	<script src="https://cdn.tailwindcss.com"></script>
	<!-- Bootstrapp -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>

	<!-- <header id="slider-area">
		<nav class="navbar navbar-expand-md fixed-top scrolling-navbar bg-white">
			<div class="container">
				<a class="navbar-brand" href="index.php"><span><img src="img/logo_ideas.png" class="tam_logo" alt=""></span></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<i class="lni-menu"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav mr-auto w-100 justify-content-end">
						<li class="nav-item">
							<a class="nav-link page-scroll" href="#slider-area">Inicio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link page-scroll" href="#formato">Pre-Inscripción Idea Colombo</a>
						</li>
						<li class="nav-item">
							<a class="nav-link page-scroll" href="#reglamento">Reglamento</a>
						</li>
						<li class="nav-item">
							<a class="nav-link page-scroll" href="#footer">Contáctanos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link page-scroll" href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-lg">Inscripción SIDICA</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<a href="javascript:void(0)" class="botonimagen"></a>
		<div id="carousel-area">
			<div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-slider" data-slide-to="1"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<img class="img-fluid" src="img/ideascolombo/slider.jpg" alt="slider 1">
						<div class="carousel-caption text-center">
							
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carousel-slider" role="button" data-slide="prev">
					<span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carousel-slider" role="button" data-slide="next">
					<span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</header> -->

	<!-- <section id="formato" class="section">
		<div class="container">
			<div class="section-header">
				<h2 class="section-title">Formato de Pre-Inscripción</h2>
				<span>Sidica</span>
				<p class="section-subtitle">Ideas Colombo 2020 Edición 2</p>
				<p class="section-subtitle">Pensando en ciencia</p>
			</div>
			<div class="row">
				<div class="col-12 text-center">
					<button id="btnIdeas" class="filter btn btn-common btn-effect">
						Pre-Inscribe Tu Idea Colombo
					</button>
				</div>
			</div>
		</div>
	</section> -->

	<!-- <section id="reglamento" class="section">
		<div class="container">
			<div class="section-header">
				<h2 class="section-title">Reglamento De La Iniciativa</h2>
				<span>Sidica</span>
				<p class="section-subtitle">Ideas Colombo 2020 Edición 2</p>
				<p class="section-subtitle">Pensando en ciencia</p>
			</div>
			<section class="Material-carousel-section">
				<div class="container">
					<div class="row wow animated fadeInUp" data-wow-delay=".2s">
						<div class="col-md-12">
							<div id="Material-image-carousel" class="owl-carousel owl-theme">
								<div class="item text-center active">
									<img src="img/ideascolombo/Pasos-para-Incrpcion.jpg" class="img-fluid" alt="reglas1.png">
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="row mt-4">
				<div class="col-12 text-center">
					<a href="img/ideascolombo/Terminos y condiciones Ideas Colombo.pdf" download="" class="filter btn btn-common btn-effect">
						Descarga El Reglamento
					</a>
				</div>
			</div>
		</div>
	</section> -->

	<!-- <footer>

		<section id="footer" class="footer-Content">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-mb-12">
						<h3>SIDICA</h3>
						<div class="textwidget">
							<p>Formar capital humano en las áreas de ELECTRÓNICA Y
								TELECOMUNICACIONES, TECNOLOGÍAS VIRTUALES y DISEÑO E
								INGENIERÍA, con habilidades y destrezas en actividades de investigación
								aplicada, Desarrollo Tecnológico e Innovación, con el fin de incrementar la
								capacidad de generar desarrollo tecnológico e innovación en las empresas de
							la Región Caribe y Colombia.</p>
						</div>
						<ul class="footer-social">
							<li><a class="facebook" href="https://fb.me/SidicaSena" target="_blank"><i class="lni-facebook-filled"></i></a></li>
							<li><a class="google-plus" href="https://plus.google.com/113286666426953549863" target="_blank"><i class="lni-google-plus"></i></a></li>
						</ul>
					</div>
					<div class="col-lg-4 offset-lg-2 col-md-4 offset-md-2 col-sm-6 col-xs-12 col-mb-12">
						<div class="widget">
							<h3 class="block-title">Contáctenos</h3>
							<ul class="contact-footer">
								<li>
									<strong>Dirección :</strong> <span>Calle 30 No. 3E-164, Barranquilla (Atlántico)</span>
								</li>
								<li>
									<strong>Teléfono :</strong> <span>3740254 - 3344855</span>
								</li>
								<li>
									<strong>E-mail :</strong> <span><a href="mailto:sennova.sena@gmail.com">sennova.sena@gmail.com</a></span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>


		<div id="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="site-info float-left">
							<p>	Todos los derechos reservados &copy; <?php echo date('Y') ?> - Diseñado por <a href="javascript:void(0)" rel="nofollow">Fabrica De Software</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer> -->
	<!-- MODAL DE REGISTRO - APRENDIZ SEMILLERO
	<div id="bd-example-modal-lg" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="overflow-x: hidden;overflow-y: auto;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Formulario de Inscripción</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container" style="box-shadow: 0px 0px 1px 0px">
						<br>
						<div class="row">
							<form id="form-semi">
								<div class="row col-12 justify-content-start">
									<div class="input-group mb-3 col-lg-12">
										<div class="input-group-prepend">
											<label class="input-group-text" for="t_rol">Rol</label>
										</div>
										<select class="custom-select" id="t_rol" name="t_rol">
											<option value="0" selected>Seleccione...</option>
											<?php foreach ($tipoRol as $dato) : ?>
												<option value="<?php echo $dato['id_roles']; ?>"><?php echo utf8_encode($dato['rol']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>

									<div class="form-group col-lg-6">
										<input type="text" id="txtNombre" placeholder="Nombre" required="" class="valor form-control" name="nombre">
									</div>

									<div class="form-group col-lg-6">
										<input id="txtApellido" type="text"  placeholder="Apellido" class="valor form-control" required="" name="apellido">
									</div>

									<div class="input-group mb-3 col-lg-6">
										<div class="input-group-prepend">
											<label class="input-group-text" for="t_documento">Tipo Documento</label>
										</div>
										<select class="custom-select" id="t_documento" name="t_documento">
											<option value="0" selected>Seleccione...</option>
											<?php foreach ($t_doc as $dato) : ?>
												<option value="<?php echo $dato['id_doc']; ?>"><?php echo utf8_encode($dato['tipo']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>

									<div class="form-group col-lg-6">
										<input id="txtDocumento" type="number" placeholder="Documento" class="valor form-control" required="" name="documento">
									</div>

									<div class="input-group mb-3 col-lg-6">
										<div class="input-group-prepend">
											<label class="input-group-text" for="t_sangre">Tipo Sangre</label>
										</div>
										<select class="custom-select" id="t_sangre" name="t_sangre">
											<option value="0" selected>Seleccione...</option>
											<?php foreach ($t_san as $dato) : ?>
												<option value="<?php echo $dato['id_sa']; ?>"><?php echo utf8_encode($dato['tipo']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>

									<div class="form-group col-lg-6">
										<input type="date" class="valor form-control" required name="fechaNac" placeholder="Fecha de nacimiento">
									</div>

									<div class="form-group col-lg-6">
										<input id="txtTelefono" type="number"  placeholder="Telefono" class="valor form-control" required="" name="telefono" pattern="{5,10}">
									</div>

									<div class="form-group col-lg-6">
										<input id="txtCorreo" type="email" placeholder="Correo  " class="valor form-control" required="" name="correo">
									</div>

									<div class="form-group col-lg-6">
										<input id="txtDireccion" type="text" placeholder="Dirección" class="valor form-control" required="" name="direccion">
									</div>

									<div class="form-group col-lg-6">
										<input id="txtFicha" type="number" placeholder="Ficha" class="valor form-control" required="" name="ficha">
									</div>

									<div class="input-group mb-3 col-lg-12">
										<div class="input-group-prepend">
											<label class="input-group-text" for="progam">Programa Formación</label>
										</div>
										<select class="custom-select" id="progam" name="progam">
											<option value="0" selected>Seleccione...</option>
											<?php foreach ($programa as $dato) : ?>
												<option value="<?php echo $dato['id_prog']; ?>"><?php echo utf8_encode($dato['programa']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>

									<div class="input-group mb-3 col-lg-12">
										<div class="input-group-prepend">
											<label class="input-group-text" for="l_investigacion">Linea Investigación</label>
										</div>
										<select class="custom-select" id="l_investigacion" name="l_investigacion">
											<option value="0" selected>Seleccione...</option>
											<?php foreach ($linea as $dato) : ?>
												<option value="<?php echo $dato['id_li']; ?>"><?php echo utf8_encode($dato['l_investigacion']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>

									<div class="input-group mb-3 col-lg-6">
										<div class="input-group-prepend">
											<label class="input-group-text" for="trim">Trimestre</label>
										</div>
										<select class="custom-select" id="trim" name="trim">
											<option value="0" selected>Seleccione...</option>
											<?php foreach ($trim as $dato) : ?>
												<option value="<?php echo $dato['id_trim']; ?>"><?php echo utf8_encode($dato['trimestre']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>

									<div class="form-group col-lg-6">
										<input id="txtEdad" type="number" placeholder="Edad" class="valor form-control" required="" name="edad">
									</div>

									<div class="form-group col-sm-6 col-lg-6">
										<input id="pass" type="password" placeholder="Contraseña" class="valor form-control" required="" name="pass">
									</div>

									<div class="form-group col-sm-6 col-lg-6">
										<input id="confir_pass" type="password" placeholder="Confirmar Contraseña" class="valor form-control" required="" name="c_pass">
									</div>

									<div class="row col-lg-12">
										<div class="col-xs-2 col-md-1 col-lg-1"></div>
										<div class="col-xs-2 col-md-1 col-lg-1"></div>
										<div class="col-xs-2 col-md-1 col-lg-1"></div>
										<div class="col-xs-2 col-md-3 col-lg-2">Mañana</div>
										<div class="col-xs-2 col-md-1 col-lg-1"></div>
										<div class="col-xs-2 col-md-3 col-lg-6">Tarde</div>

										<div class="col-xs-6 col-md-3 col-lg-3">LUNES</div>

										<div class="col-xs-2 col-md-3 col-lg-2">
											<input type="checkbox" id="cbx1" class="inp-cbx" data-preg="check" name="horarios_maniana[]" value="1" style="display: none">
											<label for="cbx1" class="cbx">
												<span>
													<svg width="12px" height="10px" viewBox="0 0 12 10">
														<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
													</svg>
												</span>
											</label>
										</div>
										<div class="col-xs-2 col-md-1 col-lg-1"></div>
										<div class="col-xs-2 col-md-3 col-lg-6">
											<input type="checkbox" id="cbx6" class="inp-cbx" data-preg="check" name="horarios_tarde[]" value="1" style="display: none">
											<label for="cbx6" class="cbx">
												<span>
													<svg width="12px" height="10px" viewBox="0 0 12 10">
														<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
													</svg>
												</span>
											</label>
										</div>

										<div class="col-xs-6 col-md-3 col-lg-3">MARTES</div>

										<div class="col-xs-2 col-md-3 col-lg-2">
											<input type="checkbox" id="cbx2" class="inp-cbx" data-preg="check" name="horarios_maniana[]" value="2" style="display: none">
											<label for="cbx2" class="cbx">
												<span>
													<svg width="12px" height="10px" viewBox="0 0 12 10">
														<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
													</svg>
												</span>
											</label>
										</div>
										<div class="col-xs-2 col-md-1 col-lg-1"></div>
										<div class="col-xs-2 col-md-3 col-lg-6">
											<input type="checkbox" id="cbx7" class="inp-cbx" data-preg="check" name="horarios_tarde[]" value="2" style="display: none">
											<label for="cbx7" class="cbx">
												<span>
													<svg width="12px" height="10px" viewBox="0 0 12 10">
														<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
													</svg>
												</span>
											</label>
										</div>

										<div class="col-xs-6 col-md-3 col-lg-3">MIERCOLES</div>

										<div class="col-xs-2 col-md-3 col-lg-2">
											<input type="checkbox" id="cbx3" class="inp-cbx" data-preg="check" name="horarios_maniana[]" value="3" style="display: none">
											<label for="cbx3" class="cbx">
												<span>
													<svg width="12px" height="10px" viewBox="0 0 12 10">
														<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
													</svg>
												</span>
											</label>
										</div>
										<div class="col-xs-2 col-md-1 col-lg-1"></div>
										<div class="col-xs-2 col-md-3 col-lg-6">
											<input type="checkbox" id="cbx8" class="inp-cbx" data-preg="check" name="horarios_tarde[]" value="3" style="display: none">
											<label for="cbx8" class="cbx">
												<span>
													<svg width="12px" height="10px" viewBox="0 0 12 10">
														<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
													</svg>
												</span>
											</label>
										</div>

										<div class="col-xs-6 col-md-3 col-lg-3">JUEVES</div>

										<div class="col-xs-2 col-md-3 col-lg-2">
											<input type="checkbox" id="cbx4" class="inp-cbx" data-preg="check" name="horarios_maniana[]" value="4" style="display: none">
											<label for="cbx4" class="cbx">
												<span>
													<svg width="12px" height="10px" viewBox="0 0 12 10">
														<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
													</svg>
												</span>
											</label>
										</div>
										<div class="col-xs-2 col-md-1 col-lg-1"></div>
										<div class="col-xs-2 col-md-3 col-lg-6">
											<input type="checkbox" id="cbx9" class="inp-cbx" data-preg="check" name="horarios_tarde[]" value="4" style="display: none">
											<label for="cbx9" class="cbx">
												<span>
													<svg width="12px" height="10px" viewBox="0 0 12 10">
														<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
													</svg>
												</span>
											</label>
										</div>

										<div class="col-xs-6 col-md-3 col-lg-3">VIERNES</div>

										<div class="col-xs-2 col-md-3 col-lg-2">
											<input type="checkbox" id="cbx5" class="inp-cbx" data-preg="check" name="horarios_maniana[]" value="5" style="display: none">
											<label for="cbx5" class="cbx">
												<span>
													<svg width="12px" height="10px" viewBox="0 0 12 10">
														<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
													</svg>
												</span>
											</label>
										</div>
										<div class="col-xs-2 col-md-1 col-lg-1"></div>
										<div class="col-xs-2 col-md-3 col-lg-6">
											<input type="checkbox" id="cbx10" class="inp-cbx" data-preg="check" name="horarios_tarde[]" value="5" style="display: none">
											<label for="cbx10" class="cbx">
												<span>
													<svg width="12px" height="10px" viewBox="0 0 12 10">
														<polyline points="1.5 6 4.5 9 10.5 1"></polyline>
													</svg>
												</span>
											</label>
										</div>
										<br><br>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="reg_save" type="button" class="btn btn-primary">Registrar</button>
					<button id="cancelar" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div> -->

	<div class="relative bg-third fixed top-0 shadow-xl w-100" style="z-index: 99;">
		<div class="mx-auto py-1 md:px-24 px-6">
			<div class="flex justify-between items-center md:justify-start ">
				<div class="flex justify-start lg:w-0 lg:flex-1">
					<a href="/">
						<span class="sr-only">SIDICA</span>
						<img class="h-10 w-auto sm:h-20 pt-3" src="img/ideascolombo/logo_sidica.png" alt="">
					</a>
				</div>
				<div class="-mr-2 -my-2 md:hidden">
					<button tyype="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
						<span class="sr-only">Open menu</span>
						<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="false">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
						</svg>
					</button>
				</div>
				<div class="hidden md:flex items-center justify-end md:flex-2">
					<nav class="hidden md:flex space-x-10 menu">
						<a href="#inicio" class="text-base font-medium text-dark ">Inicio</a>
						<a href="#conocenos" class="text-base font-medium text-dark "> Conocenos </a>
						<a href="#videos" class="text-base font-medium text-dark "> Videos </a>
						<a href="#contactanos" class="text-base font-medium text-dark "> Contactanos </a>
						<a routerLink="ideas-colombo" class="text-base font-medium text-dark "> Ideas Colombo </a>
					</nav>
					<a href="#formulario" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-xl text-base font-medium text-dark btn-primary"> Inscribete </a>
				</div>
			</div>
		</div>

		<div class="modal md:hidden" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<img class="-m-3 p-3 h-20 w-auto sm:h-20 pt-3" src="../assets/img/logo_sidica.png" alt="">
						<button type="button" data-bs-dismiss="modal" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
							<span class="sr-only">Close main menu</span>
							<!-- Heroicon name: outline/x -->
							<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
							</svg>
						</button>
					</div>
					<div class="modal-body">
						<div class="mt-6">
							<nav class="grid gap-y-8">
								<a href="#inicio" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
									<span data-bs-dismiss="modal" class="ml-3 text-base font-medium text-gray-900"> Inicio </span>
								</a>
								<a href="#conocenos" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
									<span data-bs-dismiss="modal" class="ml-3 text-base font-medium text-gray-900"> Conocenos </span>
								</a>
								<a href="#videos" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
									<span data-bs-dismiss="modal" class="ml-3 text-base font-medium text-gray-900"> Videos </span>
								</a>
								<a href="#contactanos" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
									<span data-bs-dismiss="modal" class="ml-3 text-base font-medium text-gray-900"> Contactanos </span>
								</a>
								<a routerLink="ideas-colombo" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
									<span data-bs-dismiss="modal" class="ml-3 text-base font-medium text-gray-900"> Ideas Colombo </span>
								</a>
							</nav>
							<a href="#formulario" data-bs-dismiss="modal" class="block w-full px-5 mt-3 py-3 text-center font-medium primary bg-gray-50 hover:bg-gray-100"> Inscribete </a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>



	<!-- MODAL VERIFICACIÓN -->
	<div class="w100">
		<img class="w100" src="img/ideascolombo/header.png" alt="">
	</div>
	<div class="container">
		<div class="card shadow-xl my-3">
			<div class="card-body pt-0">
				<div id="cajaRegIdea" class="container">
					<form id="formIdeas">
						<input type="hidden" id="idApre" name="idApre">
						<div class="row my-3">
							<div class="col-12 text-center my-2">
								<h6 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-dark text-white-900 sm:text-4xl">FORMATO DE PRE-INSCRIPCIÓN <span class="text-orange"><b>IDEAS COLOMBO</b></span></h6>
							</div>
						</div>
						<div class="row">
							<div class="flex flex-col mb-3">
								<label for="proyectoTxt" class="text-base font-medium text-gray-900">Titulo de la propuesta:</label>
								<div class="relative">
									<input id="proyectoTxt" type="text" name="proyectoTxt" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Ingresa el titulo de la propuesta" />
								</div>
							</div>
							<div class="flex flex-col mb-6">
								<label for="nombreInsTxt" class="text-base font-medium text-gray-900">Instructor:</label>
								<div class="relative">
									<input id="nombreInsTxt" type="text" name="nombreInsTxt" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Nombre del instructor" />
								</div>
							</div>
							<div class="flex flex-col mb-6">
								<label for="nombreApreTxt" class="text-base font-medium text-gray-900">Aprendiz:</label>
								<div class="relative">
									<input id="nombreApreTxt" type="text" name="nombreApreTxt" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Nombre del aprendiz" />
								</div>
							</div>

							<div class="flex flex-col mb-6">
								<label for="nombreApreTxt" class="text-base font-medium text-gray-900">Programa o Especialidad:</label>
								<div class="relative">
									<input id="programaTxt" type="text" name="programaTxt" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Programa o Especialidad" />
								</div>
							</div>

							<div class="flex flex-col mb-6">
								<label for="nombreApreTxt" class="text-base font-medium text-gray-900">Ficha:</label>
								<div class="relative">
									<input id="fichaTxt" type="text" name="fichaTxt" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Número de ficha" />
								</div>
							</div>

							<div class="flex flex-col mb-3">
								<label for="emailTxt" class="text-base font-medium text-gray-900">Correo:</label>
								<div class="relative">
									<input id="emailTxt" type="email" name="emailTxt" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Ingresa tu correo" />
								</div>
							</div>

							<div class="flex flex-col mb-3">
								<label for="telTxt" class="text-base font-medium text-gray-900">Teléfono:</label>
								<div class="relative">
									<input id="telTxt" type="text" name="telTxt" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Ingresa tu correo" />
								</div>
							</div>

						</div>
						<div class="row mt-4">

							<div class="col-12 mb-3">
								<div class="row">
									<div class="col-3">
										<div class="d-flex flex-column text-center">
											<h6>
												Breve Descripción de la propuesta
											</h6>
											<img class="img-fluid" src="img/ideascolombo/cerebro.png" alt="cerebro.png">
										</div>
									</div>
									<div class="col-9">
										<div class="form-group">
											<textarea class="required form-control b-black" id="ideaTxt" name="ideaTxt" rows="12" placeholder="max. 300 palabras, min. 150"></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="flex mx-auto" id="footer2">
								<div class="mx-auto">
									<button id="reg_idea" type="button" class="text-lg block w-full px-5 mt-3 py-3 text-center font-medium btn-secondary">Registrar</button>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-12">
								<img class="img-fluid w-100" src="img/ideascolombo/piecera.png" alt="">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<a href="#" class="back-to-top">
		<i class="lni-arrow-up"></i>
	</a>
	<div id="loader">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>

	<script data-cfasync="false" src="js/email-decode.min.js">
	</script>
	<script src="js/jquery-min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/jquery.mixitup.js"></script>
	<script src="js/nivo-lightbox.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/jquery.nav.js"></script>
	<!-- <script src="js/scrolling-nav.js"></script> -->
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/wow.js"></script>
	<script src="js/jquery.vide.js"></script>
	<script src="js/jquery.counterup.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/form-validator.min.js"></script>
	<script src="js/contact-form-script.js"></script>
	<script src="js/alertify.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/ajax.js"></script>
</body>

</html>