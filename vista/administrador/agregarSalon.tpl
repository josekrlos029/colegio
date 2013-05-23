<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $titulo; ?></title>
    </head>
    <body>
        <h2>DATOS</h2>
        <form action="/colegio/administrador" method="post" name="form1">
            <table width="416" border="1" cellspacing="0" cellpadding="2">
                <tr>
                    <th width="197" scope="row">idSalon</th>
                    <td width="211"><input name="idSalon" id="idSalon" type="text"  /></td>
                </tr>
                <tr>
                    <th scope="row">idGrado</th>
                    <td><input name="idGrado" id="idGrado" type="text" /></td>
                </tr>
                <tr>
                    <th scope="row">idGrupo</th>
                    <td><input name="idGrupo" id="idGrupo" type="text" /></td>
                </tr>
               
            </table>
        </form>
        <p>&nbsp;</p>
    </body>
</html>