<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notas
 *
 * @author JoseCarlos
 */
class Nota extends Modelo {
    private $id;
    private $primerP;
    private $segundoP;
    private $tercerP;
    private $cuartoP;
    private $definitiva;
    
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

    public function getDefinitiva() {
        return $this->definitiva;
    }

    public function setDefinitiva($definitiva) {
        $this->definitiva = $definitiva;
    }
    private function mapearNota(Nota $nota, array $props) {
        if (array_key_exists('idNota', $props)) {
            $nota->setId($props['idNota']);
        }
        if (array_key_exists('primerP', $props)) {
            $nota->setPrimerP($props['primerP']);
        }
         if (array_key_exists('segundoP', $props)) {
            $nota->setSegundoP($props['segundoP']);
        }
        if (array_key_exists('tercerP', $props)) {
            $nota->setTercerP($props['tercerP']);
        }
        if (array_key_exists('cuartoP', $props)) {
            $nota->setCuartoP($props['cuartoP']);
        }
        if (array_key_exists('definitiva', $props)) {
            $nota->setDefinitiva($props['definitiva']);
        }
    }
    
    
  /*
    private function getParametros(Nota $mat){
              
        $parametros = array(
            ':primerP' => $mat->getIdPersona(),
            ':segundoP' => $mat->getIdSalon(),
            ':tercerP' => $mat->getJornada(),
            ':cuartoP' => $mat->getFecha(),
            ':definitiva' => $this->getAñoLectivo()
        );
        return $parametros;
    }
    */
    public function leerNotaEstudiante($idPersona, $idMateria){
        $sql = "SELECT idNota, primerP, segundoP, tercerP, cuartoP, definitiva FROM notas WHERE idPersona='".$idPersona."' AND idMateria='".$idMateria."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $nota = new Nota();
        foreach ($resultado as $fila) {
           
            $this->mapearNota($nota, $fila);

        }
        return $nota;
    }
    

}

?>
