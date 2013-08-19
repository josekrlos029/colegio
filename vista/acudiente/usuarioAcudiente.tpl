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


 include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
        <title>Usuario Acudiente</title>
    </head>
     <body>
	
	 <div class="cabecera">
	<?php include HOME . DS . 'includes' . DS . 'headerAcudiente.php'; ?>
        </div>
     <div style="margin-top: 3%; position: relative; width: 100%;"> 
    <div style="position: relative; width: 100%; padding-top:10px; padding-bottom: 3%;">
        <table border="0" align="center" width="90%" >
         <tr>
            <td width="40%" >
            Hola <?php echo $acu->getNombre();?> Bienvenido(a) a tu Cuenta.</br> 
            <img src="../utiles/imagenes/tag_acudiente.png"/>
            <?php include HOME . DS . 'includes' . DS . 'fecha.php'; ?>
            </td>
            <td align="right" class="color-text-gris"><h1><?php echo $acu->getNombre()." ".$acu->getApellido();?></h1></td>                                     
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
                                                 <td>Ocupacion:<span><?php echo " ".$acu->getOcupacion(); ?></span></td>
                                               </tr>  
                                               <tr>
                                                   <td>Telefono:<span><?php echo " ".$acu->getTelefono(); ?></span></td>
                                               </tr>
                                               <tr>
                                                   <td>Telefono de Oficina:<span><?php echo " ".$acu->getTel_oficina(); ?></span></td>
                                               </tr>                                   
                                               <tr>
                                                   <td>Direccion:<span><?php echo " ".$acu->getDireccion(); ?></span></td>
                                               </tr>
                                                 
                                                              
                           </table>
                            </td>

                        </tr>
                     </table>   
                 </td> 
                  <td width="90%" >
                      <table id="titulo-menu" width="100%" height="8%" border="0">
                           <tr> 
                               <td></td>
                                <td width="20%" align="right">
                                    <a href="#"onclick="datosAcademicos()" class="link-menu">Resultados Academicos</a>
                                </td>
                                <td width="30%" align="right">
                                    <a href="#"onclick="seguimiento()" class="link-menu">Seguimiento Academico y Disciplinario</a>
                                </td>
                                <td width="10%" align="right">
                                    <a href="#"onclick="pension()" class="link-menu">Pensión</a>
                                </td>
                                <td width="20%" align="right">
                                    <a href="#"onclick="funcionesAcademicas()" class="link-menu">Funciones Academicas</a>
                                </td>
                                <td width="15%" align="right">
                                    <a href="#"onclick="notificaciones()" class="link-menu">Notificaciones</a>
                                </td>

                      </table>    

                        <table class="fondo" width="100%" height="92%" border="0">
                            <tr>  
                                <td>
                                    <div id="cargar" class="carga-pag">
                                    sus Acudidos:<?php echo " ".$acudido->getId_persona(); ?>
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
    
