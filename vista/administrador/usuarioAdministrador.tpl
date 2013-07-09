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
  </script>  
    
    
    
    <body>
	
	 <div class="cabecera">
	<?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
        </div>

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
       <li><a href="#"onclick="preescolar()">Consulta Preescolar</a></li>
       <li><a href="#"onclick="primaria()">Consulta Primaria</a></li>
       <li><a href="#"onclick="secundaria()">Consulta Secundaria</a></li>
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
          <table border="0" align="center" width="80%px">
	   <tr>
	   <td colspan="3"><h2>Administrador</h2></td>
           <td></td>
	   <td colspan="3"><h2>Estudiantes</h2></td>
	   <td></td>
	   <td colspan="3"><h2>Docentes</h2></td>
         
	   </tr>
	   <tr>
           <td align="center" valign="top" width="30%" colspan="3"> <div id="box" class="green"><img src="../utiles/imagenes/admin.png" class="imgMenu"/></div></td>
	   <td></td>
	   <td align="center" width="30%" colspan="3"> <div id="box" class="blue"><img src="../utiles/imagenes/student.png" class="imgMenu"/></div></td>
	   <td></td>
	   <td align="center" width="30%" colspan="3"> <div id="box" class="red"><img src="../utiles/imagenes/teacher.png" class="imgMenu"/></div></td>
	   </tr>
	   
	   <tr>
               
	   <td valign="top" align="left" width="10%">
                <a href="/colegio/administrador/gestionarGrados">
                <img src="../utiles/imagenes/iconos/gestionarGrados.png" 
                onmouseover="this.src='../utiles/imagenes/iconos/gestionarGradosOver.png'" 
                onmouseout="this.src='../utiles/imagenes/iconos/gestionarGrados.png';"/></a>
           </td> 
           
           <td valign="top" align="center" width="10%">
           <a href="/colegio/administrador/gestionarSalones">
               <img src="../utiles/imagenes/iconos/gestionarSalones.png"
               onmouseover="this.src='../utiles/imagenes/iconos/gestionarSalonesOver.png'" 
               onmouseout="this.src='../utiles/imagenes/iconos/gestionarSalones.png';"/></a>     
                                                                  
           </td>
           
           <td valign="top" align="right" width="10%">
           <a href="/colegio/administrador/gestionarMaterias">
               <img src="../utiles/imagenes/iconos/gestionarMaterias.png"
                onmouseover="this.src='../utiles/imagenes/iconos/gestionarMateriasOver.png'" 
                onmouseout="this.src='../utiles/imagenes/iconos/gestionarMaterias.png';"/></a>   
           </td>
           
           
	   <td></td>
           
	  
           <td valign="top" align="left" width="10%">
	   <a href="/colegio/administrador/registrarEstudiantes">
               <img src="../utiles/imagenes/iconos/registrarEstudiante.png"
                onmouseover="this.src='../utiles/imagenes/iconos/registrarEstudianteOver.png'" 
                onmouseout="this.src='../utiles/imagenes/iconos/registrarEstudiante.png';"/></a>   
           </td>
           
            <td valign="top" align="center" width="10%">
	   <a href="/colegio/administrador/matricularEstudiante">
               <img src="../utiles/imagenes/iconos/matricular.png"
                onmouseover="this.src='../utiles/imagenes/iconos/matricularOver.png'" 
                onmouseout="this.src='../utiles/imagenes/iconos/matricular.png';"/></a> 
           </td>
           
           <td valign="top" align="right" width="10%">
           <a href="#">
               <img src="../utiles/imagenes/iconos/actualizarEstudiante.png"
                onmouseover="this.src='../utiles/imagenes/iconos/actualizarEstudianteOver.png'" 
                onmouseout="this.src='../utiles/imagenes/iconos/actualizarEstudiante.png';"/></a> 
           </td>
          
	   <td></td>
           
	   <td valign="top" align="left" width="10%" >
           <a href="/colegio/administrador/gestionarDocentes">
               <img src="../utiles/imagenes/iconos/gestionarDocentes.png"
                onmouseover="this.src='../utiles/imagenes/iconos/gestionarDocentesOver.png'" 
                onmouseout="this.src='../utiles/imagenes/iconos/gestionarDocentes.png';"/></a> 
	   </td>
             
           <td valign="top" align="center" width="10%">
           <a href="/colegio/administrador/gestionarCargas">
               <img src="../utiles/imagenes/iconos/gestionarCargas.png"
                onmouseover="this.src='../utiles/imagenes/iconos/gestionarCargasOver.png'" 
                onmouseout="this.src='../utiles/imagenes/iconos/gestionarCargas.png';"/></a> 
	   </td>
           
            <td valign="top" align="left" width="10%">
           </td> 
           
	   </tr>
           
           <tr>
            <td valign="top" align="left" width="10%">
           <a href="/colegio/administrador/gestionarPensum">
               <img src="../utiles/imagenes/iconos/gestionarPensum.png"
                onmouseover="this.src='../utiles/imagenes/iconos/gestionarPensumOver.png'" 
                onmouseout="this.src='../utiles/imagenes/iconos/gestionarPensum.png';"/></a> 
           </td>
           
           <td valign="top" align="center" width="10%">
	   <a href="#">
               <img src="../utiles/imagenes/iconos/consolidados.png"
                onmouseover="this.src='../utiles/imagenes/iconos/consolidadosOver.png'" 
                onmouseout="this.src='../utiles/imagenes/iconos/consolidados.png';"/></a> 
           </td>
           
           <td valign="top" align="right" width="10%">
           <a href="#">
               <img src="../utiles/imagenes/iconos/historialAnual.png"
               onmouseover="this.src='../utiles/imagenes/iconos/historialAnualOver.png'" 
               onmouseout="this.src='../utiles/imagenes/iconos/historialAnual.png';"/></a> 
           </td>
           
           <td></td>
           
           <td valign="top">
           <a href="#">
               <img src="../utiles/imagenes/iconos/HistorialEstudiante.png"
                onmouseover="this.src='../utiles/imagenes/iconos/HistorialEstudianteOver.png'" 
                onmouseout="this.src='../utiles/imagenes/iconos/HistorialEstudiante.png';"/></a>             
           </td>
           
           </tr> 
           <tr>
            <td valign="top" align="left" width="10%">
           <a href="#">
               <img src="../utiles/imagenes/iconos/cierreAno.png"
                onmouseover="this.src='../utiles/imagenes/iconos/cierreAnoOver.png'" 
                onmouseout="this.src='../utiles/imagenes/iconos/CierreAno.png';"/></a> 
           </td>
           </tr>
	   </table>
</div>       
</body>
 <?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>
</html>