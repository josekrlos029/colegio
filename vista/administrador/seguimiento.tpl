<script>
function cargarSeguimientos(idPersona){
            var y = $("#respuesta");
     var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
   var tipo =  $("#tipo").val();
  if (tipo ==""){
        x.html ( "<p>Error: Un Tipo de Seguimiento Valido</p>");
        error();
        ocultar();
  }else{
      
             var url="/colegio/administrador/cargarSeguimientos";
        var data="idPersona="+idPersona+"&tipo="+tipo;
        envioJson(url,data,function respuesta(res){               
            if (res==1){
             x.html ( "<p>Error Al cargar Seguimiento</p>");
        error();
        ocultar();
            }else{
               y.html(res);
               x.hide();
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
<div style="margin: 0 auto;" id="respuesta"></div>