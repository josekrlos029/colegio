<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
<script type="text/javascript">
function envio(){ 

 var x = $("#msg");
 x.html ("<p>Cargando...</p>");
 x.show("slow");

 var campo = document.getElementById("campo");

    if (campo.value==""){
      x.html ( "<p>Error: El campo esta Vacio</p>");
      setTimeout("$('#msg').hide();", 1000);
    }else{
//esta linea si se moidifica no altera nd? //
        var url="/colegio/inicio/enviardatosolvido/";
        var data="campo="+campo.value;
window.alert("...");
        envioJson(url,data,function respuesta(res){   
    window.alert("...");        
    if (res == 0){
                
                x.html ( "<p>Error Su Correo no Existe en la base de Datos</p>");
                campo.value="";
                campo.setAttribute("autofocus","true");
            }else if (res == 1){
                x.html ( "<p>Se le Envió un Correo con las instrucciones, sino lo encuentra en la bandeja de entrada por favor rebice en Correos no deseados o Span</p>");
                exito();
            }else if (res == 2){
                x.html ( "<p>Error al enviar el Correo, intentelo mas tarde o contactese con el Administrador de la página</p>");
            }
         });
    }   
}
</script>
<title><?php echo $titulo; ?></title>
</head>
<body>
    
<h2>RECUPERAR CONTRASE&Ntilde;A</h2>
<div id="msg"></div>
<table width="440" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td colspan="2" align="center">Se le enviará un correo con las instrucciones de recuperación</td>
    </tr>
  <tr>
    <td width="181" align="center">Ingresa Tu número de Documento, Nombre de Usuario Ó Correo Electronico</td>
  </tr>
  <tr><td width="251" align="center"><input type="text" name="campo" id="campo"/></td></tr>
  <tr>
      <td colspan="2" align="center"><button onclick="envio()"> Recuperar Contraseña </button>  </td>
  </tr>
</table>
</body>
</html>
