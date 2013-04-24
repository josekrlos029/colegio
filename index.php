<?php

function cargadorClases(){
    include './config/Configuracion.php';
    include './config/Db.php';
    include './modelo/Modelo.php';
    include './modelo/Estudiante.php';
}

spl_autoload_register(cargadorClases);

$users = new Estudiante();
$lista = $users->leerEstudiantes();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        ?>
        <table border="0" width="500" cellspacing="2" cellpadding="1">
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha Nacimiento</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $user) { ?>
                <tr>
                    <td><?php echo $user->getIdEstudiante();?></td>
                    <td><?php echo $user->getPNombre().$user->getSNombre();?></td>
                    <td><?php echo $user->getPApellido();?></td>
                    <td><?php echo $user->getFNacimiento()->format('Y-m-d');?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>