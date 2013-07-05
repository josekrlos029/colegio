<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
 <title><?php echo $titulo; ?></title>
 <script>
 function cargarMaterias(){ 
 var a = $("#logros");
 a.html(" ");
 var y =$("#materia"); 
 var b= $("#cargarLogros");
  
 var idSalon = document.getElementById("salon").value;

    if (idSalon!=""){
        var url="/colegio/docente/imprimirMaterias";
        var data="idSalon="+idSalon;
        envioJson(url,data,function respuesta(res){               
        y.html (res);
        b.removeAttr("disabled");
         });  
    }
    }
    
     function guardarLogros(){
    
     var x = $("#mensaje");
    cargando();
    x.html ("<p>Cargando...</p>");
    x.show("slow");
    var periodo = document.getElementById("periodo").value;    
    var idSalon = document.getElementById("salon").value;
    var idMateria = document.getElementById("materia").value;
    var superior = document.getElementById("superior").value;
    var alto = document.getElementById("alto").value;
    var basico = document.getElementById("basico").value;
    var bajo = document.getElementById("bajo").value;
          if (idSalon!="" && idMateria != ""){
        var url="/colegio/docente/guardarLogro";
        var data="periodo="+periodo+"&idSalon="+idSalon+"&idMateria="+idMateria+"&superior="+superior+"&alto="+alto+"&basico="+basico+"&bajo="+bajo;
        envioJson(url,data,function respuesta(res){               
            if (res==1){
            
            x.html("Logro Actualizado Correctamente");
            exito();
            ocultar();
            }else{
            x.html("Error al Actualizar Logro");
            error();
            ocultar();
            }
            
         });  
    }
 }
    
 function cargarLogros(){
    var y = $("#logros");
     var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
    var periodo = document.getElementById("periodo").value;    
    var idSalon = document.getElementById("salon").value;
    var idMateria = document.getElementById("materia").value;
        
          if (idSalon!="" && idMateria != ""){
        var url="/colegio/docente/cargarLogros";
        var data="periodo="+periodo+"&idSalon="+idSalon+"&idMateria="+idMateria;
        envioJson(url,data,function respuesta(res){               
            if (res!=0){
            y.html (res);
            x.html("Logro Cargado Correctamente");
            exito();
            ocultar();
            }else{
            x.html("Error al Actualizar Logro");
            error();
            ocultar();
            }
            
         });  
    }
 }   
 </script>
 </head>
 
 <body>
    <div class="cabecera">
        <?php include HOME . DS . 'includes' . DS . 'headerDocente.php'; ?>
        </div>
       
          <!------------------------------cabecera--------------------------->  
         
            <p>&nbsp;</p>
            </br>
            <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="red">
                    
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="0">
                         <tr>  
                            <td align="right">   
                                <h1>Actualizar Logros</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                    
                </div>
        </div> 
                <p>&nbsp;</p>
                      
                         
     <!--------------------------------------------------------------------> 
     <div class="contenedor" style="width: 70%; margin: 0 auto;" aling="center">
        <table align="center" width="100%"  border="0">
            <tr>
                <td align="right" class="color-text-rojo" colspan="3"><h3>Ingreso De Notas</h3></td>    
            </tr>
            <tr>
                <td colspan="3" aling="center" class="color-text-gris"><h2>Ubicacion:</h2></td>
            </tr> 
            <tr>
                <td class="color-text-rojo" width="30%">Periodo</td>
                <td class="color-text-rojo" width="30%" align="right">Salon</td>
                <td class="color-text-rojo" width="30%" align="right">Materia</td>
            </tr>
            <tr>
                <td colspan="3"><hr></td>
            </tr> 
            <tr>
                <td><select name="periodo" class="box-text" id="periodo" required > 
                        <option>PRIMERO</option>
                        <option>SEGUNDO</option>
                        <option>TERCERO</option>
                        <option>CUARTO</option>
                    </select>
                </td>
                <td align="right"><select name="salon" class="box-text" id="salon" onchange="cargarMaterias()" required focus>
                                    <option></option>
                                        <?php foreach ($cargas as $carga) { ?>
                                        <option><?php echo $carga->getIdSalon(); ?></option>
                                        <?php } ?>
                                   </select>
                </td>
                <td align="right">
                    <select name="materia" class="box-text" id="materia" required> 
                      
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3"><hr></td>
            </tr>   
            <tr>
                <td colspan="3" align="center">
                    <button name="cargarLogros" id="cargarLogros" type="submit" class="button large red" onclick="cargarLogros()"  disabled>Actualizar Logros</button>  
                </td>
        
            </tr>   
        </table> 
        <p>&nbsp;</p>
        <table id="logros" align="center" width="100%"  border="0"></table>
         
      </div>
</body>
<?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>
</html>