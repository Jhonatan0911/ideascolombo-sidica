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
	<!-- Tailwind -->
	<script src="https://cdn.tailwindcss.com"></script>
	<!-- Bootstrapp -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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

	<!-- Encuesta -->
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
								<label for="programaTxt" class="text-base font-medium text-gray-900">Programa o Especialidad:</label>
								<div class="relative">
									<input id="programaTxt" type="text" name="programaTxt" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Programa o Especialidad" />
								</div>
							</div>

							<div class="flex flex-col mb-6">
								<label for="fichaTxt" class="text-base font-medium text-gray-900">Ficha:</label>
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