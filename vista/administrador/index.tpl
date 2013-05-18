<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titulo; ?></title>
    </head>
    <body>
        <p>
          <?php //include HOME . DS . 'includes' . DS . 'menu.php'; ?>
        </p>
        <h2>ESTUDIANTES DE LA APLICACION</h2>
        <table border="1" width="500" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha Nacimiento</th>
                </tr>
          </thead>
            <tbody>
                <?php foreach ($estudiantes as $est) { ?>
                <tr>
                    <td hidden><a href="/Pruebas/usuario/detalle/<?php echo $user->getDocumento();?>">
                            <?php echo $est->getIdEstudiante();?></a></td>
                    <td><?php echo $est->getNombres();?></td>
                    <td><?php echo $est->getPApellido();?></td>
                    <td><?php echo $est->getFNacimiento()->format('Y-m-d');?></td>
                </tr>
                <?php } ?>
            </tbody>
    </table>
    </body>
</html>