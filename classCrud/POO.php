<?php
$anadir=$_GET['anadir'];
$modificar=$_GET['modificar'];
$eliminar=$_GET['eliminar'];
$solicitar=$_GET['solicitar'];
$archivo_txt=$_GET['archivotxt'];

class Crud {
	private $mensaje_anadido;
	private $mensaje_modificado;
	private $solicitandoDatos;
	private $eliminandoDatos;
	private $nombre_txt;

	public function setConfig($nombre_txt=NULL,$mensaje_anadido=NULL,$mensaje_modificado=NULL,$solicitandoDatos=NULL,$eliminandoDatos=NULL){
		//Esta funcion configura todos los atributos de la clase ninguno de los atributos se encuentra como obligatorio
		$this->mensaje_anadido=$mensaje_anadido;
		$this->mensaje_modificado=$mensaje_modificado;
		$this->solicitandoDatos=$solicitandoDatos;
		$this->eliminandoDatos=$eliminandoDatos;
		$this->nombre_txt=$nombre_txt;
	}

	public function anadirContenido(){
		if($this->mensaje_anadido!='' and $this->mensaje_anadido!='0'){ //ocurre cuando se clickea el boton añadir
		$archivo=fopen($this->nombre_txt,'a+');
		fwrite($archivo, $this->mensaje_anadido.'<br/>');
		fclose($archivo);
		$i=0;
		$linea=file($this->nombre_txt);
		for($i;$i<count($linea);$i++){
			echo $linea[$i].'<br/>';
			}
		}
	}

	public function modificarContenido(){
		if($this->mensaje_modificado!='' and $this->mensaje_modificado!='0'){//ocurre cuando se clickea el boton modificar
		$archivo=fopen($this->nombre_txt,'w');
		fwrite($archivo,'');
		fclose($archivo);
		$archivo2=fopen($this->nombre_txt,'a+');
		fwrite($archivo2,$this->mensaje_modificado);
		fclose($archivo2);
		$linea=file($this->nombre_txt);
		$i=0;
		for($i;$i<count($linea);$i++){
			echo $linea[$i].'<br/>';
			}

		}

	}

	public function solicitando(){//Esta funcion permite solicitar los datos guardados en los divs
		if($this->solicitandoDatos=='1'){
		$linea=file($this->nombre_txt);
		$i=0;
		for($i;$i<count($linea);$i++){
			echo $linea[$i].'<br/>';
			}

		}

	}

	public function eliminando(){//Esta funcion permite eliminar de manera definitiva los datos guardados en los divs
		if($this->eliminandoDatos=='1'){
		$archivo=fopen($this->nombre_txt,'w');
		fwrite($archivo,'');
		fclose($archivo);
		echo '';
		}
	}

	public function verificarContenido(){
		if($this->mensaje_anadido=='' or $this->mensaje_modificado==''){
			//imprime una alerta cuando la verificacion es exitosa debido a un ingreso nulo en las variables
			echo '<html><head><script type="text/javascript"> alert("Debe Ingresar Información para su Respectivo Procesamiento");</script></head><body></body></html>';
		}else{
			return false;//Retorna false debido a que la verificacion no fue exitosa debido a que las variables poseen un string
		}
	}

}

$configurando=new Crud();
$configurando->setConfig($archivo_txt,$anadir,$modificar,$solicitar,$eliminar);
$configurando->anadirContenido();
$configurando->modificarContenido();
$configurando->solicitando();
$configurando->eliminando();
$configurando->verificarContenido();

?>

