<?php 
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, 'es_CO');

$hoy = date("Y-m-d H:i:s");

require_once("conex.php");

$conex = $bd->conexion();

$datos = [];

$t_rol = utf8_decode($conex->escape_string($_POST['t_rol']));
$nombre = utf8_decode($conex->escape_string($_POST['nombre']));
$apellido = utf8_decode($conex->escape_string($_POST['apellido']));
$t_documento = utf8_decode($conex->escape_string($_POST['t_documento']));
$documento = utf8_decode($conex->escape_string($_POST['documento']));
$t_sangre = utf8_decode($conex->escape_string($_POST['t_sangre']));
$f_naci = utf8_decode($conex->escape_string($_POST['fechaNac']));
$tel = utf8_decode($conex->escape_string($_POST['telefono']));
$correo = utf8_decode($conex->escape_string($_POST['correo']));
$address = utf8_decode($conex->escape_string($_POST['direccion']));
$ficha = utf8_decode($conex->escape_string($_POST['ficha']));
$p_forma = utf8_decode($conex->escape_string($_POST['progam']));
$l_inves = utf8_decode($conex->escape_string($_POST['l_investigacion']));
$trim = utf8_decode($conex->escape_string($_POST['trim']));
$edad = utf8_decode($conex->escape_string($_POST['edad']));
$pass = md5(utf8_decode($conex->escape_string($_POST['c_pass'])));
$horario1 = [];
$horario2 = [];
if(isset($_POST['horarios_maniana'])){
    $horario1 = $_POST['horarios_maniana'];
}

if(isset($_POST['horarios_tarde'])){
    $horario2 = $_POST['horarios_tarde'];
}

$long_h1 = sizeof($horario1);
$long_h2 = sizeof($horario2);

// save aprendiz
$sql_apre = "INSERT INTO aprendiz(nombres, apellidos, id_doc, n_documento, f_nacimiento, edad, id_sa, direccion, id_prog, f_formacion, id_trim, email_1, contrasena, n_telefono,fecha_registro, id_roles) VALUES ('$nombre','$apellido',$t_documento,$documento,'$f_naci',$edad,$t_sangre,'$address',$p_forma,$ficha,$trim,'$correo','$pass',$tel,'$hoy',$t_rol)";
$execute_a = $bd->consulta($sql_apre);
if($execute_a){
	// get id aprendiz
	$ultimo_id = mysqli_fetch_array($bd->consulta("SELECT id_apre FROM aprendiz ORDER BY id_apre DESC LIMIT 1"));
	// save image perfil
	$sql_image = "INSERT INTO img_perfiles(img_ruta,img_nombre,id_apre) VALUES ('../img/','new_avatar.jpg',{$ultimo_id['id_apre']})";
	$images = $bd->consulta($sql_image);
	// save linea investigación
	$sql_li = "INSERT INTO linea_asignada(id_apre,id_li) VALUES ({$ultimo_id['id_apre']},$l_inves)";
	$linea_inves = $bd->consulta($sql_li);
	// save dias mañana
	if($long_h1 > 0 ){
		$sql_h1 = "INSERT INTO reserva_maniana(id_apre,id_dm) VALUES ";
		for($i = 0;$i < $long_h1;$i++){
			$sql_h1 .= "({$ultimo_id['id_apre']},$horario1[$i]),";
		}
		$sql_h1 = substr($sql_h1,0,-1);
		$execute_h1 = $bd->consulta($sql_h1);
	} else { $execute_h1 = true; }
	//save dias tarde
	if($long_h2 > 0 ){
		$sql_h2 = "INSERT INTO reserva_tarde(id_apre,id_dt) VALUES ";
		for($i = 0;$i < $long_h2;$i++){
			$sql_h2 .= "({$ultimo_id['id_apre']},$horario2[$i]),";
		}
		$sql_h2 = substr($sql_h2,0,-1);
		$execute_h2 = $bd->consulta($sql_h2);
	} else { $execute_h2 = true; }
	if($images && $linea_inves && $execute_h1 && $execute_h2){
		echo "Correcto";
	}else{
		echo "Error : ".$sql_image."<br>".$sql_li."<br>".$sql_h1."<br>".$sql_h2;
	}
}else{
	echo "Error Aprendiz";
}

?>