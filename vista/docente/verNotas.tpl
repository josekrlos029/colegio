<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
 <title><?php echo $titulo; ?></title>
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
    <div class="cabecera">
        <?php include HOME . DS . 'includes' . DS . 'headerDocente.php'; ?>
        </div>
       
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
        <td width="12%"><div align="right" >IDENTIFICACION</div></td>
        <td><div align="center">APELLIDOS</div></td>
        <td><div align="center" >NOMBRES</div></td>
        <td width="8%"><div align="center" >PERIODO 1</div></td>
        <td width="8%"><div align="center" >PERIODO 2</div></td>
        <td width="8%"><div align="center" >PERIODO 3</div></td>
        <td width="8%"><div align="center" >PERIODO 4</div></td>
        <td width="8%"><div align="center" >PROMEDIO</div></td>
        <td width="6%"><div align="center" >ESTADO</div></td>
    </tr>
    
    <?php foreach ($resultado as $fila) {
    $nota = new Nota();
    $prom=round($nota->calcularDef2($fila['primerP'],$fila['segundoP'],$fila['tercerP'],$fila['cuartoP']),2);
    ?>
    <tr class="recorrer" id="cebra" onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
          <td align="left"><?php echo $fila['idPersona'];?></td>
        <td align="left"><?php echo strtoupper ($fila['pApellido']." ".$fila['sApellido']);?></td> 
        <td align="left"><?php echo strtoupper ($fila['nombres']);?></td>
        <td align="center"><?php echo $fila['primerP'];?></td>
        <td align="center"><?php echo $fila['segundoP'];?></td>
        <td align="center"><?php echo $fila['tercerP'];?></td>
        <td align="center"><?php echo $fila['cuartoP'];?></td>
        <td align="center"><?php echo $prom?></td>
        <?php  if( $prom>='30'){   ?>
        <td align="center" ><img src="../utiles/imagenes/iconos/exitoCalificacion.png"/></td>
        <?php }else{ ?>
        <td align="center"><img src="../utiles/imagenes/iconos/errorCalificacion.png" /></td>
        <?php
        } 
    }//fin del For ?>
    </tr>
</table>
</br>
<div style="margin-right: 5%;">
<table   border="0" align="right" cellpadding="1" cellspacing="0" class="tabla">
    <tr>
        <td align="right"> 
            <form action="/colegio/docente/actualizarNotas" method="post">
                <input type="hidden" name="salon" value="<?php echo $idSalon; ?>"/>
                <input type="hidden" name="periodo" value="<?php echo $periodo; ?>"/>
                <input type="hidden" name="materia" value="<?php echo $materia->getIdMateria(); ?>"/>
                <input type="submit" name="Actualizar"  class="button large red" value="Actualizar Notas"/>
            </form>
        </td>
        <td align="right"> 
            <form action="/colegio/docente/asignarInasistencias" method="post">
                <input type="hidden" name="salon" value="<?php echo $idSalon; ?>"/>
                <input type="hidden" name="periodo" value="<?php echo $periodo; ?>"/>
                <input type="hidden" name="materia" value="<?php echo $materia->getIdMateria(); ?>"/>
                <input type="submit" name="inasistencias"  class="button large red" value="Actualizar Inasistencias"/>
            </form>
        </td>
    </tr>
</table>
    </div>
</body>
</html>