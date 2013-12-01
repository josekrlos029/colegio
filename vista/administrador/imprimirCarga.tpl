<?php
$cont=0;
$total=0;
foreach ($cargas as $carg) {
?>
    <tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
        <td width="20%" align="center"><?php echo  strtoupper($carg->getIdSalon());?></td>
        <?php
                      $materia = new Materia();
                      $materias = $materia->leerMateriaPorId($carg->getIdMateria());
                         foreach ($materias as $mat) {
        ?>
                            <td width="40%"><?php echo  strtoupper($mat->getNombreMateria());?></td>
                            <td width="10%" align="center"><?php echo  strtoupper($mat->getHoras());?></td>
        <?php
                            $cont=($mat->getHoras());
                            $total=$total+$cont;   
                         }
        ?>                 
                         
                         <td width="20%" align="center">
                            <a href="#" onclick="eliminar('<?php echo $carg->getIdSalon();?>','<?php echo $carg->getIdMateria();?>')"><img src="../utiles/imagenes/iconos/errorCalificacion.png"/></a>
                        </td>
    </tr>
    <?php                  
                  }
    ?>              
    <tr><td colspan="4" align="center"><hr></td></tr>
    <tr>
        <td colspan="4" align="center" class="color-text-gris"><h2>Total Horas Semanales:<?php echo  $total;?></h2></td>
    </tr>