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
class Usuario extends Modelo{
    //put your code here
    
    public function __construct() {
        parent::__construct();
    }
    
    private $idPersona;
    private $usuario;
    private $contraseña;
    
    public function getIdPersona() {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
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

 private function mapearUsuario(Usuario $usuario, array $props) {
        if (array_key_exists('idPersona', $props)) {
            $usuario->setIdPersona($props['idPersona']);
        }
         if (array_key_exists('usuario', $props)) {
            $usuario->setUsuario ($props['usuario']);
        }
        if (array_key_exists('contraseña', $props)) {
            $usuario->setContraseña($props['contraseña']);
        }
        
    }
  
    private function getParametros(Usuario $adm){
              
        $parametros = array(
            ':idPersona' => $adm->getIdPersona(),
            ':usuario' => $adm->getUsuario(),
            ':clave' => sha1( $adm->getContraseña())
            );
        return $parametros;
    }
    public function crearUsuario(Usuario $usuario) {
        $sql = "INSERT INTO usuario (idPersona, usuario, contraseña) VALUES (:idPersona,:usuario,:clave)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($usuario));
    }
    
    public function verificarUsuario($usuario, $clave) {
        $sql = "SELECT * FROM usuario WHERE usuario=? AND contraseña=?";
        $clave1= sha1($clave);
        $param = array($usuario,$clave1);
        $this->__setSql($sql);
        $res = $this->consultar($sql, $param);
        $usuario = NULL;
        foreach ($res as $fila) {
            $usuario = new Usuario();
            
            $this->mapearUsuario($usuario, $fila);
        }
        return $usuario;
  
    }
   
}

?>
