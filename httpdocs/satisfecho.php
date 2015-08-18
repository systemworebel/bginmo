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
$nombre=$_POST["nombre"];
$comentario=$_POST["comentario"];
$ruta='assets/imgavisos/';
$origen=$_FILES["imagencliente"]["tmp_name"];
$destino=$ruta.$_FILES["imagencliente"]["name"];
if(move_uploaded_file($origen, $destino)){
$pidiendo="SELECT*FROM contenedoresHtml";
$recibiendo=mysql_query($pidiendo);
$i=0;
while($filacliente=mysql_fetch_array($recibiendo)){
	$matrizcliente[0][$i]=$filacliente["idTag"];
	$matrizcliente[1][$i]=$filacliente["contenidoTag"];
	$matrizcliente[2][$i]=$filacliente["imagenTag"];
	$i++;
}
echo $i;
if($nombre!='' or $comentario!=''){
$actualizando1="UPDATE contenedoresHtml SET contenidoTag='".$comentario."',imagenTag='".$destino."' WHERE idTag='div4'";
$actualizando1_2="UPDATE contenedoresHtml SET contenidoTag='".$nombre."',imagenTag='".$destino."' WHERE idTag='div5'";
$actualizando2="UPDATE contenedoresHtml SET contenidoTag='".$matrizcliente[1][3]."',imagenTag='".$matrizcliente[2][3]."' WHERE idTag='div6'";
$actualizando2_2="UPDATE contenedoresHtml SET contenidoTag='".$matrizcliente[1][4]."',imagenTag='".$matrizcliente[2][3]."' WHERE idTag='div7'";
mysql_query($actualizando1);
mysql_query($actualizando1_2);
mysql_query($actualizando2);
mysql_query($actualizando2_2);
}else{
	echo "Debe ingresar el comentario y el nombre";
}	
}else{
	echo "No se pudo cargar la imagen, intente nuevamente o verifique su conexion a internet";
}

?>