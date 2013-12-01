<?php if ($html == 'table'){
            foreach ($materias as $materia) {
?>            
<tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
    <td><?php echo strtoupper($materia->getIdMateria());?></td>
    <td><?php echo strtoupper($materia->getNombreMateria());?></td>
    <td><?php echo strtoupper($materia->getHoras());?></td>
</tr>
<?php
            }
        }elseif ($html=='select') {
            
            foreach ($materias as $materia) {
?>            
             <option value="<?php echo $materia->getIdMateria();?>"><?php echo strtoupper($materia->getNombreMateria());?></option>
<?php          
            }
        }
?>        