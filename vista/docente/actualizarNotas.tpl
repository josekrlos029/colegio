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
            $("#formulario").submit();
            ocultar();
            }
            
         });  
        });
        
        $('#filter').keyup(searchOnTable);
        });
        
              var searchOnTable = function() {
    var table = $('#tabla');
    var value = this.value;
    table.find('.recorrer').each(function(index, row) {
        var allCells = $(row).find('td');
        if(allCells.length > 0) {
            var found = false;
            allCells.each(function(index, td) {
                var regExp = new RegExp(value, 'i');
                if(regExp.test($(td).text())) {
                    found = true;
                    return false;
                }
            });
            if (found == true) $(row).show();
            else $(row).hide();
        }
    });
};
        
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
                              <td>
           <!-- search -->
                                <div class="top-search">
                                     <div id="searchform" >
                                        <input type="text" value="" name="id" id="filter" onkeypress="" placeholder="Filtrar" />
                                     </div>	
                                </div>
        <!-- END search -->   
                            
                            
                            </td> 
                            <td align="right">   
                                <h1>Calificaciones de Estudiantes</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                    
                </div>
        </div> 
                <p>&nbsp;</p>
                      
                         
     <!--------------------------------------------------------------------> 
<div style="margin-left: 5%;">
     <table  width="50%" border="0" align="left" cellpadding="0" cellspacing="0" class="tabla">
    <tr class="modo1">
       <td>Salon</td>
       <td>Materia</td>
       <td>Horas</td>
    </tr>

    <tr>
        <td><?php echo " ". $idSalon; ?></td>
        <td><?php echo " ". strtoupper ($materia->getNombreMateria());?></td>
        <td align="center"><?php echo " ".$materia->getHoras();?></td>
    </tr>

</table>
   </div> 
     <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <hr>
    <p>&nbsp;</p>
       
<table  width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla" id="tabla">
    <tr class="modo1">
        <td width="12%"><div align="center" >IDENTIFICACION</div></td>
        <td width="12%"><div align="center">APELLIDOS</div></td>
        <td width="12%"><div align="center" >NOMBRES</div></td>
        <td width="3%"><div align="center" >PERIODO 1</div></td>
        <td width="3%"><div align="center" >PERIODO 2</div></td>
        <td width="3%"><div align="center" >PERIODO 3</div></td>
        <td width="3%"><div align="center" >PERIODO 4</div></td>
        <td width="3%"><div align="center" >PROMEDIO</div></td>
        <td width="6%"><div align="center" >ESTADO</div></td>
    </tr>
    
    <?php foreach ($resultado as $fila) { 
    $nota = new Nota();
    $prom=round($nota->calcularDef2($fila['primerP'],$fila['segundoP'],$fila['tercerP'],$fila['cuartoP']),2);
    ?>
    <tr class="recorrer" onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
        <td align="left"><?php echo $fila['idPersona'];?></td>
        <td align="left"><?php echo strtoupper ($fila['pApellido']." ".$fila['sApellido']);?></td> 
        <td><?php echo strtoupper ($fila['nombres']);?></td>
        <td><input type="text" value="<?php echo $fila['primerP'];?>" class="box-text" /></td>
        <td><input type="text" value="<?php echo $fila['segundoP'];?>" class="box-text" /></td>
        <td><input type="text" value="<?php echo $fila['tercerP'];?>" class="box-text"/></td>
        <td align="center"><input type="text" value="<?php echo $fila['cuartoP'];?>" class="box-text"/></td>
        <td align="center">  <?php echo $prom;?></td>
        <?php  if($prom>='30'){   ?>
        <td align="center"><img src="../utiles/imagenes/iconos/exitoCalificacion.png"  /></td>
        <?php }else{ ?>
        <td align="center"><img src="../utiles/imagenes/iconos/errorCalificacion.png" /></td>
        <?php
        } 
    }//fin del For ?>
    </tr>
</table>
</br>
<table  width="90%" border="0" align="center" cellpadding="1" cellspacing="0" class="tabla">
    <tr>
        <td align="right">
            <button id="btnRecorrer" class="button large red"> Guardar </button>
             <input type="hidden" id="materia" name="materia" value="<?php echo $materia->getIdMateria(); ?>"/>
            
        </td>
    </tr>
</table>
<form action="/colegio/docente/actualizarNotas" method="post" id="formulario">
                <input type="hidden" name="salon" value="<?php echo $idSalon; ?>"/>
                <input type="hidden" name="periodo" value="<?php echo $periodo; ?>"/>
                <input type="hidden" name="materia" value="<?php echo $materia->getIdMateria(); ?>"/>
                
            </form>
</body>

</html>