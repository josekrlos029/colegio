<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstudianteControl
 *
 * @author AndyHenry
 */
class EstudianteControl extends Controlador{
    
    public function __construct($modelo, $accion) {
        parent::__construct($modelo, $accion);
        $this->setModelo($modelo);
    }
    /**
         * Imprime la Vista principal del Usuario Estudiante
         * @return type
         */
        public function usuarioEstudiante(){
        try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Usuario Estudiante');
            $idPersona = $_SESSION['idUsuario'];
            $persona = new Persona();
            $estudiante = $persona->leerPorId($idPersona);
            $this->vista->set('estudiante', $estudiante);
            return $this->vista->imprimir();
            
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
          public function datosAcademicos(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Datos Academicos');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
         public function funcionesAcademicas(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'funciones Academicas');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
}

?>
