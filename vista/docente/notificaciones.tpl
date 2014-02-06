<script type="text/javascript">
function consulta(id){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
var y= $("#tablaConsulta"); 
var url="/colegio/administrador/consultaNotificacion";
var data="id="+id;
 envioJson2(url,data,function respuesta(res){   
   x.hide();            
    y.html (res);
    
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'
});
 
      
}
 </script>
   <table aling="center" width="100%"  border="0">
       <tr>
           <td align="right" class="color-text-azul" colspan="3"><h3>Notificaciones</h3></td>    
       </tr>
        <tr>
           <td colspan="2"><hr></td>
       </tr> 
       </table>
 
        <table width="100%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
         
        
                <tr class="modo1">
                    <td>Asunto</td>
                    <td>Fecha del Evento</td>
                    <td>Hora</td>
                    <td>Fecha de Registro</td>
                    <td>Estado</td>
                    <td>Consultar</td>
             
                </tr>
              
        
  <?php $fecha = getdate();
   $hoy=strtotime($fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"]);
   ?>
        
                <?php foreach ($noti as $not) { ?>
                <tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                    <td ><?php echo $not->getAsunto();?></td>
                    <td><?php echo $not->getFecha_evento();?></td>
                    <td><?php echo $not->getHora();?></td>
                    <td><?php echo $not->getFecha_Ingreso();?></td>
                    <?php
                    if($hoy > strtotime($not->getFecha_evento())){ ?>
                    <td><div style="color:#fe2b35; font-weight: bold;">TERMINADO</div></td>
                 <?php }else{ ?>
                 <td><div style="color:#00d73d; font-weight: bold;">EN ESPERA..</div></td>
                  <?php  }
                    
                    ?>                    
                  <td align="center"><a href="#" onclick="consulta  ('<?=$not->getId()?>')"><img src="../utiles/imagenes/iconos/consultarPersona.png"/></a></td>
                  
                </tr>
                <?php } ?>
           
    </table>    