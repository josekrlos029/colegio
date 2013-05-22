<?php

define('DS', DIRECTORY_SEPARATOR);
define('HOME', dirname(__FILE__));


ini_set('display_erros', 1);

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
    require_once './modelo/Salon.php';
    require_once './modelo/Inicio.php';
    require_once './controlador/Controlador.php';
    require_once './controlador/AdministradorControl.php';
    require_once './controlador/EstudianteControl.php';
    require_once './controlador/InicioControl.php';
    require_once './controlador/UsuarioControl.php';
    require_once './vista/Vista.php';
    require_once './utiles/php/class.phpmailer.php';
    require_once './utiles/php/class.pop3.php';
    require_once './utiles/php/class.smtp.php';
}

spl_autoload_register('cargadorClases');

require_once './utiles/inicio.php';
?>