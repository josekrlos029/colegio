<?php
$ruta = 'utiles/imagenes/fotos/';
    if (file_exists($ruta.$idPersona.'.jpg')) {
        $img= '<img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.jpg">';
    }elseif (file_exists($ruta.$idPersona.'.png')) {
        $img= '<img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.png">';
    }elseif (file_exists($ruta.$idPersona.'.jpeg')) {
        $img= '<img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.jpeg">';
    }else{
        $img= '<img height="150px" width="150px" src="../utiles/imagenes/avatarDefaul.png">';
    }

     if ($rol == 'D'){ 
?>                
<table border="0" align="center" width="100%" height="100%">
    <tr>
       <td>    
          <div class="formularios" > 
           <div class="cab-form">
                   <table  width="100%" border="0">
                   <tr>                                     
                       <td>Informacion de Perfil</td>
                   </tr>
                   </table>

               </div>
               <table  width="100%">
              <tr> 
                  <td>    
                  <div class="marcoAvatardoc">
                      <div class="avatar">
                          <span class="rounded">
                              <?php echo $img; ?>
                          </span> 
                      </div>    
                  </div> 
                   </td>
              </tr>
              <tr>
                  <td>
<?php
  }elseif($rol == 'E'){
?>
  <table border="0" align="center" width="100%" height="100%">
    <tr>
       <td>    
          <div class="formularios" > 
           <div class="cab-form">
                   <table  width="100%" border="0">
                   <tr>                                     
                       <td>Informacion de Perfil</td>
                   </tr>
                   </table>

               </div>
               <table  width="100%">
              <tr> 
                  <td>
                        <div class="marcoAvatarest">
                            <div class="avatar">
                                <span class="rounded">
                                  <?php echo $img; ?>
                                </span> 
                            </div>    
                        </div>
                           </td>
              </tr>
              <tr>
                  <td>
<?php
            }else{ ?>
                 <tr> </tr> 
<?php            } ?>
             
                            <table border="0" width="100%" id="inf-Personal"> 
                            <tr><td class="color-text-gris">N° de Identificacion : <span><?php echo  strtoupper($persona->getIdPersona());?></span></td></tr>
                               <tr><td class="color-text-gris">Nombres : <span><?php echo  strtoupper($persona->getNombres());?></span></td></tr>
                                <tr><td class="color-text-gris">Apellidos :<span> <?php echo  strtoupper($persona->getPApellido())." ".strtoupper($persona->getSApellido());?></span></td></tr>  
                                <tr><td class="color-text-gris">Sexo :<span><?php echo  strtoupper($persona->getSexo());?></span></td> </tr>                                        
                                <tr><td class="color-text-gris">Telefono : <span><?php echo  strtoupper($persona->getTelefono());?></span></td></tr> 
                                <tr><td class="color-text-gris">Direccion :<span><?php echo  strtoupper($persona->getDireccion());?></span></td</tr> 
                                <tr><td class="color-text-gris">Correo :<span><?php echo  strtoupper($persona->getCorreo());?></span></td></tr>
                                <tr><td class="color-text-gris">Fecha De Nacimiento :<span><?php echo  strtoupper($persona->getFNacimiento()->format('Y-m-d'));?></span></td></tr>
<?php
                                if($rol == 'E'){  ?>
                        <tr><td class="color-text-gris"><span><a  href="/colegio/administrador/imprimirMatricula/<?php echo $idPersona;?>" target="_blank" >Ficha de Matricula</a></span></td></tr>
                          <?php       } ?>
                            </table>
             </td>
         </tr>
      </table>   
    </div>
  </td>
<?php
            if ($rol == 'D'){
?>
        <td width="90%" >     
       <div class="formularios">
                 <table aling="right" width="100%"  border="0" class="tabla">
       <tr>
           <td align="right" class="color-text-gris" colspan="3"><h3>Datos Academicos del Docente</h3></td>    
       </tr>
       <tr>
           <td class="color-text-rojo">salones</td>
          <td class="color-text-rojo">Materias</td>
          <td class="color-text-rojo">Horas</td>
       </tr>
        <tr>
           <td colspan="3"><hr></td>
       </tr> 
<?php       
      $resultado=0;
      $cont=0;
      $carga = new Carga();
      $cargas = $carga->leerCargasPorDocente($idPersona);
      foreach ($cargas as $carg) { 
?>        
  <tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
       <td><?php echo   $carg->getIdSalon();?> </td>
       <?php   $materia = new Materia();
          $materias = $materia->leerMateriaPorId($carg->getIdMateria());
            foreach ($materias as $mat) {
       ?>     
         <td><?php echo  strtoupper($mat->getNombreMateria());?> </td>
            <td>
                <?php echo  strtoupper($mat->getHoras());
                $cont=$mat->getHoras();
                $resultado=$resultado+$cont;   
              ?>
            </td>
            <?php
             } ?>
            </tr>
            <?php } ?>
          
        <tr>
           <td colspan="3"><hr></td>
       </tr>   
       <tr>
           <td colspan="3" class="color-text-gris" align="center">
               <h2>Total Horas Semanales: <?php echo $resultado;?></h2>
           </td>
       </tr>   
     
   </table>     
    </td>  
         </tr>      
 </table>
      </div>

<?php
            }elseif($rol == 'E'){
              $matricula = new Matricula();
            $matr = $matricula->leerMatriculaPorId($idPersona);
            $salon = new Salon();
            $sal = $salon->leerSalonePorId($matr->getIdSalon());
            $grado = new Grado();
            $grad= $grado->leerGradoPorId($sal->getIdGrado());
            $pensum = new Pensum();
            $pens = $pensum->leerPensum($matr->getIdSalon());
            $var = "datosAcademicos";
?>
        <td width="90%" >     
       <div class="formularios">
       <div class="cab-form">
                      <table  width="100%" border="0" >
                   <tr> 
                   <td align="right">
                            <a href="javascript:mostrarAcademico()" class="link-menu">Datos Academicos</a>
                        </td>
                        <td align="right">
                            <a href="javascript:mostrarFamilia()" class="link-menu">familia</a>
                        </td>
                         <td  align="right" width="35%">
                                    <a href="#"onclick="seguimiento(<?php echo $idPersona;?>)" class="link-menu">Seguimiento Academico y Disciplinario</a>
                         </td>
                         <td  align="right">
                                    <a href="#"onclick="pension(<?php echo $idPersona;?>)" class="link-menu">Pension</a>
                         </td>
                        
              </table>    
             </div>
             
       <div class="den-form">
         <div id="carga" style="display:block">Consulte Datos de el Estudiante</div>
         
        <div id="datosAcademicos" style="display:none">
             <table width="100%" align="center" id="inf-Personal" >      
                                          <tr>
                                               <td>Salón :<span><?php echo $matr->getIdSalon();?></span></td>
                                                   <td>Grado :<span><?php echo $grad->getNombre();?></span></td>
                                                   <td>Jornada :<span><?php echo $matr->getJornada();?></span></td>
                                               </tr>
                                               </table></br>    
            <table aling="right" width="100%"  border="0">
            <tr>
            <td align="right" class="color-text-gris" colspan="3"><h3>Datos Academicos del Estudiante</h3></td>    
            </tr>
            </table>
        
             <table width="100%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
                    <tr class="modo1">
                    <td>Materia</td>
                    <td>Periodo 1</td>
                    <td>Periodo 2</td>
                    <td>Periodo 3</td>
                    <td>Periodo 4</td>
                    <td>Promedio </td>
                    </tr>
             <?php
              $cont= 0;
              $s1=0;
              $s2=0;
              $s3=0;
              $s4=0;
            foreach ($pens as $pen){
                $cont++;
              ?>  
                <tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                <?php
                    $mat = new Materia();
                        $materia = $mat->leerMateriaPorId($pen->getIdMateria());
                         foreach ($materia as $mate){
                 ?>        
                              <td><b> <?php echo $mate->getNombreMateria();?></b> </td>
                 <?php        
                         }
                         $nota = new Nota();
                         $not =$nota->leerNotaEstudiante( $idPersona, $pen->getIdMateria());
                 ?>        
                         <td><?php echo $not->getPrimerP();?></td>
                         <td><?php echo $not->getSegundoP();?></td>
                         <td><?php echo $not->getTercerP();?></td>
                         <td><?php echo $not->getCuartoP();?></td>
                         <?php
                         $prom=round($nota->calcularDef2($not->getprimerP(),$not->getSegundoP(),$not->getTercerP(),$not->getCuartoP()),2);
                         //$prom=$prom/4;
                         ?>
                         <td class="color-text-azul"><?php echo $prom;?></td>
                </tr>
                <?php
                $s1 += $not->getPrimerP();
                $s2 += $not->getSegundoP();
                $s3 += $not->getTercerP();
                $s4 += $not->getCuartoP();
            }
            
             
            $p1 = round($s1/$cont,2); 
            $p2 = round($s2/$cont,2); 
            $p3 = round($s3/$cont,2); 
            $p4 = round($s4/$cont,2); 
            
            //$pg = round((($p1 + $p2 + $p3 + $p4 ) /4), 2);
            $pg = round($nota->calcularDef2($p1 , $p2 , $p3 , $p4 ), 2);
            ?>
            <tr>
           <td colspan="6"><hr></td>
       </tr>
       <tr>
           <td class="color-text-azul">PROMEDIO DE PERIODO</td>
           <td class="color-text-azul"><?php echo $p1;?></td>
           <td class="color-text-azul"><?php echo $p2;?></td>
           <td class="color-text-azul"><?php echo $p3;?></td>
           <td class="color-text-azul"><?php echo $p4;?></td>
           <td class="color-text-azul"><?php echo $pg;?></td>
          </tr>
          </table>
          </br>
       <table width="95%" align="center" border="0">
       <tr>
           <td class="color-text-gris" width="30%"><h2>Promedio General : <?php echo $pg;?></h2></td>
       </tr>   
   </table>
 </div>
   <div id="familia" style="display:none">
          <h3 align="right">DATOS DE LOS FAMILIARES</h3></br> 
          <?php  
          $est = new Estudiante();
            $est->leerAcudiente($idPersona,$est);
            $est->leerPadre($idPersona,$est);
            $est->leerMadre($idPersona,$est);
        ?> 
          <div style=" float:left; width:30%;  border: 1px solid #d3d6db;"  >
          <div class="cab-form">
                             <table  width="100%" border="0">
                             <tr>                                     
                                 <td>Datos del Acudiente</td>
                             </tr>
                             </table>
                             
                         </div>
          <table id="inf-Personal">
          <tr>
          <td class="color-text-gris">N° de Identificacion:<span><?php echo   $est->getIdAcudiente();?></td>
          </tr>
          <tr>
          <td class="color-text-gris">Nombres:<span><?php echo   $est->getNombresAcudiente();?></td>
          </tr>
           <tr>
          <td class="color-text-gris">Apellidos:<span><?php echo   $est->getApellidosAcudiente();?></td>
          </tr>
          <tr>
          <td class="color-text-gris">Ocupacion:<span><?php echo   $est->getOcupacionAcudiente();?></td>
          </tr>
          <tr>
          <td class="color-text-gris">Telefono:<span><?php echo   $est->gettelAcudiente();?></td>
          </tr>
          <tr>
          <td class="color-text-gris">Telefono de Oficina:<span><?php echo   $est->getTelOficinaAcudiente();?></td>
          </tr>
          <tr>
          <td class="color-text-gris">Direccion:<span><?php echo   $est->getDirAcudiente();?></td>
          </tr>
          <tr>
          <td class="color-text-gris"><span><a href="#" onclick="vistaActualizarAcudiente(<?php echo $idPersona;?>) " >Actualizar</a></span></td>
          </tr>
          </table>
          </div>
          <div style=" float:left; width:30%; border: 1px solid #d3d6db; margin-left:2%">
         <div class="cab-form">
                             <table  width="100%" border="0">
                             <tr>                                     
                                 <td>Datos del Padre</td>
                             </tr>
                             </table>
                             
                         </div>
           <table id="inf-Personal">
          <tr>
           <td class="color-text-gris">N° de Identificacion:<span><?php echo  $est->getIdPadre();?></td>
          </tr> 
          <tr>
           <td class="color-text-gris">Nombres:<span><?php echo   $est->getNombresPadre();?></td>
          </tr>
           <tr>
           <td class="color-text-gris">Apellidos:<span><?php echo   $est->getApellidosPadre();?></td>
          </tr>
          <tr>
           <td class="color-text-gris">Ocupacion:<span><?php echo   $est->getOcupacionPadre();?></td>
          </tr>
          <tr>
           <td class="color-text-gris">Telefono:<span><?php echo   $est->getTelPadre();?></td>
          </tr>
          <tr>
           <td class="color-text-gris">Telefono de Oficina:<span><?php echo   $est->getTelOficinaPadre();?></td>
          </tr>
          <tr>
           <td class="color-text-gris">Direccion:<span><?php echo   $est->getDirPadre();?></td>
          </tr>
           <tr>
          <td class="color-text-gris"><span><a href="#" onclick="vistaActualizarPadre(<?php echo $idPersona;?>) ">Actualizar</a></span></td>
          </tr>
          </table>
          </div>
          <div style=" float:left; width:30%; border: 1px solid #d3d6db; margin-left:2%">
          <div class="cab-form">
                             <table  width="100%" border="0">
                             <tr>                                     
                                 <td>Datos de la Madre</td>
                             </tr>
                             </table>
                             
                         </div>
           <table id="inf-Personal">
          <tr>
           <td class="color-text-gris">N° de Identificacion:<span><?php echo   $est->getIdMadre();?></td>
          </tr>
          <tr>
           <td class="color-text-gris">Nombres:<span><?php echo   $est->getNombresMadre();?></td>
          </tr>
           <tr>
          <td class="color-text-gris">Apellidos:<span><?php echo   $est->getApellidosMadre();?></td>
          </tr>
          <tr>
           <td class="color-text-gris">Ocupacion:<span><?php echo   $est->getOcupacionMadre();?></td>
          </tr>
          <tr>
           <td class="color-text-gris">Telefono:<span><?php echo   $est->getTelMadre();?></td>
          </tr>
          <tr>
           <td class="color-text-gris">Telefono de Oficina:<span><?php echo   $est->getTelOficinaMadre();?></td>
          </tr>
          <tr>
           <td class="color-text-gris">Direccion:<span><?php echo   $est->getDirMadre();?></td>
          </tr>
           <tr>
          <td class="color-text-gris"><span><a href="#" onclick="vistaActualizarMadre(<?php echo $idPersona;?>) ">Actualizar</a></span></td>
          </tr>
          </table>
          </div>
      
     </div>
    
 </div><!-- end dentro del form-->
 
     
       </td>  
         </tr>      
 </table>
<?php } ?>