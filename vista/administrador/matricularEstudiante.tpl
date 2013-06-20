   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
   
        <title><?php echo $titulo; ?></title>
    

<script type="text/javascript">
    
function envio(){ 
  
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
   var y = $("#tabla");
 var idPersona = document.getElementById("idPersona");


    if (idPersona.value==""){
      x.html ( "<p>Error: Ingresar Numero de Documento</p>");
      error(); 
      ocultar();
    }else{

        var url="/colegio/administrador/consultarEstudiante/";
        var data="idPersona="+idPersona.value;

        envioJson(url,data,function respuesta(res){   
            if (res == "1"){
                x.html ("<p>El Número de Documento no existe en el sistema</p>");
                error(); 
                ocultar();
               
            }else if(res==2){
                 x.html ("<p>El estudiante ya se encuentra matriculado</p>");
                error();
                ocultar()
    
            }else if(res==3){
            x.html ("<p>El Número de Documento ingresado no corresponde al de un estudiante</p>");
                error();
                ocultar();
            }else{
            y.html(res);
            $("#matricula").show();
            x.hide();
            }
            
         });
    }   
} 

function matricular(){ 
  
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
   
 var idPersona = document.getElementById("idPersona");
 var idSalon = document.getElementById("idSalon");
 var jornada = document.getElementById("jornada");


    if (idPersona.value==""){
      x.html ( "<p>Error: Ingresar Numero de Documento</p>");
       error();
       ocultar();
    }else{

        var url="/colegio/administrador/matricular/";
        var data="idPersona="+idPersona.value+"&idSalon="+idSalon.value+"&jornada="+jornada.value;

        envioJson(url,data,function respuesta(res){   
            if (res == "1"){
                x.html ("<p>Estudiante Matriculado Correctamente</p>");
                exito();
                ocultar();
               
            }else{
                 x.html ("<p>"+res+"</p>");
                 error();
                ocultar();
            }
            
         });
    }   
}   

 </script>
 
 </head>
    <body>
        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
      <!------------------------------cabecera--------------------------->  
          <p>&nbsp;</p>
            <p>&nbsp;</p>
              <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="blue">
                    <div class="color-text-blanco" id="title-cab"><h1>Matricular estudiantes</h1> </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                     
                         
     <!-------------------------------------------------------------------->     
     
       <table width="600" border="0" cellspacing="0" cellpadding="2">
                
           <td align="right">Digite Numero de Documento:</td>
           <td><input name="idPersona" id="idPersona" type="text" class="box-text" required/></td>
           <td><input name="consultarEstudiante" id="consultarEstudiante" type="submit" value="Consultar" class="button large blue" onclick="envio()" /></td>       
       </tr>
        </table>
      <p>&nbsp;</p>
      <hr>
       <p>&nbsp;</p>
       <div align="center">
       <div  id="tabla">
           
        </div>
           <p>&nbsp;</p>
           <div id="matricula" hidden>
               <table class="tabla" width="600" >
                   <tr>
                  
                  <td colspan="2" align="center" class="color-text-gris"><h1>realizar matricula</h1></td>
                   </tr>
                   <tr class="modo3">
                       <td>SALON</td>
                       <td>JORNADA</td>
                   </tr>
                   
                     <tr><td>
                          <select id="idSalon" class="box-text">
                   <?php foreach ($salones as $salon) { ?>
                   <option><?php echo $salon->getIdSalon();?></option>
                    <?php } ?>
               </select>
                         </td>
                     
                         <td>
                             <select id="jornada" class="box-text">
                                 <option>MAÑANA</option>
                                 <option>TARDE</option>
                                 <option>NOCHE</option>
                             </select>
                         </td>
                     </tr>
                     </table>
                       <p>&nbsp;</p>
                     <table align="center">
                     <tr>
                    <td colspan="2" align="center">
                    <input name="matricularEstudiante" id="matricularEstudiante" type="submit" value="Matricular" class="button large blue" onclick="matricular()" />
                    </td>
                </tr>
               </table>
               
               
           </div>
       </div>
        
    </body>
</html>