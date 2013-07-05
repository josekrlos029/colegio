<?php

/**
 * Clase para manejar los controladores en la aplicacion
 * @author andyhenry
 *
 */
class UsuarioControl extends Controlador {

    public function __construct($modelo, $accion) {
        parent::__construct($modelo, $accion);
        $this->setModelo($modelo);
    }

    public function index() {
        try {
            $datos = $this->modelo->leerUsuarios();
            $this->vista->set('usuarios', $datos);
            $this->vista->set('titulo', 'Lista de usuarios');
            return $this->vista->imprimir();
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
    }

    public function detalle($documento) {
        try {
            $usuario = $this->modelo->leerUsuarioPorDocumento($documento);
            if ($usuario != null) {
                $this->vista->set('titulo', 'Datos de ' . $usuario->getNombre);
                $this->vista->set('usuario', $usuario);
            } else {
                //TODO: Esto se puede mejorar redireccionando a una pagina de error
                $this->vista->set('titulo', 'Usuario no existe');
                $this->vista->set('usuario', $usuario);
            }
            
            return $this->vista->imprimir();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}

?>
