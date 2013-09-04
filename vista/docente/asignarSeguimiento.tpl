<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
 <title><?php echo $titulo; ?></title>
 <script>
function asignar(){

    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'

}
function cargarSalon(){

var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
  var y = $("#tabla");
 var idSalon = document.getElementById("salon");


    if (idSalon.value==""){
      x.html ( "<p>Error: Escoger Salón</p>");
      error(); 
      ocultar();
    }else{

        var url="/colegio/docente/consultaSalon";
        var data="idSalon="+idSalon.value;

        envioJson(url,data,function respuesta(res){   
            if (res == "1"){
                x.html ("<p>Error: No se pudo cargar los datos del salón</p>");
                error(); 
                ocultar();
            }else{
                y.html(res);
                x.hide();
            }
            
         });
    }
}

function envio(){ 
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 var fecha = document.getElementById("fecha");
 var msj = document.getElementById("msj");
  var tipo = document.getElementById("tipo");
  var idPersona =$("input[name=select]:checked").val();
    if (msj.value=="" || tipo.value==""){
      x.html ( "<p>Error: Tiene Campos Vacios</p>");
      error();
      ocultar();
    }else{
        var url="/colegio/docente/guardarSeguimiento/";
        var data="idPersona="+idPersona+"&fecha="+fecha.value+"&msj="+msj.value+"&tipo="+tipo.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                window.alert("Seguimiento Guardado Correctamente");
                exito();
                ocultar();
                $("#light").hide();
                $("#fade").hide();
                $("#msj").val("");
            }else{
                window.alert("Error al guardar, Por favor intente mas tarde");
            }
         });
    }   
}
</script>
 </head>
 
 <body>
   
        <?php include HOME . DS . 'includes' . DS . 'headerDocente.php'; ?>
   
     
          <!------------------------------cabecera--------------------------->  
          <p>&nbsp;</p>
            </br>
           <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="red">
                    
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="0">
                         <tr>  
                            <td align="right">   
                                <h1>Asignar Seguimientos Acedemicos y Disciplinarios</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                    
                </div>
        </div> 
        <p>&nbsp;</p>
                      
     <!--------------------------------------------------------------------> 
     <div class="contenedor" style="width: 80%; margin: 0 auto;" aling="center">
         </br>  </br>
        <table aling="center" width="100%"  border="0">
       <tr>
           <td align="right" class="color-text-rojo" colspan="3"><h3>Ingreso De Seguimiento</h3></td>    
       </tr>
        <tr>
           <td colspan="3" aling="center" class="color-text-gris"><h2>Ubicacion:</h2></td>
       </tr> 
        <tr>
           <td colspan="3"><hr></td>
       </tr> 
       <tr>
             <td class="color-text-rojo" >Salon:</td>
           <td><select name="salon" class="box-text" id="salon" required focus>
                        <option></option>
                        <?php foreach($salones as $salon) { ?>
                        <option><?php  echo $salon; ?></option>
                        <?php } ?>
               </select>
           </td>
            <td width="70%" align="left">
               <input name="ingresoSeguimiento" id="ingresoSeguimiento" type="submit" value="Siguiente" class="button large red" onclick="cargarSalon()" />  
           </td>
       </tr>  
      </table>
    </br>
    <table>
       <tr>
          
       </tr>   
   </table>    
      
     </br>
     
      <div  id="tabla" align="left" >
          
      </div>
     
     
     </div>
      <div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <div style="float:right">
      <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
 </div>
     <div style="margin: 0 auto;" id="tablaConsulta">
         <h1 style="margin-left: 430px">Asignar Seguimiento</h1>
          <table border="0" style="margin: 0 auto; width: 50%;" >
              <tr>
                  <td><b id="estudiante"></b></td>
              </tr>
              <tr>
                  <td><b>Fecha</b></td>
              </tr>
              <tr>
                  <td><input id="fecha" type="date" class="box-text" /></td>
              </tr>
              <tr>
                  <td><b>Seguimiento</b></td>
              </tr>
              <tr>
                  <td><textarea id="msj" cols="40" rows="9" class="box-text"></textarea></td>
              </tr>
              <tr>
                  <td><b>Tipo</b></td>
              </tr>
              <tr>
                  <td><select id="tipo" class="box-text"><option></option><option>ACADEMICO</option><option>DISCIPLINARIO</option></select></td>
              </tr>
              
          </table>
         <table border="0" style="margin: 0 auto; width: 50%;" >
         <tr>    
                      <td><input name="guardarSeguimiento" id="guardarSeguimiento" type="submit" value="Guardar" class="button large red" onclick="envio()" /></td>
              </tr>
              </table>
      </div>
</div>
           
     

</body>
</html>