<?php

define('DS', DIRECTORY_SEPARATOR);
define('HOME', dirname(__FILE__));


ini_set('display_erros', 1);

function cargadorClases(){
    require_once './config/Configuracion.php';
    require_once './config/Db.php';
    require_once './modelo/Modelo.php';
    require_once './modelo/Estudiante.php';
    require_once './modelo/Grado.php';
    require_once './modelo/Materia.php';
    require_once './modelo/Salon.php';
    require_once './controlador/Controlador.php';
    require_once './controlador/EstudianteControl.php';
    require_once './vista/Vista.php';
}

spl_autoload_register('cargadorClases');
if ($_GET['usuario']==1){
require_once './utiles/inicioAdmin.php';
}elseif ($_GET['usuario']==2){
require_once './utiles/inicioDocente.php';
}else{
require_once './utiles/inicioEstudiante.php';
}

?>