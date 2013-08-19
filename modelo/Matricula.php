<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Matricula
 *
 * @author JoseCarlos
 */
class Matricula extends Modelo{
    
    
    private $idPersona;
    private $idSalon;
    private $jornada;
    private $fecha;
    private $añoLectivo;
    
    public function getIdPersona() {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    public function getIdSalon() {
        return $this->idSalon;
    }

    public function setIdSalon($idSalon) {
        $this->idSalon = $idSalon;
    }

    public function getJornada() {
        return $this->jornada;
    }

    public function setJornada($jornada) {
        $this->jornada = $jornada;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getAñoLectivo() {
        return $this->añoLectivo;
    }

    public function setAñoLectivo($añoLectivo) {
        $this->añoLectivo = $añoLectivo;
    }
    
    protected static function crearFecha($entrada) {
        parent::crearFecha($entrada);
    }


  public function __construct() {
        parent::__construct();
    }
   
    private function mapearMatricula(Matricula $matricula, array $props) {
        if (array_key_exists('idPersona', $props)) {
            $matricula->setIdPersona($props['idPersona']);
        }
         if (array_key_exists('idSalon', $props)) {
            $matricula->setIdSalon($props['idSalon']);
        }
        if (array_key_exists('jornada', $props)) {
            $matricula->setJornada($props['jornada']);
        }
        if (array_key_exists('fecha_matricula', $props)) {
            $matricula->setFecha(self::crearFecha($props['fecha_matricula']));
        }
        if (array_key_exists('año_lectivo', $props)) {
            $matricula->setAñoLectivo($props['año_lectivo']);
        }
    }
    
    
  
    private function getParametros(Matricula $mat){
              
        $parametros = array(
            ':idPersona' => $mat->getIdPersona(),
            ':idSalon' => $mat->getIdSalon(),
            ':jornada' => $mat->getJornada(),
            ':fecha' => $mat->getFecha(),
            ':anoLectivo' => $this->getAñoLectivo()
        );
        return $parametros;
    }
 //   
    public function matricularEstudiante(Matricula $matricula){
         $sql = "INSERT INTO matricula(idPersona, idSalon, jornada, fecha_matricula, año_lectivo) VALUES(:idPersona, :idSalon, :jornada, :fecha, :anoLectivo)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($matricula));
    }
    
    public function leerMatriculaPorId($idPersona){
        $sql = "SELECT * FROM matricula WHERE idPersona='".$idPersona."' AND estado='1'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $matricula = NULL;
        foreach ($resultado as $fila) {
            $matricula = new Matricula();
            $this->mapearMatricula($matricula, $fila);

        }
        return $matricula;
    }
    
    public function retirarEstudiante($idPersona, $Alectivo){
         $sql = "UPDATE matricula SET estado='2' WHERE idPersona='".$idPersona."' AND año_lectivo='".$Alectivo."'";
        $this->__setSql($sql);
        $this->ejecutar();
    }
    
}
  
       
    

?>

