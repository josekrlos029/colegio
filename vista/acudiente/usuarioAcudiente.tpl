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
 envioJson2(url,data,function respuesta(res){   
   x.hide();            
    y.html (res);
    
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';
});
    
}

function foto(){
    document.getElementById('light2').style.display='block';
    document.getElementById('fade2').style.display='block';
}

 function funcionesAcademicas(){
 $('#cargar').load('/colegio/acudiente/funcionesAcademicas');           
}
 function notificaciones(){  
 $('#cargar').load('/colegio/acudiente/notificaciones');           
}
 function seguimiento(){
          
            ocultar("familia");
            ocultar("datosAcademicos");
            $('#carga').load('/colegio/acudiente/seguimiento'); 
            document.getElementById('carga').style.display="block";
            }
           function pension(idPersona){ 
            
            ocultar("familia");
            ocultar("datosAcademicos");
            $('#carga').load('/colegio/administrador/pension2/'+idPersona);
             document.getElementById('carga').style.display="block";
            }
            function ocultar(id){
            document.getElementById(id).style.display="none";
            }
            function mostrarAcademico(){
            ocultar("carga");
            ocultar("familia");
            document.getElementById('datosAcademicos').style.display="block";
            }
            function mostrarFamilia(){
            ocultar("carga");
            ocultar("datosAcademicos");
            document.getElementById('familia').style.display="block";
            }

    
          
</script>
    
                
 </script>
    <body>
	<?php include HOME . DS . 'includes' . DS . 'headerAcudiente.php'; ?>
    
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
                                    <a class="pic" href="#" onclick="foto()"><img height="24px" width="24px"  src="../utiles/imagenes/cambiar-img.png"></a>
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
                        $idPersona=$acud->getIdPersona();
                        $ruta = 'utiles/imagenes/fotos/';
                        if (file_exists($ruta.$idPersona.'.jpg')) {
                            $img= '<img height="90px" width="90px" src="../utiles/imagenes/fotos/'.$idPersona.'.jpg">';
                        }elseif (file_exists($ruta.$idPersona.'.png')) {
                            $img= '<img height="90px" width="90px" src="../utiles/imagenes/fotos/'.$idPersona.'.png">';
                        }elseif (file_exists($ruta.$idPersona.'.jpeg')) {
                            $img= '<img height="90px" width="90px" src="../utiles/imagenes/fotos/'.$idPersona.'.jpeg">';
                        }else{
                            $img= '<img height="90px" width="90px" src="../utiles/imagenes/avatarDefaul.png">';
                        }
                        ?>
                       <td>
                                 <div class="avatar">
                                      <span class="rounded">
                                        <?php echo $img; ?> 
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
        
        <div id="fade2" class="overlay"></div>
            <div id="light2" class="modal">
                <div style="float:right">
                    <a href = "javascript:void(0)" onclick = "document.getElementById('light2').style.display='none';document.getElementById('fade2').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
               </div>
                 <div style="margin:20%;"> 
                      <h1>INSERTAR IMAGEN</h1>
                      <p>Por favor Seleccion la imagen que desea para su Perfil.</br>EXTENSIONES ACEPTADAS: .jpeg .jpg .png </br> TAMAÑO MAXIMO: 4MB</p>
                      <form action="/colegio/acudiente/actualizarFoto/" method="post" enctype="multipart/form-data" name="form1">
                          <input type="file" name="foto" id="foto">
                          <input type="hidden" name="url" value="/colegio/acudiente/usuarioAcudiente">
                          <input type="submit" name="enviar" value="Enviar" class="button large blue" >
                      </form>
                  </div>

            </div>
 </body>

  <?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>
</html>    
