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
        <form action="/colegio/administrador/guardarMateria" method="post" name="form1">
            <table width="416" border="1" cellspacing="0" cellpadding="2">
                <tr>
                    <th width="197" scope="row">idMateria</th>
                    <td width="211"><input name="idMateria" id="idMateria" type="text"  /></td>
                </tr>
                <tr>
                    <th scope="row">nombreMateria</th>
                    <td><input name="nombreMateria" id="nombreMateria" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">horas</th>
                    <td><input name="horas" id="horas" type="text" /></td>
                </tr>
                
                    <td colspan="2"><input name="agregarlicuadora" id="agregarlicuadora" type="submit" value="Guardar" /></td>
                
                </tr>

            </table>
        </form>
        <p>&nbsp;</p>
    </body>
</html>