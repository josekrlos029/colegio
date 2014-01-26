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

        envioJson2(url,data,function respuesta(res){   
            $("#matricula").html(res);
            $("#matricula").show();
            $("#idPersona").attr("disabled","disabled");
            x.hide();
            $("#nuevo1").show();            
         });
    }   
} 

function matricular(){ 
  var idSalon = document.getElementById("idSalon");
   var r=confirm("Esta Seguro que desea matricularlo en el SALON: "+idSalon.value+" ?");
if (r==true)
  {
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
   
 var idPersona = document.getElementById("idPersona");
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
               window.open("/colegio/administrador/imprimirObservador/"+idPersona.value);
               nuevo();
            }else{
                 x.html ("<p>"+res+"</p>");
                 error();
                ocultar();
            }
            
         });
    }   
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
                context.drawImage(video, 200, 93, 240, 280, 90, 50, 113.4, 151.2);
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
       <div id="matricula" hidden></div>
       
       </div>
       
        <div id="fade" class="overlay"></div>
        <div id="light" class="modal">
        <div style="float:right">
            <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"><img src="../utiles/imagenes/iconos/close.png"/></a>
        </div>
        <div style="margin:5%; ">
            <h1>Capturar Foto</h1> 
            <article>
                
                <section style="float: left;">
                    <button id="btnStart" class="button large blue" >Encender WebCam</button>
                    <button id="btnStop"  class="button large blue">Pausar</button>           
                    <button id="btnPhoto" class="button large blue">Tomar Foto</button>
                </section>
                <br>
                <br>
                <video  id="video" width="320" height="240" style="float: left; position: absolute; top: 140px; left: 56px;" autoplay></video>
                <canvas id="canvas" width="320" height="240" style="float: left; margin-left: 40px; position: absolute; top: 198px; left: 400px;"></canvas>
                <img id="marco" width="113.4" height="151.2"  style="position: absolute; top: 177px; left: 160px;" src="../utiles/imagenes/marcoFoto.png" />
            </article>
        </div>    
</div>
        
    </body>
</html>
