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
    private $nombres;
    private $pApellido;
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

    public function getNombres() {
        return $this->nombres;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }
    
    public function getPApellido() {
        return $this->pApellido;
    }

    public function setPApellido($pPellido) {
        $this->pApellido = $pPellido;
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
            $estudiante->setIdEstudiante($props['idEstudiante']);
        }
         if (array_key_exists('nombres', $props)) {
            $estudiante->setNombres($props['nombres']);
        }
        if (array_key_exists('pApellido', $props)) {
            $estudiante->setPApellido($props['pApellido']);
        }
        if (array_key_exists('sApellido', $props)) {
            $estudiante->setSApellido($props['sApellido']);
        }
        if (array_key_exists('sexo', $props)) {
            $estudiante->setSexo($props['sexo']);
        }
        if (array_key_exists('telefono', $props)) {
            $estudiante->setTelefono($props['telefono']);
        }
        if (array_key_exists('direccion', $props)) {
            $estudiante->setDireccion($props['direccion']);
        }
        if (array_key_exists('correo', $props)) {
            $estudiante->setCorreo($props['correo']);
        }
        if (array_key_exists('fNacimiento', $props)) {
            $estudiante->setFNacimiento(self::crearFecha($props['fNacimiento']));
        }
    }
  
    private function getParametros(Estudiante $est){
              
        $parametros = array(
            ':idEstudiante' => $est->getIdEstudiante(),
            ':nombres' => $est->getNombres(),
            ':pApellido' => $est->getPApellido(),
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
        $sql = "INSERT INTO estudiante (idEstudiante, nombres, pApellido, sApellido, sexo, telefono, direccion, correo, fNacimiento) VALUES (?,?,?,?,?,?,?,?,?)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($estudiante));
    }

        public function leerEstudiante($id) {
            
            
            
        }
    
    public function leerEstudiantes() {
        $sql = "SELECT idEstudiante, nombres, pApellido, sApellido, sexo, telefono, direccion, correo, fNacimiento FROM estudiante";
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
        $sql = "UPDATE estudiante SET nombres=?, pApellido=?, sApellido=?, sexo=?, telefono=?, direccion=?, correo=?, fNacimiento=? WHERE idEstudiante=?";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($estudiante));        
        }
    
    
    public function eliminarEstudiante(Estudiante $estudiante) {
        $sql = "DELETE estudiante where idEstudiante=?";
        $this->__setSql($sql);
        $param = array(':idEstudiante' => $estudiante->getIdEstudiante());
        $this->ejecutar($param);        
    }
    
}

?>
