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

function cargarMaterias(){ 
 
 var x = $("#msg");
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
 var y =$("#materias"); 
  
 var idSalon = document.getElementById("salones").value;
  var salon  = idSalon.split("-");
var grado = salon[0];

    if (idSalon.value==""){
      x.html ( "<p>Error: Por Favor Escoja el Docente</p>");
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
</script>
    </head>
    <body>
        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
        <div id="msg" hidden>
    
        </div>
        <p>&nbsp;</p>
        <h2>ESCOGER DOCENTES</h2>
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
                    <td><input type="radio" value="<?php echo $docente->getIdPersona();?>"/>
                    <td><?php echo $docente->getIdPersona();?></td>
                    <td><?php echo $docente->getNombres();?></td>
                    <td><?php echo $docente->getPApellido()." ".$docente->getSApellido();?></td> 
                </tr>
                <?php } ?>
            </tbody>
    </table>
        
        <p>&nbsp;</p>
         <h2>Escoger Aula de Clases</h2>
        <table border="1" width="500" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Salon:</th>
                </tr>
          </thead>
            <tbody>
                <tr><th>
                        <select id="salones" name="salones" onchange="cargarMaterias()">
            <?php foreach ($salones as $salon) { ?>
            <option value="<?php echo $salon->getIdSalon();?>"><?php echo $salon->getIdSalon();?></option>
            <?php } ?>
            </select></th></tr>
                
            </tbody>
    </table>
         <p>&nbsp;</p>
         <h2>Escoger Materias</h2>
        <table border="1" width="500" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Materias:</th>
                </tr>
          </thead>
            <tbody>
                <tr><th>
                        <select id="materias" name="materias">
            
                        </select></th></tr>
                
            </tbody>
    </table>
        
        <p>&nbsp;</p>
        
    </body>
</html>