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
  
 var idGrado = document.getElementById("idGrado");
 
    if (idGrado.value=="" || idGrado.value=="---"){
      y.html ( "Error... Escoja un Grado");
       setTimeout("fondoColor('#e5582b')",1);
      setTimeout("$('#mensaje').hide();", 4000);
       
    }else{

        var url="/colegio/administrador/listaMateriasNoPertenecientes/";
        var data="idGrado="+idGrado.value;

        envioJson(url,data,function respuesta(res){   
           
                x.html ( res);
                y.hide();
                listarMaterias();
         });
    }   
}

function listarMaterias(){
var x = $("#tablaMaterias");
 var y = $("#mensaje");
 y.html ("Cargando...");
 y.show("slow");
  
 var idGrado = document.getElementById("idGrado");
 
    if (idGrado.value==""|| idGrado.value=="---"){
      y.html ( "Error... ");
      setTimeout("fondoColor('#e5582b')",1);
       setTimeout("$('#mensaje').hide();", 4000);
    }else{

        var url="/colegio/administrador/imprimirMateriasPorGrado/table";
        var data="idGrado="+idGrado.value;

        envioJson(url,data,function respuesta(res){   
           
                x.html ( res);
                y.hide();
                
         });
    }   

}
function enviar(){

 var y = $("#mensaje");
  setTimeout("fondoColor('#aacc5b')",1);
 y.html ("Cargando...");
 y.show("slow");
 
 var idGrado = document.getElementById("idGrado");
  var materias = document.getElementById("materias").options;
  var arreglo = new Array();
  var j=0;
  for (var i=0; i<materias.length; i++){   
    if (materias[i].selected == true){
    arreglo[j]=materias[i].value;
    j++;
    }
    
  }   

    if (idGrado.value=="" || idGrado.value=="---"){
      y.html ( "</br><p>Error...debe seleccionar un grado</p>");
       setTimeout("fondoColor('#e5582b')",1);
       setTimeout("$('#mensaje').hide();", 4000);
      
    }else{

        var url="/colegio/administrador/agregarPensum/";
        var data="idGrado="+idGrado.value+"&materias="+ arreglo;

        envioJson(url,data,function respuesta(res){   
           
                y.html ( res);
                y.hide();
                consultarMaterias();
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
                    <div class="color-text-blanco" id="title-cab"><h1>Gestion De Pensum</h1> </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                      
                         
     <!--------------------------------------------------------------------> 
     
        
           <table width="600" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td></td>
                  <td align="left" class="color-text-gris"><h1>Agregar Informacion</h1></td>
              </tr>
                <tr>
                    
                    <td align="right" width="40%">Grados:</td>
                    <td><select id="idGrado" name="idGrado" class="box-text" onchange="consultarMaterias()">
                    <option value="---">---</option>
                     <?php foreach ($grados as $grado) { ?>
                    <option value="<?php echo $grado->getIdGrado(); ?>"><?php echo $grado->getNombre(); ?></option>
                         <?php } ?>
                        </select></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Seleccione Materias Para Asignarselas al Grado</td>
                    <td><select name="materias" class="box-text" id="materias" multiple> 
                        
                        </select></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><input name="agregarpensum" id="agregarpensum" type="submit" value="Guardar" class="button large green" onclick="enviar()" /></td>
                </tr>
            </table>
     
         <p>&nbsp;</p>
            <hr>
         <p>&nbsp;</p>
         
        <div id="contenedorTabla">
         
        <table width="600" border="0" cellspacing="0" cellpadding="2" align="center">
          <tr>
               <td align="center" class="color-text-gris" colspan="3"><h1>Pensum del grado Seleccionado</h1></td>
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
         
            <tbody id="tablaMaterias">
               
            </tbody>
    </table>
         </div>
    </body>
</html>