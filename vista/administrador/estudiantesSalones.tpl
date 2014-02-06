<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">                     
    <tr><td align="center" class="color-text-gris" colspan="11"><h1>Salon: <?php echo $idSalon ;?></h1></td></tr>
    <tr class="modo1">
        <td>N</td>
        <td>Documento</td>
        <td>Nombres</td>
        <td>P.Apellido</td>
        <td>S.Apellido</td>
        <td>Sexo</td>
        <td>Telefono</td>
        <td>Dirección</td>
        <td>Correo</td>
        <td>consultar</td>
        <td>Actualizar</td>
        <td>Inhabilitar</td>
    </tr>
<?php
    $cont=0;
    foreach ($estudiante as $est){
    $cont++;
    $usuario= new Usuario();
    $user = $usuario->leerPorId($est->getIdPersona());
?>    
<tr title=""  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
    <td><?php echo $cont;?></td>    
    <td title="<?php if ($user != NULL){ echo $user->getUsuario().','.$user->getContraseña();}?>"><?php echo $est->getIdPersona();?></td>
        <td title=""><?php echo $est->getNombres();?></td>
        <td><?php echo $est->getPApellido();?></td>
        <td><?php echo $est->getSApellido();?></td>
        <td><?php echo $est->getSexo();?></td>
        <td><?php echo $est->getTelefono();?></td>
        <td><?php echo $est->getDireccion();?></td>
        <td><?php echo $est->getCorreo();?></td>
        <td align="center"><a href="#" onclick="consultaPersona ('<?php echo $est->getIdPersona();?>') "><img src="../utiles/imagenes/iconos/consultarPersona.png"/></a></td>
        <td align="center"><a href="#" onclick="vistaActualizarPersona('<?php echo $est->getIdPersona();?>') "><img src="../utiles/imagenes/iconos/editarPersona.png" /></a></td>
        <td align="center"><a href="#" onclick="inhabilitarPersona ('$est->getIdPersona();?>') "><img src="../utiles/imagenes/iconos/inhabilitarPersona.png"/></a></td>
    </tr>
<?php
      }
?>      
</table>