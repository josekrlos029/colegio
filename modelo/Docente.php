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
  
    public function crearConsulta($idSalon,$idMateria){
        $sql = "SELECT p.idPersona as idPersona, p.nombres as nombres, p.pApellido as pApellido, p.sApellido as sApellido, n.primerP as primerP, n.segundoP as segundoP, n.tercerP as tercerP, n.cuartoP as cuartoP, n.definitiva as def FROM notas n , matricula m , persona p WHERE n.idPersona=m.idPersona AND m.idPersona=p.idPersona AND m.idSalon='".$idSalon."' AND n.idMateria='".$idMateria."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        return $resultado;
    }
    
    public function actualizarNota($idPersona,$idMateria,$pirmerP,$segundoP,$tercerP,$cuartoP){
        $param = array(':idPersona' => $idPersona, ':idMateria'=> $idMateria, ':primerP'=>$pirmerP, ':segundoP'=>segundoP, ':tercerP'=>tercerP, ':cuartoP'=>cuartoP);
        $this->ejecutar($param);   
    }
    
}
?>
