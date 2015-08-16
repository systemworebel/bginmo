<?php
$root='root';
$hosting='localhost';
$contrasenaBD='';
$basedatos='bginmo';

class BaseDatos{
	private $root;
	private $hosting;
	private $contrasenaBD;
	private $basededatos;

	public function setConfigBD($hosting,$root,$contrasenaBD,$basedatos){
		$this->hosting=$hosting;
		$this->root=$root;
		$this->contrasenia=$contrasenaBD;
		$this->basedatos=$basedatos;
	}

	public function conectandoBD(){

		$coneccion=mysql_connect($this->hosting,$this->root,$this->contrasenaBD);
		if(!$coneccion){
			die('No se pudo conectar: '.mysql_error());
		}else{
			$coneccionBD=mysql_select_db($this->basedatos,$coneccion);
			if(!$coneccionBD){
				die('No se pudo conectar a la base de datos: '.mysql_error());
			}
		}

	}
}

$objetoconeccionBD=new BaseDatos();
$objetoconeccionBD->setConfigBD($hosting,$root,$contrasenaBD,$basedatos);
$objetoconeccionBD->conectandoBD();

?>