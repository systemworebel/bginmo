<?php
require 'classConeccionBD.php';
$id=$_POST['id'];
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
echo "El archivo ". basename( $_FILES['archivosubido']['name']). " ha sido subido";}
$peticionModificar='UPDATE imagenes SET rutaImagen="'.$ruta.'",nombreInmueble="'.$nombre.'",descripcionInmueble="'.$descripcion.'",caracteristicas="'.$crcrsttcs.'",ubicacionGoogle="'.$ubGoogle.'",arriendoDestacado="'.$arrD.'",ventaDestacada="'.$venD.'",ubicacion="'.$ubic.'",precio="'.$precio.'",tipoInmueble="'.$tpinmo.'",estado="'.$std.'",area="'.$area.'",alcobas="'.$cuartos.'",banos="'.$banos.'",parqueadero="'.$pqdero.'",direccion="'.$drccn.'",ciudad="'.$city.'",tipoAlquiler="'.$tpalq.'",estrato="'.$strt.'" WHERE id="'.$id.'"';
if(mysql_query($peticionModificar)){
	echo 'Su anuncion:'.$nombre.' ha sido modificado con éxito';
}else{
	echo 'Ocurrío un error en la modificación';
}
?>