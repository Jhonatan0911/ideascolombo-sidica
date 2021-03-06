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

	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/tailwind.css">

	<!-- Google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/85219bca29.js" crossorigin="anonymous"></script>
	<!-- Tailwind -->
	<script src="https://cdn.tailwindcss.com"></script>
	<!-- Bootstrapp -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<style>
		.img-share{
			width: 200px !important;
			height: 200px!important;
			background-image: url("img/home/share.png");
			background-repeat: no-repeat;
			background-size: cover;
		}
		a:hover{
			color: #fff !important;
		}
		.btn-secondary{
			width: 20% !important;
			height: 50px !important;
		}
		.modal-dialog{
			max-width: 800px !important;
		}
		@media screen and (max-width: 600px) {
			.btn-secondary{
				width: 70% !important;
				height: 50px !important;
			}
		}
	</style>
</head>

<body>
	<!-- Navbar -->
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
					<a href="index.php" class="text-base font-medium text-dark ">Inicio</a>
					<a href="index.php#conocenos" class="text-base font-medium text-dark "> Conocenos </a>
					<a href="index.php#videos" class="text-base font-medium text-dark "> Videos </a>
					<a href="index.php#contactanos" class="text-base font-medium text-dark "> Contactanos </a>
					<a href="ideascolombo.php" class="text-base font-medium text-dark "> Ideas Colombo </a>
					</nav>
					<a href="encuestasidica.php" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-xl text-base font-medium text-dark btn-primary"> Inscribete </a>
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
								<a href="index.php" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
									<span data-bs-dismiss="modal" class="ml-3 text-base font-medium text-gray-900"> Inicio </span>
								</a>
								<a href="index.php#conocenos" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
									<span data-bs-dismiss="modal" class="ml-3 text-base font-medium text-gray-900"> Conocenos </span>
								</a>
								<a href="index.php#videos" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
									<span data-bs-dismiss="modal" class="ml-3 text-base font-medium text-gray-900"> Videos </span>
								</a>
								<a href="index.php#contactanos" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
									<span data-bs-dismiss="modal" class="ml-3 text-base font-medium text-gray-900"> Contactanos </span>
								</a>
								<a routerLink="ideas-colombo" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
									<span data-bs-dismiss="modal" class="ml-3 text-base font-medium text-gray-900"> Ideas Colombo </span>
								</a>
							</nav>
							<a href="encuestasidica.php" data-bs-dismiss="modal" class="block w-full px-5 mt-3 py-3 text-center font-medium primary bg-gray-50 hover:bg-gray-100"> Inscribete </a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Header -->
	<section id="header-colombo" class="header-colombo">
	<img class="img-fluid" src="img/colombo/header.png"  alt="">

	</section>
	<!-- Pre-inscripción -->
	<section>
	<div class="py-12 bg-white">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" >
		<div class="lg:text-center">
			<p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-dark text-white-900 sm:text-4xl">FORMATO DE PRE-INSCRIPCIÓN</p>
			<p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">Ideas Colombo 2022 Edición 2 Pensando en ciencia</p>
		</div>
		<div class="mt-10">
			<div class="text-center">
			<button class="btn-secondary"> <a href="encuestacolombo.php"> Pre-inscribe tu idea Colombo </a> </button>
			</div>
		</div>
		</div>
	</div>
	</section>
	<!-- Imagen -->
	<section id="header-colombo" class="header-colombo">
	<img src="/assets/img/colombo/home.jpg" class="w-100" alt="">
	</section>
	<!-- Como inscrirbe -->
	<section>
	<div class="py-12 bg-white">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" >
		<div class="lg:text-center">
			<p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-dark text-white-900 sm:text-4xl">REGLAMENTO DE LA INICIATIVA</p>
			<p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">Ideas Colombo 2022 Edición 2 Pensando en ciencia</p>
		</div>
		<div class="mt-10">
			<div class="lg:text-center relative mx-auto">
			<img class="mx-auto w-70" src="img/colombo/pasos.png" alt="">
			</div>
		</div>
		<div class="mt-10">
			<div class="text-center">
			<button class="btn-secondary"> <a href="assets/pdf/Terminos y condiciones.pdf" download="reglamento.pdf">Descarga el reglamento</a></button>
			</div>
		</div>
		</div>
	</div>
	</section>
	<!-- Footer -->
	<section id="contactanos" class="contactanos">
	<div class="bg-third">
		<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
		<h2 class="tracking-tight text-gray-900 ">
			<span class="block text-3xl font-extrabold sm:text-4xl">Participa y Compite con nosotros.</span>
			<span class="block text-3xl font-extrabold secondary mb-3 sm:text-4xl">SIDICA</span>
			<span class="block text-base max-w-xl">Formar capital humano en las áreas de ELECTRÓNICA Y TELECOMUNICACIONES, TECNOLOGÍAS VIRTUALES y DISEÑO E INGENIERÍA, con habilidades y destrezas en actividades de investigación aplicada, Desarrollo Tecnológico e Innovación, con el fin de incrementar la capacidad de generar desarrollo tecnológico e innovación en las empresas de la Región Caribe y Colombia.</span>
			<div class="space-x-2 flex text-sm font-bold mt-3">
			<label>
				<button class="flex-none flex items-center justify-center w-9 h-9 rounded-full text-white bg-secondary" type="button" aria-label="Like">
				<i class="fab fa-facebook"></i>
				</button>
			</label>
			<label>
				<button class="flex-none flex items-center justify-center w-9 h-9 rounded-full text-white bg-secondary" type="button" aria-label="Like">
				<i class="fab fa-twitter"></i>
				</button>
			</label>
			<label>
				<button class="flex-none flex items-center justify-center w-9 h-9 rounded-full text-white bg-secondary" type="button" aria-label="Like">
				<i class="fab fa-instagram"></i>
				</button>
			</label>
			<label>
				<button class="flex-none flex items-center justify-center w-9 h-9 rounded-full text-white bg-secondary" type="button" aria-label="Like">
				<i class="fab fa-google"></i>
				</button>
			</label>
			</div>
		</h2>
		<div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
			<div class="flex font-sans">
			<div class="">
				<div class="img-share d-none d-md-block"></div>
			</div>
			<form class="flex-auto sm:p-6">
				<div class="flex flex-wrap">
				<div class="w-full flex-none mt-2 order-1 text-3xl font-bold secondary mb-3">
					Contactanos
				</div>
				</div>
				<dl class="mt-4 text-xs font-medium flex items-center row-start-2 sm:mt-1 sm:row-start-3 md:mt-2.5 lg:row-start-2">
				<dd class="text-indigo-600 flex items-center dark:text-indigo-400">
					<span>Dirección:</span>
				</dd>
				<dd class="flex items-center">
					<svg width="2" height="2" aria-hidden="true" fill="currentColor" class="mx-2 text-slate-300">
					</svg>
					Calle 30 No. 3E-164, Barranquilla (Atlántico)
				</dd>
				</dl>
				<dl class="mt-4 text-xs font-medium flex items-center row-start-2 sm:mt-1 sm:row-start-3 md:mt-2.5 lg:row-start-2">
				<dd class="text-indigo-600 flex items-center dark:text-indigo-400">
					<span>Teléfono:</span>
				</dd>
				<dd class="flex items-center">
					<svg width="2" height="2" aria-hidden="true" fill="currentColor" class="mx-2 text-slate-300">
					</svg>
					3740254 - 3344855
				</dd>
				</dl>
				<dl class="mt-4 text-xs font-medium flex items-center row-start-2 sm:mt-1 sm:row-start-3 md:mt-2.5 lg:row-start-2">
				<dd class="text-indigo-600 flex items-center dark:text-indigo-400">
					<span>E-mail:</span>
				</dd>
				<dd class="flex items-center">
					<svg width="2" height="2" aria-hidden="true" fill="currentColor" class="mx-2 text-slate-300">
					</svg>
					sennova.sena@gmail.com
				</dd>
				</dl>
			</form>
			</div>
		</div>
		</div>
	</div>
	</section>




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