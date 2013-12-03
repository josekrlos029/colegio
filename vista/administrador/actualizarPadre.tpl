<table width="60%" border="0" cellspacing="0" cellpadding="2">
<tr>
<td></td>
<td align="left" class="color-text-gris"><h1>ACtualizar Datos del Padre</h1></td>
</tr> 
 <tr>
 <td  align="right" width="40%" >Numero de Identificacion:</td>
<td><input name="idPersona" id="idPersona" type="text" class="box-text" value="<?php echo  $est->getIdPadre();?>" disabled="disabled" readonly="readonly"/></td>
</tr>
<tr>
 <td align="right">Nombres:</td>
<td><input name="nombres" id="nombres" type="text" class="box-text" value="<?php echo $est->getNombresPadre();?>" required/></td>
</tr>  
<tr>
 <td align="right">Apellido:s</td>
 <td><input name="apellidos" id="apellidos" type="text" class="box-text" value="<?php echo $est->getApellidosPadre();?>" required/></td>
 </tr>
  <tr>
 <td align="right">Ocupacion:</td>
  <td><input name="ocupacion" id="ocupacion" type="text" class="box-text" value="<?php echo $est->getOcupacionPadre();?>" /></td>
  </tr>
 <tr>
 <td align="right">Telefono:</td>
  <td><input name="telefono" id="telefono" type="number" class="box-text" value="<?php echo $est->getTelPadre();?>" /></td>
  </tr>
  <tr>
  <td align="right">Telefono de Oficina:</td>
 <td><input name="telOfi" id="telOfi" type="text"  class="box-text" value="<?php echo $est->getTelOficinaPadre();?>" /></td>
</tr>
<tr>
  <td align="right">Direccion:</td>
 <td><input name="direccion" id="direccion" type="text"  class="box-text" value="<?php echo $est->getDirPadre();?>" /></td>
</tr>

<tr>
<td></td><td><input name="actualizaPadre" id="actualizaPadre" type="submit" value="Actualizar" class="button large gris" onclick="actualizaPadre()" /></td>
 </tr>
</table>