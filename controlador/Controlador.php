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
               header("Location: /colegio/inicio/index");
                return false;
            }else{
                $rol= new Rol();
                $idPersona=$_SESSION['idUsuario'];
                $roles = $rol->leerRoles($idPersona);
                $band=0;
                foreach($roles as $rol) {
                    if(strtoupper($rol->getNombre())== strtoupper($this->nombreModelo)){
                        $band = 1;
                    }
                }
                if ($band ==1){
                return true;    
                }else{
                    header("Location: /");
                    return false;
                }
                
            }
               
    }
    
    protected function configurarUsuario(){
         try{
               
             $idPersona=isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
             $username = isset($_POST['username']) ? $_POST['username'] : NULL;
             $password = isset($_POST['password']) ? $_POST['password'] : NULL;
             $user = new Usuario();
             $usuario = $user->leerPorId($idPersona);
             $passDesc= $password;
             
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
             
             $passDesc= $passwordActual;
             $clave= $passwordNew;
              
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
             
             $passDesc= $password;
             
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
            $respuesta = "
             
            ";
              
             if ($rol == 'D'){ 
                
          
                 
          $respuesta = "";
             
            $respuesta = '  <table border="0" align="center" width="100%" height="100%">
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
                                        <img height="150px" width="150px" src="../utiles/imagenes/avatarDefaul.png">
                                    </span> 
                                </div>    
                            </div> 
                             </td>
                        </tr>
                        <tr>
                            <td>
          ';
            }elseif($rol == 'E'){
            $respuesta = ' 
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
                                              <img height="150px" width="150px" src="../utiles/imagenes/avatarDefaul.png">
                                          </span> 
                                      </div>    
                                  </div>
                                     </td>
                        </tr>
                        <tr>
                            <td>

          ';
            
            }else{
                 echo json_encode("<tr> </tr>"); 
            }
             $respuesta .='    
                                   <table border="0" width="100%" id="inf-Personal"> 
                                   <tr><td class="color-text-gris">N° de Identificacion : <span>'. strtoupper($persona->getIdPersona()).'</span></td></tr>
                                      <tr><td class="color-text-gris">Nombres : <span>'. strtoupper($persona->getNombres()).'</span></td></tr>
                                       <tr><td class="color-text-gris">Apellidos :<span> '. strtoupper($persona->getPApellido()).' '. strtoupper($persona->getSApellido()).'</span></td></tr>  
                                       <tr><td class="color-text-gris">Sexo :<span>'. strtoupper($persona->getSexo()).'</span></td> </tr>                                        
                                       <tr><td class="color-text-gris">Telefono : <span>'. strtoupper($persona->getTelefono()).'</span></td></tr> 
                                       <tr><td class="color-text-gris">Direccion :<span>'. strtoupper($persona->getDireccion()).'</span></td</tr> 
                                       <tr><td class="color-text-gris">Correo :<span>'. strtoupper($persona->getCorreo()).'</span></td></tr>
                                       <tr><td class="color-text-gris">Fecha De Nacimiento :<span>'. strtoupper($persona->getFNacimiento()->format('Y-m-d')).'</span></td></tr>';
                                     if($rol == 'E'){ 
                               $respuesta .='<tr><td class="color-text-gris"><span><a  href="/colegio/administrador/imprimirMatricula/'.$idPersona.'" target="_blank" >Ficha de Matricula</a></span></td></tr>';
                                        }
                              $respuesta .='     </table>
                    </td>
                </tr>
             </table>   
           </div>
         </td>
            ';
             
            if ($rol == 'D'){
$respuesta .= ' 
     
   
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
          ';
      $resultado=0;
      $cont=0;
      $carga = new Carga();
      $cargas = $carga->leerCargasPorDocente($idPersona);
      foreach ($cargas as $carg) { 
        
          $respuesta .='<tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
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
    </td>  
         </tr>      
 </table>
      </div>

    ';
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
        
             $respuesta .= ' 
         
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
                                    <a href="#"onclick="seguimiento()" class="link-menu">Seguimiento Academico y Disciplinario</a>
                         </td>
                         <td  align="right">
                                    <a href="#"onclick="pension()" class="link-menu">Pension</a>
                         </td>
                        
              </table>    
             </div>
             
       <div class="den-form">
         <div id="carga" style="display:block">Consulte Datos de el Estudiante</div>
         
        <div id="datosAcademicos" style="display:none">
             <table width="100%" align="center" id="inf-Personal" >      
                                          <tr>
                                               <td>Salón :<span>'.$matr->getIdSalon().'</span></td>
                                                   <td>Grado :<span>'.$grad->getNombre(). '</span></td>
                                                   <td>Jornada :<span>'.$matr->getJornada(). '</span></td>
                                               </tr>
                                               </table></br>    
            <table aling="right" width="100%"  border="0">
            <tr>
            <td align="right" class="color-text-gris" colspan="3"><h3>Datos Academicos del Estudiante</h3></td>    
            </tr>
            </table>';
        
              $respuesta.='<table width="100%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
                    <tr class="modo1">
                    <td>Materia</td>
                    <td>Periodo 1</td>
                    <td>Periodo 2</td>
                    <td>Periodo 3</td>
                    <td>Periodo 4</td>
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
   </table>
 </div>
   <div id="familia" style="display:none">
          <h3 align="right">DATOS DE LOS FAMILIARES</h3></br> ';
            $est = new Estudiante();
            $est->leerAcudiente($idPersona,$est);
            $est->leerPadre($idPersona,$est);
            $est->leerMadre($idPersona,$est);
      $respuesta .= ' 
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
          <td class="color-text-gris">N° de Identificacion:<span>'.  $est->getIdAcudiente().'</td>
          </tr>
          <tr>
          <td class="color-text-gris">Nombres:<span>'.  $est->getNombresAcudiente().'</td>
          </tr>
           <tr>
          <td class="color-text-gris">Apellidos:<span>'.  $est->getApellidosAcudiente().'</td>
          </tr>
          <tr>
          <td class="color-text-gris">Ocupacion:<span>'.  $est->getOcupacionAcudiente().'</td>
          </tr>
          <tr>
          <td class="color-text-gris">Telefono:<span>'.  $est->gettelAcudiente().'</td>
          </tr>
          <tr>
          <td class="color-text-gris">Telefono de Oficina:<span>'.  $est->getTelOficinaAcudiente().'</td>
          </tr>
          <tr>
          <td class="color-text-gris">Direccion:<span>'.  $est->getDirAcudiente().'</td>
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
           <td class="color-text-gris">N° de Identificacion:<span>'. $est->getIdPadre().'</td>
          </tr> 
          <tr>
           <td class="color-text-gris">Nombres:<span>'.  $est->getNombresPadre().'</td>
          </tr>
           <tr>
           <td class="color-text-gris">Apellidos:<span>'.  $est->getApellidosPadre().'</td>
          </tr>
          <tr>
           <td class="color-text-gris">Ocupacion:<span>'.  $est->getOcupacionPadre().'</td>
          </tr>
          <tr>
           <td class="color-text-gris">Telefono:<span>'.  $est->getTelPadre().'</td>
          </tr>
          <tr>
           <td class="color-text-gris">Telefono de Oficina:<span>'.  $est->getTelOficinaPadre().'</td>
          </tr>
          <tr>
           <td class="color-text-gris">Direccion:<span>'.  $est->getDirPadre().'</td>
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
           <td class="color-text-gris">N° de Identificacion:<span>'.  $est->getIdMadre().'</td>
          </tr>
          <tr>
           <td class="color-text-gris">Nombres:<span>'.  $est->getNombresMadre().'</td>
          </tr>
           <tr>
          <td class="color-text-gris">Apellidos:<span>'.  $est->getApellidosMadre().'</td>
          </tr>
          <tr>
           <td class="color-text-gris">Ocupacion:<span>'.  $est->getOcupacionMadre().'</td>
          </tr>
          <tr>
           <td class="color-text-gris">Telefono:<span>'.  $est->getTelMadre().'</td>
          </tr>
          <tr>
           <td class="color-text-gris">Telefono de Oficina:<span>'.  $est->getTelOficinaMadre().'</td>
          </tr>
          <tr>
           <td class="color-text-gris">Direccion:<span>'.  $est->getDirMadre().'</td>
          </tr>
          </table>
          </div>
      
     </div>
    
 </div><!-- end dentro del form-->
 
     
       </td>  
         </tr>      
 </table>
 
  '  ;
            
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
       
       public function guardarSeguimiento(){
           try {
             $idPersona=isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
             $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : NULL;
             $msj = isset($_POST['msj']) ? $_POST['msj'] : NULL;
             $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : NULL;
             $seguimiento = new Seguimiento();
             $seguimiento->setIdPersona($idPersona);
             $seguimiento->setTipoSeguimiento($tipo);
             $seguimiento->setMensaje($msj);
             $seguimiento->setFecha($fecha);
             $seguimiento->crearSeguimiento($seguimiento);
             echo json_encode(1);
           } catch (Exception $exc) {
               echo json_encode($exc->getTraceAsString());
           }
              }
     
              public function seguimiento(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Seguimiento Academico');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        
        public function pension(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Pensión');
            $idPersona = $_SESSION['idUsuario'];
            $pension = new Pago();
            $pensiones = $pension->leerPensionesPorIdPersona($idPersona);
            $this->vista->set('pensiones', $pensiones);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        
        public function actualizarFoto(){
            session_start();
            $idPersona=$_SESSION['idUsuario'];
            $archivo = $_FILES["foto"]['name'];
            $trozos = explode(".", $archivo); 
            $extension = end($trozos); 
            $ruta = 'utiles/imagenes/fotos/';
            $destino = $ruta.$idPersona.".".$extension;
            $extensiones = ['jpg', 'jpeg', 'png'];
            
            if ($archivo != "") {
                $band=0;    
                for($i=0; $i<count($extensiones); $i++){
                    if ($extensiones[$i]==$extension){
                        $band = 1;
                    }
                }
                    if($band == 1){
                        if (file_exists($ruta.$idPersona.'.jpg')) {
                        unlink($ruta.$idPersona.'.jpg');
                        }elseif (file_exists($ruta.$idPersona.'.png')) {
                            unlink($ruta.$idPersona.'.png');
                        }elseif (file_exists($ruta.$idPersona.'.jpeg')) {
                            unlink($ruta.$idPersona.'.jpeg');
                        }
                        copy($_FILES['foto']['tmp_name'],$destino);
                    }
                    
            }
            
        }
   }
    


?>
