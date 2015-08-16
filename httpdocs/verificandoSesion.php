<?php
$admin=$_POST['email'];
$contrasena=$_POST['password'];
require 'classConeccionBD.php';
if($admin=='admin@bginmo.com' and $contrasena=='Bginmobiliaria'){
session_start();
$_SESSION['correo']=$admin;
$_SESSION['contrasena']=$contrasena;
header("Location: http://localhost/bginmo/httpdocs/imageAdministrator.php");

}else{
	header("Location: http://localhost/bginmo/httpdocs/ingreso.html");
}

?>