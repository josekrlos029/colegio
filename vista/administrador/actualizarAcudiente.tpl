<table width="60%" border="0" cellspacing="0" cellpadding="2">
<tr>
<td></td>
<td align="left" class="color-text-gris"><h1>ACtualizar Datos del acudiente</h1></td>
</tr> 
 <tr>
 <td  align="right" width="40%" >Numero de Identificacion:</td>
<td><input name="idPersona" id="idPersona" type="text" class="box-text" value="<?php echo $est->getIdAcudiente();?>" disabled="disabled" readonly="readonly"/></td>
</tr>
<tr>
 <td align="right">Nombres:</td>
<td><input name="nombres" id="nombres" type="text" class="box-text" value="<?php echo $est->getNombresAcudiente();?>" required/></td>
</tr>  
<tr>
 <td align="right">Apellido:s</td>
 <td><input name="apellidos" id="apellidos" type="text" class="box-text" value="<?php echo $est->getApellidosAcudiente();?>" required/></td>
 </tr>
  <tr>
 <td align="right">Ocupacion:</td>
  <td><input name="ocupacion" id="ocupacion" type="text" class="box-text" value="<?php echo $est->getOcupacionAcudiente();?>" /></td>
  </tr>
 <tr>
 <td align="right">Telefono:</td>
  <td><input name="telefono" id="telefono" type="number" class="box-text" value="<?php echo $est->gettelAcudiente();?>" /></td>
  </tr>
  <tr>
  <td align="right">Telefono de Oficina:</td>
 <td><input name="telOfi" id="telOfi" type="text"  class="box-text" value="<?php echo $est->getTelOficinaAcudiente();?>" /></td>
</tr>
<tr>
  <td align="right">Direccion:</td>
 <td><input name="direccion" id="direccion" type="text"  class="box-text" value="<?php echo $est->getDirAcudiente();?>" /></td>
</tr>

<tr>
<td></td><td><input name="actualizaAcudiente" id="actualizaAcudiente" type="submit" value="Actualizar" class="button large gris" onclick="actualizaAcudiente()" /></td>
 </tr>
</table>             