<table width="80%" align="center" 
       border="0" >
        <tr>
            <td><input name="pagos" id="pagos" type="submit" value="Antiguos Pagos" class="button large red" onclick="pagosAntiguos('<?php echo $estudiante->getIdPersona();?>')" /></td>
       </tr>
</table>
<?php 
    foreach ($roles  as $ro) {
          if ($ro->getIdRol() == 'E'){
          ?>
          <div style=" postion:relative; float: left; width:50%; ">
               <table class="tabla" width="100%" border="0" cellspacing="0" cellpadding="2"> 
                <tr class="modo1">
                    <td>Nombres:</td>
                    <td>Primer Apellido:</td>
                    <td>Segundo Apellido:</td>
                    <td>Rol:</td>
                 </tr>

                 <tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                    <td><?php echo $estudiante->getNombres();?></td>
                    <td><?php echo $estudiante->getPApellido();?></td>
                    <td><?php echo $estudiante->getSApellido();?></td>
                    <td><?php echo $ro->getNombre();?></td>
                 </tr>
                                        
               </table>
              </div> 
                              
              <div style='postion:relative; float:left; margin-left:20px; padding-left:10px; border-left:4px solid #666;'>
                   <table align='center'>
                      <tr>
                         <td> Concepto:</td>
                         <td colspan='2' align='center'>
                             <select id='concepto' class='box-text' onchange='mostrarConcepto()'>
                                <option>---</option>
                                <option>PENSION</option>
                                <option>CONSTANCIA</option>
                                <option>CERTIFICADO</option>
                                <option>MATRICULA</option>
                                <option>DERECHO A GRADO</option>
                                <option>OTROS PAGOS</option>
                              </select>
                         </td>
                      </tr>
                 </table>
             </div>
             <?php                       
                }elseif ($ro->getIdRol() == 'D'){
             ?>
                    <table class="tabla"> 
                         <tr class="modo1">
                             <td>Nombres:</td>
                             <td>Primer Apellido:</td>
                             <td>Segundo Apellido:</td>
                             <td>Rol:</td>
                          </tr>
                                        
                          <tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                             <td><?php echo $estudiante->getNombres();?></td>
                             <td><?php echo $estudiante->getPApellido();?></td>
                             <td><?php echo $estudiante->getSApellido();?></td>
                             <td><?php echo $ro->getNombre();?></td>
                          </tr>
                                        
                    </table> 
                    <p>&nbsp;</p>           
                    <table align='center'>
                     <tr>
                        <td> Concepto: </td>
                        <td colspan='2' align='center'>
                        <select id='concepto' onchange='mostrarConcepto()'>
                            <option>---</option>
                            <option>SEGURO</option>
                            
                        </select>
                        </td>
                     </tr>
                    </table><p>&nbsp;</p> 
                    <?php
                    }
                    }
                    ?>
                        
                
                