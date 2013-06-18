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
    
function eliminar(idSalon,idMateria){
  var x = $("#mensaje");
 setTimeout("fondoColor('#aacc5b')",1);
 x.html ("</br><p>Cargando...</p>");
 x.show("slow");
 
  var url="/colegio/administrador/eliminarCarga";
        var data="idSalon="+idSalon+"&idMateria="+idMateria;
 envioJson(url,data,function respuesta(res){   
                
    x.html (res);
    leerCarga();
    setTimeout("$('#mensaje').hide();", 4000);
         });

}


function validarRadio(){

if(!$("input[name=idDocente]:checked").val()) {
	return false;
}else{
return true;s
}
}

 function fondoColor(elColor) { 
 $("#mensaje").css("background-color",elColor);
 }
 
function leerCarga(){
  var x = $("#mensaje");
 setTimeout("fondoColor('#aacc5b')",1);
 x.html ("</br><p>Cargando...</p>");
 x.show("slow");
 
var y= $("#tablaCargas"); 
 var idDocente =$("input[name=idDocente]:checked").val();
  var url="/colegio/administrador/imprimirCarga";
        var data="idDocente="+idDocente;
 envioJson(url,data,function respuesta(res){   
    x.hide();            
    y.html (res);
         });

}

function cargarMaterias(){ 
 if (validarRadio()==false){
    
    alert("Por Favor Escoja un Docente (Paso 1)");

}else{
  var x = $("#mensaje");
 setTimeout("fondoColor('#aacc5b')",1);
 x.html ("</br><p>Cargando...</p>");
 x.show("slow");
 
 var y =$("#materias"); 
  
 var idSalon = document.getElementById("salones").value;
  var salon  = idSalon.split("-");
var grado = salon[0];



    if (idSalon=="" || idSalon == "---"){
    y.html(" ");  
     x.html ( "</br><p>Error: por favor escoja un salon</p>");
      setTimeout("fondoColor('#e5582b')",1);
      setTimeout("$('#mensaje').hide();", 4000);
    }else{

        var url="/colegio/administrador/imprimirMateriasPorGrado/select";
        var data="idGrado="+grado;

        envioJson(url,data,function respuesta(res){   
    x.hide();            
    y.html (res);
         });
    }
    }
    }
function agregar(){

var y = $("#mensaje");
 setTimeout("fondoColor('#aacc5b')",1);
 y.html ("</br><p>Cargando...</p>");
 y.show("slow");
 
 var idDocente =$("input[name=idDocente]:checked").val();
 var idSalon = document.getElementById("salones");
  var materias = document.getElementById("materias").options;
  var arreglo = new Array();
  var j=0;
  for (var i=0; i<materias.length; i++){ 
   if (materias[i].selected == true){
    arreglo[j]=materias[i].value;
    j++;
    }
  }   

    if (idDocente=="" || idSalon.value=="---" || materias.length == 0){
          y.html ( "</br><p>Error: Seleccion invalida</p>");
      setTimeout("fondoColor('#e5582b')",1);
      setTimeout("$('#mensaje').hide();", 4000);
    }else{

        var url="/colegio/administrador/agregarCarga/";
        var data="idDocente="+idDocente+"&idSalon="+idSalon.value + "&materias="+ arreglo;

        envioJson(url,data,function respuesta(res){   
                y.html ( res);
                y.hide();
                leerCarga()
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
                <div id="cabecera" class="red">
                    <div class="color-text-blanco" id="title-cab"><h1>Gestion De Cargas</h1> </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                      
                         
     <!--------------------------------------------------------------------> 
    
<div id="tabla-contenedora">
    
        <table width="500" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td></td>
                  <td align="left" class="color-text-gris" colspan="3"><h1>Escoger docente</h1></td>
              </tr>
              
                <tr>
                    <td width="10%"></td>
                    <td width="30%">Documento</td>
                    <td width="30%">Nombres</td>
                    <td width="30%">Apellidos</td>
                </tr>
               
       
     
                <tr>
                    <td> <hr> </td>
                    <td> <hr> </td>
                     <td> <hr> </td>
                     <td> <hr> </td>
                </tr>  
                
        </table>
    
    <div style="float:left;">
        <div id="tabla-consulta">
            <table width="500" border="0" cellspacing="0" cellpadding="2">  
        
                <?php foreach ($docentes as $docente) { ?>
                <tr>
                    <td width="10%"><input onclick="leerCarga()" id="idDocente" name="idDocente" type="radio"  value="<?php echo $docente->getIdPersona();?>" />
                    <td width="30%"><?php echo $docente->getIdPersona();?></td>
                    <td width="30%"><?php echo $docente->getNombres();?></td>
                    <td width="30%"><?php echo $docente->getPApellido()." ".$docente->getSApellido();?></td> 
                </tr>
                <?php } ?>
          
            </table>
        </div>  
    </div>    
     
    
    <div style="float:right" >
          <table width="650" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td width="10%"></td>
                  <td align="left" class="color-text-gris"><h1>Escoger aula de clases</h1></td>
                   <td align="right" class="color-text-gris" colspan="3"><h1>Escoger Materias</h1></td>
              </tr>
                <tr>
                    <td></td>
                    <td>Salon:</td>
                     <td align="right">Materias:</td>
                </tr>
       
            <tbody>
                <tr>
                    <td></td>
                    <td>
                        <select id="salones" name="salones" class="box-text" onchange="cargarMaterias()">
                            <option value="---">---</option>
            <?php foreach ($salones as $salon) { ?>
            <option value="<?php echo $salon->getIdSalon();?>"><?php echo $salon->getIdSalon();?></option>
            <?php } ?>
            </select>
            </td>
            <td align="right"><select id="materias" name="materias" multiple class="box-text">
                        </select>
                </td>
            
                </tr>
                <tr>
                    <td colspan="3" align="right"><button onclick="agregar()" class="button large red"> Guardar Carga </button></td>
                    </tr>
                
            </tbody>
        </table>
    </div>
 </div>  
     
 
    </br>
     <hr>
     </br>
     
     
         <table width="500" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td align="center" class="color-text-gris" colspan="2"><h1>cargas asignadas a docentes</h1></td>
              </tr>
                
                <tr>
                    <td width="30%">Salon</td>
                    <td width="70%">Materia</td>
                </tr>
                  <tr>
                    <td> <hr> </td>
                     <td> <hr> </td>
                     </tr>
          </table>
     
          <div id="tabla-consulta">
               <table width="500" border="0" cellspacing="0" cellpadding="2" >
                <tbody id="tablaCargas">
     
                </tbody>
               </table>
            </div>
</div>  
        
  
        
    </body>
</html>