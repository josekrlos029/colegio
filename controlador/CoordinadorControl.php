<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CoordinadorControl
 *
 * @author AndyHenry
 */
class CoordinadorControl extends Controlador{
    
    public function __construct($modelo, $accion) {
        parent::__construct($modelo, $accion);
        $this->setModelo($modelo);
    }
    /**
         * Imprime la Vista principal del Usuario Coordinador
         * @return type
         */
        public function usuarioCoordinador(){
        try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Usuario Coordiandor');
            $idPersona = $_SESSION['idUsuario'];
            $persona = new Persona();
            $coordinador = $persona->leerPorId($idPersona);
            $this->vista->set('coordinador', $coordinador);
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
        
    
}

?>
