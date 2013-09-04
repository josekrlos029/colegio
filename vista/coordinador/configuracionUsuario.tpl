
<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
<head>
<title><?php echo $titulo; ?></title>
</head>
<script type="text/javascript">
    
function envioUser(){ 
  
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 

 var idPersona = document.getElementById("idPersona");
 var username = document.getElementById("username");
 var password = document.getElementById("password");

    if (idPersona.value=="" || username.value=="" || password.value=="" ){
    x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
      error();
      ocultar();
    }else{

        var url="/colegio/coordiandor/configurarUsuario/";
        var data="idPersona="+idPersona.value+"&username="+username.value+"&password="+password.value;

        envioJson(url,data,function respuesta(res){
        
        switch (res){

        case 1:
         x.html ( "<p>Datos Actualizados Correctamente</p>");
         exito();
         ocultar();
         document.location.href="/colegio/coordiandor/configuracionUsuario";
        break;

        case 2:
         x.html ( "<p>Error: la <b> Contraseña Ingresada </b> es Incorrecta</p>");
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

function envioPassword(){ 
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

var idPersona = document.getElementById("idPersona");
var passwordActual = document.getElementById("passwordActual");
var passwordNew = document.getElementById("passwordNew");
var confPasswordNew = document.getElementById("confPasswordNew");

  if (idPersona.value=="" || passwordActual.value=="" || passwordNew.value=="" || confPasswordNew.value=="" ){
             
             x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
             error();
             ocultar(); 
             
       }else if(passwordNew.value != confPasswordNew.value){
       
            x.html ( "<p>Error: la <b> Nueva Contraseña Ingresada </b>no coincide Con la contraseña confirmada</p>");
            error();
            ocultar();
            
       }else{
       
            var url="/colegio/coordiandor/configurarContraseña/";
            var data="idPersona="+idPersona.value+"&passwordActual="+passwordActual.value+"&passwordNew="+passwordNew.value;

            envioJson(url,data,function respuesta(res){
             switch (res){

            case 1:
            x.html ( "<p>Datos Actualizados Correctamente</p>");
            exito();
            ocultar();
            document.location.href="/colegio/coordiandor/configuracionUsuario";
            break;

            case 2:
            x.html ( "<p>Error: la <b> Contraseña Ingresada </b> es Incorrecta</p>");
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

function envioEmail(){ 
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
var idPersona = document.getElementById("idPersona");
var correo = document.getElementById("correo");
var passwordC = document.getElementById("passwordC");
 
 
 
 if (idPersona.value=="" || correo.value=="" || passwordC.value==""){
             
             x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
             error();
             ocultar(); 
             
       }else{
            var url="/colegio/coordiandor/configurarCorreo/";
            var data="idPersona="+idPersona.value+"&correo="+correo.value+"&passwordC="+passwordC.value;

            envioJson(url,data,function respuesta(res){
             switch (res){

            case 1:
            x.html ( "<p>Datos Actualizados Correctamente</p>");
            exito();
            ocultar();
            document.location.href="/colegio/coordiandor/configuracionUsuario";
            break;

            case 2:
            x.html ( "<p>Error: la <b> Contraseña Ingresada </b> es Incorrecta</p>");
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
   
        <?php include HOME . DS . 'includes' . DS . 'headerCoordinador.php'; ?>
          <input type="hidden" name="idPersona" id="idPersona" value="<?php echo $_SESSION['idUsuario'] ?>">
  
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
                                <h1>Configuracion General de la Cuenta</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                </div>
        </div> 
      <p>&nbsp;</p>                
     <!--------------------------------------------------------------------> 

<ul id="accordion">
<li><span>Cambiar Nombre De Usuario</span>
<ul>
    
<li>
    
                <table width="80%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                    <td></td>
                    <td align="left" class="color-text-gris"><h1>Nombre DE USUARIO</h1></td>
                </tr>  
                <tr>
                    <td align="right" width="40%" >Nombre de Usuario:</td>
                    <td><input name="username" id="username" type="text" class="box-text" value="<?php echo $usuario->getUsuario(); ?>" required/></td>
                </tr>
                <tr>
                    <td align="right">Contraseña:</td>
                    <td><input name="password" id="password" type="password" class="box-text"  required/></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><input name="configurarUsuario" id="configurarUsuario" type="submit" class="button large green" value="Guardar" onclick="envioUser()" /></td>
                </tr>
               </table>
    
    
</li>

</ul>
</li>

<li><span>Cambiar Contraseña</span>
<ul>
    
<li>
 <table width="80%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                    <td></td>
                    <td align="left" class="color-text-gris"><h1>contraseÑa</h1></td>
                </tr>  
                <tr>
                    <td align="right" width="40%" >Actual:</td>
                    <td><input name="passwordActual" id="passwordActual" type="password" class="box-text" required/></td>
                </tr>
                <tr>
                    <td align="right">Nueva:</td>
                    <td><input name="passwordNew" id="passwordNew" type="password" class="box-text"  required/></td>
                </tr>
                 <tr>
                    <td align="right">Confirmar Contraseña Nueva:</td>
                    <td><input name="confPasswordNew" id="confPasswordNew" type="password" class="box-text"  required/></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><input name="configurarContraseña" id="configurarContraseña" type="submit" class="button large green" value="Guardar" onclick="envioPassword()" /></td>
                </tr>
</table>
</li>

</ul>
</li>

<li><span>Cambiar Correo electronico</span>
<ul>
<li>
    <table width="80%" border="0" cellspacing="1" cellpadding="2">
                <tr>
                    <td></td>
                    <td align="left" class="color-text-gris"><h1>correo electronico</h1></td>
                </tr>  
                <tr>
                    <td align="right" width="40%" >Direccion de correo electronico:</td>
                    <td><input name="correo" id="correo" type="text" class="box-text" value="<?php echo $persona->getCorreo(); ?>" required/></td>
                </tr>
                <tr>
                    <td align="right">Contraseña:</td>
                    <td><input name="passwordC" id="passwordC" type="password" class="box-text"  required/></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><input name="configurarEmail" id="configurarEmail" type="submit" class="button large green" value="Guardar" onclick="envioEmail()" /></td>
                </tr>
               </table>  

</li>
</ul>
</li>
</ul>
     
 <script type="text/javascript">
 $("#accordion > li > span").click(function(){
 if(false == $(this).next().is(':visible')) {
 $('#accordion ul').slideUp(300);
 }
 $(this).next().slideToggle(300);
 });
 $('#accordion ul:eq(0)').show();
 </script>

    </body>
</html>