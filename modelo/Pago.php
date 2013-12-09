<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pago
 *
 * @author JoseCarlos
 */
class Pago extends Modelo{
    private $idPago;
    private $idPersona;
    private $concepto;
    private $valor;
    private $fecha;
    private $mes;
    private $ano;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getIdPago() {
        return $this->idPago;
    }

    public function setIdPago($idPago) {
        $this->idPago = $idPago;
    }

    public function getIdPersona() {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona) {
        $this->idPersona = $idPersona;
    }

    public function getConcepto() {
        return $this->concepto;
    }

    public function setConcepto($concepto) {
        $this->concepto = $concepto;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getMes() {
        return $this->mes;
    }

    public function setMes($mes) {
        $this->mes = $mes;
    }

    public function getAno() {
        return $this->ano;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

 private function mapearPago(Pago $pago, array $props) {
        if (array_key_exists('id', $props)) {
            $pago->setIdPago($props['id']);
        }
        if (array_key_exists('idPersona', $props)) {
            $pago->setIdPersona($props['idPersona']);
        }
        if (array_key_exists('concepto', $props)) {
            $pago->setConcepto($props['concepto']);
        }
         if (array_key_exists('valor', $props)) {
            $pago->setValor($props['valor']);
        }
        if (array_key_exists('fecha', $props)) {
            $pago->setFecha($props['fecha']);
        }
        if (array_key_exists('mes', $props)) {
            $pago->setMes($props['mes']);
        }
        if (array_key_exists('año', $props)) {
            $pago->setAno($props['año']);
        }
    }
    
    
  
    private function getParametros(Pago $pago){
              
        $parametros = array(
  
            ':idPersona' => $pago->getIdPersona(),
            ':concepto' => $pago->getConcepto(),
            ':valor' => $pago->getValor(),
            ':fecha' => $this->getFecha(),
            ':mes' => $this->getMes(),
            ':ano' => $this->getAno()
            
        );
        return $parametros;
    }
    
    private function getParametros1(Pago $pago){
              
        $parametros = array(
            ':idPersona' => $pago->getIdPersona(),
            ':concepto' => $pago->getConcepto(),
            ':valor' => $pago->getValor(),
            ':fecha' => $this->getFecha(),
            
        );
        return $parametros;
    }
    
    public function crearPago(Pago $pago){
        $fecha = getdate();
        $anio=$fecha["year"];
        $sql = "INSERT INTO pago (idPersona, concepto, valor, fecha, año) VALUES ( :idPersona, :concepto, :valor, :fecha,".$anio.")";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros1($pago));
    }
    public function crearPagoPension(Pago $pago){
       $sql = "INSERT INTO pago (idPersona, concepto, valor, fecha, mes, año) VALUES ( :idPersona, :concepto, :valor, :fecha, :mes, :ano)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($pago)); 
    }
    
    public function leerPensionesPorIdPersona($idPersona){
        $sql = "SELECT * FROM pago WHERE idPersona='".$idPersona."' AND concepto='PENSION' ORDER BY fecha";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pagos = array();
        foreach ($resultado as $fila) {
            $pago = new Pago();
            $this->mapearPago($pago, $fila);
            $pagos[$pago->getIdPago()] = $pago;
        }
        return $pagos;
    }
    public function leerPensionesPorIdPersonaYAnio($idPersona, $anio){
        $sql = "SELECT * FROM pago WHERE idPersona='".$idPersona."' AND concepto='PENSION' AND año=".$anio." ORDER BY fecha";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pagos = array();
        foreach ($resultado as $fila) {
            $pago = new Pago();
            $this->mapearPago($pago, $fila);
            $pagos[$pago->getIdPago()] = $pago;
        }
        return $pagos;
    }
     public function leerPensionesPorIdPersonaMesYAnio($idPersona, $anio, $mes){
        $sql = "SELECT * FROM pago WHERE idPersona='".$idPersona."' AND concepto='PENSION' AND año=".$anio." AND mes='".$mes."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pago = NULL;
        foreach ($resultado as $fila) {
            $pago = new Pago();
            $this->mapearPago($pago, $fila);
            
        }
        return $pago;
    }
    public function leerPagosPorIdPersona($idPersona){
        $sql = "SELECT * FROM pago WHERE idPersona='".$idPersona."' ORDER BY fecha DESC";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pagos = array();
        foreach ($resultado as $fila) {
            $pago = new Pago();
            $this->mapearPago($pago, $fila);
            $pagos[$pago->getIdPago()] = $pago;
        }
        return $pagos;
    }
    public function leerPagosPorIdPersonaYAño($idPersona,$anio){
        $sql = "SELECT * FROM pago WHERE idPersona='".$idPersona."' AND año=".$anio;
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pagos = array();
        foreach ($resultado as $fila) {
            $pago = new Pago();
            $this->mapearPago($pago, $fila);
            $pagos[$pago->getIdPago()] = $pago;
        }
        return $pagos;
    }
    
    public function leerPagosPorIdPersonayRangoFecha($idPersona,$inicio,$fin){
        $sql = "SELECT * FROM pago WHERE idPersona='".$idPersona."' AND fecha BETWEEN '".$inicio."' AND '".$fin."' ORDER BY fecha DESC";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pagos = array();
        foreach ($resultado as $fila) {
            $pago = new Pago();
            $this->mapearPago($pago, $fila);
            $pagos[$pago->getIdPago()] = $pago;
        }
        return $pagos;
    }
    
    public function leerPensionesPorIdPersonayRangoFecha($idPersona,$inicio,$fin){
        $sql = "SELECT * FROM pago WHERE idPersona='".$idPersona."' AND concepto='PENSION' AND fecha BETWEEN '".$inicio."' AND '".$fin."' ORDER BY fecha DESC";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pagos = array();
        foreach ($resultado as $fila) {
            $pago = new Pago();
            $this->mapearPago($pago, $fila);
            $pagos[$pago->getIdPago()] = $pago;
        }
        return $pagos;
    }
    
    public function leerPensionesPorRangoFecha($inicio,$fin){
        $sql = "SELECT * FROM pago WHERE concepto='PENSION' AND fecha BETWEEN '".$inicio."' AND '".$fin."' ORDER BY fecha DESC";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pagos = array();
        foreach ($resultado as $fila) {
            $pago = new Pago();
            $this->mapearPago($pago, $fila);
            $pagos[$pago->getIdPago()] = $pago;
        }
        return $pagos;
    }
    
    public function leerPagosPorRangoFecha($inicio,$fin){
        $sql = "SELECT * FROM pago WHERE fecha BETWEEN '".$inicio."' AND '".$fin."' ORDER BY fecha DESC";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pagos = array();
        foreach ($resultado as $fila) {
            $pago = new Pago();
            $this->mapearPago($pago, $fila);
            $pagos[$pago->getIdPago()] = $pago;
        }
        return $pagos;
    }
    
     public function leerPensionesPorFecha($fecha){
        $sql = "SELECT * FROM pago WHERE fecha='".$fecha."' AND concepto='PENSION'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pagos = array();
        foreach ($resultado as $fila) {
            $pago = new Pago();
            $this->mapearPago($pago, $fila);
            $pagos[$pago->getIdPago()] = $pago;
        }
        return $pagos;
    }
    
    public function leerPagosPorFecha($fecha){
        $sql = "SELECT * FROM pago WHERE fecha='".$fecha."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $pagos = array();
        foreach ($resultado as $fila) {
            $pago = new Pago();
            $this->mapearPago($pago, $fila);
            $pagos[$pago->getIdPago()] = $pago;
        }
        return $pagos;
    }
    public function leerAnios(){
        $sql = "SELECT DISTINCT año FROM pago ORDER BY año DESC";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $años = array();
        
        foreach ($resultado as $fila) {
           $años[] = $fila['año'];
        }
        return $años;
    }
    public function actualizarValorPension($id, $valor, $fecha){
        $sql = "UPDATE pago SET valor=".$valor.", fecha='".$fecha."' WHERE id=".$id;
        $this->__setSql($sql);
        $this->ejecutar();
    }
}

?>
