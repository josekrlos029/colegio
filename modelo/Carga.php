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
    private $idCarga;
    private $idSalon;
    private $idMateria;
    
    public function getIdCarga() {
        return $this->idCarga;
    }
     public function setIdCarga($idCarga) {
        $this->idCarga = $idCarga;
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
         if (array_key_exists('idCarga', $props)) {
            $carga->setIdCarga($props['idCarga']);
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
            ':idCarga' => $carga->getIdCarga(),
            ':idSalon' => $carga->getIdSalon(),
            ':idMateria' => $carga->getIdMateria()
        );
        return $parametros;
    }
public function crearCarga(Carga $carga) {
        $sql = "INSERT INTO carga (idCarga, idSalon, idMateria) VALUES (:idCarga,:idSalon,:idMateria)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($carga));
    }

    public function leerCargas() {
        $sql = "SELECT idCarga, idSalon, idMateria FROM carga";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $cargas = array();
        foreach ($resultado as $fila) {
            $carga = new Carga();
            $this->mapearCarga($carga, $fila);
            $cargas[$carga->getIdCarga()] = $carga;
        }
        return $cargas;
    }

    public function leerCargasPorDocente($idDocente) {
        $sql = "SELECT c.idCarga as idCarga, c.idSalon as idSalon, c.idMateria as idMateria FROM carga c, carga_docente cd WHERE c.idCarga=cd.idCarga AND cd.idPersona='".$idDocente."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $cargas = array();
        foreach ($resultado as $fila) {
            $carga = new Carga();
            $this->mapearCarga($carga, $fila);
            $cargas[$carga->getIdCarga()] = $carga;
        }
        return $cargas;
    }
    
    public function verificarCarga($idDocente) {
        $sql = "SELECT c.idCarga as idCarga, c.idSalon as idSalon, c.idMateria as idMateria FROM carga c, carga_docente cd WHERE c.idCarga=cd.idCarga AND cd.idPersona='".$idDocente."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $cargas = array();
        foreach ($resultado as $fila) {
            $carga = new Carga();
            $this->mapearCarga($carga, $fila);
            $cargas[$carga->getIdCarga()] = $carga;
        }
        return $cargas;
    }
    
    public function actualizarCarga(Carga $carga) {
        $sql = "UPDATE grado SET nombre=:nombre, horas=:horas WHERE idCarga=:idCarga";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($carga));        
        }
    
    
    public function eliminarCarga($idCarga) {
        $sql = "DELETE carga where idCarga=".$idCarga;
        $this->__setSql($sql);
        $this->ejecutar();        
    }
    
    
}

?>
