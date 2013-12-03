<table width="60%" border="0" cellspacing="0" cellpadding="2">
<tr>
    <td></td>
    <td align="left" class="color-text-gris"><h1>ACtualizar Datos de la Madre</h1></td>
    </tr> 
     <tr>
     <td  align="right" width="40%" >Numero de Identificacion:</td>
    <td><input name="idPersona" id="idPersona" type="text" class="box-text" value="<?php echo  $est->getIdMadre();?>" disabled="disabled" readonly="readonly"/></td>
    </tr>
   <tr>
     <td align="right">Nombres:</td>
    <td><input name="nombres" id="nombres" type="text" class="box-text" value="<?php echo $est->getNombresMadre();?>" required/></td>
    </tr>  
    <tr>
     <td align="right">Apellido:s</td>
     <td><input name="apellidos" id="apellidos" type="text" class="box-text" value="<?php echo $est->getApellidosMadre();?>" required/></td>
     </tr>
      <tr>
     <td align="right">Ocupacion:</td>
      <td><input name="ocupacion" id="ocupacion" type="text" class="box-text" value="<?php echo $est->getOcupacionMadre();?>" /></td>
      </tr>
     <tr>
     <td align="right">Telefono:</td>
      <td><input name="telefono" id="telefono" type="number" class="box-text" value="<?php echo $est->getTelMadre();?>" /></td>
      </tr>
      <tr>
      <td align="right">Telefono de Oficina:</td>
     <td><input name="telOfi" id="telOfi" type="text"  class="box-text" value="<?php echo $est->getTelOficinaMadre();?>" /></td>
    </tr>
    <tr>
      <td align="right">Direccion:</td>
     <td><input name="direccion" id="direccion" type="text"  class="box-text" value="<?php echo $est->getDirMadre();?>" /></td>
    </tr>

 <tr>
    <td></td><td><input name="actualizaMadre" id="actualizaMadre" type="submit" value="Actualizar" class="button large gris" onclick="actualizaMadre()" /></td>
     </tr>
            </table>