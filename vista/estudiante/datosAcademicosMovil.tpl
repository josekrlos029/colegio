<div><?php echo $tabla;?></div>
 </table> 
       </div>
      <table width="95%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
        <tr>
           <td colspan="6"><hr></td>
       </tr>
       <tr>
           <td class="color-text-azul" width="25%">PROMEDIO DE PERIODO</td>
           <td class="color-text-azul" width="15%"><?php echo $p1; ?></td>
           <td class="color-text-azul" width="15%"><?php echo $p2; ?></td>
           <td class="color-text-azul" width="15%"><?php echo $p3; ?></td>
           <td class="color-text-azul" width="15%"><?php echo $p4; ?></td>
           <?php $prom=$p1+$p2+$p3+$p4;
           $prom=$prom/4;
           ?>
           <td class="color-text-azul" width="15%"><?php echo $prom; ?></td>
       </tr>
       </table>
       <table width="95%" align="center" border="0">
       <tr>
           <td class="color-text-gris" width="30%"><h2>Promedio General: <?php echo " ". $pg; ?></h2></td>
       </tr>   
   </table>    
