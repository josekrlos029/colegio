<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Docente
 *
 * @author JoseCarlos
 */
class Docente {
private $idDocente;
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


    public function getIdDocente() {
        return $this->idDocente;
    }

    public function setIdDocente($idDocente) {
        $this->idDocente = $idDocente;
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

     private function mapearDocente(Docente $docente, array $props) {
        if (array_key_exists('idDocente', $props)) {
            $docente->setIdDocente($props['idDocente']);
        }
        if (array_key_exists('pNombre', $props)) {
            $docente->setPNombre($props['pNombre']);
        }
         if (array_key_exists('sNombre', $props)) {
            $docente->setSNombre($props['sNombre']);
        }
        if (array_key_exists('pApellido', $props)) {
            $docente->setPPellido($props['pApellido']);
        }
        if (array_key_exists('sApellido', $props)) {
            $docente->setSApellido($props['sApellido']);
        }
        if (array_key_exists('sexo', $props)) {
            $docente->setSexo($props['sexo']);
        }
        if (array_key_exists('telefono', $props)) {
            $docente->setTelefono($props['telefono']);
        }
        if (array_key_exists('direccion', $props)) {
            $docente->setApellido($props['direccion']);
        }
        if (array_key_exists('correo', $props)) {
            $docente->setCorreo($props['correo']);
        }
        if (array_key_exists('fNacimiento', $props)) {
            $docente->setFNacimiento(self::crearFecha($props['fNacimiento']));
        }
    }
  
    private function getParametros(Docente $doc){
              
        $parametros = array(
            ':idDocente' => $doc->getIdDocente(),
            ':pNombre' => $doc->getPNombre(),
            ':sNombre' => $doc->getSNombre(),
            ':pApellido' => $doc->getPPellido(),
            ':sApellido' => $doc->getSApellido(),
            ':sexo' => $this->getSexo(),
            ':telefono' => $doc->getTelefono(),
            ':direccion' => $doc->getDireccion(),
            ':correo' => $doc->getCorreo(),
            ':fNacimiento' => $this->formatearFecha($doc->getFNacimiento())
        );
        return $parametros;
    }
    
    public function crearDocente(Docente $docente) {
        $sql = "INSERT INTO docentes (idDocente, pNombre, sNombre, pApellido, sApellido, sexo, telefono, direccion, correo, fNacimiento) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($docente));
    }

    public function leerDocentes() {
        $sql = "SELECT idDocente, pNombre, sNombre, pApellido, sApellido, sexo, telefono, direccion, correo, fNacimiento FROM docentes";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $docs = array();
        foreach ($resultado as $fila) {
            $docente = new Docente();
            $this->mapearDocente($docente, $fila);
            $docs[$docente->getIdDocente()] = $docente;
        }
        return $docs;
    }

    public function actualizarDocente(Docente $docente) {
        $sql = "UPDATE docentes SET pNombre=?, sNombre=?, pApellido=?, sApellido=?, sexo=?, telefono=?, direccion=?, correo=?, fNacimiento=? WHERE idDocente=?";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($docente));        
        }
    
    
    public function eliminarDocente(Docente $docente) {
        $sql = "DELETE docentes where idDocente=?";
        $this->__setSql($sql);
        $param = array(':idDocente' => $docente->getIdDocente());
        $this->ejecutar($param);        
    }
    }

?>
