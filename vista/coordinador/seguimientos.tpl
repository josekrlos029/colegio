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
 var idSalon = document.getElementById("idSalon");


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
    <div id="mensaje" hidden> </div>
<div style="margin: 0 auto;" id="tablaConsulta">
         <h1 style="margin-left: 235px">Escoger el Salon:</h1>
          <table border="0" style="margin: 0 auto; width: 50%;" >
              <tr>
                  <td><b>Salón</b></td>
              </tr>
              <tr>
                  <td><select id="idSalon" class="box-text">
                          <?php foreach ($salones as $salon) { ?>    
                          <option><?php echo $salon->getIdSalon();?></option>
                          <?php } ?>
                      </select></td>
                      <td><input name="imprimirCurso" id="imprimirCurso" type="submit" value="Siguiente" class="button large green" onclick="cargarSalon()" /></td>
              </tr>
          </table>
</div>

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
           
