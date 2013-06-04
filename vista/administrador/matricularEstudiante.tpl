<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titulo; ?></title>
        <link href="../utiles/css/administrador.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="../utiles/css/formularios.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../utiles/css/botones.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="../utiles/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="../utiles/js/envios.js" type="text/javascript" ></script>

<script type="text/javascript">
 function envio(){ 
 
 var x = $("#msg");
 x.html ("<p>Cargando...</p>");
 x.show("slow");
   var y = $("#tabla");
 var idPersona = document.getElementById("idPersona");


    if (idPersona.value==""){
      x.html ( "<p>Error: Ingresar Numero de Documento</p>");
      setTimeout("$('#msg').hide();", 4000);
    }else{

        var url="/colegio/administrador/consultarEstudiante/";
        var data="idPersona="+idPersona.value;

        envioJson(url,data,function respuesta(res){   
            if (res == "1"){
                x.html ("<p>El Número de Documento no existe en el sistema</p>");
                setTimeout("$('#msg').hide();", 4000);
               
            }else if(res==2){
                 x.html ("<p>El estudiante ya se encuentra matriculado</p>");
                setTimeout("$('#msg').hide();", 4000);
            }else if(res==3){
            x.html ("<p>El Número de Documento ingresado no corresponde al de un estudiante</p>");
                setTimeout("$('#msg').hide();", 4000);
            }else{
            y.html(res);
            setTimeout("$('#msg').hide();", 4000);
            }
            
         });
    }   
}   
 </script>
 
 </head>
    <body>
        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
      <!------------------------------cabecera--------------------------->  
          <p>&nbsp;</p>
            <p>&nbsp;</p>
              <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="blue">
                    <div class="color-text-blanco" id="title-cab"><h1>Matricular estudiantes</h1> </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                     
                         
     <!-------------------------------------------------------------------->     
     
        <table border="1" width="500" cellspacing="0" cellpadding="0">
       <tr>
           <td>Diigite Numero de Documento:</td>
           <td><input name="idPersona" id="idPersona" type="text" required/></td>
           <td><input name="consultarEstudiante" id="consultarEstudiante" type="submit" value="Consultar" onclick="envio()" /></td>       
       </tr>
        </table>
        <div id="tabla">
        </div>
    </body>
</html>