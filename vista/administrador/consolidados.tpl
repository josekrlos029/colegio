  <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
   
        <title><?php echo $titulo; ?></title>
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
	
	 <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
          <p>&nbsp;</p>
            </br>
           <p>&nbsp;</p>
 <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="green">
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Consolidados Academicos</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                </div>
        </div> 
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