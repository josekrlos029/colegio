<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titulo; ?></title>
    </head>
    <body>
        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
        <h2> Agregar Grado </h2>
        <table>
             <tr>
                <td>ID de Grado</td>   
                <td><input name="idGrado" id="idGrado" type="text"  required/></td> 
            </tr>
             <tr>
                <td>Nombre</td>
                <td><input name="nombre" id="nombre" type="text" required/></td> 
            </tr>
        </table>
        <h2>GRADOS DE LA APLICACION</h2>
        <table border="1" width="500" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>ID de GRado</th>
                    <th>Nombre</th>
                </tr>
          </thead>
            <tbody>
                <?php foreach ($grados as $grado) { ?>
                <tr>
                    <td ><?php echo $grado->getIdGrado();?></td>
                    <td><?php echo $grado->getNombre();?></td>
                </tr>
                <?php } ?>
            </tbody>
    </table>
    </body>
</html>