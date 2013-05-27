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
        
    }
  
    private function getParametros(Materia $mat){
              
        $parametros = array(
            ':idMateria' => $mat->getIdMateria(),
            ':nombre' => $mat->getNombreMateria(),
            ':horas' => $mat->getHoras()
            
        );
        return $parametros;
    }
    
    public function crearMateria(Materia $materia) {
        $sql = "INSERT INTO materia (idMateria, nombre, horas) VALUES (:idMateria,:nombre,:horas)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($materia));
    }

    public function leerMaterias() {
        $sql = "SELECT idMateria, nombre, horas FROM materia";
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
        $sql = "UPDATE materia SET nombre=?, horas=? WHERE idMateria=?";
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
        $sql = "SELECT m.idMateria as idMateria, m.nombre as nombre, m.horas as horas FROM materia m, pensum p WHERE p.idMateria=m.idMateria AND p.idSalon=".$idGrado;
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
  
  public function MateriasNoPertenecientesGrado($idGrado){
      $sql = "SELECT m.idMateria as idMateria, m.nombre as nombre, m.horas as horas FROM materia m, pensum p WHERE p.idMateria=m.idMateria AND p.idSalon<>".$idGrado;
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
