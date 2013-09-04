   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
   
        <title><?php echo $titulo; ?></title>
 

<script type="text/javascript">
function envio(){ 
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
  
 var idMateria = document.getElementById("idMateria");
 var nombre = document.getElementById("nombre");
 var horas = document.getElementById("horas");

    if (idMateria.value=="" || nombre.value=="" || horas.value==""){
      x.html ( "<p>Error: Tiene Campos Vacios</p>");
      error();
      ocultar();
    }else{

        var url="/colegio/administrador/agregarMateria/";
        var data="idMateria="+idMateria.value+"&nombre="+nombre.value+"&horas="+horas.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Materia Agregada Correctamente, Se Actualizará la Página</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/gestionarMaterias";
            }else{
                x.html ( "<p>"+res+"</p>");
                ocultar();
            }
         });
    }   
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
                                <h1>Gestion De Materias</h1>
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
                  <td align="left" class="color-text-gris"><h1>Agregar Materias</h1></td>
              </tr>
                <tr>
                    <td align="right" width="40%">ID de Materia:</td>
                    <td ><input name="idMateria" id="idMateria" type="text" class="box-text" required /></td>
                </tr>
                <tr>
                    <td align="right">Nombre:</td>
                    <td><input name="nombreMateria" id="nombre" type="text"  class="box-text" required/></td>
                </tr>
                <tr>
                    <td align="right">Horas:</td>
                    <td><input name="horas" id="horas" type="number"  max="10" class="box-text" required/></td>
                </tr>
                <td></td>
                <td><input name="agregarlicuadora" id="agregarlicuadora" type="submit" value="Guardar" class="button large green"  onclick="envio()"/></td>
                
                </tr>
            </table>
     
      <p>&nbsp;</p>
     <hr>
     <p>&nbsp;</p>
     
        <table width="50%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
           <tr>
               <td align="center" class="color-text-gris" colspan="2"><h1>Materias Registradas</h1></td>
           </tr>
         
         
                <tr class="modo1">
                    <td>ID de Materia</td>
                    <td>Nombre</td>
                    <td>Horas</td>
                </tr>
              
        
         
                <?php foreach ($materias as $materia) { ?>
                <tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                    <td ><?php echo $materia->getIdMateria();?></td>
                    <td><?php echo $materia->getNombreMateria();?></td>
                    <td><?php echo $materia->getHoras();?></td>
                </tr>
                <?php } ?>
           
    </table>
        
        <p>&nbsp;</p>
    </body>
</html>