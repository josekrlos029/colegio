<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
 <title><?php echo $titulo; ?></title>

 </head>
 
 <body>
<p>&nbsp;</p>
  
<h1>Calificaciones de Estudiantes</h1>
<table   width="80%" border="0" align="center" cellpadding="1" cellspacing="0">
    <tr class="modo1">
       <td>Salon</td>
       <td>Materia</td>
       <td>Horas</td>
    </tr>

    <tr>
        <td><?php echo " ". $idSalon; ?></td>
        <td><?php echo " ". $materia->getNombreMateria();?></td>
        <td><?php echo " ".$materia->getHoras();?></td>
    </tr>

</table>
<table  width="80%" border="0" align="center" cellpadding="1" cellspacing="0" class="tabla">
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
    <tr class="modo2" id="cebra">
        <td align="right"><a class="texto" href="guardar_notas.php?idEstudiante=<?php echo $fila['idPersona'];?>"><?php echo $fila['idPersona'];?></a></td>
        <td><div align="right" class="text_mensaje"> <?php echo $fila['pApellido']." ".$fila['sApellido'];?></div></td> 
        <td><div align="right" class="text_mensaje"> <?php echo $fila['nombres'];?></div></td>
        <td> <div align="center" class="titulo"> <?php echo $fila['primerP'];?></div></td>
        <td> <div align="center" class="titulo"> <?php echo $fila['segundoP'];?></div></td>
        <td> <div align="center" class="titulo"> <?php echo $fila['tercerP'];?></div></td>
        <td> <div align="center" class="titulo"> <?php echo $fila['cuartoP'];?></div></td>
        <td> <div align="center" class="titulo"> <?php echo $fila['def'];?></div></td>
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
        <td>
            <div align="center"><a href="act_notas.php">Guardar</a></div>
        </td>
    </tr>
</table>
</body>
</html>