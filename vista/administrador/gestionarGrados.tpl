<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titulo; ?></title>
        <link href="../utiles/css/administrador.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="../utiles/css/formularios.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="../utiles/css/botones.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="../utiles/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="../utiles/js/envios.js" type="text/javascript" ></script>

<script type="text/javascript">

 function fondoColor(elColor) { 
 $("#mensaje").css("background-color",elColor);
 }
 
function envio(){ 
 
  var x = $("#mensaje");
 setTimeout("fondoColor('#aacc5b')",1);
 x.html ("</br><p>Cargando...</p>");
 x.show("slow");
  
 var idGrado = document.getElementById("idGrado");
 var nombre = document.getElementById("nombre");

    if (idGrado.value=="" || nombre.value==""){
      x.html ( "</br><p>Error: Tiene Campos Vacios</p>");
      setTimeout("fondoColor('#e5582b')",1);
      setTimeout("$('#mensaje').hide();", 4000);
    }else{

        var url="/colegio/administrador/agregarGrado/";
        var data="idGrado="+idGrado.value+"&nombre="+nombre.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "</br><p>Grado Agregado Correctamente, Se Actualizará la Página</p>");
                 setTimeout("fondoColor('#aacc5b')",1);
                setTimeout("$('#mensaje').hide();", 10000);
                document.location.href="/colegio/administrador/gestionarGrados";
            }else{
                x.html ( "<p>"+res+"</p>");
                idGrado.value="";
                idGrado.setAttribute("autofocus","true");
                nombre.value="";
                 setTimeout("fondoColor('#aacc5b')",1);
                setTimeout("$('#mensaje').hide();", 7000);
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
                <div id="cabecera" class="green">
                    <div class="color-text-blanco" id="title-cab"><h1>Gestion De Grados Academicos</h1> </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                      
                         
     <!-------------------------------------------------------------------->    
        
         
          <table width="600" border="0" cellspacing="0" cellpadding="2">
              <tr>
                  <td></td>
                  <td align="left" class="color-text-gris"><h1>Agregar Grado</h1></td>
              </tr>
             <tr>
                <td align="right" width="40%" >ID de Grado:</td>   
                <td><input name="idGrado" id="idGrado" type="text" class="box-text" required/></td> 
            </tr>
             <tr>
                <td align="right">Nombre del grado:</td>
                <td><input name="nombre" id="nombre" type="text"  class="box-text" required/></td> 
            </tr>
            <tr>
                <td></td>
                <td><input name="agregarGrado" id="agregarGrado" type="submit" value="Guardar" class="button large green" onclick="envio()" /></td>
                </tr>
        </table>
         
     <p>&nbsp;</p>
     <hr>
     <p>&nbsp;</p>
        
       <table width="600" border="0" cellspacing="0" cellpadding="2" align="center">
           <tr>
               <td align="center" class="color-text-gris" colspan="2"><h1>Grados Registrados</h1></td>
           </tr>
         
                <tr>
                    <td width="40%">ID de Grado</td>
                    <td>Nombre Del grado</td>
                </tr>
                <tr>
                    <td> <hr> </td>
                     <td> <hr> </td>
                </tr>    
       
          
                <?php foreach ($grados as $grado) { ?>
                <tr>
                    <td><?php echo $grado->getIdGrado();?></td>
                    <td><?php echo $grado->getNombre();?></td>
                </tr>
                <?php } ?>
           
    </table>
     
    </body>
</html>