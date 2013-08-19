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
 <table border="0" align="center" width="90%" height="100%">
      <tr>
	   <td class="color-text-green" width="10%">  
                  
           </td>
           <td align="right" class="color-text-gris"><h1>Gestion Academica Del Coordiandor</h1></td>
         </tr>
         <tr>
         <td width="10%">
             <table class="fondo" width="99%">
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
                       
                        <table border="0" width="100%"> 
                                       <tr><td class="color-text-green">Nombres:</td></tr> 
                                       <tr><td><?php echo $coordinador->getNombres(); ?></td></tr>
                                       <tr><td class="color-text-green">Apellidos:</td></tr>
                                       <tr><td><?php echo $coordinador->getPApellido()." ".$coordinador->getSApellido(); ?></td></tr>  
                                       <tr><td class="color-text-green">Sexo:</td></tr>                                       
                                       <tr><td><?php echo $coordinador->getSexo(); ?></td> </tr>                                        
                                       <tr><td class="color-text-green">Telefono:</td></tr>
                                       <tr><td><?php echo $coordinador->getTelefono(); ?></td></tr> 
                                       <tr><td class="color-text-green">Direccion:</td></tr>
                                       <tr><td><?php echo $coordinador->getDireccion(); ?></td</tr> 
                                       <tr><td class="color-text-green">Correo:</td></tr>    
                                       <tr><td><?php echo $coordinador->getCorreo(); ?></td></tr>
                                       <tr><td class="color-text-green">Fecha De Nacimiento:</td></tr>
                                       <tr><td><?php echo $coordinador->getFNacimiento()->format('Y-m-d'); ?></td></tr>
                                     
                   </table>
                    </td>
                </tr>
             </table>   
         </td> 
          <td>
              <table  width="100%" height="8%" border="0" id="titulo-menu">
                   <tr> 
                       <td width="55"></td>
                        <td width="10%" align="right" >
                            <a href="#"onclick="datosAcademicos()" class="link-menu">Boletines</a>
                        </td>
                        <td width="10%" align="right">
                            <a href="#"onclick="ingresoNotas()" class="link-menu">Consolidados</a>
                        </td>
                        <td width="10%" align="right">
                            <a href="#"onclick="funcionesAcademicas()" class="link-menu">Pensiones</a>
                        </td>
                         <td width="10%" align="right">
                                    <a href="#"onclick="notificaciones()" class="link-menu">Observador</a>
                         </td>
                        
              </table>    
             
                <table class="fondo" width="100%" height="92%" border="0">
                    <tr>  
                        <td>
                            <div id="cargar" class="carga-pag">
                             Gestion academica del Coordinador, seleccione la opcion que desea
                            </div>
                        </td>
                    </tr>
                </table> 
         </td>  
         </tr>      
 </table>
</div>
 </body>
  <?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>
</html>


 