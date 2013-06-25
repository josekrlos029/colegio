/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function asignarColor(fondo,borde,texto,url) { 
 $("#mensaje").css("background-color",fondo );
 $("#mensaje").css("border-color",borde);
 $("#mensaje").css("color",texto);
 $("#mensaje").css("background-image",url);
 }

function error() { 
setTimeout("asignarColor('#FFBABA','#e5582b','#D8000C','url(../utiles/imagenes/iconos/error.png)')",1);
}
 
 function exito() { 
 setTimeout("asignarColor('#DFF2BF','#aacc5b','#4F8A10','url(../utiles/imagenes/iconos/exito.png)')",1);
 }
 
  function cargando() { 
 setTimeout("asignarColor('#BDE5F8','#00529B','#00529B','url(../utiles/imagenes/iconos/cargando.gif)')",1);
 }
 
 function ocultar(){
 setTimeout("$('#mensaje').hide();", 10000);
 }
 
