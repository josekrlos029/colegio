   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
        
   <title><?php echo $titulo; ?></title>
    

<script type="text/javascript">
    
function eliminar(idSalon,idMateria){
 var x = $("#mensaje");
cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

  var url="/colegio/administrador/eliminarCarga";
        var data="idSalon="+idSalon+"&idMateria="+idMateria;
 envioJson(url,data,function respuesta(res){   
    if (res == 1){
                x.html ( "<p>Carga eliminada Correctamente</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/gestionarCargas";
    
    }else{            
    x.html ("<p>"+res+"</p>");
    leerCarga();
    cargando();
    ocultar();
    }
    });

}


function validarRadio(){

if(!$("input[name=idDocente]:checked").val()) {
	return false;
}else{
return true;
}
}

function leerUsuarios(){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
var y= $("#tablaCargas"); 
 var idDocente =$("input[name=idDocente]:checked").val();
  var url="/colegio/administrador/imprimirUsuarios";
        var data="idDocente="+idDocente;
        $.ajax({
			        async:	true, 
				type:	"post",
				data:	data,
				url:	url,
				dataType:"html",
				success: function(data){
                                    
				    //JSON.decode( data );
                                    var json = eval("(" + data + ")");
                                     x.hide();            
                                    y.html (json);
				    //var json= jQuery.parseJSON(data);     
                                    
				    }
		        });

}
function agregar(){

var y = $("#mensaje");
 cargando();
 y.html ("<p>Cargando...</p>");
 y.show("slow");
 
 var idDocente =$("input[name=idDocente]:checked").val();
 var idRol = document.getElementById("usuarios");
 
    if (idDocente=="" || idRol.value=="---" ){
          y.html ( "<p>Error: Seleccion invalida</p>");
      error();
      ocultar();
    }else{

        var url="/colegio/administrador/agregarRol/";
        var data="idDocente="+idDocente+"&idRol="+idRol.value;

        envioJson(url,data,function respuesta(res){   
                y.html ( res);
                y.hide();
                leerUsuarios();
         });
    }   

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
                 <div id="cabecera" class="red">
                    
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Gestion De Usuarios</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                </div>
        </div> 
                <p>&nbsp;</p>               
     <!--------------------------------------------------------------------> 
<div id="tabla-contenedora">
        <table width="43%" border="0" cellspacing="0" cellpadding="2" class="tabla">
                <tr>
                  <td></td>
                  <td align="left" class="color-text-gris" colspan="3"><h1>Escoger docente</h1></td>
              </tr>
              
                <tr class="modo1">
                    <td width="10%"></td>
                    <td width="30%">Documento</td>
                    <td width="30%">Nombres</td>
                    <td width="30%">Apellidos</td>
                </tr>      
        </table>
    <div style="float:left;">
        <div id="tabla-consulta">
            <table width="100%" border="0" cellspacing="0" cellpadding="2">  
        
                <?php foreach ($docentes as $docente) { ?>
                <tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                    <td width="10%"><input onclick="leerUsuarios()" id="idDocente" name="idDocente" type="radio"  value="<?php echo $docente->getIdPersona();?>" />
                    <td width="30%"><?php echo $docente->getIdPersona();?></td>
                    <td width="30%"><?php echo $docente->getNombres();?></td>
                    <td width="30%"><?php echo $docente->getPApellido()." ".$docente->getSApellido();?></td> 
                </tr>
                <?php } ?>
          
            </table>
        </div>  
    </div>    
    <div style="float:right" >
          <table width="650" border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td width="10%"></td>
                  <td align="left" class="color-text-gris"><h1>Escoger Usuario</h1></td>
                   
              </tr>
                <tr>
                    <td></td>
                    <td>Usuario:</td>
                     
                </tr>
            <tbody>
                <tr>
                    <td></td>
                    <td>
                        <select id="usuarios" name="salones" class="box-text">
                            <option value="---">---</option>
                            <option value="C">Coordinador</option>
            </select>
            </td>
                </tr>
                <tr>
                    <td colspan="3" align="right"><button onclick="agregar()" class="button large red"> Guardar </button></td>
                    </tr>
            </tbody>
        </table>
    </div>
 </div>  
    </br>
     <hr>
     </br>
         <table width="50%" align="center" border="0" cellspacing="0" cellpadding="2" class="tabla">
                <tr>
                  <td align="center" class="color-text-gris" colspan="4"><h1>Usuarios Asignados al Docente</h1></td>
              </tr>
                <tr class="modo1">
                    <td width="20%">N°</td>
                    <td width="40%">ROL</td>
                </tr>   
          </table>
               <table width="50%" align="center" border="0" cellspacing="0" cellpadding="2"  >
                <tbody id="tablaCargas">
     
                </tbody>
               </table>          
</div>    
    </body>  
</html>