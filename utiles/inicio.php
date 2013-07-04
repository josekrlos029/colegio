<?php
/**
 * Este archivo prepara el inicio de la aplicacion
 * recibe los parametros del punto de entrada (index) y genera el controlador 
 * adecuado dependiendo de la llamada que se realice.
 *
 * @author Wilman Vega <wilmanvega@gmail.com>
 */


$controlador = "Inicio";
$accion = "index";
$consulta = null;
$peticion = isset($_GET['leer']) ? $_GET['leer']:NULL;

if (!(preg_match("/\.css$/", $peticion) || preg_match("/\.js$/", $peticion) || preg_match("/\.jpg$/", $peticion) || preg_match("/\.png$/", $peticion) ) ) {
if(isset($_GET['leer'])){
    $parametros  = array();
    $parametros  =  explode("/", $_GET['leer']); //explode: divide en varias cadenas la cadena de consulta. 
    $controlador = ucwords($parametros[0]); //ucwords: Convierte a mayúsculas el primer caracter de cada palabra en una cadena
    
    if(isset($parametros[1]) && !empty($parametros[1])){
        $accion = $parametros[1]; //variable de variable
    }
    
    if(isset($parametros[2]) && !empty($parametros[2])){
        $consulta = $parametros[2]; //variable de variable
    }
}

$modelo = $controlador;
$controlador .='Control';
$carga = new $controlador($modelo, $accion); //variable de variables

if(method_exists($carga, $accion)){
    $carga->$accion($consulta);
}else{
    die('Metodo no valido. por favor verificar la URL');
}
}
?>