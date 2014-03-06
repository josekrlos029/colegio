<script>
function cargarSeguimientos(){
            var y = $("#respuesta");

  var $this = $( this ),
        theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
        msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
        textonly = !!$this.jqmData( "textonly" ),
        html =  "";
    $.mobile.loading( "show", {
            text: "Cargando",
            textVisible: true,
            theme: theme,
            textonly: textonly,
            html: html
    });
    var idPersona= document.getElementById("idPersona").value;
   var tipo =  $("#tipo").val();
  if (tipo ==""){
        y.html ( "<p>Error: Un Tipo de Seguimiento Valido</p>");
          }else{
      
             var url="http://controlacademico.liceogalois.com/estudiante/cargarSeguimientos";
        var data="tipo="+tipo+"&idPersona="+idPersona;
        envioJson(url,data,function respuesta(res){               
            if (res==1){
             y.html ( "<p>Error Al cargar Seguimiento</p>");
$.mobile.loading( "hide");
        
            }else{
               y.html(res);
               $.mobile.loading( "hide");
            }
            
         });  
    }
}
</script> 
<div id="mensaje" hidden> </div>
<table aling="center" width="100%"  border="0">
       <tr>
           <td align="right" class="color-text-azul" colspan="3"><h3>SEGUIMIENTO ACADEMICO Y DISCIPLINARIO</h3></td>    
       </tr>
        <tr>
           <td colspan="2"><hr></td>
       </tr> 
       </table>
  <table aling="center">
       <tr>
       <td align="right">TIPO DE SEGUIMIENTO:</td>
       <td align="left"><select id="tipo" onchange="cargarSeguimientos()" class="box-text">
                                            <option></option>
                                            <option>ACADEMICO</option>
                                            <option>DISCIPLINARIO</option>                       
                                      </select></td>
       </tr>    
   </table>
<input id="idPersona" type="hidden" value="<?php echo $idPersona; ?>" /> 
<div style="margin: 0 auto;" id="respuesta"></div>