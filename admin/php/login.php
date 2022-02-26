<?php 
session_start();
include_once('conex.php');


$user = $_POST['username'];
$clave = $_POST['password'];

$conexion = $bd->conexion();

$correo = $conexion->escape_string($user);
$contrasena = $conexion->escape_string($clave);
if ($conexion) {
	$sentencia = "SELECT count(*) as cont FROM aprendiz WHERE email_1='$correo' AND contrasena=md5('$contrasena')";
	$resultado = mysqli_fetch_array(mysqli_query($conexion,$sentencia));
	
	if($resultado['cont'] > 0){

		$sentenciaDatos = "SELECT email_1,contrasena,id_apre,id_roles FROM aprendiz WHERE email_1='$correo'AND contrasena=md5('$contrasena') ";

		$resultadoDatos = mysqli_query($conexion,$sentenciaDatos);
		
		if($row=(mysqli_fetch_array($resultadoDatos))){

			if($row['id_roles'] == 2){
				$_SESSION['id_apre'] = $row['id_apre'];

				echo 2;
			}
			elseif($row['id_roles'] == 1){
				$_SESSION['id_admin'] = $row['id_apre'];
				
				echo 1;
			}
		}
		else{
			echo 0;
		}
	}else{
		echo 0;
	}
}
?>