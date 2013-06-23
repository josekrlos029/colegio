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
                    $this->setVista('escogeRol');
                    $this->vista->set('roles',$roles);
                    return $this->vista->imprimir();
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
        
        /**
         * Imprime el la Vista de acuerdo al Rol
         * @param type $idRol
         */
        public function imprimeRol($idRol){
                      
                    if ($idRol == 'A'){
                        echo json_encode("/colegio/administrador/usuarioAdministrador");   
                    }elseif ($idRol =='D') {
                         echo json_encode("/colegio/docente/usuarioDocente");
                    }elseif ($idRol == 'E') {
                         echo json_encode("/colegio/estudiante/usuarioEstudiante");
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
        if (isset($_POST['botonenviar'])) {
            $id = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $email = isset($_POST['email']) ? $_POST['email'] : NULL;
            $persona = new Persona();
            if ($id!=NULL){
             $per=$persona->leerPorId($id);   
            }else{
                $per=$persona->leerPorCorreo($email);
            }
            
            if ($per == NULL) {
                $this->vista->set('mensaje', 'No esta registrado');
                return $this->vista->imprimir();
            }
            $msg1 = "Para cambiar su clave, haga clic en el siguiente enlace:<br>";
            //TODO: Mejor URL Para recuperar clave, por ejemplo, 
            //md5 o sha combinando usuario+mail+salt, etc.
            $msg1 .= "http://localhost/colegio/inicio/cambiarclave/111";
            $msg1 .= "<br>El administrador";
            
            $asunto = "Cambio de Contraseña Aplicación";

            $this->enviarCorreo($msg1,$per->getCorreo(),$asunto, $per->getNombres()." ".$per->getPApellido()) ;
              
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
                    }       
                       
                    }
                } 
    }
    
  
     
}

?>
