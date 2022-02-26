<?php 
session_start();

if(!isset($_SESSION['id_admin'])){
	header("Location:../index.php");
}
$ida = $_SESSION['id_admin'];
require_once("../php/conex.php");
$sql_usuario = mysqli_fetch_array($bd->consulta("SELECT concat(nombres,' ',apellidos) as name,email_1 FROM aprendiz WHERE id_apre = $ida"))
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>Inicio Admin | Semillero Investigación - Sena Colombo Alemán</title>
	<!-- Favicon-->
	<link rel="icon" href="../img/favicoSENA.png" type="image/x-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="../plugins/materialicons/icon.css" rel="stylesheet" type="text/css">

	<!-- Bootstrap Core Css -->
	<link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

	<!-- Waves Effect Css -->
	<link href="../plugins/node-waves/waves.css" rel="stylesheet" />

	<!-- Animation Css -->
	<link href="../plugins/animate-css/animate.css" rel="stylesheet" />

	<!-- Bootstrap Select Css -->
	<link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

	<!-- Sweetalert Css -->
	<link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

	<!-- alertify Css -->
	<link href="../css/alertify/alertify.min.css" rel="stylesheet" />

	<!-- Boostrap alertify Css -->
	<link href="../css/alertify/themes/bootstrap.min.css" rel="stylesheet" />

	<!-- fontawesome 4.7 Css -->
	<link href="../css/font-awesome.min.css" rel="stylesheet" />

	<!-- Custom Css -->
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/estilo.css" rel="stylesheet">

	<!-- DataTables Plugin Css -->
	<link href="../plugins/jquery-datatable/css/dataTables.bootstrap.css" rel="stylesheet" />

	<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-cyan ls-closed">
	<!-- Page Loader -->
	<div class="page-loader-wrapper">
		<div class="loader">
			<div class="preloader">
				<div class="spinner-layer pl-red">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<p>Please wait...</p>
		</div>
	</div>
	<!-- #END# Page Loader -->
	<!-- Top Bar -->
	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
				<a href="javascript:void(0);" class="bars"></a>
				<a class="navbar-brand" href="index_admin.php">ADMINISTRADOR</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<!-- Call Search -->
					<li><a href="../php/logout.php" id="cerrarhp" data-close="true"><i class="material-icons">input</i><span>Desconectarse</span></a></li>
					<!-- #END# Call Search -->
				</ul>
			</div>
		</div>
	</nav>
	<!-- #Top Bar -->
	<section>
		<!-- Left Sidebar -->
		<aside id="leftsidebar" class="sidebar">
			<!-- User Info -->
			<div class="user-info">
				<div class="image">
					<img src="../img/user.png" width="48" height="48" alt="User" />
				</div>
				<div class="info-container">
					<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo utf8_encode($sql_usuario['name']) ?></div>
					<div class="email"><?php echo utf8_encode($sql_usuario['email_1']) ?></div>
				</div>
			</div>
			<!-- #User Info -->
			<!-- Menu -->
			<div class="menu">
				<ul class="list">
					<li class="header">PRINCIPAL NAVEGACIÓN</li>
					<li class="active">
						<a href="index_admin.php">
							<i class="material-icons">home</i>
							<span>Inicio</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="menu-toggle">
							<i class="material-icons">assignment_ind</i>
							<span>Detalles de aprendices</span>
						</a>
						<ul class="ml-menu">
							<li>
								<a id="detalle_apre" href="#">Aprendices</a>
							</li>
							<li>
								<a id="ideasColombo" href="#">Ideas Colombo</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" class="menu-toggle">
							<i class="material-icons">pie_chart</i>
							<span>Estadísticas</span>
						</a>
						<ul class="ml-menu">
							<li>
								<a id="estadis_li" href="#">Linea de investigación</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" class="menu-toggle">
							<i class="material-icons">assignment</i>
							<span>Reportes</span>
						</a>
						<ul class="ml-menu">
							<li>
								<a id="reporte_li" href="#">Linea de investigación</a>
							</li>
							<li>
								<a id="exportar" href="#">Exportaciones</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="javascript:void(0);" class="menu-toggle">
							<i class="material-icons">menu</i>
							<span>Blog</span>
						</a>
						<ul class="ml-menu">
							<li>
								<a id="admin_notic" href="#">Noticias</a>
							</li>
							<li>
								<a id="admin_video" href="#">Videos</a>
							</li>
							<li>
								<a id="admin_porta" href="#">Portafolio</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- #Menu -->
			<!-- Footer -->
			<div class="legal">
				<div class="copyright">
					&copy; 2018 - 2019 <a href="javascript:void(0);">Fabrica de software</a>.
				</div>
				<div class="version">
					<b>Versión: </b> 22.05.18
				</div>
			</div>
		</aside>
		<!-- #END# Left Sidebar -->
	</section>

	<section class="content caja" id="inicio">
		<seccion class="content">
			<div class="container-fluid">
				<div class="row clearfix">
					<div class="col-md-10 col-md-push-1">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<div class="item active">
									<img src="../img/2.jpg" />
								</div>
								<div class="item">
									<img src="../img/7.jpg" />
								</div>
								<div class="item">
									<img src="../img/8.jpg" />
								</div>
							</div>

							<!-- Controls -->
							<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</seccion>
	</section>
	<section class="content caja" id="detalle" style="display: none;"></section>
	<section class="content caja" id="estadistica" style="display: none;"></section>
	<section class="content caja" id="reporte" style="display: none;"></section>
	<section class="content caja" id="exportacion" style="display: none;"></section>
	<section class="content caja" id="noticias" style="display: none;"></section>
	<section class="content caja" id="videos" style="display: none;"></section>
	<section class="content caja" id="content_porta" style="display: none;"></section>
	<section class="content caja" id="content_ideas" style="display: none;"></section>

	<!-- Jquery Core Js -->
	<script src="../plugins/jquery/jquery.min.js"></script>

	<!-- Bootstrap Core Js -->
	<script src="../plugins/bootstrap/js/bootstrap.js"></script>
	
	<!-- DataTables Plugin Js -->
	<script src="../plugins/jquery-datatable/js/jquery.dataTables.js"></script>
	<script src="../plugins/jquery-datatable/js/dataTables.bootstrap.min.js"></script>
	
	<!-- Select Plugin Js -->
	<script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

	<!-- Slimscroll Plugin Js -->
	<script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- Waves Effect Plugin Js -->
	<script src="../plugins/node-waves/waves.js"></script>

	<!-- Validation Plugin Js -->
	<script src="../plugins/jquery-validation/jquery.validate.js"></script>

	<!-- Bootstrap Notify Plugin Js -->
	<script src="../plugins/bootstrap-notify/bootstrap-notify.js"></script>
	
	<!-- SweetAlert Plugin Js -->
	<script src="../plugins/sweetalert/sweetalert.min.js"></script>

	<!-- Alertify Js -->
	<script src="../js/alertify.min.js"></script>

	<!-- ChartJs -->
	<script src="../js/Chart.min.js"></script>
	<script src="../js/chartjs-plugin-labels.min.js"></script>

	<!-- Custom Js -->
	<script src="../js/admin.js"></script>
	<script src="../js/main_admin.js"></script>
	
	<!-- tooltip -->
</body>

</html>