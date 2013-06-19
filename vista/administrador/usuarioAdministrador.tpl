   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
    <title>Usuario Administrador</title>
    <body>
	
	<div id="marco">
	<?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
</br>
<hr>
</br>
<table border="0" align="center" width="900px" >
	<tr>
  <td width="40%" >
  <img src="../utiles/imagenes/tag_administrador.png"/>
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
	   <td align="right"><h1>Gestion Administrativa</h1></td>
	   </tr>
	   </table>
          <table border="0" align="center" width="900px">
	   <tr>
	   <td class="tdMenu"><h2>Administrador</h2></td>
           <td></td>
	   <td class="tdMenu"><h2>Estudiantes</h2></td>
	   <td></td>
	   <td class="tdMenu"><h2>Docentes</h2></td>
	   </tr>
	   <tr>
           <td align="center" width="30%" class="tdMenu"> <div id="box" class="green"><img id="bb" src="../utiles/imagenes/admin.png"/></div></td>
	   <td></td>
	   <td align="center" width="30%" class="tdMenu"> <div id="box" class="blue"><img src="../utiles/imagenes/student.png"/></div></td>
	   <td></td>
	   <td align="center" width="30%" class="tdMenu"> <div id="box" class="red"><img src="../utiles/imagenes/teacher.png"/></div></td>
	   </tr>
	   
	   <tr>
	   <td class="tdMenu">
           <ul class="menu"  >
           <li><a href="/colegio/administrador/gestionarGrados">Gestionar Grados</a></li>
           <li><a href="/colegio/administrador/gestionarSalones">Aulas de Clase</a></li>
           <li><a href="/colegio/administrador/gestionarMaterias">Gestionar Materias</a></li>
           <li><a href="/colegio/administrador/gestionarPensum">Gestionar Pensum</a></li>
	   <li><a href="#">Consolidados</a></li>
           <li><a href="#">Historial Anual</a></li>
           <li><a href="#">Cierre de ano</a></li>
           </ul>
           </td>
	   <td></td>
	   <td valign="top" class="tdMenu">
	   <ul class="menu">
	   <li><a href="/colegio/administrador/matricularEstudiante">Matricular</a></li>
	   <li><a href="/colegio/administrador/registrarEstudiantes">Registrar</a></li>
           <li><a href="#">Actualizar</a></li>
           <li><a href="#">Historial</a></li>
	   </ul>
	   </td>
	   <td></td>
	   <td valign="top" class="tdMenu">
           <ul class="menu">
           <li><a href="/colegio/administrador/gestionarDocentes">Gestionar Docentes</a></li>
	   <li><a href="/colegio/administrador/gestionarCargas">Gestionar Cargas</a></li>
	   </ul>
	   </td>
	   </td>
	   </tr>
	   </table>
</div>
        
        
</body>
</html>