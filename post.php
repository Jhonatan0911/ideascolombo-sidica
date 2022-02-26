<?php 
require_once("php/conex.php");
date_default_timezone_set('America/Bogota');
setLocale(LC_ALL, "spanish");
$id_noti = $_GET['id_noti'];

$noticias = $bd->consulta("SELECT noticia_general.* FROM noticia_general INNER JOIN noticia_notificacion WHERE noticia_notificacion.id_noti = $id_noti AND noticia_notificacion.id_noti = noticia_general.id_noti");

$cont_noti = $noticias->num_rows;

if($cont_noti == 0 || !isset($id_noti)){
	header("Location:index.php");
}

$noticia = mysqli_fetch_array($noticias);

$comentario = $bd->consulta("SELECT noticia_comentario.* FROM noticia_comentario INNER JOIN noticia_notificacion WHERE noticia_notificacion.id_noti = $id_noti AND noticia_notificacion.id_noti = noticia_comentario.id_noti");

$cont = $comentario->num_rows;

function fecha_hora ($fecha) {
	$respuesta = "";
	
	
	$f = new DateTime($fecha);

	$hora = $f->format('h:i:s a');

	$anio = ucwords(strftime("%B %d, %G", $f->getTimestamp()));

	$respuesta =  $anio." Hora ".$hora;;

	return $respuesta;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="Sennova, Sidica, Fabrica Software, Sena, Colombo Alemán">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="author" content="Juan David Castro">
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

	<header class="hero-area">
		<nav class="navbar navbar-expand-md fixed-top scrolling-navbar bg-white">
			<div class="container">
				<a class="navbar-brand" href="index.php"><span><img src="img/logo_sidica.png" class="tam_logo" alt=""></span><b>SIDICA</b></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<i class="lni-menu"></i>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav mr-auto w-100 justify-content-end">
						<li class="nav-item">
							<a class="nav-link page-scroll" href="index.php">Inicio</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-md-10">
					<div class="contents text-center">
						<h2 class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s"><?php echo nl2br(utf8_encode($noticia['titulo'])) ?></h2>
						<div class="post-meta">
							<ul>
								<li><i class="lni-calendar"></i> <a href="javascript:void(0)"><?php echo $noticia['fecha'] ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>


	<div id="blog-single">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="col-md-10">
					<div class="blog-post">
						<div class="post-thumb">
							<img src="img/blog/<?php echo $noticia['name_img'] ?>" alt="">
						</div>
						<div class="post-content">
							<p><?php echo nl2br(utf8_encode($noticia['descripcion'])) ?></p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<!-- MODAL PARA ENVIAR RESPUESTAS A DE LOS COMENTARIOS -->
	<div id="modal_resp" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Respuesta:</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="container" style="box-shadow: 0px 0px 1px 0px">
						<br>
						<div class="row">
							<form class="col-md-12" id="form_respC">
								<input type="hidden" id="id_noti" name="id_noti" value="<?php echo $id_noti; ?>">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="email" class="form-control" id="email" name="email" placeholder="Email">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" id="message" name="message" placeholder="Respuesta" rows="11"></textarea>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="submit-button text-center">
						<button class="btn btn-common btn-effect" id="btn_respC" type="button">Responder Comentario</button>
					</div>
					<button id="cancelar2" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

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
</body>
</html>