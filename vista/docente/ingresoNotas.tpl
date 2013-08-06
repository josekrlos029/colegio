<script>
function cargarMaterias(){ 
 
 var y =$("#materia"); 
 var b= $("#ingresoNotas");
  
 var idSalon = document.getElementById("salon").value;

    if (idSalon!=""){
        var url="/colegio/docente/imprimirMateriasPorSalon";
        var data="idSalon="+idSalon;
        envioJson(url,data,function respuesta(res){               
        y.html (res);
        b.removeAttr("disabled");
         });  
    }
    }
    

</script>
<form name="input" action="/colegio/docente/verNotas" method="post">
   <table aling="center" width="100%"  border="0">
       <tr>
           <td align="right" class="color-text-rojo" colspan="3"><h3>Ingreso De Notas</h3></td>    
       </tr>
        <tr>
           <td colspan="3" aling="center" class="color-text-gris"><h2>Ubicacion:</h2></td>
       </tr> 
       <tr>
           <td class="color-text-rojo" width="30%">Periodo</td>
           <td class="color-text-rojo" width="30%" align="right">Salon</td>
           <td class="color-text-rojo" width="30%" align="right">Materia</td>
       </tr>
        <tr>
           <td colspan="3"><hr></td>
       </tr> 
       <tr>
           <td><select name="periodo" class="box-text" id="periodo" required > 
                   <option>PRIMERO</option>
                   <option>SEGUNDO</option>
                   <option>TERCERO</option>
                   <option>CUARTO</option>
               </select>
           </td>
           <td align="right"><select name="salon" class="box-text" id="salon" onchange="cargarMaterias()" required focus>
                        <option></option>
                        <?php foreach($salones as $salon) { ?>
                        <option><?php  echo $salon; ?></option>
                        <?php } ?>
               </select>
           </td>
           <td align="right">
               <select name="materia" class="box-text" id="materia" required> 
                      
               </select>
           </td>
       </tr>  
      </table>
    </br>
    <table align="right">
       <tr>
           <td colspan="3" aling="center">
               <input name="ingresoNotas" id="ingresoNotas" type="submit" value="Ingresar Notas" class="button large red" onclick="ingresoNotas()"  disabled/>  
           </td>
       </tr>   
   </table>    
</form>
