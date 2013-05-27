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
 x.html ("Cargando...");
 x.show("slow");
  
 var idGrado = document.getElementById("idGrado");
 
    if (idGrado.value==""){
      x.html ( "Error...");
      
    }else{

        var url="/colegio/administrador/listaMateriasNoPertenecientes/";
        var data="idMateria="+idGrado.value;

        envioJson(url,data,function respuesta(res){   
           
                x.html ( res);
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
        <form action="/colegio/administrador/guardarPensum" method="post" name="form1">
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
                    <td colspan="2"><input name="agregarpensum" id="agregarpensum" type="submit" value="Guardar" /></td>
                
                </tr>

            </table>
        </form>
        <p>&nbsp;</p>
    </body>
</html>