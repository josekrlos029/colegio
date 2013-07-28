<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
		<link href="../../utiles/css/general.css" rel="stylesheet" type="text/css" media="screen"/>
                <link href="../../utiles/css/botones.css" rel="stylesheet" type="text/css" media="screen"/>
                 <link href="../../utiles/css/usuarios.css" rel="stylesheet" type="text/css" media="screen"/>             
                 <link href="../../utiles/css/formularios.css" rel="stylesheet" type="text/css" media="screen"/>
                <link href="../../utiles/css/tablas.css" rel="stylesheet" type="text/css" media="screen"/>
                <script src="../../utiles/js/jquery-1.9.1.min.js" type="text/javascript" ></script>
                <script src="../../utiles/js/easing.js" type="text/javascript" ></script>
                <script src="../../utiles/js/envios.js" type="text/javascript" ></script>
                 <script src="../../utiles/js/jquery.sticky.js" type="text/javascript" ></script>
                <script src="../../utiles/js/inicio.js" type="text/javascript" ></script>
                <script src="../../utiles/js/tablas.js" type="text/javascript" ></script>
                <script src="../../utiles/js/estiloMensaje.js" type="text/javascript"></script>
              <script src="../../utiles/js/mootools-core-1.4.5.js" type="text/javascript"></script>
           <title><?php echo $titulo;?></title>
           <script type="text/javascript">
    
 function estPreescolar(){    
 $('#cargar').load('/colegio/administrador/consolidadoPreescolar');           
}

 function estPrimaria(){    
 $('#cargar').load('/colegio/administrador/consolidadoPrimaria');           
}

 function estSecundaria(){    
 $('#cargar').load('/colegio/administrador/consolidadoSecundaria');           
}

  </script>  
    
    </head>
    <body>
	
	 <div class="cabecera">
	<table border="0" align="center" width="80%" >
    <tr>
    <td align="left" width="10%"><a href="/colegio/administrador/usuarioAdministrador"><img src="../../utiles/imagenes/iconos/inicio.png"/></a></td>
    <td align="left" width="50%"><a href="/colegio/administrador/configuracionUsuario"><img src="../../utiles/imagenes/iconos/Power.png"/></td>
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
    <td align="right" width="10%"><a href="#"><img  src="../../utiles/imagenes/iconos/salir.png"/></a></td>
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