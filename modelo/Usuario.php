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
            ':clave' =>  $adm->getContraseña()
            );
        return $parametros;
    }
    public function crearUsuario(Usuario $usuario) {
        $sql = "INSERT INTO usuario (idPersona, usuario, contraseña) VALUES (:idPersona,:usuario,:clave)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($usuario));
    }
    
       public function leerPorId($id){
        $sql = "SELECT * FROM usuario WHERE idPersona='".$id."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $usuario=NULL;
        foreach ($resultado as $fila) {
            $usuario = new Usuario();
            $this->mapearUsuario($usuario, $fila);
           
        }
        return $usuario;
    }
   
     public function actualizarUsuario($idPersona,$usuario) {
        $sql = "UPDATE usuario SET usuario=:usuario WHERE idPersona=:idPersona";
        $this->__setSql($sql);
        $this->ejecutar(array(':idPersona'=> $idPersona, ':usuario'=>$usuario));    
        }
        
        public function actualizarContraseña($idPersona,$clave) {
        $sql = "UPDATE usuario SET contraseña=:clave WHERE idPersona=:idPersona";
        $this->__setSql($sql);
        $this->ejecutar(array(':idPersona'=> $idPersona, ':clave'=>$clave));    
        }
    
    public function verificarUsuario($usuario, $clave) {
        $sql = "SELECT * FROM usuario WHERE usuario=? AND contraseña=?";
        $clave1= $clave;
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
   
    public function verificarPorSocial($idSocial, $redSocial){
        
        if($redSocial == 'face'){
             $sql = "SELECT idPersona, usuario, contraseña FROM usuario WHERE facebook='".$idSocial."'";
        }else if($redSocial == 'twitter'){
             $sql = "SELECT idPersona, usuario, contraseña FROM usuario WHERE twitter='".$idSocial."'";
        }else if($redSocial == 'google'){
             $sql = "SELECT idPersona, usuario, contraseña FROM usuario WHERE google='".$idSocial."'";
        }
        $this->__setSql($sql);
        $res = $this->consultar($sql);
        $usuario = NULL;
        foreach ($res as $fila) {
            $usuario = new Usuario();
            $this->mapearUsuario($usuario, $fila);
        }
        return $usuario;
    }
    
    
    public function actualizarSocial($idSocial, $redSocial, $idPersona){
        
        if($redSocial == 'face'){
             $sql = "UPDATE usuario SET facebook=:idSocial WHERE idPersona=:idPersona";
        }else if($redSocial == 'twitter'){
             $sql = "UPDATE usuario SET twitter=:idSocial WHERE idPersona=:idPersona";
        }else if($redSocial == 'google'){
             $sql = "UPDATE usuario SET google=:idSocial WHERE idPersona=:idPersona";
        }
        $this->__setSql($sql);
        $this->ejecutar(array(':idPersona'=> $idPersona, ':idSocial'=>$idSocial));
    }
 
    public function verificarAdmin($usuario, $clave) {
        $sql = "SELECT u.idPersona as idPersona, u.usuario as usuario, u.contraseña as contraseña FROM usuario u, rolespersona r WHERE u.idPersona=r.idPersona AND u.usuario='".$usuario."' AND u.contraseña='".$clave."' AND r.idRol='A'";
        $this->__setSql($sql);
        $res = $this->consultar($sql);
        $usuario = NULL;
        foreach ($res as $fila) {
            $usuario = new Usuario();
            $this->mapearUsuario($usuario, $fila);
        }
        return $usuario;
        
        }
      
}

?>
