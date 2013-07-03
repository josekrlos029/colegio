<!DOCTYPE html>
<html lang="es">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="utiles/css/login.css" rel="stylesheet" type="text/css" media="screen"/>
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
     <div id="cuerpo">
        <div id="msg" hidden> </div>
        
<div class="contenedorBox">
    
     <table border="0" width="100%" height="100%">
    <!-- <tr height="10%"> 
            <td colspan="5">   
                <div class="iniciarSesion" align="left"><h2>Inicio de Sesion</h2></div>
            </td> 
          </tr>-->
     
         <tr>
             <td width="30%"><div class="escudo"></div></td>
             
             <td width="5%" class="separador"></td>
              
             <td width="30%">
                <div class="espace" align="left">
                <input name="usuario" id="username" type="text" size="20"  class="caja-texto" placeholder="Usuario" required autofocus />
                </div>
                
                <div class="espace" align="left">   
                <input name="contraseña"  id="password" type="password" size="20"  class="caja-texto" placeholder="Contraseña" required />
                </div>
                
                <div class="espace">
                <div align="left" ><button onclick="envio();" class="button large blue">Iniciar Sesión </button></div>
                </div>
                <div class="espace"><a href="/colegio/inicio/olvidoclave" class="link">¿Olvidaste tu Contraseña?</a></div>
                </td>
                
                <td width="5%" class="separador"></td>
                
                <td width="30%">
                
                <div class="espaceRed" align="left">
                    <a href="/colegio/inicio/accesofb/face">
                     <img src="utiles/imagenes/iconos/face.png" alt="facebook" 
                         accesskey=""onmouseover="this.src='utiles/imagenes/iconos/faceOver.png'" 
                        onmouseout="this.src='utiles/imagenes/iconos/face.png';"/>
                </div>
                    
                 <div class="espaceRed" align="left">
                   <a href="/colegio/inicio/accesofb/twitter">
                      <img src="utiles/imagenes/iconos/twitter.png" alt="twitter"
                        accesskey=""onmouseover="this.src='utiles/imagenes/iconos/twitterOver.png'" 
                        onmouseout="this.src='utiles/imagenes/iconos/twitter.png';"/>
                </div>    
                
                <div class="espaceRed" align="left">
                   <a href="/colegio/inicio/accesofb/google">
                       <img src="utiles/imagenes/iconos/googlep.png" alt="google plus" 
                        accesskey=""onmouseover="this.src='utiles/imagenes/iconos/googlepOver.png'" 
                        onmouseout="this.src='utiles/imagenes/iconos/googlep.png';"/>
                   </a>
                </div>  
                
                </td>
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