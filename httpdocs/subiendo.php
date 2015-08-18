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
$ruta='assets/'.basename($_FILES['archivosubido']['name']);
if(move_uploaded_file($_FILES['archivosubido']['tmp_name'], $ruta)) { 
echo "El archivo ". basename( $_FILES['archivosubido']['name']). " ha sido subido";
$peticionAnadir='INSERT INTO imagenes 
(rutaImagen,nombreInmueble,descripcionInmueble,caracteristicas,ubicacionGoogle,
arriendoDestacado,ventaDestacada,ubicacion,precio,tipoInmueble,estado,area,
alcobas,banos,parqueadero,direccion,ciudad,tipoAlquiler,estrato)
VALUES ("'.$ruta.'","'.$nombre.'","'.$descripcion.'","'.$crcrsttcs.'","'.$ubGoogle.'",
"'.$arrD.'","'.$venD.'","'.$ubic.'","'.$precio.'","'.$tpinmo.'","'.$std.'","'.$area.'","'.$cuartos.'",
"'.$banos.'","'.$pqdero.'","'.$drccn.'","'.$city.'","'.$tpalq.'",
"'.$strt.'")';
mysql_query($peticionAnadir);

} else{
echo "Ha ocurrido un error, trate de nuevo!";
}






