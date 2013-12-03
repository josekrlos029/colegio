<script type="text/javascript">
function consultaPersona(idPersona){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

var y= $("#tablaConsulta"); 
var url="/colegio/administrador/consultaGeneralPersona";
var data="idPersona="+idPersona;
 envioJson2(url,data,function respuesta(res){   
   x.hide();            
    y.html (res);
    
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'
});
 
      
}

function leerEstudiantes(idSalon){
 var x = $("#mensaje");
 if ($("#periodo").val() != "----"){
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
var y= $("#tablaEstudiantes"); 
 var url="/colegio/administrador/generarConsolidado";
 var periodo = document.getElementById("periodo").value;
    var data="idSalon="+idSalon+"&periodo="+periodo;
 envioJson2(url,data,function respuesta(res){   
    x.hide();            
    y.html (res);
         });
  }       
}
function vistaActualizarPersona(idPersona){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

var y= $("#tablaConsulta"); 
var url="/colegio/administrador/actualizarGeneralPersona";
var data="idPersona="+idPersona;
 envioJson(url,data,function respuesta(res){   
   x.hide();            
    y.html (res);
    
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'
});
 
      
}

function actualizarPersona(){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

 var idPersona = document.getElementById("idPersona");
 var nombres = document.getElementById("nombres");
 var pApellido = document.getElementById("pApellido");
 var sApellido = document.getElementById("sApellido");
 var sexo = document.getElementById("sexo");
 var telefono = document.getElementById("telefono");
 var direccion = document.getElementById("direccion");
 var correo = document.getElementById("correo");
 var fNacimiento = document.getElementById("fNacimiento");
 var Estado = document.getElementById("estado");
 
 

    if (idPersona.value=="" || nombres.value=="" || pApellido.value=="" || sApellido.value=="" || fNacimiento.value=="" || Estado.value==""){
    
    x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
      error();
      ocultar();
    }else{
        var url="/colegio/administrador/actualizaPersonas/";
        var data="idPersona="+idPersona.value+"&nombres="+nombres.value+"&pApellido="+pApellido.value+"&sApellido="+sApellido.value+"&sexo="+sexo.value+"&telefono="+telefono.value+"&direccion="+direccion.value+"&correo="+correo.value+"&fNacimiento="+fNacimiento.value+"&Estado="+Estado.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Estudiante Actualizado Correctamente</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/gestionarDocentes";
            }else{
                x.html ( "<p>"+res+"</p>");
                idMateria.value="";
                idGrado.setAttribute("autofocus","true");
                nombre.value="";
                error();
                ocultar();
                
                
            }
         });
    }   
}
</script>
  
                
                <table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
           <tr>
               <td align="center" class="color-text-gris" colspan="11"><h1>Estudiantes Primaria</h1></td>
           </tr>
           </table>
                   <p>&nbsp;</p>
                  <div style="margin-left: 5%">
                  <table width="30%">
                          <tr>
                          <td>Seleccione Periodo:</td>
                          <td><select id="periodo" class="box-text">
                          <option>----</option>
                          <option>PRIMERO</option>
                          <option>SEGUNDO</option>
                          <option>TERCERO</option>
                          <option>CUARTO</option>
                          <option>FINAL</option>
                          </select></td>
                          </tr>
                      </table>
                  </div>    
                
                <p>&nbsp;</p>
             <div  id="menu">   
                  <?php foreach ($primaria as $salon) { ?>    
                   <li><a href="#" onClick="leerEstudiantes('<?=$salon->getIdSalon()?>')"><?php echo $salon->getIdSalon();?></a></li>
                  <?php } ?>
              </div>   
                  <div>   
                  
                <div id="tablaEstudiantes" style="width: 100%">
               <h1  style='margin-left:5%'>Seleccione un Salon...</h1>
               </div>
               
              
<div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <div style="float:right">
      <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
 </div>
      <div id="tablaConsulta">
     
      </div>

</div>