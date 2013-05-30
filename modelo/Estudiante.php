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

class Estudiante extends Persona {
    //put your code here
    
   
//    public function __construct() {
//        parent::__construct();
//    }
//    
//    
//    public function getCorreo() {
//        return parent::getCorreo();
//    }
//
//    public function getDireccion() {
//        return parent::getDireccion();
//    }
//
//    public function getFNacimiento() {
//        return parent::getFNacimiento();
//    }
//
//    public function getIdPersona() {
//        return parent::getIdPersona();
//    }
//
//    public function getNombres() {
//        return parent::getNombres();
//    }
//
//    public function getPApellido() {
//        return parent::getPApellido();
//    }
//
//    public function getSApellido() {
//        return parent::getSApellido();
//    }
//
//    public function getSexo() {
//        return parent::getSexo();
//    }
//
//    public function getTelefono() {
//        return parent::getTelefono();
//    }
//
//    public function setCorreo($correo) {
//        parent::setCorreo($correo);
//    }
//
//    public function setDireccion($direccion) {
//        parent::setDireccion($direccion);
//    }
//
//    public function setFNacimiento($fNacimiento) {
//        parent::setFNacimiento($fNacimiento);
//    }
//
//    public function setIdPersona($idPersona) {
//        parent::setIdPersona($idPersona);
//    }
//
//    public function setNombres($nombres) {
//        parent::setNombres($nombres);
//    }
//
//    public function setPApellido($pApellido) {
//        parent::setPApellido($pApellido);
//    }
//
//    public function setSApellido($sApellido) {
//        parent::setSApellido($sApellido);
//    }
//
//    public function setSexo($sexo) {
//        parent::setSexo($sexo);
//    }
//
//    public function setTelefono($telefono) {
//        parent::setTelefono($telefono);
//    }
//
//    
//
//     private function mapearEstudiante(Estudiante $estudiante, array $props) {
//        if (array_key_exists('idEstudiante', $props)) {
//            $estudiante->setIdEstudiante($props['idEstudiante']);
//        }
//         if (array_key_exists('nombres', $props)) {
//            $estudiante->setNombres($props['nombres']);
//        }
//        if (array_key_exists('pApellido', $props)) {
//            $estudiante->setPApellido($props['pApellido']);
//        }
//        if (array_key_exists('sApellido', $props)) {
//            $estudiante->setSApellido($props['sApellido']);
//        }
//        if (array_key_exists('sexo', $props)) {
//            $estudiante->setSexo($props['sexo']);
//        }
//        if (array_key_exists('telefono', $props)) {
//            $estudiante->setTelefono($props['telefono']);
//        }
//        if (array_key_exists('direccion', $props)) {
//            $estudiante->setDireccion($props['direccion']);
//        }
//        if (array_key_exists('correo', $props)) {
//            $estudiante->setCorreo($props['correo']);
//        }
//        if (array_key_exists('fNacimiento', $props)) {
//            $estudiante->setFNacimiento(self::crearFecha($props['fNacimiento']));
//        }
//    }
//  
//    private function getParametros(Estudiante $est){
//              
//        $parametros = array(
//            ':idEstudiante' => $est->getIdEstudiante(),
//            ':nombres' => $est->getNombres(),
//            ':pApellido' => $est->getPApellido(),
//            ':sApellido' => $est->getSApellido(),
//            ':sexo' => $this->getSexo(),
//            ':telefono' => $est->getTelefono(),
//            ':direccion' => $est->getDireccion(),
//            ':correo' => $est->getCorreo(),
//            ':fNacimiento' => $this->formatearFecha($est->getFNacimiento())
//        );
//        return $parametros;
//    }
//    
//    public function crearEstudiante(Estudiante $estudiante) {
//        $sql = "INSERT INTO estudiante (idEstudiante, nombres, pApellido, sApellido, sexo, telefono, direccion, correo, fNacimiento) VALUES (?,?,?,?,?,?,?,?,?)";
//        $this->__setSql($sql);
//        $this->ejecutar($this->getParametros($estudiante));
//    }
//
//        public function leerEstudiante($id) {
//            
//            
//            
//        }
//    
//    public function leerEstudiantes() {
//        $sql = "SELECT idEstudiante, nombres, pApellido, sApellido, sexo, telefono, direccion, correo, fNacimiento FROM estudiante";
//        $this->__setSql($sql);
//        $resultado = $this->consultar($sql);
//        $ests = array();
//        foreach ($resultado as $fila) {
//            $estudiante = new Estudiante();
//            $this->mapearEstudiante($estudiante, $fila);
//            $ests[$estudiante->getIdEstudiante()] = $estudiante;
//        }
//        return $ests;
//    }
//
//    public function actualizarEstudiante(Estudiante $estudiante) {
//        $sql = "UPDATE estudiante SET nombres=?, pApellido=?, sApellido=?, sexo=?, telefono=?, direccion=?, correo=?, fNacimiento=? WHERE idEstudiante=?";
//        $this->__setSql($sql);
//        $this->ejecutar($this->getParametros($estudiante));        
//        }
//    
//    
//    public function eliminarEstudiante(Estudiante $estudiante) {
//        $sql = "DELETE estudiante where idEstudiante=?";
//        $this->__setSql($sql);
//        $param = array(':idEstudiante' => $estudiante->getIdEstudiante());
//        $this->ejecutar($param);        
//    }
    
}

?>
