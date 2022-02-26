<?php 
require_once("php/conex.php");
$programa = $bd->consulta("SELECT * FROM programas");
$linea = $bd->consulta("SELECT * FROM lineas_investigacion");
$t_doc = $bd->consulta("SELECT * FROM tipo_documento");
$t_san = $bd->consulta("SELECT * FROM tipo_sangre");
$trim = $bd->consulta("SELECT * FROM trimestres");
$tsangre = $bd->consulta("SELECT * FROM tipo_sangre");
$noticiasPeque = $bd->consulta("SELECT * FROM noticia_notificacion ORDER BY id_noti DESC LIMIT 6");
$noticias = $bd->consulta("SELECT * FROM noticia_notificacion ORDER BY id_noti DESC LIMIT 100 OFFSET 6");
$videos = $bd->consulta("SELECT * FROM videos");
$portafolio = $bd->consulta("SELECT portafolio.nameImg as nameimg, tipo_portafolio.tipo as tipo FROM portafolio INNER JOIN tipo_portafolio WHERE portafolio.tipo = tipo_portafolio.id ORDER BY rand()");
$tipoRol = $bd->consulta("SELECT * FROM roles");
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
	<title>SIDICA</title>

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
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" id="colors" href="css/colors/turquoise.css" type="text/css">
</head>
<body>

	<header id="slider-area">
		<nav class="navbar navbar-expand-md fixed-top scrolling-navbar bg-white">
			<div class="container">
				<a class="navbar-brand" href="index.php"><span><img src="img/logo_sidica.png" class="tam_logo" alt=""></span><b>SIDICA</b></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<i class="lni-menu"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav mr-auto w-100 justify-content-end">
						<li class="nav-item">
							<a class="nav-link page-scroll" href="#slider-area">Inicio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link page-scroll" href="#services">Conócenos</a>
						</li>
						<!--<li class="nav-item">
							<a class="nav-link page-scroll" href="#portfolios">Portafolio</a>
						</li>-->
						<li class="nav-item">
							<a class="nav-link page-scroll" href="#videos">Videos</a>
						</li>
						<!--<li class="nav-item">
							<a class="nav-link page-scroll" href="#blog">Noticias</a>
						</li>-->
						<li class="nav-item">
							<a class="nav-link page-scroll" href="#footer">Contactanos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link page-scroll" href="ideascolombo.php">Ideas Colombo</a>
						</li>
						<li class="nav-item">
							<a class="nav-link page-scroll" href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-lg">Inscríbete</a>
						</li>
						<li class="nav-item">
							<a class="nav-link page-scroll" href="admin/index.php" target="_blank">Semillero - Web</a>
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
					<li data-target="#carousel-slider" data-slide-to="2"></li>
					<li data-target="#carousel-slider" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<img class="img-fluid" src="img/slider/SLIDER-SIDICA4.png" alt="">
						<div class="carousel-caption text-center">
							
						</div>
					</div>
					<div class="carousel-item">
						<img class="img-fluid" src="img/slider/SLIDER-SIDICA-01.png" alt="">
						<div class="carousel-caption text-center">
							
						</div>
					</div>
					<div class="carousel-item">
						<a href="javascript:void(0)" data-toggle="modal" data-target=".bd-example-modal-lg">
							<img class="img-fluid" src="img/slider/SLIDER-SIDICA-02.png" alt="">
							<div class="carousel-caption text-center">

							</div>
						</a>
					</div>
					<div class="carousel-item">
						<img class="img-fluid" src="img/slider/01-01.png" alt="">
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
	</header>

	<section id="services" class="section">
		<div class="container">
			<div class="section-header">
				<h2 class="section-title">Semillero De Investigación</h2>
				<span>Sidica</span>
				<p class="section-subtitle">Desarrollo tecnológico e innovación Colombo Alemán</p>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="item-boxes services-item wow fadeInDown" data-wow-delay="0.2s">
						<div class="icon color-1">
							<i class="lni-heart-filled"></i>
						</div>
						<h4>Visión</h4>
						<p style="text-align: justify;">Consolidarnos como semillero Institucional de investigación, líderes en
							Latinoamérica en investigación aplicada, desarrollo tecnológico e innovación a
							través de la cooperación nacional e internacional, y la creación de centros de
							formación tecnológicos especializados en las áreas de ELECTRÓNICA Y TELECOMUNICACIONES, TECNOLOGÍAS VIRTUALES y DISEÑO E
							INGENIERÍA, con el fin de contribuir a la competitividad y productividad de la
						región caribe conectados con el resto del país.</p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-xs-12">
					<div class="item-boxes services-item wow fadeInDown" data-wow-delay="0.6s">
						<div class="icon color-3">
							<i class="lni-stats-up"></i>
						</div>
						<h4>Misión</h4>
						<p style="text-align: justify;">El Semillero Institucional de Investigación del Colombo- SIDICA, es un
							espacio formativo que fortalece la cultura de la investigación aplicada, el
							desarrollo tecnológico y la innovación estratégica con aprendices SENA en el
							proceso de formación tecnológica en áreas de ELECTRÓNICA Y
							TELECOMUNICACIONES, TECNOLOGÍAS VIRTUALES y DISEÑO E
							INGENIERÍA; conformando una planta de aprendices investigadores
							comprometidos con el entorno, mediante el uso eficiente de los recursos
							disponibles, que involucra diversas áreas como: telecomunicaciones,
							electricidad y energías renovables no convencionales, mecatrónica,
							mantenimiento de equipos biomédico, diseño y desarrollo de software,
							materiales, soldadura, mecanizado, refrigeración, plásticos, diseño y
							mantenimiento, que hacen parte de las redes de conocimiento de energía
							eléctrica, telecomunicaciones, electrónica y automatización, Informática,
						diseño y desarrollo de software y mecánica industrial.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="video-promo section">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="video-promo-content text-center">
						<a href="video/video.mp4" class="video-popup"><i class="lni-film-play"></i></a>
						<h2 class="wow zoomIn" data-wow-duration="1000ms" data-wow-delay="100ms">Sidica</h2>
						<p class="wow zoomIn" data-wow-duration="1000ms" data-wow-delay="100ms">Semillero de investigación</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--<section id="blog" class="section">
		<div class="container">
			<div class="section-header">
				<h2 class="section-title">Noticias</h2>
				<span>Noticias</span>
			</div>
			<div id="noticias_noti" class="row justify-content-center">
				<?php /*foreach($noticiasPeque as $noti): 
					$comentario = $bd->consulta("SELECT noticia_comentario.* FROM noticia_comentario INNER JOIN noticia_notificacion WHERE noticia_notificacion.id_noti = {$noti['id_noti']} AND noticia_notificacion.id_noti = noticia_comentario.id_noti");
					$cont = $comentario->num_rows;*/ ?>

					<div class="col-lg-4 col-md-6 col-xs-12 blog-item">
						<div class="blog-item-wrapper">
							<div class="blog-item-img" style="width: 350px; height: 250px;">
								<a href="post.php?id_noti=<?php //echo $noti['id_noti'] ?>">
									<img src="img/blog/<?php //echo $noti['name_img'] ?>" style="width: 350px; height: 250px;">
								</a>
							</div>
							<div class="blog-item-text">
								<div class="date"><i class="lni-calendar"></i><?php //echo $noti['fecha'] ?></div>
								<h3><a href="post.php?id_noti=<?php //echo $noti['id_noti'] ?>"><?php //echo nl2br(utf8_encode($noti['titulo'])) ?></a></h3>
								<div class="meta-tags">
									<span><a href="javascript:void(0)"><i class="lni-eye"></i> 664 Views</a></span>
									<span><a href="post.php?id_noti=<?php //echo $noti['id_noti'] ?>"><i class="lni-bubble"></i> <?php //echo $cont; ?></a></span>
									<span><a href="javascript:void(0)"><i class="lni-reply"></i> 332</a></span>
								</div>
							</div>
						</div>
					</div>
				<?php //endforeach; ?>
			</div>
			<div id="noticias_noti2" class="row justify-content-center d-none">
				<?php foreach($noticias as $noti): 
					$comentario = $bd->consulta("SELECT noticia_comentario.* FROM noticia_comentario INNER JOIN noticia_notificacion WHERE noticia_notificacion.id_noti = {$noti['id_noti']} AND noticia_notificacion.id_noti = noticia_comentario.id_noti");
					$cont = $comentario->num_rows; ?>

					<div class="col-lg-4 col-md-6 col-xs-12 blog-item">
						<div class="blog-item-wrapper">
							<div class="blog-item-img" style="width: 350px; height: 250px;">
								<a href="post.php?id_noti=<?php echo $noti['id_noti'] ?>">
									<img src="img/blog/<?php echo $noti['name_img'] ?>" style="width: 350px; height: 250px;">
								</a>
							</div>
							<div class="blog-item-text">
								<div class="date"><i class="lni-calendar"></i><?php echo $noti['fecha'] ?></div>
								<h3><a href="post.php?id_noti=<?php echo $noti['id_noti'] ?>"><?php echo nl2br(utf8_encode($noti['titulo'])) ?></a></h3>
								<div class="meta-tags">
									<span><a href="javascript:void(0)"><i class="lni-eye"></i> 664 Views</a></span>
									<span><a href="post.php?id_noti=<?php echo $noti['id_noti'] ?>"><i class="lni-bubble"></i> <?php echo $cont; ?></a></span>
									<span><a href="javascript:void(0)"><i class="lni-reply"></i> 332</a></span>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div id="setting_btn" class="row">
				<div class="col-12 text-center more">
					<button id="more" class="filter active btn btn-common btn-effect">
						Conocer más
					</button>
				</div>
				<div class="col-12 text-center d-none less mt-3">
					<button id="less" class="filter active btn btn-common btn-effect">
						Conocer menos
					</button>
				</div>
			</div>
		</div>
	</section>-->


	<div id="videos" style="padding: 118px 0;" class="counters section bg-defult">
		<div class="container">
			<div class="row">
				<?php 
				foreach($videos as $vidio): ?>	
					<div class="col-md-4 col-sm-12">
						<div class="video-promo-content text-center">
							<a href="<?php echo $vidio['url']; ?>" class="video-popup"><i class="lni-film-play"></i></a>
							<h5 class="wow zoomIn" data-wow-duration="1000ms" data-wow-delay="100ms"><?php echo utf8_encode($vidio['titulo']) ?></h5>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>


	<section id="portfolios" class="section">

		<div class="container">
			<div class="section-header">
				<h2 class="section-title">Nuestro Trabajo</h2>
				<span>Trabajos</span>
			</div>
			<div class="row">
				<div class="col-md-12">

					<div class="controls text-center">
						<a class="filter active btn btn-common btn-effect" data-filter="all">
							Todos
						</a>
						<a class="filter btn btn-common btn-effect" data-filter=".fabrica">
							Fabrica De Software
						</a>
						<a class="filter btn btn-common btn-effect" data-filter=".sennova">
							Sennova
						</a>
						<a class="filter btn btn-common btn-effect" data-filter=".redcolsi">
							Redcolsi
						</a>
					</div>

				</div>
			</div>

			<!--<div id="portfolio" class="row">
				<?php 
				//foreach($portafolio as $porta): ?>
					<div class="col-lg-4 col-md-6 col-xs-12 mix development <?php //echo utf8_encode($porta['tipo']) ?>">
						<div class="portfolio-item">
							<div class="shot-item">
								<img src="img/portfolio/<?php //echo $porta['nameimg'] ?>" alt="" />
								<div class="single-content">
									<div class="fancy-table">
										<div class="table-cell">
											<div class="zoom-icon">
												<a class="lightbox" href="img/portfolio/<?php //echo $porta['nameimg'] ?>"><i class="lni-zoom-in item-icon"></i></a>
											</div>
											<a href="javascript:void(0)">Ver</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php //endforeach; ?>
			</div>-->
		</div>
	</section>


	<footer>

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
							<p>	Todos los copyrights reservados &copy; 2018 - Diseñado por <a href="javascript:void(0)" rel="nofollow">Fabrica De Software</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- MODAL DE REGISTRO - APRENDIZ SEMILLERO -->
	<div id="mreg_sidica" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
											<?php foreach ($tipoRol as $dato): ?>
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
											<?php foreach ($t_doc as $dato): ?>
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
											<?php foreach ($t_san as $dato): ?>
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
											<?php foreach ($programa as $dato): ?>
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
											<?php foreach ($linea as $dato): ?>
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
											<?php foreach ($trim as $dato): ?>
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
	</div>
	
	<!-- Modal Ideas Colombo Start -->
	<!--<div class="modal fade" id="ideasColombo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ideas Colombo</h5>
					<button id="cerrarVideo" type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<video autoplay controls muted style="width: 100%" id="videoIndex" class="embed-responsive-item"><source src="img/ideascolombo/IDEASCOLOMBO1.mp4" type="video/mp4"></video>
				</div>
				<div class="modal-footer">
					<a href="ideascolombo.php" class="btn btn-warning">Saber Más</a>
				</div>
			</div>
		</div>
	</div>-->
	<!-- Modal Ideas Colombo End -->
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
		</script><script src="js/jquery-min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/jquery.mixitup.js"></script>
		<script src="js/nivo-lightbox.js"></script>
		<script src="js/owl.carousel.js"></script>
		<script src="js/jquery.stellar.min.js"></script>
		<script src="js/jquery.nav.js"></script>
		<script src="js/scrolling-nav.js"></script>
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
		<script>
			$(document).ready(function(){
				//$("#ideasColombo").modal("show");
			});
		</script>
	</body>
	</html>