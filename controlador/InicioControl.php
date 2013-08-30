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
    /**
     * Función que Imprime El Index (página principal de la Aplicación
     * @return type
     */
    public function index() {
        try {
             $this->vista->set('titulo', 'Iniciar Sesión ');
            return $this->vista->imprimir();
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
    }
       /**
         * Recibe datos de usuario y contraseña para logueo desde el formulario de loguin... Json por POST y los devuelve 
         */
        public function verificarUsuario(){
         try {
             
            $nombreUsuario = isset($_POST['usuario']) ? $_POST['usuario'] : NULL;
            $clave = isset($_POST['clave']) ? $_POST['clave'] : NULL;
             $user = new Usuario();
             $usuario = $user->verificarUsuario($nombreUsuario,$clave);
            if ($usuario == NULL) {
                echo json_encode(0);
            }else{
                //MANEJO DE SESSIONES
                session_start();
                $_SESSION['idUsuario'] = $usuario->getIdPersona();
                $rol = new Rol();
                $roles = $rol->leerRoles($usuario->getIdPersona());
                if (count($roles)>1){
                   echo json_encode("/colegio/inicio/escogeRol/"); 
                }else{
                   foreach($roles as $rol) {
                       $this->imprimeRol($rol->getIdRol());
                    }
                } 
            }
        } catch (Exception $exc){
            echo  json_encode('Error de aplicacion: ' . $exc->getMessage());
        }   
        }
        
        public function escogeRol(){
         try {
             session_start();
             $idPersona= $_SESSION['idUsuario'];
                $rol = new Rol();
                $roles = $rol->leerRoles($idPersona);
                $this->vista->set('roles', $roles);
                $this->vista->set('titulo', 'Escoger Rol');
                return $this->vista->imprimir();
            
        } catch (Exception $exc){
            echo  json_encode('Error de aplicacion: ' . $exc->getMessage());
        }   
        }
        
        /**
         * Imprime el la Vista de acuerdo al Rol
         * @param type $idRol
         */
        public function imprimeRol($idRol=NULL){
                      $idRol = isset($_POST['idRol']) ? $_POST['idRol'] : NULL;
                    if ($idRol == 'A'){
                        echo json_encode("/colegio/administrador/usuarioAdministrador");   
                    }elseif ($idRol =='D') {
                         echo json_encode("/colegio/docente/usuarioDocente");
                    }elseif ($idRol == 'E') {
                         echo json_encode("/colegio/estudiante/usuarioEstudiante");
                    }elseif ($idRol == 'C') {
                         echo json_encode("/colegio/coordinador/usuarioCoordinador");
                    }elseif ($idRol == 'AC') {
                         echo json_encode("/colegio/acudiente/usuarioAcudiente");
                    }                   
        }
        /**
         * Imprime la Vista DE olvido de contraseña
         * @return type
         */
        public function olvidoclave() {
        $this->vista->set('titulo', 'Recuperar contrase&ntilde;a');
        return $this->vista->imprimir();
    }
    
    /**
     * Envia el Correo
     * @return type
     */
     public function enviardatosolvido() {
      
            $campo = isset($_POST['campo']) ? $_POST['campo'] : NULL;
            $persona = new Persona();
            $per=$persona->leerParaRecuparacion($campo);
            
            if ($per == NULL) {
                echo json_encode(0);
            }else{
                $key= "colegio";
                $string = $per->getIdPersona();        
                $cadena = $this->encrypt($string, $key);
                $msg1 = "Para cambiar su clave, haga clic en el siguiente enlace:<br>";
                $msg1 .= "http://localhost/colegio/inicio/cambiarClave/".$cadena;
                $msg1 .= "<br>El administrador";
                $asunto = "Cambio de Contraseña Aplicación";
                $this->enviarCorreo($msg1,$per->getCorreo(),$asunto, $per->getNombres()." ".$per->getPApellido()) ;
            }
        }
    public function cambiarClave($string) {
        try {
        $key= "colegio";
        $id = $this->decrypt($string, $key);
        $persona  = new Persona();
        $per = $persona->leerPorId($id);
        $usuario = new Usuario();
        $user = $usuario->leerPorId($id);
        $this->vista->set('persona', $per);
        $this->vista->set('usuario', $user);
        $this->vista->set('titulo', 'Cambiar contrase&ntilde;a');
        return $this->vista->imprimir();
    
        } catch (Exception $exc) {
            echo $exc->getMessage();
            return $this->vista->imprimir();
        }

     }
        
        
    public function encrypt($string, $key) {
        $result = '';
        for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key))-1, 1);
            $char = chr(ord($char)+ord($keychar));
            $result.=$char;
        }
        return base64_encode($result);
    }   

    public function decrypt($string, $key) {
        $result = '';
        $string = base64_decode($string);
        for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key))-1, 1);
            $char = chr(ord($char)-ord($keychar));
            $result.=$char;
        }
        return $result; 
    }
    
    public function actualizarClave(){
        try {
            $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $clave = isset($_POST['clave']) ? $_POST['clave'] : NULL;
            $clave = sha1($clave);
            $usuario = new Usuario();
            $usuario->actualizarContraseña($idPersona, $clave);
            echo json_encode(1);
        } catch (Exception $exc) {
            echo json_encode(0);
        }
        }
    
    public function accesofb($social) {
        session_start();
        $cfg = Configuracion::getConfiguracion('social_login');
        $app_id = '';
        $app_secret = '';
        $app_cb = '';
        $url = '';
        $oauthObj = null;
        if (isset($social) && $social == 'face') {
            $app_id = $cfg['FB_APP_ID'];
            $app_secret = $cfg['FB_APP_SECRET'];
            $app_cb = $cfg['FB_APP_CB'];
            $url = $cfg['FB_APP_INFO'];
            $oauthObj = new Facebook($app_id, $app_secret, $app_cb);
        } else if (isset($social) && $social == 'twitter') {
            $app_id = $cfg['TW_APP_ID'];
            $app_secret = $cfg['TW_APP_SECRET'];
            $app_cb = $cfg['TW_APP_CB'];
            $url = $cfg['TW_APP_INFO'];
            $oauthObj = new Twitter($app_id, $app_secret, $app_cb);
        } else if (isset($social) && $social == 'google') {
            $app_id = $cfg['GO_APP_ID'];
            $app_secret = $cfg['GO_APP_SECRET'];
            $app_cb = $cfg['GO_APP_CB'];
            $url = $cfg['GO_APP_INFO'];
            $oauthObj = new Google($app_id, $app_secret, $app_cb);
        }
        $scope = Array('email');
        $oauthObj->setScope($scope);
        if ($oauthObj->validateAccessToken()) {
            try {
                $response = $oauthObj->makeRequest($url);
                $this->verificarAutenticacion($social, $response);
                 
            } catch (Exception $e) {
                echo $e;
            }
        }
       
    }
    
    public function verificarAutenticacion($social, $response){
        try {
        $u = new Usuario();
        $usuario = $u->verificarPorSocial($response['id'], $social);
        if ( $usuario == NULL){
            
            $per = new Persona();
            $correo= $response['email'];
            $persona = $per->leerPorCorreo($correo);
            if($persona == NULL){
                header("Location: /colegio/inicio/index");
            }else{
               $u->actualizarSocial($response['id'], $social, $persona->getIdPersona());
               $usuario = $u->verificarPorSocial($response['id'], $social);
               $this->entrar($usuario);
            }
            
        }else{
           $this->entrar($usuario);
        }
    
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

    }
    
    
    public function entrar(Usuario $usuario){
           
                
                $_SESSION['idUsuario'] = $usuario->getIdPersona();
                $rol = new Rol();
                $roles = $rol->leerRoles($usuario->getIdPersona());
                if (count($roles)>1){
                    $this->setVista('escogeRol');
                    $this->vista->set('roles',$roles);
                    return $this->vista->imprimir();
                }else{
                   foreach($roles as $rol) {
                        if ($rol->getIdRol() == 'A'){
                        header("Location: /colegio/administrador/usuarioAdministrador");   
                    }elseif ($rol->getIdRol() =='D') {
                         header("Location: /colegio/docente/usuarioDocente");
                    }elseif ($rol->getIdRol() == 'E') {
                         header("Location: /colegio/estudiante/usuarioEstudiante");
                    }elseif ($rol->getIdRol() == 'C') {
                         header("Location: /colegio/coordinador/usuarioCoordinador");
                    }elseif ($rol->getIdRol() == 'AC') {
                         header("Location: /colegio/acudiente/usuarioAcudiente");
                    }            
                       
                    }
                } 
    }
    
  
     
}

?>
