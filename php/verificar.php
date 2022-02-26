<?php 
require_once("conex.php");
date_default_timezone_set('America/Bogota');
$conex = $bd->conexion();

$respuesta = [
	"exito" => false,
	"msj" => "Hubo un error al procesar la petición"
];

$txtDocumento = utf8_decode($conex->escape_string($_POST['txtuser']));
$txtClave = md5(utf8_decode($conex->escape_string($_POST['txtpass'])));;

$sentencia = "SELECT COUNT(*) as cont FROM aprendiz WHERE n_documento = '$txtDocumento' AND contrasena = '$txtClave'";
$sql = $bd->consulta($sentencia);

$datos = $sql->fetch_assoc();

if( $datos['cont'] > 0 ){

	$html = "<form id=\"formIdeas\">
	<input type=\"hidden\" id=\"idApre\" name=\"idApre\">
	<div class=\"row\">
	<div class=\"col-12\">
	<img class=\"img-fluid\" src=\"img/ideascolombo/cabecera.png\" alt=\"\">
	</div>
	</div>
	<div class=\"row my-3\">
	<div class=\"col-12 text-center\">
	<h6>FORMATO DE INSCRIPCIÓN <span class=\"text-orange\"><b>IDEAS COLOMBO</b></span></h6>
	</div>
	</div>
	<div class=\"row\">
	<div class=\"col-12\">
	<div class=\"input-group mb-3\">
	<div class=\"input-group-prepend\">
	<span class=\"input-group-text text-orange b-black n-select\" for=\"nombreTxt\">Nombre y apellidos</span>
	</div>
	<input type=\"text\" class=\"form-control b-black\" id=\"nombreTxt\" name=\"nombreTxt\">
	</div>
	</div>
	<div class=\"col-12\">
	<div class=\"input-group mb-3\">
	<div class=\"input-group-prepend\">
	<span class=\"input-group-text text-orange b-black n-select\" for=\"emailTxt\">Correo electrónico</span>
	</div>
	<input type=\"text\" class=\"form-control b-black\" id=\"emailTxt\" name=\"emailTxt\">
	</div>
	</div>
	<div class=\"col-12\">
	<div class=\"input-group mb-3\">
	<div class=\"input-group-prepend\">
	<span class=\"input-group-text text-orange b-black n-select\" for=\"telTxt\">Teléfono</span>
	</div>
	<input type=\"text\" class=\"form-control b-black\" id=\"telTxt\" name=\"telTxt\">
	</div>
	</div>
	<div class=\"col-12 text-center mb-3 radios\">
	<div class=\"custom-control custom-radio custom-control-inline\">
	<input type=\"radio\" id=\"Rolaprendiz\" name=\"rol\" value=\"2\" class=\"custom-control-input\">
	<label class=\"custom-control-label n-select\" for=\"Rolaprendiz\">Aprendiz</label>
	</div>
	<div class=\"custom-control custom-radio custom-control-inline\">
	<input type=\"radio\" id=\"Rolinstructor\" name=\"rol\" value=\"4\" class=\"custom-control-input\">
	<label class=\"custom-control-label n-select\" for=\"Rolinstructor\">Instructor</label>
	</div>
	<div class=\"custom-control custom-radio custom-control-inline\">
	<input type=\"radio\" id=\"Rolegresado\" name=\"rol\" value=\"3\" class=\"custom-control-input\">
	<label class=\"custom-control-label n-select\" for=\"Rolegresado\">Egresado</label>
	</div>
	<div class=\"custom-control custom-radio custom-control-inline\">
	<input type=\"radio\" id=\"Roladministrativo\" name=\"rol\" value=\"5\" class=\"custom-control-input\">
	<label class=\"custom-control-label n-select\" for=\"Roladministrativo\">Administrativo</label>
	</div>
	</div>
	<div class=\"col-12\">
	<div class=\"input-group mb-3\">
	<div class=\"input-group-prepend\">
	<span class=\"input-group-text text-orange b-black n-select\" for=\"programaTxt\">Programa o Especialidad</span>
	</div>
	<input type=\"text\" class=\"form-control b-black\" id=\"programaTxt\" name=\"programaTxt\">
	</div>
	</div>
	</div>
	<div class=\"row mt-4\">
	<div class=\"col-12\">
	<h4 class=\"h4 text-orange\">Nombre de tu proyecto:</h4>
	</div>
	<div class=\"col-12 mb-3\">
	<h6 class=\"h6\">Tipo de Proyecto:</h6>
	</div>
	<div class=\"col-12 text-center mb-4 radios\">
	<div class=\"custom-control custom-radio custom-control-inline\">
	<input type=\"radio\" id=\"investigacionTxt\" name=\"Tproyecto\" value=\"1\" class=\"custom-control-input\">
	<label class=\"custom-control-label n-select\" for=\"investigacionTxt\">Investigación</label>
	</div>
	<div class=\"custom-control custom-radio custom-control-inline\">
	<input type=\"radio\" id=\"innovacionTxt\" name=\"Tproyecto\" value=\"2\" class=\"custom-control-input\">
	<label class=\"custom-control-label n-select\" for=\"innovacionTxt\">Innovación y/o desarrollo</label>
	</div>
	<div class=\"custom-control custom-radio custom-control-inline\">
	<input type=\"radio\" id=\"emprendimientoTxt\" name=\"Tproyecto\" value=\"3\" class=\"custom-control-input\">
	<label class=\"custom-control-label n-select\" for=\"emprendimientoTxt\">Emprendimiento empresarial</label>
	</div>
	</div>
	<div class=\"col-12 mb-3\">
	<div class=\"row\">
	<div class=\"col-3\">
	<div class=\"d-flex flex-column text-center\">
	<h6>
	Breve Descripción de tu idea
	</h6>
	<img class=\"img-fluid\" src=\"img/ideascolombo/cerebro.png\" alt=\"cerebro.png\">
	</div>
	</div>
	<div class=\"col-9\">
	<div class=\"form-group\">
	<textarea class=\"form-control b-black\" id=\"ideaTxt\" name=\"ideaTxt\" rows=\"12\" placeholder=\"max. 300 palabras, min. 150\"></textarea>
	</div>
	</div>
	</div>
	</div>
	</div>
	<div class=\"row mt-4\">
	<div class=\"col-12\">
	<img class=\"img-fluid\" src=\"img/ideascolombo/piecera.png\" alt=\"piecera.png\">
	</div>
	</div>
	</form>";

	$sentencia = "SELECT id_apre FROM aprendiz WHERE n_documento = '$txtDocumento' AND contrasena = '$txtClave'";
	$sql = $bd->consulta($sentencia);

	$datos = $sql->fetch_assoc();

	$respuesta['exito'] = true;
	$respuesta['msj'] = "Bienvenido";
	$respuesta['idApre'] = $datos['id_apre'];
	$respuesta['html'] = $html;
}else{
	$respuesta['exito'] = false;
	$respuesta['msj'] = "Usuario Invalido";
}

echo json_encode( $respuesta );
?>