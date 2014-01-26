<script>
function cargarMaterias(){ 
 
 var y =$("#materia"); 
 var b= $("#ingresoNotas");
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
 var idSalon = document.getElementById("salon").value;

    if (idSalon!=""){
        var url="/colegio/docente/imprimirMateriasPorSalonMovil";
        var data="idDocente="+localStorage.getItem('idPersona')+"&idSalon="+idSalon;
        envioJson(url,data,function respuesta(res){               
        y.html (res);
        b.removeAttr("disabled");
         $.mobile.loading( "hide" );     
         });  
    }
    }
    
function ingresoNotas(){ 
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
 var y =$("#content"); 
 var periodo= document.getElementById("periodo").value;
 var materia= document.getElementById("materia").value;
 var idSalon = document.getElementById("salon").value;

    if (idSalon!="" && periodo!="" && materia!=""){
        var url="/colegio/docente/verNotasMovil";
        var data="periodo="+periodo+"&salon="+idSalon+"&materia="+materia+"&idPersona="+localStorage.getItem('idPersona');
        envioJson2(url,data,function respuesta(res){               
        y.html (res);
         });  
    }else{
       alert("Seleccione todos los campos"); 
    }
     $.mobile.loading( "hide" );     
 }

</script>
    
   <table aling="center" width="100%"  border="0" >
       <tr>
           <td align="center" class="color-text-rojo" colspan="3"><h3>Ingreso De Notas</h3></td>    
       </tr>
        <tr>
           <td colspan="3" aling="center" class="color-text-gris"><h2>Ubicacion:</h2></td>
       </tr> 
       <tr>
           <td class="color-text-rojo" width="30%" style="padding: 5px;">Periodo</td>
           <td class="color-text-rojo" width="30%" align="left" style="padding: 5px;">Salon</td>
           <td class="color-text-rojo" width="30%" align="left" style="padding: 5px;">Materia</td>
       </tr>
        <tr>
           <td colspan="3"><hr></td>
       </tr> 
       <tr>
           <td><div id="select1"><select name="periodo" class="box-text" id="periodo" style="font-size: 13px;" required > 
                   <option>PRIMERO</option>
                   <option>SEGUNDO</option>
                   <option>TERCERO</option>
                   <option>CUARTO</option>
               </select>
                </div>
           </td>
           <td align="left"><select name="salon" class="box-text" id="salon" style="font-size: 13px;" onchange="cargarMaterias()" required focus>
                        <option></option>
                        <?php foreach($salones as $salon) { ?>
                        <option><?php  echo $salon; ?></option>
                        <?php } ?>
               </select>
           </td>
           <td align="left">
               <select name="materia" class="box-text" id="materia" style="font-size: 13px;" required> 
                      
               </select>
           </td>
       </tr>  
      </table>
    </br>
    <table align="center">
       <tr>
           <td colspan="3" aling="center">
               <input name="ingresoNotas" id="ingresoNotas" type="submit" value="Ingresar Notas" class="botonRed" onclick="ingresoNotas()" />  
           </td>
       </tr>   
   </table>    