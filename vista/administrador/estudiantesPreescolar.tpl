<script type="text/javascript">
function consultaPersona(idPersona){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

var y= $("#tablaConsulta"); 
var url="/colegio/administrador/consultaGeneralPersona";
var data="idPersona="+idPersona;
 envioJson(url,data,function respuesta(res){   
   x.hide();            
    y.html (res);
    
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'
});
 
      
}
</script>
  <p>&nbsp;</p>
            </br>
           <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="green">
                    
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Consulta Rapida por Salones</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                    
                </div>
        </div> 
                <p>&nbsp;</p>
                <p>&nbsp;</p>
<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
           <tr>
               <td align="center" class="color-text-gris" colspan="11"><h1>Estudiantes Pre-escolar</h1></td>
           </tr>
         
         
                <tr class="modo1">
                    <td>Documento</td>
                    <td>Nombres</td>
                    <td>P.Apellido</td>
                    <td>S.Apellido</td>
                    <td>Sexo</td>
                    <td>Telefono</td>
                    <td>Dirección</td>
                    <td>Correo</td>
                    <td>consultar</td>
                    <td>editar</td>
                    <td>Inhabilitar</td>
                    
                </tr> 
           
   
            <tbody>
              
                <?php foreach ($estudiante as $est) { ?>
                <tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                    <td><?php echo $est->getIdPersona();?></a></td>
                    <td><?php echo $est->getNombres();?></td>
                    <td><?php echo $est->getPApellido();?></td>
                    <td><?php echo $est->getSApellido();?></td>
                    <td><?php echo $est->getSexo();?></td>
                    <td><?php echo $est->getTelefono();?></td>
                    <td><?php echo $est->getDireccion();?></td>
                    <td><?php echo $est->getCorreo();?></td>
                    <td align="center"><a href="#" onclick="consultaPersona('<?=$est->getIdPersona()?>')"><img src="../utiles/imagenes/iconos/consultarPersona.png"/></a></td>
                    <td align="center"><a href="#" onclick="editarPersona('<?=$est->getIdPersona()?>')"><img src="../utiles/imagenes/iconos/editarPersona.png" /></a></td>
                    <td align="center"><a href="#" onclick="eliminarPersona('<?=$est->getIdPersona()?>')"><img src="../utiles/imagenes/iconos/eliminarPersona.png"/></a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
<div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <div style="float:right">
      <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
 </div>
      <div id="tablaConsulta">
     
      </div>

</div>