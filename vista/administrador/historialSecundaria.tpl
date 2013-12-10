<script type="text/javascript">

function leerEstudiantes(idSalon){
 var x = $("#mensaje");

 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
var y= $("#tablaEstudiantes"); 
 var url="/colegio/administrador/generarHistorial";
 var anio = $("#años").val();
    var data="idSalon="+idSalon+"&anio="+anio;
 envioJson2(url,data,function respuesta(res){   
    x.hide();            
    y.html(res);
         });
       
}

function ocultarTabla(){
$("#tablaConsulta").hide();
}

</script>
 
                
                <table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
           <tr>
               <td align="center" class="color-text-gris" colspan="11"><h1>Estudiantes Secundaria</h1></td>
           </tr>
           </table>
                  <div style="margin-left:  5%; margin-top: 2%; width:15%;"><table width="100%"><tr><td>AÑO:</td><td><select class="box-text" id="años" onchange="ocultarTabla()">
                  <?php foreach ($anios as $anio) { ?>    
                  <option><?php echo $anio; ?></option>
                  <?php } ?>
              </select> </td></tr></table>
           </div>
                  <p>&nbsp;</p>
             <div  id="menu">   
                  <?php foreach ($secundaria as $salon) { ?>    
                   <li><a href="#" onClick="leerEstudiantes('<?=$salon->getIdSalon()?>')"><?php echo $salon->getIdSalon();?></a></li>
                  <?php } ?>
              </div>
                 
              <p>&nbsp;</p>
             
           <div id="tablaEstudiantes" style="width: 100%" >
           <h1  style='margin-left:5%'>Seleccione un Salon...</h1>
           </div>
              
<div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <div style="float:right">
      <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
 </div>
    <div id="tablaConsulta" style="width: 90%">
     
      </div>

</div>
 <p>&nbsp;</p> <p>&nbsp;</p>