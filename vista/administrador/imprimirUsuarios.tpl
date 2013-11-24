<?php
    $cont=0;
    foreach ($roles as $ro) {
       $cont++;
?>       
   <tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
        <td width="20%"><?php echo $cont;?></td>
        <td width="40%" align="center"><?php echo strtoupper($ro->getNombre());?></td>
        <td width="10%" align="center"><a href="#" onclick="eliminar('<?php echo $ro->getIdRol();?>')"><img src="../utiles/imagenes/iconos/errorCalificacion.png"/></a></td>
   </tr>
<?php                       
     }
?>
   <tr><td colspan="4" align="center"><hr></td></tr>