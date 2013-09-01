
           <script type="text/javascript">
    
 function estPreescolar(){    
 $('#cargar3').load('/colegio/administrador/pensionPreescolar');           
}

 function estPrimaria(){    
 $('#cargar3').load('/colegio/administrador/pensionPrimaria');           
}

 function estSecundaria(){    
 $('#cargar3').load('/colegio/administrador/pensionSecundaria');           
}

  </script>  
    
  <p>&nbsp;</p>
           <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="green">
                    
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Pension por Salones</h1>
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
      </td>
  <td>
  </tr>
 <tr>
   <td>  
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
