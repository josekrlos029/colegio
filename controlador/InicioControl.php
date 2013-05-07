<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdministradorControl
 *
 * @author JoseCarlos
 */
class InicioControl extends Controlador{
    
    public function __construct($modelo, $accion) {
        parent::__construct($modelo, $accion);
        $this->setModelo($modelo);
    }

    public function index() {
        try {
            $this->vista->set('titulo', 'Acceso de Usuarios');
            return $this->vista->imprimir();
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
    }
    //put your code here
}

?>
