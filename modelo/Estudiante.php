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
 private   $tipoDocumento;
 private   $lugarExpedicion;
 private   $fechaExpedicion;
 private   $tipoSanguineo;
 private   $eps ;
 private   $barrio;
 private   $municipioResidencia;
 private   $paisNacimiento;
 private   $departamentoNacimiento;
 private   $municipioNacimiento;
 private   $instProcedencia;
 
 private   $idPadre;
 private   $nombresPadre;
 private   $apellidosPadre;
 private   $ocupacionPadre;
 private   $telPadre;
 private   $telOficinaPadre;
 private   $dirPadre;
    
 private   $idMadre;
 private   $nombresMadre;
 private   $apellidosMadre;
 private   $ocupacionMadre;
 private   $telMadre;
 private   $telOficinaMadre;
 private   $dirMadre;
             
 private   $idAcudiente;
 private   $nombresAcudiente;
 private   $apellidosAcudiente;
 private   $ocupacionAcudiente;
 private   $telAcudiente;
 private   $telOficinaAcudiente;
 private   $dirAcudiente;
   
    public function __construct() {
        parent::__construct();
    }
    
    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }

    public function getLugarExpedicion() {
        return $this->lugarExpedicion;
    }

    public function setLugarExpedicion($lugarExpedicion) {
        $this->lugarExpedicion = $lugarExpedicion;
    }

    public function getTipoSanguineo() {
        return $this->tipoSanguineo;
    }

    public function setTipoSanguineo($tipoSanguineo) {
        $this->tipoSanguineo = $tipoSanguineo;
    }
    
    public function getFechaExpedicion() {
        return $this->fechaExpedicion;
    }

    public function setFechaExpedicion($fechaExpedicion) {
        $this->fechaExpedicion = $fechaExpedicion;
    }

    
    public function getEps() {
        return $this->eps;
    }

    public function setEps($eps) {
        $this->eps = $eps;
    }

    public function getBarrio() {
        return $this->barrio;
    }

    public function setBarrio($barrio) {
        $this->barrio = $barrio;
    }

    public function getMunicipioResidencia() {
        return $this->municipioResidencia;
    }

    public function setMunicipioResidencia($municipioResidencia) {
        $this->municipioResidencia = $municipioResidencia;
    }

    public function getPaisNacimiento() {
        return $this->paisNacimiento;
    }

    public function setPaisNacimiento($paisNacimiento) {
        $this->paisNacimiento = $paisNacimiento;
    }

    public function getDepartamentoNacimiento() {
        return $this->departamentoNacimiento;
    }

    public function setDepartamentoNacimiento($departamentoNacimiento) {
        $this->departamentoNacimiento = $departamentoNacimiento;
    }

    public function getMunicipioNacimiento() {
        return $this->municipioNacimiento;
    }

    public function setMunicipioNacimiento($municipioNacimiento) {
        $this->municipioNacimiento = $municipioNacimiento;
    }

    public function getIdPadre() {
        return $this->idPadre;
    }

    public function setIdPadre($idPadre) {
        $this->idPadre = $idPadre;
    }

    public function getNombresPadre() {
        return $this->nombresPadre;
    }

    public function setNombresPadre($nombresPadre) {
        $this->nombresPadre = $nombresPadre;
    }

    public function getApellidosPadre() {
        return $this->apellidosPadre;
    }

    public function setApellidosPadre($apellidosPadre) {
        $this->apellidosPadre = $apellidosPadre;
    }

    public function getOcupacionPadre() {
        return $this->ocupacionPadre;
    }

    public function setOcupacionPadre($ocupacionPadre) {
        $this->ocupacionPadre = $ocupacionPadre;
    }

   
    public function getTelOficinaPadre() {
        return $this->telOficinaPadre;
    }

    public function setTelOficinaPadre($telOficinaPadre) {
        $this->telOficinaPadre = $telOficinaPadre;
    }

    

    public function getIdMadre() {
        return $this->idMadre;
    }

    public function setIdMadre($idMadre) {
        $this->idMadre = $idMadre;
    }

    public function getNombresMadre() {
        return $this->nombresMadre;
    }

    public function setNombresMadre($nombresMadre) {
        $this->nombresMadre = $nombresMadre;
    }

    public function getApellidosMadre() {
        return $this->apellidosMadre;
    }

    public function setApellidosMadre($apellidosMadre) {
        $this->apellidosMadre = $apellidosMadre;
    }

    public function getOcupacionMadre() {
        return $this->ocupacionMadre;
    }

    public function setOcupacionMadre($ocupacionMadre) {
        $this->ocupacionMadre = $ocupacionMadre;
    }

   
    public function getTelOficinaMadre() {
        return $this->telOficinaMadre;
    }

    public function setTelOficinaMadre($telOficinaMadre) {
        $this->telOficinaMadre = $telOficinaMadre;
    }

    public function getIdAcudiente() {
        return $this->idAcudiente;
    }

    public function setIdAcudiente($idAcudiente) {
        $this->idAcudiente = $idAcudiente;
    }

    public function getNombresAcudiente() {
        return $this->nombresAcudiente;
    }

    public function setNombresAcudiente($nombresAcudiente) {
        $this->nombresAcudiente = $nombresAcudiente;
    }

    public function getApellidosAcudiente() {
        return $this->apellidosAcudiente;
    }

    public function setApellidosAcudiente($apellidosAcudiente) {
        $this->apellidosAcudiente = $apellidosAcudiente;
    }

    public function getOcupacionAcudiente() {
        return $this->ocupacionAcudiente;
    }

    public function setOcupacionAcudiente($ocupacionAcudiente) {
        $this->ocupacionAcudiente = $ocupacionAcudiente;
    }

  
    public function getTelOficinaAcudiente() {
        return $this->telOficinaAcudiente;
    }

    public function setTelOficinaAcudiente($telOficinaAcudiente) {
        $this->telOficinaAcudiente = $telOficinaAcudiente;
    }

    public function getDirPadre() {
        return $this->dirPadre;
    }

    public function setDirPadre($dirPadre) {
        $this->dirPadre = $dirPadre;
    }

    public function getDirMadre() {
        return $this->dirMadre;
    }

    public function setDirMadre($dirMadre) {
        $this->dirMadre = $dirMadre;
    }

    public function getDirAcudiente() {
        return $this->dirAcudiente;
    }

    public function setDirAcudiente($dirAcudiente) {
        $this->dirAcudiente = $dirAcudiente;
    }
    
    public function getTelPadre() {
        return $this->telPadre;
    }

    public function setTelPadre($telPadre) {
        $this->telPadre = $telPadre;
    }

    public function getTelMadre() {
        return $this->telMadre;
    }

    public function setTelMadre($telMadre) {
        $this->telMadre = $telMadre;
    }

    public function getTelAcudiente() {
        return $this->telAcudiente;
    }

    public function setTelAcudiente($telAcudiente) {
        $this->telAcudiente = $telAcudiente;
    }
    
    public function getInstProcedencia() {
        return $this->instProcedencia;
    }

    public function setInstProcedencia($instProcedencia) {
        $this->instProcedencia = $instProcedencia;
    }

        
    private function getParametrosNac(Estudiante $est){
              
        $parametros = array(
            ':idPersona' => $est->getIdPersona(),
            ':fNacimiento' => $est->getFNacimiento(),
            ':pais' => $est->getPaisNacimiento(),
            ':departamento' => $est->getDepartamentoNacimiento(),
            ':municipio' => $est->getMunicipioNacimiento(),
        );
        return $parametros;
    }
    
    private function getParametrosUbic(Estudiante $est){
              
        $parametros = array(
            ':idPersona' => $est->getIdPersona(),
            ':direccion' => $est->getDireccion(),
            ':barrio' => $est->getBarrio(),
            ':municipio' => $est->getMunicipioResidencia()
        );
        return $parametros;
    }
    
    private function getParametrosDat(Estudiante $est){
              
        $parametros = array(
            ':idPersona' => $est->getIdPersona(),
            ':tipoDocumento' => $est->getTipoDocumento(),
            ':lugarExpedicion' => $est->getLugarExpedicion(),
            ':fechaExpedicion' => $est->getFechaExpedicion(),
            ':tipoSanguineo' => $est->getTipoSanguineo(),
            ':eps' => $est->getEps(),
            ':institucionProcedencia' => $est->getInstProcedencia()
        );
        return $parametros;
    }
    
    public function crearDatosUbicacion(Estudiante $estudiante){
        $sql = "INSERT INTO datos_ubicacion_estudiante (idPersona, direccion, barrio, municipio) VALUES ( :idPersona, :direccion, :barrio, :municipio)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametrosUbic($estudiante));
    }
    public function crearDatos(Estudiante $estudiante){
        $sql = "INSERT INTO datos_persona (idPersona, tipoDocumento, lugarExpedicion, fechaExpedicion, tipoSanguineo, eps, institucionProcedencia) VALUES (:idPersona, :tipoDocumento, :lugarExpedicion, :fechaExpedicion, :tipoSanguineo, :eps, :institucionProcedencia)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametrosDat($estudiante));
    }
    
     public function crearDatosNacimiento(Estudiante $estudiante){
        $sql = "INSERT INTO datos_nac_persona (idPersona, fNacimiento, pais, departamento, municipio) VALUES ( :idPersona, :fNacimiento, :pais, :departamento, :municipio)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametrosNac($estudiante));
    }
    
    public function eliminarDatosUbicacion($idPersona){
        $sql = "DELETE FROM datos_persona WHERE idPersona='".$idPersona."'";
        $this->__setSql($sql);
        $this->ejecutar();
    }
    public function eliminarDatos($idPersona){
        $sql = "DELETE FROM datos_ubicacion_estudiante WHERE idPersona='".$idPersona."'";
        $this->__setSql($sql);
        $this->ejecutar();
    }
    
    public function eliminarDatosNacimiento($idPersona){
        $sql = "DELETE FROM datos_nac_persona WHERE idPersona='".$idPersona."'";
        $this->__setSql($sql);
        $this->ejecutar();
    }
    
}

?>
