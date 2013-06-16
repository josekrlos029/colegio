<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DoncenteControl
 *
 * @author AndyHenry
 */
class DocenteControl extends Controlador{
    
    public function __construct($modelo, $accion) {
        parent::__construct($modelo, $accion);
        $this->setModelo($modelo);
    }
    /**
         * Imprime la Vista principal del Usuario Docente
         * @return type
         */
        public function usuarioDocente(){
        try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Usuario Docente');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
}

?>
