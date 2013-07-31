   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
   
        <title><?php echo $titulo; ?></title>


<script type="text/javascript">
    
function envio(){ 
  
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
 /**Datos Personales********************/
 var idPersona = document.getElementById("idPersona");
 var tipoDocumento = document.getElementById("tipoDocumento");
 var lugarExpedicion = document.getElementById("lugarExpedicion");
 var fechaExpedicion = document.getElementById("fechaExpedicion");
 var nombres = document.getElementById("nombres");
 var pApellido = document.getElementById("pApellido");
 var sApellido = document.getElementById("sApellido");
 var sexo = document.getElementById("sexo");
 var tipoSanguineo = document.getElementById("tipoSanguineo");
 var eps = document.getElementById("eps");
 var telefono = document.getElementById("telefono");
 var correo = document.getElementById("correo");
 var instProcedencia= document.getElementById("instProcedencia");
 /**fin de los datos personales********/
 
 /***Datos de nacimiento***/
 var fNacimiento = document.getElementById("fNacimiento");
 var paisNacimiento = document.getElementById("paisNacimiento");
 var departamentoNacimiento = document.getElementById("departamentoNacimiento");
 var municipioNacimiento= document.getElementById("municipioNacimiento");
 /***fin de datos nacimiento****/
 
 /** datos de ubicacion***/
 var direccion = document.getElementById("direccion");
 var barrio = document.getElementById("barrio");
 var municipioResidencia = document.getElementById("municipioResidencia");
 /**fin de datos ubicacion***/
 
 /** datos del padre**/
 var idPadre = document.getElementById("idPadre");
 var nombresPadre = document.getElementById("nombresPadre");
 var apellidosPadre = document.getElementById("apellidosPadre");
 var ocupacionPadre  = document.getElementById("ocupacionPadre");
 var telPadre = document.getElementById("telPadre");
 var telOficinaPadre = document.getElementById("telOficinaPadre");
 var dirPadre = document.getElementById("dirPadre");
 /** fin datos del padre***/
 
 /*** datos  de la madre ***/
 var idMadre = document.getElementById("idMadre");
 var nombresMadre = document.getElementById("nombresMadre");
 var apellidosMadre = document.getElementById("apellidosMadre");
 var ocupacionMadre  = document.getElementById("ocupacionMadre");
 var telMadre = document.getElementById("telMadre");
 var telOficinaMadre = document.getElementById("telOficinaMadre");
 var dirMadre = document.getElementById("dirMadre");
/*** fin de datos de la madre****/

/*** datos del acudiente***/
 var idAcudiente = document.getElementById("idAcudiente");
 var nombresAcudiente = document.getElementById("nombresAcudiente");
 var apellidosAcudiente = document.getElementById("apellidosAcudiente");
 var ocupacionAcudiente  = document.getElementById("ocupacionAcudiente");
 var telAcudiente = document.getElementById("telAcudiente");
 var telOficinaAcudiente = document.getElementById("telOficinaAcudiente");
 var dirAcudiente = document.getElementById("dirAcudiente");
/***fin datos del acudiente***/

 if (idPersona.value=="" || tipoDocumento.value=="" || lugarExpedicion.value=="" || fechaExpedicion.value=="" || nombres.value==""  || pApellido.value=="" || sApellido.value=="" || sexo.value=="" || tipoSanguineo.value=="" || eps.value=="" || telefono.value=="" || correo.value=="" ){
      x.html ( "<p>Error: Tiene Campos Vacios en los Datos Personales</p>");
      error();
      ocultar();
  }else if(fNacimiento.value=="" || paisNacimiento.value=="" || departamentoNacimiento.value=="" || municipioNacimiento.value=="" ){
      x.html ( "<p>Error: Tiene Campos Vacios en los Datos de Nacimiento</p>");
      error();
      ocultar();
   }else if(direccion.value=="" || barrio.value=="" || municipioResidencia.value=="" ){
      x.html ( "<p>Error: Tiene Campos Vacios en los Datos de Ubicacion</p>");
      error();
      ocultar();
   }else if(idPadre.value=="" || nombresPadre.value=="" || apellidosPadre.value=="" || ocupacionPadre.value=="" || telPadre.value=="" ||dirPadre.value==""){
      x.html ( "<p>Error: Tiene Campos Vacios en los Datos del Padre</p>");
      error();
      ocultar();
   }else if(idMadre.value=="" || nombresMadre.value=="" || apellidosMadre.value=="" || ocupacionMadre.value=="" || telMadre.value=="" ||dirMadre.value==""){
      x.html ( "<p>Error: Tiene Campos Vacios en los Datos del Madre</p>");
      error();
      ocultar();
   }else if(idAcudiente.value=="" || nombresAcudiente.value=="" || apellidosAcudiente.value=="" || ocupacionAcudiente.value=="" || telAcudiente.value=="" || dirAcudiente.value==""){
      x.html ( "<p>Error: Tiene Campos Vacios en los Datos del Acudiente</p>");
      error();
      ocultar();
   }else{
  
        var url="/colegio/administrador/guardarEstudiantes/";
        var data="idPersona="+idPersona.value+"&tipoDocumento="+tipoDocumento.value+"&lugarExpedicion="+lugarExpedicion.value+"&fechaExpedicion="+fechaExpedicion.value+"&nombres="+nombres.value+"&pApellido="+pApellido.value+"&sApellido="+sApellido.value+"&sexo="+sexo.value+"&tipoSanguineo="+tipoSanguineo.value+"&eps="+eps.value+"&telefono="+telefono.value+"&correo="+correo.value+"&instProcedencia="+instProcedencia.value+
                 "&fNacimiento="+fNacimiento.value+"departamentoNacimiento="+departamentoNacimiento.value+"&municipioNacimiento="+municipioNacimiento.value+
                 "&direccion="+direccion.value+"&barrio="+barrio.value+"&municipioResidencia="+municipioResidencia.value+
                 "&idPadre="+idPadre.value+"&nombresPadre="+nombresPadre.value+"&apellidosPadre="+apellidosPadre.value+"&ocupacionPadre="+ocupacionPadre.value+"&telPadre="+telPadre.value+"&telOficinaPadre="+telOficinaPadre.value+"&dirPadre="+dirPadre.value+
                 "&idMadre="+idPadre.value+"&nombresMadre="+nombresMadre.value+"&apellidosMadre="+apellidosMadre.value+"&ocupacionMadre="+ocupacionMadre.value+"&telMadre="+telMadre.value+"&telOficinaMadre="+telOficinaMadre.value+"&dirMadre="+dirMadre.value+
                 "&idAcudiente="+idAcudiente.value+"&nombresAcudiente="+nombresAcudiente.value+"&apellidosAcudiente="+apellidosAcudiente.value+"&ocupacionAcudiente="+ocupacionPadre.value+"&telPadre="+telAcudiente.value+"&telOficinaAcudiente="+telOficinaAcudiente.value+"&dirAcudiente="+dirAcudiente.value;
        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                    x.html ("<p>Estudiante Registrado Correctamente, HAGA CLICK <a href='/colegio/administrador/matricularEstudiante/"+idPersona.value+"'>AQUI</a> SI DESEA MATRICULARLO INMEDIATAMENTE, sino desea agregar otro estudiante por favor refresque la página (f5)</p>");
                    $("#idPersona").attr("disabled","disabled");
                    exito();
                    ocultar();
                
            }else{
                x.html ( "<p>"+res+"</p>");
                idMateria.value="";
                idGrado.setAttribute("autofocus","true");
                nombre.value="";
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
        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
        </div>
      <!------------------------------cabecera--------------------------->  
        <p>&nbsp;</p>
            </br>
           <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden><?php echo $mensaje; ?> </div>
                <div id="cabecera" class="blue">
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Registrar Estudiantes</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                     
                         
     <!-------------------------------------------------------------------->         
 <ul id="accordion">
<li><span><h1>DATOS Personales</h1></span>
    <ul> 
<table width="50%" border="0" cellspacing="0" cellpadding="2">
    
                <tr>
                    <td align="right" width="40%" >Identificación del Estudiante:</td>
                    <td><input name="idPersona" id="idPersona" type="text" class="box-text" required/></td>
                </tr>
<!-- nuevosCampos-->     
                <tr>
                    <td align="right" width="40%" >Tipo de Documento de Identidad:</td>
                     <td><select name="tipoDocumento" id="tipoDocumento" >
                            <option>T.I</option>
                            <option>R.C</option>
                            <option>C.C</option>
                        </select></td>
                </tr>
                  <tr>
                    <td align="right">Lugar de Expedicion:</td>
                    <td><input name="lugarExpedicion" id="lugarExpedicion" type="text" class="box-text"  /></td>
                </tr>
                  <tr>
                    <td align="right">fecha de expedicion:</td>
                    <td><input name="fechaExpedicion" id="fechaExpedicion" type="date" class="box-text"  /></td>
                </tr>
<!-- EndNuevosCampos-->                  
                <tr>
                    <td align="right">Nombres:</td>
                    <td><input name="nombres" id="nombres" type="text" class="box-text"  required/></td>
                </tr>
                <tr>
                    <td align="right">Primer Apellido:</td>
                    <td><input name="pApellido" id="pApellido" type="text" class="box-text"  required/></td>
                </tr>
                <tr>
                    <td align="right">Segundo Apellido:</td>
                    <td><input name="sApellido" id="sApellido" type="text" class="box-text"  required/></td>
                </tr>
                <tr>
                    <td align="right">Sexo:</td>
                    <td><select name="sexo" id="sexo" >
                            <option>M</option>
                            <option>F</option>
                        </select></td>
                </tr>
<!-- nuevosCampos--> 
                 <tr>
                    <td align="right">tipo Sanguineo:</td>
                    <td><select name="tipoSanguineo" id="tipoSanguineo" >
                        <option>
                        <option>O+
                        <OPTION>A+
                        <OPTION>B+
                        <OPTION>AB+
                        <OPTION>O-
                        <OPTION>A-
                        <OPTION>B-              
                        <OPTION>AB-            
                        </select></td>
                </tr>
                 <tr>
                    <td align="right">Eps:</td>
                    <td><input name="eps" id="eps" type="text" class="box-text"  required/></td>
                </tr>
<!-- EndNuevosCampos-->
                <tr>
                    <td align="right">Telefono:</td>
                    <td><input name="telefono" id="telefono" type="number" class="box-text"  required/></td>
                </tr>
               
                <tr>
                    <td align="right">Correo:</td>
                    <td><input name="correo" id="correo" type="email" class="box-text"  /></td>
                </tr>
                <tr>
                    <td align="right">Institucion de Procedencia:</td>
                    <td><input name="instProcedencia" id="instProcedencia" type="text" class="box-text"  required/></td>
                </tr>
                
            </table>
</ul>
</li>
  
 <li><span><h1>DATOS DE NACIMIENTO</h1></span>
<ul>
<table width="50%" border="0" cellspacing="0" cellpadding="2">
                
                <tr>
                    <td align="right">Fecha de Nacimiento:</td>
                    <td><input name="fNacimiento" id="fNacimiento" type="date"  class="box-text"  required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Pais:</td>
                    <td><input name="paisNacimiento" id="paisNacimiento" type="text" class="box-text" value="Colombia" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Departamento:</td>
                    <td><input name="departamentoNacimiento" id="departamentoNacimiento" type="text" class="box-text" value="Cesar" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Municipio:</td>
                    <td><input name="municipioNacimiento" id="municipioNacimiento" type="text" class="box-text" value="Valledupar" required/></td>
                </tr>
                <tr>
                    <td colspan="2" align="left" class="color-text-gris"><h1>DATOS DE UBICACION</h1></td>
                </tr>
                 <tr>
                    <td align="right">Direccion:</td>
                    <td><input name="direccion" id="direccion" type="text" class="box-text"  required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Barrio:</td>
                    <td><input name="barrio" id="barrio" type="text" class="box-text" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Municipio:</td>
                    <td><input name="municipioResidencia" id="municipioResidencia" type="text" class="box-text" value="Valledupar" required/></td>
                </tr>
                </table>
     
    
</ul>
</li>   
 
 <li><span><h1>DATOS DEl PADRE</h1> </span>
<ul>
 <table width="50%" border="0" cellspacing="0" cellpadding="2">
             
             
                 <tr>
                    <td align="right" width="40%" >Cedula:</td>
                    <td><input name="idPadre" id="idPadre" type="text" class="box-text" /></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Nombres:</td>
                    <td><input name="nombresPadre" id="nombresPadre" type="text" class="box-text" /></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Apellidos:</td>
                    <td><input name="apellidosPadre" id="apellidosPadre" type="text" class="box-text" /></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Ocupacion:</td>
                    <td><input name="ocupacionPadre" id="ocupacionPadre" type="text" class="box-text" /></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Telefono:</td>
                    <td><input name="telPadre" id="telPadre" type="text" class="box-text" /></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Telefono de Oficina:</td>
                    <td><input name="telOficinaPadre" id="telOficinaPadre" type="text" class="box-text" /></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Direccion:</td>
                    <td><input name="dirPadre" id="dirPadre" type="text" class="box-text" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="left" class="color-text-gris"><h1>DATOS DE La MADRE</h1></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Cedula:</td>
                    <td><input name="idMadre" id="idMadre" type="text" class="box-text" /></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Nombres:</td>
                    <td><input name="nombresMadre" id="nombresMadre" type="text" class="box-text" /></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Apellidos:</td>
                    <td><input name="apellidosMadre" id="apellidosMadre" type="text" class="box-text" /></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Ocupacion:</td>
                    <td><input name="ocupacionMadre" id="ocupacionMadre" type="text" class="box-text" /></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Telefono:</td>
                    <td><input name="telMadre" id="telMadre" type="text" class="box-text" /></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Telefono de Oficina:</td>
                    <td><input name="telOficinaMadre" id="telOficinaMadre" type="text" class="box-text" /></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Direccion:</td>
                    <td><input name="dirMadre" id="dirMadre" type="text" class="box-text" /></td>
                </tr>
                

       </table>      
    
</ul>
</li>  

<li><span><h1>DATOS DEl acudiente</h1></span>
<ul>
    <table width="50%" border="0" cellspacing="0" cellpadding="2">
 <tr>
                    <td align="right" width="40%" >Cedula:</td>
                    <td><input name="idAcudiente" id="idAcudiente" type="text" class="box-text" required/></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Nombres:</td>
                    <td><input name="nombresAcudiente" id="nombresAcudiente" type="text" class="box-text" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Apellidos:</td>
                    <td><input name="apellidosAcudiente" id="apellidosAcudiente" type="text" class="box-text" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Ocupacion:</td>
                    <td><input name="ocupacionAcudiente" id="ocupacionAcudiente" type="text" class="box-text" required/></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Telefono:</td>
                    <td><input name="telAcudiente" id="telAcudiente" type="text" class="box-text" required/></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Telefono de Oficina:</td>
                    <td><input name="telOficinaAcudiente" id="telOficinaAcudiente" type="text" class="box-text" /></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Direccion:</td>
                    <td><input name="dirAcudiente" id="dirAcudiente" type="text" class="box-text" required/></td>
                </tr>
                </table>  
</ul>
</li> 


<li><span ><h1 class="color-text-azul">Guardar Datos</h1></span>
<ul>
    </br>
<table>
  <tr>
      <td align="right"><input name="guardarEstudiantes" id="guardarEstudiantes" type="submit" class="button large blue" value="Guardar" onclick="envio()"/></td>
 </tr> 
 </table>
</ul>
</li> 

</ul>

 <script type="text/javascript">
 $("#accordion > li > span").click(function(){
 if(false == $(this).next().is(':visible')) {
 $('#accordion ul').slideUp(300);
 }
 $(this).next().slideToggle(300);
 });
 $('#accordion ul:eq(0)').show();
 </script>

    </body>
</html>