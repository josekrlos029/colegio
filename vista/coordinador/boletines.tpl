<script>
function envio(){ 
 
 var idSalon = document.getElementById("idSalon").value;
 var periodo = document.getElementById("periodo").value;

      window.open("/colegio/administrador/generarBoletin/"+idSalon+","+periodo)
    }

</script>
    
<div style="margin: 0 auto;" id="tablaConsulta">
         <h1 style="margin-left: 235px">IMPRIMIR BOLETINES</h1>
          <table border="0" style="margin: 0 auto; width: 50%;" >
              <tr>
                  <td><b>Salón</b></td>
                  <td><b>Periodo</b></td>
              </tr>
              <tr>
                  <td><select id="idSalon" class="box-text">
                          <?php foreach ($salones as $salon) { ?>    
                          <option><?php echo $salon->getIdSalon();?></option>
                          <?php } ?>
                      </select></td>
                      <td><select id="periodo" class="box-text">
                          <option>PRIMERO</option>
                          <option>SEGUNDO</option>
                          <option>TERCERO</option>
                          <option>CUARTO</option>
                          <option>FINAL</option>
                      </select></td>
                      <td><input name="generarBoletin" id="generarBoletin" type="submit" value="Generar" class="button large green" onclick="envio()" /></td>
              </tr>
          </table>
</div>