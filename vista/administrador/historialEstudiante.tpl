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
      x.html( "<p>Error: Ingresar Numero de Documento</p>");
      error(); 
      ocultar();
    }else{

        var url="/colegio/administrador/consultaHistorialEstudiante";
        var data="idPersona="+idPersona.value;

        envioJson2(url,data,function respuesta(res){   
            
            y.html(res);
            $("#idPersona").attr("disabled","disabled");
            x.hide();
                        
         });
    }   
} 

function imprimir(anio){
    var idPersona = document.getElementById("idPersona").value;
    window.open("/colegio/administrador/imprimirInformeFinal/"+idPersona+","+anio);
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
                <div id="cabecera" class="blue">
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Actualizar Datos del Estudiante</h1>
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
           <td><input name="idPersona"  id="idPersona" type="text" class="box-text" required/></td>
           <td><input name="consultarEstudiante" id="consultarEstudiante" type="submit" value="Consultar" class="button large blue" onclick="envio()" /></td>
         
       </tr>
        </table>
      <p>&nbsp;</p>
      <hr>
       <p>&nbsp;</p>
       <div  id="tabla" align="left">
           
           </div>
        <!-------------------------------------------------------------------->         
    </body>
</html>