<?php
require 'classConeccionBD.php';
$precioinicial=$_GET['precioIni'];
$preciofinal=$_GET['precioFin'];
$tipoInmueble=$_GET['tipo_inmueble'];
$ciudad=$_GET['ciudad'];
$tipoAlquiler=$_GET['tipo_alquiler'];
$estrato=$_GET['estrato'];
$matrizBA=array($precioinicial,$preciofinal,$tipoInmueble,$ciudad,$tipoAlquiler,$estrato);
$cad='';
$ubicacion='';
for($a=0;$a<6;$a++){

	if($matrizBA[$a]=='nada' or $matrizBA[$a]==''){

	}else{

		if($a==0){
			$cad=' precio >="'.$matrizBA[0].'" AND';
			$ubicacion='ultimo0';
		}elseif($a==1){
			$cad=$cad.' precio <="'.$matrizBA[1].'" AND';
			$ubicacion='ultimo1';
		}elseif($a==2){
			$cad=$cad.' tipoInmueble="'.$matrizBA[2].'" AND';
			$ubicacion='ultimo2';
		}elseif($a==3){
			$cad=$cad.' ciudad="'.$matrizBA[3].'" AND';
			$ubicacion='ultimo3';
		}elseif($a==4){
			$cad=$cad.' tipoAlquiler="'.$matrizBA[4].'" AND';
			$ubicacion='ultimo4';
		}elseif($a==5){
			$cad=$cad.' estrato="'.$matrizBA[5].'"';
			$ubicacion='ultimo5';
		}	
	}
}
if($ubicacion=='ultimo0'){
	$cad=str_replace(' precio >="'.$matrizBA[0].'" AND',' precio >="'.$matrizBA[0].'"',$cad);
}elseif($ubicacion=='ultimo1'){
	$cad=str_replace(' precio <="'.$matrizBA[1].'" AND',' precio <="'.$matrizBA[1].'"',$cad);
}elseif($ubicacion=='ultimo2'){
	$cad=str_replace(' tipoInmueble="'.$matrizBA[2].'" AND',' tipoInmueble="'.$matrizBA[2].'"',$cad);
}elseif($ubicacion=='ultimo3'){
	$cad=str_replace(' ciudad="'.$matrizBA[3].'" AND',' ciudad="'.$matrizBA[3].'"',$cad);
}elseif($ubicacion=='ultimo4'){
	$cad=str_replace(' tipoAlquiler="'.$matrizBA[4].'" AND',' tipoAlquiler="'.$matrizBA[4].'"',$cad);
}elseif($ubicacion=='ultimo5'){

}

$cad='SELECT*FROM imagenes WHERE '.$cad.' ORDER BY id DESC';
$todosAvisos=$cad;
$paqueteRecibido=mysql_query($todosAvisos)or die("Ocurrio un error!");
$i=0;
$datosImagenes=null;
while($filasObtenidas=mysql_fetch_array($paqueteRecibido)){
	if($filasObtenidas==false){
		
		
	}else{
	$datosImagenes[0][$i]=$filasObtenidas['rutaImagen'];
	$datosImagenes[1][$i]=$filasObtenidas['nombreInmueble'];
	$datosImagenes[2][$i]=$filasObtenidas['descripcionInmueble'];
	$datosImagenes[3][$i]=$filasObtenidas['caracteristicas'];
	$datosImagenes[4][$i]=$filasObtenidas['ubicacionGoogle'];
	$datosImagenes[5][$i]=$filasObtenidas['arriendoDestacado'];
	$datosImagenes[6][$i]=$filasObtenidas['ventaDestacada'];
	$datosImagenes[7][$i]=$filasObtenidas['ubicacion'];
	$datosImagenes[8][$i]=$filasObtenidas['precio'];
	$datosImagenes[9][$i]=$filasObtenidas['tipoInmueble'];
	$datosImagenes[10][$i]=$filasObtenidas['estado'];
	$datosImagenes[11][$i]=$filasObtenidas['area'];
	$datosImagenes[12][$i]=$filasObtenidas['alcobas'];
	$datosImagenes[13][$i]=$filasObtenidas['banos'];
	$datosImagenes[14][$i]=$filasObtenidas['parqueadero'];
	$datosImagenes[15][$i]=$filasObtenidas['direccion'];
	$datosImagenes[16][$i]=$filasObtenidas['ciudad'];
	$datosImagenes[17][$i]=$filasObtenidas['tipoAlquiler'];
	$datosImagenes[18][$i]=$filasObtenidas['estrato'];
	$datosImagenes[19][$i]=$filasObtenidas['id'];
	$i++;
	}
}


		if($datosImagenes!=null){
		for($j=0;$j<$i;$j++){
			echo '<div class="property masonry">
                            <div class="inner">
                                <a href="informacion.php?idAviso='.$datosImagenes[19][$j].'">
                                    <div class="property-image">
                                        <figure class="tag status">'.$datosImagenes[10][$j].'</figure>
                                        <figure class="type" title="Apartment"><img src="assets/img/property-types/apartment.png"  alt=""></figure>
                                        <div class="overlay">
                                            <div class="info">
                                                <div class="tag price">'.$datosImagenes[8][$j].'</div>
                                            </div>
                                        </div>
                                        <img alt="" src="'.$datosImagenes[0][$j].'">
                                    </div>
                                </a>
                                <aside>
                                    <header>
                                        <a href="informacion.php?idAviso='.$datosImagenes[19][$j].'"><h3>'.$datosImagenes[15][$j].'</h3></a>
                                        <figure>'.$datosImagenes[16][$j].'</figure>
                                    </header>
                                    <p>'.$datosImagenes[2][$j].'</p>
                                    <dl>
                                        <dt>Estado:</dt>
                                        <dd>'.$datosImagenes[10][$j].'</dd>
                                        <dt>Area:</dt>
                                        <dd>'.$datosImagenes[11][$j].'<sup>2</sup></dd>
                                        <dt>Alcobas:</dt>
                                        <dd>'.$datosImagenes[12][$j].'</dd>
                                        <dt>Baños:</dt>
                                        <dd>'.$datosImagenes[13][$j].'</dd>
                                    </dl>
                                    <a href="informacion.php?idAviso='.$datosImagenes[19][$j].'" class="link-arrow">Leer Más</a>
                                </aside>
                            </div>
                        </div>';
			}
		}else{
			echo 'No se encontraron Coincidencias';
		}

?>
