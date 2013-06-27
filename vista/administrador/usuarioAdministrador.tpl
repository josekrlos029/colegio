   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
    <title>Usuario Administrador</title>
    <body>
	
	 <div class="cabecera">
	<?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
        </div>

</br>
<table border="0" align="center" width="900px" >
  <tr>
  <td width="40%" >
  Hola Usuario <?php echo $_SESSION['idUsuario'] ?> Bienvenido(a) a tu Cuenta.</br>    
  <img src="../utiles/imagenes/tag_administrador.png"/>
  <?php include HOME . DS . 'includes' . DS . 'fecha.php'; ?>
  </td>
  <td>
  <ul>
      <div><h2>Estudiantes</h2></div>
      <li><a href="#"onclick="preescolar()">Consulta Preescolar</a></li>
      <li><a href="#"onclick="primaria()">Consulta Primaria</a></li>
      <li><a href="#"onclick="secundaria()">Consulta Secundaria</a></li>
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
</br>
<hr>
</br>
	   <table border="0" align="center" width="900px">
	   <tr>
	   <td align="right" class="color-text-gris"><h1>Gestion Administrativa</h1></td>
	   </tr>
	   </table>
          <table border="0" align="center" width="900px">
	   <tr>
	   <td colspan="3"><h2>Administrador</h2></td>
           <td></td>
	   <td colspan="3"><h2>Estudiantes</h2></td>
	   <td></td>
	   <td colspan="3"><h2>Docentes</h2></td>
         
	   </tr>
	   <tr>
           <td align="center" width="30%" colspan="3"> <div id="box" class="green"><img src="../utiles/imagenes/admin.png"/></div></td>
	   <td></td>
	   <td align="center" width="30%" colspan="3"> <div id="box" class="blue"><img src="../utiles/imagenes/student.png"/></div></td>
	   <td></td>
	   <td align="center" width="30%" colspan="3"> <div id="box" class="red"><img src="../utiles/imagenes/teacher.png"/></div></td>
	   </tr>
	   
	   <tr>
               
	   <td valign="top" align="left" width="10%">
           <a href="/colegio/administrador/gestionarGrados"><img src="../utiles/imagenes/iconos/gestionarGrados.png"/></a>
           </td> 
           
           <td valign="top" align="center" width="10%">
           <a href="/colegio/administrador/gestionarSalones"><img src="../utiles/imagenes/iconos/gestionarSalones.png"/></a>
           </td>
           
           <td valign="top" align="right" width="10%">
           <a href="/colegio/administrador/gestionarMaterias"><img src="../utiles/imagenes/iconos/gestionarMaterias.png"/></a>
           </td>
           
           
	   <td></td>
           
	  
           <td valign="top" align="left" width="10%">
	   <a href="/colegio/administrador/registrarEstudiantes"><img src="../utiles/imagenes/iconos/registrarEstudiante.png"/></a>
           </td>
           
            <td valign="top" align="center" width="10%">
	   <a href="/colegio/administrador/matricularEstudiante"><img src="../utiles/imagenes/iconos/matricular.png"/></a>
           </td>
           
           <td valign="top" align="right" width="10%">
           <a href="#"><img src="../utiles/imagenes/iconos/actualizarEstudiante.png"/></a>
           </td>
          
	   <td></td>
           
	   <td valign="top" align="left" width="10%" >
           <a href="/colegio/administrador/gestionarDocentes"><img src="../utiles/imagenes/iconos/gestionarDocentes.png"/></a>
	   </td>
             
           <td valign="top" align="center" width="10%">
           <a href="/colegio/administrador/gestionarCargas"><img src="../utiles/imagenes/iconos/gestionarCargas.png"/></a>
	   </td>
           
            <td valign="top" align="left" width="10%">
           </td> 
           
	   </tr>
           
           <tr>
            <td valign="top" align="left" width="10%">
           <a href="/colegio/administrador/gestionarPensum"><img src="../utiles/imagenes/iconos/gestionarPensum.png"/></a>
           </td>
           
           <td valign="top" align="center" width="10%">
	   <a href="#"><img src="../utiles/imagenes/iconos/consolidados.png"/></a>
           </td>
           
           <td valign="top" align="right" width="10%">
           <a href="#"><img src="../utiles/imagenes/iconos/historialAnual.png"/></a>
           </td>
           
           <td></td>
           
           <td valign="top">
           <a href="#"><img src="../utiles/imagenes/iconos/HistorialEstudiante.png"/></a>
           </td>
           
           </tr> 
           <tr>
            <td valign="top" align="left" width="10%">
           <a href="#"><img src="../utiles/imagenes/iconos/cierreAno.png"/></a>
           </td>
           </tr>
	   </table>
</div>
        
        
</body>
</html>