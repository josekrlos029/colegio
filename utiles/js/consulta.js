 function seguimiento(){
           
            ocultar("familia");
            ocultar("datosAcademicos");
            $('#carga').load('/colegio/estudiante/seguimiento'); 
            document.getElementById('carga').style.display="block";
            }
            function pension(){ 
            
            ocultar("familia");
            ocultar("datosAcademicos");
            $('#carga').load('/colegio/estudiante/pension');
             document.getElementById('carga').style.display="block";
            }
            function ocultar(id){
            document.getElementById(id).style.display="none";
            }
            function mostrarAcademico(){
            ocultar("carga");
            ocultar("familia");
            document.getElementById('datosAcademicos').style.display="block";
            }
            function mostrarFamilia(){
            ocultar("carga");
            ocultar("datosAcademicos");
            document.getElementById('familia').style.display="block";
            }/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


