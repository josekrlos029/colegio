<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Carga
 *
 * @author JoseCarlos
 */
class Carga extends Modelo{
    private $idPersona;
    private $idSalon;
    private $idMateria;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getIdPersona() {
        return $this->idPersona;
    }
     public function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    public function getIdSalon() {
        return $this->idSalon;
    }
    
    public function setIdSalon($idSalon) {
        $this->idSalon = $idSalon;
    }


    public function getIdMateria() {
        return $this->idMateria;
    }

    public function setIdMateria($idMateria) {
        $this->idMateria = $idMateria;
    }

 private function mapearCarga(Carga $carga, array $props) {
         if (array_key_exists('idPersona', $props)) {
            $carga->setIdPersona($props['idPersona']);
        }
         if (array_key_exists('idSalon', $props)) {
            $carga->setIdSalon($props['idSalon']);
        }
         if (array_key_exists('idMateria', $props)) {
            $carga->setIdMateria($props['idMateria']);
        }  
    }
  
    private function getParametros(Carga $carga){
              
        $parametros = array(
            ':idPersona' => $carga->getIdPersona(),
            ':idSalon' => $carga->getIdSalon(),
            ':idMateria' => $carga->getIdMateria()
        );
        return $parametros;
    }
public function crearCarga(Carga $carga) {
        $sql = "INSERT INTO carga (idPersona, idSalon, idMateria) VALUES (:idPersona,:idSalon,:idMateria)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($carga));
    }
    
    public function crearCargaDocente($idPersona) {
        $sql = "INSERT INTO carga_docente (idPersona) VALUES (:idPersona)";
        $this->__setSql($sql);
        $this->ejecutar(array(':idPersona'=> $idPersona));
    }

    public function leerCargas() {
        $sql = "SELECT idPersona, idSalon, idMateria FROM carga";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $cargas = array();
        foreach ($resultado as $fila) {
            $carga = new Carga();
            $this->mapearCarga($carga, $fila);
            $cargas[$carga->getIdPersona()] = $carga;
        }
        return $cargas;
    }

    public function leerCargasPorDocente($idDocente) {
        $sql = "SELECT * FROM carga WHERE idPersona='".$idDocente."'" ;
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $cargas = array();
        $i=0;
        foreach ($resultado as $fila) {
            $carga = new Carga();
            $this->mapearCarga($carga, $fila);
            $cargas[$i] = $carga;
            $i++;
        }
        return $cargas;
    }
    
    public function verificarCarga($idSalon,$idMateria) {
        $sql = "SELECT * FROM carga WHERE idSalon='".$idSalon."' AND idMateria='".$idMateria."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $cargas = array();
        foreach ($resultado as $fila) {
            $carga = new Carga();
            $this->mapearCarga($carga, $fila);
            $cargas[$carga->getIdPersona()] = $carga;
        }
        return $cargas;
    }

    public function actualizarCarga(Carga $carga) {
        $sql = "UPDATE carga SET nombre=:nombre, horas=:horas WHERE idPersona=:idPersona";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($carga));        
        }
    
    
   public function eliminarCarga($idSalon,$idMateria) {
        $sql = "DELETE FROM carga where idSalon='".$idSalon."' AND idMateria='".$idMateria."'";
        $this->__setSql($sql);
        $this->ejecutar();        
   }
   
    public function consultarIdPersona($idPersona){
        $sql = "SELECT idPersona, idPersona FROM carga_docente WHERE idPersona='".$idPersona."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        return $resultado;
    }
    
    public function totalHoras($idMateria){
       $sql = "SELECT SUM(horas) FROM materia WHERE idMateria='".$idMateria.",";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        return $resultado;
    }
}

?>
