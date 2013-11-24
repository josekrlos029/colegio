   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
   
        <title><?php echo $titulo; ?></title>
    

<script type="text/javascript">
    
function nuevo(){
$("#idPersona").val("");
$("#idPersona").removeAttr("disabled");
$("#tabla").html(" ");
$("#matricula").hide();
$("#nuevo1").hide();
}    
    
function envio(){ 
  
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
   var y = $("#tabla");
 var idPersona = document.getElementById("idPersona");

    if (idPersona.value==""){
      x.html ( "<p>Error: Ingresar Numero de Documento</p>");
      error(); 
      ocultar();
    }else{

        var url="/colegio/administrador/consultarEstudiante/";
        var data="idPersona="+idPersona.value;

        envioJson(url,data,function respuesta(res){   
            if (res == "1"){
                x.html ("<p>El Número de Documento no existe en el sistema</p>");
                error(); 
                ocultar();
               
            }else if(res==2){
                 x.html ("<p>El estudiante ya se encuentra matriculado</p>");
                error();
                ocultar()
    
            }else if(res==3){
            x.html ("<p>El Número de Documento ingresado no corresponde al de un estudiante</p>");
                error();
                ocultar();
            }else{
            y.html(res);
            $("#matricula").show();
            $("#idPersona").attr("disabled","disabled");
            x.hide();
            $("#nuevo1").show();
            }
            
         });
    }   
} 

function matricular(){ 
  
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
   
 var idPersona = document.getElementById("idPersona");
 var idSalon = document.getElementById("idSalon");
 var jornada = document.getElementById("jornada");
var foto = $("#foto");


    if (idPersona.value==""){
      x.html ( "<p>Error: Ingresar Numero de Documento</p>");
       error();
       ocultar();
    }else{

        var url="/colegio/administrador/matricular";
        var data="idPersona="+idPersona.value+"&idSalon="+idSalon.value+"&jornada="+jornada.value+"&foto="+foto.attr("src");

        envioJson(url,data,function respuesta(res){   
            if (res == "1"){
                x.html ("<p>Estudiante Matriculado Correctamente</p>");
                exito();
                ocultar();
               
               window.open("/colegio/administrador/imprimirMatricula/"+idPersona.value);
               nuevo();
            }else{
                 x.html ("<p>"+res+"</p>");
                 error();
                ocultar();
            }
            
         });
    }   
}

window.onload = function() {

    //Compatibility
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia;

    var canvas = document.getElementById("canvas"),
        context = canvas.getContext("2d"),
        video = document.getElementById("video"),
        btnStart = document.getElementById("btnStart"),
        btnStop = document.getElementById("btnStop"),
        btnPhoto = document.getElementById("btnPhoto"),
        videoObj = {
            video: true,
            audio: false
        };

    btnStart.addEventListener("click", function() {
        var localMediaStream;

        if (navigator.getUserMedia) {
            navigator.getUserMedia(videoObj, function(stream) {              
                video.src = (navigator.webkitGetUserMedia) ? window.webkitURL.createObjectURL(stream) : stream;
                localMediaStream = stream;
                
            }, function(error) {
                console.error("Video capture error: ", error.code);
            });

            btnStop.addEventListener("click", function() {
                localMediaStream.stop();
            });

            btnPhoto.addEventListener("click", function() {
                limpiar(); 
                context.drawImage(video, 0, 0, 320, 240);
               var img = document.getElementById("imagen");
               img.appendChild(convertCanvasToImage(canvas));
               // $("#imagen2").append($("#foto").attr("src"));
            });
        }
    });
};

function convertCanvasToImage(canvas) {
	var image = new Image();
	image.src = canvas.toDataURL();
        image.setAttribute('id','foto');
        //image.src=image.src.replace("image/png",'image/octet-stream');
	return image;
}
function abrir(){

    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block'

}
function limpiar(){
        var canvas = document.getElementById("canvas"),
        context = canvas.getContext("2d");
        context.clearRect(0, 0, canvas.width, canvas.height);
        $("#imagen").html(" ");
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
                <div id="cabecera" class="blue">
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center" border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Matricula De Estudiantes</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                     
                         
     <!-------------------------------------------------------------------->     
     
       <table width="50%" border="0" cellspacing="0" cellpadding="2">
                
           <td align="right">Digite Numero de Documento:</td>
           <td><input name="idPersona"  id="idPersona" type="text" class="box-text" value="<?php echo $id; ?>" required/></td>
           <td><input name="consultarEstudiante" id="consultarEstudiante" type="submit" value="Consultar" class="button large blue" onclick="envio()" /></td>
           <td id="nuevo1" hidden><input name="nuevo" id="nuevo" type="submit" value="Nuevo" class="button large green" onclick="nuevo()" /></td>
       </tr>
        </table>
      <p>&nbsp;</p>
      <hr>
       <p>&nbsp;</p>
       <div style="position: relative; margin-left: 10%; width: 80%;">
       <h1 class="color-text-gris">Datos del estudiante</h1>   
       <div  id="tabla">
           
        </div>
           <p>&nbsp;</p>
           <div id="matricula" hidden>
               <table class="tabla" width="50%" border="0" cellspacing="0" cellpadding="2" >
                   <tr>
                  
                  <td colspan="2" class="color-text-gris"><h1>realizar matricula</h1></td>
                   </tr>
                   <tr class="modo1">
                       <td>SALON</td>
                       <td>JORNADA</td>
                   </tr>
                   
                     <tr><td>
                          <select id="idSalon" class="box-text">
                   <?php foreach ($salones as $salon) { ?>
                   <option><?php echo $salon->getIdSalon();?></option>
                    <?php } ?>
               </select>
                         </td>
                     
                         <td>
                             <select id="jornada" class="box-text">
                                 <option>MAÑANA</option>
                                 <option>TARDE</option>
                                 <option>NOCHE</option>
                             </select>
                         </td>
                     </tr>
                     <tr>
                    <td align="right" width="40%"></td>
                    <td><button class="button large blue" id="insertarImagen" onclick="abrir()">Insertar Imagen</button></td>
               </tr>
               <tr>
                   <td></td>
                   <td><p id="imagen" style="float: left;"><img id="foto" src="" /></p></td>
                </tr>
                     </table>
                       <p>&nbsp;</p>
                     <table>
                     <tr>
                    <td colspan="2">
                    <input name="matricularEstudiante" id="matricularEstudiante" type="submit" value="Matricular" class="button large blue" onclick="matricular()" />
                    </td>
                </tr>
               </table>
               
               
           </div>
       </div>
       <div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <div style="float:right">
      <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
 </div>
    
   
    
        <div style="margin:20%; ">
         <h1>Capturar Foto</h1> 
          
        <article>
         <video  id="video" width="320" height="200" autoplay></video>
            <section style="float: left;">
                <button id="btnStart" class="button large blue" >Encender WebCam</button>
                 <button id="btnStop"  class="button large blue">Pausar</button>           
                 <button id="btnPhoto" class="button large blue">Tomar Foto</button>
            </section>
            <canvas id="canvas" width="320" height="240" style="float: left;"></canvas>
        </article>
        </div>    
</div>
        
    </body>
</html>
