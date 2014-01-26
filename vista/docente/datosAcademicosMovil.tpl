<table align="center">
       <tr>
           <td align="center" class="color-text-rojo" colspan="3"><h3>Datos Academicos</h3></td>    
       </tr>
</table>
<table align="center" data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke">
    <thead>
       <tr>
           <td class="color-text-rojo"><b>Salón</b></td>
          <td align="center" class="color-text-rojo" data-priority="1"><b>Materia</b></td>
          <td class="color-text-rojo" data-priority="2"><b>Horas</b></td>
       </tr>
       </thead>
       <tbody>
          <?php 
          $resultado=0;
          $cont=0;
          foreach ($cargas as $carg) { ?>
             <tr>
             <td ><?php echo  $carg->getIdSalon();?> </td>
             <?php  
               $materia = new Materia();
               $materias = $materia->leerMateriaPorId($carg->getIdMateria());
               foreach ($materias as $mat) { ?>
               <td> <?php echo strtoupper($mat->getNombreMateria()); ?> </td>
               <td align="center">
                   <?php echo strtoupper($mat->getHoras()); 
                   $cont=$mat->getHoras();
                   $resultado=$resultado+$cont;     
                   ?>
               </td>
               <?php }?>
             </tr>
             <?php } 

             ?>
             </tbody>
</table>
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