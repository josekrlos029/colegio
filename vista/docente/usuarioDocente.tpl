<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author andy henry
 */
interface usuarioDocente {
    //put your code here
}

?>
   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
        <title>Usuario Docente</title>
    </head>

<script type="text/javascript">
    
 function datosAcademicos(){    
 $('#cargar').load('/colegio/docente/datosAcademicos');           
}
function ingresoNotas(){    
  $('#cargar').load('/colegio/docente/ingresoNotas.');        
}
function funcionesAcademicas(){    
  $('#cargar').load('/colegio/docente/funcionesAcademicas.');        
}
  </script>  
    
  
    <body>
	
	<div id="marco">
	<?php include HOME . DS . 'includes' . DS . 'headerDocente.php'; ?>
</br>
<hr>
<table border="0" align="center" width="900px" >
 <tr>
  <td width="40%" >
  Hola <?php echo $docente->getNombres();?> Bienvenido(a) a tu Cuenta.</br> 
  <img src="../utiles/imagenes/tag_docente.png"/>
   <?php include HOME . DS . 'includes' . DS . 'fecha.php'; ?>
  </td>
  <td align="right" class="color-text-gris"><h1>Gestion Academica Del Docente</h1></td>
</tr>
</table >
</br>
<hr>
</br>

 <table border="0" align="center" width="900px">
	 <tr>
	   <td class="color-text-rojo" width="26%">  
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
                            <div class="marco-foto-doc"></div>
                        </div>    
                    </td>
                </tr>
                <tr>
                    <td>
                       
                        <table border="0" width="100%"> 
                                       <tr><td class="color-text-rojo">Nombres:</td></tr> 
                                       <tr><td><?php echo $docente->getNombres(); ?></td></tr>
                                       <tr><td class="color-text-rojo">Apellidos:</td></tr>
                                       <tr><td><?php echo $docente->getPApellido()." ".$docente->getSApellido(); ?></td></tr>  
                                       <tr><td class="color-text-rojo">Sexo:</td></tr>                                       
                                       <tr><td><?php echo $docente->getSexo(); ?></td> </tr>                                        
                                       <tr><td class="color-text-rojo">Telefono:</td></tr>
                                       <tr><td><?php echo $docente->getTelefono(); ?></td></tr> 
                                       <tr><td class="color-text-rojo">Direccion:</td></tr>
                                       <tr><td><?php echo $docente->getDireccion(); ?></td</tr> 
                                       <tr><td class="color-text-rojo">Correo:</td></tr>    
                                       <tr><td><?php echo $docente->getCorreo(); ?></td></tr>
                                       <tr><td class="color-text-rojo">Fecha De Nacimiento:</td></tr>
                                       <tr><td><?php echo $docente->getFNacimiento()->format('Y-m-d'); ?></td></tr>
                                     
                   </table>
                    </td>
                    
                </tr>
             </table>   
         </td> 
          <td>
              <table id="titulo-menu-doc" width="100%" height="8%" border="0">
                   <tr> 
                       <td width="55"></td>
                        <td width="20%" align="right">
                            <a href="#"onclick="datosAcademicos()" class="link-menu">Datos Academicos</a>
                        </td>
                        <td width="20%" align="right">
                            <a href="#"onclick="ingresoNotas()" class="link-menu">Ingreso de Notas</a>
                        </td>
                        <td width="25%" align="right">
                            <a href="#"onclick="funcionesAcademicas()" class="link-menu">Funciones Academicas</a>
                        </td>
                        
              </table>    
             
                <table class="fondo" width="100%" height="92%" border="0">
                    <tr>  
                        <td>
                            <div id="cargar" class="carga-pag">
                             Gestion academica del docente, seleccione la opcion que desea
                            </div>
                        </td>
                    </tr>
                </table> 
             
         </td>  
         </tr>      
 </table> 
 </body>
</html>
