<?php
session_start();
if($_SESSION['correo']=='admin@bginmo.com' and $_SESSION['contrasena']=='Bginmobiliaria'){
echo 'Has iniciado Sesion:'.$_SESSION['correo'].'<br/>';
$_SESSION['correo']='admin@bginmo.com';
$_SESSION['contrasena']='Bginmobiliaria';
}else{
		header("Location: http://localhost/bginmo/httpdocs/ingreso.html");
}
require 'classConeccionBD.php';
$valorIng=$_GET['valorIng'];
if($valorIng!=''){
$solicitando='SELECT*FROM imagenes WHERE nombreInmueble LIKE "%'.$valorIng.'%"';
$enviando=mysql_query($solicitando);
$i=0;
while($recibiendo=mysql_fetch_array($enviando)){
	$datosImagenes[0][$i]=$recibiendo['rutaImagen'];
	$datosImagenes[1][$i]=$recibiendo['nombreInmueble'];
	$datosImagenes[2][$i]=$recibiendo['descripcionInmueble'];
	$datosImagenes[3][$i]=$recibiendo['caracteristicas'];
	$datosImagenes[4][$i]=$recibiendo['ubicacionGoogle'];
	$datosImagenes[5][$i]=$recibiendo['arriendoDestacado'];
	$datosImagenes[6][$i]=$recibiendo['ventaDestacada'];
	$datosImagenes[7][$i]=$recibiendo['ubicacion'];
	$datosImagenes[8][$i]=$recibiendo['precio'];
	$datosImagenes[9][$i]=$recibiendo['tipoInmueble'];
	$datosImagenes[10][$i]=$recibiendo['estado'];
	$datosImagenes[11][$i]=$recibiendo['area'];
	$datosImagenes[12][$i]=$recibiendo['alcobas'];
	$datosImagenes[13][$i]=$recibiendo['banos'];
	$datosImagenes[14][$i]=$recibiendo['parqueadero'];
	$datosImagenes[15][$i]=$recibiendo['direccion'];
	$datosImagenes[16][$i]=$recibiendo['ciudad'];
	$datosImagenes[17][$i]=$recibiendo['tipoAlquiler'];
	$datosImagenes[18][$i]=$recibiendo['estrato'];
	$datosImagenes[19][$i]=$recibiendo['id'];
	$i++;
}
class BuscandoImg{
	private $valor_ing;
	private $nfilas;
	private $datosImagenes;

	public function BuscandoImg($valorIng,$i,$datosImagenes){
		$this->valor_ing=$valorIng;
		$this->nfilas=$i;
		$this->datosImagenes=$datosImagenes;

		
	}

	public function resultado(){
		if(count($this->datosImagenes)!=0){
			$visibilidad='visible';
		for($j=0;$j<$this->nfilas;$j++){
			echo 	
			'<div id="'.$this->datosImagenes[19][$j].'" style="border:1px black solid;width:272.042px;height:800px;float:left;">
		<div id="imagen11"><img width="272.042px" height="345.333px" src="'.$this->datosImagenes[0][$j].'">
		</div>
		<div id="imagen12" style="width:272.042px;hegiht:250px;">
			<ul type="disc">
				<li>Nombre:'.$this->datosImagenes[1][$j].'</li>
				<li>Descripcion Inmueble:'.$this->datosImagenes[2][$j].'</li>
				<li>Caracteristicas:'.$this->datosImagenes[3][$j].'</li>
				<li>Arriendo Destacado?:'.$this->datosImagenes[5][$j].'</li>
				<li>Venta Destacada?:'.$this->datosImagenes[6][$j].'</li>
				<li>Precio:'.$this->datosImagenes[8][$j].'</li>
				<li>tipo Inmueble:'.$this->datosImagenes[9][$j].'</li>
				<li>Estado:'.$this->datosImagenes[10][$j].'</li>
				<li>Area:'.$this->datosImagenes[11][$j].'</li>
				<li>Alcobas:'.$this->datosImagenes[12][$j].'</li>
				<li>Baños:'.$this->datosImagenes[13][$j].'</li>
				<li>Parqueadero:'.$this->datosImagenes[14][$j].'</li>
				<li>Dirección:'.$this->datosImagenes[15][$j].'</li>
				<li>Ciudad:'.$this->datosImagenes[16][$j].'</li>
				<li>Tipo Alquiler:'.$this->datosImagenes[17][$j].'</li>
				<li>Estrato:'.$this->datosImagenes[18][$j].'</li>
			</ul>
			<form action="modificar.php" method="POST">
			<input type="radio" name="modifica" value='.'"'.$this->datosImagenes[19][$j].'2"'.'>Modificar</input>
			<input type="radio" name="modifica" value='.'"'.$this->datosImagenes[19][$j].'3"'.'>Eliminar</input>
			<input type="submit" value="Ejecutar"></input></from>
		</div>
	</div>';
			}
		}

	}

}
}
if(isset($datosImagenes)){
$objBusqueda=new BuscandoImg($valorIng,$i,$datosImagenes);
$objBusqueda->resultado();}else{
	echo 'No se encontró ninguna coincidencia';
}


?>