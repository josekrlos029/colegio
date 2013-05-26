<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
		<link href="../utiles/css/administrador.css" rel="stylesheet" type="text/css" media="screen"/>
                <link href="../utiles/css/menu.css" rel="stylesheet" type="text/css" media="screen"/>
                <script src="../utiles/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
                <script src="../utiles/js/easing.js" type="text/javascript" ></script>
                <script>
                    window.onload = function() {
                        
                    $('#box.green').hover(function(){
                    
                       $('#box.green').animate({left:'10px'});
                       $(this).css('cursor','pointer');                       
                     }, function(){
                       $('#box.green').animate({left:'-10px'});
                     });
    }          
         </script>
        <title>Usuario Administrador</title>
    </head>
    <body>
	
	<div id="marco">
<hr>
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
      <div class="title" >Estudiantes</div>
      <li><a href="#"onclick="preescolar()">Consulta Preescolar</a></li>
      <li><a href="#"onclick="primaria()">Consulta Primaria</a></li>
      <li><a href="#"onclick="secundaria()">Consulta Secundaria</a></li>
  </ul>
  </td>
  
<td>
  <ul>
  <div class="title" >Docentes</div>
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
	   <td colspan="5" align="right"><h1>Gestion Administrativa</h1></td>
	   
	   </tr>
	 
	<tr>
	   <td class="title" >Administrador</td>
	   <td></td>
	   <td class="title" >Estudiantes</td>
	   <td></td>
	   <td class="title" >Docentes</td>
	   </tr>
	   <tr>
               <td align="center" width="30%"><div id="box" class="green"><img id="bb" src="../utiles/imagenes/admin.png"/></div></td>
	    <td></td>
	   <td align="center" width="30%"> <div id="box" class="blue"><img src="../utiles/imagenes/student.png"/></div></td>
	    <td></td>
	   <td align="center" width="30%"><div id="box" class="red"><img src="../utiles/imagenes/teacher.png"/></div></td>
	   </tr>
	   
	   <tr>
	   <td>
              
               <ul class="menu"  >
           <li><a href="/colegio/administrador/gestionarGrados">Gestinar de Grados</a></li>
           <li><a href="/colegio/administrador/gestionarSalones">Aulas de Clase</a></li>
           <li><a href="/colegio/administrador/gestionarMaterias">Gestionar Materias</a></li>
           <li><a href="/colegio/administrador/gestionarPensum">Gestionar Pensum</a></li>
	   <li><a href="#">Consolidados</a></li>
           <li><a href="#">Historial Anual</a></li>
           <li><a href="#">Cierre de ano</a></li>
               </ul>
		 <td></td>
	   <td>
	    <ul class="menu">
	   <li><a href="#">Matricular</a></li>
	   <li><a href="#">Registrar</a></li>
           <li><a href="#">Actualizar</a></li>
           <li><a href="#">Historial</a></li>
	   </ul>
	   </td>
	    <td></td>
	     <td>
		  <ul class="menu">
           <li><a href="/colegio/administrador/gestionarDocentes">Gestinar de Docentes</a></li>
	   <li><a href="#">Gestionar Cargas</a></li>
      
	   </ul>
	   </td>
	   </td>
	   </tr>
	   </table>
</div>
    </body>
</html>