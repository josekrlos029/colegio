<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estudiante
 *
 * @author JoseCarlos
 */

class Estudiante {
    //put your code here
    
    
    private $idEstudiante;
    private $pNombre;
    private $sNombre;
    private $pPellido;
    private $sApellido;
    private $sexo;
    private $telefono;
    private $direccion;
    private $correo;
    private $fNacimiento;
    
    public function getIdEstudiante() {
        return $this->idEstudiante;
    }

    public function setIdEstudiante($idEstudiante) {
        $this->idEstudiante = $idEstudiante;
    }

    public function getPNombre() {
        return $this->pNombre;
    }

    public function setPNombre($pNombre) {
        $this->pNombre = $pNombre;
    }

    public function getSNombre() {
        return $this->sNombre;
    }

    public function setSNombre($sNombre) {
        $this->sNombre = $sNombre;
    }

    public function getPPellido() {
        return $this->pPellido;
    }

    public function setPPellido($pPellido) {
        $this->pPellido = $pPellido;
    }

    public function getSApellido() {
        return $this->sApellido;
    }

    public function setSApellido($sApellido) {
        $this->sApellido = $sApellido;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function getFNacimiento() {
        return $this->fNacimiento;
    }

    public function setFNacimiento($fNacimiento) {
        $this->fNacimiento = $fNacimiento;
    }


    
}

?>
