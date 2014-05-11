<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Area
 *
 * @author JoseCarlos
 */
class Area extends Modelo{
   private $idArea;
  private $nombreArea; 
  private $orden;


  public function __construct() {
    parent::__construct();
}

public function getIdArea() {
    return $this->idArea;
}

public function getNombreArea() {
    return $this->nombreArea;
}

public function setIdArea($idArea) {
    $this->idArea = $idArea;
}

public function setNombreArea($nombreArea) {
    $this->nombreArea = $nombreArea;
}

public function getOrden() {
    return $this->orden;
}

public function setOrden($orden) {
    $this->orden = $orden;
}



 private function mapearArea(Area $area, array $props) {
        if (array_key_exists('idArea', $props)) {
            $area->setIdArea($props['idArea']);
        }
         if (array_key_exists('nombre', $props)) {
            $area->setNombreArea($props['nombre']);
        }
        if (array_key_exists('orden', $props)) {
            $area->setOrden($props['orden']);
        }
    }
  
    private function getParametros(Area $mat){
              
        $parametros = array(
            ':idArea' => $mat->getIdArea(),
            ':nombre' => $mat->getNombreArea(),
            ':orden' => $mat->getOrden()     
            );
        return $parametros;
    }
    
    public function crearArea(Area $area) {
        $sql = "INSERT INTO area (idArea, nombre) orden VALUES (:idArea,:nombre,:orden)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($area));
    }

    public function leerAreas() {
        $sql = "SELECT idArea, nombre, orden FROM area";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $areas = array();
        foreach ($resultado as $fila) {
            $area = new Area();
            $this->mapearArea($area, $fila);
            $areas[$area->getIdArea()] = $area;
        }
        return $areas;
    }
    
}
