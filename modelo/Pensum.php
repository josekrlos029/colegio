<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pensum
 *
 * @author JoseCarlos
 */
class Pensum extends Modelo{
      
    private $id;
    private $idMateria;
    private $idGrado;
public function __construct() {
    parent::__construct();
}

public function getId() {
    return $this->id;
}

public function setId($id) {
    $this->id = $id;
}

public function getIdMateria() {
    return $this->idMateria;
}

public function setIdMateria($idMateria) {
    $this->idMateria = $idMateria;
}

public function getIdGrado() {
    return $this->idGrado;
}

public function setIdGrado($idGrado) {
    $this->idGrado = $idGrado;
}

private function mapearPensum(Pensum $pensum, array $props) {
    if (array_key_exists('id', $props)) {
            $pensum->setId($props['id']);
        }    
    if (array_key_exists('idMateria', $props)) {
            $pensum->setIdMateria($props['idMateria']);
        }
         if (array_key_exists('idGrado', $props)) {
            $pensum->getIdGrado($props['idGrado']);
        }
        
        
    }
  
    private function getParametros(Pensum $mat){
              
        $parametros = array(
            ':idMateria' => $mat->getIdMateria(),
            ':idGrado' => $mat->getIdGrado()
        );
        return $parametros;
    }

    
    public function leerPensum($idSalon){
        $sql = "SELECT id, idMateria, idGrado FROM pensum WHERE idGrado=(SELECT idGrado FROM salon WHERE idSalon='".$idSalon."')";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pens = array();
        foreach ($resultado as $fila) {
            $pensum = new Pensum();
            $this->mapearPensum($pensum, $fila);
            $pens[$pensum->getId()] = $pensum;
        }
        return $pens;
    }
    
}

?>
