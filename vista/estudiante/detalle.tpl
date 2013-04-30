<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titulo; ?></title>
    </head>
<body>
<p>
          <?php include HOME . DS . 'includes' . DS . 'menu.php'; ?>
        </p>
<h2>DETALLE DE USUARIO</h2>
<table width="416" border="1" cellspacing="0" cellpadding="2">
  <tr>
    <th width="197" scope="row">Documento</th>
    <td width="211"><a href="/usuario/detalle/<?php echo $usuario->getDocumento();?>"><?php echo $usuario->getDocumento();?></a></td>
  </tr>
  <tr>
    <th scope="row">Nombre</th>
    <td><?php echo $usuario->getNombre();?></td>
  </tr>
  <tr>
    <th scope="row">Apellido</th>
    <td><?php echo $usuario->getApellido();?></td>
  </tr>
  <tr>
    <th scope="row">Fecha de Nacmiento</th>
    <td><?php echo $usuario->getFechaNacimiento()->format('Y-m-d');?></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>