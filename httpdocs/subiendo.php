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
$ruta='assets/imgavisos'.basename($_FILES['archivosubido']['name']);
if(move_uploaded_file($_FILES['archivosubido']['tmp_name'], $ruta)) { 
echo "El archivo ". basename( $_FILES['archivosubido']['name']). " ha sido subido";
$banderaPrincipal='si';}

$ruta2='assets/imgavisos'.basename($_FILES['archivosubido2']['name']);
if(move_uploaded_file($_FILES['archivosubido2']['tmp_name'], $ruta)) { 
echo "El archivo ". basename( $_FILES['archivosubido2']['name']). " ha sido subido";}

$ruta3='assets/imgavisos'.basename($_FILES['archivosubido3']['name']);
if(move_uploaded_file($_FILES['archivosubido3']['tmp_name'], $ruta)) { 
echo "El archivo ". basename( $_FILES['archivosubido3']['name']). " ha sido subido";}

$ruta4='assets/imgavisos'.basename($_FILES['archivosubido4']['name']);
if(move_uploaded_file($_FILES['archivosubido4']['tmp_name'], $ruta)) { 
echo "El archivo ". basename( $_FILES['archivosubido4']['name']). " ha sido subido";}

$ruta5='assets/imgavisos'.basename($_FILES['archivosubido5']['name']);
if(move_uploaded_file($_FILES['archivosubido5']['tmp_name'], $ruta)) { 
echo "El archivo ". basename( $_FILES['archivosubido5']['name']). " ha sido subido";}

if($banderaPrincipal=='si'){
$peticionAnadir='INSERT INTO imagenes 
(rutaImagen,rutaImagen2,rutaImagen3,rutaImagen4,rutaImagen5,nombreInmueble,descripcionInmueble,caracteristicas,ubicacionGoogle,
arriendoDestacado,ventaDestacada,ubicacion,precio,tipoInmueble,estado,area,
alcobas,banos,parqueadero,direccion,ciudad,tipoAlquiler,estrato)
VALUES ("'.$ruta.'","'.$ruta2.'","'.$ruta3.'","'.$ruta4.'","'.$ruta5.'","'.$nombre.'","'.$descripcion.'","'.$crcrsttcs.'","'.$ubGoogle.'",
"'.$arrD.'","'.$venD.'","'.$ubic.'","'.$precio.'","'.$tpinmo.'","'.$std.'","'.$area.'","'.$cuartos.'",
"'.$banos.'","'.$pqdero.'","'.$drccn.'","'.$city.'","'.$tpalq.'",
"'.$strt.'")';
mysql_query($peticionAnadir);

} else{
echo "Ha ocurrido un error, Intente de nuevo!";
}






