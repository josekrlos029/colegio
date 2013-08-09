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
  </script>  
    
    <body>
	
	 <div class="cabecera">
	<?php include HOME . DS . 'includes' . DS . 'headerEstudiante.php'; ?>
        </div>
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
                 <td width="">
                     <table class="fondo" width="100%" height="100%">
                        <tr> 
                            <td>
                                <div class="marcoAvatarest">
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
                      <table id="titulo-menu" width="100%" height="8%" border="0">
                           <tr> 
                               <td width="55"></td>
                                <td width="20%" align="right">
                                    <a href="#"onclick="datosAcademicos()" class="link-menu">Resultados Academicos</a>
                                </td>
                                <td width="20%" align="right">
                                    <a href="#"onclick="seguimiento()" class="link-menu">Seguimiento Academico y Disciplinario</a>
                                </td>
                                <td width="20%" align="right">
                                    <a href="#"onclick="pension()" class="link-menu">Pensión</a>
                                </td>
                                <td width="25%" align="right">
                                    <a href="#"onclick="funcionesAcademicas()" class="link-menu">Funciones Academicas</a>
                                </td>

                      </table>    

                        <table class="fondo" width="100%" height="92%" border="0">
                            <tr>  
                                <td>
                                    <div id="cargar" class="carga-pag">
                                     Gestion academica del estudiante, seleccione la opcion que desea
                                    </div>
                                </td>
                            </tr>
                        </table> 

                 </td>  
                 </tr>      
         </table> 
      
      </div>
</div>
 </body>
  <?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>
</html>
