<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
   
        <title><?php echo $titulo; ?></title>
    
           <script type="text/javascript">
    
 function estPreescolar(){    
 $('#cargar').load('/colegio/administrador/historialPreescolar');           
}

 function estPrimaria(){    
 $('#cargar').load('/colegio/administrador/historialPrimaria');           
}

 function estSecundaria(){    
 $('#cargar').load('/colegio/administrador/historialSecundaria');           
}

  </script>  
    
    </head>
    <body>
	
	 <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
     
      <!------------------------------cabecera--------------------------->  
         <p>&nbsp;</p>
            </br>
           <p>&nbsp;</p>

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