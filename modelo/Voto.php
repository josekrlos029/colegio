<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Voto
 *
 * @author JoseCarlos
 */
class Voto extends Modelo{
    private $idVoto;
    private $candidato;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getIdVoto() {
        return $this->idVoto;
    }

    public function getCandidato() {
        return $this->candidato;
    }

    public function setIdVoto($idVoto) {
        $this->idVoto = $idVoto;
    }

    public function setCandidato($candidato) {
        $this->candidato = $candidato;
    }
    
    private function mapearVoto(Voto $voto, array $props) {
        if (array_key_exists('idVoto', $props)) {
            $voto->setIdVoto($props['idVoto']);
        }
        if (array_key_exists('candidato', $props)) {
            $voto->setPrimerP($props['candidato']);
        }
    }
    
    public function creaVoto($candidato){
        $sql = "INSERT INTO voto (candidato) VALUES ( :candidato)";
        $this->__setSql($sql);
        $this->ejecutar(array(':candidato'=> $candidato));
    }
    
    public function leerVotos(){
        $sql = "SELECT * FROM voto";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $votos = array();
        foreach ($resultado as $fila) {
           $voto = new Voto();
            $this->mapearVoto($voto, $fila);
            $votos[$voto->getId()]=$voto;
        }
        return $votos;
    }
    
    public function leerPorCandidato($candidato){
        $sql = "SELECT * FROM voto WHERE candidato='".$candidato."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $votos = array();
        foreach ($resultado as $fila) {
           $voto = new Voto();
            $this->mapearVoto($voto, $fila);
            $votos[$voto->getId()]=$voto;
        }
        return $votos;
    }

}
