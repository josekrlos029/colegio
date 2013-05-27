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
}

?>
