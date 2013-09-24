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
            $ruta = 'utiles/imagenes/fotos/';
            if (file_exists($ruta.$idPersona.'.jpg')) {
                $img= '<a href="/colegio/acudiente/usuarioAcudiente"><img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.jpg"></a>';
            }elseif (file_exists($ruta.$idPersona.'.png')) {
                $img= '<a href="/colegio/acudiente/usuarioAcudiente"><img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.png"></a>';
            }elseif (file_exists($ruta.$idPersona.'.jpeg')) {
                $img= '<a href="/colegio/acudiente/usuarioAcudiente"><img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.jpeg"></a>';
            }else{
                $img= '<a href="/colegio/acudiente/usuarioAcudiente"><img height="150px" width="150px" src="../utiles/imagenes/avatarDefaul.png"></a>';
            }
            $this->vista->set('img', $img);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        public function cerrarSesion() {
             parent::cerrarSesion();
         }
          /**
    * imprime formulario de configuracion de usuario
    * @return type
    */
    
          public function configuracionUsuario(){
          try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'configuracion de Usuario');
            $idPersona = $_SESSION['idUsuario'];
             $pers = new Persona();
             $user = new Usuario();
             $persona = $pers->leerPorId($idPersona);
             $usuario = $user->leerPorId($idPersona);
             $this->vista->set('usuario', $usuario);
             $this->vista->set('persona', $persona);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
          public function configurarUsuario() {
             parent::configurarUsuario();
         }
         
         public function configurarContraseña() {
             parent::configurarContraseña();
         }
         
         public function configurarCorreo() {
             parent::configurarCorreo();
         }
          public function seguimiento() {
             parent::seguimiento();
         }
          public function pension() {
             parent::pension();
         }
         public function pension2($idPersona) {
             parent::pension2($idPersona);
         }
           public function actualizarAcudiente() {
             parent::actualizarAcudiente();
         }
       
          public function actualizarPadre() {
             parent::actualizarPadre();
         }
          
          public function actualizarMadre() {
             parent::actualizarMadre();
         }
           public function actualizaAcudiente() {
             parent::actualizaAcudiente();
         }
       
          public function actualizaPadre() {
             parent::actualizaPadre();
         }
          
          public function actualizaMadre() {
             parent::actualizaMadre();
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
         public function notificaciones(){
         try {
             if($this->verificarSession()){
            $this->vista->set('titulo', 'Notificaciones');
            $destino1=1;
            $destino2=3;
            $notificacion = new Notificacion();
            $noti = $notificacion->leerPorDestino($destino1,$destino2);
             $this->vista->set('noti', $noti);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        
        public function actualizarFoto() {
            parent::actualizarFoto();
            $this->vista->set('url', $_POST['url']);
            return $this->vista->imprimir();
        }
        
}

?>
