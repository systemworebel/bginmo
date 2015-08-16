<?php
require 'classConeccionBD.php';
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
	private $nombre_id;

	public function setConfig($nombre_id=NULL,$mensaje_anadido=NULL,$mensaje_modificado=NULL,$solicitandoDatos=NULL,$eliminandoDatos=NULL){
		//Esta funcion configura todos los atributos de la clase ninguno de los atributos se encuentra como obligatorio
		$this->mensaje_anadido=$mensaje_anadido;
		$this->mensaje_modificado=$mensaje_modificado;
		$this->solicitandoDatos=$solicitandoDatos;
		$this->eliminandoDatos=$eliminandoDatos;
		$this->nombre_id=$nombre_id;
	}

	public function anadirContenido(){
		if($this->mensaje_anadido!='' and $this->mensaje_anadido!='0'){ //ocurre cuando se clickea el boton añadir
		$anadiendoBD='INSERT INTO contenedoresHtml (idTag,contenidoTag) VALUES ("'.$this->nombre_id.'","'.$this->mensaje_anadido.'")';
		mysql_query($anadiendoBD);
		}
	}

	public function modificarContenido(){
		if($this->mensaje_modificado!='' and $this->mensaje_modificado!='0'){//ocurre cuando se clickea el boton modificar
			$modificandoBD='UPDATE contenedoresHtml SET contenidoTag="'.$this->mensaje_modificado.'" WHERE idTag="'.$this->nombre_id.'"';
			mysql_query($modificandoBD);

		}

	}

	public function solicitando(){//Esta funcion permite solicitar los datos guardados en los divs
		if($this->solicitandoDatos=='1'){
			$solicitandoBD='SELECT contenidoTag FROM contenedoresHtml WHERE idTag="'.$this->nombre_id.'"';
			$solicitudTraidaBD=mysql_query($solicitandoBD);
			while($solFila=mysql_fetch_array($solicitudTraidaBD)){
					$solMatriz=$solFila['contenidoTag'];
					echo $solMatriz;
				}
			}

		}

	

	public function eliminando(){//Esta funcion permite eliminar de manera definitiva los datos guardados en los divs
		if($this->eliminandoDatos=='1'){
			$eliminandoBD='UPDATE contenedoresHtml SET contenidoTag=" " WHERE idTag="'.$this->nombre_id.'"';
			mysql_query($eliminandoBD);
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

