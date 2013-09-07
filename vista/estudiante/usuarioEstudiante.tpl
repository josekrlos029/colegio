<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author andy henry
 */
interface usuarioEstudiante {
    //put your code here
}

?>
   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
        <title>Usuario Estudiante</title>
    </head>
    
    <script type="text/javascript">
    
 function datosAcademicos(){    
 $('#cargar').load('/colegio/estudiante/datosAcademicos');           
}
 function funcionesAcademicas(){  
 $('#cargar').load('/colegio/estudiante/funcionesAcademicas');           
}
function seguimiento(){  
 $('#cargar').load('/colegio/estudiante/seguimiento');           
}
function pension(){  
 $('#cargar').load('/colegio/estudiante/pension');           
}
 function notificaciones(){  
 $('#cargar').load('/colegio/estudiante/notificaciones');           
}
  </script>  
    
    <body>
	
	
	<?php include HOME . DS . 'includes' . DS . 'headerEstudiante.php'; ?>
     
<div style="margin-top: 3%; position: relative; width: 100%;"> 
    <div style="position: relative; width: 100%; padding-top:10px; padding-bottom: 3%;">
        <table border="0" align="center" width="90%" >
         <tr>
            <td width="40%" >
            Hola <?php echo $estudiante->getNombres();?> Bienvenido(a) a tu Cuenta.</br> 
            <img src="../utiles/imagenes/tag_estudiante.png"/>
            <?php include HOME . DS . 'includes' . DS . 'fecha.php'; ?>
            </td>
            <td align="right" class="color-text-gris"><h1><?php echo $estudiante->getNombres()." ".$estudiante->getPApellido()." ".$estudiante->getSApellido(); ?></h1></td>                                     
            </tr>
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
                                <div class="marcoAvatarest">
                                    <div class="avatar">
                                    <span class="rounded">
                                     <?php echo $img; ?>
                                    </span> 
                                    </div>    
                                    </div>   
                            </td>
                        </tr>
                        <tr>
                            <td>
                      <table border="0" width="100%" id="inf-Personal"> 

                                               <tr>
                                                 <td>Salón:<span><?php echo " ".$matricula->getIdSalon(); ?></span></td>
                                               </tr>  
                                               <tr>
                                                   <td>Grado:<span><?php echo " ".$grado->getNombre(); ?></span></td>
                                               </tr>
                                               <tr>
                                                   <td>Jornada:<span><?php echo " ".$matricula->getJornada(); ?></span></td>
                                               </tr>
                                               <tr>
                                                   <td>Sexo:<span><?php echo " ".$estudiante->getSexo(); ?></span></td> 
                                               </tr> 
                                               <tr>
                                                   <td>Telefono:<span><?php echo " ".$estudiante->getTelefono(); ?></span></td>
                                               </tr>                                      
                                               <tr>
                                                   <td>Direccion:<span><?php echo " ".$estudiante->getDireccion(); ?></span></td>
                                               </tr>
                                               <tr>
                                                   <td>Correo:<span><?php echo " ".$estudiante->getCorreo(); ?></span></td>
                                               </tr>   
                                               <tr>
                                                   <td>Fecha De Nacimiento:<span> <?php echo " ".$estudiante->getFNacimiento()->format('Y-m-d'); ?></span></td>
                                               </tr>                   
                           </table>
                            </td>

                        </tr>
                     </table>   
                 </td> 
                  <td width="90%" >
                     
              <div class="formularios">
                    <div class="cab-form">
                      <table  width="100%"  border="0">
                           <tr> 
                              
                                <td>
                                    <a href="#"onclick="datosAcademicos()" class="link-menu">Resultados Academicos</a>
                                </td>
                                <td  align="center">
                                    <a href="#"onclick="seguimiento()" class="link-menu">Seguimiento Academico y Disciplinario</a>
                                </td>
                                <td  align="right">
                                    <a href="#"onclick="pension()" class="link-menu">Pensión</a>
                                </td>
                                <td align="right">
                                    <a href="#"onclick="funcionesAcademicas()" class="link-menu">Funciones Academicas</a>
                                </td>
                                <td  align="right">
                                    <a href="#"onclick="notificaciones()" class="link-menu">Notificaciones</a>
                                </td>

                      </table>    
                    </div>
                            <div class="den-form">
                                <table  width="100%" border="0">
                                    <tr>  
                                        <td>
                                            <div id="cargar" class="carga-pag">
                                             Gestion academica del estudiante, seleccione la opcion que desea
                                            </div>
                                        </td>
                                    </tr>
                                </table> 
                            </div>
                    </div>
                 </td>  
                 </tr>      
         </table> 
      
      </div>
</div>
 </body>
  <?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>
</html>
