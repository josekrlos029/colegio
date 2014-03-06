<script type="text/javascript">

function leerEstudiantes(idSalon){
 var x = $("#mensaje");

 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
var y= $("#tablaEstudiantes"); 
 var url="/colegio/administrador/generarPension";
 var anio = $("#años").val();
    var data="idSalon="+idSalon+"&anio="+anio;
 envioJson2(url,data,function respuesta(res){   
    x.hide();            
    y.html (res);
         });
       
}

function ocultarTabla(){
$("#tablaConsulta").hide();
}

function recorrer(){

var arreglo = new Array();
  var i = 0;
   var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
            $("#tabla .recorrer").each(function (index) {
                var idPersona, nombres, matricula, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, vr;
                
                 $(this).children("td").each(function (index2) {
                     switch (index2) {
                         case 0:
                             idPersona = $(this).text();
                             break;
                         case 1:
                             nombres = $(this).text();
                         break;
                         
                        case 2:
                           matricula = $(this).children("input").val();
                            break;
                       case 3:
                           febrero = $(this).children("input").val();
                            break;
                            case 4:
                           marzo = $(this).children("input").val();
                            break;
                            case 5:
                           abril = $(this).children("input").val();
                            break;
                            case 6:
                           mayo = $(this).children("input").val();
                            break;
                            case 7:
                           junio = $(this).children("input").val();
                            break;
                            case 8:
                           julio = $(this).children("input").val();
                            break;
                            case 9:
                           agosto = $(this).children("input").val();
                            break;
                            case 10:
                           septiembre = $(this).children("input").val();
                            break;
                            case 11:
                           octubre = $(this).children("input").val();
                            break;
                            case 12:
                           noviembre = $(this).children("input").val();
                            break;
                             case 13:
                           vr = $(this).children("input").val();
                            break;
                            
                    }
                $(this).css("background-color", "#ECF8E0");
                });
               arreglo[i] = new Array(idPersona, matricula, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, vr); 
               i++;
            });
            
            var pensiones = JSON.encode(arreglo);
            var idSalon = document.getElementById("idSalon").value;
            var anio = $("#años").val();
            var url="/colegio/administrador/guardarPensiones";
            
        var data="pensiones="+pensiones+"&idSalon="+idSalon+"&anio="+anio;
        envioJson(url,data,function respuesta(res){               
            if (res==1){
            x.html("Pensiones Actualizadas Correctamente");
            exito();
            ocultar();
            }
            
         });  
}
</script>
 
                
                <table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
           <tr>
               <td align="center" class="color-text-gris" colspan="11"><h1>Estudiantes Secundaria</h1></td>
           </tr>
           </table>
                  <div style="margin-left:  5%; margin-top: 2%; width:15%;"><table width="100%"><tr><td>AÑO:</td><td><select class="box-text" id="años" onchange="ocultarTabla()">
                  <?php $fecha = getdate();
                $anio=$fecha["year"];?>
<option><?php echo $anio; ?></option>
<?php
 foreach ($anios as $anio) { ?>    
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