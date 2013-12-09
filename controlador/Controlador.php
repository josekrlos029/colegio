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
     public function cerrarSesion(){
        try {
            if($this->verificarSession()){
            session_unset();
	    session_destroy();
	    header ('Location:../');
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
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
            $roles = $rolPersona->leerRoles($idPersona);
            foreach ($roles as $ro){
                if ($ro->getIdRol()== 'D'){
                    $rol = $ro->getIdRol();
                }elseif ($ro->getIdRol()== 'E'){
                    $rol = $ro->getIdRol();
                }
            }
            $persona = $pers->leerPorId($idPersona);
                $this->vista->set('idPersona', $idPersona);
                $this->vista->set('persona', $persona);
                $this->vista->set('rol', $rol);
                return $this->vista->imprimir(); 
            } catch (Exception $exc) {
            $this->setVista('mensaje');
                $msj ="ERROR... La consulta no se pudo ejecutar.. !";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
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
        
        public function seguimiento2($idPersona){
         try {
            
            $this->vista->set('titulo', 'Seguimiento Academico');
            $this->vista->set('idPersona', $idPersona);
            return $this->vista->imprimir();
            
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
        
        public function pension2($idPersona){
         try {
                
            $this->vista->set('titulo', 'Pensión');
            $pension = new Pago();
            $pensiones = $pension->leerPensionesPorIdPersona($idPersona);
            $this->vista->set('pensiones', $pensiones);
            return $this->vista->imprimir();
            
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }

   
    public function actualizarAcudiente(){
            try{
            $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $est = new Estudiante();
            $est->leerAcudiente($idPersona,$est);
            $this->vista->set('est', $est);
            return $this->vista->imprimir();
            } catch (Exception $exc) {
            $this->setVista('mensaje');
                $msj ="ERROR... La consulta no se pudo ejecutar.. !";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
        }    
         }
         
           public function actualizaAcudiente(){
           try {
               
             $idAcudiente= isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
             $nombresAcudiente = isset($_POST['nombres']) ? $_POST['nombres'] : NULL;
             $apellidosAcudiente = isset($_POST['apellidos']) ? $_POST['apellidos'] : NULL;
             $telAcudiente = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
             $telOficinaAcudiente = isset($_POST['telOfi']) ? $_POST['telOfi'] : NULL;
             $dirAcudiente = isset($_POST['direccion']) ? $_POST['direccion'] : NULL;
             $ocupacionAcudiente = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : NULL;
        
             $estudiante = new Estudiante();
             
             $estudiante->setIdAcudiente($idAcudiente);
             $estudiante->setNombresAcudiente($nombresAcudiente);
             $estudiante->setApellidosAcudiente($apellidosAcudiente);
             $estudiante->setOcupacionAcudiente($ocupacionAcudiente);
             $estudiante->setTelAcudiente($telAcudiente);
             $estudiante->setTelOficinaAcudiente($telOficinaAcudiente);
             $estudiante->setDirAcudiente($dirAcudiente);
                       
             $estudiante->actDatosAcudiente($estudiante);  
             
            echo json_encode(1);
            }catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }     
        }
        
    public function actualizarPadre(){
            try{
            $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $est = new Estudiante();
            $est->leerPadre($idPersona,$est);
            $this->vista->set('est', $est);
            return $this->vista->imprimir();
            } catch (Exception $exc) {
            $this->setVista('mensaje');
                $msj ="ERROR... La consulta no se pudo ejecutar.. !";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
        }    
         }
         
          public function actualizaPadre(){
           try {
               $idPersona= isset($_POST['idEstudiante']) ? $_POST['idEstudiante'] : NULL;
            $idPadre= isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
             $nombresPadre = isset($_POST['nombres']) ? $_POST['nombres'] : NULL;
             $apellidosPadre = isset($_POST['apellidos']) ? $_POST['apellidos'] : NULL;
             $telPadre = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
             $telOficinaPadre = isset($_POST['telOfi']) ? $_POST['telOfi'] : NULL;
             $dirPadre = isset($_POST['direccion']) ? $_POST['direccion'] : NULL;
             $ocupacionPadre = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : NULL;
        
             $estudiante = new Estudiante();
             $estudiante->setIdPadre($idPadre);
            $estudiante->setNombresPadre($nombresPadre);
            $estudiante->setApellidosPadre($apellidosPadre);
            $estudiante->setOcupacionPadre($ocupacionPadre);
            $estudiante->setTelPadre($telPadre);
            $estudiante->setTelOficinaPadre($telOficinaPadre);
            $estudiante->setDirPadre($dirPadre);
             if(count($estudiante->verificarPadre($idPadre))>0){
                 $estudiante->actDatosPadre($estudiante);  
             }else{
                 $estudiante->setIdPersona($idPersona);
                 $estudiante->crearDatosPadre($estudiante);
                 $estudiante->estudiantePadre($estudiante);
             }
             
             
             
             echo json_encode(1);
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }     
        }
        
         public function actualizarMadre(){
            try{
            $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $est = new Estudiante();
            $est->leerMadre($idPersona,$est);
            $this->vista->set('est', $est);
            return $this->vista->imprimir();
            } catch (Exception $exc) {
            $this->setVista('mensaje');
                $msj ="ERROR... La consulta no se pudo ejecutar.. !";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
        }    
         }
         
          public function actualizaMadre(){
           try {
               $idPersona= isset($_POST['idEstudiante']) ? $_POST['idEstudiante'] : NULL;
             $idMadre= isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
             $nombresMadre = isset($_POST['nombres']) ? $_POST['nombres'] : NULL;
             $apellidosMadre = isset($_POST['apellidos']) ? $_POST['apellidos'] : NULL;
             $telMadre = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
             $telOficinaMadre = isset($_POST['telOfi']) ? $_POST['telOfi'] : NULL;
             $dirMadre = isset($_POST['direccion']) ? $_POST['direccion'] : NULL;
             $ocupacionMadre = isset($_POST['ocupacion']) ? $_POST['ocupacion'] : NULL;
        
             $estudiante = new Estudiante();
             $estudiante->setIdMadre($idMadre);
             $estudiante->setNombresMadre($nombresMadre);
             $estudiante->setApellidosMadre($apellidosMadre);
             $estudiante->setOcupacionMadre($ocupacionMadre);
             $estudiante->setTelMadre($telMadre);
             $estudiante->setTelOficinaMadre($telOficinaMadre);
             $estudiante->setDirMadre($dirMadre);
           
             if(count($estudiante->verificarMadre($idMadre))>0){
                 $estudiante->actDatosMadre($estudiante);  
             }else{
                 $estudiante->setIdPersona($idPersona);
                 $estudiante->crearDatosMadre($estudiante);
                 $estudiante->estudianteMadre($estudiante);
             }
             
             echo json_encode(1);
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }     
        }
         
         
           
        public function actualizarFoto(){
            
            $idPersona=$_SESSION['idUsuario'];
            $archivo = $_FILES["foto"]['name'];
            $trozos = explode(".", $archivo); 
            $extension = end($trozos); 
            $ruta = HOME.DS.'utiles/imagenes/fotos/';
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
                        if (($_FILES["foto"]["size"])/1048576 <= 4){
                       
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
   public function cargarSeguimientos(){
            try {
                
                $idPersona =  isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
                $tipo =  isset($_POST['tipo']) ? $_POST['tipo'] : NULL;
                $seguimiento = new Seguimiento();
                $seguimientos = $seguimiento->leerSeguimientosPorIdPersonaYTipo($idPersona, $tipo);
                
                $respuesta = '<table width="95%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">';
                $i=1;
                foreach ($seguimientos as $seg) {
                   $respuesta .= "<tr>
                        <td><b>".$i.".</b> ".$seg->getMensaje()." </br> <b>FECHA: ".$seg->getFecha()."</b></td>
                    </tr>";
                   $i++;
                }
                $respuesta .="</table>";
                echo json_encode($respuesta);
                
            } catch (Exception $exc) {
                echo json_encode(1);
            }

            
        }
        
   }
?>