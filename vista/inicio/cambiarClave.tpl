<!DOCTYPE html>
<html lang="es">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../utiles/css/login.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="../../utiles/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="../../utiles/js/envios.js" type="text/javascript" ></script>
<title><?php echo $titulo; ?></title>
<script type="text/javascript">
function envio(){ 

 var x = $("#msg");
 x.html ("<p>Cargando...</p>");
 x.show("slow");

 var c = document.getElementById("clave");
 var nc = document.getElementById("nuevaClave");
 var idPersona = document.getElementById("idPersona");
    if (c.value=="" || nc.value==""){
      x.html ( "<p>Error: Tiene campos vacios.</p>");
      c.value="";
      nc.value="";
      setTimeout("$('#msg').hide();", 5000);
    }else if(c.value != nc.value){
        x.html ( "<p>Error: Las contraseñas no son iguales </p>");
        c.value="";
        nc.value="";
        setTimeout("$('#msg').hide();", 5000);
    }else{
        var url="/colegio/inicio/actualizarClave/";
        var data="clave="+c.value+"&idPersona="+idPersona.value;
        window.alert("...");
        envioJson(url,data,function respuesta(res){   
        window.alert("...");        
        if (res == 0){
                x.html ( "<p>Error Intente Mas Tarde</p>");
                c.value="";
                nc.value="";
                setTimeout("$('#msg').hide();", 5000);
            }else if (res == 1){
                x.html ( "<p>Se ha cambiado correctamente la contraseña, se redireccionará al loguin</p>");
                setTimeout('window.location.href="/colegio/";', 5000);
                
            }
         });
    }   
}
</script>
</head>
<body>
    
<h2>RECUPERAR CONTRASE&Ntilde;A</h2>
<div id="msg"></div>
                                <table border="0" width="100%"> 
                                      <tr><td>Nombres:</td></tr> 
                                       <tr><td><?php echo strtoupper($persona->getNombres()); ?></td></tr>
                                       <tr><td>Apellidos:</td></tr>
                                       <tr><td><?php echo strtoupper($persona->getPApellido()).' '. strtoupper($persona->getSApellido()); ?></td></tr>  
                                       <tr><td>Nombre de Usuario:</td></tr>
                                       <tr><td><?php echo $usuario->getUsuario(); ?></td></tr>
                                       <tr><td>Nueva Contraseña:</td></tr>
                                       <tr><td><input type="password" required id="clave" /></td></tr>
                                       <tr><td>Repetir Nueva Contraseña:</td></tr>
                                       <tr><td><input type="password" required id="nuevaClave" /></td></tr>
                                       <tr><td><button onclick="envio()">Confirmar</button></td></tr>
                                       <input type="hidden" id="idPersona" value="<?php echo $persona->getIdPersona(); ?>" />
                                </table>
</body>
</html>
