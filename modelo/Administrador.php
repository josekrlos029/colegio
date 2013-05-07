<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrador
 *
 * @author JoseCarlos
 */
class Administrador extends Modelo{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    private $idAdministrador;
    private $usuario;
    private $contraseña;
    
    public function getIdAdministrador() {
        return $this->idAdministrador;
    }

    public function setIdAdministrador($idAdministrador) {
        $this->idAdministrador = $idAdministrador;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getContraseña() {
        return $this->contraseña;
    }

    public function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }

 private function mapearAdministrador(Administrador $administrador, array $props) {
        if (array_key_exists('idAdministrador', $props)) {
            $administrador->setIdAdministrador($props['idAdministrador']);
        }
         if (array_key_exists('usuario', $props)) {
            $administrador->setUsuario ($props['usuario']);
        }
        if (array_key_exists('contraseña', $props)) {
            $administrador->setContraseña($props['contraseña']);
        }
        
    }
  
    private function getParametros(Administrador $adm){
              
        $parametros = array(
            ':idAdministrador' => $adm->getIdAdministrador(),
            ':usuario' => $adm->getUsuario(),
            ':contraseña' => $adm->getContraseña()
            );
        return $parametros;
    }
    
    public function verificarAdministrador($usuario, $contraseña) {
        $sql = "SELECT COUNT(*) from usuario_admin WHERE usuario=? AND contraseña=?";
        $this->__setSql($sql);
        $valor = $this->ejecutar(array($usuario,$contraseña));
        foreach ($valor as $fila) {
            $vr = $fila['COUNT(*)'];
        }
        return $vr;
  
    }

    
}

?>
