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
$pidiendocorreos="SELECT*FROM mensajes ORDER BY idmensajes DESC LIMIT 20";
$resultadocorreos=mysql_query($pidiendocorreos);
$i=0;
while($filacorreos=mysql_fetch_array($resultadocorreos)){
	$datoscorreos[0][$i]=$filacorreos['idmensajes'];
	$datoscorreos[1][$i]=$filacorreos['nombreUsuario'];
	$datoscorreos[2][$i]=$filacorreos['correoUsuario'];
	$datoscorreos[3][$i]=$filacorreos['mensajeUsuario'];
$i++;
}
?>
<html>
<head>
	<meta charset="UTF-8">
</head>
<body>
	<table>
	<tr style="background-color:#A9F5A9;">
		<td>Nombre</td>
		<td>Correo</td>
		<td>Mensaje</td>
	</tr>
		<?php
		$color=array('#E0F8E6','#A9F5BC');
		$indice=0;
		for($j=0;$j<$i;$j++){
			echo '<tr style="background-color:'.$color[$indice].';">
		<td width="200px">'.$datoscorreos[1][$j].'</td>
		<td width="200px">'.$datoscorreos[2][$j].'</td>
		<td width="400px">'.$datoscorreos[3][$j].'</td>
	</tr>';
	if($indice==0){
	$indice=1;}else{
		$indice=0;
	}

		}
		?>
	</table>
	</body>
	</html>