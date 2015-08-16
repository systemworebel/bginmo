<?php
require 'classConeccionBD.php';
$idtotal=$_GET['idAviso'];
$cantd=$_GET['cantd'];
$tipo=$_GET['tipo'];
if(isset($idtotal) and $idtotal!='' and $idtotal!='0' and $cantd=='total' and $tipo=='0'){
$todosAvisos='SELECT*FROM imagenes';
$paqueteRecibido=mysql_query($todosAvisos);
$i=0;
while($filasObtenidas=mysql_fetch_array($paqueteRecibido)){
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
		if(count($datosImagenes)!=0){
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
		}
}elseif($cantd!='total' and $tipo=='0'){
$masDestacados='SELECT*FROM imagenes WHERE arriendoDestacado="destacado"  ORDER BY id DESC';
$destacadosRecibidos=mysql_query($masDestacados);
$k=0;
while($fdestacadasRec=mysql_fetch_array($destacadosRecibidos)){
	$destRec[0][$k]=$fdestacadasRec['rutaImagen'];
	$destRec[1][$k]=$fdestacadasRec['nombreInmueble'];
	$destRec[2][$k]=$fdestacadasRec['descripcionInmueble'];
	$destRec[3][$k]=$fdestacadasRec['caracteristicas'];
	$destRec[4][$k]=$fdestacadasRec['ubicacionGoogle'];
	$destRec[5][$k]=$fdestacadasRec['arriendoDestacado'];
	$destRec[6][$k]=$fdestacadasRec['ventaDestacada'];
	$destRec[7][$k]=$fdestacadasRec['ubicacion'];
	$destRec[8][$k]=$fdestacadasRec['precio'];
	$destRec[9][$k]=$fdestacadasRec['tipoInmueble'];
	$destRec[10][$k]=$fdestacadasRec['estado'];
	$destRec[11][$k]=$fdestacadasRec['area'];
	$destRec[12][$k]=$fdestacadasRec['alcobas'];
	$destRec[13][$k]=$fdestacadasRec['banos'];
	$destRec[14][$k]=$fdestacadasRec['parqueadero'];
	$destRec[15][$k]=$fdestacadasRec['direccion'];
	$destRec[16][$k]=$fdestacadasRec['ciudad'];
	$destRec[17][$k]=$fdestacadasRec['tipoAlquiler'];
	$destRec[18][$k]=$fdestacadasRec['estrato'];
	$destRec[19][$k]=$fdestacadasRec['id'];
	$k++;
}

if($k>=$cantd){
	$limite=$cantd;
}else{
	$limite=$k;
}
		$cad='<header><h3>Proyectos Destacados</h3></header>';
		for($w=0;$w<$limite;$w++){
			$cad=$cad.'<div class="property small"><a href="informacion.php?idAviso='.$destRec[19][$w].'"><div class="property-image"><img alt="" src="'.$destRec[0][$w].'"></div></a><div class="info"><a href="informacion.php?idAviso='.$destRec[19][$w].'"><h4>'.$destRec[16][$w].'</h4></a><figure>'.$destRec[15][$w].'</figure><div class="tag price">$ '.$destRec[8][$w].'</div></div></div><!-- /.property -->';
		}
	echo $cad;
}elseif($tipo=='1' or $tipo=='2'){
	if($tipo=='1'){
		$columna='ventaDestacada';
		$titulo='Inmuebles en Venta';
	}elseif($tipo=='2'){
		$columna='arriendoDestacado';
		$titulo='Arriendos Destacados';
	}
$masDestacados='SELECT*FROM imagenes WHERE '.$columna.'="destacado"  ORDER BY id DESC';
$destacadosRecibidos=mysql_query($masDestacados);
$k=0;
while($fdestacadasRec=mysql_fetch_array($destacadosRecibidos)){
	$destRec[0][$k]=$fdestacadasRec['rutaImagen'];
	$destRec[1][$k]=$fdestacadasRec['nombreInmueble'];
	$destRec[2][$k]=$fdestacadasRec['descripcionInmueble'];
	$destRec[3][$k]=$fdestacadasRec['caracteristicas'];
	$destRec[4][$k]=$fdestacadasRec['ubicacionGoogle'];
	$destRec[5][$k]=$fdestacadasRec['arriendoDestacado'];
	$destRec[6][$k]=$fdestacadasRec['ventaDestacada'];
	$destRec[7][$k]=$fdestacadasRec['ubicacion'];
	$destRec[8][$k]=$fdestacadasRec['precio'];
	$destRec[9][$k]=$fdestacadasRec['tipoInmueble'];
	$destRec[10][$k]=$fdestacadasRec['estado'];
	$destRec[11][$k]=$fdestacadasRec['area'];
	$destRec[12][$k]=$fdestacadasRec['alcobas'];
	$destRec[13][$k]=$fdestacadasRec['banos'];
	$destRec[14][$k]=$fdestacadasRec['parqueadero'];
	$destRec[15][$k]=$fdestacadasRec['direccion'];
	$destRec[16][$k]=$fdestacadasRec['ciudad'];
	$destRec[17][$k]=$fdestacadasRec['tipoAlquiler'];
	$destRec[18][$k]=$fdestacadasRec['estrato'];
	$destRec[19][$k]=$fdestacadasRec['id'];
	$k++;
}

if($k>=$cantd){
	$limite=$cantd;

}else{
	$limite=$k;
}
	$cad=' 	<div class="container"><header class="section-title"><h2>'.$titulo.'</h2><a href="proyectos.html" class="link-arrow">Ver todos</a></header><div class="row">';
	for($w=0;$w<$limite;$w++){
	$cad=$cad.'<div class="col-md-3 col-sm-6"><div class="property"><a href="informacion.php?idAviso='.$destRec[19][$w].'"><div class="property-image"><img alt="" src="'.$destRec[0][$w].'"></div><div class="overlay"><div class="info"><div class="tag price">$ '.$destRec[8][$w].'</div><h3>'.$destRec[16][$w].'</h3><figure>'.$destRec[15][$w].'</figure></div><ul class="additional-info"><li><header>Area:</header><figure>'.$destRec[11][$w].'<sup>2</sup></figure></li><li><header>Alcobas:</header><figure>'.$destRec[12][$w].'</figure></li><li><header>Baños:</header><figure>'.$destRec[13][$w].'</figure></li><li><header>Parqueaderos:</header><figure>'.$destRec[14][$w].'</figure></li></ul></div></a></div><!-- /.property --></div><!-- /.col-md-3 -->';
		}
	echo $cad.'</div><!-- /.row--></div><!-- /.container -->';
}
?>