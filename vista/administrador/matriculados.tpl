<?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
 <title><?php echo $titulo; ?></title>
 <script>
 var searchOnTable = function() {
    var table = $('#tabla');
    var value = this.value;
    table.find('.recorrer').each(function(index, row) {
        var allCells = $(row).find('td');
        if(allCells.length > 0) {
            var found = false;
            allCells.each(function(index, td) {
                var regExp = new RegExp(value, 'i');
                if(regExp.test($(td).text())) {
                    found = true;
                    return false;
                }
            });
            if (found == true) $(row).show();
            else $(row).hide();
        }
    });
};
$(function(){
    $('#filter').keyup(searchOnTable);
    
});

function alerta(error){
    alert(error);
}

function habilitar(){
    $(".nmat").removeAttr("disabled");
    $("#guarda").removeAttr("hidden");
}

function guardar(){
var arreglo = new Array();
  var i = 0;
   var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
            $("#tabla .recorrer").each(function (index) {
                var mat, idPersona;
                
                 $(this).children("td").each(function (index2) {
                     switch (index2) {
                         case 0:
                             mat = $(this).children("input").val();
                             break;
                         case 1:
                             idPersona = $(this).text();
                         break;
                    }
                $(this).css("background-color", "#ECF8E0");
                });
               arreglo[i] = new Array(idPersona,mat); 
               i++;
            });
            
            
            var matriculas = JSON.encode(arreglo);
            
             var url="/colegio/administrador/modificarNumeroMatricula";
        var data="matriculas="+matriculas;
        envioJson(url,data,function respuesta(res){               
            if (res==1){
            x.html("Matriculas Actualizadas Correctamente");
            exito();
            
            }
            
         });  

}
 </script>
 </head>
<body>

    <div class="cabecera">
        <?php include HOME . DS . 'includes' . DS . 'header.php'; ?>
        </div>
       
          <!------------------------------cabecera--------------------------->  
          <p>&nbsp;</p>
            </br>
           <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="green">
                    
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="0">
                         <tr>   
                            <td>
           <!-- search -->
                                <div class="top-search">
                                     <div id="searchform" >
                                        <input type="text" value="" name="id" id="filter" onkeypress="" placeholder="Filtrar" />
                                     </div>	
                                </div>
        <!-- END search -->   
                            
                            
                            </td> 
                            <td align="right">   
                                <h1>Listado de Personas</h1>
                            </td>
                         </tr>
                         
                         
                        </table>
                    </div>
                    
                </div>
        </div> 
                <p>&nbsp;</p>
                      
                         
     <!--------------------------------------------------------------------> 
     <button onclick="habilitar()" class="button blue"> Modificar N° Matricula </button>
     <div id="guarda" hidden><button onclick="guardar()" class="button red" >Guardar </button></div>
<table  width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla" id="tabla">
    <tr class="modo1">
        
        <td width="4%"><div align="center">MAT</div></td>
        <td width="12%"><div align="right" >IDENTIFICACION</div></td>
        <td><div align="center" width="10%">APELLIDOS</div></td>
        <td><div align="center" width="10%">NOMBRES</div></td>
        <td width="4%"><div align="center" >SEXO</div></td>
        <td width="9%"><div align="center" >TELEFONO</div></td>
        <td width="15%"><div align="center">DIRECCION</div></td>
        <td width="7%"><div align="center" >CORREO</div></td>
        <td width="4%"><div align="center" >GRADO</div></td>
        <td width="4%"><div align="center" >MATRICULA</div></td>
    </tr>
    
    <?php 
    $cont=0;
    foreach ($personas as $persona) {
    $cont++;
    $matricula = new Matricula();
    $mat= $matricula->leerMatriculaPorId($persona->getIdPersona());
    ?>
    <tr class="recorrer" id="cebra" onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
        
        <td align="center"><input disabled style="width: 50px;" class="nmat" type="number" value="<?php echo $mat->getNMatricula();?>" />  
        <td align="left"><?php echo $persona->getIdPersona();?></td>
        <td align="left"><?php echo strtoupper ($persona->getPApellido()." ".$persona->getSApellido());?></td> 
        <td align="left"><?php echo strtoupper ($persona->getNombres());?></td>
        <td align="center"><?php echo $persona->getSexo();?></td>
        <td align="center"><?php echo $persona->getTelefono();?></td>
        <td align="center"><?php echo $persona->getDireccion();?></td>
        <td align="center"><?php echo $persona->getCorreo();?></td>
        <td align="center"><?php echo $mat->getIdSalon();?></td>
        <td align="center"><a href="/colegio/administrador/imprimirMatricula/<?php echo $persona->getIdPersona();?>"><img alt="inscripcion" src="../utiles/imagenes/iconos/consultarPersona.png" /></a></td>
    <?php    
    }//fin del For ?>
    </tr>
</table>
</br>
</body>
</html>