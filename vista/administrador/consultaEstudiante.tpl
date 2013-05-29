<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titulo; ?></title>
   
        <p>&nbsp;</p>
        <h2>ESTUDIANTES DE LA APLICACION</h2>
        <table border="1" width="500" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>P.Apellido</th>
                    <th>S.Apellido</th>
                    <th>Sexo</th>
                    <th>Telefono</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>Fecha de Nacimiento</th>
                </tr>
          </thead>
            <tbody>
                <?php foreach ($estudiantes as $estudiante) { ?>
                <tr>
                    <td><a href="#"><?php echo $docente->getIdPersona();?></a></td>
                    <td><?php echo $estudiante->getNombres();?></td>
                    <td><?php echo $estudiante->getPApellido();?></td>
                    <td><?php echo $estudiante->getSApellido();?></td>
                    <td><?php echo $estudiante->getSexo();?></td>
                    <td><?php echo $estudiante->getTelefono();?></td>
                    <td><?php echo $estudiante->getDireccion();?></td>
                    <td><?php echo $estudiante->getCorreo();?></td>
                    <td><?php echo $estudiante->getFNacimiento()->format('Y-m-d');?></td>
                </tr>
                <?php } ?>
            </tbody>
    </table>
    </body>
</html>