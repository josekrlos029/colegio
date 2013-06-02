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

function envio(){ 
 
 var x = $("#msg");
 x.html ("<p>Cargando...</p>");
 x.show("slow");
  
 var idGrado = document.getElementById("idGrado");
 var grupo = document.getElementById("grupo");
 
        var url="/colegio/administrador/agregarSalon/";
        var data="idGrado="+idGrado.value+"&grupo="+grupo.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Salón Agregado Correctamente, Se Actualizará la Página</p>");
                setTimeout("$('#msg').hide();", 4000);
                document.location.href="/colegio/administrador/gestionarSalones";
            }else{
                x.html ( "<p>"+res+"</p>");
                idMateria.value="";
                idGrado.setAttribute("autofocus","true");
                nombre.value="";
                setTimeout("$('#msg').hide();", 4000);
            }
         });
     
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
                    <th scope="row">Grados</th>
                    <td><select name="idGrado" id="idGrado">
                            <?php foreach ($grados as $grado) { ?>
                            <option value="<?php echo $grado->getIdGrado(); ?>"><?php echo $grado->getNombre(); ?></option>
                            <?php } ?>
                    </select>
                </tr>
                <tr>
                    <th scope="row">Grupos</th>
                    <td><select name="grupo" id="grupo">
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                        </select></td>
                </tr>
                <tr>
                    <td colspan="2"><input name="agregarSalon" id="agregarSalon" type="submit" value="Guardar" onclick="envio()" /></td>
                
                </tr>
               
            </table>
        <h2>AULAS DE CLASE DE LA APLICACION</h2>
        <table border="1" width="500" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>ID de Salón</th>
                    <th>Grado</th>
                    <th>Grupo</th>
                </tr>
          </thead>
            <tbody>
                <?php foreach ($salones as $salon) { ?>
                <tr>
                    <td ><?php echo $salon->getIdSalon();?></td>
                    <td><?php echo $salon->getIdGrado();?></td>
                    <td><?php echo $salon->getGrupo();?></td>
                </tr>
                <?php } ?>
            </tbody>
    </table>
        
        <p>&nbsp;</p>
    </body>
</html>