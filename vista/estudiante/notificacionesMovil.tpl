<script type="text/javascript">
function consulta(id){
 var $this = $( this ),
        theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
        msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
        textVisible = $this.jqmData( "textvisible" ) || $.mobile.loader.prototype.options.textVisible,
        textonly = !!$this.jqmData( "textonly" ),
        html = $this.jqmData( "html" ) || "";
    $.mobile.loading( "show", {
            text: msgText,
            textVisible: textVisible,
            theme: theme,
            textonly: textonly,
            html: html
    });
var y= $("#tablaConsulta"); 
//var url="/colegio/administrador/consultaNotificacion";
var url="http://controlacademico.liceogalois.com/administrador/consultaNotificacion";
var data="id="+id;
 envioJson2(url,data,function respuesta(res){   
         
    y.html (res);
    
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';
     $.mobile.loading( "hide" );                       

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
 
        <table class="table tBlue" width="98%" border="0" cellspacing="0" style="font-size: 11px" cellpadding="2" align="center">
         
        
                <tr class="modo1">
                    <td>Asunto</td>
                    <td>Fecha</td>
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
                    <?php
                    if($hoy > strtotime($not->getFecha_evento())){ ?>
                    <td><div style="color:#fe2b35; font-weight: bold;">TERMINADO</div></td>
                 <?php }else{ ?>
                 <td><div style="color:#00d73d; font-weight: bold;">ACTIVO</div></td>
                  <?php  }
                    
                    ?>                    
                  <td align="center"><a href="#" onclick="consulta  ('<?=$not->getId()?>')"><img src="../imagenes/iconos/consultarPersona.png"/></a></td>
                  
                </tr>
                <?php } ?>
           
    </table>    
<div id="fade" class="overlay"></div>
            <div id="light" class="modal">
                <div style="float:right">
                    <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../imagenes/iconos/close.png"/></a>
               </div>
                  <div id="tablaConsulta">

                  </div>

            </div>