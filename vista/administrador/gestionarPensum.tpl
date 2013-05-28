<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titulo; ?></title>
        <link href="../utiles/css/login.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../utiles/css/botones.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="../utiles/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="../utiles/js/envios.js" type="text/javascript" ></script>

<script type="text/javascript">

function consultarMaterias(){ 
 
 var x = $("#materias");
 var y = $("#msg");
 y.html ("Cargando...");
 y.show("slow");
  
 var idGrado = document.getElementById("idGrado");
 
    if (idGrado.value==""){
      y.html ( "Error...");
      
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
 var y = $("#msg");
 y.html ("Cargando...");
 y.show("slow");
  
 var idGrado = document.getElementById("idGrado");
 
    if (idGrado.value==""){
      y.html ( "Error...");
      
    }else{

        var url="/colegio/administrador/imprimirMateriasPorGrado/";
        var data="idGrado="+idGrado.value;

        envioJson(url,data,function respuesta(res){   
           
                x.html ( res);
                y.hide();
                
         });
    }   

}
function enviar(){

 var y = $("#msg");
 y.html ("Cargando...");
 y.show("slow");
 
 var idGrado = document.getElementById("idGrado");
  var materias = document.getElementById("materias").options;
  var arreglo = new Array();
  for (var i=0; i<materias.length; i++){   
    arreglo[i]=materias[i].value;
  }   

    if (idGrado.value==""){
      y.html ( "Error...");
      
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
        <div id="msg" hidden>
    
        </div>
        <h2>DATOS</h2>
        
            <table width="416" border="1" cellspacing="0" cellpadding="2">
                <tr>
                    
                    <th width="197" scope="row">Grados</th>
                    <td width="211"><select id="idGrado" name="idGrado" onchange="consultarMaterias()">
                    <?php foreach ($grados as $grado) { ?>
                    <option value="<?php echo $grado->getIdGrado(); ?>"><?php echo $grado->getNombre(); ?></option>
                         <?php } ?>
                        </select></td>
                </tr>
                <tr>
                    <th scope="row">Seleccione Materias Para Asignarselas al Grado</th>
                    <td><select name="materias" id="materias" multiple> 
                        
                        </select></td>
                </tr>
                <tr>
                    <td colspan="2"><input name="agregarpensum" id="agregarpensum" type="submit" value="Guardar" onclick="enviar()" /></td>
                
                </tr>

            </table>
            
        
        <p>&nbsp;</p>
        <div id="contenedorTabla">
         <h2>PENSUM DEL GRADO SELECCIONADO</h2>
        <table border="1" width="500" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>ID de Materia</th>
                    <th>Nombre</th>
                    <th>Horas</th>
                </tr>
          </thead>
            <tbody id="tablaMaterias">
               
            </tbody>
    </table>
         </div>
    </body>
</html>