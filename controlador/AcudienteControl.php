<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AcudienteControl
 *
 * @author AndyHenry
 */
class AcudienteControl extends Controlador{
    
    public function __construct($modelo, $accion) {
        parent::__construct($modelo, $accion);
        $this->setModelo($modelo);
    }
    /**
         * Imprime la Vista principal del Usuario Acudiente
         * @return type
         */
        public function usuarioAcudiente(){
        try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Usuario Coordiandor');
            $idPersona = $_SESSION['idUsuario'];
            $acudiente = new Acudiente();
            $acu = $acudiente->leerPorId($idPersona);
            $this->vista->set('acu', $acu);
            $persona = new Persona();
            $acudido = $persona->leerPorAcudiente($acu->getId_Acudiente());
            $this->vista->set('acudido', $acudido);
            
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        
    
}

?>
