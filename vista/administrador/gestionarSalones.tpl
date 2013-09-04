 <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
        <title><?php echo $titulo; ?></title>
  

<script type="text/javascript">


function envio(){ 
 
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
  
 var idGrado = document.getElementById("idGrado");
 var grupo = document.getElementById("grupo");
 
        var url="/colegio/administrador/agregarSalon/";
        var data="idGrado="+idGrado.value+"&grupo="+grupo.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Salon Agregado Correctamente, Se Actualizará la Página</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/gestionarSalones";
            }else{
                x.html ( "<p>"+res+"</p>");
                error();
                idMateria.value="";
                idGrado.setAttribute("autofocus","true");
                nombre.value="";
                ocultar();
            }
         });
     
}
</script>
    </head>
    <body>
     
        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
  
          <!------------------------------cabecera--------------------------->  
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
                                <h1>Gestion De Salones</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                      
                         
     <!--------------------------------------------------------------------> 
       <table width="40%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                  <td></td>
                  <td align="left" class="color-text-gris"><h1>Datos De el Salon</h1></td>
              </tr>
              <tr>
                  <td align="right" width="40%">Grado:</td>
                    <td>
                    
                        <select name="idGrado" id="idGrado" class="box-text">
                            <?php foreach ($grados as $grado) { ?>
                            <option value="<?php echo $grado->getIdGrado(); ?>"><?php echo $grado->getNombre(); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right" >Grupos:</td>
                    <td><select name="grupo" id="grupo" class="box-text">
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                        </select></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><input name="agregarSalon" id="agregarSalon" type="submit" value="Guardar" class="button large green" onclick="envio()" /></td>
                
                </tr>
               
            </table>
            
      <p>&nbsp;</p>
     <hr>
     <p>&nbsp;</p>
     
      
        <table border="0" width="30%" cellspacing="0" cellpadding="0" align="center" class="tabla">
               
              <tr>
               <td align="center" class="color-text-gris" colspan="3"><h1>Aulas De Clases Registradas</h1></td>
             </tr>
          
                <tr class="modo1">
                    <td>ID de Salón</td>
                    <td>Grado</td>
                    <td>Grupo</td>
                </tr>
               
     

                <?php foreach ($salones as $salon) { ?>
                 <tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                    <td><?php echo $salon->getIdSalon();?></td>
                    <td><?php echo $salon->getIdGrado();?></td>
                    <td><?php echo $salon->getGrupo();?></td>
                </tr>
                <?php } ?>
         
    </table>
        
        <p>&nbsp;</p>
    </body>
</html>