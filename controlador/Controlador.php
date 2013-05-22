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
    
    protected function enviarCorreo($msg,$titulo,$correo){
        
        
            //TODO: se puede encapsular el envio de correos en una clase, para 
            //personalizar mas facil los datos configuracion y las opciones de envio.
            $mailer = new PHPMailer();
            $mailer->SetFrom("cursoss400@gmail.com" , 'ZAaaaaaaaaZ');
            $direccion = $correo;
            $nombre =  "Jose Carlos Jimenez"; //ENVIAR TAMBN NOMBRE
            $mailer->AddAddress("josekrlos029@hotmail.com", $nombre);
            $mailer->CharSet = "UTF-8";
            $mailer->SMTPDebug = true;
            $mailer->Subject = "Cambio de contraseña en la aplicación Pruebas";
            $mailer->MsgHTML($msg);
            $mailer->IsSMTP();
            $mailer->Host = "smtp.gmail.com";
            $mailer->Port = 587;
            $mailer->SMTPAuth = true;
            $mailer->SMTPSecure = "tls";
            $mailer->Username = "cursoss400@gmail.com";
            $mailer->Password = "curso-400";
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
