<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notas
 *
 * @author JoseCarlos
 */
class Nota extends Modelo {
    private $id;
    private $primerP;
    private $segundoP;
    private $tercerP;
    private $cuartoP;
    private $definitiva;
    
    public function __construct() {
        parent::__construct();
    }   
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getPrimerP() {
        return $this->primerP;
    }

    public function setPrimerP($primerP) {
        $this->primerP = $primerP;
    }

    public function getSegundoP() {
        return $this->segundoP;
    }

    public function setSegundoP($segundoP) {
        $this->segundoP = $segundoP;
    }

    public function getTercerP() {
        return $this->tercerP;
    }

    public function setTercerP($tercerP) {
        $this->tercerP = $tercerP;
    }

    public function getCuartoP() {
        return $this->cuartoP;
    }

    public function setCuartoP($cuartoP) {
        $this->cuartoP = $cuartoP;
    }

    public function getDefinitiva() {
        return $this->definitiva;
    }

    public function setDefinitiva($definitiva) {
        $this->definitiva = $definitiva;
    }
    private function mapearNota(Nota $nota, array $props) {
        if (array_key_exists('idNota', $props)) {
            $nota->setId($props['idNota']);
        }
        if (array_key_exists('primerP', $props)) {
            $nota->setPrimerP($props['primerP']);
        }
         if (array_key_exists('segundoP', $props)) {
            $nota->setSegundoP($props['segundoP']);
        }
        if (array_key_exists('tercerP', $props)) {
            $nota->setTercerP($props['tercerP']);
        }
        if (array_key_exists('cuartoP', $props)) {
            $nota->setCuartoP($props['cuartoP']);
        }
        if (array_key_exists('definitiva', $props)) {
            $nota->setDefinitiva($props['definitiva']);
        }
    }
    
    
  /*
    private function getParametros(Nota $mat){
              
        $parametros = array(
            ':primerP' => $mat->getIdPersona(),
            ':segundoP' => $mat->getIdSalon(),
            ':tercerP' => $mat->getJornada(),
            ':cuartoP' => $mat->getFecha(),
            ':definitiva' => $this->getAnoLectivo()
        );
        return $parametros;
    }
    */
    
    public function crearNota($idPersona, $idMateria){
        $sql = "INSERT INTO notas (idPersona, idMateria) VALUES ( :idPersona, :idMateria)";
        $this->__setSql($sql);
        $this->ejecutar(array(':idPersona'=> $idPersona, ':idMateria'=> $idMateria));
    }
    
    public function eliminarNota($idPersona, $idMateria){
        $sql = "DELETE FROM notas WHERE idPersona=:idPersona AND idMateria=:idMateria ";
        $this->__setSql($sql);
        $this->ejecutar(array(':idPersona'=> $idPersona, ':idMateria'=> $idMateria));
    }
    
    public function leerNotaEstudiante($idPersona, $idMateria){
        $sql = "SELECT idNota, primerP, segundoP, tercerP, cuartoP, definitiva FROM notas WHERE idPersona='".$idPersona."' AND idMateria='".$idMateria."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $nota = new Nota();
        foreach ($resultado as $fila) {
           
            $this->mapearNota($nota, $fila);

        }
        return $nota;
    }
    
    public function leerPorMateria($idSalon, $idMateria){
        $sql = "SELECT n.idNota as idNota, n.primerP as primerP, n.segundoP as segundoP, n.tercerP as tercerP, n.cuartoP as cuartoP, n.definitiva as definitiva FROM notas n, matricula m WHERE n.idPersona=m.idPersona AND m.idSalon='".$idSalon."' AND m.estado='1' AND n.idMateria='".$idMateria."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $notas = array();
        foreach ($resultado as $fila) {
           $nota = new Nota();
            $this->mapearNota($nota, $fila);
            $notas[$nota->getId()]=$nota;
        }
        return $notas;
    }
    
    public function eliminarNotasPorId($idPersona){
        $sql = "DELETE FROM notas WHERE idPersona=:idPersona";
        $this->__setSql($sql);
        $this->ejecutar(array(':idPersona'=> $idPersona));
    }
    
    public function calcularDefNeta($n1,$n2,$n3,$n4){
        
            $def= ($n1 + $n2 + $n3 + $n4)/4;
        
        return $def;
    }

        public function calcularDef($n1,$n2,$n3,$n4){
        if($n1 == NULL && $n2 == NULL && $n3 == NULL && $n4 == NULL ){
        $def =NULL;
        }elseif ($n2 == NULL && $n3 == NULL && $n4 == NULL  ){
            $def = $n1;
        }elseif($n1 == NULL && $n3 == NULL && $n4 == NULL ){
            $def= $n2;
        }elseif($n1 == NULL && $n2 == NULL && $n4 == NULL ){
            $def= $n3;
        }elseif($n1 == NULL && $n2 == NULL && $n3 == NULL ){
            $def= $n4;
        }elseif($n3 == NULL && $n4 == NULL ){
            $def= ($n1+$n2)/2;
        }elseif($n2 == NULL && $n4 == NULL ){
            $def= ($n1+$n3)/2;
        }elseif($n1 == NULL && $n4 == NULL ){
            $def= ($n2+$n3)/2;
        }elseif($n2 == NULL && $n3 == NULL ){
            $def= ($n1+$n4)/2;
        }elseif($n1 == NULL && $n3 == NULL ){
            $def= ($n2+$n4)/2;
        }elseif($n1 == NULL && $n2 == NULL ){
            $def= ($n4+$n3)/2;
        }elseif($n4 == NULL ){
            $def= ($n1+$n2+$n3)/3;
        }elseif($n3 == NULL ){
            $def= ($n1+$n2+$n4)/3;
        }elseif($n2 == NULL ){
            $def= ($n1+$n3+$n4)/3;
        }elseif($n1 == NULL ){
            $def= ($n2+$n3+$n4)/3;
        }else{
            $def= ($n1 + $n2 + $n3 + $n4)/4;
        }
        return $def;
    }
    
     public function calcularDef2($n1,$n2,$n3,$n4){
        if($n1 == 0 && $n2 == 0 && $n3 == 0 && $n4 == 0 ){
        $def =0;
        }elseif ($n2 == 0 && $n3 == 0 && $n4 == 0  ){
            $def = $n1;
        }elseif($n1 == 0 && $n3 == 0 && $n4 == 0 ){
            $def= $n2;
        }elseif($n1 == 0 && $n2 == 0 && $n4 == 0 ){
            $def= $n3;
        }elseif($n1 == 0 && $n2 == 0 && $n3 == 0 ){
            $def= $n4;
        }elseif($n3 == 0 && $n4 == 0 ){
            $def= ($n1+$n2)/2;
        }elseif($n2 == 0 && $n4 == 0 ){
            $def= ($n1+$n3)/2;
        }elseif($n1 == 0 && $n4 == 0 ){
            $def= ($n2+$n3)/2;
        }elseif($n2 == 0 && $n3 == 0 ){
            $def= ($n1+$n4)/2;
        }elseif($n1 == 0 && $n3 == 0 ){
            $def= ($n2+$n4)/2;
        }elseif($n1 == 0 && $n2 == 0 ){
            $def= ($n4+$n3)/2;
        }elseif($n4 == 0 ){
            $def= ($n1+$n2+$n3)/3;
        }elseif($n3 == 0 ){
            $def= ($n1+$n2+$n4)/3;
        }elseif($n2 == 0 ){
            $def= ($n1+$n3+$n4)/3;
        }elseif($n1 == 0 ){
            $def= ($n2+$n3+$n4)/3;
        }else{
            $def= ($n1 + $n2 + $n3 + $n4)/4;
        }
        return $def;
    }
    
}
?>