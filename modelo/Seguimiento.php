<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Seguimiento
 *
 * @author JoseCarlos
 */
class Seguimiento extends Modelo{
    
    public function __construct() {
        parent::__construct();
    }
    
    private $id;
    private $idPersona;
    private $fecha;
    private $mensaje;
    private $tipoSeguimiento;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdPersona() {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    public function getTipoSeguimiento() {
        return $this->tipoSeguimiento;
    }

    public function setTipoSeguimiento($tipoSeguimiento) {
        $this->tipoSeguimiento = $tipoSeguimiento;
    }
    
    
    private function mapearSeguimiento(Seguimiento $seg, array $props) {
        if (array_key_exists('id', $props)) {
            $seg->setId($props['id']);
        }
        if (array_key_exists('idPersona', $props)) {
            $seg->setIdPersona($props['idPersona']);
        }
        if (array_key_exists('fecha', $props)) {
            $seg->setFecha($props['fecha']);
        }
         if (array_key_exists('mensaje', $props)) {
            $seg->setMensaje($props['mensaje']);
        }
        if (array_key_exists('tipoSeguimiento', $props)) {
            $seg->setTipoSeguimiento($props['tipoSeguimiento']);
        }
    }
    
    
  
    private function getParametros(Seguimiento $seg){
              
        $parametros = array(
  
            ':idPersona' => $seg->getIdPersona(),
            ':fecha' => $seg->getFecha(),
            ':mensaje' => $seg->getMensaje(),
            ':tipoSeguimiento' => $this->getTipoSeguimiento()
           
            
        );
        return $parametros;
    }
    
    public function crearSeguimiento(Seguimiento $seguimiento){
        $sql = "INSERT INTO seguimiento (idPersona, fecha, mensaje, tipoSeguimiento) VALUES ( :idPersona, :fecha, :mensaje, :tipoSeguimiento)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($seguimiento));
    }
    
    public function leerSeguimientosPorIdPersona($idPersona){
        $sql = "SELECT * FROM seguimiento WHERE idPersona='".$idPersona."' ORDER BY fecha DESC";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $seguimientos = array();
        foreach ($resultado as $fila) {
            $seguimiento = new Seguimiento();
            $this->mapearSeguimiento($seguimiento, $fila);
            $seguimientos[$seguimiento->getIdPersona()] = $seguimiento;
        }
        return $seguimientos;
    }
    
    public function leerSeguimientosPorIdPersonaYTipo($idPersona, $tipo){
        $sql = "SELECT * FROM seguimiento WHERE idPersona='".$idPersona."' AND tipoSeguimiento='".$tipo."' ORDER BY fecha DESC";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $seguimientos = array();
        foreach ($resultado as $fila) {
            $seguimiento = new Seguimiento();
            $this->mapearSeguimiento($seguimiento, $fila);
            $seguimientos[$seguimiento->getId()] = $seguimiento;
        }
        return $seguimientos;
    }

    
}

?>
