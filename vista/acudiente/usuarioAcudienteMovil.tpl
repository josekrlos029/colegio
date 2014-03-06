<div id="cargar" class="carga-pag">
    <table aling="center" width="100%"  border="0">
        <tr>
            <td align="right" class="color-text-azul" colspan="3"><h3>Acudidos</h3><hr></td>    
        </tr>
    </table>  

     <table border="0" align="center">  
        
               <?php 
               $cont=0;
               foreach ($acudido as $acud) { 
               $idPersona=$acud->getIdPersona();
               $ruta = 'http://controlacademico.liceogalois.com/utiles/imagenes/fotos/';
               if (file_exists($ruta.$idPersona.'.jpg')) {
                   $img= '<img height="90px" width="90px" src="http://controlacademico.liceogalois.com/utiles/imagenes/fotos/'.$idPersona.'.jpg">';
               }elseif (file_exists($ruta.$idPersona.'.png')) {
                   $img= '<img height="90px" width="90px" src="http://controlacademico.liceogalois.com/utiles/imagenes/fotos/'.$idPersona.'.png">';
               }elseif (file_exists($ruta.$idPersona.'.jpeg')) {
                   $img= '<img height="90px" width="90px" src="http://controlacademico.liceogalois.com/utiles/imagenes/fotos/'.$idPersona.'.jpeg">';
               }else{
                   $img= '<img height="90px" width="90px" src="http://controlacademico.liceogalois.com/utiles/imagenes/avatarDefaul.png">';
               }
               ?>
              <tr>
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
              </tr>
              <?php
             }
             ?> 
         </table> 
                           </div>