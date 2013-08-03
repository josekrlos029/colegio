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
                 if($this->verificarSession()){
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
                 }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

        }
        
        public function actualizarNotas(){
            try {
                 if($this->verificarSession()){
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
                 }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

        }
        
         public function asignarInasistencias(){
            try {
                 if($this->verificarSession()){
             $this->vista->set('titulo', 'Actualizar Inasistencias');
            $periodo =  isset($_POST['periodo']) ? $_POST['periodo'] : NULL;
            $idSalon =  isset($_POST['salon']) ? $_POST['salon'] : NULL;
            $idMateria =  isset($_POST['materia']) ? $_POST['materia'] : NULL; 
            $materia = new Materia();
            $materias= $materia->leerMateriaPorId($idMateria);
            foreach ($materias as $mats) {
                   $mat = $mats;
                }
            $docente = new Docente();
            $resultado = $docente->crearConsulta2($idSalon, $idMateria);
            $this->vista->set('periodo', $periodo);
            $this->vista->set('idSalon', $idSalon);
            $this->vista->set('materia', $mat);
            $this->vista->set('resultado', $resultado);
            return $this->vista->imprimir();
                 }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

        }
        
        public function guardarNotas(){
            try {
                 if($this->verificarSession()){
                $arreglo =  isset($_POST['notas']) ? $_POST['notas'] : NULL;
                $idMateria =  isset($_POST['idMateria']) ? $_POST['idMateria'] : NULL;
                $notas = json_decode($arreglo);
                $docente = new Docente();
                foreach($notas as $nota){
                    $docente->actualizarNota($nota[0], $idMateria, $nota[1], $nota[2], $nota[3], $nota[4]);
                }
                echo json_encode(1);
                 }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
                }
                
        public function guardarFallas(){
            try {
                 if($this->verificarSession()){
                $arreglo =  isset($_POST['fallas']) ? $_POST['fallas'] : NULL;
                $idMateria =  isset($_POST['idMateria']) ? $_POST['idMateria'] : NULL;
                $fallas = json_decode($arreglo);
                $docente = new Docente();
                foreach($fallas as $falla){
                    $docente->actualizarFalla($falla[0], $idMateria, $falla[1], $falla[2], $falla[3], $falla[4]);
                }
                echo json_encode(1);
                 }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
                }
        
                
        public function actualizarNotas2($respuesta){
            try {
                 if($this->verificarSession()){
            $arreglo = explode(',', $respuesta);
            $idPersona = $arreglo[0];
            $periodo =  $arreglo[1];
            $idSalon =  $arreglo[2];
            $idMateria =  $arreglo[3]; 
            $materia = new Materia();
            $materias= $materia->leerMateriaPorId($idMateria);
            foreach ($materias as $mats) {
                   $mat = $mats;
                }
            
            $docente = new Docente();
            $resultado = $docente->crearConsultaPorIdPersona($idPersona, $idSalon, $idMateria);
            $this->setVista("actualizarNotas");
            $this->vista->set('periodo', $periodo);
            $this->vista->set('idSalon', $idSalon);
            $this->vista->set('materia', $mat);
            $this->vista->set('resultado', $resultado);
            $this->vista->set('titulo', 'Actualizar Notas');
            return $this->vista->imprimir();
                 }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            }
            
            public function actualizarLogros(){
                 if($this->verificarSession()){
                     try {
                            $this->vista->set('titulo', 'ingreso de Logros');
                            $carga = new Carga();
                            $idDocente = $_SESSION['idUsuario'];
                            $Cargas = $carga->leerCargasPorDocente($idDocente);
                            $this->vista->set('cargas', $Cargas);
                            return $this->vista->imprimir();
                     } catch (Exception $exc) {
                         echo $exc->getTraceAsString();
                     }
                  }
            }
            
            public function cargarLogros(){
                try {
                    $idSalon =  isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
                    $idMateria =  isset($_POST['idMateria']) ? $_POST['idMateria'] : NULL;
                    $periodo =  isset($_POST['periodo']) ? $_POST['periodo'] : NULL;
                    $logro = new Logro();
                    $log = $logro->leerLogro($periodo, $idSalon, $idMateria);
                    $superior=NULL;
                    $alto=NULL;
                    $basico=NULL;
                    $bajo = NULL;
                    if ($log == NULL ){
                        $logro->setPeriodo($periodo);
                        $logro->setIdSalon($idSalon);
                        $logro->setIdMateria($idMateria);
                        $logro->setSuperior($superior);
                        $logro->setAlto($alto);
                        $logro->setBasico($basico);
                        $logro->setBajo($bajo);
                        $logro->crearLogro($logro);
                    }else{
                        $superior=$log->getSuperior();
                        $alto=$log->getAlto();
                        $basico=$log->getBasico();
                        $bajo = $log->getBajo();
                    }
                        
                    $respuesta = "<tr> 
                                        <td align='center'><h5>Logro Superior </h5> </td>
                                  </tr>
                                  <tr> 
                                        <td align='center'><textarea id='superior' maxlength='213' autofocus placeholder='Aquí debes escribir el Logro Superior' rows='4' cols='60'  >".$superior."</textarea><input x-webkit-speech onwebkitspeechchange='onChange1(this.value)' id='record1'/> </td>
                                  </tr>
                                  <tr> 
                                        <td align='center'><h5>Logro Alto </h5> </td>
                                  </tr>
                                  <tr> 
                                        <td align='center'><textarea id='alto' maxlength='213' placeholder='Aquí debes escribir el Logro Alto' rows='4' cols='60'  >".$alto."</textarea><input x-webkit-speech onwebkitspeechchange='onChange2(this.value)' id='record2'/> </td>
                                  </tr>
                                  <tr> 
                                        <td align='center'><h5>Logro Basico </h5> </td>
                                  </tr>
                                  <tr> 
                                       <td align='center'><textarea id='basico' maxlength='213' placeholder='Aquí debes escribir el Logro Basico' rows='4' cols='60'  >".$basico."</textarea><input x-webkit-speech onwebkitspeechchange='onChange3(this.value)' id='record3'/> </td>
                                  </tr>
                                  <tr> 
                                        <td align='center'><h5>Logro Bajo </h5> </td>
                                  </tr>
                                  <tr> 
                                       <td align='center'><textarea id='bajo' maxlength='213' placeholder='Aquí debes escribir el Logro Bajo' rows='4' cols='60'  >".$bajo."</textarea><input x-webkit-speech onwebkitspeechchange='onChange4(this.value)' id='record4'/> </td>
                                  </tr>
                                  <tr> 
                                       <td align='center'><button name='guardarLogros' id='guardarLogros' class='button large red' onclick='guardarLogros()'>Guardar</button></td>
                                  </tr>
                                  ";
                    echo json_encode($respuesta);
                    
                } catch (Exception $exc) {
                    echo json_encode($exc->getMessage());
                }
                           
            }
            
            public function guardarLogro(){
                try {
                    $idSalon =  isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
                    $idMateria =  isset($_POST['idMateria']) ? $_POST['idMateria'] : NULL;
                    $periodo =  isset($_POST['periodo']) ? $_POST['periodo'] : NULL;
                    $superior=isset($_POST['superior']) ? $_POST['superior'] : NULL;
                    $alto=isset($_POST['alto']) ? $_POST['alto'] : NULL;
                    $basico=isset($_POST['basico']) ? $_POST['basico'] : NULL;
                    $bajo = isset($_POST['bajo']) ? $_POST['bajo'] : NULL;
                    $logro = new Logro();
                    $logro->setPeriodo($periodo);
                    $logro->setIdSalon($idSalon);
                    $logro->setIdMateria($idMateria);
                    $logro->setSuperior($superior);
                    $logro->setBasico($basico);
                    $logro->setAlto($alto);
                    $logro->setBajo($bajo);
                    $logro->crearLogro($logro);
                    echo json_encode(1);
                } catch (Exception $exc) {
                    echo json_encode(0);
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
                        
         public function configurarUsuario() {
             parent::configurarUsuario();
         }
         
         public function configurarContraseña() {
             parent::configurarContraseña();
         }
         
         public function configurarCorreo() {
             parent::configurarCorreo();
         }
                
    
}             


?>
