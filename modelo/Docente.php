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
class Docente extends Persona{
    
    public function __construct() {
        parent::__construct();
    }

    public function crearDocente(Docente $docente) {
        $sql = "INSERT INTO docente (idDocente, nombres, pApellido, sApellido, sexo, telefono, direccion, correo, fNacimiento) VALUES (:idDocente,?,?,?,?,?,?,?,?)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($docente));
    }

    public function leerDocentes() {
        $sql = "SELECT idDocente, nombres, pApellido, sApellido, sexo, telefono, direccion, correo, fNacimiento FROM docente";
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
        $sql = "UPDATE docente SET nombres=?, pApellido=?, sApellido=?, sexo=?, telefono=?, direccion=?, correo=?, fNacimiento=? WHERE idDocente=?";
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
