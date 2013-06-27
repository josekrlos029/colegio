
   <table aling="right" width="100%"  border="0">
       <tr>
           <td align="right" class="color-text-rojo" colspan="3"><h3>Datos Academicos</h3></td>    
       </tr>
       <tr>
           <td class="color-text-rojo">salones</td>
          <td class="color-text-rojo">Materias</td>
          <td class="color-text-rojo">Horas</td>
       </tr>
        <tr>
           <td colspan="3"><hr></td>
       </tr> 
          <?php 
          $resultado=0;
          $cont=0;
          
          foreach ($cargas as $carg) { ?>
          <tr>
          <td><?php echo  $carg->getIdSalon();?> </td>
          <?php  
            $materia = new Materia();
            $materias = $materia->leerMateriaPorId($carg->getIdMateria());
            foreach ($materias as $mat) { ?>
            <td> <?php echo strtoupper($mat->getNombreMateria()); ?> </td>
            <td>
                <?php echo strtoupper($mat->getHoras()); 
                $cont=$mat->getHoras();
                $resultado=$resultado+$cont;     
                ?>
            </td>
            <?php }?>
          </tr>
          <?php } 
          
          ?>
        
        <tr>
           <td colspan="3"><hr></td>
       </tr>   
       <tr>
           <td colspan="3" class="color-text-gris" align="center">
               <h2>Total Horas Semanales:<?php echo " ".$resultado;?> </h2>
           </td>
       </tr>   
        <tr>
           <td colspan="3"><hr></td>
       </tr> 
   </table>    

