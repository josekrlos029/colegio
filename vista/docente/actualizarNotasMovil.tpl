<script>

 
$(function(){
    $('#filter').keyup(searchOnTable);

    
    $("#btnRecorrer").click(function(){
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
                var nombres, apellidos,idPersona, nota;
                
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
                           nota = $(this).children("input").val();
                            break;
                    }
                $(this).css("background-color", "#ECF8E0");
                });
               arreglo[i] = new Array(idPersona,nota); 
               i++;
            });
            
           
            var notas = JSON.encode(arreglo);
            var idMateria = document.getElementById("materia").value;
            var periodo = document.getElementById("periodo").value;
             var url="/colegio/docente/guardarNotasMovil";
        var data="notas="+notas+"&idMateria="+idMateria+"&periodo="+periodo;
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
});
 </script>         
 <!------------------------------cabecera--------------------------->  

                <div id="cabecera" class="red">   
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="0">
                            <tr> 
                            <td align="left">   
                                <h1 style="font-size: 20px">Calificaciones de Estudiantes</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                    
                </div>
        </div> 
               
                         
     <!--------------------------------------------------------------------> 
 <div style="margin-left: 5%;">
        <table class="table" style="font-size: 11px">
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
       
<table style="font-size: 10px" class="table" id="tabla" width="90%" border="0" align="center" cellpadding="0" cellspacing="0" >
        <tr style="font-weight: bold">
        <td width="12%"><div align="right" >IDENT.</div></td>
        <td><div align="center">APELLIDOS</div></td>
        <td><div align="center" >NOMBRES</div></td>
        <td width="8%"><div align="center" >NOTA</div></td>
        <td width="6%"><div align="center" >ESTADO</div></td>
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
    }
    ?>
    <tr class="recorrer">
        <td align="left"><?php echo $fila['idPersona'];?></td>
        <td align="left"><?php echo strtoupper ($fila['pApellido']." ".$fila['sApellido']);?></td> 
        <td><?php echo strtoupper ($fila['nombres']);?></td>
        <td><input type="number" style="width: 30px;" value="<?php echo $not;?>" class="box-text" /></td>
        <?php  if($not>='30'){   ?>
        <td align="center"><img src="../imagenes/iconos/exitoCalificacion.png"  /></td>
        <?php }else{ ?>
        <td align="center"><img src="../imagenes/iconos/errorCalificacion.png" /></td>
        <?php
        } 
    }//fin del For ?>
    </tr>
</table>
</br>
<table  width="90%" border="0" align="center" cellpadding="1" cellspacing="0" class="tabla">
    <tr>
        <td align="right">
            <button id="btnRecorrer" class="botonRed"> Guardar </button>
             <input type="hidden" id="materia" name="materia" value="<?php echo $materia->getIdMateria(); ?>"/>
            
        </td>
    </tr>
</table>
<form action="/colegio/docente/actualizarNotas" method="post" id="formulario">
    <input type="hidden" name="salon" id="salon" value="<?php echo $idSalon; ?>"/>
    <input type="hidden" name="periodo" id="periodo" value="<?php echo $periodo; ?>"/>
    
                
            </form>