<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titulo; ?></title>
        <link href="../utiles/css/administrador.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="../utiles/css/login.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../utiles/css/botones.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="../utiles/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="../utiles/js/envios.js" type="text/javascript" ></script>

<script type="text/javascript">

function validarRadio(){

if(!$("input[name=idDocente]:checked").val()) {
	return false;
}else{
return true;
}
}
function leerCarga(){
var y= $("#tablaCargas");
var x = $("#msg");
 x.html ("<p>Cargando Carga del Docente...</p>");
 
 var idDocente = document.getElementById("idDocente").value;
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
 var x = $("#msg");
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
 var y =$("#materias"); 
  
 var idSalon = document.getElementById("salones").value;
  var salon  = idSalon.split("-");
var grado = salon[0];



    if (idSalon=="" || idSalon == "---"){
    y.html(" ");  
    x.html ( "<p>Error: Por Favor Escoja el Salon</p>");
      setTimeout("$('#msg').hide();", 4000);
    }else{

        var url="/colegio/administrador/imprimirMateriasPorGrado/select";
        var data="idGrado="+grado;

        envioJson(url,data,function respuesta(res){   
    x.hide();            
    y.html (res);
         });
    }
    }
    
    function agregar(){

 var y = $("#msg");
 y.html ("Cargando...");
 y.show("slow");
 
 var idDocente = document.getElementById("idDocente");
 var idSalon = document.getElementById("idSalon");
 var idCarga = document.getElementById("idCarga");
  var materias = document.getElementById("materias").options;
  var arreglo = new Array();
  for (var i=0; i<materias.length; i++){   
    arreglo[i]=materias[i].value;
  }   

    if (idDocente.value=="" || idSalon.value=="---" || materias.length == 0){
      y.html ( "Error...");
      setTimeout("$('#msg').hide();", 4000);
    }else{

        var url="/colegio/administrador/agregarPensum/";
        var data="idDocente="+idDocente.value+"&idSalon="+idSalon.value + "&materias="+ arreglo+"&idCarga="+idSalon.value;

        envioJson(url,data,function respuesta(res){   
           
                y.html ( res);
                y.hide();
                leerCarga()
         });
    }   

}
    
    
}
</script>
    </head>
    <body>
        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
        <div id="msg" hidden>
    
        </div>
        <p>&nbsp;</p>
        <h2>1. Escoger Docente</h2>
        <table border="1" width="500" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>...</th>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                </tr>
          </thead>
            <tbody>
                <?php foreach ($docentes as $docente) { ?>
                <tr>
                    <td><input id="idDocente" name="idDocente" type="radio" onchange="leerCarga()" value="<?php echo $docente->getIdPersona();?>"/>
                    <td><?php echo $docente->getIdPersona();?></td>
                    <td><?php echo $docente->getNombres();?></td>
                    <td><?php echo $docente->getPApellido()." ".$docente->getSApellido();?></td> 
                </tr>
                <?php } ?>
            </tbody>
    </table>
        
        <p>&nbsp;</p>
         <h2>2. Escoger Aula de Clases</h2>
        <table border="1" width="500" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Salon:</th>
                </tr>
          </thead>
            <tbody>
                <tr><th>
                        <select id="salones" name="salones" onchange="cargarMaterias()">
                            <option value="---">---</option>
            <?php foreach ($salones as $salon) { ?>
            <option value="<?php echo $salon->getIdSalon();?>"><?php echo $salon->getIdSalon();?></option>
            <?php } ?>
            </select></th></tr>
                
            </tbody>
    </table>
         <p>&nbsp;</p>
         <h2>3. Escoger Materias</h2>
        <table border="1" width="500" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Materias:</th>
                </tr>
          </thead>
            <tbody>
                <tr><th>
                        <select id="materias" name="materias" multiple>
            
                        </select></th></tr>
                
            </tbody>
    </table>
         <p>&nbsp;</p>
         <h2>4. Guardar</h2>
         <table border="1" width="500" cellspacing="0" cellpadding="0">
             <tr><td><button onclick="agregar()"> Guardar Carga </button></td></tr>
         </table>
         
         <h2>Carga de Docente</h2>
        <table border="1" width="500" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Salon</th>
                    <th>Materia</th>
                </tr>
          </thead>
            <tbody id="tablaCargas">
     
            </tbody>
    </table>
        
        <p>&nbsp;</p>
        
    </body>
</html>