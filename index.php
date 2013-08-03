<?php

define('DS', DIRECTORY_SEPARATOR);
define('HOME', dirname(__FILE__));


ini_set('display_erros', 1);
/**
 * Esta funcion se utiliza para cambiar de INFORMACION DE ERRORES
 * a MANEJO DE EXCEPCIONES
 * @param type $code
 * @param type $mensaje
 * @param type $archivo
 * @param type $linea
 * @param type $contexto
 * @return boolean
 * @throws ErrorException
 */
function manejadorErrores($code, $mensaje, $archivo, $linea, $contexto = NULL){
    if(E_RECOVERABLE_ERROR === $code){
        throw new ErrorException($mensaje, $code,1, $archivo, $linea, NULL );
    }
    return false;
}
set_error_handler('manejadorErrores'); //Indica la funcion (callback) que manejara los errores
                                       //Esto es para cambiar de manejo de errores a manejo de 
                                       //Excepciones

function cargadorClases(){
    require_once './config/Configuracion.php';
    require_once './config/Db.php';
    require_once './modelo/Modelo.php';
    require_once './modelo/Rol.php';
    require_once './modelo/Usuario.php';
    require_once './modelo/Persona.php';
    require_once './modelo/Docente.php';
    require_once './modelo/Estudiante.php';
    require_once './modelo/Administrador.php';
    require_once './modelo/Grado.php';
    require_once './modelo/Materia.php';
    require_once './modelo/Pensum.php';
    require_once './modelo/Salon.php';
    require_once './modelo/Inicio.php';
    require_once './modelo/Carga.php';
    require_once './modelo/Matricula.php';
    require_once './modelo/Logro.php';
    require_once './modelo/Nota.php';
    require_once './controlador/Controlador.php';
    require_once './controlador/AdministradorControl.php';
    require_once './controlador/EstudianteControl.php';
    require_once './controlador/DocenteControl.php';
    require_once './controlador/InicioControl.php';
    require_once './controlador/UsuarioControl.php';
    require_once './vista/Vista.php';
    require_once './utiles/php/class.phpmailer.php';
    require_once './utiles/php/class.pop3.php';
    require_once './utiles/php/class.smtp.php';
    require_once './utiles/php/Oauth.php';
    require_once './utiles/php/Facebook.php';
    require_once './utiles/php/Google.php';
    require_once './utiles/php/Twitter.php';
    require_once './utiles/php/fpdf/fpdf.php';
    
}

spl_autoload_register('cargadorClases');

require_once './utiles/inicio.php';
?>