<?php
/**
 * Description of Logro
 *
 * @author JoseCarlos
 */
class Logro extends Modelo{
    private $periodo;
    private $idSalon;
    private $idMateria;
    private $superior;
    private $alto;
    private $basico;
    private $bajo;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getPeriodo() {
        return $this->periodo;
    }

    public function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    public function getIdSalon() {
        return $this->idSalon;
    }

    public function setIdSalon($idSalon) {
        $this->idSalon = $idSalon;
    }

    public function getIdMateria() {
        return $this->idMateria;
    }

    public function setIdMateria($idMateria) {
        $this->idMateria = $idMateria;
    }

    public function getSuperior() {
        return $this->superior;
    }

    public function setSuperior($superior) {
        $this->superior = $superior;
    }

    public function getAlto() {
        return $this->alto;
    }

    public function setAlto($alto) {
        $this->alto = $alto;
    }

    public function getBasico() {
        return $this->basico;
    }

    public function setBasico($basico) {
        $this->basico = $basico;
    }

    public function getBajo() {
        return $this->bajo;
    }

    public function setBajo($bajo) {
        $this->bajo = $bajo;
    }
    
    
private function mapearLogro(Logro $logro, array $props) {
         if (array_key_exists('periodo', $props)) {
            $logro->setPeriodo($props['periodo']);
        }
         if (array_key_exists('idSalon', $props)) {
            $logro->setIdSalon($props['idSalon']);
        }
         if (array_key_exists('idMateria', $props)) {
            $logro->setIdMateria($props['idMateria']);
        }
        if (array_key_exists('superior', $props)) {
            $logro->setSuperior($props['superior']);
        }  
        if (array_key_exists('alto', $props)) {
            $logro->setAlto($props['alto']);
        }  
        if (array_key_exists('basico', $props)) {
            $logro->setBasico($props['basico']);
        }  
        if (array_key_exists('bajo', $props)) {
            $logro->setBajo($props['bajo']);
        }  
    }
  
    private function getParametros(Logro $logro){
              
        $parametros = array(
            ':periodo' => $logro->getPeriodo(),
            ':idSalon' => $logro->getIdSalon(),
            ':idMateria' => $logro->getIdMateria(),
            ':superior' => $logro->getSuperior(),
            ':alto' => $logro->getAlto(),
            ':basico' => $logro->getBasico(),
            ':bajo' => $logro->getBajo()
        );
        return $parametros;
    }
    
    public function crearLogro(Logro $logro) {
        $sql = "INSERT INTO logro (periodo, idSalon, idMateria, superior, alto, basico, bajo) VALUES (:periodo, :idSalon, :idMateria, :superior, :alto, :basico, :bajo)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($logro));
    }
    
    public function leerLogros() {
        $sql = "SELECT periodo, idSalon, idMateria, superior, alto, basico, bajo FROM logro";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $logros = array();
        foreach ($resultado as $fila) {
            $logro = new Logro();
            $this->mapearLogro($logro, $fila);
            $logros[$logro->getIdPersona()] = $logro;
        }
        return $logros;
    }
    
    public function leerLogro($periodo, $idSalon, $idMateria) {
        $sql = "SELECT periodo, idSalon, idMateria, superior, alto, basico, bajo FROM logro WHERE periodo='".$periodo."' AND idSalon='".$idSalon."' AND idMateria='".$idMateria."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $logro = NULL;
        foreach ($resultado as $fila) {
            $logro = new Logro();
            $this->mapearLogro($logro, $fila);
        }
        return $logro;
    }
    
    public function actualizarLogro(Logro $logro) {
        $sql = "UPDATE logro SET superior=:superior, alto=:alto, basico=:basico, bajo=:bajo WHERE periodo=:periodo AND idSalon=:idSalon AND idMateria=:idMateria";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($logro));        
        }
        
     public function eliminarLogro($idSalon,$idMateria) {
        $sql = "DELETE FROM logro where idSalon='".$idSalon."' AND idMateria='".$idMateria."'";
        $this->__setSql($sql);
        $this->ejecutar();        
   }
    
}

?>
