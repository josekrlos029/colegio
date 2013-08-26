<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author andy henry
 */
interface usuarioAcudiente {
    //put your code here
}
  include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
        <title>Usuario Coordinador</title>
</head>
<script type="text/javascript">
    
 function estPreescolar(){    
 $('#cargar').load('/colegio/coordinador/estudiantesPreescolar');           
}

 function estPrimaria(){    
 $('#cargar').load('/colegio/coordinador/estudiantesPrimaria');           
}

 function estSecundaria(){    
 $('#cargar').load('/colegio/coordinador/estudiantesSecundaria');           
}
 function docPreescolar(){    
 $('#cargar').load('/colegio/coordinador/docentesPreescolar');           
}

 function docPrimaria(){    
 $('#cargar').load('/colegio/coordinador/docentesPrimaria');           
}

 function docSecundaria(){    
 $('#cargar').load('/colegio/coordinador/docentesSecundaria');           
}

function boletines(){
$('#cargar2').load('/colegio/coordinador/boletines'); 
}

function consolidados(){
$('#cargar').load('/colegio/coordinador/consolidados'); 
}

function pensiones(){
$('#cargar').load('/colegio/coordinador/pensiones'); 
}
function seguimientos(){
$('#cargar2').load('/colegio/coordinador/seguimientos'); 
}
</script>
 <body>
     <div class="cabecera">
	<?php include HOME . DS . 'includes' . DS . 'headerCoordinador.php'; ?>
    </div>
    </br>
    <table border="0" align="center" width="90%" >
  <tr>
  <td width="40%" >
  Hola <?php echo $coordinador->getNombres();?> Bienvenido(a) a tu Cuenta.</br>
  <img src="../utiles/imagenes/tag_coordinador.png"/>
   <?php include HOME . DS . 'includes' . DS . 'fecha.php'; ?>
  </td>
  <td>
  <ul>
      <div><h2>Estudiantes</h2></div>
      <li><a href="#"onclick="estPreescolar()">Consulta Preescolar</a></li>
      <li><a href="#"onclick="estPrimaria()">Consulta Primaria</a></li>
      <li><a href="#"onclick="estSecundaria()">Consulta Secundaria</a></li>
  </ul>
  </td>
  
<td>
  <ul>
  <div><h2>Docentes</h2></div>
       <li><a href="#"onclick="docPreescolar()">Consulta Preescolar</a></li>
       <li><a href="#"onclick="docPrimaria()">Consulta Primaria</a></li>
       <li><a href="#"onclick="docSecundaria()">Consulta Secundaria</a></li>
	   </ul>
</td>   

 </td>
</tr>
</table >
</br>
<hr>
<div id="cargar">
<div style="padding-right: 5%; padding-left: 5%;" > 
 <table border="0" align=right" width="100%" >
      <tr>
	   <td class="color-text-green" width="10%">  
                  
           </td>
           <td align="right" class="color-text-gris"><h1>Gestion Academica Del Coordiandor</h1></td>
         </tr>
         <tr>
         </table>
</div>             
      <div style="margin-top:0%; position: relative; width:100%; height: 100%;">  
        <table border="0" align="center" width="90%" height="100%">
                 <tr>
                 <td>
                     <div class="formularios">
                         <div class="cab-form">
                             <table  width="100%" border="0">
                             <tr>                                     
                                 <td>Informacion de Perfil</td>
                             </tr>
                             </table>
                             
                         </div>
             <table  width="100%">
                <tr> 
                    <td>
                      
                        <div class="marcoAvatarCoor">
                            <div class="avatar">
                            <span class="rounded">
                            <img height="150px" width="150px" src="../utiles/imagenes/avatarDefaul.png">
                            </span> 
                            </div>    
                            </div>  
                       
                    </td>
                </tr>
                <tr>
                    <td>
                       
                         <table border="0" width="100%" id="inf-Personal"> 
                                       <tr><td class="color-text-green">Nombres:<?php echo $coordinador->getNombres(); ?></td></tr>
                                       <tr><td class="color-text-green">Apellidos:<?php echo $coordinador->getPApellido()." ".$coordinador->getSApellido(); ?></td></tr>  
                                       <tr><td class="color-text-green">Sexo:<?php echo $coordinador->getSexo(); ?></td> </tr>                                        
                                       <tr><td class="color-text-green">Telefono:<?php echo $coordinador->getTelefono(); ?></td></tr> 
                                       <tr><td class="color-text-green">Direccion:<?php echo $coordinador->getDireccion(); ?></td</tr> 
                                       <tr><td class="color-text-green">Correo:<?php echo $coordinador->getCorreo(); ?></td></tr>
                                       <tr><td class="color-text-green">Fecha De Nacimiento:<?php echo $coordinador->getFNacimiento()->format('Y-m-d'); ?></td></tr>
                                     
                   </table>
                    </td>
                </tr>
             </table>   
            </div>    
               </td> 
               <td width="90%" >
                <div class="formularios">
                    <div class="cab-form">
                      <table  width="100%" border="0">
                   <tr> 
                       
                        <td width="10%" align="right" >
                            <a href="#"onclick="boletines()" class="link-menu">Boletines</a>
                        </td>
                        <td width="10%" align="right">
                            <a href="#"onclick="consolidados()" class="link-menu">Consolidados</a>
                        </td>
                        <td width="10%" align="right">
                            <a href="#"onclick="pensiones()" class="link-menu">Pensiones</a>
                        </td>
                         <td width="10%" align="right">
                                    <a href="#"onclick="seguimientos()" class="link-menu">Observador</a>
                         </td>
                        
              </table>    
                  </div>
                    <div class="den-form">
                        <table  width="100%"  border="0">
                    <tr>  
                        <td>
                            <div id="cargar2" class="carga-pag">
                             Gestion academica del Coordinador, seleccione la opcion que desea
                            </div>
                        </td>
                    </tr>
                </table> 
                  </div>
         </td>  
         </tr>      
 </table>
                   </div>
                </div>
</div>
 </body>
  <?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>
</html>


 