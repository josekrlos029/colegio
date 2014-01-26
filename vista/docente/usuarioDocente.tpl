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
   

<script type="text/javascript">
    
 function datosAcademicos(){    
 $('#cargar').load('/colegio/docente/datosAcademicos');           
}
function ingresoNotas(){    
  $('#cargar').load('/colegio/docente/ingresoNotas');        
}
function funcionesAcademicas(){    
    
  $('#cargar').load('/colegio/docente/funcionesAcademicas');        
}
 function notificaciones(){  
 $('#cargar').load('/colegio/docente/notificaciones');           
}
function foto(){
    document.getElementById('light2').style.display='block';
    document.getElementById('fade2').style.display='block';
}

  </script>  
    
   </head>
    <body>

	<?php include HOME . DS . 'includes' . DS . 'headerDocente.php'; ?>
 <div style="margin-top: 3%; position: relative; width: 100%;"> 
    <div style="position: relative; width: 100%; padding-top:10px; padding-bottom: 3%;">
        <table border="0" align="center" width="90%" >
         <tr>
            <td width="40%" >
  Hola <?php echo $docente->getNombres();?> Bienvenido(a) a tu Cuenta.</br> 
  <a href="/colegio/docente/usuarioDocente"><img src="../utiles/imagenes/tag_docente.png"/></a>
   <?php include HOME . DS . 'includes' . DS . 'fecha.php'; ?>
  </td>
  <td align="right" class="color-text-gris"><h1><?php echo $docente->getNombres()." ". $docente->getPApellido()." ".$docente->getSApellido(); ?></h1></td>
</tr>
</table >
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
                                <div class="marcoAvatardoc">
                                     <a href="#" class="pic" onclick="foto()"><img height="24px" width="24px" src="../utiles/imagenes/cambiar-img.png"></a>
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
                 
                                       <tr><td>Sexo:<span><?php echo $docente->getSexo(); ?></td> </span></tr>                                        
                                       <tr><td>Telefono:<span><?php echo $docente->getTelefono(); ?></td></span></tr> 
                                       <tr><td>Direccion:<span><?php echo $docente->getDireccion(); ?></td></span></tr> 
                                       <tr><td>Correo:<span><?php echo $docente->getCorreo(); ?></td></span></tr>
                                       <tr><td>Fecha De Nacimiento:<span><?php echo $docente->getFNacimiento()->format('Y-m-d'); ?></td></span></tr>
                                     
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
                       <td width="55"></td>
                        <td width="20%" align="right" >
                            <a href="#"onclick="datosAcademicos()" class="link-menu">Datos Academicos</a>
                        </td>
                        <td width="20%" align="right">
                            <a href="#"onclick="ingresoNotas()" class="link-menu">Ingreso de Notas</a>
                        </td>
                        <td width="25%" align="right">
                            <a href="#"onclick="funcionesAcademicas()" class="link-menu">Funciones Academicas</a>
                        </td>
                         <td width="20%" align="right">
                                    <a href="#"onclick="notificaciones()" class="link-menu">Notificaciones</a>
                         </td>
                        
              </table>    
             </div>
                    <div class="den-form">
                <table  width="100%" border="0">
                    <tr>  
                        <td>
                            <div id="cargar" class="carga-pag">
                             Gestion academica del docente, seleccione la opcion que desea
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
         <div id="fade" class="overlay"></div>
            <div id="light" class="modal">
                <div style="float:right">
                    <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
               </div>
                  <div id="tablaConsulta">

                  </div>

            </div>
         <div id="fade2" class="overlay"></div>
            <div id="light2" class="modal">
                <div style="float:right">
                    <a href = "javascript:void(0)" onclick = "document.getElementById('light2').style.display='none';document.getElementById('fade2').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
               </div>
                  <div style="margin:20%;"> 
                      <h1>INSERTAR IMAGEN</h1>
                      <p>Por favor Seleccion la imagen que desea para su Perfil.</br>EXTENSIONES ACEPTADAS: .jpeg .jpg .png </br> TAMAÑO MAXIMO: 4MB</p>
                      <form action="/colegio/acudiente/actualizarFoto" method="post" enctype="multipart/form-data" name="form1">
                          <input type="file" name="foto" id="foto">
                          <input type="hidden" name="url" value="/colegio/docente/usuarioDocente">
                          <input type="submit" name="enviar" value="Guardar" class="button large red" >
                      </form>
                  </div>

            </div>
 </body>
  <?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>
</html>
