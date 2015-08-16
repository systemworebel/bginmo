function buscarImagen(idbuscador,id_div,idsendfind){
	this.idbuscador=idbuscador;
	this.idndiv=id_div;
	this.idsendfind=idsendfind;

}
buscarImagen.prototype.ejecutBuscador=function(){
	var id_enviarfind=document.getElementById(this.idsendfind);
	var id_buscador=document.getElementById(this.idbuscador);
	var div=document.getElementById(this.idndiv);
	if(window.attachEvent){
		id_enviarfind.attachEvent('onclick',buscar);
	}else if(window.addEventListener){
		id_enviarfind.addEventListener('click',buscar,false);
	}
	var ajaxBusca=null;
	function buscar(){
		var valorIngresado=id_buscador.value;
		if(window.ActiveXObject){
			ajaxBusca=new ActiveXObject('Microsoft.XMLHTTP');
		}else if(window.XMLHttpRequest){
			ajaxBusca=new XMLHttpRequest();
		}

		ajaxBusca.onreadystatechange=respuestaBusqueda;
		ajaxBusca.open('GET','busqueda.php?valorIng='+valorIngresado,true);
		ajaxBusca.send(null);
	}

	function respuestaBusqueda(){
		if(ajaxBusca.readyState==4){
			div.innerHTML=ajaxBusca.responseText;
		}else{
			div.innerHTML='Cargando...';
		}
	}
}

function traerDatos(muestraImagen){
	this.muestraImagen=muestraImagen;
	var divinner=this.muestraImagen;
	var divTraido=document.getElementById(divinner);

	var ajaxTrae=null;

	if(window.ActiveXObject){
			ajaxTrae=new ActiveXObject('Microsoft.XMLHTTP');
		}else if(window.XMLHttpRequest){

			ajaxTrae=new XMLHttpRequest();
		}

		ajaxTrae.onreadystatechange=respuestaTraer;
		ajaxTrae.open('GET','traer.php?traer=yes',true);
		ajaxTrae.send(null);

	function respuestaTraer(){
		if(ajaxTrae.readyState==4){

			divTraido.innerHTML=ajaxTrae.responseText;
		}else{
							
			divTraido.innerHTML='Cargando...';
			}
		}		

}







