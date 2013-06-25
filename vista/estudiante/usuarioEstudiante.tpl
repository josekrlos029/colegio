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
  </script>  
    
    <body>
	
	<div id="marco">
	<?php include HOME . DS . 'includes' . DS . 'headerEstudiante.php'; ?>
</br>
<hr>
<table border="0" align="center" width="900px" >
 <tr>
  <td width="40%" >
  Hola <?php echo $estudiante->getNombres();?> Bienvenido(a) a tu Cuenta.</br> 
  <img src="../utiles/imagenes/tag_estudiante.png"/>
   <?php include HOME . DS . 'includes' . DS . 'fecha.php'; ?>
  </td>
  <td align="right" class="color-text-gris"><h1>Gestion Academica Del Estudiante</h1></td>
</tr>
</table >
</br>
<hr>
</br>

<table border="0" align="center" width="900px">
	 <tr>
	   <td class="color-text-azul" width="26%">  
                <h1>datos personales</h1>
                
           </td>
           <td>
           
           </td>
         </tr>
 </table>

<table border="0" align="center" width="900px" height="100%">
         <tr>
         <td width="26%">
             <table class="fondo" width="99%">
                <tr> 
                    <td>
                        <div class="contenedora-imagen">
                            <div class="perfilDefecto"></div>
                            <div class="marco-foto-est"></div>
                        </div>    
                    </td>
                </tr>
                <tr>
                    <td>
                       
                     <table border="0" width="100%"> 
                                      <tr><td class="color-text-azul">Nombres:</td></tr> 
                                       <tr><td><?php echo $estudiante->getNombres(); ?></td></tr>
                                       <tr><td class="color-text-azul">Apellidos:</td></tr>
                                       <tr><td><?php echo $estudiante->getPApellido()." ".$estudiante->getSApellido(); ?></td></tr>  
                                       <tr><td class="color-text-azul">Sexo:</td></tr>                                       
                                       <tr><td><?php echo $estudiante->getSexo(); ?></td> </tr>                                        
                                       <tr><td class="color-text-azul">Telefono:</td></tr>
                                       <tr><td><?php echo $estudiante->getTelefono(); ?></td></tr> 
                                       <tr><td class="color-text-azul">Direccion:</td></tr>
                                       <tr><td><?php echo $estudiante->getDireccion(); ?></td</tr> 
                                       <tr><td class="color-text-azul">Correo:</td></tr>    
                                       <tr><td><?php echo $estudiante->getCorreo(); ?></td></tr>
                                       <tr><td class="color-text-azul">Fecha De Nacimiento:</td></tr>
                                       <tr><td><?php echo $estudiante->getFNacimiento()->format('Y-m-d'); ?></td></tr>
                                     
                   </table>
                    </td>
                    
                </tr>
             </table>   
         </td> 
          <td>
              <table id="titulo-menu-est" width="100%" height="8%" border="0">
                   <tr> 
                       <td width="55"></td>
                        <td width="20%" align="right">
                            <a href="#"onclick="datosAcademicos()" class="link-menu">Datos Academicos</a>
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

 </body>
</html>
