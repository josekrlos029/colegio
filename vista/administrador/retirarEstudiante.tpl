   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
   
        <title><?php echo $titulo; ?></title>
    

<script type="text/javascript">
    
function nuevo(){
$("#idPersona").val("");
$("#idPersona").removeAttr("disabled");
$("#tabla").html(" ");
$("#matricula").hide();
$("#nuevo1").hide();
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

        var url="/colegio/administrador/consultarEstudiante2";
        var data="idPersona="+idPersona.value;

        envioJson2(url,data,function respuesta(res){   
     
            y.html(res);
            $("#matricula").show();
            $("#idPersona").attr("disabled","disabled");
            x.hide();
            $("#nuevo1").show();
            
         });
    }   
} 

function retirar(){ 
  
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
   
 var idPersona = document.getElementById("idPersona");
 
    if (idPersona.value==""){
      x.html ( "<p>Error: Ingresar Numero de Documento</p>");
       error();
       ocultar();
    }else{
                
        var person=prompt("Por Favor escoja la razón por la cual va a retirar El estudiante: \n 1.Fue retirado o Promovido \n 2.Hubo un errror al matricularlo","");

        if (person!=null)
          {
          if (person == "1" || person == "2"){
              var opcion = person;
              var url="/colegio/administrador/retirar";
                var data="idPersona="+idPersona.value+"&opcion="+opcion;

                envioJson(url,data,function respuesta(res){   
                    if (res == 1){
                        x.html ("<p>Estudiante Retirado Correctamente</p>");
                        exito();
                        ocultar();
                       nuevo();

                    }else{
                         x.html ("<p>"+res+"</p>");
                         error();
                        ocultar();
                    }

                 });
          }else{
              alert("Digitó una opción Invalida");
              error();
                        ocultar();
          }    
         }
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
                <div id="cabecera" class="blue">
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Retirar Estudiante</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                     
                         
     <!-------------------------------------------------------------------->     
     
       <table width="50%" border="0" cellspacing="0" cellpadding="2">
                
           <td align="right">Digite Numero de Documento:</td>
           <td><input name="idPersona"  id="idPersona" type="text" class="box-text" value="" required/></td>
           <td><input name="consultarEstudiante" id="consultarEstudiante" type="submit" value="Consultar" class="button large blue" onclick="envio()" /></td>
           <td id="nuevo1" hidden><input name="nuevo" id="nuevo" type="submit" value="Nuevo" class="button large green" onclick="nuevo()" /></td>
       </tr>
        </table>
      <p>&nbsp;</p>
      <hr>
       <p>&nbsp;</p>
       <div style="position: relative; margin-left: 10%; width: 80%;">
       <h1 class="color-text-gris">Datos del estudiante</h1>   
       <div  id="tabla">
           
        </div>
       </div>
        
    </body>
</html>