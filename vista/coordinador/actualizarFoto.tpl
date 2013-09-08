<html>
    <head>
        <title>Redireccionando...</title>
        <script>
            function redireccionar(){
                
                var url = document.getElementById("url").value;
                location.href=url;
            } 
        </script>
    </head>
    <body  onpageshow ="redireccionar()">
        <input type="hidden" id="url" value="<?php echo $url; ?>" >        
    </body>
</html>