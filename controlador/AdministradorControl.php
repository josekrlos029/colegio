
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
        
        public function generarConsolidado(){
            try {
            $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
            $periodo = isset($_POST['periodo']) ? $_POST['periodo'] : NULL;
            $pensum = new Pensum();
            $pens = $pensum->leerPensum($idSalon);
            
            $respuesta = "";
            
              $respuesta.='<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
                     
                    <tr><td align="center" class="color-text-gris" colspan="11"><h1>Salon:'.$idSalon.'</h1></td></tr>
                    <tr class="modo1">
                    <td>N°</td>
                    <td>Nombres</td>
                    ';
            foreach ($pens as $pen){
                        $mat = new Materia();
                        $materia = $mat->leerMateriaPorId($pen->getIdMateria());
                         foreach ($materia as $mate){
                              $respuesta.='<td>'.$mate->getNombreMateria().'</td>';
                         }
            }
             $respuesta.='</tr>';
             $persona = new Persona();
             $personas=$persona->leerPorSalon($idSalon);
             $cont = 0;
              foreach ($personas as $per){
                  $cont++;
                  $respuesta.='<tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)"> <td>'.$cont.'</td><td>'.$per->getPApellido().' '.$per->getSApellido().' '.$per->getNombres().'</td>';
                foreach ($pens as $pen){
                        $nota = new Nota();
                        $not =$nota->leerNotaEstudiante( $per->getIdPersona(), $pen->getIdMateria());
                        if($periodo == 'PRIMERO'){
                            $respuesta.='<td>'.$not->getPrimerP().'</td>';
                        }else if($periodo == 'SEGUNDO'){
                            $respuesta.='<td>'.$not->getSegundoP().'</td>';
                            
                        }else if($periodo == 'TERCERO'){
                            $respuesta.='<td>'.$not->getTerceroP().'</td>';
                            
                        }else if($periodo == 'CUARTO'){
                            
                            $respuesta.='<td>'.$not->getCuartoP().'</td>';
                        }else if($periodo == 'FINAL'){
                            $respuesta.='<td>'.$not->getDefinitiva().'</td>';
                            
                        }
                            
                        }
              $respuesta.='</tr>';
              
             }
                $respuesta.='</table>';
                 $respuesta.='<input type="hidden" id="idSalon" value="'.$idSalon.'" />';
               
            if (strlen($respuesta)>0){
            echo json_encode($respuesta);  
            }  else {
                echo json_encode("<tr> </tr>"); 
            }
            
             } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
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
            $respuesta = "";
            
              $respuesta.='<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
                     
                    <td align="center" class="color-text-gris" colspan="11"><h1>Salon:'.$idSalon.'</h1></td></tr>
                    <tr class="modo1">
                    <td>Documento</td>
                    <td>Nombres</td>
                    <td>P.Apellido</td>
                    <td>S.Apellido</td>
                    <td>Sexo</td>
                    <td>Telefono</td>
                    <td>Dirección</td>
                    <td>Correo</td>
                    <td>consultar</td>
                    <td>Actualizar</td>
                    <td>Inhabilitar</td>
                    </tr> ';
                 foreach ($estudiante as $est){
     $respuesta .= '<tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                    <td>'. $est->getIdPersona().'</td>
                    <td>'. $est->getNombres().'</td>
                    <td>'. $est->getPApellido().'</td>
                    <td>'. $est->getSApellido().'</td>
                    <td>'. $est->getSexo().'</td>
                    <td>'. $est->getTelefono().'</td>
                    <td>'. $est->getDireccion().'</td>
                    <td>'. $est->getCorreo().'</td>
                    <td align="center"><a href="#" onclick="consultaPersona ('. strtoupper ($est->getIdPersona()).') "><img src="../utiles/imagenes/iconos/consultarPersona.png"/></a></td>
                    <td align="center"><a href="#" onclick="vistaActualizarPersona('.$est->getIdPersona().') "><img src="../utiles/imagenes/iconos/editarPersona.png" /></a></td>
                    <td align="center"><a href="#" onclick="eliminarPersona ('. strtoupper ($est->getIdPersona()).') "><img src="../utiles/imagenes/iconos/eliminarPersona.png"/></a></td>
                </tr>';     
                  }
                $respuesta.='</table>';
               
            if (strlen($respuesta)>0){
            echo json_encode($respuesta);  
            }  else {
                echo json_encode("<tr> </tr>"); 
            }
            
             } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
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
            $respuesta = "";
            
              $respuesta.='<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
                     
                    <td align="center" class="color-text-gris" colspan="11"><h1>Salon:'.$idSalon.'</h1></td></tr>
                    <tr class="modo1">
                    <td>Documento</td>
                    <td>Nombres</td>
                    <td>P.Apellido</td>
                    <td>S.Apellido</td>
                    <td>Sexo</td>
                    <td>Telefono</td>
                    <td>Dirección</td>
                    <td>Correo</td>
                    <td>consultar</td>
                    <td>Actualizar</td>
                    <td>Inhabilitar</td>
                    </tr> ';
                 foreach ($docente as $doc){
     $respuesta .= '<tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                    <td>'. $doc->getIdPersona().'</td>
                    <td>'. $doc->getNombres().'</td>
                    <td>'. $doc->getPApellido().'</td>
                    <td>'. $doc->getSApellido().'</td>
                    <td>'. $doc->getSexo().'</td>
                    <td>'. $doc->getTelefono().'</td>
                    <td>'. $doc->getDireccion().'</td>
                    <td>'. $doc->getCorreo().'</td>
                    <td align="center"><a href="#" onclick="consultaPersona ('. strtoupper ($doc->getIdPersona()).') "><img src="../utiles/imagenes/iconos/consultarPersona.png"/></a></td>
                    <td align="center"><a href="#" onclick="vistaActualizarPersona('.$doc->getIdPersona().') "><img src="../utiles/imagenes/iconos/editarPersona.png" /></a></td>
                    <td align="center"><a href="#" onclick="eliminarPersona ('. strtoupper ($doc->getIdPersona()).') "><img src="../utiles/imagenes/iconos/eliminarPersona.png"/></a></td>
                </tr>';     
                  }
                $respuesta.='</table>';
               
            if (strlen($respuesta)>0){
            echo json_encode($respuesta);  
            }  else {
                echo json_encode("<tr> </tr>"); 
            }
            
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
            $respuesta = "";
            if ($html == 'table'){
            foreach ($materias as $materia) {
            $respuesta .= '<tr onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">';
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
             $persona->crearPersona($persona);
            
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
            $cont=0;
            $total=0;
            $idPersona = isset($_POST['idDocente']) ? $_POST['idDocente'] : NULL;
            $carga = new Carga();
            $cargas = $carga->leerCargasPorDocente($idPersona);
            $respuesta = "";
            
                  foreach ($cargas as $carg) {
                      $respuesta .= '<tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">';
                      $respuesta.= '<td width="20%" align="center">'. strtoupper($carg->getIdSalon()).'</td>';
                      $materia = new Materia();
                      $materias = $materia->leerMateriaPorId($carg->getIdMateria());
                         foreach ($materias as $mat) {
                              $respuesta.= '<td width="40%">'. strtoupper($mat->getNombreMateria()).'</td>'.
                                           '<td width="10%" align="center">'. strtoupper($mat->getHoras()).'</td>';
                                             $cont=($mat->getHoras());
                                             $total=$total+$cont;   
                         }
                         
                         $eliminar= "eliminar('".$carg->getIdSalon()."','".$carg->getIdMateria()."')";
                         $respuesta.= '<td width="20%" align="center">
                                     <a href="#" onclick="'.$eliminar.'"><img src="../utiles/imagenes/iconos/eliminarPersona.png"/></a>
                                       </td>';
                        $respuesta .= "</tr>";
                       
                  }
                   $respuesta .= '<tr><td colspan="4" align="center"><hr></td></tr>
                                   <tr>
                                     <td colspan="4" align="center" class="color-text-gris"><h2>Total Horas Semanales:'. $total.'</h2></td>
                                  </tr>';
               
            if (strlen($respuesta)>0){
          
                echo json_encode($respuesta);  
            }  else {
                echo json_encode("<tr> </tr>"); 
            }
            
             } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
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
             $telAcudiente = isset($_POST['telAcudienteAcudiente']) ? $_POST['telAcudienteAcudiente'] : NULL;
             $telOficinaAcudiente = isset($_POST['telOficinaAcudiente']) ? $_POST['telOficinaAcudiente'] : NULL;
             $dirAcudiente = isset($_POST['dirAcudiente']) ? $_POST['dirAcudiente'] : NULL;
             
             $estado='0';
             $idRol= 'E';
             
             $estudiante2 = new Estudiante();
            $estudiante2->eliminarPersona($idPersona);
            $estudiante2->eliminarUsuario($idPersona);
            $estudiante2->eliminarDatos($idPersona);
            $estudiante2->eliminarDatosNacimiento($idPersona);
            $estudiante2->eliminarDatosUbicacion($idPersona);
            $estudiante2->eliminarEstudiantePadre($idPersona,$idPadre);
            $estudiante2->eliminarEstudianteMadre($idPersona,$idMadre);
            $estudiante2->eliminarEstudianteAcudiente($idPersona,$idAcudiente);
             try {
             
             $estudiante = new Estudiante();
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
             
             if ($estudiante->verificarPadre($idPadre) == NULL){
               $estudiante->crearDatosPadre($estudiante);  
             }
             
             if ($estudiante->verificarMadre($idMadre) == NULL){
               $estudiante->crearDatosMadre($estudiante);
             }
             
             if ($estudiante->verificarAcudiente($idAcudiente) == NULL){
               $estudiante->crearDatosAcudiente($estudiante);
             }
             
             $estudiante->estudiantePadre($estudiante);
             $estudiante->estudianteMadre($estudiante);
             $estudiante->estudianteAcudiente($estudiante);
                        
             echo json_encode(1);
             
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
        
        /**
         * proceso de consultar persona/estudiante por numero de identificacion
         */
    public function consultarEstudiante(){
        try {
            $idPersona =  isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            
            $persona = new Persona();
            $estudiante = $persona->leerPorId($idPersona);
            if ($estudiante == NULL){
                 $respuesta= 1;
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
                      $respuesta= 3;
                    }elseif ($estudiante->getEstado()!= 0 ){
                      $respuesta= 2;
                    }else{
                  
                        $respuesta = '<table class="tabla"> 
                                       <tr class="modo1">
                                        <td>Nombres:</td>
                                         <td>Primer Apellido:</td>
                                         <td>Segundo Apellido:</td>
                                         <td>Sexo:</td>
                                         <td>Telefono:</td>
                                         <td>Direccion:</td>
                                         <td>Correo:</td>
                                         <td>Fecha De Nacimiento:</td>
                                        </tr>
                                        
                                        <tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">
                                        <td>'.$estudiante->getNombres()."</td>
                                        <td>".$estudiante->getPApellido()."</td>
                                        <td>".$estudiante->getSApellido()."</td>
                                        <td>".$estudiante->getSexo()."</td>
                                        <td>".$estudiante->getTelefono()."</td>
                                        <td>".$estudiante->getDireccion()."</td>
                                        <td>".$estudiante->getCorreo()."</td>
                                        <td>".$estudiante->getFNacimiento()->format("Y-m-d")."</td>
                                        </tr>
                                    </table>

                                     "; 
                  }
              
              }
            echo json_encode($respuesta);
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
             $mat->setAñoLectivo(strval($añoLectivo));
             $mat->matricularEstudiante($mat);
             echo json_encode("1");
             
             } catch (Exception $exc) {
                 echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
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
                 $respuesta= 1;
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
                      $respuesta= 3;
                    }else{
                  
                        $respuesta = ' <table width="40%" border="0" cellspacing="0" cellpadding="2">
                                        <tr>
                                        <td></td>
                                        <td align="left" class="color-text-gris"><h1>DATOS DEL ESTUDIANTE</h1></td>
                                        </tr>  
                                       <tr>
                                         <td  align="right" width="40%" >Nombres:</td>
                                        <td><input name="nombres" id="nombres" type="text" class="box-text" value='.$estudiante->getNombres().' required/></td>
                                        </tr>  
                                        <tr>
                                         <td align="right">Primer Apellido:</td>
                                         <td><input name="pApellido" id="pApellido" type="text" class="box-text" value='.$estudiante->getPApellido().' required/></td>
                                         </tr> 
                                         <tr>
                                         <td align="right">Segundo Apellido:</td>
                                         <td><input name="sApellido" id="sApellido" type="text" class="box-text" value='.$estudiante->getSApellido().' required/></td>
                                         </tr>
                                         <tr>
                                         <td align="right">Sexo:</td>
                                          <td><select name="sexo" id="sexo" value='.$estudiante->getSexo().'>
                                          <option>M</option>
                                        <option>F</option>
                                        </select></td>
                                         </tr>
                                         <tr>
                                         <td align="right">Telefono:</td>
                                          <td><input name="telefono" id="telefono" type="number" class="box-text" value="'.$estudiante->getTelefono().'" /></td>
                                          </tr>  
                                          <tr>
                                         <td align="right">Direccion:</td>
                                          <td><input name="direccion" id="direccion" type="text" class="box-text" value="'.$estudiante->getDireccion().'"  /></td>
                                          </tr>    
                                          <tr>
                                         <td align="right">Correo:</td>
                                          <td><input name="correo" id="correo" type="email" class="box-text" value="'.$estudiante->getCorreo().'" /></td>
                                          </tr>  
                                          <tr>
                                         <td align="right">Fecha De Nacimiento:</td>
                                         <td><input name="fNacimiento" id="fNacimiento" type="date"  class="box-text" value="'.$estudiante->getFNacimiento()->format("Y-m-d").'" required/></td>
                                        </tr>
                                        <td align="right">Estado:</td>
                                         <td><input name="estado" id="estado" type="text"  class="box-text" value="'.$estudiante->getEstado().'" disabled="disabled"/></td>
                                        </tr>
                                     <tr>
                                        <td></td><td><input name="actualizaEstudiante" id="actualizaEstudiante" type="submit" value="Actualizar" class="button large blue" onclick="actualizarEstudiante()" /></td>
                                         </tr>
                                        </table>  

                                     '; 
                  }
              
              }
            echo json_encode($respuesta);
    } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
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
         
         public function actualizarGeneralPersona() {
            try{
            $idPersona = isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
           
            $pers = new Persona();
            $rolPersona = new Rol();
            $roles = $rolPersona->rolPersona($idPersona);
            $rol=$roles->getIdRol(); 
            $persona = $pers->leerPorId($idPersona);
             if ($rol == 'D'){ 
            $respuesta = "";
             
            $respuesta = ' <div class="contenedorDp" >     
                            <div class="marcoAvatardoc">
                                <div class="avatar">
                                    <span class="rounded">
                                        <img height="150px" width="150px" src="../utiles/imagenes/avatarDefaul.png">
                                    </span> 
                                </div>    
                            </div> 
          ';
            }elseif($rol == 'E'){
            $respuesta = ' <div class="contenedorDp" >     
                            <div class="marcoAvatarest">
                                <div class="avatar">
                                    <span class="rounded">
                                        <img height="150px" width="150px" src="../utiles/imagenes/avatarDefaul.png">
                                    </span> 
                                </div>    
                            </div> 
          ';
            
            }else{
                 echo json_encode("<tr> </tr>"); 
            }
             $respuesta .='              <table border="0" width="100%"> 
                                       <tr><td class="color-text-gris">Numero de Identificacion:</td></tr> 
                                       <tr><td>'. strtoupper($persona->getidPersona()).'</td></tr>
                                      <tr><td class="color-text-gris">Nombres:</td></tr> 
                                       <tr><td>'. strtoupper($persona->getNombres()).'</td></tr>
                                       <tr><td class="color-text-gris">Apellidos:</td></tr>
                                       <tr><td>'. strtoupper($persona->getPApellido()).' '. strtoupper($persona->getSApellido()).'</td></tr>  
                                       <tr><td class="color-text-gris">Sexo:</td></tr>                                       
                                       <tr><td>'. strtoupper($persona->getSexo()).'</td> </tr>                                        
                                       <tr><td class="color-text-gris">Telefono:</td></tr>
                                       <tr><td>'. strtoupper($persona->getTelefono()).'</td></tr> 
                                       <tr><td class="color-text-gris">Direccion:</td></tr>
                                       <tr><td>'. strtoupper($persona->getDireccion()).'</td</tr> 
                                       <tr><td class="color-text-gris">Correo:</td></tr>    
                                       <tr><td>'. strtoupper($persona->getCorreo()).'</td></tr>
                                       <tr><td class="color-text-gris">Fecha De Nacimiento:</td></tr>
                                    <tr><td>'. strtoupper($persona->getFNacimiento()->format('Y-m-d')).'</td></tr>
                                </table>
                             </div>
                
                                </br>
                                <table width="60%" border="0" cellspacing="0" cellpadding="2">
                                        <tr>
                                        <td></td>
                                        <td align="left" class="color-text-gris"><h1>ACtualizar Datos</h1></td>
                                        </tr> 
                                         <tr>
                                         <td  align="right" width="40%" >Numero de Identificacion:</td>
                                        <td><input name="idPersona" id="idPersona" type="text" class="box-text" value='.$persona->getidPersona().' disabled="disabled" readonly="readonly"/></td>
                                        </tr>
                                       <tr>
                                         <td align="right">Nombres:</td>
                                        <td><input name="nombres" id="nombres" type="text" class="box-text" value='.$persona->getNombres().' required/></td>
                                        </tr>  
                                        <tr>
                                         <td align="right">Primer Apellido:</td>
                                         <td><input name="pApellido" id="pApellido" type="text" class="box-text" value='.$persona->getPApellido().' required/></td>
                                         </tr> 
                                         <tr>
                                         <td align="right">Segundo Apellido:</td>
                                         <td><input name="sApellido" id="sApellido" type="text" class="box-text" value='.$persona->getSApellido().' required/></td>
                                         </tr>
                                         <tr>
                                         <td align="right">Sexo:</td>
                                          <td><select name="sexo" id="sexo" value='.$persona->getSexo().'>
                                          <option>M</option>
                                        <option>F</option>
                                        </select></td>
                                         </tr>
                                         <tr>
                                         <td align="right">Telefono:</td>
                                          <td><input name="telefono" id="telefono" type="number" class="box-text" value="'.$persona->getTelefono().'" /></td>
                                          </tr>  
                                          <tr>
                                         <td align="right">Direccion:</td>
                                          <td><input name="direccion" id="direccion" type="text" class="box-text" value="'.$persona->getDireccion().'"  /></td>
                                          </tr>    
                                          <tr>
                                         <td align="right">Correo:</td>
                                          <td><input name="correo" id="correo" type="email" class="box-text" value="'.$persona->getCorreo().'" /></td>
                                          </tr>  
                                          <tr>
                                         <td align="right">Fecha De Nacimiento:</td>
                                         <td><input name="fNacimiento" id="fNacimiento" type="date"  class="box-text" value="'.$persona->getFNacimiento()->format("Y-m-d").'" required/></td>
                                        </tr>
                                        <td align="right">Estado:</td>
                                         <td><input name="estado" id="estado" type="text"  class="box-text" value="'.$persona->getEstado().'" disabled="disabled"/></td>
                                        </tr>
                                     <tr>
                                        <td></td><td><input name="actualizaPersona" id="actualizaPersona" type="submit" value="Actualizar" class="button large gris" onclick="actualizarPersona()" /></td>
                                         </tr>
                                        </table>
                                        
                           

                                     '; 
              if (strlen($respuesta)>0){
            echo json_encode($respuesta);  
            }  else {
                echo json_encode("<tr> </tr>"); 
            } 
            } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
         }
         
         
         public function generarBoletin($param){
            $cadena = explode(",", $param);    
            $idSalon = $cadena[0];
            $periodo = $cadena[1];
            
            $persona = new Persona();
            $estudiantes  = $persona->leerPorSalon($idSalon);
            
            $pdf=new FPDF('P','cm','Legal');
            
            foreach ($estudiantes as $estudiante){
                
                $matricula = new Matricula();
                $matr = $matricula->leerMatriculaPorId($estudiante->getIdPersona());
                $salon = new Salon();
                $sal = $salon->leerSalonePorId($idSalon);
                $grado = new Grado();
                $grad = $grado->leerGradoPorId($sal->getIdGrado());
                $pensum = new Pensum();
                $pens = $pensum->leerPensum($matr->getIdSalon());
                
                if ($grad->getIdGrado() == 'p1' || $grad->getIdGrado() == 'p2' || $grad->getIdGrado() == 'p3'){
                    $seccion = 'PREESCOLAR';
                }else if ($grad->getIdGrado() == '1' || $grad->getIdGrado() == '2' || $grad->getIdGrado() == '3' || $grad->getIdGrado() == '4' || $grad->getIdGrado() == '5'){
                    $seccion = 'BASICA PRIMARIA';
                }else if ($grad->getIdGrado() == '6' || $grad->getIdGrado() == '7' || $grad->getIdGrado() == '8' || $grad->getIdGrado() == '9' || $grad->getIdGrado() == '10' || $grad->getIdGrado() == '11'){
                    $seccion = 'BASICA SECUNDARIA';
                }
                
                $pdf->AddPage();
                $pdf-> SetFont("Arial","B",16);
                $pdf->SetXY(1,1);
                $pdf->cell(19,1,"LICEO GALOIS",0,0,"C");
                $pdf->ln();
                $pdf->cell(4,4,"",0);
                $pdf->Image('utiles/imagenes/colegio/escudo_liceo_galois.png',1,1.5,4); 
                $pdf-> SetFont("Arial","B",11);
                //CAbecera
                $pdf->SetXY(1,2);
                $pdf->Cell(19,1,utf8_decode("APROBADO SEGÚN RES. No. 1561 DE OCT. 22 DE 2001"),0,1,"C");
                $pdf->SetX(5);
                $pdf->Cell(11,1,"NIT. 77171933-1  DANE 320001068479",0,1,"C");
                $pdf->SetX(5);
                $pdf->Cell(11,1,"VALLEDUPAR - CESAR",0,1,"C");
                $pdf->SetXY(16,2);
                $pdf-> SetFont("Arial","",10);
                $pdf->Cell(4,1,"Bajo: 0 - 29 ",0,0,"C");
                $pdf->SetXY(16,2.5);
                $pdf->Cell(4,1,"Basico: 30 - 39  ",0,0,"C");
                $pdf->SetXY(16,3);
                $pdf->Cell(4,1,"Alto: 40 - 45 ",0,0,"C");
                $pdf->SetXY(16,3.5);
                $pdf->Cell(4,1,"Superior : 46 - 50",0,0,"C");
                $pdf->SetXY(16,2);
                $pdf->Cell(4,3,"",1,0,"C");


                if ($periodo=="PRIMERO"){
                        $periodo3="PRIMER";
                }
                if ($periodo=="SEGUNDO"){
                        $periodo3="SEGUNDO";
                }

                if ($periodo=="TERCERO"){
                        $periodo3="TERCER";
                }

                if ($periodo=="CUARTO"){
                        $periodo3="CUARTO";
                }
                
                $pdf->SetXY(1,5.5);
                $pdf-> SetFont("Arial","B",10);
                $pdf->Cell(19,0.5,utf8_decode(strtoupper($estudiante->getPApellido()." ".$estudiante->getSApellido()." ".$estudiante->getNombres())),1,0,"C");
                $pdf->SetXY(1,6);
                $pdf-> SetFont("Arial","",10);
                $pdf->Cell(4,0.5,$grad->getNombre(),1,0,"C");
                $pdf->SetXY(5,6);
                $pdf->Cell(3,0.5,"GRUPO: 01",1,0,"C");
                $pdf->SetXY(8,6);
                $pdf->Cell(12,0.5,utf8_decode("JORNADA: ".$matr->getJornada()."     AÑO LECTIVO: ".$matr->getAñoLectivo()."   ".$periodo3." PERIODO"),1,0,"C");
                $pdf->SetXY(1,6.5);

                $pdf->Cell(4,0.5,$seccion,1,0,"C");
                $pdf->SetXY(5,6.5);
                $pdf->Cell(1,0.5,"",1,0,"C");
                $pdf->SetXY(6,6.5);
                $pdf->Cell(1,0.5,"",1,0,"C");
                $pdf->SetXY(7,6.5);
                $pdf->Cell(1,0.5,"",1,0,"C");
                $pdf->SetXY(8,6.5);
                $pdf->Cell(12,0.5,"MODALIDAD: ACADEMICA",1,0,"C");
                
                $pdf-> SetFont("Arial","B",10);
                $pdf->SetXY(1,7);
                $pdf->Cell(4,0.5,"AREAS/ASIGNATURAS",1,0,"C");
                $pdf->SetXY(5,7);
                $pdf->Cell(1,0.5,"IH",1,0,"C");
                $pdf->SetXY(6,7);
                $pdf->Cell(1,0.5,"Fallas",1,0,"C");
                $pdf->SetXY(7,7);
                $pdf->Cell(1,0.5,"Val.",1,0,"C");
                $pdf->SetXY(8,7);
                $pdf->Cell(12,0.5,"FORTALEZAS/ DEBILIDADES/ RECOMENDACIONES",1,0,"C");

                $pdf-> SetFont("Arial","",9);
                $y=7.5;
                $x=1;
                $suma=0;
                $cont=0;
                
                foreach ($pens as $mat){
                    $mate = new Materia();
                    $materias = $mate->leerMateriaPorId($mat->getIdMateria());
                    foreach ($materias as $materia){
                        
                        $nombreMateria = $materia->getNombreMateria();
                        $horas = $materia->getHoras();
                    }
                    $nota = new Nota();
                    $not = $nota->leerNotaEstudiante($estudiante->getIdPersona(), $mat->getIdMateria());
                    $falla = new Falla();
                    $fal = $falla->leerFallaEstudiante($estudiante->getIdPersona(), $mat->getIdMateria());
                    $logro = new Logro();
                    $log = $logro->leerLogro($periodo, $grad->getIdGrado(), $mat->getIdMateria());
                    
                    $pdf->SetXY($x,$y);
                    if (strlen($nombreMateria) >20) {
                            $pdf-> SetFont("Arial","",8); 
                    $pdf->Cell(4,1.5,$nombreMateria,1,0,"C");
                    $pdf-> SetFont("Arial","",9);
                    }else{
                            $pdf->Cell(4,1.5,$nombreMateria,1,0,"C");
                    }
                    $x=$x + 4;
                    $pdf->SetXY($x,$y);
                    $pdf->Cell(1,1.5,$horas,1,0,"C");
                    $x=$x + 1;
                    $pdf->SetXY($x,$y);
                    if ($periodo == "PRIMERO"){
                        $pdf->Cell(1,1.5,$fal->getPrimerP(),1,0,"C");
                        
                    }elseif ($periodo == "SEGUNDO"){
                        $pdf->Cell(1,1.5,$fal->getSegundoP(),1,0,"C");
                        
                    }elseif ($periodo == "TERCERO"){
                        $pdf->Cell(1,1.5,$fal->getTercerP(),1,0,"C");
                        
                    }elseif ($periodo== "CUARTO"){
                        $pdf->Cell(1,1.5,$fal->getCuartoP(),1,0,"C");
                    }
                    
                    $pdf->Cell(1,1.5,"",1,0,"C");
                    $x=$x + 1;
                    $pdf->SetXY($x,$y);
                    $x=$x + 1;
                    
                    if ($periodo == "PRIMERO"){
                        $pdf->Cell(1,1.5,$not->getPrimerP(),1,0,"C");
                        $suma=$suma + $not->getPrimerP();
                        
                        if ($not->getPrimerP() < 30){
                        $cadena=$log->getBajo();
                        $desempeño=" BAJO";
                        }
                        if ($not->getPrimerP() < 40 && $not->getPrimerP() >= 30){
                            $cadena=$log->getBasico();
                            $desempeño=" BASICO";
                        }
                        if ($not->getPrimerP() < 46 && $not->getPrimerP() >= 40){
                            $cadena=$log->getAlto();
                            $desempeño=" ALTO";
                        }
                        if ($not->getPrimerP() > 45){
                            $cadena=$log->getSuperior();
                            $desempeño=" SUPERIOR";
                        }
                        
                        
                    }elseif ($periodo == "SEGUNDO"){
                        $pdf->Cell(1,1.5,$not->getSegundoP(),1,0,"C");
                        $suma=$suma + $not->getSegundoP();
                        
                        if ($not->getSegundoP() < 30){
                        $cadena=$log->getBajo();
                        $desempeño=" BAJO";
                        }
                        if ($not->getSegundoP() < 40 && $not->getSegundoP() >= 30){
                            $cadena=$log->getBasico();
                            $desempeño=" BASICO";
                        }
                        if ($not->getSegundoP() < 46 && $not->getSegundoP() >= 40){
                            $cadena=$log->getAlto();
                            $desempeño=" ALTO";
                        }
                        if ($not->getSegundoP() > 45){
                            $cadena=$log->getSuperior();
                            $desempeño=" SUPERIOR";
                        }
                        
                    }elseif ($periodo == "TERCERO"){
                        $pdf->Cell(1,1.5,$not->getTercerP(),1,0,"C");
                        $suma=$suma + $not->getTercerP();
                        
                        if ($not->getTercerP() < 30){
                        $cadena=$log->getBajo();
                        $desempeño=" BAJO";
                        }
                        if ($not->getTercerP() < 40 && $not->getTercerP() >= 30){
                            $cadena=$log->getBasico();
                            $desempeño=" BASICO";
                        }
                        if ($not->getTercerP() < 46 && $not->getTercerP() >= 40){
                            $cadena=$log->getAlto();
                            $desempeño=" ALTO";
                        }
                        if ($not->getTercerP() > 45){
                            $cadena=$log->getSuperior();
                            $desempeño=" SUPERIOR";
                        }
                        
                    }elseif ($periodo== "CUARTO"){
                        $pdf->Cell(1,1.5,$not->getCuartoP(),1,0,"C");
                        $suma=$suma + $not->getCuartoP();
                        
                        if ($not->getCuartoP() < 30){
                        $cadena=$log->getBajo();
                        $desempeño=" BAJO";
                        }
                        if ($not->getCuartoP() < 40 && $not->getCuartoP() >= 30){
                            
                            $cadena=$log->getBasico();
                            $desempeño=" BASICO";
                        }
                        if ($not->getCuartoP() < 46 && $not->getCuartoP() >= 40){
                            $cadena=$log->getAlto();
                            $desempeño=" ALTO";
                        }
                        if ($not->getCuartoP() > 45){
                            $cadena=$log->getSuperior();
                            $desempeño=" SUPERIOR";
                        }
                        
                    }
                    
                    
                    $cont=$cont + 1;
                    $pdf->SetXY($x,$y);
                    $pdf->MultiCell(12,1.5,"",1);
                    $pdf-> SetFont("Arial","",7.5);
                    

                    $pdf->SetXY($x,$y + 0.5);
                    $pdf->SetMargins($x + 0.1, 1, 1);
                    $pdf->MultiCell(12,0.3,utf8_decode(strtoupper($cadena)),0);


                    $pdf->Text($x + 0.1,$y + 0.35,utf8_decode("DESEMPEÑO").$desempeño);


                    $pdf-> SetFont("Arial","",9);
                    $y=$y + 1.5;	
                    $x=1;
                }
            
            $prom=$suma / $cont;
            $pdf-> SetFont("Arial","B",9);
            $pdf->SetXY($x,$y);
            $pdf->Cell(6,0.5,"Promedio Alumno:",0,0,"R");
            $pdf->SetXY(7,$y);
            $pdf->Cell(1,0.5, round($prom,2),0,0,"R");

            $y=$y + 1;
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY(1,$y);
            $pdf->Cell(4,0.5,"OBSERVACIONES:",0,0);
            $pdf->SetXY(4,$y);
            $pdf->Cell(16,0.5,"","B",0,"R");
            $y=$y + 0.5;
            $pdf->SetXY(1,$y);
            $pdf->Cell(19,0.5,"","B",0,"R");

            $y=$y + 1;
            $pdf->SetXY(2,$y);
            $pdf->Cell(6,0.5,"","B",0,"R");

            $pdf->SetXY(12,$y);
            $pdf->Cell(6,0.5,"","B",0,"R");

            $y=$y + 0.5;
            $pdf->SetXY(2,$y);
            $pdf->Cell(5,0.5,"RECTOR",0,0,"C");

            $pdf->SetXY(12,$y);
            $pdf->Cell(6,0.5,"DIRECTOR(A) DE GRUPO",0,0,"C");
            
            }


            $pdf-> Output("Boletin ","I");
         }
    
      
         
//**************************************************************************************************//        
//**********************************FIN DE LOS METODOS*********************************************//
//**************************************************************************************************// 
    
}



?>

 