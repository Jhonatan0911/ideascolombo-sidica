<?php

require_once('datosDB.php');

class Conex{
	private $con;
	private $conex;
	public $idconsulta;
	public $idagregar;


	function __Construct(){
		$this->conectar();
	}

	public function conectar(){
		$this->con = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
		if(!$this->con){
			die ('Fallo al conectar '.mysqli_connect_error());

		}
		else{
			$basedatos = $this->con->select_db(DB_BD);
			if (!$basedatos) {
				die ('Fallo al selecionar Bd '.mysqli_connect_error());
			}
		}
	}

	public function consulta($sql){
		if(trim($sql != "")){
			$this->idconsulta = $this->con->query($sql);
			return $this->idconsulta;
		}
		/*if(!$this->idconsulta) 
		die ('Error en la consulta: '.$sql);*/
		
	}

	public function agregar($sql){
		if(trim($sql != "")){
			$this->idagregar = $this->con->query($sql);
			return $this->idagregar;
		}
		/*if(!$this->idagregar) 
		die ('Error en la consulta: '.$sql);*/
		
	}

	public function conexion(){
		$this->conex = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_BD);

		return $this->conex;
	}
}


$bd = new Conex();
?>