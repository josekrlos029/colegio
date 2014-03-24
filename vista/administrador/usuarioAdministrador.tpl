   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
    <title>Usuario Administrador</title>
    <script type="text/javascript">
    
 function estPreescolar(){    
 $('#cargar').load('/colegio/administrador/estudiantesPreescolar');           
}

 function estPrimaria(){    
 $('#cargar').load('/colegio/administrador/estudiantesPrimaria');           
}

 function estSecundaria(){    
 $('#cargar').load('/colegio/administrador/estudiantesSecundaria');           
}
 function docPreescolar(){    
 $('#cargar').load('/colegio/administrador/docentesPreescolar');           
}

 function docPrimaria(){    
 $('#cargar').load('/colegio/administrador/docentesPrimaria');           
}

 function docSecundaria(){    
 $('#cargar').load('/colegio/administrador/docentesSecundaria');           
}
  
function vistaBoletines(){

    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';

}

function envio(){ 
 
 var idSalon = document.getElementById("idSalon").value;
 var periodo = document.getElementById("periodo").value;

      window.open("/colegio/administrador/generarBoletin/"+idSalon+","+periodo)
    }
      

function consultaPersona(){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
var idPersona = document.getElementById("s").value;
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
 function seguimiento(idPersona){
           
            ocultar("familia");
            ocultar("datosAcademicos");
            $('#carga').load('/colegio/administrador/seguimiento2/'+idPersona); 
            document.getElementById('carga').style.display="block";
            }
            function pension(idPersona){ 
            
            ocultar("familia");
            ocultar("datosAcademicos");
            $('#carga').load('/colegio/administrador/pension2/'+idPersona);
             document.getElementById('carga').style.display="block";
            }
            function ocultar(id){
            document.getElementById(id).style.display="none";
            }
            function mostrarAcademico(){
            ocultar("carga");
            ocultar("familia");
            document.getElementById('datosAcademicos').style.display="block";
            }
            function mostrarFamilia(){
            ocultar("carga");
            ocultar("datosAcademicos");
            document.getElementById('familia').style.display="block";
            }
            
 function planilla(){ 
 
 var tipo = document.getElementById("tipo").value;

      window.open("/colegio/administrador/imprimirPlanillas/"+tipo);
    } 
    function directorio(){ 

      window.open("/colegio/administrador/imprimirDirectorio");
    } 
  </script>  
    
    
    
    <body>
	<?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
</br>
<table border="0" align="center" width="80%" >
  <tr>
  <td width="40%" >
  Hola Usuario <?php echo $_SESSION['idUsuario'] ?> Bienvenido(a) a tu Cuenta.</br>    
  <img src="../utiles/imagenes/tag_administrador.png"/>
  <?php include HOME . DS . 'includes' . DS . 'fecha.php'; ?>
  </td>
  <td>
  <ul>
      <div><h2>Estudiantes</h2></div>
      <li><a href="#"onclick="estPreescolar()">Consulta Preescolar</a></li>
      <li><a href="#"onclick="estPrimaria()">Consulta Primaria</a></li>
      <li><a href="#"onclick="estSecundaria()">Consulta Secundaria</a></li>
  </ul>
  </td>
  
<td>
  <ul>
  <div><h2>Docentes</h2></div>
       <li><a href="#"onclick="docPreescolar()">Consulta Preescolar</a></li>
       <li><a href="#"onclick="docPrimaria()">Consulta Primaria</a></li>
       <li><a href="#"onclick="docSecundaria()">Consulta Secundaria</a></li>
	   </ul>
</td>   

 </td>
</tr>
</table >

<hr>

<div id="cargar">
	   <table border="0" align="center" width="80%">
	   <tr>
	   <td align="right" class="color-text-gris"><h1>Gestion Administrativa</h1></td>
	   </tr>
	   </table>
          <table border="0" align="center" width="80%">
	 <tr>
           <td align="center" width="30%" colspan="3"> <div class="container-img" ><img height="240px" width="300px"  src="../utiles/imagenes/admin.jpg" /></div></td>
	   <td></td>
	   <td align="center" width="30%" colspan="3"> <div class="container-img"><img height="240px" width="300px"  src="../utiles/imagenes/student.jpg" /></div></td>
	   <td></td>
	   <td align="center" width="30%" colspan="3"> <div class="container-img"><img height="240px" width="300px"  src="../utiles/imagenes/teacher.jpg"/></div></td>
	   
           </tr>
           
	   <td  width="10%" align="center">
           <a href="/colegio/administrador/gestionarGrados"><div id="box" class="green"><img height="40px" width="40px"  src=../utiles/imagenes/iconos/gestionarGrados.png ></div></a>
           <div class="text-icon">Gestionar Grados</div>   
           </td> 
           
           <td  width="10%" align="center">
           <a href="/colegio/administrador/gestionarSalones"> <div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/gestionarSalones.png ></div></a>
           <div class="text-icon">Gestionar Salones</div>                                                     
           </td>
           
           <td width="10%" align="center">
           <a href="/colegio/administrador/gestionarMaterias"><div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/gestionarMaterias.png ></div></a>
           <div class="text-icon">Gestionar Materias</div>
           </td>
           
	   <td></td>
           
           <td  width="10%" align="center">
           <a href="/colegio/administrador/registrarEstudiantes"><div id="box" class="blue"><img height="40px" width="40px" src=../utiles/imagenes/iconos/registrar.png ></div></a>
           <div class="text-icon">Registrar</div> 
           </td>
           
            <td  width="10%" align="center">
            <a href="/colegio/administrador/matricularEstudiante"><div id="box" class="blue"><img height="40px" width="40px" src=../utiles/imagenes/iconos/matricular.png ></div></a>
           <div class="text-icon">Matricular</div>
           </td>
           <td  width="10%" align="center">
            <a href="/colegio/administrador/retirarEstudiante"><div id="box" class="blue"><img height="40px" width="40px" src=../utiles/imagenes/iconos/retirar.png ></div></a>
           <div class="text-icon">Retirar</div>
           </td>
           
          
           
           <td></td>
	   <td width="10%" align="center"> 
           <a href="/colegio/administrador/gestionarDocentes"><div id="box" class="red"><img height="40px" width="40px" src=../utiles/imagenes/iconos/registrar.png ></div></a>
           <div class="text-icon">Gestionar Docentes</div> 
	   </td>
           
           <td width="10%" align="center">
           <a href="/colegio/administrador/gestionarCargas"><div id="box" class="red"><img height="40px" width="40px" src=../utiles/imagenes/iconos/gestionarCargas.png ></div></a>
           <div class="text-icon">Gestionar Cargas</div>
	   </td>
           <td width="10%">
           </td> 
           
           </tr>
           
           <tr> 
           <td width="10%" align="center">
           <a href="/colegio/administrador/gestionarPensum"><div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/gestionarPensum.png ></div></a>
           <div class="text-icon">Gestionar Pensum</div>
           </td>
           
           <td width="10%" align="center">
           <a href="/colegio/administrador/consolidados"><div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/consolidados.png ></div></a>
           <div class="text-icon">Consolidados</div>
           </td>
           
           <td width="10%" align="center">
           <a href="/colegio/administrador/historialGeneral"><div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/historialAnual.png ></div></a>
           <div class="text-icon">Historial Anual</div>
           </td>
           
           <td></td>
           <td width="10%" align="center">
            <a href="/colegio/administrador/transferirEstudiante"><div id="box" class="blue"><img height="40px" width="40px" src=../utiles/imagenes/iconos/transferir.png ></div></a>
           <div class="text-icon">Transferir</div>  
           </td>
            <td width="10%" align="center">
            <a href="/colegio/administrador/actualizarEstudiante"><div id="box" class="blue"><img height="40px" width="40px" src=../utiles/imagenes/iconos/actualizar.png ></div></a>
           <div class="text-icon">Actualizar</div>  
           </td>
           
           <td valign="top" align="center">
               <a href="/colegio/administrador/historialEstudiante"><div id="box" class="blue"><img height="40px" width="40px" src=../utiles/imagenes/iconos/historial.png ></div></a>
               <div class="text-icon">Historial</div>             
           </td>
           
           </tr>
           
           <tr>
           <td width="10%" align="center">
               <a href="#" onclick="vistaBoletines()"><div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/boletines.png ></div></a>
             <div class="text-icon">Imprimir</div>
           </td>
           
           
           <td width="10%" align="center">
             <a href="/colegio/administrador/pagos"><div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/pagos.png ></div></a>
             <div class="text-icon">Pagos</div>
           </td>
           <td  width="10%" align="center">
           <a href="/colegio/administrador/gestionarRoles"><div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/registrar.png ></div></a>
           <div class="text-icon">Gestionar Usuarios</div> 
           </td>
           </tr>
           <tr>
           <td width="10%" align="center">
             <a href="/colegio/administrador/personas"><div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/personas.png ></div></a>
             <div class="text-icon">Personas</div>
           </td>
           <td width="10%" align="center">
             <a href="/colegio/administrador/notificaciones"><div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/notificacion.png ></div></a>
             <div class="text-icon">Difundir Mensaje</div>
           </td>
           <td width="10%" align="center">
             <a href="/colegio/administrador/cierreAcademico"><div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/cierreAnio.png ></div></a>
             <div class="text-icon">Cierre de Año</div>
           </td>
           </tr>
	   </table>
</div>
<div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <div style="float:right">
      <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
 </div>
     <div style="margin: 0 auto;" id="tablaConsulta">
         <h1 style="margin-left: 430px">IMPRIMIR BOLETINES</h1>
          <table border="0" style="margin: 0 auto; width: 50%;" >
              <tr>
                  <td><b>Salón</b></td>
                  <td><b>Periodo</b></td>
              </tr>
              <tr>
                  <td><select id="idSalon" class="box-text">
                          <?php foreach ($salones as $salon) { ?>    
                          <option><?php echo $salon->getIdSalon();?></option>
                          <?php } ?>
                      </select></td>
                      <td><select id="periodo" class="box-text">
                          <option>PRIMERO</option>
                          <option>SEGUNDO</option>
                          <option>TERCERO</option>
                          <option>CUARTO</option>
                          <option>FINAL</option>
                      </select></td>
                      <td><input name="generarBoletin" id="generarBoletin" type="submit" value="Generar" class="button large green" onclick="envio()" /></td>
              </tr>
          </table>
         <br>
         <hr>
         <br>
         <h1 style="margin-left: 430px">IMPRIMIR PLANILLAS</h1>
         <table border="0" style="margin: 0 auto; width: 50%;" >
              <tr>
                  <td><b>Tipo</b></td>
              </tr>
              <tr>
                      <td><select id="tipo" class="box-text">
                          <option>AUXILIAR</option>
                          <option>CALIFICACION</option>
                      </select></td>
                      <td><input name="generarPlanilla" id="generarPlanilla" type="submit" value="Generar" class="button large green" onclick="planilla()" /></td>
              </tr>
          </table>
         <br>
         <hr>
         <br>
         <h1 style="margin-left: 430px">IMPRIMIR DIRECTORIO TELEFONICO</h1>
         <table border="0" style="margin: 0 auto; width: 50%;" >
                      <td><input name="generarPlanilla" id="generarPlanilla" type="submit" value="Generar" class="button large green" onclick="directorio()" /></td>
              </tr>
          </table>
      </div>
</div>
</body>
</html>