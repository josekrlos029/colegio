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
    
//**************************************************************************************************//        
//**********************************INICIO IMPRIMIR VISTAS*********************************************//
//**************************************************************************************************//     
         /**
         * Imprime la Vista principal del Usuario Administrador
         * @return type
         */
        public function usuarioAdministrador(){
        try {
            if($this->verificarSession()){
            $salon = new Salon();
            $salones = $salon->leerSalones();
            $this->vista->set('titulo', 'Usuario Administrador');
            $this->vista->set('salones', $salones);
            $this->vista->set('titulo', 'Usuario Administrador');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
         public function cerrarSesion() {
             parent::cerrarSesion();
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
         * Imprime La Vista de estudinate de preescolar
         * @return type
         */
        public function estudiantesPreescolar(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'estudiantes Preescolar');
            $salon = new Salon();
            $preescolar = $salon->leerSalonesPreescolar();
            $this->vista->set('preescolar', $preescolar);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        /**
         * Imprime La Vista de estudinate de primaria
         * @return type
         */
        public function estudiantesPrimaria(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'estudiantes Primaria');
             $limI='1';
             $limS='5';
            $salones = new Salon();
            $primaria = $salones->leerSalonesJornada($limI,$limS);
            $this->vista->set('primaria', $primaria);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        /**
         * Imprime La Vista de estudinate de secundaria
         * @return type
         */
        public function estudiantesSecundaria(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'estudiantes Secundaria');
             $limI='6';
             $limS='11';
            $salones = new Salon();
            $secundaria = $salones->leerSalonesJornada($limI,$limS);
            $this->vista->set('secundaria', $secundaria);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
        public function consolidadoPreescolar(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'estudiantes Preescolar');
            $salon = new Salon();
            $preescolar = $salon->leerSalonesPreescolar();
            $this->vista->set('preescolar', $preescolar);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
         public function consolidadoPrimaria(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'estudiantes Primaria');
             $limI='1';
             $limS='5';
            $salones = new Salon();
            $primaria = $salones->leerSalonesJornada($limI,$limS);
            $this->vista->set('primaria', $primaria);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
        public function consolidadoSecundaria(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'estudiantes Secundaria');
             $limI='6';
             $limS='11';
            $salones = new Salon();
            $secundaria = $salones->leerSalonesJornada($limI,$limS);
            $this->vista->set('secundaria', $secundaria);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
        public function pensionPreescolar(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'estudiantes Preescolar');
            $salon = new Salon();
            $preescolar = $salon->leerSalonesPreescolar();
            $pago= new Pago();
            $anios  = $pago->leerAnios();
            $this->vista->set('anios', $anios);
            $this->vista->set('preescolar', $preescolar);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
         public function pensionPrimaria(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Estudiantes Primaria');
             $limI='1';
             $limS='5';
            $salones = new Salon();
            $pago= new Pago();
            $anios  = $pago->leerAnios();
            $this->vista->set('anios', $anios);
            $primaria = $salones->leerSalonesJornada($limI,$limS);
            $this->vista->set('primaria', $primaria);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
        public function pensionSecundaria(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Estudiantes Secundaria');
             $limI='6';
             $limS='11';
            $salones = new Salon();
            $pago= new Pago();
            $anios  = $pago->leerAnios();
            $this->vista->set('anios', $anios);
            $secundaria = $salones->leerSalonesJornada($limI,$limS);
            $this->vista->set('secundaria', $secundaria);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
        public function historialPreescolar(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Estudiantes Preescolar');
            $salon = new Salon();
            $preescolar = $salon->leerSalonesPreescolar();
            $historial = new Historial();
            $anios  = $historial->leerAnios();
            $this->vista->set('anios', $anios);
            $this->vista->set('preescolar', $preescolar);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
         public function historialPrimaria(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Estudiantes Primaria');
             $limI='1';
             $limS='5';
            $salones = new Salon();
            $historial = new Historial();
            $anios  = $historial->leerAnios();
            $this->vista->set('anios', $anios);
            $primaria = $salones->leerSalonesJornada($limI,$limS);
            $this->vista->set('primaria', $primaria);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
        public function historialSecundaria(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Estudiantes Secundaria');
             $limI='6';
             $limS='11';
            $salones = new Salon();
            $historial = new Historial();
            $anios  = $historial->leerAnios();
            $this->vista->set('anios', $anios);
            $secundaria = $salones->leerSalonesJornada($limI,$limS);
            $this->vista->set('secundaria', $secundaria);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
        public function generarConsolidado(){
            try {
            $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
            $periodo = isset($_POST['periodo']) ? $_POST['periodo'] : NULL;
            $pensum = new Pensum();
            $pens = $pensum->leerPensum($idSalon);
            //__________________________-
            $salon = new Salon();
                $sal = $salon->leerSalonePorId($idSalon);
            $grado = new Grado();
                $grad = $grado->leerGradoPorId($sal->getIdGrado());
            $vec = array();
                if ($grad->getIdGrado() == 'p1' || $grad->getIdGrado() == 'p2' || $grad->getIdGrado() == 'p3'){
                    $seccion = 'PREESCOLAR';
                    $vec=["PMAT","PLEC","ING","PCN","PCS","ER","EV","ART","EF","COM"];
                }else if ($grad->getIdGrado() == '1' || $grad->getIdGrado() == '2' || $grad->getIdGrado() == '3' || $grad->getIdGrado() == '4' || $grad->getIdGrado() == '5'){
                    $seccion = 'BASICA PRIMARIA';
                    $vec=["MAT","ING","LC","CN","CS","ER","INF","EF","ART","EV","COM"];
                }else if ($grad->getIdGrado() == '6' || $grad->getIdGrado() == '7' || $grad->getIdGrado() == '8' || $grad->getIdGrado() == '9' || $grad->getIdGrado() == '10' || $grad->getIdGrado() == '11'){
                    $seccion = 'BASICA SECUNDARIA';
                    if ($grad->getIdGrado() == '6' || $grad->getIdGrado() == '7' || $grad->getIdGrado() == '8'){
                        $vec=["AYG","EST","ING","LC","CN","GEO","HIS","CONS","ER","INF","EF","ART","EV","COM"];
                    }else if ($grad->getIdGrado() == '9'){
                        $vec=["ALYG","EST","ING","LC","CN","GEO","HIS","CONS","ER","INF","EF","ART","EV","COM"];
                    }else if ($grad->getIdGrado() == '10'){
                        $vec=["TRI","EST","ING","LC","QUI","FIS","FIL","CS","ER","INF","EF","ART","EV","COM"];
                    }else if ($grad->getIdGrado() == '11'){
                        $vec=["CALC","EST","ING","LC","QUI","FIS","FIL","CS","ER","INF","EF","ART","EV","COM"];
                    }
                }            
                
             $this->vista->set('idSalon', $idSalon);
             $this->vista->set('periodo', $periodo);
             $this->vista->set('pens', $pens);
             $this->vista->set('sal', $sal);
             $this->vista->set('grad', $grad);
             $this->vista->set('vec', $vec);
             $this->vista->set('seccion', $vec);
            return $this->vista->imprimir();   
             } catch (Exception $exc) {
           $this->setVista('mensaje');
           $msj= "Error en la aplicación.. Coloquese en contacto con el Desarrollador";
           $this->vista->set('msj', $msj);
           return $this->vista->imprimir();
        }    
            
        }
        
        public function imprimirConsolidado(){
            try {
            $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
            $periodo = isset($_POST['periodo']) ? $_POST['periodo'] : NULL;
            $cfg = Configuracion::getConfiguracion('colegio');
            $colegio= $cfg['NOMBRE'];
            $reporte = new Reportes();
            if ($colegio=="galois"){
                $reporte->consolidadoGalois($idSalon, $periodo);
            }elseif ($colegio=="santaTeresita"){
                
            }
            
             } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }    
            
        }
        
        public function imprimirHistorialSalon($param){
            try {
            $vec = explode(",", $param);    
            $idSalon = $vec[1];
            $anio = $vec[0];
    
            $cfg = Configuracion::getConfiguracion('colegio');
            $colegio= $cfg['NOMBRE'];
            $reporte = new Reportes();
            if ($colegio=="galois"){
                $reporte->consolidadoHistorialGalois($idSalon, $anio);
            }elseif ($colegio=="santaTeresita"){
                
            }
            
             } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }    
            
        }
        
        public function imprimirHistorialSalonIndividual($param){
            try {
            $vec = explode(",", $param);    
            $idSalon = $vec[1];
            $anio = $vec[0];
    
            $cfg = Configuracion::getConfiguracion('colegio');
            $colegio= $cfg['NOMBRE'];
            $reporte = new Reportes();
            if ($colegio=="galois"){
                $reporte->consolidadoHistorialIndividualGalois($idSalon, $anio);
            }elseif ($colegio=="santaTeresita"){
                
            }
            
             } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }    
            
        }
        
        public function generarPension(){
            try {
            $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
            $anio = isset($_POST['anio']) ? $_POST['anio'] : NULL;
            
            $persona = new Persona();
            $personas = $persona->leerPorSalonYAnio($idSalon,$anio);
            $pagos = ['MATRICULA','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','VR.PENSION'];
            $this->vista->set('idSalon', $idSalon);
            $this->vista->set('anio', $anio);
            $this->vista->set('personas', $personas);
            $this->vista->set('pagos', $pagos);
            return $this->vista->imprimir();
            
             } catch (Exception $exc) {
                 $this->setVista('mensaje');
                $msj= "Error en la aplicación.. Coloquese en contacto con el Desarrollador";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
            }    
            
        }
        
        public function generarHistorial(){
            try {
            $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
            $anio = isset($_POST['anio']) ? $_POST['anio'] : NULL;
            $matricula = new Matricula();
            $matriculas = $matricula->leerMatriculasPorAnio($anio, $idSalon);            
            $this->vista->set('matriculas', $matriculas);
            $this->vista->set('anio', $anio);
            $this->vista->set('idSalon', $idSalon);
                return $this->vista->imprimir();
            
            
             } catch (Exception $exc) {
             $this->setVista('mensaje');
                $msj= "Error en la aplicación.. Coloquese en contacto con el Desarrollador";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
        }    
            
        }
        
        public function historialEstudiante(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Historial del Estudiante');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
        public function consultaHistorialEstudiante(){
            try {
            $idPersona =  isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            
            $persona = new Persona();
            $estudiante = $persona->leerPorId($idPersona);
            if ($estudiante == NULL){
                 $this->setVista('mensaje');
                      $msj= "El Número de Documento no existe en el sistema";
                      $this->vista->set('msj', $msj);
            }else{
                $rol = new Rol();
                $roles = $rol->leerRoles($idPersona);
                $band = 0;
                foreach ($roles  as $ro) {
                  if ($ro->getIdRol() == 'E'){
                      $band=1;
                  } 
                }
                    if ($band!=1){
                      $this->setVista('mensaje');
                      $msj= "El Número de Documento ingresado no corresponde al de un estudiante";
                      $this->vista->set('msj', $msj);
                    }else{
                   $historial = new Historial();
                   $anios = $historial->leerAniosEstudiante($idPersona);
                   $this->vista->set('anios', $anios);
                   $this->vista->set('idPersona', $idPersona);
                  }
              
              }
            return $this->vista->imprimir();
    } catch (Exception $exc) {
            $this->setVista('mensaje');
                 $msj ="ERROR... La consulta no se pudo ejecutar.. !";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
        }    
        }
        
         /**
         * Imprime estudiantes por salones
         * @return type
         */
        public function estudiantesSalones(){
            try {
            $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
            $persona = new Persona();
            $estudiante = $persona->leerPorSalon($idSalon);
            $this->vista->set('idSalon', $idSalon);
            $this->vista->set('estudiante', $estudiante);
            return $this->vista->imprimir();
             } catch (Exception $exc) {
                $this->setVista('mensaje');
                $msj= "Error en la aplicación.. Coloquese en contacto con el Desarrollador";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
        }   
        }
        
        public function inhabilitarPersona(){
            try {
            $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $persona = new Persona();
            $persona->inhabilitarPersona($idPersona);
            echo json_encode(1);
            } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
            
        }
        public function habilitarPersona(){
            try {
            $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $persona = new Persona();
            $persona->habilitarPersona($idPersona);
            echo json_encode(1);
            } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
            
        }
          /**
         * Imprime estudiantes por salones Inhabilitados
         * @return type
         */
        public function estudiantesSalonesInhabilitados(){
            try {
            $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
            $persona = new Persona();
            $estudiante = $persona->leerPorSalonInhabilitado($idSalon);
            $this->setVista('estudiantesSalones');
            $this->vista->set('idSalon', $idSalon);
            $this->vista->set('estudiante', $estudiante);
            return $this->vista->imprimir();           
             } catch (Exception $exc) {
                 $this->setVista('mensaje');
                $msj= "Error en la aplicación.. Coloquese en contacto con el Desarrollador";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
        }    
            
        }
            /**
         * Imprime La Vista de docentes de preescolar
         * @return type
         */
        public function docentesPreescolar(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'estudiantes Preescolar');
            $salon = new Salon();
            $preescolar = $salon->leerSalonesPreescolar();
            $this->vista->set('preescolar', $preescolar);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        /**
         * Imprime La Vista de docentes de primaria
         * @return type
         */
        public function docentesPrimaria(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'docentes Primaria');
             $limI='1';
             $limS='5';
            $salones = new Salon();
            $primaria = $salones->leerSalonesJornada($limI,$limS);
            $this->vista->set('primaria', $primaria);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        /**
         * Imprime La Vista de docenters de secundaria
         * @return type
         */
        public function docentesSecundaria(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'docentes Secundaria');
             $limI='6';
             $limS='11';
            $salones = new Salon();
            $secundaria = $salones->leerSalonesJornada($limI,$limS);
            $this->vista->set('secundaria', $secundaria);
            return $this->vista->imprimir();
              }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
         public function docentesSalones(){
            try {
            $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
            $persona = new Persona();
            $docente = $persona->leerPorSalonDocente($idSalon);
            $this->setVista('estudiantesSalones');
            $this->vista->set('idSalon', $idSalon);
            $this->vista->set('estudiante', $docente);
            return $this->vista->imprimir();           
             } catch (Exception $exc) {
                 $this->setVista('mensaje');
                $msj= "Error en la aplicación.. Coloquese en contacto con el Desarrollador";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
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
        
        public function gestionarRoles(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Gestión de Usuarios');
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
    * imprime formulario de matricular estudiante
    * @return type
    */
    
          public function matricularEstudiante($id = null){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Matricular Estudiante');
            $this->vista->set('id', $id);
            $salon= new Salon();
            $salones = $salon->leerSalones();
            $this->vista->set('salones', $salones);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
        public function transferirEstudiante($id = null){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Transferir Estudiante');
            $this->vista->set('id', $id);
            return $this->vista->imprimir();
            }
            } catch (Exception $exc) {
                echo 'Error de aplicacion: ' . $exc->getMessage();
            }
        }
        
        public function personas(){
              try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Personas Registradas');
            $persona = new Persona();
            $personas = $persona->leerPorRol('E');
            $this->vista->set('personas', $personas);
            return $this->vista->imprimir();
            }
            } catch (Exception $exc) {
                echo 'Error de aplicacion: ' . $exc->getMessage();
            }
        }
        
         public function matriculados(){
              try {
            if($this->verificarSession()){
            set_time_limit(90);
            $this->vista->set('titulo', 'Personas Matriculadas');
            $persona = new Persona();
            $personas = $persona->leerMatriculados();
            $this->vista->set('personas', $personas);
            return $this->vista->imprimir();
            }
            } catch (Exception $exc) {
                echo 'Error de aplicacion: ' . $exc->getMessage();
            }
        }
        
        public function pagos(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Registro de Pagos');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
          public function actualizarEstudiante(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Actualizar Estudiante');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
                   
    /**
    * imprime formulario de registro de estudiantes
    * @return type
    */
         public function RegistrarEstudiantes(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Registro de Estudiantes');
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
    * imprime formulario de configuracion de usuario
    * @return type
    */
    
          public function configuracionUsuario(){
          try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'configuracion de Usuario');
            $idPersona = $_SESSION['idUsuario'];
             $pers = new Persona();
             $user = new Usuario();
             $persona = $pers->leerPorId($idPersona);
             $usuario = $user->leerPorId($idPersona);
             $this->vista->set('usuario', $usuario);
             $this->vista->set('persona', $persona);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
         public function cierreAcademico(){
          try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Cierre del Año');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        } 
        
        public function consolidados(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Consolidados');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        public function pensiones(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Pensiones');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
        public function historialGeneral(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Historial Anual General');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
        
        public function retirarEstudiante(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Retirar Estudiante');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }

        public function notificaciones(){
            try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Difundir Mensaje');
            $notificacion = new Notificacion();
            $noti = $notificacion->leerNotificaciones();
             $this->vista->set('noti', $noti);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
        }
        
        public function registrarNotificacion(){
            try {
            $asunto = isset($_POST['asunto']) ? $_POST['asunto'] : NULL;
             $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : NULL;
             $fecha_evento = isset($_POST['fecha']) ? $_POST['fecha'] : NULL;
             $hora = isset($_POST['hora']) ? $_POST['hora'] : NULL;
             $destino = isset($_POST['destino']) ? $_POST['destino'] : NULL;
             
            $fecha = getdate();
             $fecha_ingreso=$fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];

             $notificacion = new Notificacion();
             $notificacion->setAsunto($asunto);
             $notificacion->setMensaje($mensaje);
             $notificacion->setFecha_ingreso($fecha_ingreso);
             $notificacion->setFecha_evento($fecha_evento);
             $notificacion->setHora($hora);
             $notificacion->setDestino($destino);
            $notificacion->crearNotificacion($notificacion);
            
           
             echo json_encode(1);
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
        
        public function  consultaNotificacion(){
             try{
           $id = isset($_POST['id']) ? $_POST['id'] : NULL;  
           
           $notificacion = new Notificacion();
           $not = $notificacion->leerPorId($id);
         
             if( $not->getDestino()== 1){
                    $destino= "ESTUDIANTES Y ACUDIENTES";
                    }
                    if($not->getDestino() == 2){
                    $destino = "DOCENTES";
                    }
                    if($not->getDestino()== 3){
                    $destino = "ESTUDIANTE Y DOCENTES";
                    }
                 $this->vista->set('not', $not);
                 $this->vista->set('destino', $destino);
                return $this->vista->imprimir();
           
           } catch (Exception $exc) {
            $this->setVista('mensaje');
                $msj= "Error en la aplicación.. Coloquese en contacto con el Desarrollador";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
        }    
        }
        
        public function  eliminarNotificacion(){
             try{
           $id = isset($_POST['id']) ? $_POST['id'] : NULL;  
           
           $notificacion = new Notificacion();
           $notificacion->eliminar($id);
         
            echo json_encode(1);
            
           } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
         






//**************************************************************************************************//        
//**********************************FIN IMPRIMIR VISTAS*********************************************//
//**************************************************************************************************//        
        
  
 //**************************************************************************************************//        
//**********************************INICIO DE METODOS*********************************************//
//**************************************************************************************************//         
        
        
        
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
         * Función Llamada Por Json Desde El formulario para Agregar Materias de acuerdo a un grado.. 
         * si recibe table, llena una tabla; y si recibe select llena, un select
         * @param type $html
         */
        public function imprimirMateriasPorGrado($html){
            try {
            $idGrado = isset($_POST['idGrado']) ? $_POST['idGrado'] : NULL;
            $materia = new Materia();
            $materias = $materia->leerMateriasPorGrado($idGrado);
            $this->vista->set('materias', $materias);
            $this->vista->set('html', $html);
            return $this->vista->imprimir();
            
            } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
        /**
         * Función Llamada Por Json Desde El formulario para Listar Las materias Que no estan Asignadas a un Grado
         */
        public function listaMateriasNoPertenecientes(){
            try {
            $idGrado = isset($_POST['idGrado']) ? $_POST['idGrado'] : NULL;
            $materia = new Materia();
            $materias1 = $materia->leerMaterias();
            $materias2 = $materia->leerMateriasPorGrado($idGrado);
            
            $this->vista->set('materias1', $materias1);
            $this->vista->set('materias2', $materias2);
            return $this->vista->imprimir();
                        
 } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
        /**
         * Función Llamada Por Json Desde El formulario para Agregar Pensum
         */
        public function agregarPensum(){
            try {
             
             $idGrado = isset($_POST['idGrado']) ? $_POST['idGrado'] : NULL;
             $materias = isset($_POST['materias']) ? $_POST['materias'] : NULL;
             
             $salon = new Salon();
             $salones = $salon->leerSalonePorIdGrado($idGrado);
             $arreglo = array();
             $arreglo = explode(',', $materias);
             $pensum = new Materia();
             
             foreach ($salones as $sal) {
                 $persona = new Persona();
                 $personas = $persona->leerPorSalon($sal->getIdSalon());
                 
                 foreach ($personas as $p) {
                     
                   for ($i=0; $i<count($arreglo); $i++){
                    
                       $nota = new Nota();
                       $nota->crearNota($p->getIdPersona(), $arreglo[$i]);
                       
                    }     
                     
                 }
                 
             }
             
             
             
             for ($i=0; $i<count($arreglo); $i++){
                 $pensum->crearPensum($idGrado, $arreglo[$i]);
             }
             
             echo json_encode("Pensum Agregado Correctamente");
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
        
        public function eliminarPensum(){
            try {
             
             $idGrado = isset($_POST['idGrado']) ? $_POST['idGrado'] : NULL;
             $idMateria = isset($_POST['idMateria']) ? $_POST['idMateria'] : NULL;
             
             $salon = new Salon();
             $salones = $salon->leerSalonePorIdGrado($idGrado);
             $pensum = new Materia();
             foreach ($salones as $sal) {
                 $persona = new Persona();
                 $personas = $persona->leerPorSalon($sal->getIdSalon());
                 
                 foreach ($personas as $p) {
                                         
                       $nota = new Nota();
                       $nota->eliminarNota($p->getIdPersona(), $idMateria);
                        
                 }
                 
             }
             
                 $pensum->eliminarPensum($idGrado, $idMateria);
             
             echo json_encode("Pensum Eliminado Correctamente");
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
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
             $persona = new Estudiante();
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
             $persona->crearPersona($persona);
             $persona->crearDatos($persona);
             $persona->crearDatosNacimiento($persona);
             $persona->crearDatosUbicacion($persona);
             
             echo json_encode(1);
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
        
        /**
         * Función Llamada Por Json Desde El formulario para Imprimir las CArgas de Un Docente (en una Tabla)
         */
        public function imprimirCarga(){
            try {
            
            $idPersona = isset($_POST['idDocente']) ? $_POST['idDocente'] : NULL;
            $carga = new Carga();
            $cargas = $carga->leerCargasPorDocente($idPersona);
            
            $this->vista->set('cargas', $cargas);
            $this->vista->set('idPersona', $idPersona);
            return $this->vista->imprimir();
             } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
            
        }
        
        public function imprimirUsuarios(){
            try {
            
            $idPersona = isset($_POST['idDocente']) ? $_POST['idDocente'] : NULL;
            $rol = new Rol();
            $roles = $rol->leerRoles($idPersona);
            $this->vista->set('roles', $roles);
            return $this->vista->imprimir();
           
             } catch (Exception $exc) {
                 $this->setVista('mensaje');
                $this->vista->set('msj', "Error Al Cargar Roles");
                return $this->vista->imprimir();
        }    
            
        }


        /**
         * Función Llamada Por Json Desde El formulario para Agregar Carga
         */
        public function agregarCarga(){
            try {
             
             
             $idSalon =  isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
             $idPersona =  isset($_POST['idDocente']) ? $_POST['idDocente'] : NULL;
             $materias = isset($_POST['materias']) ? $_POST['materias'] : NULL;
             
             $arreglo = array();
             $arreglo = explode(',', $materias);
             
             $c = new Carga();
            
             
             for ($i=0; $i<count($arreglo); $i++){
                 $carga = new Carga();
                 $resultado = $carga->verificarCarga($idSalon, $arreglo[$i]);
                 if (count($resultado)==0){
                 $carga->setIdPersona($idPersona);
                 $carga->setIdMateria($arreglo[$i]);
                 $carga->setIdSalon($idSalon);
                 $carga->crearCarga($carga);
                 }
                
             }
             
             echo json_encode("Carga Agregada Correctamente");
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
        
        public function agregarRol(){
            try {
             
             
             $idRol =  isset($_POST['idRol']) ? $_POST['idRol'] : NULL;
             $idPersona =  isset($_POST['idDocente']) ? $_POST['idDocente'] : NULL;
             $persona = new Persona();
             $persona->asignarRol2($idPersona, $idRol);
             echo json_encode("Usuario Agregado Correctamente");
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
        
 public function eliminarCarga(){
            try {
             
             $idSalon =  isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
             $idMateria = isset($_POST['idMateria']) ? $_POST['idMateria'] : NULL;
             echo json_encode($idSalon);
             $c = new Carga();
             $c->eliminarCarga($idSalon, $idMateria);
             echo json_encode(1);
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
        }
        
    
        /**
         * guarda los datos que vienen del formulario Registrar Estudiantes
         */
        public function guardarEstudiantes(){
           
            $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
           
             //datos personales
             $tipoDocumento = isset($_POST['tipoDocumento']) ? $_POST['tipoDocumento'] : NULL;
             $lugarExpedicion = isset($_POST['lugarExpedicion']) ? $_POST['lugarExpedicion'] : NULL;
             $fechaExpedicion = isset($_POST['fechaExpedicion']) ? $_POST['fechaExpedicion'] : NULL;
             $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : NULL;
             $pApellido = isset($_POST['pApellido']) ? $_POST['pApellido'] : NULL;
             $sApellido = isset($_POST['sApellido']) ? $_POST['sApellido'] : NULL;
             $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : NULL;
             $tipoSanguineo = isset($_POST['tipoSanguineo']) ? $_POST['tipoSanguineo'] : NULL;
             $eps = isset($_POST['eps']) ? $_POST['eps'] : NULL;
             $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
             $correo = isset($_POST['correo']) ? $_POST['correo'] : NULL;
             $instProcedencia = isset($_POST['instProcedencia']) ? $_POST['instProcedencia'] : NULL;
             /***fin de datos Personales**/
             
             // datos de nacimiento
            $fNacimiento = isset($_POST['fNacimiento']) ? $_POST['fNacimiento'] : NULL;
             $paisNacimiento = isset($_POST['paisNacimiento']) ? $_POST['paisNacimiento'] : NULL;
             $departamentoNacimiento = isset($_POST['departamentoNacimiento']) ? $_POST['departamentoNacimiento'] : NULL;
             $municipioNacimiento = isset($_POST['municipioNacimiento']) ? $_POST['municipioNacimiento'] : NULL;
             //fin de datos de nacimiento
             
             // datos de ubicacion
             $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : NULL;
             $barrio = isset($_POST['barrio']) ? $_POST['barrio'] : NULL;
             $municipioResidencia = isset($_POST['municipioResidencia']) ? $_POST['municipioResidencia'] : NULL;
             // fin de datos de ubicacion
             
             // datos del padre
             $idPadre = isset($_POST['idPadre']) ? $_POST['idPadre'] : NULL;
             $nombresPadre = isset($_POST['nombresPadre']) ? $_POST['nombresPadre'] : NULL;
             $apellidosPadre = isset($_POST['apellidosPadre']) ? $_POST['apellidosPadre'] : NULL;
             $ocupacionPadre = isset($_POST['ocupacionPadre']) ? $_POST['ocupacionPadre'] : NULL;
             $telPadre = isset($_POST['telPadre']) ? $_POST['telPadre'] : NULL;
             $telOficinaPadre = isset($_POST['telOficinaPadre']) ? $_POST['telOficinaPadre'] : NULL;
             $dirPadre = isset($_POST['dirPadre']) ? $_POST['dirPadre'] : NULL;
             
             //datos de la madre
             $idMadre = isset($_POST['idMadre']) ? $_POST['idMadre'] : NULL;
             $nombresMadre = isset($_POST['nombresMadre']) ? $_POST['nombresMadre'] : NULL;
             $apellidosMadre = isset($_POST['apellidosMadre']) ? $_POST['apellidosMadre'] : NULL;
             $ocupacionMadre = isset($_POST['ocupacionMadre']) ? $_POST['ocupacionMadre'] : NULL;
             $telMadre = isset($_POST['telMadre']) ? $_POST['telMadre'] : NULL;
             $telOficinaMadre = isset($_POST['telOficinaMadre']) ? $_POST['telOficinaMadre'] : NULL;
             $dirMadre = isset($_POST['dirMadre']) ? $_POST['dirMadre'] : NULL;
             
             //datps de el acudiente
             $idAcudiente = isset($_POST['idAcudiente']) ? $_POST['idAcudiente'] : NULL;
             $nombresAcudiente = isset($_POST['nombresAcudiente']) ? $_POST['nombresAcudiente'] : NULL;
             $apellidosAcudiente = isset($_POST['apellidosAcudiente']) ? $_POST['apellidosAcudiente'] : NULL;
             $ocupacionAcudiente = isset($_POST['ocupacionAcudiente']) ? $_POST['ocupacionAcudiente'] : NULL;
             $telAcudiente = isset($_POST['telAcudiente']) ? $_POST['telAcudiente'] : NULL;
             $telOficinaAcudiente = isset($_POST['telOficinaAcudiente']) ? $_POST['telOficinaAcudiente'] : NULL;
             $dirAcudiente = isset($_POST['dirAcudiente']) ? $_POST['dirAcudiente'] : NULL;
             
             $estado='0';
             $idRol= 'E';
         
            
            
              try {
                     
             $estudiante = new Estudiante();
             
             $persona = $estudiante->leerPorId($idPersona);
             if($persona != NULL){
                 echo json_encode(2);
             }else{
                 
             $estudiante->setIdPersona($idPersona);
             $estudiante->setTipoDocumento($tipoDocumento);
             $estudiante->setLugarExpedicion($lugarExpedicion);
             $estudiante->setFechaExpedicion($fechaExpedicion);
             $estudiante->setNombres($nombres);
             $estudiante->setPApellido($pApellido);
             $estudiante->setSApellido($sApellido);
             $estudiante->setSexo($sexo);
             $estudiante->setTipoSanguineo($tipoSanguineo);
             $estudiante->setEps($eps);
             $estudiante->setTelefono($telefono);
             $estudiante->setCorreo($correo);
             $estudiante->setInstProcedencia($instProcedencia);
             
             $estudiante->setFNacimiento($fNacimiento);
             $estudiante->setPaisNacimiento($paisNacimiento);
             $estudiante->setDepartamentoNacimiento($departamentoNacimiento);
             $estudiante->setMunicipioNacimiento($municipioNacimiento);
             
             $estudiante->setDireccion($direccion);
             $estudiante->setBarrio($barrio);
             $estudiante->setMunicipioResidencia($municipioResidencia);
             
             $estudiante->setIdPadre($idPadre);
             $estudiante->setNombresPadre($nombresPadre);
             $estudiante->setApellidosPadre($apellidosPadre);
             $estudiante->setOcupacionPadre($ocupacionPadre);
             $estudiante->setTelPadre($telPadre);
             $estudiante->setTelOficinaPadre($telOficinaPadre);
             $estudiante->setDirPadre($dirPadre);
             
             $estudiante->setIdMadre($idMadre);
             $estudiante->setNombresMadre($nombresMadre);
             $estudiante->setApellidosMadre($apellidosMadre);
             $estudiante->setOcupacionMadre($ocupacionMadre);
             $estudiante->setTelMadre($telMadre);
             $estudiante->setTelOficinaMadre($telOficinaMadre);
             $estudiante->setDirMadre($dirMadre);
             
             $estudiante->setIdAcudiente($idAcudiente);
             $estudiante->setNombresAcudiente($nombresAcudiente);
             $estudiante->setApellidosAcudiente($apellidosAcudiente);
             $estudiante->setOcupacionAcudiente($ocupacionAcudiente);
             $estudiante->setTelAcudiente($telAcudiente);
             $estudiante->setTelOficinaAcudiente($telOficinaAcudiente);
             $estudiante->setDirAcudiente($dirAcudiente);
             
             $estudiante->setEstado($estado);
             $estudiante->setIdRol($idRol);
             
             $estudiante->crearPersona($estudiante);
             $estudiante->crearDatos($estudiante);
             $estudiante->crearDatosNacimiento($estudiante);
             $estudiante->crearDatosUbicacion($estudiante);
             
             if($idPadre !=NULL){
                 if ($estudiante->verificarPadre($idPadre) == NULL){
                    $estudiante->crearDatosPadre($estudiante);  
                 }
                 $estudiante->estudiantePadre($estudiante);
             }
             
             if($idMadre !=NULL){
             if ($estudiante->verificarMadre($idMadre) == NULL){
               $estudiante->crearDatosMadre($estudiante);
             }
             $estudiante->estudianteMadre($estudiante);
             }
             
             if($idAcudiente !=NULL){
             if ($estudiante->verificarAcudiente($idAcudiente) == NULL){
               $estudiante->crearDatosAcudiente($estudiante);
               //$estudiante->CrearRolAcudiente($estudiante);
             }
             $estudiante->estudianteAcudiente($estudiante);
             }
            
              echo json_encode(1);
             
             }
             
             
        } catch (Exception $exc) {
            $estudiante2 = new Estudiante();
            $estudiante2->eliminarPersona($idPersona);
            $estudiante2->eliminarUsuario($idPersona);
            $estudiante2->eliminarDatos($idPersona);
            $estudiante2->eliminarDatosNacimiento($idPersona);
            $estudiante2->eliminarDatosUbicacion($idPersona);
            $estudiante2->eliminarEstudiantePadre($idPersona,$idPadre);
            $estudiante2->eliminarEstudianteMadre($idPersona,$idMadre);
            $estudiante2->eliminarEstudianteAcudiente($idPersona,$idAcudiente);
            
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }     
        }
        
        public function registrarYGuardarEstudiantes(){
           
            $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
           
             //datos personales
             $tipoDocumento = isset($_POST['tipoDocumento']) ? $_POST['tipoDocumento'] : NULL;
             $lugarExpedicion = isset($_POST['lugarExpedicion']) ? $_POST['lugarExpedicion'] : NULL;
             $fechaExpedicion = isset($_POST['fechaExpedicion']) ? $_POST['fechaExpedicion'] : NULL;
             $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : NULL;
             $pApellido = isset($_POST['pApellido']) ? $_POST['pApellido'] : NULL;
             $sApellido = isset($_POST['sApellido']) ? $_POST['sApellido'] : NULL;
             $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : NULL;
             $tipoSanguineo = isset($_POST['tipoSanguineo']) ? $_POST['tipoSanguineo'] : NULL;
             $eps = isset($_POST['eps']) ? $_POST['eps'] : NULL;
             $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
             $correo = isset($_POST['correo']) ? $_POST['correo'] : NULL;
             $instProcedencia = isset($_POST['instProcedencia']) ? $_POST['instProcedencia'] : NULL;
             /***fin de datos Personales**/
             
             // datos de nacimiento
            $fNacimiento = isset($_POST['fNacimiento']) ? $_POST['fNacimiento'] : NULL;
             $paisNacimiento = isset($_POST['paisNacimiento']) ? $_POST['paisNacimiento'] : NULL;
             $departamentoNacimiento = isset($_POST['departamentoNacimiento']) ? $_POST['departamentoNacimiento'] : NULL;
             $municipioNacimiento = isset($_POST['municipioNacimiento']) ? $_POST['municipioNacimiento'] : NULL;
             //fin de datos de nacimiento
             
             // datos de ubicacion
             $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : NULL;
             $barrio = isset($_POST['barrio']) ? $_POST['barrio'] : NULL;
             $municipioResidencia = isset($_POST['municipioResidencia']) ? $_POST['municipioResidencia'] : NULL;
             // fin de datos de ubicacion
             
             // datos del padre
             $idPadre = isset($_POST['idPadre']) ? $_POST['idPadre'] : NULL;
             $nombresPadre = isset($_POST['nombresPadre']) ? $_POST['nombresPadre'] : NULL;
             $apellidosPadre = isset($_POST['apellidosPadre']) ? $_POST['apellidosPadre'] : NULL;
             $ocupacionPadre = isset($_POST['ocupacionPadre']) ? $_POST['ocupacionPadre'] : NULL;
             $telPadre = isset($_POST['telPadre']) ? $_POST['telPadre'] : NULL;
             $telOficinaPadre = isset($_POST['telOficinaPadre']) ? $_POST['telOficinaPadre'] : NULL;
             $dirPadre = isset($_POST['dirPadre']) ? $_POST['dirPadre'] : NULL;
             
             //datos de la madre
             $idMadre = isset($_POST['idMadre']) ? $_POST['idMadre'] : NULL;
             $nombresMadre = isset($_POST['nombresMadre']) ? $_POST['nombresMadre'] : NULL;
             $apellidosMadre = isset($_POST['apellidosMadre']) ? $_POST['apellidosMadre'] : NULL;
             $ocupacionMadre = isset($_POST['ocupacionMadre']) ? $_POST['ocupacionMadre'] : NULL;
             $telMadre = isset($_POST['telMadre']) ? $_POST['telMadre'] : NULL;
             $telOficinaMadre = isset($_POST['telOficinaMadre']) ? $_POST['telOficinaMadre'] : NULL;
             $dirMadre = isset($_POST['dirMadre']) ? $_POST['dirMadre'] : NULL;
             
             //datps de el acudiente
             $idAcudiente = isset($_POST['idAcudiente']) ? $_POST['idAcudiente'] : NULL;
             $nombresAcudiente = isset($_POST['nombresAcudiente']) ? $_POST['nombresAcudiente'] : NULL;
             $apellidosAcudiente = isset($_POST['apellidosAcudiente']) ? $_POST['apellidosAcudiente'] : NULL;
             $ocupacionAcudiente = isset($_POST['ocupacionAcudiente']) ? $_POST['ocupacionAcudiente'] : NULL;
             $telAcudiente = isset($_POST['telAcudiente']) ? $_POST['telAcudiente'] : NULL;
             $telOficinaAcudiente = isset($_POST['telOficinaAcudiente']) ? $_POST['telOficinaAcudiente'] : NULL;
             $dirAcudiente = isset($_POST['dirAcudiente']) ? $_POST['dirAcudiente'] : NULL;
             
             
             $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
             $jornada = isset($_POST['jornada']) ? $_POST['jornada'] : NULL;
             $foto = isset($_POST['foto']) ? $_POST['foto'] : NULL;
             
             
             $estado='0';
             $idRol= 'E';

             try {
             
             $estudiante = new Estudiante();
             $persona = $estudiante->leerPorId($idPersona);
             if($persona != NULL){
                 echo json_encode(2);
             }else{
                if($foto!=""){
                $foto = $this->limpia_espacios($foto);
                $contents= file_get_contents($foto);
                $savefile = fopen('utiles/imagenes/fotos/'.$idPersona.'.png', 'w');
                fwrite($savefile,$contents);
                fclose($savefile);           
                }
             $estudiante->setIdPersona($idPersona);
             $estudiante->setTipoDocumento($tipoDocumento);
             $estudiante->setLugarExpedicion($lugarExpedicion);
             $estudiante->setFechaExpedicion($fechaExpedicion);
             $estudiante->setNombres($nombres);
             $estudiante->setPApellido($pApellido);
             $estudiante->setSApellido($sApellido);
             $estudiante->setSexo($sexo);
             $estudiante->setTipoSanguineo($tipoSanguineo);
             $estudiante->setEps($eps);
             $estudiante->setTelefono($telefono);
             $estudiante->setCorreo($correo);
             $estudiante->setInstProcedencia($instProcedencia);
             
             $estudiante->setFNacimiento($fNacimiento);
             $estudiante->setPaisNacimiento($paisNacimiento);
             $estudiante->setDepartamentoNacimiento($departamentoNacimiento);
             $estudiante->setMunicipioNacimiento($municipioNacimiento);
             
             $estudiante->setDireccion($direccion);
             $estudiante->setBarrio($barrio);
             $estudiante->setMunicipioResidencia($municipioResidencia);
             
             $estudiante->setIdPadre($idPadre);
             $estudiante->setNombresPadre($nombresPadre);
             $estudiante->setApellidosPadre($apellidosPadre);
             $estudiante->setOcupacionPadre($ocupacionPadre);
             $estudiante->setTelPadre($telPadre);
             $estudiante->setTelOficinaPadre($telOficinaPadre);
             $estudiante->setDirPadre($dirPadre);
             
             $estudiante->setIdMadre($idMadre);
             $estudiante->setNombresMadre($nombresMadre);
             $estudiante->setApellidosMadre($apellidosMadre);
             $estudiante->setOcupacionMadre($ocupacionMadre);
             $estudiante->setTelMadre($telMadre);
             $estudiante->setTelOficinaMadre($telOficinaMadre);
             $estudiante->setDirMadre($dirMadre);
             
             $estudiante->setIdAcudiente($idAcudiente);
             $estudiante->setNombresAcudiente($nombresAcudiente);
             $estudiante->setApellidosAcudiente($apellidosAcudiente);
             $estudiante->setOcupacionAcudiente($ocupacionAcudiente);
             $estudiante->setTelAcudiente($telAcudiente);
             $estudiante->setTelOficinaAcudiente($telOficinaAcudiente);
             $estudiante->setDirAcudiente($dirAcudiente);
             
             $estudiante->setEstado($estado);
             $estudiante->setIdRol($idRol);
             
             $estudiante->crearPersona($estudiante);
             $estudiante->crearDatos($estudiante);
             $estudiante->crearDatosNacimiento($estudiante);
             $estudiante->crearDatosUbicacion($estudiante);
             
             if($idPadre !=NULL){
                 if ($estudiante->verificarPadre($idPadre) == NULL){
                    $estudiante->crearDatosPadre($estudiante);  
                 }
                 $estudiante->estudiantePadre($estudiante);
             }
             
             if($idMadre !=NULL){
             if ($estudiante->verificarMadre($idMadre) == NULL){
               $estudiante->crearDatosMadre($estudiante);
             }
             $estudiante->estudianteMadre($estudiante);
             }
             
             if($idAcudiente !=NULL){
             if ($estudiante->verificarAcudiente($idAcudiente) == NULL){
               $estudiante->crearDatosAcudiente($estudiante);
               //$estudiante->CrearRolAcudiente($estudiante);
             }
             $estudiante->estudianteAcudiente($estudiante);
             }
             
             //Matricula ¨**
             $fecha = getdate();
             $FechaTxt=$fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];

                if ($fecha["month"]== 'December' or $fecha["month"]== 'November' or $fecha["month"]== 'October'){
                    $año=$fecha["year"] ;
                    $añoLectivo=$año + 1 ;
                }else{
                    $añoLectivo=$fecha["year"];
                }

             $mat = new Matricula();
             $matricula = $mat->leerMatriculaPorId($idPersona);
             if ($matricula != NULL){
                    echo json_encode(3);
             }else{
                    $mat->setIdPersona($idPersona);
                    $mat->setIdSalon($idSalon);
                    $mat->setJornada($jornada);
                    $mat->setFecha($FechaTxt);
                    $mat->setAnoLectivo(strval($añoLectivo));
                    $mat->matricularEstudiante($mat);

             
             
             //**
             
             
             echo json_encode(1);
             }
             
             }
        } catch (Exception $exc) {
            $estudiante2 = new Estudiante();
            $estudiante2->eliminarPersona($idPersona);
            $estudiante2->eliminarUsuario($idPersona);
            $estudiante2->eliminarDatos($idPersona);
            $estudiante2->eliminarDatosNacimiento($idPersona);
            $estudiante2->eliminarDatosUbicacion($idPersona);
            $estudiante2->eliminarEstudiantePadre($idPersona,$idPadre);
            $estudiante2->eliminarEstudianteMadre($idPersona,$idMadre);
            $estudiante2->eliminarEstudianteAcudiente($idPersona,$idAcudiente);
            
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }     
        }
        function limpia_espacios($cadena){
            $cadena = str_replace(" ", "+", $cadena);
            //$cadena = preg_replace('[\s+]',"", $cadena);
            return $cadena;
        }   
        /**
         * proceso de consultar persona/estudiante por numero de identificacion
         */
    public function consultarEstudiante(){
        try {
            
            $idPersona =  isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            
            $persona = new Persona();
            $estudiante = $persona->leerPorId($idPersona);
            $matricula = new Matricula();
            $mat = $matricula->leerMatriculaPorId($idPersona);
            if ($estudiante == NULL){
                 $this->setVista('mensaje');
                $msj= "El Número de Documento no existe en el sistema";
                $this->vista->set('msj', $msj);
            }else{
                $rol = new Rol();
                $roles = $rol->leerRoles($idPersona);
                $band = 0;
                foreach ($roles  as $ro) {
                  if ($ro->getIdRol() == 'E'){
                      $band=1;
                  } 
                }
                    if ($band!=1){
                      $this->setVista('mensaje');
                      $msj= "El Número de Documento ingresado no corresponde al de un estudiante";
                      $this->vista->set('msj', $msj);
                    }elseif ($mat != NULL){
                      $this->setVista('mensaje');
                      $msj= "El estudiante ya se encuentra matriculado";
                      $this->vista->set('msj', $msj);                   
                    }else{
                        $this->vista->set('estudiante', $estudiante);
                        $salon= new Salon();
                        $salones = $salon->leerSalones();
                        $this->vista->set('salones', $salones);
                  }
              }
              return $this->vista->imprimir();
            } catch (Exception $exc) {
                    $this->setVista('mensaje');
                    $msj= "Error en la aplicación, Colocarse en contacto con el Desarrollador";
                    $this->vista->set('msj', $msj);
                    return $this->vista->imprimir();
            }                   
        }
        
        public function consultaTransferencia(){
            try{
            $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $persona = new Persona();
            $estudiante = $persona->leerPorId($idPersona);
            $matricula = new Matricula();
            $mat = $matricula->leerMatriculaPorId($idPersona);
            $salon = new Salon();
            $sal = $salon->leerSalonePorId($mat->getIdSalon());
            $salones = $salon->leerSalonePorIdGrado($sal->getIdGrado());
            if ($estudiante == NULL){
                 $this->setVista('mensaje');
                $msj= "El Número de Documento no existe en el sistema";
                $this->vista->set('msj', $msj);
            }else{
                $rol = new Rol();
                $roles = $rol->leerRoles($idPersona);
                $band = 0;
                foreach ($roles  as $ro) {
                  if ($ro->getIdRol() == 'E'){
                      $band=1;
                  } 
                }
                    if ($band!=1){
                      $this->setVista('mensaje');
                      $msj= "El Número de Documento ingresado no corresponde al de un estudiante";
                      $this->vista->set('msj', $msj);
                    }elseif ($mat != NULL){
                        $this->vista->set('estudiante', $estudiante);
                        $this->vista->set('salones', $salones);
                        $this->vista->set('idSalon', $mat->getIdSalon());
                                       
                    }else{
                        $this->setVista('mensaje');
                      $msj= "El estudiante NO se encuentra matriculado";
                      $this->vista->set('msj', $msj);  
                  }
              }
              return $this->vista->imprimir();
            } catch (Exception $exc) {
                    $this->setVista('mensaje');
                    $msj= "Error en la aplicación, Colocarse en contacto con el Desarrollador";
                    $this->vista->set('msj', $msj);
                    return $this->vista->imprimir();
            }                   
        }
        

         
             /**
         * proceso de consultar persona/estudiante por numero de identificacion
         */
    public function consultarEstudiante2(){
        try {
            $idPersona =  isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            
            $persona = new Persona();
            $estudiante = $persona->leerPorId($idPersona);
            $matricula = new Matricula();
            $mat = $matricula->leerMatriculaPorId($idPersona);
            if ($estudiante == NULL){
                  $this->setVista('mensaje');
                $msj= "El Número de Documento no existe en el sistema";
                $this->vista->set('msj', $msj);
            }else{
                $rol = new Rol();
                $roles = $rol->leerRoles($idPersona);
                $band = 0;
                foreach ($roles  as $ro) {
                  if ($ro->getIdRol() == 'E'){
                      $band=1;
                  } 
                }
                    if ($band!=1){
                      $this->setVista('mensaje');
                      $msj= "El Número de Documento ingresado no corresponde al de un estudiante";
                      $this->vista->set('msj', $msj);
                    }elseif ($mat == NULL){
                      $this->setVista('mensaje');
                      $msj= "El estudiante No tiene una matricula Activa";
                      $this->vista->set('msj', $msj);
                    }else{
                        $this->vista->set('estudiante', $estudiante);
                        $this->vista->set('idSalon', $mat->getIdSalon());
                  }
              
              }
            return $this->vista->imprimir();
    } catch (Exception $exc) {
            $this->setVista('mensaje');
                    $msj= "Error en la aplicación, Colocarse en contacto con el Desarrollador";
                    $this->vista->set('msj', $msj);
                    return $this->vista->imprimir();
        }    
            
         }
         
         public function consultarParaPago(){
        try {
            $idPersona =  isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            
            $persona = new Persona();
            $estudiante = $persona->leerPorId($idPersona);
            if ($estudiante == NULL){
                 $this->setVista('mensaje');
                 $msj ="El Número de Documento no existe en el sistema";
                 $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
            }else{
                $rol = new Rol();
                $roles = $rol->leerRoles($idPersona);
                $this->vista->set('roles', $roles);
                $this->vista->set('estudiante', $estudiante);
                return $this->vista->imprimir();
              }
    } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
            
         }
         
         /**
          * Matricula De estudiantes
          */
         public function matricular(){
             try {
                 
             $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
             $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
             $jornada = isset($_POST['jornada']) ? $_POST['jornada'] : NULL;
             $foto = isset($_POST['foto']) ? $_POST['foto'] : NULL;
             
             if($foto!=""){
                $foto = $this->limpia_espacios($foto);
                $contents= file_get_contents($foto);
                $savefile = fopen('utiles/imagenes/fotos/'.$idPersona.'.png', 'w');
                fwrite($savefile,$contents);
                fclose($savefile);           
                }
             $fecha = getdate();
             $FechaTxt=$fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];

                if ($fecha["month"]== 'December' or $fecha["month"]== 'November' or $fecha["month"]== 'October'){
                    $año=$fecha["year"] ;
                    $añoLectivo=$año + 1 ;
                }else{
                    $añoLectivo=$fecha["year"];
                }

             $mat = new Matricula();
             $mat->setIdPersona($idPersona);
             $mat->setIdSalon($idSalon);
             $mat->setJornada($jornada);
             $mat->setFecha($FechaTxt);
             $mat->setAnoLectivo(strval($añoLectivo));
             $mat->matricularEstudiante($mat);
             
             echo json_encode("1");
             
             } catch (Exception $exc) {
                 echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
             }

         }
         
         public function transferir(){
             try {
                 
             $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
             $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
             $mat = new Matricula();
             $mat->transferirEstudiante($idPersona,$idSalon);
             $this->setVista('mensaje');
             $msj = "Estudiante Transferido Correctamente";        
             $this->vista->set('msj', $msj);
             return $this->vista->imprimir();
             
             
             } catch (Exception $exc) {
                 $this->setVista('mensaje');
                $msj = "Error Fatal al transferir estudiante...";        
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
             }

         }
         
         public function retirar(){
             try {
             $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
             $opcion = isset($_POST['opcion']) ? $_POST['opcion'] : NULL;
             $fecha = getdate();
             $Alectivo=$fecha["year"];
             if($fecha["month"]=="December"){
                $Alectivo++;
             }
             $mat = new Matricula();
             $nota = new Nota();
             $falla = new Falla();
             if ($opcion == "1"){
                 $mat->retirarEstudiante($idPersona, $Alectivo);
             }else if ($opcion == "2"){
                 $mat->eliminarMatriculaPorId($idPersona);
             } 
             $nota->eliminarNotasPorId($idPersona);
             $falla->eliminarFallasPorId($idPersona);
             
             echo json_encode(1);
             } catch (Exception $exc) {
                 echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
             }

         }
         
         public function guardarPension(){
             try {
                 
                $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
                $mes = isset($_POST['mes']) ? $_POST['mes'] : NULL;
                $añoPension = isset($_POST['añoPension']) ? $_POST['añoPension'] : NULL;
                $valorPension = isset($_POST['valorPension']) ? $_POST['valorPension'] : NULL;
                $concepto = isset($_POST['concepto']) ? $_POST['concepto'] : NULL;
                $fecha = getdate();
                $FechaTxt=$fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];
                $pension = new Pago();
                $pension->setIdPersona($idPersona);
                $pension->setMes($mes);
                $pension->setAno($añoPension);
                $pension->setValor($valorPension);
                $pension->setFecha($FechaTxt);
                $pension->setConcepto($concepto);
                $pension->crearPagoPension($pension);
                echo json_encode("1");
             
             } catch (Exception $exc) {
                 echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
             }

         }
         public function guardarPago(){
             $this->setVista('mensaje');
                try {
                $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
                $valorPago = isset($_POST['valorPago']) ? $_POST['valorPago'] : NULL;
                $concepto = isset($_POST['concepto']) ? $_POST['concepto'] : NULL;
                $fecha = getdate();
                $FechaTxt=$fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];
                $pension = new Pago();
                $pension->setIdPersona($idPersona);
                $pension->setValor($valorPago);
                $pension->setFecha($FechaTxt);
                $pension->setConcepto($concepto);
                $pension->crearPago($pension);
                $msj ="El Pago se registró correctamente";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
             
             } catch (Exception $exc) {
                 $msj ="El Pago No se pudo registrar";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
             }

         }
         
         public function pagosAntiguos(){
             try {
                $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
                $pago = new Pago();
                $pagos=$pago->leerPagosPorIdPersona($idPersona);
                $pensiones=$pago->leerPensionesPorIdPersona($idPersona);
                $this->vista->set('pagos', $pagos);
                $this->vista->set('pensiones', $pensiones);
                return $this->vista->imprimir();
             
             } catch (Exception $exc) {
                 $this->setVista('mensaje');
                 $msj ="ERROR... La consulta no se pudo ejecutar.. !";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
             }
         }
         
         public function pagosDelDia(){
             try {
                $fecha = getdate();
                $FechaTxt=$fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];
                $pago = new Pago();
                $pagos=$pago->leerPagosPorFecha($FechaTxt);
                $pensiones=$pago->leerPensionesPorFecha($FechaTxt);
                $this->vista->set('pagos', $pagos);
                $this->vista->set('pensiones', $pensiones);
                return $this->vista->imprimir();
             
             } catch (Exception $exc) {
                 $this->setVista('mensaje');
                 $msj ="ERROR... La consulta no se pudo ejecutar.. !";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
             }
         }
         
         public function pagosActuales(){
             try {
                $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
                $fecha = getdate();
                $anio=$fecha["year"];
                $pago = new Pago();
                $pagos=$pago->leerPagosPorIdPersonaYAño($idPersona,$anio);
                $pensiones=$pago->leerPensionesPorIdPersonaYAnio($idPersona,$anio);
                $this->setVista('pagosAntiguos');
                $this->vista->set('pagos', $pagos);
                $this->vista->set('pensiones', $pensiones);
                return $this->vista->imprimir();
             
             } catch (Exception $exc) {
                 $this->setVista('mensaje');
                 $msj ="ERROR... La consulta no se pudo ejecutar.. !";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
             }
         }
         public function pagosPorFecha(){
             try {
                $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
                $inicio = isset($_POST['inicio']) ? $_POST['inicio'] : NULL;
                $fin = isset($_POST['fin']) ? $_POST['fin'] : NULL;
                $pago = new Pago();
                $pagos=$pago->leerPagosPorIdPersonayRangoFecha($idPersona,$inicio,$fin);
                $pensiones=$pago->leerPensionesPorIdPersonayRangoFecha($idPersona,$inicio,$fin);
                $this->setVista('pagosAntiguos');
                $this->vista->set('pagos', $pagos);
                $this->vista->set('pensiones', $pensiones);
                return $this->vista->imprimir();
             
             } catch (Exception $exc) {
                 $this->setVista('mensaje');
                 $msj ="ERROR... La consulta no se pudo ejecutar.. !";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
             }
         }
         
         public function pagosPorFecha2(){
             try {
                $inicio = isset($_POST['inicio']) ? $_POST['inicio'] : NULL;
                $fin = isset($_POST['fin']) ? $_POST['fin'] : NULL;
                $pago = new Pago();
                $pagos=$pago->leerPagosPorRangoFecha($inicio,$fin);
                $pensiones=$pago->leerPensionesPorRangoFecha($inicio,$fin);
                $this->setVista('pagosDelDia');
                $this->vista->set('pagos', $pagos);
                $this->vista->set('pensiones', $pensiones);
                return $this->vista->imprimir();
             
             } catch (Exception $exc) {
                 $this->setVista('mensaje');
                 $msj ="ERROR... La consulta no se pudo ejecutar.. !";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
             }
         }
         
        public function procesarCierre(){
             try {
                 $nombreUsuario = isset($_POST['usuario']) ? $_POST['usuario'] : NULL;
                 $clave = isset($_POST['clave']) ? $_POST['clave'] : NULL;
                 $fecha = getdate();
                if ($fecha["month"]== 'January' or $fecha["month"]== 'February' or $fecha["month"]== 'March'){
                    $año=$fecha["year"] ;
                    $añoLectivo=$año - 1  ;
                }else{
                    $añoLectivo=$fecha["year"];
                }
                $jornada="MAÑANA";
                $usuario = new Usuario();
                $user = $usuario->verificarAdmin($nombreUsuario, $clave); 
                if ($user == NULL) {
                        echo json_encode(2);
                 }else{
                        $admin = new Administrador();
                        $admin->cierreAcademico($añoLectivo, $jornada);
                        echo json_encode(1);
                 }
                
             } catch (Exception $exc) {
                 echo json_encode(0);
             }
                  }
                  
        public function consultaActEstudiante(){
        try {
            $idPersona =  isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            
            $persona = new Persona();
            $estudiante = $persona->leerPorId($idPersona);
            if ($estudiante == NULL){
                 $this->setVista('mensaje');
                      $msj= "El Número de Documento no existe en el sistema";
                      $this->vista->set('msj', $msj);
            }else{
                $rol = new Rol();
                $roles = $rol->leerRoles($idPersona);
                $band = 0;
                foreach ($roles  as $ro) {
                  if ($ro->getIdRol() == 'E'){
                      $band=1;
                  } 
                }
                    if ($band!=1){
                      $this->setVista('mensaje');
                      $msj= "El Número de Documento ingresado no corresponde al de un estudiante";
                      $this->vista->set('msj', $msj);
                    }else{
                   $est = new Estudiante();
                   $est->leerAcudiente($idPersona,$est);
                   $est->leerPadre($idPersona,$est);
                   $est->leerMadre($idPersona,$est);
                   $this->vista->set('estudiante', $estudiante);
                   $this->vista->set('est', $est);
                   $this->vista->set('idPersona', $idPersona);
                  }
              
              }
            return $this->vista->imprimir();
    } catch (Exception $exc) {
            $this->setVista('mensaje');
                 $msj ="ERROR... La consulta no se pudo ejecutar.. !";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
        }    
            
         }     
    
           /**
         * guarda los datos que vienen del formulario actualizar Estudiantes
         */
        public function actualizaPersonas(){
           try {
               
             $idPersona= isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
             $nombres = isset($_POST['nombres']) ? $_POST['nombres'] : NULL;
             $pApellido = isset($_POST['pApellido']) ? $_POST['pApellido'] : NULL;
             $sApellido = isset($_POST['sApellido']) ? $_POST['sApellido'] : NULL;
             $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : NULL;
             $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : NULL;
             $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : NULL;
             $correo = isset($_POST['correo']) ? $_POST['correo'] : NULL;
             $fNacimiento = isset($_POST['fNacimiento']) ? $_POST['fNacimiento'] : NULL;
             $Estado = isset($_POST['Estado']) ? $_POST['Estado'] : NULL;
             
           
             
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
             $persona->setEstado($Estado);
          
             $persona->actualizarPersona($persona);
             
             echo json_encode(1);
        } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }     
        }
      
         public function configurarUsuario() {
             parent::configurarUsuario();
         }
         
         public function configurarContraseña() {
             parent::configurarContraseña();
         }
         
         public function configurarCorreo() {
             parent::configurarCorreo();
         }
         
         public function consultaGeneralPersona() {
             parent::consultaGeneralPersona();
         }
         
         public function seguimiento() {
             parent::seguimiento();
         }
          public function pension() {
             parent::pension();
         }
         public function pension2($idPersona) {
             parent::pension2($idPersona);
         }
         public function actualizarAcudiente() {
             parent::actualizarAcudiente();
         }
       
          public function actualizarPadre() {
             parent::actualizarPadre();
         }
          
          public function actualizarMadre() {
             parent::actualizarMadre();
         }
           public function actualizaAcudiente() {
             parent::actualizaAcudiente();
         }
       
          public function actualizaPadre() {
             parent::actualizaPadre();
         }
          
          public function actualizaMadre() {
             parent::actualizaMadre();
         }
         
         
        
        
         
 
         
         public function actualizarGeneralPersona() {
            try{
                $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;

                $pers = new Persona();
                $rolPersona = new Rol();
                $roles = $rolPersona->rolPersona($idPersona);
                $rol=$roles->getIdRol(); 
                $persona = $pers->leerPorId($idPersona);
                $this->vista->set('idPersona', $idPersona);
                $this->vista->set('rol', $rol);
                $this->vista->set('persona', $persona);
                return $this->vista->imprimir();
            } catch (Exception $exc) {
                $this->setVista('mensaje');
                $msj ="ERROR... La consulta no se pudo ejecutar.. !";
                $this->vista->set('msj', $msj);
                return $this->vista->imprimir();
            }    
         }
         
         
         public function generarBoletin($param){
             if($this->verificarSession()){
            $cadena = explode(",", $param);    
            $idSalon = $cadena[0];
            $periodo = $cadena[1];
            $cfg = Configuracion::getConfiguracion('colegio');
            $colegio= $cfg['NOMBRE'];
            $reporte = new Reportes();
            if ($colegio=="galois"){
                $reporte->boletinGalois($idSalon, $periodo);
            }elseif ($colegio=="santaTeresita"){
                
            }
             }
         }
         
         public function imprimirInformeFinal($param){
            $cadena = explode(",", $param);    
            $idPersona = $cadena[0];
            $anio = $cadena[1];
            $cfg = Configuracion::getConfiguracion('colegio');
            $colegio= $cfg['NOMBRE'];
            $reporte = new Reportes();
            if ($colegio=="galois"){
                $reporte->informeFinalGalois($idPersona, $anio);
            }elseif ($colegio=="santaTeresita"){
                
            }
            
         }
    
      public function imprimirMatricula($idPersona){
           $cfg = Configuracion::getConfiguracion('colegio');
           $colegio= $cfg['NOMBRE'];
          $reporte = new Reportes();
          if ($colegio=="galois"){
              $reporte->matriculaGalois($idPersona);
          }elseif ($colegio=="santaTeresita"){
              $reporte->matriculaSantaTeresita($idPersona);
          }
          
      }
      
      public function imprimirObservador($idPersona){
           $cfg = Configuracion::getConfiguracion('colegio');
           $colegio= $cfg['NOMBRE'];
          $reporte = new Reportes();
          if ($colegio=="galois"){
              //$reporte->observadorGalois($idPersona);
          }elseif ($colegio=="santaTeresita"){
              $reporte->observadorSantaTeresita($idPersona);
          }
          
      }
      
      public function guardarPensiones(){
            try {
                 if($this->verificarSession()){
                $arreglo =  isset($_POST['pensiones']) ? $_POST['pensiones'] : NULL;
                $anio =  isset($_POST['anio']) ? $_POST['anio'] : NULL;
                $pensiones = json_decode($arreglo);
                $fecha = getdate();
                $FechaTxt=$fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];
               $pagos = ['MATRICULA','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','VR.PENSION'];
                foreach($pensiones as $pen){
                    
                    for($i=0;$i<= count($pagos);$i++){
                            
                                $pension = new Pago();
                                $pension->setIdPersona($pen[0]);
                                $pension->setMes($pagos[$i]);
                                $pension->setConcepto("PENSION");
                                $pension->setValor($pen[$i+1]);
                                $pension->setFecha($FechaTxt);
                                $pension->setAno($anio);
                                if($pen[$i+1] != "" && $pen[$i+1] != NULL){
                                    $pg=$pension->leerPensionesPorIdPersonaMesYAnio($pen[0], $anio, $pagos[$i]);
                                    if($pg != NULL){
                                        
                                        if($pg->getValor()!=$pen[$i+1]){
                                            $pension->actualizarValorPension($pg->getIdPago(), $pen[$i+1], $FechaTxt);
                                        }
                                        
                                    }else{
                                        $pension->crearPagoPension($pension);
                                    }
                                     
                                }
                              
                    }       
                    
                }
                echo json_encode(1);
                 }
            } catch (Exception $exc) {
                echo json_encode($exc->getTraceAsString());
            }
                }
                


//**************************************************************************************************//        
//**********************************FIN DE LOS METODOS*********************************************//
//**************************************************************************************************// 
    
///___________________________LLENADO DE TABLA USUARIO y ROL ACUDIENTE NO TOCAR
      
      public function  llenarUsuarios(){
      
      $acudiente = new Acudiente();
      $acudientes = $acudiente->leerAcudientes();
      foreach ($acudientes as $acu){
          $usuario = new Usuario();
          $usuario->setIdPersona($acu->getId_acudiente());
          $usuario->setUsuario($acu->getId_acudiente());
          $usuario->setContraseña($acu->getId_acudiente());
          $usuario->crearUsuario($usuario);
      }
      
      $persona = new Persona();
      $personas = $persona->leerPersonas();
      foreach ($personas as $person){
          $usuario = new Usuario();
          $usuario->setIdPersona($person->getIdPersona());
          $usuario->setUsuario($person->getIdPersona());
          $usuario->setContraseña($person->getIdPersona());
          $user = $usuario->leerPorId($person->getIdPersona());
          if($user == NULL){
              $usuario->crearUsuario($usuario);
          }else{
              $rol = new Rol();
              $roles = $rol->leerRoles($person->getIdPersona());
              foreach($roles as $ro){
                  if ($ro->getIdRol()== 'E'){
                      $persona->actualizarId($person->getIdPersona(), $person->getIdPersona()."0");
                      $usuario->setIdPersona($person->getIdPersona()."0");
                  }
              }
              
          }
          
      }
      
      
      }
      
      public function llenarRolAcudiente(){
            $acudiente = new Acudiente();
            $acudientes = $acudiente->leerAcudientes();
            foreach ($acudientes as $acu){
                $persona = new Persona();
                $persona->asignarRol2($acu->getId_acudiente(), 'AC');
            }
      }
      
     
//____________________________________________________________      
      
      public function imprimirRegistro($idPersona){
          $cfg = Configuracion::getConfiguracion('colegio');
          $colegio= $cfg['NOMBRE'];
          $reporte = new Reportes();
          if ($colegio=="santaTeresita"){
              $reporte->registroSantaTeresita($idPersona);
          }
      }
      public function actualizarFotoEstudiante(){
            
            $idPersona=isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $archivo = $_FILES["foto"]['name'];
            $trozos = explode(".", $archivo); 
            $extension = end($trozos); 
            $ruta = HOME.DS.'utiles/imagenes/fotos/';
            $destino = $ruta.$idPersona.".".$extension;
            $extensiones = ['jpg', 'jpeg', 'png'];
            
            if ($archivo != "") {
                $band=0;    
                for($i=0; $i<count($extensiones); $i++){
                    if ($extensiones[$i]==$extension){
                        $band = 1;
                    }
                }
                    if($band == 1){
                        if (($_FILES["foto"]["size"])/1048576 <= 4){
                       
                            if (file_exists($ruta.$idPersona.'.jpg')) {
                            unlink($ruta.$idPersona.'.jpg');
                            }elseif (file_exists($ruta.$idPersona.'.png')) {
                                unlink($ruta.$idPersona.'.png');
                            }elseif (file_exists($ruta.$idPersona.'.jpeg')) {
                                unlink($ruta.$idPersona.'.jpeg');
                            }
                            copy($_FILES['foto']['tmp_name'],$destino);
                        }    
                    }
                    
            }
             $this->vista->set('url', $_POST['url']);
            return $this->vista->imprimir(); 
        }
        
        public function actualizaIdPersona(){
            $idPersona=isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $idNuevo=isset($_POST['idNuevo']) ? $_POST['idNuevo'] : NULL;
            try {

            $estudiante = new Estudiante();
            $estudiante->cambiarIdEstudiante($idPersona, $idNuevo);
            
            echo json_encode(1);  
            
            } catch (Exception $exc) {
                echo json_encode($exc->getTraceAsString());
            }
        }
        
            public function eliminarPersona(){
            
            try {
            $idPersona=isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;        
            $estudiante = new Estudiante();
            $estudiante->eliminarEstudiante($idPersona);
            
            echo json_encode(1); 
            
            } catch (Exception $exc) {
                echo json_encode($exc->getTraceAsString());
            }
        }
        
        public function panelMovil(){
            
            $idPersona=isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $panel =isset($_POST['panel']) ? $_POST['panel'] : NULL;
            
            if($panel=="acudiente"){
            
                $acudiente = new Acudiente();
                $acu = $acudiente->leerPorId($idPersona);
                $this->vista->set('acu', $acu);
                $persona = new Persona();
                $acudido = $persona->leerPorAcudiente($acu->getId_Acudiente());
                $this->vista->set('acudido', $acudido);
                $ruta = 'utiles/imagenes/fotos/';
                if (file_exists($ruta.$idPersona.'.jpg')) {
                    $img= '<img height="90px" width="90px"  src="http://controlacademico.liceogalois.com/utiles/imagenes/fotos/'.$idPersona.'.jpg">';
                }elseif (file_exists($ruta.$idPersona.'.png')) {
                    $img= '<img height="90px" width="90px"  src="http://controlacademico.liceogalois.com/utiles/imagenes/fotos/'.$idPersona.'.png">';
                }elseif (file_exists($ruta.$idPersona.'.jpeg')) {
                    $img= '<img height="90px" width="90px"  src="http://controlacademico.liceogalois.com/utiles/imagenes/fotos/'.$idPersona.'.jpeg">';
                }else{
                    $img= '<img height="90px" width="90px"  src="http://controlacademico.liceogalois.com/utiles/imagenes/avatarDefaul.png">';
                }
                $this->vista->set('img', $img);
                return $this->vista->imprimir();
            }
        }
        
        public function imprimirPlanillas($tipo){
            if($this->verificarSession()){
                $cfg = Configuracion::getConfiguracion('colegio');
                $colegio= $cfg['NOMBRE'];
                $reporte = new Reportes();
            if ($colegio=="galois"){
                
            }elseif ($colegio=="santaTeresita"){
                if($tipo=="AUXILIAR"){
                    $reporte->planillaAuxiliarSantateresita();
                }else if($tipo=="CALIFICACION"){
                    $reporte->planillaCalificacionSantateresita();
                }
                
            }
            }
        }
        
        public function modificarNumeroMatricula(){
            try {
                 if($this->verificarSession()){
                $arreglo =  isset($_POST['matriculas']) ? $_POST['matriculas'] : NULL;
                
                $matriculas = json_decode($arreglo);
                $matricula = new Matricula();
                $fecha = getdate();
                $Alectivo=$fecha["year"];
                if($fecha["month"]=="December"){
                   $Alectivo++;
                }
                foreach($matriculas as $mat){
                    $matricula->modificarNMatricula($mat[0], $mat[1],$Alectivo);
                }
                echo json_encode(1);
                 }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
}
?>