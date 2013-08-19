<div id="mensaje" hidden> </div>
<div style="margin: 0 auto;">
    <table aling="center" width="100%"  border="0">
       <tr>
           <td align="right" class="color-text-azul" colspan="3"><h3>PENSION</h3></td>    
       </tr>
        <tr>
           <td colspan="2"><hr></td>
       </tr> 
       </table>
  <table aling="centerright" width="80%"  border="0">
       <tr class="modo1" >
           <td>MES</td>
           <td>VALOR</td>
           <td>FECHA</td>
       </tr>
       <?php $array = ["FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE"]; 
            for($i=0; $i<count($array);$i++){
                foreach($pensiones as $pension){
                    if($array[$i]== $pension->getMes()){
                    ?>
                        <tr class="recorrer" id="cebra" onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                            <td><?php  echo $pension->getMes(); ?></td>
                            <td><?php  echo $pension->getValor(); ?></td>
                            <td><?php  echo $pension->getFecha(); ?></td>
                        </tr>
                    <?php
                    }
                
                }
            
            
            }
       
       ?>
       <tr>

       </tr>
   </table>    
    
 </div>