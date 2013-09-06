/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function cambiacolor_over(celda){ 
    celda.style.backgroundColor="#cccccc" 
    element.style.fontSize = "15px";
    element.style.color = "#000";
} 
function cambiacolor_out(celda){ 
    celda.style.backgroundColor="transparent" 
    
}

function habilitarPersona(idPersona){ 
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

        var url="/colegio/administrador/habilitarPersona/";
        var data="idPersona="+idPersona;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Persona habilitada Correctamente</p>");
                exito();
                ocultar();
               document.location.href="/colegio/administrador/usuarioAdministrador";
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
function inhabilitarPersona(idPersona){ 
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

        var url="/colegio/administrador/inhabilitarPersona/";
        var data="idPersona="+idPersona;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Persona Inhabilitada Correctamente</p>");
                exito();
                ocultar();
               document.location.href="/colegio/administrador/usuarioAdministrador";
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