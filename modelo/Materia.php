<?php

/**
 * Description of Materia
 *
 * @author JoseCarlos
 */
class Materia extends Modelo {
    //put your code here
  private $idMateria;
  private $nombreMateria;
  private $horas;  
  private $idArea;
  
public function __construct() {
    parent::__construct();
}

public function getIdMateria() {
      return $this->idMateria;
  }

  public function setIdMateria($idMateria) {
      $this->idMateria = $idMateria;
  }

  public function getNombreMateria() {
      return $this->nombreMateria;
  }

  public function setNombreMateria($nombreMateria) {
      $this->nombreMateria = $nombreMateria;
  }

  public function getHoras() {
      return $this->horas;
  }

  public function setHoras($horas) {
      $this->horas = $horas;
  }
  
  public function getIdArea() {
      return $this->idArea;
  }

  public function setIdArea($idArea) {
      $this->idArea = $idArea;
  }

  
 private function mapearMateria(Materia $materia, array $props) {
        if (array_key_exists('idMateria', $props)) {
            $materia->setIdMateria($props['idMateria']);
        }
         if (array_key_exists('nombre', $props)) {
            $materia->setNombreMateria($props['nombre']);
        }
        if (array_key_exists('horas', $props)) {
            $materia->setHoras($props['horas']);
        }
        if (array_key_exists('idArea', $props)) {
            $materia->setIdArea($props['idArea']);
        }
        
    }
  
    private function getParametros(Materia $mat){
              
        $parametros = array(
            ':idMateria' => $mat->getIdMateria(),
            ':nombre' => $mat->getNombreMateria(),
            ':horas' => $mat->getHoras(),
            ':idArea' => $mat->getIdArea()
            
        );
        return $parametros;
    }
    
    public function crearMateria(Materia $materia) {
        $sql = "INSERT INTO materia (idMateria, nombre, horas, idArea) VALUES (:idMateria,:nombre,:horas,:idArea)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($materia));
    }

    public function leerMaterias() {
        $sql = "SELECT idMateria, nombre, horas,idArea FROM materia";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $mats = array();
        foreach ($resultado as $fila) {
            $materia = new Materia();
            $this->mapearMateria($materia, $fila);
            $mats[$materia->getIdMateria()] = $materia;
        }
        return $mats;
    }
    public function leerMateriaPorId($idMateria) {
        $sql = "SELECT idMateria, nombre, horas, idArea FROM materia WHERE idMateria='".$idMateria."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $mats = array();
        foreach ($resultado as $fila) {
            $materia = new Materia();
            $this->mapearMateria($materia, $fila);
            $mats[$materia->getIdMateria()] = $materia;
        }
        return $mats;
    }

    public function actualizarMateria(Materia $materia) {
        $sql = "UPDATE materia SET nombre=?, horas=?, idArea=? WHERE idMateria=?";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($materia));        
        }
    
    
    public function eliminarMateria(Materia $materia) {
        $sql = "DELETE materia where idMateria=?";
        $this->__setSql($sql);
        $param = array(':idMateria' => $materia->getIdMateria());
        $this->ejecutar($param);        
    }
  public function leerMateriasPorGrado($idGrado){
        $sql = "SELECT m.idMateria as idMateria, m.nombre as nombre, m.horas as horas, m.idArea as idArea FROM materia m, pensum p WHERE p.idMateria=m.idMateria AND p.idGrado='".$idGrado."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $mats = array();
        foreach ($resultado as $fila) {
            $materia = new Materia();
            $this->mapearMateria($materia, $fila);
            $mats[$materia->getIdMateria()] = $materia;
        }
        return $mats;
  }
  public function crearPensum($idGrado, $idMateria) {
        $sql = "INSERT INTO pensum(idGrado, idMateria) VALUES (:idGrado, :idMateria)";
        $this->__setSql($sql);
        $param = array(':idGrado' => $idGrado,
           ':idMateria' => $idMateria);
        $this->ejecutar($param);
    }
    
    public function eliminarPensum($idGrado, $idMateria) {
        $sql = "DELETE FROM pensum WHERE idGrado=:idGrado AND idMateria=:idMateria";
        $this->__setSql($sql);
        $param = array(':idGrado' => $idGrado,
           ':idMateria' => $idMateria);
        $this->ejecutar($param);
    }
    
    public function leerMateriasPorCarga($idSalon, $idPersona){
        $sql = "SELECT DISTINCT  m.idMateria as idMateria, m.nombre as nombre, m.horas as horas FROM materia m, carga c WHERE c.idMateria=m.idMateria AND c.idSalon='".$idSalon."' AND c.idPersona='".$idPersona."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $mats = array();
        foreach ($resultado as $fila) {
            $materia = new Materia();
            $this->mapearMateria($materia, $fila);
            $mats[$materia->getIdMateria()] = $materia;
        }
        return $mats;
  }
  public function leerMateriasPorCargaYGrado($idGrado, $idPersona){
     $sql = " SELECT m.idMateria as idMateria, m.nombre as nombre, m.horas as horas, m.idArea as idArea 
                FROM  materia m,  carga c,  salon s
                WHERE m.idMateria = c.idMateria 
                AND c.idSalon = s.idSalon 
                AND s.idGrado =  '".$idGrado."'
                AND c.idPersona =  '".$idPersona."'";
     $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $mats = array();
        foreach ($resultado as $fila) {
            $materia = new Materia();
            $this->mapearMateria($materia, $fila);
            $mats[$materia->getIdMateria()] = $materia;
        }
        return $mats;
  }
}
?>