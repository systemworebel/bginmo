<?php
header('Content-type: text/css');
class Style{
	private $identificador;

	public function setConfigStyle($identificador){
		$this->identificador=$identificador;
	}

	public function settedModal(){
		echo '<<<FINCSS #'.$this->identificador.'-0 {position:fixed;background:rgba(0,0,0,0.7);width:100%;height:100%;top:0px;left:0px;z-index:1;display: none;} #'.$this->identificador.'-ventana {position:absolute;background-color: #d3dce3;border:solid #FFF 10px;width:250px;height:400px;top:25%;left:5%;} FINCSS';
	}
}
?>