<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Acudiente extends Modelo{
    
     public function __construct() {
        parent::__construct();
    }
    
    private $id_acudiente; 
    private $nombre;
    private $apellido;
    private $ocupacion;
    private $direccion;
    private $telefono;
    private $tel_oficina;
    
    public function getId_acudiente() {
        return $this->id_acudiente;
    }

    public function setId_acudiente($id_acudiente) {
        $this->id_acudiente = $id_acudiente;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getOcupacion() {
        return $this->ocupacion;
    }

    public function setOcupacion($ocupacion) {
        $this->ocupacion = $ocupacion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getTel_oficina() {
        return $this->tel_oficina;
    }

    public function setTel_oficina($tel_oficina) {
        $this->tel_oficina = $tel_oficina;
    }
    
    private function mapearAcudiente(Acudiente $acudiente, array $props) {
        
        if (array_key_exists('id_acudiente', $props)) {
            $acudiente->setId_acudiente($props['id_acudiente']);
        }
        if (array_key_exists('nombre', $props)) {
            $acudiente->setNombre($props['nombre']);
        }
        if (array_key_exists('apellido', $props)) {
            $acudiente->setApellido($props['apellido']);
        }
        if (array_key_exists('ocupacion', $props)) {
            $acudiente->setOcupacion($props['ocupacion']);
        }
        if (array_key_exists('direccion', $props)) {
            $acudiente->setDireccion($props['direccion']);
        }
        if (array_key_exists('tel_oficina', $props)) {
            $acudiente->setTel_oficina($props['tel_oficina']);
        }
        if (array_key_exists('telefono', $props)) {
            $acudiente->setTelefono($props['telefono']);
        }
         
    }
     public function leerPorId($id){
        $sql = "SELECT * FROM acudiente";
        $sql .= " WHERE id_acudiente='".$id."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $acudiente=NULL;
        foreach ($resultado as $fila) {
            $acudiente = new Acudiente();
            $this->mapearAcudiente($acudiente, $fila);
        }
        return $acudiente;
    }
    
     public function leerAcudientes(){
        $sql = "SELECT * FROM acudiente";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $acudientes=array();
        foreach ($resultado as $fila) {
            $acudiente = new Acudiente();
            $this->mapearAcudiente($acudiente, $fila);
            $acudientes[$acudiente->getId_acudiente()] = $acudiente;
        }
        return $acudientes;
    }
    
   


}

?>
