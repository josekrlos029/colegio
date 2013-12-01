   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
        
   <title><?php echo $titulo; ?></title>
    

<script type="text/javascript">
    
function eliminar(idSalon,idMateria){
 var x = $("#mensaje");
cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

alert(idSalon + " " +idMateria);
  var url="/colegio/administrador/eliminarCarga";
        var data="idSalon="+idSalon+"&idMateria="+idMateria;
 envioJson(url,data,function respuesta(res){   
    if (res == 1){
                x.html ( "<p>Carga eliminada Correctamente</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/gestionarCargas";
    
    }else{            
    x.html ("<p>"+res+"</p>");
    leerCarga();
    cargando();
    ocultar();
    }
    });

}


function validarRadio(){

if(!$("input[name=idDocente]:checked").val()) {
	return false;
}else{
return true;
}
}

function leerCarga(){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
var y= $("#tablaCargas"); 
 var idDocente =$("input[name=idDocente]:checked").val();
  var url="/colegio/administrador/imprimirCarga";
        var data="idDocente="+idDocente;
 envioJson2(url,data,function respuesta(res){   
    x.hide();            
    y.html (res);
         });

}

function cargarMaterias(){ 
 if (validarRadio()==false){
    
    alert("Por Favor Escoja un Docente (Paso 1)");

}else{
  var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
 var y =$("#materias"); 
  
 var idSalon = document.getElementById("salones").value;
  var salon  = idSalon.split("-");
var grado = salon[0];



    if (idSalon=="" || idSalon == "---"){
    y.html(" ");  
     x.html ( "<p>Error: por favor escoja un salon</p>");
     error();
     ocultar();
    }else{

        var url="/colegio/administrador/imprimirMateriasPorGrado/select";
        var data="idGrado="+grado;

        envioJson2(url,data,function respuesta(res){   
    x.hide();            
    y.html (res);
         });
    }
    }
    }
function agregar(){

var y = $("#mensaje");
 cargando();
 y.html ("<p>Cargando...</p>");
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
          y.html ( "<p>Error: Seleccion invalida</p>");
      error();
      ocultar();
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
            </br>
           <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                 <div id="cabecera" class="red">
                    
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Gestion De Cargas Academicas</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                </div>
        </div> 
                <p>&nbsp;</p>               
     <!--------------------------------------------------------------------> 
<div id="tabla-contenedora">
        <table width="43%" border="0" cellspacing="0" cellpadding="2" class="tabla">
                <tr>
                  <td></td>
                  <td align="left" class="color-text-gris" colspan="3"><h1>Escoger docente</h1></td>
              </tr>
              
                <tr class="modo1">
                    <td width="10%"></td>
                    <td width="30%">Documento</td>
                    <td width="30%">Nombres</td>
                    <td width="30%">Apellidos</td>
                </tr>      
        </table>
    <div style="float:left;">
        <div id="tabla-consulta">
            <table width="100%" border="0" cellspacing="0" cellpadding="2">  
        
                <?php foreach ($docentes as $docente) { ?>
                <tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
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
         <table width="50%" align="center" border="0" cellspacing="0" cellpadding="2" class="tabla">
                <tr>
                  <td align="center" class="color-text-gris" colspan="4"><h1>cargas asignadas a docentes</h1></td>
              </tr>
                <tr class="modo1">
                    <td width="20%">Salon</td>
                    <td width="40%">Materia</td>
                    <td width="10%">Horas</td>
                    <td width="20%">Eliminar</td>
                </tr>   
          </table>
               <table width="50%" align="center" border="0" cellspacing="0" cellpadding="2"  >
                <tbody id="tablaCargas">
     
                </tbody>
               </table>          
</div>    
    </body>  
</html>