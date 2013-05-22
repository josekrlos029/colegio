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
        <h2>DATOS</h2>
        <form action="/colegio/administrador/guardar" method="post" name="form1">
            <table width="416" border="1" cellspacing="0" cellpadding="2">
                <tr>
                    <th width="197" scope="row">AGREGAR DOCENTE</th>
                    <td width="211"><input name="Idpersona" id="Idpersona" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">Nombres</th>
                    <td><input name="nombres" id="nombres" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">Primer Apellido</th>
                    <td><input name="pApellido" id="pApellido" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">Segundo Apellido</th>
                    <td><input name="sApellido" id="sApellido" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">Sexo</th>
                    <td><input name="sexo" id="sexo" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">Telefono</th>
                    <td><input name="telefono" id="telefono" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">Direccion</th>
                    <td><input name="direccion" id="direccion" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">Correo</th>
                    <td><input name="correo" id="correo" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">Fecha de Nacimiento</th>
                    <td><input name="fNacimiento" id="fNacimiento" type="text" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input name="agregarDocente" id="agregarDocente" type="submit" value="Guardar" /></td>
                </tr>

            </table>
        </form>
        <p>&nbsp;</p>
    </body>
</html>