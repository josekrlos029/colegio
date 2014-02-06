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
        return $this->Grupo;
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
        $sql = "INSERT INTO salon (idSalon, idGrado, grupo) VALUES (:idSalon,:idGrado,:grupo)";
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
    
     public function leerSalonePorId($idSalon) {
        $sql = "SELECT idSalon, idGrado, grupo FROM salon WHERE idSalon='".$idSalon."'" ;
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $salon = new Salon();
        foreach ($resultado as $fila) {
            
            $this->mapearSalon($salon, $fila);
            
        }
        return $salon;
    }
    
    public function leerSalonePorIdGrado($idGrado) {
        $sql = "SELECT idSalon, idGrado, grupo FROM salon WHERE idGrado='".$idGrado."'" ;
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
    
    public function leerSalonesJornada($limS,$limI){
        $sql = "SELECT idSalon FROM salon WHERE idGrado BETWEEN $limS AND $limI order by idGrado ";
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
    
    public function leerSalonesPreescolar(){
        $sql = "SELECT idSalon FROM salon WHERE idGrado NOT IN('1','2','3','4','5','6','7','8','9','10','11') ";
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

    public function actualizarSalon(Salon $salon) {
        $sql = "UPDATE grado SET nombre=:nombre, horas=:horas WHERE idSalon=:idSalon";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($salon));        
        }
    
    
    public function eliminarSalon($idSalon) {
        $sql = "DELETE salon where idSalon=".$idSalon;
        $this->__setSql($sql);
        $this->ejecutar();        
    }
}
?>