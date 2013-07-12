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
           
           <td width="10%" align="center">
            <a href="#"><div id="box" class="blue"><img height="40px" width="40px" src=../utiles/imagenes/iconos/actualizar.png ></div></a>
           <div class="text-icon">Actualizar</div>  
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
               <a href="#"><div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/consolidados.png ></div></a>
           <div class="text-icon">Consolidados</div>
           </td>
           
           <td width="10%" align="center">
           <a href="#"><div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/historialAnual.png ></div></a>
           <div class="text-icon">Historial Anual</div>
           </td>
           
           <td></td>
           
           <td valign="top" align="center">
               <a href="#"><div id="box" class="blue"><img height="40px" width="40px" src=../utiles/imagenes/iconos/historial.png ></div></a>
               <div class="text-icon">Historial</div>             
           </td>
           
           </tr>
           
           <tr>
            <td width="10%" align="center">
             <a href="#"><div id="box" class="green"><img height="40px" width="40px" src=../utiles/imagenes/iconos/cierreAño.png ></div></a>
             <div class="text-icon">Cierre de Año</div>
           </td>
           
           </tr>
	   </table>
</div>       
</body>
 <?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>
</html>