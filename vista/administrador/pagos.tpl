<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>


<script type="text/javascript">
    
function nuevo(){
$("#idPersona").val("");
$("#idPersona").removeAttr("disabled");
$("#tabla").html(" ");
$("#pension").hide();
$("#nuevo1").hide();
$("#pagos1").hide();
$("#pension").hide();
$("#otro").hide();
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

        var url="/colegio/administrador/consultarParaPago";
        var data="idPersona="+idPersona.value;

        envioJson2(url,data,function respuesta(res){   
            
            y.html(res);
            $("#matricula").show();
            $("#idPersona").attr("disabled","disabled");
            x.hide();
            $("#nuevo1").show();
            $("#pagos1").show();
            
            
            
         });
    }   
} 



function mostrarConcepto(){
    var concepto = document.getElementById("concepto").value;
    if(concepto== "PENSION"){
        $("#otro").hide();
        $("#pension").show();
    }else{
         $("#pension").hide();
        $("#otro").show();
       
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

        var url="/colegio/administrador/guardarPension";
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
function guardarPago(){
    var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
   
 var idPersona = document.getElementById("idPersona").value;
 var valorPago = document.getElementById("valorPago").value;
 var concepto = document.getElementById("concepto").value;
 if (idPersona=="" || valorPago == "" ){
      x.html ( "<p>Error: Ingresar Datos Vacios</p>");
       error();
       ocultar();
    }else{

        var url="/colegio/administrador/guardarPago";
        var data="idPersona="+idPersona+"&valorPago="+valorPago+"&concepto="+concepto;

        envioJson2(url,data,function respuesta(res){   
            
                x.html (res);
                exito();
                ocultar();
                nuevo();
         });
    }   
}
function pagosAntiguos(){ 
  
    var y = $("#tablaConsulta");
    var idPersona = document.getElementById("idPersona");
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';
        var url="/colegio/administrador/pagosAntiguos";
        var data="idPersona="+idPersona.value;

        envioJson2(url,data,function respuesta(res){   
            
            y.html(res);
         });
       
}
function pagosDelDia(){ 
  
    var y = $("#tablaConsulta");
    var idPersona = document.getElementById("idPersona");
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';
        var url="/colegio/administrador/pagosDelDia";
        var data="idPersona="+idPersona.value;

        envioJson2(url,data,function respuesta(res){   
            
            y.html(res);
         });
       
}

function pagosActuales(){
    var y = $("#tablaConsulta");
    var idPersona = document.getElementById("idPersona");
        var url="/colegio/administrador/pagosActuales";
        var data="idPersona="+idPersona.value;

        envioJson2(url,data,function respuesta(res){   
            y.html(res);
         });
}

function pagosPorFecha(){
    var y = $("#tablaConsulta");
    var idPersona = document.getElementById("idPersona");
    var inicio = document.getElementById("finicio");
    var fin = document.getElementById("ffin");
        var url="/colegio/administrador/pagosPorFecha";
        var data="idPersona="+idPersona.value+"&inicio="+inicio.value+"&fin="+fin.value;

        envioJson2(url,data,function respuesta(res){   
            
            y.html(res);
         });
}
function pagosPorFecha2(){
    var y = $("#tablaConsulta");
    
    var inicio = document.getElementById("finicio");
    var fin = document.getElementById("ffin");
        var url="/colegio/administrador/pagosPorFecha2";
        var data="inicio="+inicio.value+"&fin="+fin.value;

        envioJson2(url,data,function respuesta(res){   
            
            y.html(res);
         });
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
           <td><input name="pagosDelDia" id="pagosDelDia" type="submit" value="Pagos del Día" class="button large red" onclick="pagosDelDia()" /></td>
       </tr>
        </table>
      </div>   
      <p>&nbsp;</p>
      <hr>
       <p>&nbsp;</p>
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
                               <option>NOVIEMBRE</option>
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
           <div id="otro" hidden style="margin-left: 10%; width:auto">
               <table>
                   <tr><td class="color-text-gris"><h1>PAGO</h1></td></tr>
                   </table>
               <table class="tabla" width="20%">
                   <tr class="modo1">
                       <td>VALOR:</td>
                   </tr>
                   <tr>
                           <td><input id="valorPago" type="text" value="" class="box-text" /></td>
                   </tr>
               </table>
               </br>
               <table align='left'>
                     <tr>
                      <td><button id="guardarPension" onclick="guardarPago()" class="button large green">Registrar</button> </td>
                </tr>
               </table>
           </div>
           
       <div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <div style="float:right">
      <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
 </div>
     <div style="margin: 0 auto;" id="tablaConsulta">
        
      </div>
</div>
        
    </body>
</html>