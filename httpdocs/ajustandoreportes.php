<?php
session_start();
if($_SESSION['correo']=='admin@bginmo.com' and $_SESSION['contrasena']=='Bginmobiliaria'){
echo 'Has iniciado Sesion:'.$_SESSION['correo'].'<br/>';
$_SESSION['correo']='admin@bginmo.com';
$_SESSION['contrasena']='Bginmobiliaria';
}else{
		header("Location: http://localhost/bginmo/httpdocs/ingreso.html");
}

require "classConeccionBD.php";
$inmarrendados=$_POST["inmarrendados"];
$provendidos=$_POST["provendidos"];
$avaluos=$_POST["avaluos"];
$consultoria=$_POST["consultoria"];

$actReportes="UPDATE reportesnosotros SET inmarrendados='".$inmarrendados."',provendidos='".$provendidos."',avaluos='".$avaluos."',consultoria='".$consultoria."'";
if(mysql_query($actReportes)){
	echo "Sus reportes han sido actualizado";	
	}else{
		echo "Hubo una falla en la base de datos, por favor intente nuevamente";
	}


?>