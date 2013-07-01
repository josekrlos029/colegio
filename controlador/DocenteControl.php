<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DoncenteControl
 *
 * @author AndyHenry
 */
class DocenteControl extends Controlador{
    
    public function __construct($modelo, $accion) {
        parent::__construct($modelo, $accion);
        $this->setModelo($modelo);
    }
    /**
         * Imprime la Vista principal del Usuario Docente
         * @return type
         */
        public function usuarioDocente(){
        try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Usuario Docente');
            $idPersona = $_SESSION['idUsuario'];
            $persona = new Persona();
            $docente = $persona->leerPorId($idPersona);
            $this->vista->set('docente', $docente);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        
         public function datosAcademicos(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Datos Academicos');
            $idPersona = $_SESSION['idUsuario'];
            $carga = new Carga();
            $cargas = $carga->leerCargasPorDocente($idPersona);
            $this->vista->set('cargas', $cargas);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }     
         }
         
         public function ingresoNotas(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'ingreso de Notas');
            $carga = new Carga();
            $idDocente = $_SESSION['idUsuario'];
            $Cargas = $carga->leerCargasPorDocente($idDocente);
            $this->vista->set('cargas', $Cargas);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        
         public function funcionesAcademicas(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'funciones Academicas');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        
        public function imprimirMaterias(){
            try {
                session_start();
                $idSalon =  isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
                $idDocente = $_SESSION['idUsuario'];
                $materia = new Materia();
                $materias = $materia->leerMateriasPorCarga($idSalon, $idDocente);
                $respuesta = "";
                foreach ($materias as $mat) {
                   $respuesta.="<option value='".$mat->getIdMateria()."'>".$mat->getNombreMateria()."</option>";
                }
                echo json_encode($respuesta);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }    
        }
        
        public function verNotas(){
            try {
             $this->vista->set('titulo', 'Vista de Notas');
            $periodo =  isset($_POST['periodo']) ? $_POST['periodo'] : NULL;
            $idSalon =  isset($_POST['salon']) ? $_POST['salon'] : NULL;
            $idMateria =  isset($_POST['materia']) ? $_POST['materia'] : NULL; 
            $materia = new Materia();
            $materias= $materia->leerMateriaPorId($idMateria);
            foreach ($materias as $mats) {
                   $mat = $mats;
                }
            $docente = new Docente();
            $resultado = $docente->crearConsulta($idSalon, $idMateria);
            $this->vista->set('periodo', $periodo);
            $this->vista->set('idSalon', $idSalon);
            $this->vista->set('materia', $mat);
            $this->vista->set('resultado', $resultado);
            return $this->vista->imprimir();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

        }
        
        public function actualizarNotas(){
            try {
             $this->vista->set('titulo', 'Actualizar Notas');
            $periodo =  isset($_POST['periodo']) ? $_POST['periodo'] : NULL;
            $idSalon =  isset($_POST['salon']) ? $_POST['salon'] : NULL;
            $idMateria =  isset($_POST['materia']) ? $_POST['materia'] : NULL; 
            $materia = new Materia();
            $materias= $materia->leerMateriaPorId($idMateria);
            foreach ($materias as $mats) {
                   $mat = $mats;
                }
            $docente = new Docente();
            $resultado = $docente->crearConsulta($idSalon, $idMateria);
            $this->vista->set('periodo', $periodo);
            $this->vista->set('idSalon', $idSalon);
            $this->vista->set('materia', $mat);
            $this->vista->set('resultado', $resultado);
            return $this->vista->imprimir();
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

        }
        
        public function guardarNotas(){
            try {
                $arreglo =  isset($_POST['notas']) ? $_POST['notas'] : NULL;
                $idMateria =  isset($_POST['idMateria']) ? $_POST['idMateria'] : NULL;
                $notas = json_decode($arreglo);
                $docente = new Docente();
                foreach($notas as $nota){
                    $docente->actualizarNota($nota[0], $idMateria, $nota[1], $nota[2], $nota[3], $nota[4]);
                }
                echo json_encode(1);
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
                }
               
}

?>
