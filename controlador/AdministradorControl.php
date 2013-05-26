<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdministradorControl
 *
 * @author JoseCarlos
 */
class AdministradorControl extends Controlador{
    
    public function __construct($modelo, $accion) {
        parent::__construct($modelo, $accion);
        $this->setModelo($modelo);
    }
    /**
         * Imprime la Vista principal del Usuario Administrador
         * @return type
         */
        public function usuarioAdministrador(){
        try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Usuario Administrador');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        public function gestionarMaterias(){
        try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Gestionar Materias');
            $materia = new Materia();
            $materias = $materia->leerMaterias();
            $this->vista->set('materias', $materias);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        public function agregarMateria(){
            try {
             $idMateria = isset($_POST['idMateria']) ? $_POST['idMateria'] : NULL;
             $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
             $horas = isset($_POST['horas']) ? $_POST['horas'] : NULL;
             $materia = new Materia();
             $materia->setIdMateria($idMateria);
             $materia->setNombreMateria($nombre);
             $materia->setHoras($horas);
            $materia->crearMateria($materia);
             echo json_encode(1);
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
        public function gestionarGrados(){
        try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Gestión De Grados');
            $grado = new Grado();
            $grados = $grado->leerGrados();
            $this->vista->set('grados', $grados);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        public function agregarGrado(){
            try {
             $idGrado = isset($_POST['idGrado']) ? $_POST['idGrado'] : NULL;
             $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : NULL;
             $grado = new Grado();
             $grado->setIdGrado($idGrado);
             $grado->setNombre($nombre);
             $grado->crearGrado($grado);
             echo json_encode(1);
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }

        public function gestionarPensum(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Gestión de Pensum');
            $grado = new Grado();
            $grados = $grado->leerGrados();
            $this->vista->set('grados', $grados);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        public function imprimirMateriasPorSalon(){
            $materia = new Materia();
            $materias = $materia->leerMateriasPorSalon($idSalon);
        }
        
        
        public function gestionarDocentes(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Gestión de Docentes');
            $persona = new Persona();
            $docentes = $persona->leerDocentes();
            $this->vista->set('docentes', $docentes);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
        public function agregarDocente(){
            try {
             $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
             $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : NULL;
             $pApellido = isset($_POST['pApellido']) ? $_POST['pApellido'] : NULL;
             $sApellido = isset($_POST['sApellido']) ? $_POST['sApellido'] : NULL;
             $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : NULL;
             $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
             $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : NULL;
             $correo = isset($_POST['correo']) ? $_POST['correo'] : NULL;
             $fNacimiento = isset($_POST['fNacimiento']) ? $_POST['fNacimiento'] : NULL;
             $estado='1';
             $persona = new Persona();
             $persona->setIdPersona($idPersona);
             $persona->setNombres($nombres);
             $persona->setPApellido($pApellido);
             $persona->setSApellido($sApellido);
             $persona->setSexo($sexo);
             $persona->setTelefono($telefono);
             $persona->setDireccion($direccion);
             $persona->setCorreo($correo);
             $persona->setFNacimiento($fNacimiento);
             $persona->setEstado($estado);
             $persona->crearPersona($persona);
             echo json_encode(1);
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
        
    
}

?>
