<script>
function asignar(){

    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'
    
}
function cargarSalon(){

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
                $.mobile.loading( "hide" );  
            }else{
                y.html(res);
                $("table#tabla").css("width","100%");
                $.mobile.loading( "hide" );  
            }
            
         });
    }
}

function envio(){ 
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
                 $.mobile.loading( "hide");
                $.mobile.loading( "show", {
                        text: "Cargado Correctamente",
                        textVisible: true,
                        theme: theme,
                        textonly: false,
                        html: '<img src="../imagenes/iconos/exito.png" width="40" height="40" style="float:left" /> <h3 style="float:left; padding-left:40px;">Listo !</h3>'
                });
                setTimeout('$.mobile.loading( "hide");',3000);
                $("#light").hide();
                $("#fade").hide();
                $("#msj").val("");
            }else{
                $.mobile.loading( "hide");
                $.mobile.loading( "show", {
                        text: "Cargado Correctamente",
                        textVisible: true,
                        theme: theme,
                        textonly: false,
                        html: '<img src="../imagenes/iconos/error.png" width="40" height="40" style="float:left" /> <h3 style="float:left; padding-left:40px;">Listo !</h3>'
                });
                setTimeout('$.mobile.loading( "hide");',3000);
            
            }
         });
    }   
}
</script>
                     <div class="color-text-blanco" id="title-cab">
                        <table width="98%" align="center" border="0" cellspacing="0" cellpadding="0">
                         <tr>  
                            <td align="left">   
                                <h1 style="font-size: 20px;">Asignar Seguimientos Acedemicos y Disciplinarios</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                      
     <!--------------------------------------------------------------------> 
     <div class="contenedor" style="width: 98%; margin: 0 auto;" aling="center">
         </br>
        <table style="font-size: 12px" aling="center" width="100%"  border="0">
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
               <input style="font-size: 12px"  name="ingresoSeguimiento" id="ingresoSeguimiento" type="submit" value="Siguiente" class="botonRed" onclick="cargarSalon()" />  
           </td>
       </tr>  
      </table>
    </br>
    <table>
       <tr>
          
       </tr>   
   </table>    
      
     </br>
     
     <div style="font-size: 12px" class="table"  id="tabla" align="left" >
          
      </div>
     </br>
     
     </div>
      <div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <div style="float:right">
      <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../imagenes/iconos/close.png"/></a>
 </div>
     <div style="margin: 0 auto;" id="tablaConsulta">
         <h1 style="font-size: 20px;">Asignar Seguimiento</h1>
          <table border="0" style="margin: 0 auto; width: 50%;" >
              <tr>
                  <td align="center"><b id="estudiante"></b></td>
              </tr>
              <tr>
                  <td align="center"><b>Fecha</b></td>
              </tr>
              <tr>
                  <td align="center"><input id="fecha" type="date" class="box-text" /></td>
              </tr>
              <tr>
                  <td align="center"><b>Seguimiento</b></td>
              </tr>
              <tr>
                  <td align="center"><textarea id="msj" cols="30" rows="9" class="box-text"></textarea></td>
              </tr>
              <tr>
                  <td align="center"><b>Tipo</b></td>
              </tr>
              <tr>
                  <td align="center"><select id="tipo" class="box-text"><option></option><option>ACADEMICO</option><option>DISCIPLINARIO</option></select></td>
              </tr>
              
          </table>
         <table border="0" style="margin: 0 auto; width: 50%;" >
         <tr>    
                      <td align="center"><input name="guardarSeguimiento" id="guardarSeguimiento" type="submit" value="Guardar" class="botonRed" onclick="envio()" /></td>
              </tr>
              </table>
      </div>
</div>