 <script>
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
$(function(){
    $('#filter').keyup(searchOnTable);
    
});

function alerta(error){
    alert(error);
}

function notas(){
               
               
   var periodo = $("#periodo").val();
   var salon = $("#salon").val();
   var materia = $("#materia").val();
           
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
    var x = $("#content");
    
                           //var url="http://controlacademico.liceogalois.com/estudiante/datosAcademicosMovil";
                           var url="/colegio/docente/actualizarNotasMovil";
                           var data="periodo="+periodo+"&salon="+salon+"&materia="+materia;

                           envioJson2(url,data,function respuesta(res){   
                               x.html(res);
                            });    
     $.mobile.loading( "hide" );                       
}

function inasistencias(){
    var periodo = $("#periodo").val();
   var salon = $("#salon").val();
   var materia = $("#materia").val();
           
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
    var x = $("#content");
    
                           //var url="http://controlacademico.liceogalois.com/estudiante/datosAcademicosMovil";
                           var url="/colegio/docente/asignarInasistenciasMovil";
                           var data="periodo="+periodo+"&salon="+salon+"&materia="+materia;

                           envioJson2(url,data,function respuesta(res){   
                               x.html(res);
                            });    
     $.mobile.loading( "hide" );                      
}
 </script>
 </head>
<?php 
if(isset($error)){
?>
<body onload="alerta('<?php echo $error; ?>')">
<?php 
}else{
?>
<body>
<?php 
}
?>
   
       
          <!------------------------------cabecera--------------------------->  
          
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
    <tr>
          <td align="left"><?php echo $fila['idPersona'];?></td>
        <td align="left"><?php echo strtoupper ($fila['pApellido']." ".$fila['sApellido']);?></td> 
        <td align="left"><?php echo strtoupper ($fila['nombres']);?></td>
        <td align="center"><?php echo $not;?></td>
        <?php  if( $not>='30'){   ?>
        <td align="center" ><img src="../imagenes/iconos/exitoCalificacion.png"/></td>
        <?php }else{ ?>
        <td align="center"><img src="../imagenes/iconos/errorCalificacion.png" /></td>
        <?php
        } 
    }//fin del For ?>
    </tr>
</table>
</br>
<div style="margin-right: 5%;">
<table  align="right" >
    <tr>
        <td align="right"> 
            
                <input type="hidden" name="salon"  id="salon" value="<?php echo $idSalon; ?>"/>
                <input type="hidden" name="periodo" id="periodo" value="<?php echo $periodo; ?>"/>
                <input type="hidden" name="materia" id="materia" value="<?php echo $materia->getIdMateria(); ?>"/>
                <input type="submit" name="Actualizar" onclick="notas()"  style="font-size: 11px;" class="botonRed" value="Actualizar Notas"/>
            
        </td>
        <td align="right"> 
            <input type="submit" name="inasistencias" onclick="inasistencias()" style="font-size: 11px;" class="botonRed" value="Actualizar Inasistencias"/>
            </form>
        </td>
    </tr>
</table>
    </div>
</body>
</html>