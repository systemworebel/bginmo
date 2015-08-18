<?php
require "classConeccionBD.php";
$nombre=$_GET["nombre"];
$email=$_GET["email"];
$mensaje=$_GET["mensaje"];
$bandera=0;
$bandera2='';

if($nombre!='' or $email!='' or $mensaje!=''){
foreach (count_chars($email,1) as $i => $val) {
	if(chr($i)=='@'){
		$bandera=$bandera+1;
	}elseif(chr($i)==' '){
		$bandera2="espacio";
	}
}
if($bandera==1 and $bandera2!=' '){
$enviomsj="INSERT INTO mensajes (nombreUsuario,correoUsuario,mensajeUsuario) VALUES ('".$nombre."','".$email."','".$mensaje."')";
if(mysql_query($enviomsj)or die("Ha ocurrido un error al enviar su mensaje, por favor intentelo nuevamente"));

echo "Su mensaje ha sido enviado correctamente,<br/>Muchisimas Gracias";
}else{
echo "Debe ingresar un correo electronico";
}

}else{
	echo "Debe ingresar sus datos";
}
?>