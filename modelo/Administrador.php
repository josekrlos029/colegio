<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrador
 *
 * @author JoseCarlos
 */
class Administrador extends Modelo{
     public function __construct() {
        parent::__construct();
    }
    
    public function cierreAcademico($añoLectivo,$jornada){
         $sql = "CALL historial('".$añoLectivo."','".$jornada."')";
        $this->__setSql($sql);
        $this->ejecutar();
    }
}

?>
