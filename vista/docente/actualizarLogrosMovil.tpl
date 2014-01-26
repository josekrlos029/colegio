<script>
     
  function nuevo(){
var $this = $( this ),
        theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
        msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
        textVisible = $this.jqmData( "textvisible" ) || $.mobile.loader.prototype.options.textVisible,
        textonly = !!$this.jqmData( "textonly" ),
        html = $this.jqmData( "html" ) || "";
    $.mobile.loading( "show", {
            text: msgText,
            textVisible: textVisible,
            theme: theme,
            textonly: textonly,
            html: html
    });
                   
            var url="/colegio/docente/actualizarLogrosMovil";
            var data="idPersona="+localStorage.getItem('idPersona');

            envioJson2(url,data,function respuesta(res){
                $('#content').html(res);
                 $.mobile.loading( "hide" );     
            });
}  

 function cargarMaterias(){ 
 var a = $("#logros");
 a.html(" ");
 var y =$("#materia"); 
 var b= $("#cargarLogros");
  var $this = $( this ),
        theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
        msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
        textVisible = $this.jqmData( "textvisible" ) || $.mobile.loader.prototype.options.textVisible,
        textonly = !!$this.jqmData( "textonly" ),
        html = $this.jqmData( "html" ) || "";
    $.mobile.loading( "show", {
            text: msgText,
            textVisible: textVisible,
            theme: theme,
            textonly: textonly,
            html: html
    });
 var idGrado = document.getElementById("grado").value;

    if (idGrado!=""){
        var url="/colegio/docente/imprimirMateriasMovil";
        var data="idGrado="+idGrado+"&idDocente="+localStorage.getItem('idPersona');
        envioJson(url,data,function respuesta(res){               
        y.html (res);
        b.removeAttr("disabled");
         $.mobile.loading( "hide" );     
         });  
    }
    }
    
     function guardarLogros(){
    var $this = $( this ),
        theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
        msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
        textonly = !!$this.jqmData( "textonly" ),
        html =  "";
    $.mobile.loading( "show", {
            text: "Guardando Logros",
            textVisible: true,
            theme: theme,
            textonly: textonly,
            html: html
    });
     
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
                $.mobile.loading( "hide");
                $.mobile.loading( "show", {
                        text: "Cargado Correctamente",
                        textVisible: true,
                        theme: theme,
                        textonly: false,
                        html: '<img src="../imagenes/iconos/exito.png" width="40" height="40" style="float:left" /> <h3 style="float:left; padding-left:40px;">Listo !</h3>'
                });
                setTimeout('$.mobile.loading( "hide");',3000);
            
            }else{
                $.mobile.loading( "hide");
                $.mobile.loading( "show", {
                        text: "Cargado Correctamente",
                        textVisible: true,
                        theme: theme,
                        textonly: false,
                        html: '<img src="../imagenes/iconos/error.png" width="40" height="40" style="float:left" /> <h3 style="float:left; padding-left:40px;">Listo !</h3>'
                });
                setTimeout('$.mobile.loading( "hide");',3000);
            
            }
            
         });  
    }
 }
    
 function cargarLogros(){
    var y = $("#logros");
     var $this = $( this ),
        theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
        msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
        textonly = !!$this.jqmData( "textonly" ),
        html =  "";
    $.mobile.loading( "show", {
            text: "Cargando Logros",
            textVisible: true,
            theme: theme,
            textonly: textonly,
            html: html
    });
    var periodo = document.getElementById("periodo").value;    
    var idGrado = document.getElementById("grado").value;
    var idMateria = document.getElementById("materia").value;
        
          if (idGrado !="" && idMateria != ""){
        var url="/colegio/docente/cargarLogros";
        var data="periodo="+periodo+"&idGrado="+idGrado+"&idMateria="+idMateria;
        envioJson(url,data,function respuesta(res){               
            if (res!=0){
            y.html (res);
            $.mobile.loading( "hide");
                $.mobile.loading( "show", {
                        text: "Cargado Correctamente",
                        textVisible: true,
                        theme: theme,
                        textonly: false,
                        html: '<img src="../imagenes/iconos/exito.png" width="40" height="40" style="float:left" /> <h3 style="float:left; padding-left:40px;">Listo !</h3>'
                });
                setTimeout('$.mobile.loading( "hide");',2000);
            $("#nuevo1").show();
            $("#guardarLogros").removeClass("button large red");
            $("#guardarLogros").addClass("botonRed");
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
        
                      
             
     <!--------------------------------------------------------------------> 
     <div class="contenedor" style="width: 97%; margin: 0 auto;" aling="center">
        <table align="center" width="100%"  border="0">
            <tr>
                <td align="left" class="color-text-rojo" colspan="3"><h3>Actualización De Logros</h3></td>    
            </tr>
            <tr>
                <td colspan="3" aling="center" class="color-text-gris"><h2>Ubicación:</h2></td>
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
                <td><select name="periodo" class="box-text" style="font-size: 12px;"  id="periodo" required > 
                        <option>PRIMERO</option>
                        <option>SEGUNDO</option>
                        <option>TERCERO</option>
                        <option>CUARTO</option>
                    </select>
                </td>
                <td align="right"><select name="grado" class="box-text" id="grado" style="font-size: 12px;"  onchange="cargarMaterias()" required focus>
                                    <option></option>
                                        <?php foreach($grados as $grado){ ?>
                                        <option value="<?php echo $grado->getIdGrado(); ?>"><?php echo $grado->getNombre(); ?></option>
                                        <?php } ?>
                                   </select>
                </td>
                <td align="right">
                    <select name="materia" class="box-text" id="materia" style="font-size: 12px;"  required> 
                      
                    </select>
                </td>
            </tr>
             </table>
         </br>
         <table align="right"  border="0">
            <tr>
                <td>
                     <td id="nuevo1" hidden align="right"><input name="nuevo" id="nuevo" type="submit" value="Nuevo" class="botonRed" onclick="nuevo()" /></td>
                </td>    
                <td align="right">
                    <button name="cargarLogros" id="cargarLogros" type="submit" class="botonRed" onclick="cargarLogros()"  disabled>Actualizar Logros</button>  
                </td>
        
            </tr>   
        </table> 
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <table id="logros" align="center" width="100%"  border="0"></table>
         
      </div>
</body>
</html>