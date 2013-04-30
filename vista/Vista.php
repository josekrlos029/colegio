<?php

/**
 * Clase para manejar las vistas
 * @author Wilman Vega <wilmanvega@gmail.com>
 *
 */
class Vista {
    protected $archivo;
    protected $datos = array();
    
    public function __construct($archivo) {
        $this->archivo = $archivo;
    }
    
    public function set($clave,$valor){
        $this->datos[$clave] = $valor;
    }
    
    public function get($clave){
        return $this->datos[$clave];
    }
    
    function imprimir(){
        if(!file_exists($this->archivo)){
            throw new Exception('La plantilla '.$this->archivo.' no existe');
        }
        extract($this->datos);
        ob_start();
        include ($this->archivo);
        $salida = ob_get_contents();
        ob_clean();
        echo $salida;
    }   
}

?>
