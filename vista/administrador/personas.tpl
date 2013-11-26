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
    
<table  width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla" id="tabla">
    <tr class="modo1">
        <td width="12%"><div align="right" >IDENTIFICACION</div></td>
        <td><div align="center">APELLIDOS</div></td>
        <td><div align="center" >NOMBRES</div></td>
        <td width="8%"><div align="center" >SEXO</div></td>
        <td width="8%"><div align="center" >TELEFONO</div></td>
        <td width="8%"><div align="center" >DIRECCION</div></td>
        <td width="8%"><div align="center" >CORREO</div></td>
    </tr>
    
    <?php foreach ($personas as $persona) {
    ?>
    <tr class="recorrer" id="cebra" onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
          <td align="left"><?php echo $persona->getIdPersona();?></td>
        <td align="left"><?php echo strtoupper ($persona->getPApellido()." ".$persona->getSApellido());?></td> 
        <td align="left"><?php echo strtoupper ($persona->getNombres());?></td>
        <td align="center"><?php echo $persona->getSexo();?></td>
        <td align="center"><?php echo $persona->getTelefono();?></td>
        <td align="center"><?php echo $persona->getDireccion();?></td>
        <td align="center"><?php echo $persona->getCorreo();?></td>
    <?php    
    }//fin del For ?>
    </tr>
</table>
</br>
</body>
</html>