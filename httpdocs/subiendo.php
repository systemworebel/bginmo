<?php
require 'classConeccionBD.php';
$nombre=$_POST['nombreInmueble'];
$descripcion=$_POST['descripcionInmueble'];
$drccn=$_POST['direccion'];
$crcrsttcs=$_POST['caracteristicas'];
$arrD=$_POST['arriendoDestacado'];
$venD=$_POST['ventaDestacada'];
$city=$_POST['ciudad'];
$precio=$_POST['precio'];
$tpinmo=$_POST['tipoInmueble'];
$std=$_POST['estado'];
$area=$_POST['area'];
$cuartos=$_POST['alcobas'];
$banos=$_POST['banos'];
$pqdero=$_POST['parqueadero'];
$tpalq=$_POST['tipoAlquiler'];
$strt=$_POST['estrato'];
$ubic=$city.' '.$drccn;
$ubGoogle='nada';
$banderaPrincipal='no';
$ruta='assets/imgavisos/';
for($i=0;$i<count($_FILES["archivosubido"]["name"]);$i++){
	$origen=$_FILES["archivosubido"]["tmp_name"][$i];
	$destino=$ruta.$_FILES["archivosubido"]["name"][$i];
	if(move_uploaded_file($origen, $destino)){
		$rutaFinal[$i+1]=$destino;
		$banderaPrincipal='si';
	}else{
		echo 'El archivo: '.$_FILES['archivosubido']['name'][$i].' no se pudo subir al servidor<br/>';
	}
}

if($banderaPrincipal=='si'){
$peticionAnadir='INSERT INTO imagenes 
(rutaImagen,rutaImagen2,rutaImagen3,rutaImagen4,rutaImagen5,nombreInmueble,descripcionInmueble,caracteristicas,ubicacionGoogle,
arriendoDestacado,ventaDestacada,ubicacion,precio,tipoInmueble,estado,area,
alcobas,banos,parqueadero,direccion,ciudad,tipoAlquiler,estrato)
VALUES ("'.$rutaFinal[1].'","'.$rutaFinal[2].'","'.$rutaFinal[3].'","'.$rutaFinal[4].'","'.$rutaFinal[5].'","'.$nombre.'","'.$descripcion.'","'.$crcrsttcs.'","'.$ubGoogle.'",
"'.$arrD.'","'.$venD.'","'.$ubic.'","'.$precio.'","'.$tpinmo.'","'.$std.'","'.$area.'","'.$cuartos.'",
"'.$banos.'","'.$pqdero.'","'.$drccn.'","'.$city.'","'.$tpalq.'",
"'.$strt.'")';
mysql_query($peticionAnadir);
echo 'Sus imagenes ya se encuentran el servidor dedicado, y en su base de datos';
} else{
echo "Ha ocurrido un error, Intente de nuevo!";
}






