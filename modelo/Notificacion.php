<?php
class Notificacion extends Modelo{
private $id;    
private $asunto;
private $mensaje;
private $destino;
private $hora;
private $fecha_evento;
private $fecha_ingreso;

public function __construct() {
    parent::__construct();
}

public function getId() {
    return $this->id;
}

public function setId($id) {
    $this->id = $id;
}

public function getAsunto() {
    return $this->asunto;
}

public function setAsunto($asunto) {
    $this->asunto = $asunto;
}

public function getMensaje() {
    return $this->mensaje;
}

public function setMensaje($mensaje) {
    $this->mensaje = $mensaje;
}

public function getDestino() {
    return $this->destino;
}

public function setDestino($destino) {
    $this->destino = $destino;
}

public function getHora() {
    return $this->hora;
}

public function setHora($hora) {
    $this->hora = $hora;
}

public function getFecha_evento() {
    return $this->fecha_evento;
}

public function setFecha_evento($fecha_evento) {
    $this->fecha_evento = $fecha_evento;
}

public function getFecha_ingreso() {
    return $this->fecha_ingreso;
}

public function setFecha_ingreso($fecha_ingreso) {
    $this->fecha_ingreso = $fecha_ingreso;
}

private function mapearNotificaciones(Notificacion $notificacion, array $props) {
    
     if (array_key_exists('id', $props)) {
            $notificacion->setId($props['id']);
        }
        if (array_key_exists('asunto', $props)) {
            $notificacion->setAsunto($props['asunto']);
        }
        if (array_key_exists('mensaje', $props)) {
            $notificacion->setMensaje($props['mensaje']);
        }
        if (array_key_exists('destino', $props)) {
            $notificacion->setDestino($props['destino']);
        }
        if (array_key_exists('fecha_evento', $props)) {
            $notificacion->setFecha_evento($props['fecha_evento']);
        }
        if (array_key_exists('hora', $props)) {
            $notificacion->setHora($props['hora']);
        }
        
        if (array_key_exists('fecha_ingreso', $props)) {
            $notificacion->setFecha_ingreso($props['fecha_ingreso']);
        }
        
        
    }
    
    private function getParametros(Notificacion $not){
              
        $parametros = array(
            ':asunto' => $not->getAsunto(),
            ':mensaje' => $not->getMensaje(),
            ':destino' => $not->getDestino(),
            ':fecha_evento' => $not->getFecha_evento(),
            ':fecha_ingreso' => $not->getFecha_ingreso(),
            ':hora' => $not->getHora()
            
        );
        return $parametros;
    }
     public function crearNotificacion(Notificacion $notificacion) {
        $sql = "INSERT INTO notificacion (asunto, mensaje,destino,fecha_evento,hora,fecha_ingreso) VALUES (:asunto,:mensaje,:destino,:fecha_evento,:hora,:fecha_ingreso)";
        $this->__setSql($sql);
        $this->ejecutar($this->getParametros($notificacion));
    }
    
    public function leerNotificaciones(){
         $sql = "SELECT * FROM notificacion";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $noti = array();
        foreach ($resultado as $fila) {
            $notificacion = new Notificacion();
            $this->mapearNotificaciones($notificacion, $fila);
            $noti[$notificacion->getId()] = $notificacion;
        }
        return $noti;
    }
public function leerPorId($id) { 
   
        $sql = "SELECT * FROM notificacion WHERE id='".$id."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $noti = array();
        $notificacion=NULL;
        foreach ($resultado as $fila) {
            $notificacion = new Notificacion();
            $this->mapearNotificaciones($notificacion, $fila);
        }
        return $notificacion;
    }
    public function eliminar($id) { 
        $sql = "DELETE  FROM notificacion WHERE id='".$id."'";
         $this->__setSql($sql);
        $this->ejecutar();    
    }

public function leerPorDestino($destino1,$destino2) {
        $sql = "SELECT * FROM notificacion WHERE destino='".$destino1."' OR destino='".$destino2."'";
        $this->__setSql($sql);
        $resultado = $this->consultar($sql);
        $noti = array();
        foreach ($resultado as $fila) {
            $notificacion = new Notificacion();
            $this->mapearNotificaciones($notificacion, $fila);
            $noti[$notificacion->getId()] = $notificacion;
        }
        return $noti;
    }
}
?>
