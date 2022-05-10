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

	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/tailwind.css">

	<style>
		body{
			background-color: #025554 !important;
		}
		.md{
			width: 100% !important;
			height: 150% !important;
			padding-bottom: 50px !important;
			}

			.text-home{
			padding-top: 4em;
			font-size: 3em;
			line-height: 67px;
			}
			.description-header{
			font-size: 1.5em;
			}
			.description-header button{
			font-size: 1em;
			}

			.img-home{
			position: absolute;
			right: -64px;
			top: 0;
			right: 0;
			bottom: 0;
			width: 50%;
			background-image: url("img/home/1 1.png");
			background-repeat: no-repeat;
			background-size: cover;
			}
			.img-share{
			width: 200px !important;
			height: 200px!important;
			background-image: url("img/home/share.png");
			background-repeat: no-repeat;
			background-size: cover;
			}
			.img-form{
			width: 400px !important;
			height: 400px!important;
			background-image: url("img/home/movl.png");
			background-repeat: no-repeat;
			background-size: cover;
			}
			.img-form2{
			width: 400px !important;
			height: 400px!important;
			background-image: url("img/home/robot.png");
			background-repeat: no-repeat;
			background-size: cover;
			}

			@media screen and (min-width: 600px) {
				.home{
					display: flex;
					flex-wrap: wrap;
				}
				.header{
					max-width: 50% !important;
					padding-right: 80px;
				}

			}

			@media screen and (max-width: 600px) {
				.text-home{
					left: 6.2%;
					right: 52.65%;
					padding-top: 2em;
					font-size: 2em;
					line-height: 35px;
				}
				.img-share{
					display: none;
				}
				.text-home2{
					font-size: 0.7em;
				}
				.md{
					padding-bottom: 20px !important;
				}

			}
		</style>

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
</head>
<body>

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
								<a href="ideascolombo.php" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
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
<section id="inicio" class="inicio">
  <div class="relative bg-third md">
    <div class="mx-auto md:px-24 px-6 home">
      <div class="md:space-x-10 header">
        <div class="title-header mb-5">
          <h1 class="text-home primary">Semillero institucional de investigación <span class="secondary">SIDICA</span> del Colombo Alemán</h1>
        </div>
        <div class="description-header m-0 mb-5">
          <p class="text-home2 m-0">El sistema de investigación SENNOVA junto con el Colombo Aleman  te invitan a incribirte y participar en nuestro semillero de investigación SIDICA </p>
          <button class="btn-header m-0 mt-5 ml-8 whitespace-nowrap inline-flex items-center justify-center sm:py-2 border border-transparent rounded-md shadow-xl text-base font-medium text-white btn-secondary"> Saber más </button>
        </div>
      </div>
      <div class="img-home d-none d-md-block"></div>
    </div>
  </div>
</section>
<!-- Videos -->
<section id="videos" class="videos">
  <div class="relative pt-32 mb-5" id="videos">
    <div class="mx-auto md:px-24 px-6">
      <div class="lg:text-center">
        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-white text-white-900 sm:text-4xl">Videos</p>
        <p class="mt-4 max-w-2xl text-xl text-gray-300 lg:mx-auto">Desarrollo tecnológico e innovación Colombo Alemán</p>
      </div>
      <div class="max-w-2xl mx-auto py-5 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="mt-2 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
          <div class="group relative">
            <h2 class="text-2xl font-extrabold tracking-tight text-white mb-2">Semillero SIDICA</h2>
            <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
              <iframe width="330" height="323" src="https://www.youtube.com/embed/Ix2w1YwlHYQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
          <div class="group relative">
            <h2 class="text-2xl font-extrabold tracking-tight text-white mb-2">SIDICA - RedCOLSI</h2>
            <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
              <iframe width="330" height="323" src="https://www.youtube.com/embed/Ix2w1YwlHYQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
          <div class="group relative">
            <h2 class="text-2xl font-extrabold tracking-tight text-white mb-2">Invitación a RedCOLSI</h2>
            <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
              <iframe width="330" height="323" src="https://www.youtube.com/embed/n_AZFxHe9ls" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
          <div class="group relative" id="conocenos" class="conocenos">
            <h2 class="text-2xl font-extrabold tracking-tight text-white mb-2">Invitación a SIDICA</h2>
            <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
              <iframe width="330" height="323" src="https://www.youtube.com/embed/mSRuN-viv_Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section ></section>
<!-- Misión y Visión -->
<section>
  <div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" >
      <div class="lg:text-center">
        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-dark text-white-900 sm:text-4xl">SEMILLERO DE INVESTIGACIÓN</p>
        <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">Desarrollo tecnológico e innovación Colombo Alemán</p>
      </div>
      <div class="mt-10">
        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
          <div class="relative">
            <dt>
              <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-secondary text-white">
                <i class="fas fa-key"></i>
              </div>
              <p class="ml-16 text-xl text-dark leading-6 font-medium text-dark text-white-900">Misión</p>
            </dt>
            <dd class="mt-2 ml-16 text-base text-gray-500">Consolidarnos como semillero Institucional de investigación, líderes en Latinoamérica en investigación aplicada, desarrollo tecnológico e innovación a través de la cooperación nacional e internacional, y la creación de centros de formación tecnológicos especializados en las áreas de ELECTRÓNICA Y TELECOMUNICACIONES, TECNOLOGÍAS VIRTUALES y DISEÑO E INGENIERÍA, con el fin de contribuir a la competitividad y productividad de la región caribe conectados con el resto del país.</dd>
          </div>

          <div class="relative">
            <dt>
              <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-secondary text-white">
                <i class="fas fa-heart"></i>
              </div>
              <p class="ml-16 text-xl leading-6 font-medium text-dark text-dark-900">Visión</p>
            </dt>
            <dd class="mt-2 ml-16 text-base text-gray-500">El Semillero Institucional de Investigación del Colombo- SIDICA, es un espacio formativo que fortalece la cultura de la investigación aplicada, el desarrollo tecnológico y la innovación estratégica con aprendices SENA en el proceso de formación tecnológica en áreas de ELECTRÓNICA Y TELECOMUNICACIONES, TECNOLOGÍAS VIRTUALES y DISEÑO E INGENIERÍA; conformando una planta de aprendices investigadores comprometidos con el entorno, mediante el uso eficiente de los recursos disponibles, que involucra diversas áreas como: telecomunicaciones, electricidad y energías renovables no convencionales, mecatrónica, mantenimiento de equipos biomédico, diseño y desarrollo de software, materiales, soldadura, mecanizado, refrigeración, plásticos, diseño y mantenimiento, que hacen parte de las redes de conocimiento de energía eléctrica, telecomunicaciones, electrónica y automatización, Informática, diseño y desarrollo de software y mecánica industrial.</dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</section>
<!-- Formulario -->
<!-- <section id="formulario" class="formulario">
  <div class="relative pt-32 mb-5">
    <div class="mx-auto md:px-24 px-6">
      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-4xl text-white text-gray-900">Formulario de Inscripción</h3>
              <div class="img-form d-none d-md-block"></div>
              <div class="img-form2 d-none d-md-block"></div>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="#" method="POST">
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-12 sm:col-span-12">
                      <label for="country" class="block text-sm font-medium text-gray-700">Rol</label>
                      <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Administrador</option>
                        <option>Aprendiz</option>
                        <option>Aprendiz egresado</option>
                        <option>Insructor</option>
                        <option>Administrativo</option>
                      </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Nombre</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                      <label for="last-name" class="block text-sm font-medium text-gray-700">Apellido</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                      <label for="country" class="block text-sm font-medium text-gray-700">Tipo  Documento </label>
                      <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Cedula de ciudadanía</option>
                        <option>Cedula de extranjería</option>
                        <option>Tarjeta de identidad</option>
                        <option>Pasaporte</option>
                      </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Documento</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                      <label for="country" class="block text-sm font-medium text-gray-700">Tipo de sangre</label>
                      <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>O+</option>
                        <option>O-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                      </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
                      <input type="date" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                      <label for="street-address" class="block text-sm font-medium text-gray-700">Teléfono</label>
                      <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                      <label for="email-address" class="block text-sm font-medium text-gray-700">Correo</label>
                      <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Dirección</label>
                      <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                      <label for="last-name" class="block text-sm font-medium text-gray-700">Ficha</label>
                      <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-12 sm:col-span-12">
                      <label for="country" class="block text-sm font-medium text-gray-700">Programa de formación</label>
                      <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Análisis y Desarrollo de Sistemas de Información</option>
                      </select>
                    </div>

                    <div class="col-span-12 sm:col-span-12">
                      <label for="country" class="block text-sm font-medium text-gray-700">Linea de investigación</label>
                      <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>24 Horas</option>
                      </select>
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                      <label for="country" class="block text-sm font-medium text-gray-700">Trimestre</label>
                      <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>I</option>
                        <option>II</option>
                        <option>III</option>
                        <option>IV</option>
                        <option>V</option>
                        <option>VI</option>
                        <option>VII</option>
                      </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Edad</label>
                      <input type="number" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Contraseña</label>
                      <input type="password" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                      <label for="first-name" class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
                      <input type="password" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->

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
            <div class="img-share"></div>
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