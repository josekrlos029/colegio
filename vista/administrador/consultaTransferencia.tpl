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
<p>&nbsp;</p>
           
        <table class="tabla" width="50%" border="0" cellspacing="0" cellpadding="2" >
            <tr>                  
                <td colspan="2" class="color-text-gris"><h1>realizar transferencia</h1></td>
            </tr>
            <tr class="modo1">
                <td>SALON</td>
            </tr>           
            <tr>
                <td>
                    <select id="idSalon" class="box-text">
                        <?php foreach ($salones as $salon) { 
                                if($salon->getIdSalon() != $idSalon){
                        ?>
                        <option><?php echo $salon->getIdSalon();?></option>
                        <?php 
                        }
                        } ?>
                    </select>
                </td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <table>
            <tr>
                <td colspan="2">
                    <input name="transferirEstudiante" id="transferirEstudiante" type="submit" value="Transferir" class="button large blue" onclick="transferir()" />
                </td>
            </tr>
        </table>