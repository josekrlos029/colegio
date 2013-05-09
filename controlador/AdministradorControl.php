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

    public function index() {
        try {
            $this->vista->set('estudiantes', $datos);
            $this->vista->set('titulo', 'Lista de Estudiantes');
            return $this->vista->imprimir();
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
    }
    public function logueo() {
        try {
       
            $this->vista->set('titulo', 'Iniciar Sesión | Administrador');
            return $this->vista->imprimir();
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
    }
        public function verificarUsuario(){
         try {
             
             $valor=$this->modelo->verificarAdministrador($_POST['usuario'],$_POST['contraseña']);
             if ( $valor> 0){
                 $this->vista->set('titulo', 'Exito');
                 $this->vista->set('url', '/colegio/administrador/usuarioAdministrador');
             }else{
                  $this->vista->set('titulo', 'Fallo');
                 $this->vista->set('url', '/colegio/administrador/logueo');
             }
                 
            return $this->vista->imprimir();
            
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }   
        }
        
        public function usuarioAdministrador(){
        try {
       
            $this->vista->set('titulo', 'Usuario Administrador');
            return $this->vista->imprimir();
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        
    
}

?>
