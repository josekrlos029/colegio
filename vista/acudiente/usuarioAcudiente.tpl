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
    <script type="text/javascript">
    function consultaPersona(idPersona){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

var y= $("#tablaConsulta"); 
var url="/colegio/administrador/consultaGeneralPersona";
var data="idPersona="+idPersona;
 envioJson(url,data,function respuesta(res){   
   x.hide();            
    y.html (res);
    
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'
});
 
      
}
 </script>
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
                                </br></br>
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
                               <td></td>
                               
                                <td width="20%" align="right">
                                    <a href="#"onclick="funcionesAcademicas()" class="link-menu">Funciones Academicas</a>
                                </td>
                                <td width="15%" align="right">
                                    <a href="#"onclick="notificaciones()" class="link-menu">Notificaciones</a>
                                </td>

                      </table>    
                        </div>
                    <div class="den-form">
                        <table  width="100%"  border="0">
                            <tr>  
                                <td>
                                    <div id="cargar" class="carga-pag">
                                      <table aling="center" width="100%"  border="0">
                                        <tr>
                                            <td align="right" class="color-text-azul" colspan="3"><h3>Acudidos</h3><hr></td>    
                                        </tr>
                                    </table>  
                                        
                                     <table border="0" align="center">  
                 <tr>
                        <?php 
                        $cont=0;
                        foreach ($acudido as $acud) { 
                        ?>
                       <td>
                                 <div class="avatar">
                                      <span class="rounded">
                                        <img height="80px" width="80px" src="../utiles/imagenes/avatarDefaul.png">
                                      </span> 
                                 </div>    
                       </td>
                       <td>
                           <div class="datos-consulta"> 
                              <?php echo $acud->getIdPersona();?></br>
                             <a href="#" onclick="consultaPersona('<?=$acud->getIdPersona()?>')"><?php echo $acud->getNombres()." ".$acud->getPApellido()." ".$acud->getSApellido();?></a></br> 
                              <?php if($acud->getSexo()=="F"){
                              $genero="Mujer";
                              }else{
                              $genero="Hombre";
                              }?>
                              <?php echo $genero;?>
                           </div>
                       </td>  
                       <?php
                       $cont=$cont+1;
                       if($cont==3){
                       echo "</tr>";
                       echo "<tr>";
                       $cont=0;
                       }
                      }
                      ?> 
                  </table> 
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
 </body>

  <?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>
</html>    
  <!-- 
 <td width="20%" align="right">
                                    <a href="#"onclick="datosAcademicos()" class="link-menu">Resultados Academicos</a>
                                </td>
                                <td width="30%" align="right">
                                    <a href="#"onclick="seguimiento()" class="link-menu">Seguimiento Academico y Disciplinario</a>
                                </td>
                                <td width="10%" align="right">
                                    <a href="#"onclick="pension()" class="link-menu">Pensión</a>
                              </td>-->