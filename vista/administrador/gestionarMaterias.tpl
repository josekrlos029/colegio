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
 function fondoColor(elColor) { 
 $("#mensaje").css("background-color",elColor);
 }
 
function envio(){ 
 
  var x = $("#mensaje");
 setTimeout("fondoColor('#aacc5b')",1);
 x.html ("</br><p>Cargando...</p>");
 x.show("slow");
  
 var idMateria = document.getElementById("idMateria");
 var nombre = document.getElementById("nombre");
 var horas = document.getElementById("horas");

    if (idMateria.value=="" || nombre.value=="" || horas.value==""){
         x.html ( "</br><p>Error: Tiene Campos Vacios</p>");
      setTimeout("fondoColor('#e5582b')",1);
      setTimeout("$('#mensaje').hide();", 4000);
    }else{

        var url="/colegio/administrador/agregarMateria/";
        var data="idMateria="+idMateria.value+"&nombre="+nombre.value+"&horas="+horas.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Materia Agregada Correctamente, Se Actualizará la Página</p>");
                setTimeout("fondoColor('#aacc5b')",1);
                setTimeout("$('#mensaje').hide();", 10000);
                document.location.href="/colegio/administrador/gestionarMaterias";
            }else{
                x.html ( "<p>"+res+"</p>");
                setTimeout("$('#msg').hide();", 7000);
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
                    <div class="color-text-blanco" id="title-cab"><h1>Gestion De Materias</h1> </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                      
                         
     <!--------------------------------------------------------------------> 
       
        
            <table width="600" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td></td>
                  <td align="left" class="color-text-gris"><h1>Agregar Materias</h1></td>
              </tr>
                <tr>
                    <td align="right" width="40%">ID de Materia:</td>
                    <td ><input name="idMateria" id="idMateria" type="text" class="box-text" required /></td>
                </tr>
                <tr>
                    <td align="right">Nombre:</td>
                    <td><input name="nombreMateria" id="nombre" type="text"  class="box-text" required/></td>
                </tr>
                <tr>
                    <td align="right">Horas:</td>
                    <td><input name="horas" id="horas" type="number"  max="10" class="box-text" required/></td>
                </tr>
                <td></td>
                <td><input name="agregarlicuadora" id="agregarlicuadora" type="submit" value="Guardar" class="button large green"  onclick="envio()"/></td>
                
                </tr>
            </table>
     
      <p>&nbsp;</p>
     <hr>
     <p>&nbsp;</p>
     
        <table width="600" border="0" cellspacing="0" cellpadding="2" align="center">
           <tr>
               <td align="center" class="color-text-gris" colspan="2"><h1>Materias Registradas</h1></td>
           </tr>
         
         
                <tr>
                    <td>ID de Materia</td>
                    <td>Nombre</td>
                    <td>Horas</td>
                </tr>
                 <tr>
                    <td> <hr> </td>
                     <td> <hr> </td>
                      <td> <hr> </td>
                </tr>    
        
         
                <?php foreach ($materias as $materia) { ?>
                <tr>
                    <td ><?php echo $materia->getIdMateria();?></td>
                    <td><?php echo $materia->getNombreMateria();?></td>
                    <td><?php echo $materia->getHoras();?></td>
                </tr>
                <?php } ?>
           
    </table>
        
        <p>&nbsp;</p>
    </body>
</html>