   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
   
        <title><?php echo $titulo; ?></title>


<script type="text/javascript">
    
function envio(){ 
  
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 

 
 var idPersona = document.getElementById("idPersona");
 var tipoDocumento = document.getElementById("tipoDocumento");
 var lugarExpedicion = document.getElementById("lugarExpedicion");
 var fechaExpedicion = document.getElementById("fechaExpedicion");
 var tipoSanguineo = document.getElementById("tipoSanguineo");
 var eps = document.getElementById("eps");
 var nombres = document.getElementById("nombres");
 var pApellido = document.getElementById("pApellido");
 var sApellido = document.getElementById("sApellido");
 var sexo = document.getElementById("sexo");
 var telefono = document.getElementById("telefono");
 var direccion = document.getElementById("direccion");
 var barrio = document.getElementById("barrio");
 var paisResidencia = document.getElementById("paisResidencia");
 var departamentoResidencia = document.getElementById("departamentoResidencia");
 var municipioResidencia = document.getElementById("municipioResidencia");
 var correo = document.getElementById("correo");
 var fNacimiento = document.getElementById("fNacimiento");
 var paisNacimiento = document.getElementById(" paisNacimiento");
 var departamentoNacimiento = document.getElementById("departamentoNacimiento");
 var municipioNacimiento= document.getElementById("municipioNacimiento");
var idAcudiente = document.getElementById("idAcudiente");
var nombresAcudiente = document.getElementById("nombresAcudiente");
var apellidosAcudiente = document.getElementById("apellidosAcudiente");
var ocupacion  = document.getElementById("ocupacion ");
var telAcudiente = document.getElementById("telAcudiente");
var telOficina = document.getElementById("telOficina");
var dirAcudiente = document.getElementById("dirAcudiente");

 if (idPersona.value=="" || nombres.value=="" || pApellido.value=="" || sApellido.value=="" || fNacimiento.value==""  || tipoDocumento.value=="" || lugarExpedicion.value=="" ||fechaExpedicion.value=="" || tipoSanguineo.value=="" || eps.value=="" || barrio.value==""  || paisResidencia.value=="" || municipioResidencia.value=="" || departamentoResidencia.value=="" || paisNacimiento.value=="" || departamentoNacimiento.value=="" || municipioNacimiento.value=="" || idAcudiente.value=="" || nombresAcudiente.value=="" || apellidosAcudiente.value=="" || ocupacion.value=="" || telAcudiente.value=="" || telOficina.value=="" || dirAcudiente.value==""){
    
    x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
      error();
      ocultar();
    }else{

        var url="/colegio/administrador/guardarEstudiantes/";
        var data="idPersona="+idPersona.value+"&nombres="+nombres.value+"&pApellido="+pApellido.value+"&sApellido="+sApellido.value+"&sexo="+sexo.value+"&telefono="+telefono.value+"&direccion="+direccion.value+"&correo="+correo.value+"&fNacimiento="+fNacimiento.value+"&tipoDocumento="+tipoDocumento.value+"&lugarExpedicion="+lugarExpedicion.value+"&fechaExpedicion="+fechaExpedicion.value+"&tipoSanguieno="+tipoSanguineo.value+"&eps="+eps.value+"&barrio="+barrio.value+"&paisResidencia="+paisResidencia.value+"&municipioResidencia="+municipioResidencia.value+"&departamentoResidencia="+departamentoResidencia.value+"&paisNacimiento="+paisNacimiento.value+"&municipioNacimiento="+municipioRNacimiento.value+"&departamentoNacimiento="+departamentoNacimiento.value+"&idAcudiente="+idAcudiente.value+"&nombresAcudiente="+nombresAcudiente.value+"&apellidosAcudiente="+apellidosAcudiente.value+"&ocupacion="+ocupacion.value+"&telAcudiente="+telAcudiente.value+"&dirAcudiente="+dirAcudiente.value+"&telOficina="+telOficina.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Estudiante Registrador Correctamente</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/RegistrarEstudiantes";
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
            <div id="mensaje" hidden> </div>
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
                    <td><input name="lugarExpedicion" id="lugarExpedicion" type="text" class="box-text"  required/></td>
                </tr>
                  <tr>
                    <td align="right">fecha de expedicion:</td>
                    <td><input name="fechaExpedicion" id="fechaExpedicion" type="text" class="box-text"  required/></td>
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
                    <td><input name="telefono" id="telefono" type="number" class="box-text"  /></td>
                </tr>
               
                <tr>
                    <td align="right">Correo:</td>
                    <td><input name="correo" id="correo" type="email" class="box-text"  /></td>
                </tr>
                <tr>
                    <td align="right">Institucion de Procedencia:</td>
                    <td><input name="instProcedencia" id="instProcedencia" type="text" class="box-text"  /></td>
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
                    <td><input name="direccion" id="direccion" type="text" class="box-text"  /></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Barrio:</td>
                    <td><input name="barrio" id="barrio" type="text" class="box-text" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Pais:</td>
                    <td><input name="paisResidencia" id="paisResidencia" type="text" class="box-text" value="Colombia" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%" >Departamento:</td>
                    <td><input name="departamentoResidencia" id="departamentoResidencia" type="text" class="box-text" value="Cesar" required/></td>
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
                    <td><input name="ocupacion" id="ocupacion" type="text" class="box-text" required/></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Telefono:</td>
                    <td><input name="telAcudiente" id="telAcudiente" type="text" class="box-text" required/></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Telefono de Oficina:</td>
                    <td><input name="telOficina" id="telOficina" type="text" class="box-text" required/></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Direccion:</td>
                    <td><input name="dirAcudiente" id="dirAcudiente" type="text" class="box-text" required/></td>
                </tr>
                <tr>
                    <td colspan="2" align="left" class="color-text-gris"><h1>DATOS DE La MADRE</h1></td>
                </tr>
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
                    <td><input name="ocupacion" id="ocupacion" type="text" class="box-text" required/></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Telefono:</td>
                    <td><input name="telAcudiente" id="telAcudiente" type="text" class="box-text" required/></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Telefono de Oficina:</td>
                    <td><input name="telOficina" id="telOficina" type="text" class="box-text" required/></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Direccion:</td>
                    <td><input name="dirAcudiente" id="dirAcudiente" type="text" class="box-text" required/></td>
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
                    <td><input name="ocupacion" id="ocupacion" type="text" class="box-text" required/></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Telefono:</td>
                    <td><input name="telAcudiente" id="telAcudiente" type="text" class="box-text" required/></td>
                </tr>
                 <tr>
                    <td align="right" width="40%" >Telefono de Oficina:</td>
                    <td><input name="telOficina" id="telOficina" type="text" class="box-text" required/></td>
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
      <td align="right"><input name="guardarEstudiantes" id="guardarEstudiantes" type="submit" class="button large blue" value="Guardar" onclick="envio()" /></td>
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