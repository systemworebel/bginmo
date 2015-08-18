<?php
session_start();
if($_SESSION['correo']=='admin@bginmo.com' and $_SESSION['contrasena']=='Bginmobiliaria'){
echo 'Has iniciado Sesion:'.$_SESSION['correo'].'<br/>';
$_SESSION['correo']='admin@bginmo.com';
$_SESSION['contrasena']='Bginmobiliaria';
}else{
		header("Location: http://localhost/bginmo/httpdocs/ingreso.html");
}
?>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
		<a href="cerrarSesion.php">Cerrar Sesión</a><br/><br/>
	<div style="border:3px #A9F5A9 solid; background-color:#CEF6E3;width:400px;height:500px;">
<form action="satisfecho.php" method="post" enctype="multipart/form-data">
	Ingrese el nombre del cliente: <input type="text" name="nombre"></input><br/>Ingrese el comentario: <br/>
	<textarea name="comentario" rows="30" cols="50"></textarea><br/>
	Foto del cliente: <input type='file' name='imagencliente'></input><br/>
	<input type="submit" name="enviar">Enviar</input>
</div>
</body>
</style>