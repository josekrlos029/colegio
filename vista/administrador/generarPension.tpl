<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla" id="tabla">                     
     <tr><td align="center" class="color-text-gris" colspan="11"><h1><?php echo 'Salon: '.$idSalon; ?></h1></td></tr>
     <tr class="modo1">
         <td>ID</td>
         <td>Nombres</td>
         <?php
              foreach ($pagos as $pag){
         ?>               
         <td width="6%"><?php echo $pag;?></td>
         <?php
              }
         ?>
      </tr>
         <?php  
              foreach ($personas as $per){
         ?>   
      <tr class="recorrer" onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)"> <td><?php echo $per->getIdPersona();?></td><td><?php echo $per->getPApellido().' '.$per->getSApellido().' '.$per->getNombres();?></td>
              <?php
              $pago = new Pago();
              $pens = $pago->leerPensionesPorIdPersonaYAnio($per->getIdPersona(),$anio);
                  
               foreach ($pagos as $pag){
                
                    $band = 0;
                    if ($pens == NULL){
                    ?>
                        <td  align="center" ><input style="width:50px;" type="text" value=""/></td>
                    <?php    
                    }else{
                        foreach ($pens as $pen){
                    
                          if ($pen->getMes()==$pag){
                    ?>      
                    <td align="center" ><input style="width:50px;" type="text" title="<?php echo $pen->getFecha(); ?>" value="<?php echo $pen->getValor();?>"/></td>';
                        <?php      
                            $band = 1;                         
                              
                          }
                         
                      }
                      
                          if($band ==0 ){
                         ?>
                          
                             <td  align="center" ><input style="width:50px;" type="text" value=""/></td>
                          <?php
                          }
                }
              }
              ?>
              </tr>
              <?php
             }
             ?>
               </table>
<input type="hidden" id="idSalon" value="<?php echo $idSalon; ?>" />
<button id="btnRecorrer" onclick="recorrer()"class="button large green" style="margin-left:5%">Guardar</button>