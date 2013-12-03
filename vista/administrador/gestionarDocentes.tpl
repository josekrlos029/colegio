   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
        <title><?php echo $titulo; ?></title>
     

<script type="text/javascript">


function envio(){
 var x = $("#mensaje");
cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
  
 var idPersona = document.getElementById("id");
 var nombres = document.getElementById("name");
 var pApellido = document.getElementById("primerApellido");
 var sApellido = document.getElementById("segundoApellido");
 var sexo = document.getElementById("sex");
 var telefono = document.getElementById("tel");
 var direccion = document.getElementById("dir");
 var correo = document.getElementById("email");
 var fNacimiento = document.getElementById("fechaNacimiento");

    if (idPersona.value=="" || nombres.value=="" || pApellido.value=="" || sApellido.value=="" || fNacimiento.value==""){
        x.html ( "<p>Error: Tiene Campos requeridos Vacios</p>");
        error();
        ocultar();
    }else{

        var url="/colegio/administrador/agregarDocente";
        var data="idPersona="+idPersona.value+"&nombres="+nombres.value+"&pApellido="+pApellido.value+"&sApellido="+sApellido.value+"&sexo="+sexo.value+"&telefono="+telefono.value+"&direccion="+direccion.value+"&correo="+correo.value+"&fNacimiento="+fNacimiento.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                 x.html ( "<p>Docente Registrador Correctamente</p>");
                 exito();
                 ocultar();
                 document.location.href="/colegio/administrador/gestionarDocentes";
                }else{
                x.html ( "<p>"+res+"</p>");
                idMateria.value="";
                idGrado.setAttribute("autofocus","true");
                nombre.value="";
                ocultar();
            }
         });
    }   
}

function consultaPersona(idPersona){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

var y= $("#tablaConsulta"); 
var url="/colegio/administrador/consultaGeneralPersona";
var data="idPersona="+idPersona;
 envioJson2(url,data,function respuesta(res){   
   x.hide();            
    y.html (res);
    
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'
});
 
      
}

function vistaActualizarPersona(idPersona){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

var y= $("#tablaConsulta"); 
var url="/colegio/administrador/actualizarGeneralPersona";
var data="idPersona="+idPersona;
 envioJson2(url,data,function respuesta(res){   
   x.hide();            
    y.html (res);
    
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'
});
 
      
}

function actualizarPersona(){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

 var idPersona = document.getElementById("idPersona");
 var nombres = document.getElementById("nombres");
 var pApellido = document.getElementById("pApellido");
 var sApellido = document.getElementById("sApellido");
 var sexo = document.getElementById("sexo");
 var telefono = document.getElementById("telefono");
 var direccion = document.getElementById("direccion");
 var correo = document.getElementById("correo");
 var fNacimiento = document.getElementById("fNacimiento");
 var Estado = document.getElementById("estado");
 
 

    if (idPersona.value=="" || nombres.value=="" || pApellido.value=="" || sApellido.value=="" || fNacimiento.value=="" || Estado.value==""){
    
    x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
      error();
      ocultar();
    }else{
        var url="/colegio/administrador/actualizaPersonas";
        var data="idPersona="+idPersona.value+"&nombres="+nombres.value+"&pApellido="+pApellido.value+"&sApellido="+sApellido.value+"&sexo="+sexo.value+"&telefono="+telefono.value+"&direccion="+direccion.value+"&correo="+correo.value+"&fNacimiento="+fNacimiento.value+"&Estado="+Estado.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Estudiante Actualizado Correctamente</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/gestionarDocentes";
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
 function seguimiento(){
           
            ocultar("familia");
            ocultar("datosAcademicos");
            $('#carga').load('/colegio/administrador/seguimiento'); 
            document.getElementById('carga').style.display="block";
            }
            function pension(){ 
            
            ocultar("familia");
            ocultar("datosAcademicos");
            $('#carga').load('/colegio/administrador/pension');
             document.getElementById('carga').style.display="block";
            }
            function ocultar(id){
            document.getElementById(id).style.display="none";
            }
            function mostrarAcademico(){
            ocultar("carga");
            ocultar("familia");
            document.getElementById('datosAcademicos').style.display="block";
            }
            function mostrarFamilia(){
            ocultar("carga");
            ocultar("datosAcademicos");
            document.getElementById('familia').style.display="block";
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
                <div id="cabecera" class="red">
                    
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Gestion De docentes</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                    
                </div>
        </div> 
                <p>&nbsp;</p>
                      
                         
     <!--------------------------------------------------------------------> 
      
        
            <table width="40%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                    <td></td>
                    <td align="left" class="color-text-gris"><h1>DATOS DEL docente</h1></td>
                </tr>  
                <tr>
                    <td align="right" width="40%">Identificación del Docente:</td>
                    <td><input name="idPersona" id="id" class="box-text"  type="text" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Nombres:</td>
                    <td><input name="name" id="name" class="box-text"  type="text" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Primer Apellido:</td>
                    <td><input name="primerApellido" id="primerApellido" class="box-text"  type="text" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Segundo Apellido:</td>
                    <td><input name="segundoApellido" id="segundoApellido" class="box-text"  type="text" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Sexo:</td>
                    <td><select name="sex" id="sex" >
                            <option>M</option>
                            <option>F</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right" width="40%">Telefono:</td>
                    <td><input name="tel" id="tel" class="box-text"  type="number" /></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Direccion:</td>
                    <td><input name="dir" id="dir" class="box-text"  type="text" /></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Correo:</td>
                    <td><input name="email" id="email" class="box-text"  type="email" /></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Fecha de Nacimiento:</td>
                    <td><input name="fechaNacimiento" id="fechaNacimiento" class="box-text"  type="date" required/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="agregarDocente" id="agregarDocente" type="submit" class="button large red" value="Guardar" onclick="envio()" /></td>
                </tr>

            </table>
     
      <p>&nbsp;</p>
     <hr>
     <p>&nbsp;</p>
      
      
            <table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
           <tr>
               <td align="center" class="color-text-gris" colspan="11"><h1>docentes registrados</h1></td>
           </tr>
         
         
                <tr class="modo1">
                    <td>Documento</td>
                    <td>Nombres</td>
                    <td>P.Apellido</td>
                    <td>S.Apellido</td>
                    <td>Sexo</td>
                    <td>Telefono</td>
                    <td>Dirección</td>
                    <td>Correo</td>
                    <td>consultar</td>
                    <td>actualizar</td>
               
                    
                </tr> 
           
   
            <tbody>
                  
                <?php foreach ($docentes as $docente) { ?>
                <tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                    <td><?php echo $docente->getIdPersona();?></a></td>
                    <td><?php echo $docente->getNombres();?></td>
                    <td><?php echo $docente->getPApellido();?></td>
                    <td><?php echo $docente->getSApellido();?></td>
                    <td><?php echo $docente->getSexo();?></td>
                    <td><?php echo $docente->getTelefono();?></td>
                    <td><?php echo $docente->getDireccion();?></td>
                    <td><?php echo $docente->getCorreo();?></td>
                    <td align="center"><a href="#" onclick="consultaPersona  ('<?=$docente->getIdPersona()?>')"><img src="../utiles/imagenes/iconos/consultarPersona.png"/></a></td>
                    <td align="center"><a href="#" onclick="vistaActualizarPersona('<?=$docente->getIdPersona()?>')"><img src="../utiles/imagenes/iconos/editarPersona.png"/></a></td>
                   
                </tr>
                <?php } ?>
              
            </tbody>
        </table>
     </div>
     
<div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <div style="float:right">
      <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
 </div>
      <div id="tablaConsulta">
     
      </div>

</div>

 
    </body>
</html>






