<?php

/**
 * Description of Rol
 *
 * @author JoseCarlos
 */
class Rol extends Modelo{
    //put your code here
    
    private $idRol;
    private $nombre;
    
    public function getIdRol() {
        return $this->idRol;
    }

    public function setIdRol($idRol) {
        $this->idRol = $idRol;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

  public function leerRoles($idPersona){
        $sql =  "SELECT rp.idRol, r.nombre FROM rolespersona rp, rol r WHERE rp.idRol= r.idRol AND idPersona=".$idPersona;
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $roles = array();
        foreach ($resultado as $fila){
            $rol = new Rol();
            $this->mapearRol($rol, $fila);
            $roles[$rol->getIdRol()] = $rol;
        }
        return $roles;
    }
    
    
 
private function mapearRol(Rol $rol, array $props){
        if(array_key_exists('idRol', $props)){
            $rol->setIdRol($props['idRol']);
        }
        if(array_key_exists('nombre', $props)){
            $rol->setNombre($props['nombre']);
        }
    }

}

?>
