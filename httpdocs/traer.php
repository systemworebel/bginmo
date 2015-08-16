<?php
require 'classConeccionBD.php';
$traido=$_GET['traer'];
$solicitando='SELECT*FROM imagenes';
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

	if(count($datosImagenes)!=0){
		for($j=0;$j<$i;$j++){
			echo 	
			'<div id="'.$datosImagenes[19][$j].'" style="border:1px black solid;width:272.042px;height:800px;float:left;">
		<div id="imagen11"><img width="272.042px" height="345.333px" src="'.$datosImagenes[0][$j].'">
		</div>
		<div id="imagen12" style="width:272.042px;hegiht:250px;">
			<ul type="disc">
				<li>Nombre:'.$datosImagenes[1][$j].'</li>
				<li>Descripcion Inmueble:'.$datosImagenes[2][$j].'</li>
				<li>Caracteristicas:'.$datosImagenes[3][$j].'</li>
				<li>Arriendo Destacado?:'.$datosImagenes[5][$j].'</li>
				<li>Venta Destacada?:'.$datosImagenes[6][$j].'</li>
				<li>Precio:'.$datosImagenes[8][$j].'</li>
				<li>tipo Inmueble:'.$datosImagenes[9][$j].'</li>
				<li>Estado:'.$datosImagenes[10][$j].'</li>
				<li>Area:'.$datosImagenes[11][$j].'</li>
				<li>Alcobas:'.$datosImagenes[12][$j].'</li>
				<li>Baños:'.$datosImagenes[13][$j].'</li>
				<li>Parqueadero:'.$datosImagenes[14][$j].'</li>
				<li>Dirección:'.$datosImagenes[15][$j].'</li>
				<li>Ciudad:'.$datosImagenes[16][$j].'</li>
				<li>Tipo Alquiler:'.$datosImagenes[17][$j].'</li>
				<li>Estrato:'.$datosImagenes[18][$j].'</li>
			</ul>
			<form action="modificar.php" method="POST">
			<input type="radio" name="modifica" value='.'"'.$datosImagenes[19][$j].'2"'.'>Modificar</input>
			<input type="radio" name="modifica" value='.'"'.$datosImagenes[19][$j].'3"'.'>Eliminar</input>
			<input type="submit" value="Ejecutar"></input></from>
		</div>
	</div>';
			}
		}
?>