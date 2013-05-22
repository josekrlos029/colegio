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
                //MANEJO DE SESIONES
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
        
        
        public function imprimeRol($idRol){
                      
                    if ($idRol == 'A'){
                        echo json_encode("/colegio/administrador/usuarioAdministrador");
                               
                    }elseif ($idRol =='D') {
                         echo json_encode("/colegio/administrador/usuarioDocente");
                    }elseif ($idRol == 'E') {
                         echo json_encode("/colegio/administrador/usuarioEstudiante");
                    }       
        }
        
        public function olvidoclave() {
        $this->vista->set('titulo', 'Recuperar contrase&ntilde;a');
        return $this->vista->imprimir();
    }
    
     public function enviardatosolvido() {
        if (isset($_POST['botonenviar'])) {
            $id = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $email = isset($_POST['email']) ? $_POST['email'] : NULL;
            $persona = new Persona();
            if ($id!=NULL){
             $per=$persona->leerPorId($id);   
            }else{
                
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

            $this->enviarCorreo($msg1, 'Olvidó su contraseña',$persona->getCorreo()) ;
              
        }
    }
     
}

?>
