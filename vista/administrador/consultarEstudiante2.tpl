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
           <div id="matricula"  >  
           <table>
                     <tr>
                    <td colspan="2">
                    <input name="retirarEstudiante" id="retirarEstudiante" type="submit" value="Retirar" class="button large blue" onclick="retirar()" />
                    </td>
                </tr>
               </table>
               
               
           </div>