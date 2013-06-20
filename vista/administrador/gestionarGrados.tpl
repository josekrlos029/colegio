   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
   
        <title><?php echo $titulo; ?></title>
    

<script type="text/javascript">

function envio(){ 
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
  
 var idGrado = document.getElementById("idGrado");
 var nombre = document.getElementById("nombre");

    if (idGrado.value=="" || nombre.value==""){
      x.html ( "<p>Error: Tiene Campos Vacios</p>");
      error();
      ocultar();
    }else{

        var url="/colegio/administrador/agregarGrado/";
        var data="idGrado="+idGrado.value+"&nombre="+nombre.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Grado Agregado Correctamente, Se Actualizará la Página</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/gestionarGrados";
            }else{
                x.html ( "<p>"+res+"</p>");
                idGrado.value="";
                idGrado.setAttribute("autofocus","true");
                nombre.value="";
                error();
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
            <p>&nbsp;</p>
              <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="green">
                    <div class="color-text-blanco" id="title-cab"><h1>Gestion De Grados Academicos</h1> </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                      
                         
     <!-------------------------------------------------------------------->    
        
         
          <table width="600" border="0" cellspacing="0" cellpadding="2">
              <tr>
                  <td></td>
                  <td align="left" class="color-text-gris"><h1>Agregar Grado</h1></td>
              </tr>
             <tr>
                <td align="right" width="40%" >ID de Grado:</td>   
                <td><input name="idGrado" id="idGrado" type="text" class="box-text" required/></td> 
            </tr>
             <tr>
                <td align="right">Nombre del grado:</td>
                <td><input name="nombre" id="nombre" type="text"  class="box-text" required/></td> 
            </tr>
            <tr>
                <td></td>
                <td><input name="agregarGrado" id="agregarGrado" type="submit" value="Guardar" class="button large green" onclick="envio()" /></td>
                </tr>
        </table>
         
     <p>&nbsp;</p>
     <hr>
     <p>&nbsp;</p>
        
       <table width="600" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
           <tr>
               <td align="center" class="color-text-gris" colspan="2"><h1>Grados Registrados</h1></td>
           </tr>
         
                <tr class="modo1" >
                    <td width="40%">ID de Grado</td>
                    <td>Nombre Del grado</td>
                </tr>
                <?php foreach ($grados as $grado) { ?>
                <tr class="modo2" id="cebra">
                    <td><?php echo $grado->getIdGrado();?></td>
                    <td><?php echo $grado->getNombre();?></td>
                </tr>
                <?php } ?>
           
    </table>
     
    </body>
</html>