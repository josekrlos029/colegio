<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
 <title><?php echo $titulo; ?></title>
 
 
 <script>
     $(function () {
  $("#btnRecorrer").click(function () {
  var arreglo = new Array();
  var i = 0;
   var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
            $("#tabla .recorrer").each(function (index) {
                var nombres, apellidos,idPersona, primerP, segundoP, tercerP, cuartoP;
                
                 $(this).children("td").each(function (index2) {
                     switch (index2) {
                         case 0:
                             idPersona = $(this).text();
                             break;
                         case 1:
                             nombres = $(this).text();
                         break;
                         case 2:
                             apellidos = $(this).text();
                         break;
                        case 3:
                           primerP = $(this).children("input").val();
                            break;
                       case 4:
                           segundoP = $(this).children("input").val();
                            break;
                            case 5:
                           tercerP = $(this).children("input").val();
                            break;
                            case 6:
                           cuartoP = $(this).children("input").val();
                            break;
                    }
                $(this).css("background-color", "#ECF8E0");
                })
               arreglo[i] = new Array(idPersona,primerP,segundoP,tercerP,cuartoP); 
               i++;
            });
            
            
            var notas = JSON.encode(arreglo);
            var idMateria = document.getElementById("materia").value;
             var url="/colegio/docente/guardarNotas";
        var data="notas="+notas+"&idMateria="+idMateria;
        envioJson(url,data,function respuesta(res){               
            if (res==1){
            x.html("Notas Actualizadas Correctamente");
            exito();
            ocultar();
            }
            
         });  
        }); 
        });
        
        function inhabilitar(periodo){
                
                if (periodo=="PRIMERO"){
                         $("#tabla .recorrer").each(function (index) {    
                            $(this).children("td").each(function (index2) {
                                switch (index2) {
                                case 4:
                                    $(this).children("input").attr("disabled", "disabled");
                                    break;
                                case 5:
                                    $(this).children("input").attr("disabled", "disabled");
                                    break;
                                case 6:
                                    $(this).children("input").attr("disabled", "disabled");
                                    break;
                                }
             
                            })
               
                         });
                }
                if (periodo==="SEGUNDO"){
                         $("#tabla .recorrer").each(function (index) {    
                            $(this).children("td").each(function (index2) {
                                switch (index2) {
                                case 3:
                                    $(this).children("input").attr("disabled", "disabled");
                                    break;
                                case 5:
                                    $(this).children("input").attr("disabled", "disabled");
                                    break;
                                case 6:
                                    $(this).children("input").attr("disabled", "disabled");
                                    break;
                                }
             
                            })
               
                         });               
                }
                                
                if (periodo==="TERCERO"){
                                $("#tabla .recorrer").each(function (index) {    
                            $(this).children("td").each(function (index2) {
                                switch (index2) {
                                case 4:
                                    $(this).children("input").attr("disabled", "disabled");
                                    break;
                                case 3:
                                    $(this).children("input").attr("disabled", "disabled");
                                    break;
                                case 6:
                                    $(this).children("input").attr("disabled", "disabled");
                                    break;
                                }
             
                            })
               
                         });
                         
                }
                if (periodo==="CUARTO"){
                                       $("#tabla .recorrer").each(function (index) {    
                            $(this).children("td").each(function (index2) {
                                switch (index2) {
                                case 4:
                                    $(this).children("input").attr("disabled", "disabled");
                                    break;
                                case 5:
                                    $(this).children("input").attr("disabled", "disabled");
                                    break;
                                case 3:
                                    $(this).children("input").attr("disabled", "disabled");
                                    break;
                                }
             
                            })
               
                         });
                  
                }
                                
                               
                   


        }
        
 </script>

 </head>
 
 <body onload="inhabilitar('<?php echo $periodo; ?>')">
      <div class="cabecera">
        <?php include HOME . DS . 'includes' . DS . 'headerDocente.php'; ?>
        </div>
<p>&nbsp;</p>
   <div id="mensaje" hidden> </div>
<h1>Calificaciones de Estudiantes</h1>
<table  width="80%" border="0" align="center" cellpadding="1" cellspacing="0">
    <tr class="modo1">
       <td>Salon</td>
       <td>Materia</td>
       <td>Horas</td>
    </tr>

    <tr>
        <td><?php echo " ". $idSalon; ?></td>
        <td><?php echo " ". strtoupper ($materia->getNombreMateria());?></td>
        <td><?php echo " ".$materia->getHoras();?></td>
    </tr>

</table>
<table  width="80%" border="0" align="center" cellpadding="1" cellspacing="0" class="tabla" id="tabla">
    <tr>
        <td width="12%"><div align="center" >IDENTIFICACION</div></td>
        <td><div align="center">APELLIDOS</div></td>
        <td><div align="center" >NOMBRES</div></td>
        <td width="6%"><div align="center" >PRIMER PERIODO</div></td>
        <td width="6%"><div align="center" >SEGUNDO PERIODO</div></td>
        <td width="6%"><div align="center" >TERCER PERIODO</div></td>
        <td width="6%"><div align="center" >CUARTO PERIODO</div></td>
        <td width="10%"><div align="center" >PROMEDIO</div></td>
        <td width="6%"><div align="center" >ESTADO</div></td>
    </tr>
    
    <?php foreach ($resultado as $fila) { ?>
    <tr class="recorrer" id="cebra" >
        <td align="right"><a class="texto" href="guardar_notas.php?idEstudiante=<?php echo $fila['idPersona'];?>"><?php echo $fila['idPersona'];?></a></td>
        <td align="center"><?php echo strtoupper ($fila['pApellido']." ".$fila['sApellido']);?></td> 
        <td><?php echo strtoupper ($fila['nombres']);?></td>
        <td><input type="text" value="<?php echo $fila['primerP'];?>" /></td>
        <td><input type="text" value="<?php echo $fila['segundoP'];?>" /></td>
        <td><input type="text" value="<?php echo $fila['tercerP'];?>" /></td>
        <td><input type="text" value="<?php echo $fila['cuartoP'];?>" /></td>
        <td>  <?php echo $fila['def'];?></td>
        <?php  if($fila['def']>='3'){   ?>
        <td align="center"><img src="../utiles/imagenes/iconos/exito.png" /></td>
        <?php }else{ ?>
        <td align="center"><img src="../utiles/imagenes/iconos/error.png" /></td>
        <?php
        } 
    }//fin del For ?>
    </tr>
</table>
</br>
<table  width="80%" border="0" align="center" cellpadding="1" cellspacing="0" class="tabla">
    <tr>
        <td align=center">
             <input type="hidden" id="materia" name="materia" value="<?php echo $materia->getIdMateria(); ?>"/>
            <button id="btnRecorrer" class="button large red"> Guardar </button>
        </td>
    </tr>
</table>
</body>
<?php include HOME . DS . 'includes' . DS . 'footer.php'; ?>
</html>