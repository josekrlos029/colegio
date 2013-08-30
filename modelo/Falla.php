<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fallas
 *
 * @author JoseCarlos
 */
class Falla extends Modelo {
    private $id;
    private $primerP;
    private $segundoP;
    private $tercerP;
    private $cuartoP;
    
    public function __construct() {
        parent::__construct();
    }   
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getPrimerP() {
        return $this->primerP;
    }

    public function setPrimerP($primerP) {
        $this->primerP = $primerP;
    }

    public function getSegundoP() {
        return $this->segundoP;
    }

    public function setSegundoP($segundoP) {
        $this->segundoP = $segundoP;
    }

    public function getTercerP() {
        return $this->tercerP;
    }

    public function setTercerP($tercerP) {
        $this->tercerP = $tercerP;
    }

    public function getCuartoP() {
        return $this->cuartoP;
    }

    public function setCuartoP($cuartoP) {
        $this->cuartoP = $cuartoP;
    }

   
    private function mapearFalla(Falla $falla, array $props) {
        if (array_key_exists('idFalla', $props)) {
            $falla->setId($props['idFalla']);
        }
        if (array_key_exists('primerP', $props)) {
            $falla->setPrimerP($props['primerP']);
        }
         if (array_key_exists('segundoP', $props)) {
            $falla->setSegundoP($props['segundoP']);
        }
        if (array_key_exists('tercerP', $props)) {
            $falla->setTercerP($props['tercerP']);
        }
        if (array_key_exists('cuartoP', $props)) {
            $falla->setCuartoP($props['cuartoP']);
        }
        
    }
    
    
  /*
    private function getParametros(Falla $mat){
              
        $parametros = array(
            ':primerP' => $mat->getIdPersona(),
            ':segundoP' => $mat->getIdSalon(),
            ':tercerP' => $mat->getJornada(),
            ':cuartoP' => $mat->getFecha(),
            ':definitiva' => $this->getAnoLectivo()
        );
        return $parametros;
    }
    */
    public function leerFallaEstudiante($idPersona, $idMateria){
        $sql = "SELECT id, primerP, segundoP, tercerP, cuartoP FROM fallas WHERE idPersona='".$idPersona."' AND idMateria='".$idMateria."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $falla = new Falla();
        foreach ($resultado as $fila) {
           
            $this->mapearFalla($falla, $fila);

        }
        return $falla;
    }
    

}

?>
