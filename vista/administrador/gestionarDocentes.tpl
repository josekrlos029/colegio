   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
        <title><?php echo $titulo; ?></title>
     

<script type="text/javascript">


function envio(){
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

    if (idPersona.value=="" || nombres.value=="" || pApellido.value=="" || sApellido.value=="" || fNacimiento.value==""){
        x.html ( "<p>Error: Tiene Campos requeridos Vacios</p>");
        error();
        ocultar();
    }else{

        var url="/colegio/administrador/agregarDocente/";
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
</script>
    </head>
    <body>
        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
        <!------------------------------cabecera--------------------------->  
          <p>&nbsp;</p>
            <p>&nbsp;</p>
              <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="red">
                    <div class="color-text-blanco" id="title-cab"><h1>Gestion De docentes</h1> </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                      
                         
     <!--------------------------------------------------------------------> 
      
        
            <table width="600" border="0" cellspacing="0" cellpadding="2">
                <tr>
                    <td></td>
                    <td align="left" class="color-text-gris"><h1>DATOS DEL docente</h1></td>
                </tr>  
                <tr>
                    <td align="right" width="40%">Identificación del Docente:</td>
                    <td><input name="idPersona" id="idPersona" class="box-text"  type="text" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Nombres:</td>
                    <td><input name="nombres" id="nombres" class="box-text"  type="text" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Primer Apellido:</td>
                    <td><input name="pApellido" id="pApellido" class="box-text"  type="text" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Segundo Apellido:</td>
                    <td><input name="sApellido" id="sApellido" class="box-text"  type="text" required/></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Sexo:</td>
                    <td><select name="sexo" id="sexo" class="box-text" >
                            <option>M</option>
                            <option>F</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right" width="40%">Telefono:</td>
                    <td><input name="telefono" id="telefono" class="box-text"  type="number" /></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Direccion:</td>
                    <td><input name="direccion" id="direccion" class="box-text"  type="text" /></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Correo:</td>
                    <td><input name="correo" id="correo" class="box-text"  type="email" /></td>
                </tr>
                <tr>
                    <td align="right" width="40%">Fecha de Nacimiento:</td>
                    <td><input name="fNacimiento" id="fNacimiento" class="box-text"  type="date" required/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input name="agregarDocente" id="agregarDocente" type="submit" class="button large red" value="Guardar" onclick="envio()" /></td>
                </tr>

            </table>
     
      <p>&nbsp;</p>
     <hr>
     <p>&nbsp;</p>
      
      
            <table width="1000" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
           <tr>
               <td align="center" class="color-text-gris" colspan="9"><h1>docentes registrados</h1></td>
           </tr>
         
         
                <tr class="modo5">
                    <td>Documento</td>
                    <td>Nombres</td>
                    <td>P.Apellido</td>
                    <td>S.Apellido</td>
                    <td>Sexo</td>
                    <td>Telefono</td>
                    <td>Dirección</td>
                    <td>Correo</td>
                    <td>Fecha de Nacimiento</td>
                </tr> 
           
   
            <tbody>
                  
                <?php foreach ($docentes as $docente) { ?>
                <tr class="modo6" id="cebra3">
                    <td><a href="#"><?php echo $docente->getIdPersona();?></a></td>
                    <td><?php echo $docente->getNombres();?></td>
                    <td><?php echo $docente->getPApellido();?></td>
                    <td><?php echo $docente->getSApellido();?></td>
                    <td><?php echo $docente->getSexo();?></td>
                    <td><?php echo $docente->getTelefono();?></td>
                    <td><?php echo $docente->getDireccion();?></td>
                    <td><?php echo $docente->getCorreo();?></td>
                    <td><?php echo $docente->getFNacimiento()->format('Y-m-d');?></td>
                </tr>
                <?php } ?>
              
            </tbody>
        </table>
     div>    
    </body>
</html>