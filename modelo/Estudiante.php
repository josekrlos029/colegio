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

class Estudiante extends Modelo{
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
    
    public function __construct() {
        parent::__construct();
    }


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

     private function mapearEstudiante(Estudiante $estudiante, array $props) {
        if (array_key_exists('idEstudiante', $props)) {
            $estudiante->setDocumento($props['idEstudiante']);
        }
        if (array_key_exists('pNombre', $props)) {
            $estudiante->setNombre($props['pNombre']);
        }
         if (array_key_exists('sNombre', $props)) {
            $estudiante->setNombre($props['sNombre']);
        }
        if (array_key_exists('pApellido', $props)) {
            $estudiante->setApellido($props['pApellido']);
        }
        if (array_key_exists('sApellido', $props)) {
            $estudiante->setApellido($props['sApellido']);
        }
        if (array_key_exists('sexo', $props)) {
            $estudiante->setApellido($props['sexo']);
        }
        if (array_key_exists('telefono', $props)) {
            $estudiante->setApellido($props['telefono']);
        }
        if (array_key_exists('direccion', $props)) {
            $estudiante->setApellido($props['direccion']);
        }
        if (array_key_exists('correo', $props)) {
            $estudiante->setApellido($props['correo']);
        }
        if (array_key_exists('fNacimiento', $props)) {
            $estudiante->setFechaNacimiento(self::crearFecha($props['fNacimiento']));
        }
    }
  
    private function getParametros(Estudiante $est){
              
        $parametros = array(
            ':idEstudiante' => $est->getIdEstudiante(),
            ':pNombre' => $est->getPNombre(),
            ':sNombre' => $est->getSNombre(),
            ':pApellido' => $est->getPPellido(),
            ':sApellido' => $est->getSApellido(),
            ':sexo' => $this->getSexo(),
            ':telefono' => $est->getTelefono(),
            ':direccion' => $est->getDireccion(),
            ':correo' => $est->getCorreo(),
            ':fNacimiento' => $this->formatearFecha($est->getFNacimiento())
        );
        return $parametros;
    }
    
    public function crearEstudiante(Estudiante $estudiante) {
        $sql = "INSERT INTO estudiantes (idEstudiante, pNombre, sNombre, pApellido, sApellido, sexo, telefono, direccion, correo, fNacimiento) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($estudiante));
    }

    public function leerEstudiantes() {
        $sql = "SELECT documento, nombre, apellido, fechanacimiento FROM test.usuario";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $ests = array();
        foreach ($resultado as $fila) {
            $estudiante = new Estudiante();
            $this->mapearEstudiante($estudiante, $fila);
            $ests[$estudiante->getIdEstudiante()] = $estudiante;
        }
        return $ests;
    }

    public function actualizarEstudiante(Estudiante $estudiante) {
        $sql = "UPDATE test.usuario SET nombre=?, apellido=?, fechanacimiento=? WHERE documento=?";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($estudiante));        
        }
    
    
    public function eliminarEstudiante(Estudiante $estudiante) {
        $sql = "DELETE test.usuario where documento=?";
        $this->__setSql($sql);
        $param = array(':idEstudiante' => $estudiante->getIdEstudiante());
        $this->ejecutar($param);        
    }
    
}

?>
