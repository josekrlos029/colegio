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
           <title><?php echo $titulo; ?></title>
  

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
               nuevo();
            }else{
                 x.html ("<p>"+res+"</p>");
                 error();
                ocultar();
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

 </script>
 
 </head>
    <body>
        <div class="cabecera">
        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
        </div>
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
     
       <table width="50%" border="0" cellspacing="0" cellpadding="2">
           <tr>     
           <td align="right">Digite Numero de Documento:</td>
           <td><input name="idPersona"  id="idPersona" type="text" class="box-text" value="" required/></td>
           <td><input name="consultarEstudiante" id="consultarEstudiante" type="submit" value="Siguiente" class="button large blue" onclick="envio()" /></td>
           <td id="nuevo1" hidden><input name="nuevo" id="nuevo" type="submit" value="Nuevo" class="button large green" onclick="nuevo()" /></td>
           <td id="pagos1" hidden><input name="pagos" id="pagos" type="submit" value="Antiguos Pagos" class="button large red" onclick="pagosAntiguos()" /></td>
       </tr>
        </table>
      <p>&nbsp;</p>
      <hr>
       <p>&nbsp;</p>
       <div align="center">
       <div  id="tabla">
           
        </div>
           
           <div id="pension" hidden>
               <table class="tabla">
                   <tr class="modo1">
                       <td>MES:</td>
                       <td>AÑO:</td>
                   </tr>
                   <tr>
                       <td><select id="mes">
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
                           <td><input id="añoPension" type="text" value="<?php $fecha = getdate(); $año=$fecha['year'] ; echo $año; ?>" </td>
                   </tr>
               </table>
               <table align='center'>
                     <tr>
                         <td><button id="guardarPension" onclick="guardarPension()" class="button large blue">Registrar</button> </td>
                </tr>
               </table>
           </div>
           <div id="constancia">
               
           </div>
           
       </div>
        
    </body>
</html>