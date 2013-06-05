<!DOCTYPE html>
<html lang="es">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="utiles/css/login.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="utiles/css/botones.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="utiles/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="utiles/js/envios.js" type="text/javascript" ></script>
<script type="text/javascript">
  
 
function envio(){ 
 
 var x = $("#msg");
 x.html ("<p>Cargando...</p>");
 x.show("slow");
  
 var usuario = document.getElementById("username");
 var contraseña = document.getElementById("password");

    if (usuario.value=="" || contraseña.value==""){
      x.html ( "<p>Error: Tiene Campos Vacios</p>");
      setTimeout("$('#msg').hide();", 4000);
    }else{

        var url="/colegio/inicio/verificarUsuario/";
        var data="usuario="+usuario.value+"&clave="+contraseña.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 0){
                var div = document.getElementById("msg");
                x.html ( "<p>Usuario o Contraseña Incorrectos</p>");
                usuario.value="";
                usuario.setAttribute("autofocus","true");
                contraseña.value="";
                setTimeout("$('#msg').hide();", 4000);
            }else{
                document.location.href=res;
            }
         });
    }   
}
window.onload = function() {
    $('#password').bind('keypress', function (e) {
        var key = e.keyCode || e.which;
        if (key === 13) {
            envio();
        };
    });          
}
</script>
<title><?php echo $titulo; ?></title>
</head>
<body> 
<p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>

<div id="msg" hidden>
    
</div>

<table align="center" border="0">
<tr>
    <td align="center">
<h1>APLICACION DE CONTROL ACADEMICO</h1>
</td>
</tr>
</table>
    
 <table align="right" width="40%" height="500px" border="0">
 <tr>
 <td>
     
            
                <div class="espace-btn" align="left">
                <h2>Iniciar sesión</h2>
                </div>
                
                <div class="espace" align="left">
                <input name="usuario" id="username" type="text" size="20"  class="caja-texto" placeholder="Usuario" required autofocus />
                </div>
                
                <div class="espace" align="left">   
                <input name="contraseña"  id="password" type="password" size="20"  class="caja-texto" placeholder="Contraseña" required />
                </div>
                
                <div class="espace-btn">
                <div align="left" ><button onclick="envio();" class="button large blue">Iniciar Sesión </button></div>
                </div>

                
                <div align="left"><a href="/colegio/inicio/olvidoclave"><div class="link">¿Olvidaste tu Contraseña?</div></a></div>
            
 </td>
 </tr>
</table>
           
<table align="center" width="100%">
<tr>
 <td>
<div id="pie" align="center">copyright 2013  Todos los derechos reservados | Programación Web 2013-I UPC</div>
</td>
</tr> 
</table>     

</body>
</html>