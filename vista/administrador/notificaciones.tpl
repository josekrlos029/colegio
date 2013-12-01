<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
        <title><?php echo $titulo; ?></title>
 

<script type="text/javascript">
function envio(){ 
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
  
 var destino= 0;
 var asunto= document.getElementById("asunto");
 var mensaje = document.getElementById("msj");
 var fecha = document.getElementById("fecha");
 var hora = document.getElementById("hora");
 var estudiante = document.getElementById("est").checked ;
 var docente = document.getElementById("doc").checked ;
 
if(estudiante == true && docente == false){
destino= 1;
}else if(estudiante == false && docente == true){
destino =2;
}else if(estudiante == true && docente == true){
destino = 3;
}

    if (asunto.value == "" || mensaje.value == "" || fecha.value == "" || hora.value == "" || destino == 0  ){
      x.html ( "<p>Error: Tiene Campos Vacios</p>");
      error();
      ocultar();
    }else{
        var url="/colegio/administrador/registrarNotificacion";
        var data="asunto="+asunto.value+
                 "&mensaje="+mensaje.value+
                "&hora="+hora.value+
                "&fecha="+fecha.value+
                "&destino="+destino;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Mensaje Difundido Correctamente</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/notificaciones";
            }else{
                x.html ( "<p>"+res+"</p>");
                ocultar();
            }
         });
    }
   
}
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
function eliminar(id){

 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
var y= $("#tablaConsulta"); 
var url="/colegio/administrador/eliminarNotificacion";
var data="id="+id;
 envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Mensaje Eliminado Correctamente</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/notificaciones";
            }else{
                x.html ( "<p>"+res+"</p>");
                ocultar();
            }
         });
 
      
}

</script>

    </head>
    <body>

        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>

       <!------------------------------cabecera--------------------------->  
        <p>&nbsp;</p>
            </br>
           <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="green">
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Gestion De Materias</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                      
                         
     <!--------------------------------------------------------------------> 
       
        
            <table width="40%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td></td>
                  <td align="left" class="color-text-gris"><h1>Difundir Mensaje</h1></td>
              </tr>
                <tr>
                    <td align="right" width="40%">Asunto:</td>
                    <td ><input name="asunto" id="asunto" type="text" class="box-text" required /></td>
                </tr>
                <tr>
                </tr>    
                <tr>
                    <td align="right">Mensaje:</td>
                    <td align="left"><textarea id="msj" name="msj" placeholder="Ingrese Mensaje.." rows="4" cols="60" class="box-text" ></textarea></td>
                </tr>
                <tr>
                    <td align="right">Fecha:</td>
                    <td><input name="fecha" id="fecha" type="date"  class="box-text" required/></td>
                </tr>
                <tr>
                    <td align="right">Hora:</td>
                    <td><input name="hora" id="hora" type="time"   class="box-text" required/></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Destino:</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type = "checkbox" id = "est"  />Estudiantes y Acudientes</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type = "checkbox" id = "doc"  />Docentes</td>
                </tr>
                <td></td>
                <td><input name="registrarNotificacion" id="registrarNotificacion" type="submit" value="Difundir" class="button large green"  onclick="envio()"/></td>
                
                </tr>
            </table>
     
      <p>&nbsp;</p>
     <hr>
     <p>&nbsp;</p>
   
        <table width="80%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
           <tr>
               <td align="center" class="color-text-gris" colspan="7"><h1>Notificaciones registradas</h1></td>
           </tr>
         
         
                <tr class="modo1">
                    <td>Asunto</td>
                    <td>Fecha del Evento</td>
                    <td>Hora</td>
                    <td>Destino</td>
                    <td>Fecha de Registro</td>
                    <td>Estado</td>
                    <td>Consultar</td>
                    <td>Eliminar</td>
                </tr>
              
        
  <?php $fecha = getdate();
   $hoy=strtotime($fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"]);
   ?>
        
                <?php foreach ($noti as $not) { ?>
                <tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                    <td ><?php echo $not->getAsunto();?></td>
                    <td><?php echo $not->getFecha_evento();?></td>
                    <td><?php echo $not->getHora();?></td>
                    <?php 
                    if( $not->getDestino()== 1){
                    $destino= "ESTUDIANTES Y ACUDIENTES";
                    }
                    if($not->getDestino() == 2){
                    $destino = "DOCENTES";
                    }
                    if($not->getDestino()== 3){
                    $destino = "ESTUDIANTE Y DOCENTES";
                    }
                     ?>
                    <td><?php echo $destino?></td>
                    <td><?php echo $not->getFecha_Ingreso();?></td>
                    <?php
                    if($hoy > strtotime($not->getFecha_evento())){ ?>
                    <td><div style="color:#fe2b35; font-weight: bold;">TERMINADO</div></td>
                 <?php }else{ ?>
                 <td><div style="color:#00d73d; font-weight: bold;">EN ESPERA..</div></td>
                  <?php  }
                    
                    ?>                    
                  <td align="center"><a href="#" onclick="consulta  ('<?=$not->getId()?>')"><img src="../utiles/imagenes/iconos/consultarPersona.png"/></a></td>
                    <td align="center"><a href="#" onclick="eliminar('<?=$not->getId()?>')"><img src="../utiles/imagenes/iconos/errorCalificacion.png"/></a></td> 
                </tr>
                <?php } ?>
           
    </table>
      
<div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <div style="float:right">
      <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
 </div>
      <div id="tablaConsulta">
     
      </div>

</div>
    </body>
</html>

   
            
       