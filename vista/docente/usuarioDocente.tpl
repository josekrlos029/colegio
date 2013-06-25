<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author andy henry
 */
interface usuarioDocente {
    //put your code here
}

?>
   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
        <title>Usuario Docente</title>
    </head>

<script type="text/javascript">
    
function envio(){ 

         var y = $("#tabla");
         var url="/colegio/administrador/consultarDocente/";
         var data="idPersona="+idPersona.value;
         y.html(res);
       
 }
 
 function datosAcademicos(){    
  $('#cargar').load('../vista/docente/datosAcademicos.tpl');        
}
function ingresoNotas(){    
  $('#cargar').load('../vista/docente/ingresoNotas.tpl');        
}
function funcionesAcademicas(){    
  $('#cargar').load('../vista/docente/funcionesAcademicas.tpl');        
}
  </script>  
    
  
    <body onload="envio()">
	
	<div id="marco">
	<?php include HOME . DS . 'includes' . DS . 'headerDocente.php'; ?>
</br>
<hr>
<input type="hidden" name="idPersona" id="idPersona" value="<?php echo $_SESSION['idUsuario'] ?>"/>
</br>
<table border="0" align="center" width="900px" >
 <tr>
  <td width="40%" >
  Hola Usuario <?php echo $_SESSION['idUsuario'] ?> Bienvenido(a) a tu Cuenta.</br> 
  <img src="../utiles/imagenes/tag_docente.png"/>
   <?php include HOME . DS . 'includes' . DS . 'fecha.php'; ?>
  </td>
  <td align="right" class="color-text-gris"><h1>Gestion Academica Del Docente</h1></td>
</tr>
</table >
</br>
<hr>
</br>

 <table border="0" align="center" width="900px">
	 <tr>
	   <td class="color-text-rojo" width="26%">  
                <h1>datos personales</h1>
                
           </td>
           <td>
           
           </td>
         </tr>
 </table>  
 <table border="0" align="center" width="900px" height="100%">
         <tr>
         <td width="26%">
             <table class="fondo" width="99%">
                <tr> 
                    <td>
                        <div class="contenedora-imagen">
                            <div class="perfilDefecto"></div>
                            <div class="marco-foto"></div>
                        </div>    
                    </td>
                </tr>
                <tr>
                    <td>
                       <div  id="tabla">
           
                        </div> 
                    </td>
                    
                </tr>
             </table>   
         </td> 
          <td>
              <table id="titulo-menu" width="100%" height="10%" border="0">
                   <tr> 
                       <td width="55"></td>
                        <td width="20%" align="right">
                            <a href="#"onclick="datosAcademicos()" class="link-menu">Datos Academicos</a>
                        </td>
                        <td width="20%" align="right">
                            <a href="#"onclick="ingresoNotas()" class="link-menu">Ingreso de Notas</a>
                        </td>
                        <td width="25%" align="right">
                            <a href="#"onclick="funcionesAcademicas()" class="link-menu">Funciones Academicas</a>
                        </td>
                        
              </table>    
             
                <table class="fondo" width="100%" height="90%" border="0">
                    <tr>  
                        <td>
                            <div id="cargar" class="carga-pag">
                             Gestion academica del docente, seleccione la opcion que desea
                            </div>
                        </td>
                    </tr>
                </table> 
             
         </td>  
         </tr>      
 </table> 
 </body>
</html>
