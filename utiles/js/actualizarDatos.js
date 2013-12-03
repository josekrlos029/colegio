/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function vistaActualizarAcudiente(idPersona){
document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'
var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
var y= $("#tablaConsulta"); 
var url="/colegio/administrador/actualizarAcudiente";
var data="idPersona="+idPersona;
 envioJson2(url,data,function respuesta(res){   
   x.hide();            
    y.html (res);
    
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'
});
 
      
}
function actualizaAcudiente(){

 document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

 var idPersona = document.getElementById("idPersona");
 var nombres = document.getElementById("nombres");
 var apellidos = document.getElementById("apellidos");
 var ocupacion = document.getElementById("ocupacion");
 var telefono = document.getElementById("telefono");
 var telOfi = document.getElementById("telOfi");
 var direccion = document.getElementById("direccion");


    if (idPersona.value=="" || nombres.value=="" || apellidos.value=="" || ocupacion.value=="" || direccion.value==""){
    
    x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
      error();
      ocultar();
    }else{
        var url="/colegio/administrador/actualizaAcudiente/";
        var data="idPersona="+idPersona.value+"&nombres="+nombres.value+"&apellidos="+apellidos.value+"&telefono="+telefono.value+"&direccion="+direccion.value+"&telOfi="+telOfi.value+"&ocupacion="+ocupacion.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Acudiente Actualizado Correctamente</p>");
                exito();
                ocultar();
               
            }else{
                x.html ( "<p>"+res+"</p>");
                idMateria.value="";
                idGrado.setAttribute("autofocus","true");
                nombre.value="";
                error();
                ocultar();
                
                
            }
         });
    }   
}




function vistaActualizarPadre(idPersona){
 document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

var y= $("#tablaConsulta"); 
var url="/colegio/administrador/actualizarPadre";
var data="idPersona="+idPersona;
 envioJson2(url,data,function respuesta(res){   
   x.hide();            
    y.html (res);
    
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'
});
 
      
}
function actualizaPadre(){
 document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
        var idPersona = document.getElementById("idPersona");
        var nombres = document.getElementById("nombres");
        var apellidos = document.getElementById("apellidos");
        var ocupacion = document.getElementById("ocupacion");
        var telefono = document.getElementById("telefono");
        var telOfi = document.getElementById("telOfi");
        var direccion = document.getElementById("direccion");
        
    if (idPersona.value=="" || nombres.value=="" || apellidos.value=="" || ocupacion.value=="" || direccion.value==""){
    x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
    error();
    ocultar();
    }else{
       
        var url="/colegio/administrador/actualizaPadre/";
        var data="idPersona="+idPersona.value+"&nombres="+nombres.value+"&apellidos="+apellidos.value+"&telefono="+telefono.value+"&direccion="+direccion.value+"&telOfi="+telOfi.value+"&ocupacion="+ocupacion.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Padre Actualizado Correctamente</p>");
                exito();
                ocultar();
               
            }else{
                x.html ( "<p>"+res+"</p>");
                idMateria.value="";
                idGrado.setAttribute("autofocus","true");
                nombre.value="";
                error();
                ocultar();
                
                
            }
         });
    }   
}

function vistaActualizarMadre(idPersona){
 document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

var y= $("#tablaConsulta"); 
var url="/colegio/administrador/actualizarMadre";
var data="idPersona="+idPersona;
 envioJson2(url,data,function respuesta(res){   
   x.hide();            
    y.html (res);
    
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'
});
 
      
}
function actualizaMadre(){
 document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
        var idPersona = document.getElementById("idPersona");
        var nombres = document.getElementById("nombres");
        var apellidos = document.getElementById("apellidos");
        var ocupacion = document.getElementById("ocupacion");
        var telefono = document.getElementById("telefono");
        var telOfi = document.getElementById("telOfi");
        var direccion = document.getElementById("direccion");
        
    if (idPersona.value=="" || nombres.value=="" || apellidos.value=="" || ocupacion.value=="" || direccion.value==""){
    x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
    error();
    ocultar();
    }else{
       
        var url="/colegio/administrador/actualizaMadre/";
        var data="idPersona="+idPersona.value+"&nombres="+nombres.value+"&apellidos="+apellidos.value+"&telefono="+telefono.value+"&direccion="+direccion.value+"&telOfi="+telOfi.value+"&ocupacion="+ocupacion.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Madre Actualizado Correctamente</p>");
                exito();
                ocultar();
               
            }else{
                x.html ( "<p>"+res+"</p>");
                idMateria.value="";
                idGrado.setAttribute("autofocus","true");
                nombre.value="";
                error();
                ocultar();
                
                
            }
         });
    }   
}

