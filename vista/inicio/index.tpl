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
//esta linea si se moidifica no altera nd? //
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

<div id="contenedor">

   <div id="header">
          <span class="ejemplo"><h1>APLICACION DE CONTROL ACADEMICO</h1></span>
       </div> 
    
       <div id="cuerpo">
       <span class="ejemplo">Contenido</span>  
    

<div id="msg" hidden>
    
</div>





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
<table width="200" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td align="center"><a href="/colegio/inicio/accesofb/face"><img src="utiles/imagenes/iconos/face.png" alt="facebook" width="48" height="48"></a></td>
            <td align="center"><a href="/colegio/inicio/accesofb/twitter"><img src="utiles/imagenes/iconos/twitter.png" alt="twitter" width="48" height="48"></a></td>
            <td align="center"><a href="/colegio/inicio/accesofb/google"><img src="utiles/imagenes/iconos/googlep.png" alt="google plus" width="48" height="48"></a></td>
          </tr>
        </table>
         </div>   

   <div id="footer">
       <table width="100%" border="0">
        <tr>
        <td width="50%"> <a href="#">© 2013 Innovar.dev S.A.S</a></td> 
        <td align="right"><a href="#">Terminos</a></td>
        <td align="right"><a href="#">Centro de Ayuda</a></td>
        <td align="right"><a href="#">Reportar un Error</a></td>
        <td align="right"><a href="#">Ayudanos a Mejorar</a></td>
        </tr>  
       </table>    
   </div>

</body>
</html>