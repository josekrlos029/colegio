<?php
$ruta = 'utiles/imagenes/fotos/';
if (file_exists($ruta.$idPersona.'.jpg')) {
    $img= '<img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.jpg">';
}elseif (file_exists($ruta.$idPersona.'.png')) {
    $img= '<img height="150px" width=".150px" src="../utiles/imagenes/fotos/'.$idPersona.'.png">';
}elseif (file_exists($ruta.$idPersona.'.jpeg')) {
    $img= '<img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.jpeg">';
}else{
    $img= '<img height="150px" width="150px" src="../utiles/imagenes/avatarDefaul.png">';
}

if ($rol == 'D'){ 
?>
<div class="contenedorDp" >     
<div class="marcoAvatardoc">
    <div class="avatar">
        <span class="rounded">
            <?php echo $img;?>
        </span> 
    </div>    
</div> 
<?php    
}elseif($rol == 'E'){
?>
<div class="contenedorDp" >     
<div class="marcoAvatarest">
    <div class="avatar">
        <span class="rounded">
            <?php echo $img;?>
        </span> 
    </div>    
</div> 
<?php            
}else{
?>
     <tr> </tr>
<?php     
}
?>
<table border="0" width="100%"> 
<tr><td class="color-text-gris">Numero de Identificacion:</td></tr> 
<tr><td><?php echo  strtoupper($persona->getidPersona());?></td></tr>
<tr><td class="color-text-gris">Nombres:</td></tr> 
<tr><td><?php echo  strtoupper($persona->getNombres());?></td></tr>
<tr><td class="color-text-gris">Apellidos:</td></tr>
<tr><td><?php echo strtoupper($persona->getPApellido())." ".strtoupper($persona->getSApellido());?></td></tr>  
<tr><td class="color-text-gris">Sexo:</td></tr>                                       
<tr><td><?php echo  strtoupper($persona->getSexo());?></td> </tr>                                        
<tr><td class="color-text-gris">Telefono:</td></tr>
<tr><td><?php echo  strtoupper($persona->getTelefono());?></td></tr> 
<tr><td class="color-text-gris">Direccion:</td></tr>
<tr><td><?php echo  strtoupper($persona->getDireccion());?></td</tr> 
<tr><td class="color-text-gris">Correo:</td></tr>    
<tr><td><?php echo  strtoupper($persona->getCorreo());?></td></tr>
<tr><td class="color-text-gris">Fecha De Nacimiento:</td></tr>
<tr><td><?php echo  strtoupper($persona->getFNacimiento()->format('Y-m-d'));?></td></tr>
</table>
</div>

</br>
<table width="60%" border="0" cellspacing="0" cellpadding="2">
 <tr>
 <td></td>
 <td align="left" class="color-text-gris"><h1>ACtualizar Datos</h1></td>
 </tr> 
  <tr>
  <td  align="right" width="40%" >Numero de Identificacion:</td>
 <td><input name="idPersona" id="idPersona" type="text" class="box-text" value="<?php echo $persona->getidPersona();?>" disabled="disabled" readonly="readonly"/></td>
 </tr>
<tr>
  <td align="right">Nombres:</td>
 <td><input name="nombres" id="nombres" type="text" class="box-text" value="<?php echo $persona->getNombres();?>" required/></td>
 </tr>  
 <tr>
  <td align="right">Primer Apellido:</td>
  <td><input name="pApellido" id="pApellido" type="text" class="box-text" value="<?php echo $persona->getPApellido();?>" required/></td>
  </tr> 
  <tr>
  <td align="right">Segundo Apellido:</td>
  <td><input name="sApellido" id="sApellido" type="text" class="box-text" value="<?php echo $persona->getSApellido();?>" required/></td>
  </tr>
  <tr>
  <td align="right">Sexo:</td>
   <td><select name="sexo" id="sexo" value="<?php echo $persona->getSexo();?>">
   <option>M</option>
 <option>F</option>
 </select></td>
  </tr>
  <tr>
  <td align="right">Telefono:</td>
   <td><input name="telefono" id="telefono" type="number" class="box-text" value="<?php echo $persona->getTelefono();?>" /></td>
   </tr>  
   <tr>
  <td align="right">Direccion:</td>
   <td><input name="direccion" id="direccion" type="text" class="box-text" value="<?php echo $persona->getDireccion();?>"  /></td>
   </tr>    
   <tr>
  <td align="right">Correo:</td>
   <td><input name="correo" id="correo" type="email" class="box-text" value="<?php echo $persona->getCorreo();?>" /></td>
   </tr>  
   <tr>
  <td align="right">Fecha De Nacimiento:</td>
  <td><input name="fNacimiento" id="fNacimiento" type="date"  class="box-text" value="<?php echo $persona->getFNacimiento()->format('Y-m-d');?>" required/></td>
 </tr>
 <td align="right">Estado:</td>
  <td><input name="estado" id="estado" type="text"  class="box-text" value="<?php echo $persona->getEstado();?>" disabled="disabled"/></td>
 </tr>
<tr>
 <td></td><td><input name="actualizaPersona" id="actualizaPersona" type="submit" value="Actualizar" class="button large gris" onclick="actualizarPersona()" /></td>
  </tr>
 </table>