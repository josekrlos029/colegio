<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titulo; ?></title>
        <link href="../utiles/css/login.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../utiles/css/administrador.css" rel="stylesheet" type="text/css" media="screen"/>        
<link href="../utiles/css/botones.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="../utiles/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="../utiles/js/envios.js" type="text/javascript" ></script>

<script type="text/javascript">
    
 function fondoColor(elColor) { 
 $("#mensaje").css("background-color",elColor);
 }

function envio(){ 
  
 var x = $("#mensaje");
 setTimeout("fondoColor('#aacc5b')",1);
 x.html ("</br><p>Cargando...</p>");
 x.show("slow");
 

 
 var idPersona = document.getElementById("idPersona");
 var nombres = document.getElementById("nombres");
 var pApellido = document.getElementById("pApellido");
 var sApellido = document.getElementById("sApellido");
 var sexo = document.getElementById("sexo");
 var telefono = document.getElementById("telefono");
 var direccion = document.getElementById("direccion");
 var correo = document.getElementById("correo");
 var fNacimiento = document.getElementById("fNacimiento");
 

    if (idPersona.value=="" || nombres.value=="" || pApellido.value=="" || sApellido.value=="" || fNacimiento.value==""){
    
    x.html ( "<p></br>Error: Tiene Campos Requeridos Vacios</p>");
      setTimeout("fondoColor('#e5582b')",1);
      setTimeout("$('#mensaje').hide();", 5000);
    }else{

        var url="/colegio/administrador/guardarEstudiantes/";
        var data="idPersona="+idPersona.value+"&nombres="+nombres.value+"&pApellido="+pApellido.value+"&sApellido="+sApellido.value+"&sexo="+sexo.value+"&telefono="+telefono.value+"&direccion="+direccion.value+"&correo="+correo.value+"&fNacimiento="+fNacimiento.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p></br>Estudiante Registrador Correctamente</p>");
                setTimeout("fondoColor('#aacc5b')",1);
                setTimeout("$('#mensaje').hide();", 4000);
                document.location.href="/colegio/administrador/RegistrarEstudiantes";
            }else{
                x.html ( "<p>"+res+"</p>");
                idMateria.value="";
                idGrado.setAttribute("autofocus","true");
                nombre.value="";
                setTimeout("fondoColor('#aacc5b')",1);
                setTimeout("$('#mensaje').hide();", 4000);
                
                
            }
         });
    }   
}
</script>
    </head>
    <body>
        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
          <p>&nbsp;</p>
            <p>&nbsp;</p>
              <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="blue">
                    <div class="title-cab"> Registro De Estudiantes </div>
                </div>
        </div> 
         
        <p>&nbsp;</p>
        <h2>DATOS DEL ESTUDIANTE</h2>
        
            <table width="416" border="1" cellspacing="0" cellpadding="2">
                <tr>
                    <th width="197" scope="row">Identificación del Estudiante</th>
                    <td width="211"><input name="idPersona" id="idPersona" type="text" required/></td>
                </tr>
                <tr>
                    <th scope="row">Nombres:</th>
                    <td><input name="nombres" id="nombres" type="text" required/></td>
                </tr>
                <tr>
                    <th scope="row">Primer Apellido</th>
                    <td><input name="pApellido" id="pApellido" type="text" required/></td>
                </tr>
                <tr>
                    <th scope="row">Segundo Apellido</th>
                    <td><input name="sApellido" id="sApellido" type="text" required/></td>
                </tr>
                <tr>
                    <th scope="row">Sexo</th>
                    <td><select name="sexo" id="sexo">
                            <option>M</option>
                            <option>F</option>
                        </select></td>
                </tr>
                <tr>
                    <th scope="row">Telefono</th>
                    <td><input name="telefono" id="telefono" type="number" /></td>
                </tr>
                <tr>
                    <th scope="row">Direccion</th>
                    <td><input name="direccion" id="direccion" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">Correo</th>
                    <td><input name="correo" id="correo" type="email" /></td>
                </tr>
                <tr>
                    <th scope="row">Fecha de Nacimiento</th>
                    <td><input name="fNacimiento" id="fNacimiento" type="date" required/></td>
                </tr>
                <tr>
                    <td colspan="2"><input name="guardarEstudiantes" id="guardarEstudiantes" type="submit" value="Guardar" onclick="envio()" /></td>
                </tr>

            </table>
    </body>
</html>