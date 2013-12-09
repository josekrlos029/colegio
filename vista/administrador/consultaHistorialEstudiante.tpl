<?php 
foreach($anios as $anio){

$matricula = new Matricula();
$matr= $matricula->leerMatriculaPorIdyAnio($idPersona,$anio);
$salon = new Salon();
$sal = $salon->leerSalonePorId($matr->getIdSalon());
$grado = new Grado();
$grad= $grado->leerGradoPorId($sal->getIdGrado());

$histo = new Historial();
$notas = $histo->leerHistorialPorIdPersona($anio,$idPersona);

?>
<div id="datosAcademicos" style="width: 60%; margin: 0 auto;" >
             <table width="100%" align="center" id="inf-Personal" >      
                                          <tr>
                                               <td>Salón :<span><?php echo $matr->getIdSalon();?></span></td>
                                                   <td>Grado :<span><?php echo $grad->getNombre();?></span></td>
                                                   <td>Jornada :<span><?php echo $matr->getJornada();?></span></td>
                                               </tr>
                                               </table></br>    
            <table aling="right" width="100%"  border="0">
            <tr>
            <td align="right" class="color-text-gris" colspan="3"><h3>Datos Academicos del Año <?php echo $anio;?></h3></td>    
            </tr>
            </table>
        
             <table width="100%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
                    <tr class="modo1">
                    <td>Materia</td>
                    <td>Nota</td>
                    </tr>
             <?php
              $cont= 0;
              $s1=0;

            foreach ($notas as $not){
                $cont++;
              ?>  
                <tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                <?php
                    $mat = new Materia();
                        $materia = $mat->leerMateriaPorId($not->getIdMateria());
                         foreach ($materia as $mate){
                 ?>        
                              <td><b> <?php echo $mate->getNombreMateria();?></b> </td>
                 <?php        
                         }
                         
                 ?>        
                         <td><?php echo $not->getDefinitiva();?></td>

                </tr>
                <?php
                $s1 +=$not->getDefinitiva();
                
            }
            
            $pg = round($s1/$cont, 2);
            ?>
            <tr>
           <td colspan="6"><hr></td>
       </tr>
       <tr>
           <td class="color-text-azul">PROMEDIO</td>
           <td class="color-text-azul"><?php echo $pg;?></td>
          </tr>
          </table>
          </br>
       <table width="95%" align="center" border="0">
       <tr>
           <td class="color-text-gris" width="30%"><h2>Promedio General : <?php echo $pg;?></h2></td>
       </tr>
       <tr>
           <td class="color-text-gris" width="30%"><button class="button large red" onclick="imprimir('<?php echo $anio;?>')">Imprimir Informe</button></td>
       </tr>
   </table>
 </div>
</br>
<?php } ?>