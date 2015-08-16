window.onload=inicializando;
window.onload=traerDatos;


function generandoContenido(identificador,widthDiv,heightDiv,borderDiv,borderColorDiv,borderLineDiv){
	this.identificador=identificador;
	this.widthDiv=widthDiv;
	this.heightDiv=heightDiv;
	this.borderDiv=borderDiv;
	this.borderColorDiv=borderColorDiv;
	this.borderLineDiv=borderLineDiv;

}

generandoContenido.prototype.imprimirContenido=function(){
var identificador=this.identificador;
var ancho=this.widthDiv;
var altura=(parseInt(this.heightDiv)/2)+30;
var pixelborde=this.borderDiv;
var colorborde=this.borderColorDiv;
var lineaborde=this.borderLineDiv;//La linea de abajo es el contenido que se imprime para poder modificar el codigo
var	Contenido="<div id='"+identificador+"-0' style='border:"+pixelborde+" "+colorborde+" "+lineaborde+"; width:"+ancho+";height:"+altura+";display:none;'><div id='"+identificador+"-ventana'><div id='"+identificador+"1' style='border:"+pixelborde+" "+colorborde+" "+lineaborde+"; width:200px;height:25px;display:none;'><button id='"+identificador+"11' value='Modificar'>Modificar</button><button id='"+identificador+"12' value='Añadir'>Añadir</button><button id='"+identificador+"13' value='Eliminar'>Eliminar</button></div><div id='"+identificador+"111' style='display:none;border:"+pixelborde+" "+colorborde+" "+lineaborde+"; width: 250px; height:250px;'><textarea cols='32' rows='15' id='"+identificador+"1111'></textarea><input type='button' value='Anadir' id='"+identificador+"1112'></input></div><div id='"+identificador+"112' style='border:"+pixelborde+" "+colorborde+" "+lineaborde+"; width: 250px; height:250px; display:none;'><textarea cols='32' rows='15' id='"+identificador+"1121'></textarea><input type='button' value='Modificar' id='"+identificador+"1122'></input></div></div></div>";
document.write(Contenido);

}
function traerDatos(identificador,cliente){
	this.identificador=identificador;
	this.cliente=cliente;
}

traerDatos.prototype.datosTraidos=function(){
  var conexion1;
  if(this.cliente=='yes'){
  var div=document.getElementById(this.identificador);
  }
  else{
  var div=document.getElementById(this.identificador);
  var div10=document.getElementById(this.identificador+'1121');	
  }

  conexion1=crearXMLHttpRequest();
  conexion1.onreadystatechange = trayendoDatos;
  conexion1.open('GET','POO.php?solicitar=1&modificar=0&anadir=0&eliminar=0&archivotxt='+this.identificador, true);
  conexion1.send(null);

	function crearXMLHttpRequest() 
	{
  		var xmlHttp=null;
  		if (window.ActiveXObject) 
    		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  		else  if (window.XMLHttpRequest) 
     		xmlHttp = new XMLHttpRequest();
  		return xmlHttp;
	}

	function trayendoDatos(){
	  if(conexion1.readyState == 4)
	  {	if(this.cliente=='yes'){
	    	div.innerHTML=conexion1.responseText;}
	    else{
	    	div.innerHTML=conexion1.responseText;
	    	div10.innerHTML=conexion1.responseText;
	    }
	  } 
	  else 
	  {
	    div.innerHTML = 'Cargando...';
	  }
	}

}


function inicializando(identificador,evento1,evento2){
	this.identificador=identificador;
	this.evento1=evento1;
	this.evento2=evento2;
	this.asignador=this.identificador+'1';
}

inicializando.prototype.inicializado=function(){
	var conexion1;
	var identificador=this.identificador;
	var principal=this.identificador+'-0';
	var div=document.getElementById(this.identificador);
	var div0=document.getElementById(principal);
	var div2=document.getElementById(this.identificador+'1');
	var div3=document.getElementById(this.identificador+'11');
	var div4=document.getElementById(this.identificador+'12');
	var div5=document.getElementById(this.identificador+'13');
	var div6=document.getElementById(this.identificador+'111');
	var div7=document.getElementById(this.identificador+'112');
	var div8=document.getElementById(this.identificador+'1111');
	var div9=document.getElementById(this.identificador+'1112');
	var div10=document.getElementById(this.identificador+'1121');
	var div11=document.getElementById(this.identificador+'1122');

	function mostrar(){
	div2.style.display='block';
	div0.style.display='block';
	
	}

	function ocultar(){
	div2.style.display='none';
		
	}

	function mostrarBotones3(){
	div6.style.display='none';
	div7.style.display='block';	

	}

	function mostrarBotones4(){
	div6.style.display='block';
	div7.style.display='none';	

	}

	function ocultarMismo(){
	div0.style.display='none';
	}

	function mostrarBotones5(){
	div6.style.display='none';
	div7.style.display='none';

	conexion1=crearXMLHttpRequest();
  	conexion1.onreadystatechange = eliminandoDatos;
  	conexion1.open('GET','POO.php?solicitar=0&modificar=0&anadir=0&eliminar=1&archivotxt='+identificador, true);
  	conexion1.send(null);
	}

	function eliminandoDatos(){

  		if(conexion1.readyState == 4)
  		{
  		  div.innerHTML=conexion1.responseText;
  		  location.reload(true);
  		} 
  		else 
  		{
  		  div.innerHTML = 'Cargando...';
  		}

	}

	function verificarTextarea3(){
		valor=div8.value.length;
		if(valor!=0){
  			conexion1=crearXMLHttpRequest();
  			conexion1.onreadystatechange = procesarEventos;
			conexion1.open('GET','POO.php?anadir='+div8.value+'&modificar=0&solicitar=0&eliminar=0&archivotxt='+
 			identificador, true);
			conexion1.send(null);
		}else{
			alert('Debe ingresar algun dato');
			return 0;
		}

	}

	function procesarEventos(){
  			
 		 if(conexion1.readyState == 4)
 		 {	div.innerHTML = conexion1.responseText;
 		   	div10.innerHTML=conexion1.responseText;
 			location.reload(true);
 		 } 
 		 else 
 		 {
 		   div.innerHTML = 'Cargando...';
 		 } 

	}

	function verificarTextarea4(){
		valor=div10.value.length;
		if(valor!=0){
			conexion1=crearXMLHttpRequest();
  			conexion1.onreadystatechange = procesarEventos;
  			conexion1.open('GET','POO.php?modificar='+div10.value+'&anadir=0&solicitar=0$eliminar=0&archivotxt='+identificador, true);
  			conexion1.send(null);
		}else{
			alert('Debe ingresar algun dato');
			return 0;
		}

	}	

	function crearXMLHttpRequest() 
	{
  		var xmlHttp=null;
  		if (window.ActiveXObject) 
    		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  		else  if (window.XMLHttpRequest) 
     		xmlHttp = new XMLHttpRequest();
  		return xmlHttp;
	}

	if(window.addEventListener){
	div.addEventListener(this.evento1,mostrar,false);
	div.addEventListener(this.evento2,ocultar,false);
	div0.addEventListener(this.evento1,mostrar,false);
	div0.addEventListener(this.evento2,ocultarMismo,false);
	div3.addEventListener('click',mostrarBotones3,false);
	div4.addEventListener('click',mostrarBotones4,false);
	div5.addEventListener('click',mostrarBotones5,false);
	div9.addEventListener('click',verificarTextarea3,false);
	div11.addEventListener('click',verificarTextarea4,false);
	}else if(window.attachEvent){
	div.attachEvent('on'+this.evento1,mostrar);
	div.attachEvent('on'+this.evento2,ocultar);
	div0.attachEvent('on'+this.evento1,mostrar);
	div0.attachEvent('on'+this.evento2,ocultar);
	div3.attachEvent('onclick',mostrarBotones3);
	div4.attachEvent('onclick',mostrarBotones4);
	div5.attachEvent('oncilck',mostrarBotones5);
	div9.attachEvent('onclick',verificarTextarea3);
	div11.attachEvent('onclick',verificarTextarea4);
	}else{
		return false;
	}

}



