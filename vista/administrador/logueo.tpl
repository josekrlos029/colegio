<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../utiles/css/login.css" rel="stylesheet" type="text/css" media="screen"/>
<script type="text/javascript">

setTimeout("maximizar()",1250);
function maximizar(){
var offset = (navigator.userAgent.indexOf("Mac") != -1 ||
navigator.userAgent.indexOf("Gecko") != -1 ||
navigator.appName.indexOf("Netscape") != -1) ? 0 : 4;
win.moveTo(-offset, -offset);
win.resizeTo(screen.availWidth + (2 * offset),screen.availHeight + (2 * offset));
}

function maximizar( ) {
var offset = (navigator.userAgent.indexOf("Mac") != -1 ||
navigator.userAgent.indexOf("Gecko") != -1 ||
navigator.appName.indexOf("Netscape") != -1) ? 0 : 4;
window.moveTo(-offset, -offset);
window.resizeTo(screen.availWidth + (2 * offset),
screen.availHeight + (2 * offset));
}

function IE(e){
if (navigator.appName == "Microsoft Internet Explorer" && (event.button == "2" || event.button == "3")) {
return false;
}
}
function NS(e) {
if (document.layers || (document.getElementById && !document.all)) {
if (e.which == "2" || e.which == "3") {
return false;
}
}
}
document.onmousedown=IE;document.onmouseup=NS;document.oncontextmenu=new Function("return false");
</script>


<title><?php echo $titulo; ?></title>
</head>




<body> 
<p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>

<table align="center" border="0" width="700px">
<tr>
<td align="left">
<h1>ADMINISTRADOR</h1>
</td>
<tr>
</table>
<table align="center" border="0" width="800px">
<tr>
<td>
<div class="caja"><!--------------caja--------------->
<div id="escudo" align="right"></div>
<div class="separador" align="center"> </div>
<div align="right" class="login">
<form action="/colegio/index.php?leer=administrador/verificarUsuario" method="post"  AUTOCOMPLETE="OFF">
<div align="left"><h2>Iniciar sesiòn</h2></div>
<div class="espace"> 
<input name="usuario" id="username" type="text" size="20"  class="caja_texto" placeholder="Usuario" required autofocus />
</div>
 <div class="espace">   
<input name="contraseña" id="password" type="password" size="20"  class="caja_texto" placeholder="Contraseña" required />
 </div>
 <div class="espace">
<div align="left" ><input name="submit" type="submit" value="Iniciar Sesion" class="button large blue" ></div>
</div>
</form>
<div align="left"><a href="#"><div class="link">¿olvidaste tus datos?</div></a></div>
</div><!-- end login -->
<!--------------------------end caja------------------>
</br></br></br></br>
<div id="pie" align="center">copyright 2012 - 2013  Todos los derechos reservados | appSchool</div>
</div>
<!--------------------------end contenedor-------------------------------------->
</td>
</tr>
</table>
</body>
</html>

