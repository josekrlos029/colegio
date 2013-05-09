<html>
<head>
<title><?php echo $titulo; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/login.css" rel="stylesheet" type="text/css" media="screen"/>
<link type="text/css" href="css/base.css" rel="stylesheet" />
<link href="css/style3.css" rel="stylesheet" type="text/css" media="screen"/>
<script type="text/javascript" src="js/modernizr.custom.79639.js"></script>

	<div class="barra"></br></br><h1>Control Academico<h1></div>
                    <tr><td align="center"><img src="vista/inicio/aro.png"></td></tr>
</table>	


<table  border="1" align="center">

    <ul>
					<li>
						
								<h3>Administrador</h3>
								<p><a href="javascript:ventana(500,500)">Entrar</a></p>
						
					</li>
					<li>
								<h3>Coordinador</h3>
								<p> <a href="javascript:ventana4(500,500)">Entrar</a></p>
					</li>
					<li>
						<h3>Docente</h3>
								<p><a href="javascript:ventana3(500,500)">Entrar</a></p>
					
					</li>
                    	<li>
								<h3>Estudiante</h3>
								<p><a href="javascript:ventana2(500,500)">Entrar</a></p>
					</li>
				</ul>
			

<!--
	<tr align="center">
	
	<td><a href="javascript:ventana(500,500)"><img src="imagenes/index/administrador.gif"  alt=""></a></td>
	
	<td align="center"><a href="javascript:ventana4(500,500)"><img src="imagenes/index/coordinacion.gif"   alt=""></a></td>
		
	<td align="center"><a href="javascript:ventana3(500,500)"><img src="imagenes/index/estudiante.gif" alt=""></a></td>
	
   <td  align="center"><a href="javascript:ventana2(500,500)"><img src="imagenes/index/docentes.gif"   alt=""></a></td>
	
    </tr>
-->	</table>
	
	</br>
	

	
</div>
</body>
<script language="Javascript">
	var w;
function ventana(x,y){

w=window.open('/colegio/administrador/logueo','/colegio/administrador/logueo', 'width=100,height=100,scrollbars=yes');
setTimeout("maximizar(w)",1000);

}

function ventana2(x,y){

w=window.open('login_Docente.html','login_Docente.html', 'width=100,height=100,scrollbars=yes');
setTimeout("maximizar(w)",1000);

}
function ventana3(x,y){

w=window.open('login_estudiante.html','login_estudiante.html', 'width=100,height=100,scrollbars=yes');
setTimeout("maximizar(w)",1000);

}
function ventana4(x,y){

w=window.open('login_coordinacion.html','login_coordinacion.html', 'width=100,height=100,scrollbars=yes');
setTimeout("maximizar(w)",1000);

}

function maximizar(win ) {
var offset = (navigator.userAgent.indexOf("Mac") != -1 ||
navigator.userAgent.indexOf("Gecko") != -1 ||
navigator.appName.indexOf("Netscape") != -1) ? 0 : 4;
win.moveTo(-offset, -offset);
win.resizeTo(screen.availWidth + (2 * offset),screen.availHeight + (2 * offset));
}
</script>
<?php
function queBrowser() {

	$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';  
	
	if (strpos($user_agent, 'Opera') !== false) {  
	   $browser = 'Opera Lo sentimos deberas navegar en google Chrome, si A un no los tienes instalado Progras Hacerlo Aqui:www.google.com/intl/es/chrome/browser/?hl=es';  
	} elseif (strpos($user_agent, 'Chrome') !== false) { ?>

<?php
 $browser = 'Google Chorme';  
	   
	   
	} elseif (strpos($user_agent, 'Firefox/2') !== false) {  
	   $browser = 'Firefox 2 Lo sentimos deberas navegar en google Chrome, si aun no los tienes instalado Progras Hacerlo Aqui:www.google.com/intl/es/chrome/browser/?hl=es';  
	} elseif (strpos($user_agent, 'Firefox/3') !== false) {  
	   $browser = 'Firefox 3 Lo sentimos deberas navegar en google Chrome, si aun no los tienes instalado Progras Hacerlo Aqui:www.google.com/intl/es/chrome/browser/?hl=es';  
	} elseif (strpos($user_agent, 'Firefox') !== false) {  
	   $browser = 'Firefox (Version desconocida) Lo sentimos deberas navegar en google Chrome, si aun no los tienes instalado Progras Hacerlo Aqui:www.google.com/intl/es/chrome/browser/?hl=es';  
	} elseif (strpos($user_agent, 'Safari') !== false) {  
	   $browser = 'Safari';  
	} elseif (strpos($user_agent, 'MSIE 6') !== false) {  
	   $browser = 'Internet Explorer 6 Lo sentimos deberas navegar en google Chrome, si aun no los tienes instalado Prodras Hacerlo Aqui:www.google.com/intl/es/chrome/browser/?hl=es';  
	} elseif (strpos($user_agent, 'MSIE 7') !== false) {  
	   $browser = 'Internet Explorer 7 Lo sentimos deberas navegar en google Chrome, si aun no los tienes instalado Prodras Hacerlo Aqui:www.google.com/intl/es/chrome/browser/?hl=es'; 
	} elseif (strpos($user_agent, 'MSIE 8') !== false) {  
	   $browser = 'Internet Explorer 8 Lo sentimos deberas navegar en google Chrome, si aun no los tienes instalado Prodras Hacerlo Aqui:www.google.com/intl/es/chrome/browser/?hl=es'; 
	} elseif (strpos($user_agent, 'MSIE9') !== false) {  
	   $browser = 'Internet Explorer (Version desconocida) Lo sentimos deberas navegar en google Chrome, si aun no los tienes instalado Progras Hacerlo Aqui:www.google.com/intl/es/chrome/browser/?hl=es'; 
	} else {  
	   $browser = 'Otro';  
	}
	
	return $browser;

}

echo 'Browser detectado: '.queBrowser().'';
?>
</html>