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
	<meta charset='UTF-8'>
	<style type="text/css">
	#bgVentana{
		position:fixed;
		background:rgba(0,0,0,0.7);
		width:100%;
		height:100%;
		top:0px;
		left:0px;
		z-index:1;
		visibility: hidden;

	}

	#ventana{
		position:absolute;
		background-color: #d3dce3;
		border:solid #FFF 10px;
		width:400px;
		height:680px;
		top:10%;
		left:25%;
	}
	</style>
	<script type='text/javascript' src='POObginmo.js'></script>
		<script type="text/javascript">
	function emergente(valor){
		document.getElementById('bgVentana').style.visibility=valor;
	}
	</script>
</head>
<body>
	<a href="cerrarSesion.php">Cerrar Sesión</a><br/><br/>
	<a href="clientesatisfecho.php">Agregar Cliente Satisfecho</a><br/>
	<a href="mostrarcorreo.php">Mensajes Recibidos</a><br/>
	<a href="javascript:emergente('visible');">Agregar Imagen</a><br/>
<div style="background-color:#A9F5BC;width:300px;height:130px;text-align:justify;">
	<form action="ajustandoreportes.php" method="post">
		Inmuebles Arrendados: <input type="text" name="inmarrendados"></input><br/>
		&nbsp; &nbsp; Proyectos Vendidos: <input type="text" name="provendidos"></input><br/>
		&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;Cantidad Avaluos: <input type="text" name="avaluos"></input><br/>
		&nbsp; Cantidad Consultoria: <input type="text" name="consultoria"></input><br/><br/>
		<input type="submit" style="position:relative; left:80%;"></input><br/>
	</form>
</div>
	<div id='bgVentana'>
		<div id='ventana'>
			<a href="javascript:emergente('hidden');">Cerrar Ventana</a><br/><br/>
			<form enctype='multipart/form-data' action='subiendo.php' method='post'>
				Nombre inmuble: <input type='text' name='nombreInmueble' ></input><br/>
				Descripcion Inmueble: <br/><textarea type='text' cols="50" rows='9'name='descripcionInmueble' ></textarea><br/>
				Características: <input type='text' name='caracteristicas' ></input><br/>
				Direccion: <input type='text' name='direccion' ></input><br/>
				Arriendo Destacado?: <input type='text' name='arriendoDestacado' ></input><br/>
				Venta Destacada?: <br/><input type='text' name='ventaDestacada' ></input><br/>
				Ciudad: <input type='text' name='ciudad' ></input><br/>
				Precio: <input type='text' name='precio' ></input><br/>
				tipo Inmueble: <input type='text' name='tipoInmueble' ></input><br/>
				Estado: <input type='text' name='estado' ></input><br/>
				Area: <input type='text' name='area' ></input><br/>
				Alcobas: <input type='text' name='alcobas' ></input><br/>
				Baños: <input type='text' name='banos' ></input><br/>
				Parqueadero: <input type='text' name='parqueadero' ></input><br/>
				Tipo Alquiler: <input type='text' name='tipoAlquiler' ></input><br/>
				Estrato: <input type='text' name='estrato' ></input><br/>
				Subir imagen principal: <input name='archivosubido[]' type='file'/><br/>
				Subir imagen secundarias: <input name='archivosubido[]' type='file'/><br/>
				Subir imagen secundarias: <input name='archivosubido[]' type='file'/><br/>
				Subir imagen secundarias: <input name='archivosubido[]' type='file'/><br/>
				Subir imagen secundarias: <input name='archivosubido[]' type='file'/><br/>
				Slider: <input name='archivosubido[]' type='file'/><br/>
				<input type='submit' style="position:relative; left:90%;" value='Subir'/>
			</form>
		</div>
	</div><br/><br/>
	<!--Agregando imageAdministrator-->
	<!--<div><?php 
	/*require 'classConeccionBD.php';
	$trayendo='SELECT rutaImagen FROM imagenes WHERE id="1"';
	$dato=mysql_query($trayendo);
	while($fila=mysql_fetch_array($dato)){
		$matriz=$fila['rutaImagen'];
	}
	echo '<img width="400px" height="400px" src="'.$matriz.'"></img>';*/
	?></div>-->
	Buscar: <input id="buscador" type='text' style='width:200px;'/><br/><br/>
	<button id='enviarBusqueda'>Buscar</button><br/><br/>

	<div id='muestraImagen' style="display:block;border:1px black solid;float:left;"></div>

	<script type='text/javascript'>

	window.onload=objTraer;
	objBusqJs=new buscarImagen('buscador','muestraImagen','enviarBusqueda');
	objBusqJs.ejecutBuscador();

	function objTraer(){
		objTraerDatos=new traerDatos('muestraImagen');
	}
	</script>






