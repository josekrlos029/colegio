<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla" id="tabla">
    <thead>
                    <tr class="modo1">
                    <th>Identificación</th>
                    <th data-sort="string" id="apell">P.Apellido</th>
                    <th>S.Apellido</th>
                    <th>Nombres</th>
<?php
             $band =0;
            foreach ($matriculas as $mat){
                    $historial = new Historial();
                    $hist = $historial->leerHistorialPorIdPersona($anio, $mat->getIdPersona());
                    if(count($hist) > 0){
                        $persona = new Persona();
                        $per = $persona->leerPorId($mat->getIdPersona());
                        if($band==0){
                            foreach ($hist as $h){
                                $materia = new Materia();
                                $mate = $materia->leerMateriaPorId($h->getIdMateria());
                                foreach ($mate as $mm){ ?>
                                     <th><?php echo $mm->getNombreMateria();?></th>
                              <?php  }   
                            }?>
                            </tr>
                            </thead>
                            <?php
                            $band = 1;
                        }
                        if($per!=NULL  && count($hist)>0){ ?>
                        <tbody>
                            <tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)"><td><?php echo $per->getIdPersona();?></td>
                                <td><?php echo $per->getPApellido();?></td>
                                <td><?php echo $per->getSApellido();?></td>
                                <td><?php echo $per->getNombres();?></td>
                         <?php      foreach ($hist as $hh){ ?>
                                <td><?php echo $hh->getDefinitiva();?></td>
                           <?php } ?>
                            </tr>
                            </tbody>
            <?php            } ?>
                        
           <?php         }
            }?>
            </table>
<table>
    <button class="button large red" onclick="imprimirInforme('<?php echo $anio;?>','<?php echo $idSalon;?>')">Imprimir Informe General</button>
    <button class="button large red" onclick="imprimirInformeIndividual('<?php echo $anio;?>','<?php echo $idSalon;?>')">Imprimir Informe Individual</button>
</table>
<script>
    $("#tabla").stupidtable();
    $("#apell").click();
</script>