<!DOCTYPE html>
<html lang="es">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../utiles/css/login.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../../utiles/css/general.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="../../utiles/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="../../utiles/js/envios.js" type="text/javascript" ></script>
<script type="text/javascript">
  
function envio(){ 
 var x = $("#msg");
 x.html ("<p>Cargando...</p>");
 x.show("slow");
  
 var idRol = document.getElementById("idRol");


    if (idRol.value=="" ){
      x.html ( "<p>Error: Tiene Campos Vacios</p>");
      setTimeout("$('#msg').hide();", 1000);
    }else{
//esta linea si se moidifica no altera nd? //
        var url="/colegio/inicio/imprimeRol/";
        var data="idRol="+idRol.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 0){
                var div = document.getElementById("msg");
                x.html ( "<p>Usuario o Contraseña Incorrectos</p>");
                usuario.value="";
                usuario.setAttribute("autofocus","true");
                contraseña.value="";
                setTimeout("$('#msg').hide();", 2000);
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
<br/>
    <div>
        <div id="msg"></div>
            <h1>Escoger Rol Para Acceder:</h1>
            
            <table width="440" border="0" cellspacing="0" cellpadding="2">
              <tr>
                  <td colspan="2" align="center" ><select name="idRol" id="idRol">
                      <?php foreach ($roles as $rol) { ?>    
                      <option value="<?php echo $rol->getIdRol();?>"><?php echo $rol->getNombre();?></option>
                          <?php } ?>
                      </select></td>
                </tr>
              <tr>
              <tr>
                  <td colspan="2" align="center"> <input type="submit" value="Acceder" class="button large green" onclick="envio()"/> </td>
              </tr>
            </table>
            
    </div>    

</body>
</html>
