   <?php include HOME . DS . 'includes' . DS . 'cargaCabecera.php'; ?>
   
        <title><?php echo $titulo; ?></title>
    

<script type="text/javascript">

function guardaFoto(){ 
  
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
   
 var idPersona = document.getElementById("idPersona");
var foto = $("#foto2");


    if (idPersona.value==""){
      x.html ( "<p>Error: Ingresar Numero de Documento</p>");
       error();
       ocultar();
    }else{

        var url="/colegio/administrador/guardarFotoCam";
        var data="idPersona="+idPersona.value+"&foto="+foto.attr("src");

        envioJson(url,data,function respuesta(res){   
            if (res == "1"){
                x.html ("<p>Foto Guardada Correctamente</p>");
                exito();
                ocultar();
               $("#btnStop").click();
            }else{
                 x.html ("<p>"+res+"</p>");
                 error();
                ocultar();
            }
            
         });
    }   
    
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

        var url="/colegio/administrador/consultaActEstudiante/";
        var data="idPersona="+idPersona.value;

        envioJson2(url,data,function respuesta(res){   
            
            y.html(res);
            $("#idPersona").attr("disabled","disabled");
            x.hide();
                        
         });
    }   
} 

function actualizarEstudiante(){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 
 var idPersona = document.getElementById("idPersona");
 var nombres = document.getElementById("nombres");
 var pApellido = document.getElementById("pApellido");
 var sApellido = document.getElementById("sApellido");
 var sexo = document.getElementById("sexo");
 var telefono = document.getElementById("telefono");
 var direccion = document.getElementById("direccion");
 var correo = document.getElementById("correo");
 var fNacimiento = document.getElementById("fNacimiento");
 var Estado = document.getElementById("estado");
 
 

    if (idPersona.value=="" || nombres.value=="" || pApellido.value=="" || sApellido.value=="" || fNacimiento.value=="" || Estado.value==""){
    
    x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
      error();
      ocultar();
    }else{
        var url="/colegio/administrador/actualizaPersonas/";
        var data="idPersona="+idPersona.value+"&nombres="+nombres.value+"&pApellido="+pApellido.value+"&sApellido="+sApellido.value+"&sexo="+sexo.value+"&telefono="+telefono.value+"&direccion="+direccion.value+"&correo="+correo.value+"&fNacimiento="+fNacimiento.value+"&Estado="+Estado.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Estudiante Actualizado Correctamente</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/actualizarEstudiante";
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

function actualizaAcudiente(){

 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");

 var idPersona = document.getElementById("idAcudiente");
 var nombres = document.getElementById("nombresAcu");
 var apellidos = document.getElementById("apellidosAcu");
 var ocupacion = document.getElementById("ocupacionAcu");
 var telefono = document.getElementById("telefonoAcu");
 var telOfi = document.getElementById("telOfiAcu");
 var direccion = document.getElementById("direccionAcu");

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
                document.location.href="/colegio/administrador/actualizarEstudiante";
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
function actualizaPadre(){

 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
 var idEstudiante = document.getElementById("idPersona");
        var idPersona = document.getElementById("idPadre");
        var nombres = document.getElementById("nombresPad");
        var apellidos = document.getElementById("apellidosPad");
        var ocupacion = document.getElementById("ocupacionPad");
        var telefono = document.getElementById("telefonoPad");
        var telOfi = document.getElementById("telOfiPad");
        var direccion = document.getElementById("direccionPad");
        
    if (idPersona.value=="" || nombres.value=="" || apellidos.value=="" || ocupacion.value=="" || direccion.value==""){
    x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
    error();
    ocultar();
    }else{
       
        var url="/colegio/administrador/actualizaPadre/";
        var data="idPersona="+idPersona.value+"&nombres="+nombres.value+"&apellidos="+apellidos.value+"&telefono="+telefono.value+"&direccion="+direccion.value+"&telOfi="+telOfi.value+"&ocupacion="+ocupacion.value+"&idEstudiante="+idEstudiante.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Padre Actualizado Correctamente</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/actualizarEstudiante";
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
function actualizaMadre(){
 var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
  var idEstudiante = document.getElementById("idPersona");
        var idPersona = document.getElementById("idMadre");
        var nombres = document.getElementById("nombresMad");
        var apellidos = document.getElementById("apellidosMad");
        var ocupacion = document.getElementById("ocupacionMad");
        var telefono = document.getElementById("telefonoMad");
        var telOfi = document.getElementById("telOfiMad");
        var direccion = document.getElementById("direccionMad");
        
    if (idPersona.value=="" || nombres.value=="" || apellidos.value=="" || ocupacion.value=="" || direccion.value==""){
    x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
    error();
    ocultar();
    }else{
       
        var url="/colegio/administrador/actualizaMadre/";
        var data="idPersona="+idPersona.value+"&nombres="+nombres.value+"&apellidos="+apellidos.value+"&telefono="+telefono.value+"&direccion="+direccion.value+"&telOfi="+telOfi.value+"&ocupacion="+ocupacion.value+"&idEstudiante="+idEstudiante.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Madre Actualizado Correctamente</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/actualizarEstudiante";
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

function actualizarId(){
   
    var btn = $("#btnMod");
        if (btn.val()=="Modificar Identificación"){
            $("#idPer").removeAttr("disabled");
            btn.val("Procesar Modificación")
        }else{
             var x = $("#mensaje");
 cargando();
 x.html ("<p>Cargando...</p>");
 x.show("slow");
            var idPersona =document.getElementById("idPersona");
            var idNuevo = document.getElementById("idPer");
            if (idPersona.value=="" || idNuevo.value=="" ){
    x.html ( "<p>Error: Tiene Campos Requeridos Vacios</p>");
    error();
    ocultar();
    }else{
       
        var url="/colegio/administrador/actualizaIdPersona";
        var data="idPersona="+idPersona.value+"&idNuevo="+idNuevo.value;

        envioJson(url,data,function respuesta(res){   
            if (res == 1){
                x.html ( "<p>Id Actualizado Correctamente</p>");
                exito();
                ocultar();
                document.location.href="/colegio/administrador/actualizarEstudiante";
            }else{
                x.html ( "<p>"+res+"</p>");
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
        image.setAttribute('id','foto2');
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
      <p>&nbsp;</p>
            </br>
           <p>&nbsp;</p>
        <div id="encapsulador">
            <div id="mensaje" hidden> </div>
                <div id="cabecera" class="blue">
                    <div class="color-text-blanco" id="title-cab">
                        <table width="80%" align="center"  border="0" cellspacing="0" cellpadding="2">
                         <tr>   
                            <td align="right">   
                                <h1>Actualizar Datos del Estudiante</h1>
                            </td>
                         </tr>
                        </table>
                    </div>
                </div>
        </div> 
                <p>&nbsp;</p>
                     
                         
     <!-------------------------------------------------------------------->     
     
       <table width="50%" border="0" cellspacing="0" cellpadding="2">
         <tr>       
           <td align="right">Digite Numero de Documento:</td>
           <td><input name="idPersona"  id="idPersona" type="text" class="box-text" required/></td>
           <td><input name="consultarEstudiante" id="consultarEstudiante" type="submit" value="Consultar" class="button large blue" onclick="envio()" /></td>
         
       </tr>
        </table>
      <p>&nbsp;</p>
      <hr>
       <p>&nbsp;</p>
       <div  id="tabla" align="left">
           
           
     

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
        <!-------------------------------------------------------------------->         

    <script type="text/javascript">
 $("#accordion > li > span").click(function(){
 if(false == $(this).next().is(':visible')) {
 $('#accordion ul').slideUp(300);
 }
 $(this).next().slideToggle(300);
 });
 $('#accordion ul:eq(0)').show();
 </script>
        
    </body>
</html>
