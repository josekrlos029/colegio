<h1 class="color-text-gris">Datos del estudiante</h1>   
<div  id="tabla">
    <table class="tabla" width="100%"> 
        <tr class="modo1">
            <td>Nombres:</td>
            <td>Primer Apellido:</td>
            <td>Segundo Apellido:</td>
            <td>Sexo:</td>
            <td>Telefono:</td>
            <td>Direccion:</td>
            <td>Correo:</td>
            <td>Fecha De Nacimiento:</td>
        </tr>
                              
        <tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
            <td><?php echo $estudiante->getNombres();?></td>
            <td><?php echo $estudiante->getPApellido();?></td>
            <td><?php echo $estudiante->getSApellido();?></td>
            <td><?php echo $estudiante->getSexo();?></td>
            <td><?php echo $estudiante->getTelefono();?></td>
            <td><?php echo $estudiante->getDireccion();?></td>
            <td><?php echo $estudiante->getCorreo();?></td>
            <td><?php echo $estudiante->getFNacimiento()->format("Y-m-d");?></td>
        </tr>
    </table> 
</div>
<p>&nbsp;</p>
           
        <table class="tabla" width="50%" border="0" cellspacing="0" cellpadding="2" >
            <tr>                  
                <td colspan="2" class="color-text-gris"><h1>realizar matricula</h1></td>
            </tr>
            <tr class="modo1">
                <td>SALON</td>
                <td>JORNADA</td>
            </tr>           
            <tr>
                <td>
                    <select id="idSalon" class="box-text">
                        <?php foreach ($salones as $salon) { ?>
                        <option><?php echo $salon->getIdSalon();?></option>
                        <?php } ?>
                    </select>
                </td>
                     
                <td>
                    <select id="jornada" class="box-text">
                        <option>MAÑANA</option>
                        <option>TARDE</option>
                        <option>NOCHE</option>
                    </select>
                </td>
            </tr>
            <tr>
            <td align="right" width="40%"></td>
            <td><button class="button large blue" id="insertarImagen" onclick="abrir()">Insertar Imagen</button></td>
            </tr>
            <tr>
                <td></td>
                <td><p id="imagen" style="float: left;"><img id="foto" src="" /></p></td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <table>
            <tr>
                <td colspan="2">
                    <input name="matricularEstudiante" id="matricularEstudiante" type="submit" value="Matricular" class="button large blue" onclick="matricular()" />
                </td>
            </tr>
        </table>