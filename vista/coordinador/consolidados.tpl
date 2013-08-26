
           <script type="text/javascript">
    
 function estPreescolar(){    
 $('#cargar3').load('/colegio/administrador/consolidadoPreescolar');           
}

 function estPrimaria(){    
 $('#cargar3').load('/colegio/administrador/consolidadoPrimaria');           
}

 function estSecundaria(){    
 $('#cargar3').load('/colegio/administrador/consolidadoSecundaria');           
}

  </script>  
    
    </head>
    <body>
	
	
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

<div id="cargar3">
	   
</div>       
