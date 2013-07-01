<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
 <title><?php echo $titulo; ?></title>
 <script>
 var searchOnTable = function() {
    var table = $('#tabla');
    var value = this.value;
    table.find('tr').each(function(index, row) {
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
 </script>
 </head>
 
 <body>
      <div class="cabecera">
        <?php include HOME . DS . 'includes' . DS . 'headerDocente.php'; ?>
        </div>
<p>&nbsp;</p>
  <input type="text" id="filter" placeholder="Filtrar">
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
        <td> <?php echo $fila['primerP'];?></td>
        <td>  <?php echo $fila['segundoP'];?></td>
        <td>  <?php echo $fila['tercerP'];?></td>
        <td>  <?php echo $fila['cuartoP'];?></td>
        <td>  <?php echo $fila['def'];?></td>
        <?php  if($fila['def']>='30'){   ?>
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
        <td align="center">
            <form action="/colegio/docente/actualizarNotas" method="post">
                <input type="hidden" name="salon" value="<?php echo $idSalon; ?>"/>
                <input type="hidden" name="periodo" value="<?php echo $periodo; ?>"/>
                <input type="hidden" name="materia" value="<?php echo $materia->getIdMateria(); ?>"/>
                <input type="submit" name="Actualizar"  class="button large red" value="Actualizar Notas"/>
            </form>
        </td>
    </tr>
</table>
</body>
</html>