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
            $mailer->SMTPAuth = FALSE;
            $mailer->SMTPSecure = "tls";
            $mailer->Username = "josekrlos029@gmail.com";
            $mailer->Password = "1009jose";
            if (!$mailer->Send()) {
                
                $this->vista->set("mensaje", "Error al enviar correo! (" . $mailer->ErrorInfo . ")");
                return $this->vista->imprimir();
            } else {
                $this->vista->set('mensaje', 'Se ha enviado la informaci&oacute;n de acceso a su correo.');
                return $this->vista->imprimir();
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
         
         
         
   }
    


?>
