<!DOCTYPE html>
<html lang="es">
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
  
 var idGrado = document.getElementById("idGrado");
 var nombre = document.getElementById("nombre");

    if (idGrado.value=="" || nombre.value==""){
      x.html ( "<p>Error: Tiene Campos Vacios</p>");
      setTimeout("$('#msg').hide();", 4000);
    }else{

        var url="/colegio/administrador/agregarGrado/";
        var data="idGrado="+idGrado.value+"&nombre="+nombre.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Grado Agregado Correctamente, Se Actualizará la Página</p>");
                setTimeout("$('#msg').hide();", 4000);
                document.location.href="/colegio/administrador/gestionarGrados";
            }else{
                x.html ( "<p>"+res+"</p>");
                idGrado.value="";
                idGrado.setAttribute("autofocus","true");
                nombre.value="";
                setTimeout("$('#msg').hide();", 4000);
            }
         });
    }   
}
window.onload = function() {
    $('#password').bind('keypress', function (e) {
        var key = e.keyCode || e.which;
        if (key === 13) {
            envio();
        };
    });          
}
</script>
    </head>
    <body>
        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
        <div id="msg" hidden>
    
        </div>
        <h2> Agregar Grado </h2>
         
        <table>
             <tr>
                <td>ID de Grado</td>   
                <td><input name="idGrado" id="idGrado" type="text"  required/></td> 
            </tr>
             <tr>
                <td>Nombre</td>
                <td><input name="nombre" id="nombre" type="text" required/></td> 
            </tr>
            <tr>
                <td colspan="2"><input name="agregarGrado" id="agregarGrado" type="submit" value="Guardar" onclick="envio()" /></td>
                </tr>
        </table>
         
        <h2>GRADOS DE LA APLICACION</h2>
        <table border="1" width="500" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>ID de GRado</th>
                    <th>Nombre</th>
                </tr>
          </thead>
            <tbody>
                <?php foreach ($grados as $grado) { ?>
                <tr>
                    <td ><?php echo $grado->getIdGrado();?></td>
                    <td><?php echo $grado->getNombre();?></td>
                </tr>
                <?php } ?>
            </tbody>
    </table>
    </body>
</html>