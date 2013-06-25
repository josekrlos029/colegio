   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
        <title><?php echo $titulo; ?></title>
   

<script type="text/javascript">

function envio(){ 
 
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
  
 var idGrado = document.getElementById("idGrado");
 
    if (idGrado.value=="" || idGrado.value=="---"){
      y.html ( "Error:Escoja un Grado");
      error();
      ocultar();
       
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
 cargando();
 y.html ("Cargando...");
 y.show("slow");
  
 var idGrado = document.getElementById("idGrado");
 
    if (idGrado.value==""|| idGrado.value=="---"){
      y.html ( "Error... ");
      error();
      ocultar();
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
  cargando();
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
      y.html ( "<p>Error:debe seleccionar un grado</p>");
       error();
       ocultar();
      
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
                        
                        </select>
                    </td>
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
         
        <table width="600" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
          <tr>
               <td align="center" class="color-text-gris" colspan="3"><h1>Pensum del grado Seleccionado</h1></td>
           </tr>
                <tr class="modo1">
                    <td>ID de Materia</td>
                    <td>Nombre</td>
                    <td>Horas</td>
                
         
            <tbody id="tablaMaterias">
               
            </tbody>
    </table>
         </div>
    </body>
</html>