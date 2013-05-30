<?php


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
        /**
         * Imprime La Vista de Gestión de Materias
         * @return type
         */
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
        /**
         * Función Llamada Por Json Desde El formulario para Agregar Materia
         */
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
        /**
         * Imprime La Vista de Gestión de Grados
         * @return type
         */
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
        /**
         * Función Llamada Por Json Desde El formulario para Agregar Grado
         */
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
        /**
         * Imprime La Vista de Gestión de Salones
         * @return type
         */
        public function gestionarSalones(){
        try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Gestión De Salones');
            $salon = new Salon();
            $salones = $salon->leerSalones();
            $this->vista->set('salones', $salones);
            $grado = new Grado();
            $grados = $grado->leerGrados();
            $this->vista->set('grados', $grados);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        /**
         * Función Llamada Por Json Desde El formulario para Agregar Salón (Aula de Clases)
         */
        public function agregarSalon(){
            try {
             
             $idGrado = isset($_POST['idGrado']) ? $_POST['idGrado'] : NULL;
             $grupo = isset($_POST['grupo']) ? $_POST['grupo'] : NULL;
             $idSalon = $idGrado."-".$grupo;
             $salon = new Salon();
             $salon->setIdSalon($idSalon);
             $salon->setIdGrado($idGrado);
             $salon->setGrupo($grupo);
            $salon->crearSalon($salon);
             echo json_encode(1);
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
        /**
         * Imprime La Vista de Gestión de Pensum
         * @return type
         */
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
        /**
         * Función Llamada Por Json Desde El formulario para Agregar Materias de acuerdo a un grado.. 
         * si recibe table, llena una tabla; y si recibe select llena, un select
         * @param type $html
         */
        public function imprimirMateriasPorGrado($html){
            $idGrado = isset($_POST['idGrado']) ? $_POST['idGrado'] : NULL;
            $materia = new Materia();
            $materias = $materia->leerMateriasPorGrado($idGrado);
            $respuesta = "";
            if ($html == 'table'){
            foreach ($materias as $materia) {
            $respuesta .= "<tr>";
             $respuesta.= '<td>'. strtoupper($materia->getIdMateria()).'</td>';
             $respuesta.= '<td>'. strtoupper($materia->getNombreMateria()).'</td>';
             $respuesta.= '<td>'. strtoupper($materia->getHoras()).'</td>';
            $respuesta .= "</tr>";
            }
        }elseif ($html=='select') {
            
            foreach ($materias as $materia) {
            
             $respuesta.= '<option value="'.$materia->getIdMateria().'">'. strtoupper($materia->getNombreMateria()).'</option>';
          
            }
        }
            
            echo json_encode($respuesta);
        }
        /**
         * Función Llamada Por Json Desde El formulario para Listar Las materias Que no estan Asignadas a un Grado
         */
        public function listaMateriasNoPertenecientes(){
            $idGrado = isset($_POST['idGrado']) ? $_POST['idGrado'] : NULL;
            $materia = new Materia();
            $materias1 = $materia->leerMaterias();
            $materias2 = $materia->leerMateriasPorGrado($idGrado);
            $respuesta = "";
            foreach ($materias1 as $materia1) {
                $band= 0;
                  foreach ($materias2 as $materia2) {
                      if ($materia1->getIdMateria() == $materia2->getIdMateria()){
                        $band=1;  
                      }
                  }
                if ($band == 0 ){
                    $respuesta.= '<option value="'.$materia1->getIdMateria().'">'. strtoupper($materia1->getNombreMateria()).'</option>';
                }
                
            }
            echo json_encode($respuesta);   
        }
        /**
         * Función Llamada Por Json Desde El formulario para Agregar Pensum
         */
        public function agregarPensum(){
            try {
             
             $idGrado = isset($_POST['idGrado']) ? $_POST['idGrado'] : NULL;
             $materias = isset($_POST['materias']) ? $_POST['materias'] : NULL;
             
             $arreglo = array();
             $arreglo = explode(',', $materias);
             $pensum = new Materia();
             
             for ($i=0; $i<count($arreglo); $i++){
                 $pensum->crearPensum($idGrado, $arreglo[$i]);
             }
             
             echo json_encode("Pensum Agregado Correctamente");
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
        
        /**
         * Imprime La Vista de Gestión de Docentes
         * @return type
         */
        public function gestionarDocentes(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Gestión de Docentes');
            $idRol='D';
            $persona = new Persona();
            $docentes = $persona->leerPorRol($idRol);
            $this->vista->set('docentes', $docentes);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        /**
         * Función Llamada Por Json Desde El formulario para Agregar Docente
         */
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
             $idRol= 'D';
             $persona = new Persona();
             $usuario = new Usuario();
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
             $persona->setIdRol($idRol);
             $usuario->setIdPersona($idPersona);
             $usuario->setUsuario($idPersona);
             $usuario->setContraseña($idPersona);
             $persona->crearPersona($persona);
            $usuario->crearUsuario($usuario);
             echo json_encode(1);
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
        /**
         * Imprime La Vista de Gestión de Cargas de Docentes
         * @return type
         */
        public function gestionarCargas(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Gestión de Cargas Acedemicas');
            $idRol='D';
            $persona = new Persona();
            $docentes = $persona->leerPorRol($idRol);
            $this->vista->set('docentes', $docentes);
            $salon = new Salon();
            $salones = $salon->leerSalones();
            $this->vista->set('salones', $salones);  
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        /**
         * Función Llamada Por Json Desde El formulario para Imprimir las CArgas de Un Docente (en una Tabla)
         */
        public function imprimirCarga(){
            $idPersona = isset($_POST['idDocente']) ? $_POST['idDocente'] : NULL;
            $carga = new Carga();
            $cargas = $carga->leerCargasPorDocente($idPersona);
            $respuesta = "";
            $idCarga = "";
                  foreach ($cargas as $carg) {
                      $respuesta .= "<tr>";
                      $idCarga =$carg->getIdCarga();
                      $respuesta.= '<td>'. strtoupper($carg->getIdSalon()).'</td>';
                      $materia=new Materia();
                      $materias = $materia->leerMateriaPorId($carg->getIdGrado());
                         foreach ($materias as $mat) {
                              $respuesta.= '<td>'. strtoupper($mat->getNombreMateria()).'</td>';
                         }
                      $respuesta .= "</tr>";
                      $respuesta .= "<input id='idCarga' type='hidden' value='".$idCarga."'/>";
                  }
               
            
            echo json_encode($respuesta);  
            
        }
        /**
         * Función Llamada Por Json Desde El formulario para Agregar Carga
         */
        public function agregarCarga(){
            try {
             
             
             $idSalon =  isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
             $idCarga =  isset($_POST['idCarga']) ? $_POST['idCarga'] : NULL;
             $materias = isset($_POST['materias']) ? $_POST['materias'] : NULL;
             
             $arreglo = array();
             $arreglo = explode(',', $materias);
             
             for ($i=0; $i<count($arreglo); $i++){
                 $carga = new Carga();
                 $carga->setIdCarga($idCarga);
                 $carga->setIdMateria($arreglo[$i]);
                 $carga->setIdSalon($idSalon);
                 $carga->crearCarga($carga);
             }
             
             echo json_encode("Pensum Agregado Correctamente");
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
                
    
}

?>
