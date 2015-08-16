function Avisos(idAviso,cant,tipo){
	this.idAviso=idAviso;
	this.cant=cant;
	this.tipo=tipo;//tipo 1(ventas) o 2(arriendos)
	this.ajaxAvisos=null;
	this.ajaxEnd=null;
	function Xml(){
		if(window.ActiveXObject){
			this.ajaxAvisos=new ActiveXObject('Microsoft.XMLHTTP');
		}else if(window.XMLHttpRequest){
			this.ajaxAvisos=new XMLHttpRequest();
		}

		return this.ajaxAvisos;
	}

	this.ajaxEnd=Xml();
}

Avisos.prototype.total=function(){
var idAccedido=document.getElementById(this.idAviso);
var ajaxTotal=this.ajaxEnd;

ajaxTotal.onreadystatechange=recibiendoTotal;
ajaxTotal.open('GET','emisor.php?idAviso='+this.idAviso+'&cantd=total'+'&tipo=0',true);
ajaxTotal.send(null);

function recibiendoTotal(){
	if(ajaxTotal.readyState==4){
		idAccedido.innerHTML=ajaxTotal.responseText;
	}else{
		if(ajaxTotal.status!=200){
			idAccedido.innerHTML=ajaxTotal.statusText;
		}
	}
}


}

Avisos.prototype.busqueda=function(){


}

Avisos.prototype.cantEspecifica=function(){
	var idAccedidocE=document.getElementById(this.idAviso);
	var ajaxEspecifico=this.ajaxEnd;
	var cantidad=this.cant;

	ajaxEspecifico.onreadystatechange=recibiendoEspecifico;
	ajaxEspecifico.open('GET','emisor.php?idAviso='+this.idAviso+'&cantd='+cantidad+'&tipo=0',true);
	ajaxEspecifico.send(null);

function recibiendoEspecifico(){
	if(ajaxEspecifico.readyState==4){
		idAccedidocE.innerHTML=ajaxEspecifico.responseText;
	}else{
		if(ajaxEspecifico.status!=200){
			idAccedidocE.innerHTML=ajaxEspecifico.statusText;
		}
	}
}

}

Avisos.prototype.cantEspecifica1=function(){
	var tipoAoV=this.tipo;
	var idAccedidocE1=document.getElementById(this.idAviso);
	var ajaxEspecifico1=this.ajaxEnd;
	var cantidad=this.cant;

	ajaxEspecifico1.onreadystatechange=recibiendoEspecifico1;
	ajaxEspecifico1.open('GET','emisor.php?idAviso='+this.idAviso+'&cantd='+cantidad+'&tipo='+tipoAoV,true);
	ajaxEspecifico1.send(null);

function recibiendoEspecifico1(){
	if(ajaxEspecifico1.readyState==4){
		idAccedidocE1.innerHTML=ajaxEspecifico1.responseText;
	}else{
		if(ajaxEspecifico1.status!=200){
			idAccedidocE1.innerHTML=ajaxEspecifico1.statusText;
		}
	}
}

}


