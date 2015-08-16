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
		height:530px;
		top:25%;
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

<?php
require "classConeccionBD.php";
$obtenido=$_POST['modifica'];
$id=substr($obtenido,0,-1);
if($obtenido%2==0){

	echo '<a href="javascript:emergente('."'visible'".')";>Modificar Imagen</a>';
	echo "<div id='bgVentana'>
		<div id='ventana'>
			<a href="."javascript:emergente('hidden');>Cerrar Ventana</a><br/><br/>
			<form enctype='multipart/form-data' action='modificando.php' method='post'>
				Nombre inmuble: <input type='text' name='nombreInmueble' ></input><br/>
				Descripcion Inmueble: <br/><textarea type='text' cols='50' rows='9'name='descripcionInmueble' ></textarea><br/>
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
				<input type='hidden' name='id' value=".$id."></input>'
				<input name='archivosubido' type='file'/><br/>
				<input type='submit' style='position:relative; left:90%;value=Modificar'/>
			</form>
		</div>
	</div><br/><br/>";

	
}else{
	$sentenciaEliminar='DELETE FROM imagenes WHERE id="'.$id.'"';
	if(mysql_query($sentenciaEliminar)){
		echo 'Su anuncio ha sido eliminado con éxito';
	}else{
		echo 'Ha ocurrido un error al intentar eliminar su anuncio';

	}
}

?>
</body>
</html>
