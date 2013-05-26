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

function envio(){ 
 
 var x = $("#msg");
 x.html ("<p>Cargando...</p>");
 x.show("slow");
  
 var idMateria = document.getElementById("idMateria");
 var nombre = document.getElementById("nombre");
 var horas = document.getElementById("horas");

    if (idMateria.value=="" || nombre.value=="" || horas.value==""){
      x.html ( "<p>Error: Tiene Campos Vacios</p>");
      setTimeout("$('#msg').hide();", 4000);
    }else{

        var url="/colegio/administrador/agregarMateria/";
        var data="idMateria="+idMateria.value+"&nombre="+nombre.value+"&horas="+horas.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Materia Agregada Correctamente, Se Actualizará la Página</p>");
                setTimeout("$('#msg').hide();", 4000);
                document.location.href="/colegio/administrador/gestionarMaterias";
            }else{
                x.html ( "<p>"+res+"</p>");
                idMateria.value="";
                idGrado.setAttribute("autofocus","true");
                nombre.value="";
                setTimeout("$('#msg').hide();", 4000);
            }
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
                    <th width="197" scope="row">ID de Materia</th>
                    <td width="211"><input name="idMateria" id="idMateria" type="text"  /></td>
                </tr>
                <tr>
                    <th scope="row">Nombre</th>
                    <td><input name="nombreMateria" id="nombre" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">Horas</th>
                    <td><input name="horas" id="horas" type="number"  max="10"/></td>
                </tr>
                
                <td colspan="2"><input name="agregarlicuadora" id="agregarlicuadora" type="submit" value="Guardar"  onclick="envio()"/></td>
                
                </tr>

            </table>
        <h2>MATERIAS DE LA APLICACION</h2>
        <table border="1" width="500" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>ID de Materia</th>
                    <th>Nombre</th>
                    <th>Horas</th>
                </tr>
          </thead>
            <tbody>
                <?php foreach ($materias as $materia) { ?>
                <tr>
                    <td ><?php echo $materia->getIdMateria();?></td>
                    <td><?php echo $materia->getNombreMateria();?></td>
                    <td><?php echo $materia->getHoras();?></td>
                </tr>
                <?php } ?>
            </tbody>
    </table>
        
        <p>&nbsp;</p>
    </body>
</html>