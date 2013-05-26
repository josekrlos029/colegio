<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Salon
 *
 * @author JoseCarlos
 */
class Salon extends Modelo{
    //put your code here
    private $idSalon;
    private $idGrado;
    private $Grupo;
    
    public function getIdSalon() {
        return $this->idSalon;
    }

    public function setIdSalon($idSalon) {
        $this->idSalon = $idSalon;
    }

    public function getIdGrado() {
        return $this->idGrado;
    }

    public function setIdGrado($idGrado) {
        $this->idGrado = $idGrado;
    }

    public function getGrupo() {
        return $this->iGrupo;
    }

    public function setGrupo($Grupo) {
        $this->Grupo = $Grupo;
    }

     private function mapearSalon(Salon $salon, array $props) {
         if (array_key_exists('idSalon', $props)) {
            $salon->setIdSalon($props['idSalon']);
        }
         if (array_key_exists('idGrado', $props)) {
            $salon->setIdGrado($props['idGrado']);
        }
         if (array_key_exists('grupo', $props)) {
            $salon->setGrupo($props['grupo']);
        }  
    }
  
    private function getParametros(Salon $salon){
              
        $parametros = array(
            ':idSalon' => $salon->getIdSalon(),
            ':idGrado' => $salon->getIdGrado(),
            ':grupo' => $salon->getGrupo()
        );
        return $parametros;
    }
public function crearSalon(Salon $salon) {
        $sql = "INSERT INTO salon (idSalon, idGrado, grupo) VALUES (?,?,?)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($salon));
    }

    public function leerSalones() {
        $sql = "SELECT idSalon, idGrado, grupo FROM salon";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $salones = array();
        foreach ($resultado as $fila) {
            $salon = new Salon();
            $this->mapearSalon($salon, $fila);
            $salones[$salon->getIdSalon()] = $salon;
        }
        return $salones;
    }

    public function actualizarSalon(Salon $grado) {
        $sql = "UPDATE grado SET nombre=?, horas=? WHERE idSalon=?";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($grado));        
        }
    
    
    public function eliminarSalon(Salon $grado) {
        $sql = "DELETE salon where idSalon=?";
        $this->__setSql($sql);
        $param = array(':idSalon' => $grado->getIdSalon());
        $this->ejecutar($param);        
    }
}

?>
