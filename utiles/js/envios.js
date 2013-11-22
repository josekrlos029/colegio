
function envioJson(url,data,respuesta){
    
    
     $.ajax({
			        async:	true, 
				type:	"post",
				data:	data,
				url:	url,
				dataType:"html",
				success: function(data){
                                    
				    //JSON.decode( data );
                                    var json = eval("(" + data + ")");
                                    respuesta(json);
				    //var json= jQuery.parseJSON(data);     
                                    
				    }
		        });
}
function envioJson2(url,data,respuesta){
    
    
     $.ajax({
			        async:	true, 
				type:	"post",
				data:	data,
				url:	url,
				dataType:"html",
				success: function(data){
                                    
				    //var json=JSON.decode( data );
                                    //var json = eval("(" + data + ")");
				    //var json= jQuery.parseJSON(data);     
                                    respuesta(data);
				    }
		        });
}


 function getAjax() {
                var xmlhttp;
                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                } else {
                    xmlhttp = new ActiveObject("Microsoft.XMLHTTP");
                }
                return xmlhttp;
            }
 
function envioRequest(url, data,respuesta){
   
    var ajax = getAjax();
         ajax.onreadystatechange = function() {
                    if (ajax.readyState == 4) {
                        if (ajax.status == 200) {
                            var datos = ajax.responseText;
                            respuesta(datos); 
                        }
                    }
                }
                ajax.open("POST",url , true);
ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");                
ajax.send(data);
    
}
