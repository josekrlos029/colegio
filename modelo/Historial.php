<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Historial
 *
 * @author JoseCarlos
 */
class Historial extends Modelo{
    private $idPersona;
    private $idMateria;
    private $jornada;
    private $definitiva;
    private $anoLectivo;
    
    public function getIdPersona() {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    public function getIdMateria() {
        return $this->idMateria;
    }

    public function setIdMateria($idMateria) {
        $this->idMateria = $idMateria;
    }

    public function getJornada() {
        return $this->jornada;
    }

    public function setJornada($jornada) {
        $this->jornada = $jornada;
    }

    public function getDefinitiva() {
        return $this->definitiva;
    }

    public function setDefinitiva($definitiva) {
        $this->definitiva = $definitiva;
    }

    public function getAnoLectivo() {
        return $this->anoLectivo;
    }

    public function setAnoLectivo($anoLectivo) {
        $this->anoLectivo = $anoLectivo;
    }
    
    protected static function crearDefinitiva($entrada) {
        parent::crearDefinitiva($entrada);
    }


  public function __construct() {
        parent::__construct();
    }
   
    private function mapearHistorial(Historial $historial, array $props) {
        if (array_key_exists('idPersona', $props)) {
            $historial->setIdPersona($props['idPersona']);
        }
         if (array_key_exists('idMateria', $props)) {
            $historial->setIdMateria($props['idMateria']);
        }
        if (array_key_exists('jornada', $props)) {
            $historial->setJornada($props['jornada']);
        }
        if (array_key_exists('definitiva', $props)) {
            $historial->setDefinitiva($props['definitiva']);
        }
        if (array_key_exists('año_lectivo', $props)) {
          $historial->setAnoLectivo($props['año_lectivo']);
        }
    }
    
    
  
    private function getParametros(Historial $mat){
              
        $parametros = array(
            ':idPersona' => $mat->getIdPersona(),
            ':idMateria' => $mat->getIdMateria(),
            ':jornada' => $mat->getJornada(),
            ':definitiva' => $mat->getDefinitiva(),
            ':anoLectivo' => $this->getAnoLectivo()
        );
        return $parametros;
    }
    
    public function leerHistorialPorIdPersona($anio, $idPersona) {
        $sql = "SELECT * FROM historial WHERE idPersona='".$idPersona."' AND añoLectivo='".$anio."' ORDER BY idMateria";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $hist = array();
        foreach ($resultado as $fila) {
            $historial = new Historial();
            $this->mapearHistorial($historial, $fila);
            $hist[$historial->getIdMateria()]=$historial;
        }
        return $hist;
    }
    
    public function leerHistorialPorIdMateria($anio, $idPersona, $idMateria) {
        $sql = "SELECT * FROM historial WHERE idPersona='".$idPersona."' AND añoLectivo='".$anio."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $hist = NULL;
        foreach ($resultado as $fila) {
            $historial = new Historial();
            $this->mapearHistorial($historial, $fila);
        }
        return $hist;
    }
    
    public function leerAnios(){
        $sql = "SELECT DISTINCT añoLectivo FROM historial ORDER BY añoLectivo DESC";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $años = array();
        
        foreach ($resultado as $fila) {
           $años[] = $fila['añoLectivo'];
        }
        return $años;
    }
    
    public function leerAniosEstudiante($idPersona){
        $sql = "SELECT DISTINCT añoLectivo FROM historial WHERE idPersona='".$idPersona."' ORDER BY añoLectivo DESC";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $años = array();
        
        foreach ($resultado as $fila) {
           $años[] = $fila['añoLectivo'];
        }
        return $años;
    }
    public function leerMaterias($anio,$idSalon){
        $sql = "SELECT DISTINCT h.idMateria FROM historial h, matricula m WHERE h.añoLectivo = m.año_lectivo AND h.añoLectivo='".$anio."' AND m.idSalon='".$idSalon."' ORDER BY idMateria";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $años = array();
        
        foreach ($resultado as $fila) {
           $años[] = $fila['idMateria'];
        }
        return $años;
    }
    
    public function leerNotaEstudiante($anio, $idPersona, $idMateria){
        $sql = "SELECT * FROM historial WHERE idPersona='".$idPersona."' AND añoLectivo='".$anio."' AND idMateria='".$idMateria."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $historial = NULL;
        foreach ($resultado as $fila) {
            $historial = new Historial();
            $this->mapearHistorial($historial, $fila);
        }
        return $historial;
    }
}
?>