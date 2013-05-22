<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Persona
 *
 * @author JoseCarlos
 */
class Persona extends Modelo{
  
    private $idPersona;
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


    public function getIdPersona() {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
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

     private function mapearPersona(Persona $persona, array $props) {
        if (array_key_exists('idPersona', $props)) {
            $persona->setIdPersona($props['idPersona']);
        }
         if (array_key_exists('nombres', $props)) {
            $persona->setNombres($props['nombres']);
        }
        if (array_key_exists('pApellido', $props)) {
            $persona->setPApellido($props['pApellido']);
        }
        if (array_key_exists('sApellido', $props)) {
            $persona->setSApellido($props['sApellido']);
        }
        if (array_key_exists('sexo', $props)) {
            $persona->setSexo($props['sexo']);
        }
        if (array_key_exists('telefono', $props)) {
            $persona->setTelefono($props['telefono']);
        }
        if (array_key_exists('direccion', $props)) {
            $persona->setDireccion($props['direccion']);
        }
        if (array_key_exists('correo', $props)) {
            $persona->setCorreo($props['correo']);
        }
        if (array_key_exists('fNacimiento', $props)) {
            $persona->setFNacimiento(self::crearFecha($props['fNacimiento']));
        }
    }
  
    private function getParametros(Persona $per){
              
        $parametros = array(
            ':idPersona' => $per->getIdPersona(),
            ':nombres' => $per->getNombres(),
            ':pApellido' => $per->getPApellido(),
            ':sApellido' => $per->getSApellido(),
            ':sexo' => $this->getSexo(),
            ':telefono' => $per->getTelefono(),
            ':direccion' => $per->getDireccion(),
            ':correo' => $per->getCorreo(),
            ':fNacimiento' => $this->formatearFecha($per->getFNacimiento())
        );
        return $parametros;
    }
    
    public function crearPersona(Persona $persona) {
        $sql = "INSERT INTO persona (idPersona, nombres, pApellido, sApellido, sexo, telefono, direccion, correo, fNacimiento) VALUES (?,?,?,?,?,?,?,?,?)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($persona));
    }

        public function leerPersona($id) {
            
            
            
        }
    
    public function leerPersonas() {
        $sql = "SELECT idPersona, nombres, pApellido, sApellido, sexo, telefono, direccion, correo, fNacimiento FROM persona";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pers = array();
        foreach ($resultado as $fila) {
            $persona = new Persona();
            $this->mapearPersona($persona, $fila);
            $pers[$persona->getIdPersona()] = $persona;
        }
        return $pers;
    }

    public function actualizarPersona(Persona $persona) {
        $sql = "UPDATE persona SET nombres=?, pApellido=?, sApellido=?, sexo=?, telefono=?, direccion=?, correo=?, fNacimiento=? WHERE idPersona=?";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($persona));        
        }
    
    
    public function eliminarPersona(Persona $persona) {
        $sql = "DELETE persona where idPersona=?";
        $this->__setSql($sql);
        $param = array(':idPersona' => $persona->getIdPersona());
        $this->ejecutar($param);        
    }
    
    public function leerPorId($id){
        $sql = "SELECT idPersona, nombres, pApellido, sApellido, sexo, telefono, direccion, correo, fNacimiento FROM persona ";
        $sql .= "WHERE idPersona=".$id;
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pers = array();
        foreach ($resultado as $fila) {
            $persona = new Persona();
            $this->mapearPersona($persona, $fila);
            $pers[$persona->getIdPersona()] = $persona;
        }
        return $pers;
    }
    
    
}

?>
