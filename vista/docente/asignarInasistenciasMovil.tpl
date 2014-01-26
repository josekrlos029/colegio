<script>
     $(function () {
  $("#btnRecorrer").click(function () {
  var arreglo = new Array();
  var i = 0;
  
  var $this = $( this ),
        theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
        msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
        textonly = !!$this.jqmData( "textonly" ),
        html =  "";
    $.mobile.loading( "show", {
            text: "Guardando Notas",
            textVisible: true,
            theme: theme,
            textonly: textonly,
            html: html
    });
 
            $("#tabla .recorrer").each(function (index) {
                var nombres, apellidos,idPersona, falla;
                
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
                           falla = $(this).children("input").val();
                            break;
                    }
                $(this).css("background-color", "#ECF8E0");
                });
               arreglo[i] = new Array(idPersona,falla); 
               i++;
            });
            
            
            var fallas = JSON.encode(arreglo);
            var idMateria = document.getElementById("materia").value;
             var url="/colegio/docente/guardarFallasMovil";
             var periodo = document.getElementById("periodo").value;
        var data="fallas="+fallas+"&idMateria="+idMateria+"&periodo="+periodo;
        envioJson(url,data,function respuesta(res){               
            if (res==1){
            $.mobile.loading( "hide");
            $.mobile.loading( "show", {
                        text: "Notas Guardadas Correctamente",
                        textVisible: true,
                        theme: theme,
                        textonly: false,
                        html: '<img src="../imagenes/iconos/exito.png" width="40" height="40" style="float:left" /> <h3 style="float:left; padding-left:40px;">Listo !</h3>'
                });
                setTimeout('$.mobile.loading( "hide");',3000);
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
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="0">
                         <tr>  
                            <td align="left">   
                                <h1>Inasistencias de Estudiantes</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                         
     <!--------------------------------------------------------------------> 
 <div style="margin-left: 5%;">
     <table class="table" style="font-size: 13px">
    <tr style="font-weight: bold"><td>Periodo</td>
       <td>Salon</td>
       <td>Materia</td>
       <td>Horas</td>
    </tr>

    <tr>
        <td><?php echo " ". $periodo; ?></td>
        <td><?php echo " ". $idSalon; ?></td>
        <td><?php echo " ". strtoupper ($materia->getNombreMateria());?></td>
        <td align="center"><?php echo " ".$materia->getHoras();?></td>
    </tr>


</table>
   </div> 
   
    <p>&nbsp;</p>
    <hr>
    <p>&nbsp;</p>
       
<table class="table" width="90%" border="0" align="center" cellpadding="0" cellspacing="0"  id="tabla">
    <tr class="modo1">
        <td width="12%"><div align="center" >IDENTIFICACION</div></td>
        <td width="12%"><div align="center">APELLIDOS</div></td>
        <td width="12%"><div align="center" >NOMBRES</div></td>
        <td width="3%"><div align="center" >FALLAS</div></td>        
    </tr>
    
    <?php foreach ($resultado as $fila) { 
    if($periodo=="PRIMERO"){
    $not=$fila['primerP'];
    }elseif($periodo=="SEGUNDO"){
    $not=$fila['segundoP'];
    }elseif($periodo=="TERCERO"){
    $not=$fila['tercerP'];
    }elseif($periodo=="CUARTO"){
    $not=$fila['cuartoP'];
    }?>
    
    <tr class="recorrer">
        <td align="left"><?php echo $fila['idPersona'];?></td>
        <td align="left"><?php echo strtoupper ($fila['pApellido']." ".$fila['sApellido']);?></td> 
        <td><?php echo strtoupper ($fila['nombres']);?></td>
        <td align="center"><input style="width: 40px;" type="number" value="<?php echo $not;?>" class="box-text" /></td>
       
        
        <?php
         
    }//fin del For ?>
    </tr>
</table>
</br>
<table  width="90%" border="0" align="center" cellpadding="1" cellspacing="0" class="tabla">
    <tr>
        <td align="center">
            <button id="btnRecorrer" class="botonRed"> Guardar </button>
             <input type="hidden" id="materia" name="materia" value="<?php echo $materia->getIdMateria(); ?>"/>
            
        </td>
    </tr>
</table>
<form action="/colegio/docente/asignarInasistencias" method="post" id="formulario">
                <input type="hidden" name="salon" id="salon" value="<?php echo $idSalon; ?>"/>
    <input type="hidden" name="periodo" id="periodo" value="<?php echo $periodo; ?>"/>
                
                
            </form>