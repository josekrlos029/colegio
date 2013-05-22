<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Olvid&eacute; mi contrase&ntilde;a</title>
<script type="text/javascript">
    function campos(){
    
    var id = document.getElementById("idPersona");
 var email = document.getElementById("email");
 
 if (id.value.length >0){
 email.disabled=true;
 }else{
 email.disabled=false;
 }
 if (email.value.length >0){
 id.disabled=true;
 }else{
 id.disabled=false;
 }
   
    }
   
</script>
</head>
<body>
<h2>RECUPERAR CONTRASE&Ntilde;A</h2>
<form name="form1" id="form1" method="post" action="/colegio/inicio/enviardatosolvido">
<table width="440" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td colspan="2">Se le enviará un correo con las instrucciones de recuperación</td>
    </tr>
  <tr>
    <td width="181">Ingresa Tu número de Cedula</td>
  </tr>
    <tr><td width="251"><input type="number" name="idPersona" id="idPersona" onkeyup="campos()"/></td></tr>
    <tr><td>--O--</td></tr>
    <tr><td>Correo electrónico</td></tr>
  <tr>
      <td><input type="email" name="email" id="email"  onkeyup="campos()"/>    </td>
  </tr>
  <tr>
      <td colspan="2" align="center"><input type="submit" name="botonenviar" id="botonenviar" value="Enviar"/>    </td>
  </tr>
</table>
</form>
</body>
</html>
