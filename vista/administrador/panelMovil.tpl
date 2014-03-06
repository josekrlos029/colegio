<div id="panel">
    <table border="0" align="center" style="font-size:13px; font-weight: bold;">  
        <tr>
            <td>
                <div class="avatar">
                   <span class="rounded">
                         <?php echo $img; ?> 
                   </span> 
                </div>
            </td>
            <td>
                <div class="datos-consulta"> 
                    <?php echo $acu->getId_acudiente();?></br>
                    <?php echo $acu->getNombre()." ".$acu->getApellido();?></br> 
  
                  </div>
             </td>
        </tr>
    </table>    
    <hr style="margin-right:3%">
    <ul id="accordion">
<li><span><h1 style="font-size:16px">ACUDIDOS</h1></span>
    <ul style="padding:0;font-size:12px"> 
    <table border="0" align="center">  
        
               <?php 
               $cont=0;
               foreach ($acudido as $acud) { 
               $idPersona=$acud->getIdPersona();
               $ruta = 'http://controlacademico.liceogalois.com/utiles/imagenes/fotos/';
               if (file_exists($ruta.$idPersona.'.jpg')) {
                   $img= '<img height="90px" width="90px" src="http://controlacademico.liceogalois.com/utiles/imagenes/fotos/'.$idPersona.'.jpg">';
               }elseif (file_exists($ruta.$idPersona.'.png')) {
                   $img= '<img height="90px" width="90px" src="http://controlacademico.liceogalois.com/utiles/imagenes/fotos/'.$idPersona.'.png">';
               }elseif (file_exists($ruta.$idPersona.'.jpeg')) {
                   $img= '<img height="90px" width="90px" src="http://controlacademico.liceogalois.com/utiles/imagenes/fotos/'.$idPersona.'.jpeg">';
               }else{
                   $img= '<img height="90px" width="90px" src="http://controlacademico.liceogalois.com/utiles/imagenes/avatarDefaul.png">';
               }
               ?>
              <tr>
              <td>
                        <div class="avatar">
                             <span class="rounded">
                               <?php echo $img; ?> 
                             </span> 
                        </div>    
              </td>
              <td>
                  <div class="datos-consulta"> 
                     <?php echo $acud->getIdPersona();?></br>
                    <a href="#" onclick="consultaPersona('<?=$acud->getIdPersona()?>')"><?php echo $acud->getNombres()." ".$acud->getPApellido()." ".$acud->getSApellido();?></a></br> 
                     <?php if($acud->getSexo()=="F"){
                     $genero="Mujer";
                     }else{
                     $genero="Hombre";
                     }?>
                     <?php echo $genero;?>
                  </div>
              </td>
              </tr>
              <?php
             }
             ?> 
         </table> 
        </ul>
    </li>
    <li><span><h1 style="font-size:16px">INFORMACION</h1></span>
<ul>
    <p>Zazzz</p>
</ul>
</li>   
 
<li><span><h1 style="font-size:16px">CONFIGURACION</h1> </span>
<ul>  
    <p>Zazzz</p>
</ul>
</li> 

</ul>    
</div>    
<script type="text/javascript">
 $("#accordion > li > span").click(function(){
 if(false == $(this).next().is(':visible')) {
 $('#accordion ul').slideUp(300);
 }
 $(this).next().slideToggle(300);
 });

</script>