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
	<!-- Menu -->
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

	<!-- MODAL DE REGISTRO - APRENDIZ SEMILLERO -->
	<div class="w100">
		<img class="w100" src="img/slider/SLIDER-SIDICA4.png" alt="">
	</div>
	<div class="container">
		<div id="mreg_sidica" class="card shadow-xl my-3">
			<div class="card-body">
				<div class="container">
					<br>
					<div class="row my-3">
						<div class="col-12 text-center my-2">
							<h6 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-dark text-white-900 sm:text-4xl">FORMULARIO DE INSCRIPCIÓN <span class="secondary"><b>SIDICA</b></span></h6>
						</div>
					</div>
					<div class="row">
						<form id="form-semi">
							<div class="row col-12 justify-content-start">
								<div class="flex flex-col mb-3 col-lg-6">
									<label for="t_rol" class="text-base font-medium text-gray-900">Rol:</label>
									<div class="relative">
										<select class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" id="t_rol" name="t_rol">
											<option value="0" selected>Seleccione...</option>
											<?php foreach ($tipoRol as $dato): ?>
												<option value="<?php echo $dato['id_roles']; ?>"><?php echo utf8_encode($dato['rol']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="txtNombre" class="text-base font-medium text-gray-900">Nombre:</label>
									<div class="relative">
										<input id="txtNombre" type="text" name="txtNombre" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Ingresa tu nombre" />
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="txtApellido" class="text-base font-medium text-gray-900">Apellido:</label>
									<div class="relative">
										<input id="txtApellido" type="text" name="txtApellido" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Ingresa tu apellido" />
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="t_documento" class="text-base font-medium text-gray-900">Tipo de Documento:</label>
									<div class="relative">
										<select class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" id="t_documento" name="t_documento">
											<option value="0" selected>Seleccione...</option>
											<?php foreach ($t_doc as $dato): ?>
												<option value="<?php echo $dato['id_doc']; ?>"><?php echo utf8_encode($dato['tipo']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="txtDocumento" class="text-base font-medium text-gray-900">Documento:</label>
									<div class="relative">
										<input id="txtDocumento" type="text" name="txtDocumento" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Número de documento" />
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="t_sangre" class="text-base font-medium text-gray-900">Tipo de Sangre:</label>
									<div class="relative">
										<select class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" id="t_sangre" name="t_sangre">
											<option value="0" selected>Seleccione...</option>
											<?php foreach ($t_san as $dato): ?>
												<option value="<?php echo $dato['id_sa']; ?>"><?php echo utf8_encode($dato['tipo']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="fechaNac" class="text-base font-medium text-gray-900">Fecha de nacimiento:</label>
									<div class="relative">
										<input id="fechaNac" type="date" name="fechaNac" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Número de documento" />
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="txtTelefono" class="text-base font-medium text-gray-900">Teléfono:</label>
									<div class="relative">
										<input id="txtTelefono" type="text" name="txtTelefono" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Ingresa tu correo" />
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="txtCorreo" class="text-base font-medium text-gray-900">Correo:</label>
									<div class="relative">
										<input id="txtCorreo" type="email" name="txtCorreo" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Ingresa tu correo" />
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="txtDireccion" class="text-base font-medium text-gray-900">Dirección:</label>
									<div class="relative">
										<input id="txtDireccion" type="text" name="txtDireccion" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Dirección de residencia" />
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="txtFicha" class="text-base font-medium text-gray-900">Ficha:</label>
									<div class="relative">
										<input id="txtFicha" type="text" name="txtFicha" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Número de ficha" />
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="program" class="text-base font-medium text-gray-900">Programa de Formación:</label>
									<div class="relative">
										<select class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" id="program" name="program">
											<option value="0" selected>Seleccione...</option>
											<?php foreach ($programa as $dato): ?>
												<option value="<?php echo $dato['id_prog']; ?>"><?php echo utf8_encode($dato['programa']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="l_investigacion" class="text-base font-medium text-gray-900">Linea de investigación:</label>
									<div class="relative">
										<select class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" id="l_investigacion" name="l_investigacion">
											<option value="0" selected>Seleccione...</option>
											<?php foreach ($linea as $dato): ?>
												<option value="<?php echo $dato['id_li']; ?>"><?php echo utf8_encode($dato['l_investigacion']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="trim" class="text-base font-medium text-gray-900">Trimestre:</label>
									<div class="relative">
										<select class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" id="trim" name="trim">
											<option value="0" selected>Seleccione...</option>
											<?php foreach ($trim as $dato): ?>
												<option value="<?php echo $dato['id_trim']; ?>"><?php echo utf8_encode($dato['trimestre']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="txtEdad" class="text-base font-medium text-gray-900">Edad:</label>
									<div class="relative">
										<input id="txtEdad" type="number" name="txtEdad" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Ingresa tu edad" />
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="pass" class="text-base font-medium text-gray-900">Contraseña:</label>
									<div class="relative">
										<input id="pass" type="password" name="pass" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Ingresa una contraseña" />
									</div>
								</div>

								<div class="flex flex-col mb-3 col-lg-6">
									<label for="confir_pass" class="text-base font-medium text-gray-900">Confirmar contraseña:</label>
									<div class="relative">
										<input id="confir_pass" type="password" name="confir_pass" class="required form-control text-sm placeholder-gray-500 pl-4 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" placeholder="Confirma tu contraseña" />
									</div>
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