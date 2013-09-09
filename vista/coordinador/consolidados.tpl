
           <script type="text/javascript">
    
 function estPreescolar(){    
 $('#cargar3').load('/colegio/coordinador/consolidadoPreescolar');           
}

 function estPrimaria(){    
 $('#cargar3').load('/colegio/coordinador/consolidadoPrimaria');           
}

 function estSecundaria(){    
 $('#cargar3').load('/colegio/coordinador/consolidadoSecundaria');           
}

  </script>  
    
    </head>
    <body>
      
          <p>&nbsp;</p>
            <p>&nbsp;</p>
	   <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="green">
                    
                    <div class="color-text-blanco" id="title-cab">
                        <table width="90%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Consolidado por Salones</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                    
                </div>
        </div> 
                <p>&nbsp;</p>
             
	
</br>
<table border="0" align="center" width="80%" >
  <tr>
      <td width="30%">
          <h1>Escoja la Seccion:</h1>
  <ul>
      <li><a href="#"onclick="estPreescolar()">Consulta Preescolar</a></li>
      <li><a href="#"onclick="estPrimaria()">Consulta Primaria</a></li>
      <li><a href="#"onclick="estSecundaria()">Consulta Secundaria</a></li>
  </ul>
  </td>
  

</tr>
</table >



<div id="cargar3">
	   
</div>       
