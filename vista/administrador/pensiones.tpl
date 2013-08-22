<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
   
        <title><?php echo $titulo; ?></title>
    
           <script type="text/javascript">
    
 function estPreescolar(){    
 $('#cargar').load('/colegio/administrador/pensionPreescolar');           
}

 function estPrimaria(){    
 $('#cargar').load('/colegio/administrador/pensionPrimaria');           
}

 function estSecundaria(){    
 $('#cargar').load('/colegio/administrador/pensionSecundaria');           
}

  </script>  
    
    </head>
    <body>
	
	 <div class="cabecera">
	<table border="0" align="center" width="80%" >
    <tr>
    <td align="left" width="10%"><a href="/colegio/administrador/usuarioAdministrador"><img src="../utiles/imagenes/iconos/inicio.png"/></a></td>
    <td align="left" width="50%"><a href="/colegio/administrador/configuracionUsuario"><img src="../utiles/imagenes/iconos/Power.png"/></td>
     <td align="right">
     <!-- search -->
        <div class="top-search">
            <div id="searchform" >
		<input type="text"  name="id" id="s"  placeholder="Numero De Documento" required />
		<input  type="submit" id="searchsubmit" onclick="" />
	   </div>
						
	</div>
        <!-- END search -->   
         
     </td>
    <td align="right" width="10%"><a href="#"><img  src="../utiles/imagenes/iconos/salir.png"/></a></td>
    </tr>
    </table>

        </div>

</br>
<table border="0" align="center" width="80%" >
  <tr>
      <td width="30%">
          <h1>Escoja la Seccion:</h1>
      </td>
  <td>
  <ul>
      <div><h2>Estudiantes</h2></div>
      <li><a href="#"onclick="estPreescolar()">Consulta Preescolar</a></li>
      <li><a href="#"onclick="estPrimaria()">Consulta Primaria</a></li>
      <li><a href="#"onclick="estSecundaria()">Consulta Secundaria</a></li>
  </ul>
  </td>
  

</tr>
</table >

<hr>

<div id="cargar">
	   
</div>       
</body>
 <?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>
</html>