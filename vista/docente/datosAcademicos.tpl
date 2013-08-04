
   <table aling="right" width="100%"  border="0">
       <tr>
           <td align="right" class="color-text-rojo" colspan="3"><h3>Datos Academicos</h3></td>    
       </tr>
       <tr>
           <td class="color-text-rojo" width="10%">salones</td>
          <td class="color-text-rojo" width="50%">Materias</td>
          <td class="color-text-rojo">Horas</td>
       </tr>
        <tr>
           <td colspan="3"><hr></td>
       </tr> 
     </table>  
          <?php 
          $resultado=0;
          $cont=0;
         ?>
         <div style="padding-left:5px; overflow-x:hidden;width: 100%; height:300px;">
            <table aling="right" width="100%"  border="0">
             <?php foreach ($cargas as $carg) { ?>
             <tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
             <td width="10%"><?php echo  $carg->getIdSalon();?> </td>
             <?php  
               $materia = new Materia();
               $materias = $materia->leerMateriaPorId($carg->getIdMateria());
               foreach ($materias as $mat) { ?>
               <td width="50%"> <?php echo strtoupper($mat->getNombreMateria()); ?> </td>
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
             </table>
        </div>
         <table width="100%">
        <tr>
           <td colspan="3"><hr></td>
       </tr> 
       
       <tr>
           <td colspan="3" class="color-text-gris" align="center">
               <h2>Total Horas Semanales:<?php echo " ".$resultado;?> </h2>
           </td>
       </tr>   
   </table>    

