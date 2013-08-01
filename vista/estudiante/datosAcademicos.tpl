
   <table aling="center" width="100%"  border="0">
       <tr>
           <td align="right" class="color-text-azul" colspan="3"><h3>Datos Academicos</h3></td>    
       </tr>
       <tr>
           <td class="color-text-azul" width="10%" >Grado:</td>
           <td><?php echo $grado->getNombre(); ?></td>
       </tr>   
       <tr>
           <td class="color-text-azul" width="10%" >Salón:</td>
           <td><?php echo $matricula->getIdSalon(); ?></td>
       </tr>   
       <tr>
           <td class="color-text-azul">Jornada:</td>
          <td><?php echo $matricula->getJornada(); ?></td>
       </tr>
      
   </table>
</br>
<div><?php echo $tabla;?></div>
<table aling="center" width="100%"  border="0">
       <tr>
           <td class="color-text-azul" width="30%">Periodos</td>
           <td class="color-text-azul">Promedios</td>
          
       </tr>
       <tr>
           <td class="color-text-azul" width="30%"><b>Primero</b></td>
           <td class="color-text-azul"><?php echo $p1; ?></td>
          
       </tr>
       <tr>
           <td class="color-text-azul" width="30%"><b>Segundo</b></td>
           <td class="color-text-azul"><?php echo $p2; ?></td>
          
       </tr>
       <tr>
           <td class="color-text-azul" width="30%"><b>Tercero</b></td>
           <td class="color-text-azul"><?php echo $p3; ?></td>
          
       </tr>
       <tr>
           <td class="color-text-azul" width="30%"><b>Cuarto</b></td>
           <td class="color-text-azul"><?php echo $p4; ?></td>
          
       </tr>
        <tr>
           <td colspan="2"><hr></td>
       </tr>   
       <tr>
           <td aling="center" class="color-text-gris"><h2>Promedio General: </h2></td>
           <td class="color-text-gris"><h2><?php echo $pg; ?></h2></td>
       </tr>   
   </table>    
