<table align="center" width="90%">
<tr>
<td>
      <table border="0" cellspacing="0" cellpadding="2">
       <tr>
       <td></td>
       <td align="left" class="color-text-gris"><h1>ESTUDIANTE</h1></td>
       </tr> 
       <tr>
        <td  align="right" width="40%" >Identificación:</td>
        <td><input disabled name="idPer" id="idPer" type="number" class="box-text" value='<?php echo $estudiante->getIdPersona();?>' required/>
            <input type="submit" value="Modificar Identificación" class="button large red" onclick="actualizarId()" />
        </td>
       </tr> 
      <tr>
        <td  align="right" width="40%" >Nombres:</td>
        <td><input name="nombres" id="nombres" type="text" class="box-text" value='<?php echo $estudiante->getNombres();?>' required/></td>
       </tr>  
       <tr>
        <td align="right">Primer Apellido:</td>
        <td><input name="pApellido" id="pApellido" type="text" class="box-text" value='<?php echo $estudiante->getPApellido();?>' required/></td>
        </tr> 
        <tr>
        <td align="right">Segundo Apellido:</td>
        <td><input name="sApellido" id="sApellido" type="text" class="box-text" value='<?php echo $estudiante->getSApellido();?>' required/></td>
        </tr>
        <tr>
        <td align="right">Sexo:</td>
         <td><select name="sexo" id="sexo" value='<?php echo $estudiante->getSexo();?>'>
         <option>M</option>
       <option>F</option>
       </select></td>
        </tr>
        <tr>
        <td align="right">Telefono:</td>
         <td><input name="telefono" id="telefono" type="number" class="box-text" value="<?php echo $estudiante->getTelefono();?>" /></td>
         </tr>  
         <tr>
        <td align="right">Direccion:</td>
         <td><input name="direccion" id="direccion" type="text" class="box-text" value="<?php echo $estudiante->getDireccion();?>"  /></td>
         </tr>    
         <tr>
        <td align="right">Correo:</td>
         <td><input name="correo" id="correo" type="email" class="box-text" value="<?php echo $estudiante->getCorreo();?>" /></td>
         </tr>  
         <tr>
        <td align="right">Fecha De Nacimiento:</td>
        <td><input name="fNacimiento" id="fNacimiento" type="date"  class="box-text" value="<?php echo $estudiante->getFNacimiento()->format('Y-m-d');?>" required/></td>
       </tr>
       <td align="right">Estado:</td>
        <td><input name="estado" id="estado" type="text"  class="box-text" value="<?php echo $estudiante->getEstado();?>" disabled="disabled"/></td>
       </tr>
    <tr>
       <td></td><td><input name="actualizaEstudiante" id="actualizaEstudiante" type="submit" value="Actualizar Estudiante" class="button large blue" onclick="actualizarEstudiante()" /></td>
        </tr>
       </table>  
  </td>
  <td>
       <table border="0" cellspacing="0" cellpadding="2">
       <tr>
       <td></td>
       <td align="left" class="color-text-gris"><h1>acudiente</h1></td>
       </tr> 
        <tr>
        <td  align="right" width="40%" >Numero de Identificacion:</td>
       <td><input name="idAcudiente" id="idAcudiente" type="text" class="box-text" value="<?php echo $est->getIdAcudiente();?>" disabled="disabled" readonly="readonly"/></td>
       </tr>
      <tr>
        <td align="right">Nombres:</td>
       <td><input name="nombresAcu" id="nombresAcu" type="text" class="box-text" value="<?php echo $est->getNombresAcudiente();?>" required/></td>
       </tr>  
       <tr>
        <td align="right">Apellidos:</td>
        <td><input name="apellidosAcu" id="apellidosAcu" type="text" class="box-text" value="<?php echo $est->getApellidosAcudiente();?>" required/></td>
        </tr>
         <tr>
        <td align="right">Ocupacion:</td>
         <td><input name="ocupacionAcu" id="ocupacionAcu" type="text" class="box-text" value="<?php echo $est->getOcupacionAcudiente();?>" /></td>
         </tr>
        <tr>
        <td align="right">Telefono:</td>
         <td><input name="telefonoAcu" id="telefonoAcu" type="number" class="box-text" value="<?php echo $est->gettelAcudiente();?>" /></td>
         </tr>
         <tr>
         <td align="right">Telefono de Oficina:</td>
        <td><input name="telOfiAcu" id="telOfiAcu" type="text"  class="box-text" value="<?php echo $est->getTelOficinaAcudiente();?>" /></td>
       </tr>
       <tr>
         <td align="right">Direccion:</td>
        <td><input name="direccionAcu" id="direccionAcu" type="text"  class="box-text" value="<?php echo $est->getDirAcudiente();?>" /></td>
       </tr>

    <tr>
       <td></td><td><input name="actualizaAcudiente" id="actualizaAcudiente" type="submit" value="Actualizar Acudiente" class="button large blue" onclick="actualizaAcudiente()" /></td>
        </tr>
       </table>
     </td>
     </tr>
     </table>

     </br>
     </br>
     <div style="margin-left: 20%">
    <table width="90%">
     <tr>
     <td>
       <table border="0" cellspacing="0" cellpadding="2">
       <tr>
       <td></td>
       <td align="left" class="color-text-gris"><h1>Padre</h1></td>
       </tr> 
        <tr>
        <td  align="right" width="40%" >Numero de Identificacion:</td>
        <?php if($est->getIdPadre() != NULL && $est->getIdPadre() != ""){ ?>
       <td><input name="idPadre" id="idPadre" type="text" class="box-text" value="<?php echo $est->getIdPadre();?>" disabled="disabled" readonly="readonly"/></td>
       <?php }else{ ?>
       <td><input name="idPadre" id="idPadre" type="text" class="box-text" /></td>
       <?php } ?>
        </tr>
      <tr>
        <td align="right">Nombres:</td>
       <td><input name="nombresPad" id="nombresPad" type="text" class="box-text" value="<?php echo $est->getNombresPadre();?>" required/></td>
       </tr>  
       <tr>
        <td align="right">Apellidos:</td>
        <td><input name="apellidosPad" id="apellidosPad" type="text" class="box-text" value="<?php echo $est->getApellidosPadre();?>" required/></td>
        </tr>
         <tr>
        <td align="right">Ocupacion:</td>
         <td><input name="ocupacionPad" id="ocupacionPad" type="text" class="box-text" value="<?php echo $est->getOcupacionPadre();?>" /></td>
         </tr>
        <tr>
        <td align="right">Telefono:</td>
         <td><input name="telefonoPad" id="telefonoPad" type="number" class="box-text" value="<?php echo $est->getTelPadre();?>" /></td>
         </tr>
         <tr>
         <td align="right">Telefono de Oficina:</td>
        <td><input name="telOfiPad" id="telOfiPad" type="text"  class="box-text" value="<?php echo $est->getTelOficinaPadre();?>" /></td>
       </tr>
       <tr>
         <td align="right">Direccion:</td>
        <td><input name="direccionPad" id="direccionPad" type="text"  class="box-text" value="<?php echo $est->getDirPadre();?>" /></td>
       </tr>

    <tr>
       <td></td><td><input name="actualizaPadre" id="actualizaPadre" type="submit" value="Actualizar Padre" class="button large blue" onclick="actualizaPadre()" /></td>
        </tr>
       </table>
    </td>
<td>
       <table  border="0" cellspacing="0" cellpadding="2">
       <tr>
       <td></td>
       <td align="left" class="color-text-gris"><h1>Madre</h1></td>
       </tr> 
        <tr>
        <td  align="right" width="40%" >Numero de Identificacion:</td>
        <?php if($est->getIdMadre() != NULL && $est->getIdMadre() != ""){ ?>
       <td><input name="idMadre" id="idMadre" type="text" class="box-text" value="<?php echo $est->getIdMadre();?>" disabled="disabled" readonly="readonly"/></td>
       <?php }else{ ?>
       <td><input name="idMadre" id="idMadre" type="text" class="box-text" /></td>
        <?php } ?>
        </tr>
      <tr>
        <td align="right">Nombres:</td>
       <td><input name="nombresMad" id="nombresMad" type="text" class="box-text" value="<?php echo $est->getNombresMadre();?>" required/></td>
       </tr>  
       <tr>
        <td align="right">Apellidos:</td>
        <td><input name="apellidosMad" id="apellidosMad" type="text" class="box-text" value="<?php echo $est->getApellidosMadre();?>" required/></td>
        </tr>
         <tr>
        <td align="right">Ocupacion:</td>
         <td><input name="ocupacionMad" id="ocupacionMad" type="text" class="box-text" value="<?php echo $est->getOcupacionMadre();?>" /></td>
         </tr>
        <tr>
        <td align="right">Telefono:</td>
         <td><input name="telefonoMad" id="telefonoMad" type="number" class="box-text" value="<?php echo $est->getTelMadre();?>" /></td>
         </tr>
         <tr>
         <td align="right">Telefono de Oficina:</td>
        <td><input name="telOfiMad" id="telOfiMad" type="text"  class="box-text" value="<?php echo $est->getTelOficinaMadre();?>" /></td>
       </tr>
       <tr>
         <td align="right">Direccion:</td>
        <td><input name="direccionMad" id="direccionMad" type="text"  class="box-text" value="<?php echo $est->getDirMadre();?>" /></td>
       </tr>

    <tr>
       <td></td><td><input name="actualizaMadre" id="actualizaMadre" type="submit" value="Actualizar Madre" class="button large blue" onclick="actualizaMadre()" /></td>
        </tr>
       </table>
  </td>
     </tr>
     </table>
     <table width="90%">
         <tr>
             <td>
                 <div style="margin:5%;"> 
                <h1>MODIFICAR IMAGEN</h1>
                <p>Por favor Seleccion la imagen que desea para su Perfil.</br>EXTENSIONES ACEPTADAS: .jpeg .jpg .png </br> TAMAÑO MAXIMO: 4MB</p>
                <form action="/colegio/administrador/actualizarFotoEstudiante" method="post" enctype="multipart/form-data" name="form1">
                <input type="file" name="foto" id="foto">
                <input type="hidden" name="url" value="/colegio/administrador/actualizarEstudiante">
                <input type="hidden" name="idPersona" value="<?php echo $idPersona;?>">
                <input type="submit" name="enviar" value="Enviar" class="button large blue" >
                </form>
                </div>
             </td>
             <td>
                 <h1>TOMAR FOTO</h1>
                 <br>
                 <a href="#"><button class="button large blue" id="insertarImagen" onclick="abrir()">Insertar Imagen</button></a>
                 <br>
                 <a href="#"><button class="button large red" id="insertarImagen" onclick="guardaFoto()">Guardar</button></a>
                 <br>
                 <p id="imagen" style="float: left;"><img id="foto2" src="" /></p>
                </form>
             </td>
         </tr>
     </table>
 </div>