<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>


<script type="text/javascript">
    
function nuevo(){
$("#idPersona").val("");
$("#idPersona").removeAttr("disabled");
$("#tabla").html(" ");
$("#pension").hide();
$("#nuevo1").hide();
$("#pagos1").hide();
$("#pension").hide()
}    
    
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

        var url="/colegio/administrador/consultarPersona/";
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
            $("#idPersona").attr("disabled","disabled");
            x.hide();
            $("#nuevo1").show();
            $("#pagos1").show();
            
            }
            
         });
    }   
} 



function mostrarConcepto(){
    var concepto = document.getElementById("concepto").value;
    if(concepto== "PENSION"){
        $("#pension").show();
    }else{
    
    }
}

function guardarPension(){
    var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
   
 var idPersona = document.getElementById("idPersona").value;
 var mes = document.getElementById("mes").value;
 var añoPension = document.getElementById("añoPension").value;
 var valorPension = document.getElementById("valorPension").value;
 var concepto = document.getElementById("concepto").value;
 if (idPersona=="" || mes =="" || añoPension == "" || valorPension == "" ){
      x.html ( "<p>Error: Ingresar Datos Vacios</p>");
       error();
       ocultar();
    }else{

        var url="/colegio/administrador/guardarPension/";
        var data="idPersona="+idPersona+"&mes="+mes+"&añoPension="+añoPension+"&valorPension="+valorPension+"&concepto="+concepto;

        envioJson(url,data,function respuesta(res){   
            if (res == "1"){
                x.html ("<p>Pensión registrada correctamente</p>");
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
            </br>
           <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="green">
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Registro De Pagos</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                     
                         
     <!-------------------------------------------------------------------->     
     <div style="position: relative; margin-left: 10%; width: 80%;">
       <table width="60%" border="0" cellspacing="0" cellpadding="2">
           <tr>     
           <td align="left">Digite Numero de Documento:</td>
           <td><input name="idPersona"  id="idPersona" type="text" class="box-text" value="" required/></td>
           <td><input name="consultarEstudiante" id="consultarEstudiante" type="submit" value="Cosultar" class="button large green" onclick="envio()" /></td>
           <td id="nuevo1" hidden><input name="nuevo" id="nuevo" type="submit" value="Nuevo" class="button large green" onclick="nuevo()" /></td>
       </tr>
        </table>
      </div>   
      <p>&nbsp;</p>
      <hr>
       <p>&nbsp;</p>
       <table width="80%" align="center" border="0" >
        <tr>
            <td id="pagos1" hidden><input name="pagos" id="pagos" type="submit" value="Antiguos Pagos" class="button large red" onclick="pagosAntiguos()" /></td>
       </tr>
       </table>
       </br>
       <div style="position: relative; width: 80%; margin-left: 10%;" id="tabla" >
                 
       </div>  
                        
        <p>&nbsp;</p>
       <p>&nbsp;</p> 
        <p>&nbsp;</p> 
                
           <div id="pension" hidden style="margin-left: 10%; width:80%">
               <table>
                   <tr><td class="color-text-gris"><h1>Pension</h1></td></tr>
                   </table>
               <table class="tabla" width="50%">
                   <tr class="modo1">
                       <td>MES:</td>
                       <td>AÑO:</td>
                       <td>VALOR:</td>
                   </tr>
                   <tr>
                       <td><select id="mes" class="box-text">
                               <option>---</option>
                               <option>ENERO</option>
                               <option>FEBRERO</option>
                               <option>MARZO</option>
                               <option>ABRIL</option>
                               <option>MAYO</option>
                               <option>JUNIO</option>
                               <option>JULIO</option>
                               <option>AGOSTO</option>
                               <option>SEPTIEMBRE</option>
                               <option>OCTUBRE</option>
                               <option>NOBIEMBRE</option>
                               <option>DICIEMBRE</option>
                           </select></td>
                           <td><input id="añoPension" type="text" value="<?php $fecha = getdate(); $año=$fecha['year'] ; echo $año; ?>" class="box-text"/> </td>
                           <td><input id="valorPension" type="text" value="" class="box-text" /></td>
                   </tr>
               </table>
               </br>
               <table align='left'>
                     <tr>
                      <td><button id="guardarPension" onclick="guardarPension()" class="button large green">Registrar</button> </td>
                </tr>
               </table>
           </div>
           <div id="constancia">
               
           </div>
           
       </div>
        
    </body>
</html>