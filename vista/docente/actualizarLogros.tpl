<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
 <title><?php echo $titulo; ?></title>
 <script>
     
  function nuevo(){
location.reload();
}  

 function cargarMaterias(){ 
 var a = $("#logros");
 a.html(" ");
 var y =$("#materia"); 
 var b= $("#cargarLogros");
  
 var idGrado = document.getElementById("grado").value;

    if (idGrado!=""){
        var url="/colegio/docente/imprimirMaterias";
        var data="idGrado="+idGrado;
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
    var idGrado = document.getElementById("grado").value;
    var idMateria = document.getElementById("materia").value;
    var superior = document.getElementById("superior").value;
    var alto = document.getElementById("alto").value;
    var basico = document.getElementById("basico").value;
    var bajo = document.getElementById("bajo").value;
          if (idGrado !="" && idMateria != ""){
        var url="/colegio/docente/guardarLogro";
        var data="periodo="+periodo+"&idGrado="+idGrado+"&idMateria="+idMateria+"&superior="+superior+"&alto="+alto+"&basico="+basico+"&bajo="+bajo;
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
    var idGrado = document.getElementById("grado").value;
    var idMateria = document.getElementById("materia").value;
        
          if (idGrado !="" && idMateria != ""){
        var url="/colegio/docente/cargarLogros";
        var data="periodo="+periodo+"&idGrado="+idGrado+"&idMateria="+idMateria;
        envioJson(url,data,function respuesta(res){               
            if (res!=0){
            y.html (res);
            x.html("Logro Cargado Correctamente");
            exito();
            ocultar();
            $("#nuevo1").show();
            }else{
            x.html("Error al Actualizar Logro");
            error();
            ocultar();
            }
            
         });  
    }
 }   
 
function onChange1(val) {
    var txt = $("#superior");
     
        txt.val(txt.val() + ' ' +val);
    
}

function onChange2(val) {
    var txt = $("#alto");
     
        txt.val(txt.val() + ' ' +val);
    
}
function onChange3(val) {
    var txt = $("#basico");
     
        txt.val(txt.val() + ' ' +val);
    
}
function onChange4(val) {
    var txt = $("#bajo");
     
        txt.val(txt.val() + ' ' +val);
    
}

 </script>
 <style>

#record1, #record2, #record3,#record4 {
    font-size: 25px;
    width: 25px;
    height: 25px;
    cursor:pointer;
    border: none;
    position: absolute;
    margin-left: 5px;
    outline: none;
    background: transparent;
}

</style>
 </head>
 
 <body>
   
        <?php include HOME . DS . 'includes' . DS . 'headerDocente.php'; ?>
     
       
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
                <td align="left" class="color-text-rojo" colspan="3"><h3>Ingreso De Logros</h3></td>    
            </tr>
            <tr>
                <td colspan="3" aling="center" class="color-text-gris"><h2>Ubicacion:</h2></td>
            </tr> 
            <tr>
                <td class="color-text-rojo" width="30%">Periodo</td>
                <td class="color-text-rojo" width="30%" align="right">Grado</td>
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
                <td align="right"><select name="grado" class="box-text" id="grado" onchange="cargarMaterias()" required focus>
                                    <option></option>
                                        <?php foreach($grados as $grado){ ?>
                                        <option value="<?php echo $grado->getIdGrado(); ?>"><?php echo $grado->getNombre(); ?></option>
                                        <?php } ?>
                                   </select>
                </td>
                <td align="right">
                    <select name="materia" class="box-text" id="materia" required> 
                      
                    </select>
                </td>
            </tr>
             </table>
         </br>
         <table align="right"  border="0">
            <tr>
                <td>
                     <td id="nuevo1" hidden align="right"><input name="nuevo" id="nuevo" type="submit" value="Nuevo" class="button large red" onclick="nuevo()" /></td>
                </td>    
                <td align="right">
                    <button name="cargarLogros" id="cargarLogros" type="submit" class="button large red" onclick="cargarLogros()"  disabled>Actualizar Logros</button>  
                </td>
        
            </tr>   
        </table> 
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <table id="logros" align="center" width="100%"  border="0"></table>
         
      </div>
</body>
</html>