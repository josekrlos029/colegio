<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">                     
    <tr><td align="center" class="color-text-gris" colspan="11"><h1>Salon:<?php echo $idSalon;?></h1></td></tr>
    <tr class="modo1">
        <td>N°</td>
        <td>Nombres</td>
<?php
      $notaa = new Nota();
      $proms= array();
              
      foreach ($vec as $v){
            $mat = new Materia();
            $materia = $mat->leerMateriaPorId($v);
            $notas1=$notaa->leerPorMateria($idSalon, $v);
            $suma=0;
                        
            foreach ($notas1 as $n1){
                if($periodo == 'PRIMERO'){
                    $suma += $n1->getPrimerP(); 
                }else if($periodo == 'SEGUNDO'){
                    $suma += $n1->getSegundoP(); 
                            
                }else if($periodo == 'TERCERO'){
                    $suma += $n1->getTercerP(); 
                            
                }else if($periodo == 'CUARTO'){
                            
                    $suma += $n1->getCuartoP(); 
                }else if($periodo == 'FINAL'){
                    $suma += $n1->getDefinitiva(); 
                            
                }                           
            }
                        
            foreach ($materia as $mate){
 ?>
       <td><?php echo $mate->getNombreMateria();?></td>
 <?php      
               $proms[$mate->getNombreMateria()]= $suma / count($notas1);
            }
        }            
            //$proms = json_encode($proms);
 ?>           
    </tr>
 <?php
             $persona = new Persona();
             $personas=$persona->leerPorSalon($idSalon);
             $cont = 0;
             foreach ($personas as $per){
                $cont++;
?>                
                <tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)"> <td><?php echo $cont;?></td><td><?php echo $per->getPApellido().' '.$per->getSApellido().' '.$per->getNombres();?></td>
<?php                    
                foreach ($vec as $v){
                        $nota = new Nota();
                        $not =$nota->leerNotaEstudiante( $per->getIdPersona(), $v);
                        if($periodo == 'PRIMERO'){
 ?>                       
                            <td><?php echo $not->getPrimerP();?></td>
 <?php                       }else if($periodo == 'SEGUNDO'){ ?>  
                            <td><?php echo $not->getSegundoP();?></td>
 
 <?php                       }else if($periodo == 'TERCERO'){ ?>  
                            <td><?php echo $not->getTercerP();?></td>
                       
 <?php                       }else if($periodo == 'CUARTO'){ ?>  
                            
                            <td><?php echo $not->getCuartoP();?></td>
 <?php                       }else if($periodo == 'FINAL'){ ?>  
                            <td><?php echo $not->getDefinitiva();?></td>
 <?php                           
                        }
                            
                   }?>
              </tr>
              
 <?php        }   ?>
 </table>

         <form method="post" target="_blank" action="/colegio/administrador/imprimirConsolidado" >
             <input type="hidden" id="idSalon" name="idSalon" value="<?php echo $idSalon;?>" />
             <input type="hidden" id="periodo" name="periodo" value="<?php echo $periodo;?>" />
             <input type="submit" id="imprimir" value="Imprimir" class="button large red" />
          
        </form><a href="#"><button id="btn" onclick="vistaRendimiento()" class="button large blue">Rendimiento</button></a>
<div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <div style="float:right">
      <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
 </div>
     <div style="margin: 0 auto;" id="tablaConsulta">
         <h1 style="margin-left: 430px">Rendimiento.. Salon:</h1>
          <div id="chart2" class="example-chart" style="height:300px;width:500px"></div>
      </div>
</div>
<script>function vistaRendimiento(){

    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';
        var line1 = [['light', 4],['light', 6],['light', 2],['light', 5],['light', 6]];

    $("#chart2").jqplot([line1], {
        title:"Bar Chart with Varying Colors",
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {
                // Set the varyBarColor option to true to use different colors for each bar.
                // The default series colors are used.
                varyBarColor: true
            }
        },
        axes:{
            xaxis:{
                renderer: $.jqplot.CategoryAxisRenderer
            }
        }
    });
}</script> 