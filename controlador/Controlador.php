<?php

/**
 * Clase principal de los controladores en la aplicacion
 * @author Wilman Vega <wilmanvega@gmail.com>
 *
 */
class Controlador {

    
    protected $modelo;
    protected $controlador;
    protected $accion;
    protected $vista;
    protected $nombreModelo;

    public function __construct($modelo, $accion) {
        $this->controlador = ucwords(__CLASS__); // __CLASS__: Es el nombre de la clase actual
        $this->accion = $accion;
        $this->nombreModelo = $modelo;
        $this->vista = new Vista(HOME . DS . 'vista' . DS . strtolower($this->nombreModelo) . DS . $accion . '.tpl');
    }

    protected function setModelo($nombreModelo) {
        $this->modelo = new $nombreModelo();
    }

    protected function setVista($nombreVista) {
        $this->vista = new Vista(HOME . DS . 'vista' . DS . strtolower($this->nombreModelo) . DS . $nombreVista . '.tpl');
    }
    
    protected function enviarCorreo($msg,$correo,$asunto,$nombre){
        
            $mailer = new PHPMailer();
            $mailer->SetFrom("josekrlos029@gmail.com" , $asunto);
            $direccion = $correo;
            $mailer->AddAddress($direccion, $nombre);
            $mailer->CharSet = "UTF-8";
            $mailer->SMTPDebug = true;
            $mailer->Subject = $asunto;
            $mailer->MsgHTML($msg);
            $mailer->IsSMTP();
            $mailer->Host = "smtp.gmail.com";
            $mailer->Port = 587;
            $mailer->SMTPAuth = true;
            $mailer->SMTPSecure = "tls";
            $mailer->Username = "josekrlos029@gmail.com";
            $mailer->Password = "1009jose";
           
            if (!$mailer->Send()) {
                
                echo json_encode(2);
            } else {
                echo json_encode(1);
            }
        
        
    }
    
    protected function verificarSession(){
             session_start();
            if (!isset($_SESSION['idUsuario'])) {
                
                $inicio = new InicioControl("inicio","index");
                $inicio->index();
                return false;
            }else{
                return true;
            }
               
    }
    
    protected function configurarUsuario(){
         try{
               
             $idPersona=isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
             $username = isset($_POST['username']) ? $_POST['username'] : NULL;
             $password = isset($_POST['password']) ? $_POST['password'] : NULL;
             $user = new Usuario();
             $usuario = $user->leerPorId($idPersona);
             $passDesc= sha1($password);
             
          if($passDesc != $usuario->getContraseña()){
                echo json_encode(2); 
             }else{
                $user->actualizarUsuario($idPersona,$username); 
                echo json_encode(1); 
                }
       
         } catch (Exception $exc) {
                 echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
             }

         }
         
         protected function configurarContraseña(){
         try{
             $idPersona=isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
             $passwordActual = isset($_POST['passwordActual']) ? $_POST['passwordActual'] : NULL;
             $passwordNew = isset($_POST['passwordNew']) ? $_POST['passwordNew'] : NULL; 
             
             $user = new Usuario();
             $usuario = $user->leerPorId($idPersona);
             
             $passDesc= sha1($passwordActual);
             $clave= sha1($passwordNew);
              
            if($passDesc != $usuario->getContraseña()){
                echo json_encode(2); 
             }else{
                $user->actualizarContraseña($idPersona,$clave); 
                echo json_encode(1);  
             }
                
         
             
            }catch (Exception $exc) {
                 echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
             }

         }
         
         protected function configurarCorreo(){
           try{
             
             $idPersona=isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
             $correo = isset($_POST['correo']) ? $_POST['correo'] : NULL;
             $password = isset($_POST['passwordC']) ? $_POST['passwordC'] : NULL;
             
             $user = new Usuario();
             $usuario = $user->leerPorId($idPersona);
             
             $passDesc= sha1($password);
             
              if($passDesc != $usuario->getContraseña()){
                echo json_encode(2); 
             }else{
                $persona = new Persona();
                $persona->actualizarCorreo($idPersona,$correo); 
                echo json_encode(1);  
             }
             
             }catch (Exception $exc) {
             echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
             }
         }
         
          public function consultaGeneralPersona(){
            try{
           $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $pers = new Persona();
            $rolPersona = new Rol();
            $roles = $rolPersona->rolPersona($idPersona);
            $rol=$roles->getIdRol(); 
            $persona = $pers->leerPorId($idPersona);
            $respuesta = "";
              
             if ($rol == 'D'){ 
            $respuesta = "";
             
            $respuesta = ' <div class="contenedorDp" >     
                            <div class="marcoAvatardoc">
                                <div class="avatar">
                                    <span class="rounded">
                                        <img height="150px" width="150px" src="../utiles/imagenes/avatarDefaul.png">
                                    </span> 
                                </div>    
                            </div> 
          ';
            }elseif($rol == 'E'){
            $respuesta = ' <div class="contenedorDp" >     
                            <div class="marcoAvatarest">
                                <div class="avatar">
                                    <span class="rounded">
                                        <img height="150px" width="150px" src="../utiles/imagenes/avatarDefaul.png">
                                    </span> 
                                </div>    
                            </div> 
          ';
            
            }else{
                 echo json_encode("<tr> </tr>"); 
            }
             $respuesta .='    
                                   <table border="0" width="100%"> 
                                      <tr><td class="color-text-gris">Nombres:</td></tr> 
                                       <tr><td>'. strtoupper($persona->getNombres()).'</td></tr>
                                       <tr><td class="color-text-gris">Apellidos:</td></tr>
                                       <tr><td>'. strtoupper($persona->getPApellido()).' '. strtoupper($persona->getSApellido()).'</td></tr>  
                                       <tr><td class="color-text-gris">Sexo:</td></tr>                                       
                                       <tr><td>'. strtoupper($persona->getSexo()).'</td> </tr>                                        
                                       <tr><td class="color-text-gris">Telefono:</td></tr>
                                       <tr><td>'. strtoupper($persona->getTelefono()).'</td></tr> 
                                       <tr><td class="color-text-gris">Direccion:</td></tr>
                                       <tr><td>'. strtoupper($persona->getDireccion()).'</td</tr> 
                                       <tr><td class="color-text-gris">Correo:</td></tr>    
                                       <tr><td>'. strtoupper($persona->getCorreo()).'</td></tr>
                                       <tr><td class="color-text-gris">Fecha De Nacimiento:</td></tr>
                                    <tr><td>'. strtoupper($persona->getFNacimiento()->format('Y-m-d')).'</td></tr>
                                </table>
             </div>';
             
            if ($rol == 'D'){
$respuesta .= ' 
     
<div class="contenedorCentro">
                 <table aling="right" width="100%"  border="0">
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
          ';
      $resultado=0;
      $cont=0;
      $carga = new Carga();
      $cargas = $carga->leerCargasPorDocente($idPersona);
      foreach ($cargas as $carg) { 
        
          $respuesta .='<tr>
          <td>'.  $carg->getIdSalon().' </td>
         ';
          $materia = new Materia();
          $materias = $materia->leerMateriaPorId($carg->getIdMateria());
            foreach ($materias as $mat) { 
            $respuesta .='<td>'. strtoupper($mat->getNombreMateria()).' </td>
            <td>
                '. strtoupper($mat->getHoras());
                $cont=$mat->getHoras();
                $resultado=$resultado+$cont;   
              
            $respuesta .='</td>';
             }
            $respuesta .='</tr>';
            }
          
        $respuesta .='<tr>
           <td colspan="3"><hr></td>
       </tr>   
       <tr>
           <td colspan="3" class="color-text-gris" align="center">
               <h2>Total Horas Semanales: '.$resultado.'</h2>
           </td>
       </tr>   
     
   </table>     
</div>

    ';
            }elseif($rol == 'E'){
             $respuesta .= ' 
            <div class="contenedorCentro">
            <table aling="right" width="100%"  border="0">
            <tr>
            <td align="right" class="color-text-gris" colspan="3"><h3>Datos Academicos del Estudiante</h3></td>    
            </tr>
            </table>';
             $matricula = new Matricula();
            $matr = $matricula->leerMatriculaPorId($idPersona);
            $salon = new Salon();
            $sal = $salon->leerSalonePorId($matr->getIdSalon());
            $grado = new Grado();
            $grad= $grado->leerGradoPorId($sal->getIdGrado());
            $pensum = new Pensum();
            $pens = $pensum->leerPensum($matr->getIdSalon());
            
              $respuesta.='<table width="95%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
                    <tr class="modo1">
                    <td>Materia</td>
                    <td>Primer Periodo</td>
                    <td>Segundo Periodo</td>
                    <td>Tercer Periodo</td>
                    <td>Cuarto Periodo</td>
                    <td>Promedio </td>
                    </tr>
                    ';
              $cont= 0;
              $s1=0;
              $s2=0;
              $s3=0;
              $s4=0;
            foreach ($pens as $pen){
                $cont++;
                $respuesta.='<tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">';
                        $mat = new Materia();
                        $materia = $mat->leerMateriaPorId($pen->getIdMateria());
                         foreach ($materia as $mate){
                              $respuesta.='<td><b> '.$mate->getNombreMateria().'</b> </td>';
                         }
                         $nota = new Nota();
                         $not =$nota->leerNotaEstudiante( $idPersona, $pen->getIdMateria());
                         $respuesta.='<td>'.$not->getPrimerP().'</td>';
                         $respuesta.='<td>'.$not->getSegundoP().'</td>';
                         $respuesta.='<td>'.$not->getTercerP().'</td>';
                         $respuesta.='<td>'.$not->getCuartoP().'</td>';
                         $prom=$not->getprimerP()+$not->getSegundoP()+$not->getTercerP()+$not->getCuartoP();
                         $prom=$prom/4;
                         $respuesta.='<td class="color-text-azul">'.$prom.'</td>';
                $respuesta.='</tr>';
                
                $s1 += $not->getPrimerP();
                $s2 += $not->getSegundoP();
                $s3 += $not->getTercerP();
                $s4 += $not->getCuartoP();
            }
            
             
            $p1 = $s1/$cont; 
            $p2 = $s2/$cont; 
            $p3 = $s3/$cont; 
            $p4 = $s4/$cont; 
            
            $pg = ($p1 + $p2 + $p3 + $p4 ) /4;
            
            $respuesta .= ' <tr>
           <td colspan="6"><hr></td>
       </tr>
       <tr>
           <td class="color-text-azul">PROMEDIO DE PERIODO</td>
           <td class="color-text-azul">'.$p1.'</td>
           <td class="color-text-azul">'.$p2.'</td>
           <td class="color-text-azul">'.$p3.'</td>
           <td class="color-text-azul">'.$p4.'</td>
           <td class="color-text-azul">'.$pg.'</td>
          </tr>
          </table>
          </br>
       <table width="95%" align="center" border="0">
       <tr>
           <td class="color-text-gris" width="30%"><h2>Promedio General : '.$pg. '</h2></td>
       </tr>   
   </table> '  ;
            
            $respuesta.='</div>';   
            }else{
               echo json_encode("<tr> </tr>"); 
            }
                      
            if (strlen($respuesta)>0){
            echo json_encode($respuesta);  
            }  else {
                echo json_encode("<tr> </tr>"); 
            } 
            } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
       }
         
         
         
   }
    


?>
