
<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
<head>
<title><?php echo $titulo; ?></title>
</head>
<script type="text/javascript">
    
function envio(){ 
  
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 

 var idPersona = document.getElementById("idPersona");
 var username = document.getElementById("username");
 var password = document.getElementById("password");
 var newUsername = document.getElementById("newUsername");
 var newPassword = document.getElementById("newPassword");
 
    if (idPersona.value=="" || username.value=="" || password.value=="" || newUsername.value=="" || newPassword.value=="" ){
    x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
      error();
      ocultar();
    }else{

        var url="/colegio/administrador/configurarUsuario/";
        var data="idPersona="+idPersona.value+"&username="+username.value+"&password="+password.value+"&newUsername="+newUsername.value+"&newPassword="+newPassword.value;

        envioJson(url,data,function respuesta(res){
        
        switch (res){

        case 1:
         x.html ( "<p>Datos Actualizados Correctamente</p>");
         exito();
         ocultar();
         document.location.href="/colegio/administrador/configuracionUsuario";
        break;

        case 2:
         x.html ( "<p>Error: El nombre de <b> Usuario Actual </b> Ingresado es Incorrecto</p>");
         error();
         ocultar();
        break;
        
        case 3:
         x.html ( "<p>Error: La <b> contraseña Actual </b> Ingresada es Incorrecta</p>");
         error();
         ocultar();
        break;
        
         default:
         x.html ( "<p>"+res+"</p>");
         idMateria.value="";
         idGrado.setAttribute("autofocus","true");
         nombre.value="";
         error();
         ocultar();               
         
        }
     
        });

    }   
}
</script>
    <body>
    <div class="cabecera">
        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
          <input type="hidden" name="idPersona" id="idPersona" value="<?php echo $_SESSION['idUsuario'] ?>">
        </div>
          <!------------------------------cabecera--------------------------->  
          <p>&nbsp;</p>
            </br>
            <p>&nbsp;</p>
            
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="green">
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Configuracion de Usuario</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                </div>
        </div> 
      <p>&nbsp;</p>                
     <!--------------------------------------------------------------------> 

          <table width="40%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                    <td></td>
                    <td align="left" class="color-text-gris"><h1>DATOS DE USUARIO</h1></td>
                </tr>  
                <tr>
                    <td align="right" width="40%" >Nombre de Usuario Actual:</td>
                    <td><input name="username" id="username" type="text" class="box-text" required/></td>
                </tr>
                <tr>
                    <td align="right">Contraseña Actual:</td>
                    <td><input name="password" id="password" type="password" class="box-text"  required/></td>
                </tr>
                 <tr>
                    <td align="right">Nuevo Nombre de Usuario:</td>
                    <td><input name="newUsername" id="newUsername" type="text" class="box-text"  required/></td>
                </tr>
                <tr>
                    <td align="right">Nueva Contraseña:</td>
                    <td><input name="newPassword" id="newPassword" type="password" class="box-text"  required/></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><input name="configurarUsuario" id="configurarUsuario" type="submit" class="button large green" value="Guardar" onclick="envio()" /></td>
                </tr>
               </table>
