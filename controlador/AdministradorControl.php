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
class AdministradorControl extends Controlador{
    
    public function __construct($modelo, $accion) {
        parent::__construct($modelo, $accion);
        $this->setModelo($modelo);
    }
      
        /**
         * Imprime la Vista principal del Usuario Administrador
         * @return type
         */
        public function usuarioAdministrador(){
        try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Usuario Administrador');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        public function agregarMateria(){
        try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Agregar Materia');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        public function gestionarPensum(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Gestión de Pensum');
            $grado = new Grado();
            $grados = $grado->leerGrados();
            $this->vista->set('grados', $grados);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        public function imprimirMateriasPorSalon(){
            $materia = new Materia();
            $materias = $materia->leerMateriasPorSalon($idSalon);
        }
        
    
}

?>
