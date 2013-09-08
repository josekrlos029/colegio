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
    
    private function mapearPersona(Estudiante $persona, array $props) {
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
        if (array_key_exists('estado', $props)) {
            $persona->setEstado($props['estado']);
        }
        if (array_key_exists('fNacimiento', $props)) {
            $persona->setFNacimiento(self::crearFecha($props['fNacimiento']));
        }

    }

     private function mapearDatos(Estudiante $estudiante, array $props) {
        if (array_key_exists('tipoDocumento', $props)) {
            $estudiante->setTipoDocumento($props['tipoDocumento']);
        }
         if (array_key_exists('lugarExpedicion', $props)) {
            $estudiante->setLugarExpedicion($props['lugarExpedicion']);
        }
        if (array_key_exists('fechaExpedicion', $props)) {
            $estudiante->setFechaExpedicion($props['fechaExpedicion']);
        }
        if (array_key_exists('tipoSanguineo', $props)) {
            $estudiante->setTipoSanguineo($props['tipoSanguineo']);
        }
        if (array_key_exists('eps', $props)) {
            $estudiante->setEps($props['eps']);
        }
        if (array_key_exists('institucionProcedencia', $props)) {
            $estudiante->setInstProcedencia($props['institucionProcedencia']);
        }
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
    
    private function mapearNacimiento(Estudiante $estudiante, array $props) {
        if (array_key_exists('fNacimiento', $props)) {
            $estudiante->setFNacimiento($props['fNacimiento']);
        }
         if (array_key_exists('pais', $props)) {
            $estudiante->setPaisNacimiento($props['pais']);
        }
        if (array_key_exists('departamento', $props)) {
            $estudiante->setDepartamentoNacimiento($props['departamento']);
        }
        if (array_key_exists('municipio', $props)) {
            $estudiante->setMunicipioNacimiento($props['municipio']);
        }
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
    
    private function mapearUbicacion(Estudiante $estudiante, array $props) {
        if (array_key_exists('direccion', $props)) {
            $estudiante->setDireccion($props['direccion']);
        }
         if (array_key_exists('barrio', $props)) {
            $estudiante->setBarrio($props['barrio']);
        }
        if (array_key_exists('municipio', $props)) {
            $estudiante->setMunicipioResidencia($props['municipio']);
        }
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
    
     private function mapearPadre(Estudiante $estudiante, array $props) {
        if (array_key_exists('id_padre', $props)) {
            $estudiante->setIdPadre($props['id_padre']);
        }
         if (array_key_exists('nombre', $props)) {
            $estudiante->setNombresPadre($props['nombre']);
        }
        if (array_key_exists('apellido', $props)) {
            $estudiante->setApellidosPadre($props['apellido']);
        }
        if (array_key_exists('ocupacion', $props)) {
            $estudiante->setOcupacionPadre($props['ocupacion']);
        }
        if (array_key_exists('telefono', $props)) {
            $estudiante->setTelPadre($props['telefono']);
        }
        if (array_key_exists('tel_oficina', $props)) {
            $estudiante->setTelOficinaPadre($props['tel_oficina']);
        }
        if (array_key_exists('direccion', $props)) {
            $estudiante->setDirPadre($props['direccion']);
        }
    }   
    
    private function getParametrosPadre(Estudiante $est){
              
        $parametros = array(
            ':idPadre' => $est->getIdPadre(),
            ':nombresPadre' => $est->getNombresPadre(),
            ':apellidosPadre' => $est->getApellidosPadre(),
            ':ocupacionPadre' => $est->getOcupacionPadre(),
            ':telPadre' => $est->getTelPadre(),
            ':telOficinaPadre' => $est->getTelOficinaPadre(),
            ':dirPadre' => $est->getDirPadre()
           
        );
        return $parametros;
    }
    
    private function mapearMadre(Estudiante $estudiante, array $props) {
        if (array_key_exists('id_madre', $props)) {
            $estudiante->setIdMadre($props['id_madre']);
        }
         if (array_key_exists('nombre', $props)) {
            $estudiante->setNombresMadre($props['nombre']);
        }
        if (array_key_exists('apellido', $props)) {
            $estudiante->setApellidosMadre($props['apellido']);
        }
        if (array_key_exists('ocupacion', $props)) {
            $estudiante->setOcupacionMadre($props['ocupacion']);
        }
        if (array_key_exists('telefono', $props)) {
            $estudiante->setTelMadre($props['telefono']);
        }
        if (array_key_exists('tel_oficina', $props)) {
            $estudiante->setTelOficinaMadre($props['tel_oficina']);
        }
        if (array_key_exists('direccion', $props)) {
            $estudiante->setDirMadre($props['direccion']);
        }
    }   
    
    private function getParametrosMadre(Estudiante $est){
              
        $parametros = array(
            ':idMadre' => $est->getIdMadre(),
            ':nombresMadre' => $est->getNombresMadre(),
            ':apellidosMadre' => $est->getApellidosMadre(),
            ':ocupacionMadre' => $est->getOcupacionMadre(),
            ':telMadre' => $est->getTelMadre(),
            ':telOficinaMadre' => $est->getTelOficinaMadre(),
            ':dirMadre' => $est->getDirMadre()
           
        );
        return $parametros;
    }
    
    private function mapearAcudiente(Estudiante $estudiante, array $props) {
        if (array_key_exists('id_acudiente', $props)) {
            $estudiante->setIdAcudiente($props['id_acudiente']);
        }
         if (array_key_exists('nombre', $props)) {
            $estudiante->setNombresAcudiente($props['nombre']);
        }
        if (array_key_exists('apellido', $props)) {
            $estudiante->setApellidosAcudiente($props['apellido']);
        }
        if (array_key_exists('ocupacion', $props)) {
            $estudiante->setOcupacionAcudiente($props['ocupacion']);
        }
        if (array_key_exists('telefono', $props)) {
            $estudiante->setTelAcudiente($props['telefono']);
        }
        if (array_key_exists('tel_oficina', $props)) {
            $estudiante->setTelOficinaAcudiente($props['tel_oficina']);
        }
        if (array_key_exists('direccion', $props)) {
            $estudiante->setDirAcudiente($props['direccion']);
        }
    }   
     private function getParametrosAcudiente(Estudiante $est){
              
        $parametros = array(
            ':idAcudiente' => $est->getIdAcudiente(),
            ':nombresAcudiente' => $est->getNombresAcudiente(),
            ':apellidosAcudiente' => $est->getApellidosAcudiente(),
            ':ocupacionAcudiente' => $est->getOcupacionAcudiente(),
            ':telAcudiente' => $est->getTelMadre(),
            ':telOficinaAcudiente' => $est->getTelOficinaAcudiente(),
            ':dirAcudiente' => $est->getDirAcudiente()
           
        );
        return $parametros;
    }
    
    public function crearDatosUbicacion(Estudiante $estudiante){
        $sql = "INSERT INTO datos_ubicacion_persona (idPersona, direccion, barrio, municipio) VALUES ( :idPersona, :direccion, :barrio, :municipio)";
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
       public function crearDatosPadre(Estudiante $estudiante){
        $sql = "INSERT INTO padre (id_padre,nombre,apellido, ocupacion,telefono,tel_oficina,direccion) VALUES ( :idPadre, :nombresPadre, :apellidosPadre, :ocupacionPadre, :telPadre, :telOficinaPadre, :dirPadre)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametrosPadre($estudiante));
    }
     public function actDatosPadre(Estudiante $estudiante) {
        $sql = "UPDATE padre SET  nombre=:nombresPadre, apellido:apellidosPadre, ocupacion:ocupacionPadre, telefono=:telPadre, tel_oficina:telOficinaPadre,  direccion=:dirPadre  WHERE id_padre=:idPadre";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametrosAcudiente($estudiante));
        }
    
    public function crearDatosMadre(Estudiante $estudiante){
        $sql = "INSERT INTO madre (id_madre,nombre,apellido, ocupacion,telefono,tel_oficina,direccion) VALUES ( :idMadre, :nombresMadre, :apellidosMadre, :ocupacionMadre, :telMadre, :telOficinaMadre, :dirMadre)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametrosMadre($estudiante));
    }
    public function actDatosMadre(Estudiante $estudiante) {
        $sql = "UPDATE madre SET  nombre=:nombresMadre, apellido:apellidosMadre, ocupacion:ocupacionMadre, telefono=:telMadre, tel_oficina:telOficinaMadre,  direccion=:dirMadre  WHERE id_madre=:idMadre";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametrosAcudiente($estudiante));
        }
    
    public function crearDatosAcudiente(Estudiante $estudiante){
        $sql = "INSERT INTO acudiente (id_acudiente,nombre,apellido, ocupacion,telefono,tel_oficina,direccion) VALUES ( :idAcudiente, :nombresAcudiente, :apellidosAcudiente, :ocupacionAcudiente, :telAcudiente, :telOficinaAcudiente, :dirAcudiente)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametrosAcudiente($estudiante));
    }
    public function actDatosAcudiente(Estudiante $estudiante) {
        $sql = "UPDATE acudiente SET  nombres=:nombresAcudiente, apellidos:apellidosAcudiente, ocupacion:ocupacionAcudiente, telefono=:telAcudiente, tel_oficina:telOficinaAcudiente,  direccion=:dirAcudiente  WHERE id_acudiente=:idAcudiente";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametrosAcudiente($estudiante));
        }
    
    public function estudiantePadre(Estudiante $estudiante){
        $sql = "INSERT INTO padre_estudiante (id_estudiante,id_padre) VALUES (:idPersona,:idPadre)";
        $this->__setSql($sql);
        $this->ejecutar(array(
            ':idPersona' => $estudiante->getIdPersona(),
            ':idPadre' => $estudiante->getIdPadre()));
    }
    public function estudianteMadre(Estudiante $estudiante){
        $sql = "INSERT INTO madre_estudiante (id_estudiante,id_madre) VALUES (:idPersona,:idMadre)";
        $this->__setSql($sql);
        $this->ejecutar(array(
            ':idPersona' => $estudiante->getIdPersona(),
            ':idMadre' => $estudiante->getIdMadre()));
    }
     public function estudianteAcudiente(Estudiante $estudiante){
        $sql = "INSERT INTO acudiente_estudiante (id_persona,id_acudiente) VALUES (:idPersona,:idAcudiente)";
        $this->__setSql($sql);
        $this->ejecutar(array(
            ':idPersona' => $estudiante->getIdPersona(),
            ':idAcudiente' => $estudiante->getIdAcudiente()));
    }
    
    public function eliminarDatosUbicacion($idPersona){
        $sql = "DELETE FROM datos_persona WHERE idPersona='".$idPersona."'";
        $this->__setSql($sql);
        $this->ejecutar();
    }
    public function eliminarDatos($idPersona){
        $sql = "DELETE FROM datos_ubicacion_persona WHERE idPersona='".$idPersona."'";
        $this->__setSql($sql);
        $this->ejecutar();
    }
    
    public function eliminarDatosNacimiento($idPersona){
        $sql = "DELETE FROM datos_nac_persona WHERE idPersona='".$idPersona."'";
        $this->__setSql($sql);
        $this->ejecutar();
    }
    
    public function eliminarPadre($idPadre){
        $sql = "DELETE FROM padre WHERE id_padre='".$idPadre."'";
        $this->__setSql($sql);
        $this->ejecutar();
    }
    
    
    public function eliminarMadre($idMadre){
        $sql = "DELETE FROM madre WHERE id_madre='".$idMadre."'";
        $this->__setSql($sql);
        $this->ejecutar();
    }
    public function eliminarAcudiente($idAcudiente){
        $sql = "DELETE FROM acudiente WHERE id_acudiente='".$idAcudiente."'";
        $this->__setSql($sql);
        $this->ejecutar();
    }
      public function eliminarEstudiantePadre($idPersona,$idPadre){
        $sql = "DELETE FROM padre_estudiante WHERE id_padre='".$idPadre."' AND id_estudiante='".$idPersona."'";
        $this->__setSql($sql);
        $this->ejecutar();
    }
    public function eliminarEstudianteMadre($idPersona,$idMadre){
        $sql = "DELETE FROM madre_estudiante WHERE id_madre='".$idMadre."' AND id_estudiante='".$idPersona."'";
        $this->__setSql($sql);
        $this->ejecutar();
    }
    public function eliminarEstudianteAcudiente($idPersona,$idAcudiente){
        $sql = "DELETE FROM acudiente_estudiante WHERE id_acudiente='".$idAcudiente."' AND id_estudiante='".$idPersona."'";
        $this->__setSql($sql);
        $this->ejecutar();
    }
    
    public function verificarPadre($idPadre){
        $sql = "SELECT * FROM padre WHERE id_padre='".$idPadre."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        return $resultado;
    }
    
    public function verificarMadre($idMadre){
        $sql = "SELECT * FROM madre WHERE id_madre='".$idMadre."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        return $resultado;
    }
    
    public function verificarAcudiente($idAcudiente){
        $sql = "SELECT * FROM acudiente WHERE id_acudiente='".$idAcudiente."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        return $resultado;
    }
    
    public function leerDatos($idPersona, Estudiante $estudiante){
        $sql = "SELECT tipoDocumento, lugarExpedicion, fechaExpedicion, tipoSanguineo, eps, institucionProcedencia FROM datos_persona WHERE idPersona='".$idPersona."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        foreach ($resultado as $fila) {
            
            $this->mapearDatos($estudiante, $fila);
            
        }
    }
    public function leerNacimiento($idPersona, Estudiante $estudiante){
        $sql = "SELECT fNacimiento, pais, departamento, municipio FROM datos_nac_persona WHERE idPersona='".$idPersona."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        foreach ($resultado as $fila) {
            
            $this->mapearNacimiento($estudiante, $fila);
            
        }
    }
    
    public function leerUbicacion($idPersona, Estudiante $estudiante){
        $sql = "SELECT direccion, barrio, municipio FROM datos_ubicacion_persona WHERE idPersona='".$idPersona."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        foreach ($resultado as $fila) {
            
            $this->mapearUbicacion($estudiante, $fila);
            
        }
    }
    
     public function leerPorId($id){
        $sql = "SELECT p.idPersona, p.nombres, p.pApellido, p.sApellido, p.sexo, p.telefono, du.direccion, p.correo, p.estado, dn.fNacimiento FROM persona p,datos_nac_persona dn, datos_ubicacion_persona du";
        $sql .= " WHERE p.idPersona=dn.idPersona AND p.idPersona=du.idPersona AND p.idPersona='".$id."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $persona=NULL;
        foreach ($resultado as $fila) {
            $persona = new Estudiante();
            $this->mapearPersona($persona, $fila);
        }
        return $persona;
    }
    
    public function leerPadre($idPersona, Estudiante $estudiante){
        $sql = "SELECT p.id_padre,p.nombre,p.apellido, p.ocupacion,p.telefono,p.tel_oficina,p.direccion FROM padre p , padre_estudiante pe WHERE p.id_padre= pe.id_padre AND pe.id_estudiante='".$idPersona."'";
        $this->__setSql($sql);
     
        $resultado = $this->consultar($sql);
        foreach ($resultado as $fila) {
              
            $this->mapearPadre($estudiante, $fila);
            
        }return $estudiante;
    }
    
    public function leerMadre($idPersona, Estudiante $estudiante){
        $sql = "SELECT m.id_madre,m.nombre,m.apellido, m.ocupacion,m.telefono,m.tel_oficina,m.direccion FROM madre m , madre_estudiante me WHERE m.id_madre= me.id_madre AND me.id_estudiante='".$idPersona."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        foreach ($resultado as $fila) {
            
            $this->mapearMadre($estudiante, $fila);
            
        }return $estudiante;
    }
    
     public function leerAcudiente($idPersona,Estudiante $estudiante){
        $sql = "SELECT a.id_acudiente,a.nombre,a.apellido, a.ocupacion,a.telefono,a.tel_oficina,a.direccion FROM acudiente a , acudiente_estudiante ae WHERE a.id_acudiente= ae.id_acudiente AND ae.id_persona='".$idPersona."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        
        foreach ($resultado as $fila) {
            
            $this->mapearAcudiente($estudiante, $fila);
            
        }
        return $estudiante;
    }
    
}

?>
