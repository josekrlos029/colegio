<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>

<script type="text/javascript">

function envio(){ 
 
 var x = $("#msg");
 x.html ( "<p>Cargando...</p>");
 x.show("slow");
  
 var usuario = document.getElementById("username");
 var contraseña = document.getElementById("password");

    if (usuario.value=="" || contraseña.value==""){
      x.html ( "<p>Error: Tiene Campos Vacios</p>");
      setTimeout("$('#msg').hide();", 4000);
    }else{

        var url="/colegio/administrador/verificarUsuario/";
        var data="usuario="+usuario.value+"&contraseña="+contraseña.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 0){
                var div = document.getElementById("msg");
                x.html ( "<p>Usuario o Contraseña Incorrectos</p>");
                usuario.value="";
                usuario.setAttribute("autofocus","true");
                contraseña.value="";
                setTimeout("$('#msg').hide();", 4000);
            }else{
                document.location.href="/colegio/administrador/usuarioAdministrador";
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
/*function respuesta(res){
var x = $("#msg");   
x.html ("<p>"+res+"</p>");
setTimeout("x.toggle('slow');", 4000);
}
*/

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

</script>
<title><?php echo $titulo; ?></title>
</head>
<body> 
<p>&nbsp;</p><p>&nbsp;</p>
<p>&nbsp;</p><p>&nbsp;</p>

<div id="msg" hidden>
    
</div>
<div id="contenedor" align="center" >
<table align="center" border="0" width="700px">
<tr>
    <td align="center">
<h1>ADMINISTRADOR</h1>
</td>
</tr>
    <tr align="center">
    <td align="center">
        <div class="caja"  align="center"><!--------------caja--------------->
            <div align="center" class="login">
                <div align="center"><h2>Cierre de Año</h2></div>
                <div class="espace" align="center"> 
                    <input name="usuario" id="username" type="text" x-webkit-speech size="20"  class="caja_texto" placeholder="Usuario" required autofocus />
                </div>
                <div class="espace">   
                    <input name="contraseña"  id="password" type="password" size="20"  class="caja_texto" placeholder="Contraseña" required />
                </div>
                <div class="espace">
                    <div align="center" ><button onclick="envio();" class="button large red">Procesar </button></div>
                </div>

                <div align="center"><a href="#"><div class="link">¿Olvidaste tu Contraseña?</div></a></div>
            </div><!-- end login -->
<!--------------------------end caja------------------>
</br></br></br></br>
           <div id="pie" align="center">copyright 2012 - 2013  Todos los derechos reservados | appSchool</div>
        </div>
<!--------------------------end contenedor-------------------------------------->
    </td>
    </tr>
</table>
    </div>
</body>
</html>