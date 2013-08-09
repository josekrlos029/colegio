<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstudianteControl
 *
 * @author AndyHenry
 */
class EstudianteControl extends Controlador{
    
    public function __construct($modelo, $accion) {
        parent::__construct($modelo, $accion);
        $this->setModelo($modelo);
    }
    /**
         * Imprime la Vista principal del Usuario Estudiante
         * @return type
         */
        public function usuarioEstudiante(){
        try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Usuario Estudiante');
            $idPersona = $_SESSION['idUsuario'];
            $persona = new Persona();
            $matricula = new Matricula();
            $salon = new Salon();
             $grado = new Grado();
            $estudiante = $persona->leerPorId($idPersona);
            $matricula = $matricula->leerMatriculaPorId($idPersona);
            $salon = $salon->leerSalonePorId($matricula->getIdSalon());
            $grado= $grado->leerGradoPorId($salon->getIdGrado());
            $this->vista->set('matricula', $matricula);
            $this->vista->set('estudiante', $estudiante);
            $this->vista->set('grado', $grado);
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
            $matricula = new Matricula();
            $matr = $matricula->leerMatriculaPorId($idPersona);
            $salon = new Salon();
            $sal = $salon->leerSalonePorId($matr->getIdSalon());
            $grado = new Grado();
            $grad= $grado->leerGradoPorId($sal->getIdGrado());
            $pensum = new Pensum();
            $pens = $pensum->leerPensum($matr->getIdSalon());
            
            $respuesta = "";
            
              $respuesta.='<table width="95%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
                    <tr>
                    <td align="right" class="color-text-azul" colspan="6"><h3>Datos Academicos</h3></td>    
                    </tr>
                    <tr class="modo1">
                    <td width="25%">Materia</td>
                    <td width="15%">Primer Periodo</td>
                    <td width="15%">Segundo Periodo</td>
                    <td width="15%">Tercer Periodo</td>
                    <td width="15%">Cuarto Periodo</td>
                    <td width="15%">promedio</td>
                    </tr>
                    </table>
                    <div style="padding-left:5px; overflow-x:hidden;width:100%; height:250px;">
                    <table width="95%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
                    ';
              $cont= 0;
              $s1=0;
              $s2=0;
              $s3=0;
              $s4=0;
            foreach ($pens as $pen){
                $cont++;
                $respuesta.='
                            <tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">';
                        $mat = new Materia();
                        $materia = $mat->leerMateriaPorId($pen->getIdMateria());
                         foreach ($materia as $mate){
                              $respuesta.='<td width="25%"><b> '.$mate->getNombreMateria().'</b> </td>';
                         }
                         $nota = new Nota();
                         $not =$nota->leerNotaEstudiante( $idPersona, $pen->getIdMateria());
                         $respuesta.='<td width="15%">'.$not->getPrimerP().'</td>';
                         $respuesta.='<td width="15%">'.$not->getSegundoP().'</td>';
                         $respuesta.='<td width="15%">'.$not->getTercerP().'</td>';
                         $respuesta.='<td width="15%">'.$not->getCuartoP().'</td>';
                         $prom=$not->getprimerP()+$not->getSegundoP()+$not->getTercerP()+$not->getCuartoP();
                         $prom=$prom/4;
                         $respuesta.='<td width="15%" class="color-text-azul">'.$prom.'</td>';
                $respuesta.='</tr>';
                
                $s1 += $not->getPrimerP();
                $s2 += $not->getSegundoP();
                $s3 += $not->getTercerP();
                $s4 += $not->getCuartoP();
            }
            
             
            $p1 = $s1/$cont; 
            $p2 = $s2/$cont; 
            $p3 = $s3/$cont; 
            $p4 = $s4/$cont; 
            
            $pg = ($p1 + $p2 + $p3 + $p4 ) /4;
            $this->vista->set('grado', $grad);
            $this->vista->set('matricula', $matr);
            $this->vista->set('tabla', $respuesta);
            $this->vista->set('p1', $p1);
            $this->vista->set('p2', $p2);
            $this->vista->set('p3', $p3);
            $this->vista->set('p4', $p4);
            $this->vista->set('pg', $pg);
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
        
        public function seguimiento(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Seguimiento Academico');
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        
        public function pension(){
         try {
            if($this->verificarSession()){
            $this->vista->set('titulo', 'Pensión');
            $idPersona = $_SESSION['idUsuario'];
            $pension = new Pago();
            $pensiones = $pension->leerPensionesPorIdPersona($idPersona);
            $this->vista->set('pensiones', $pensiones);
            return $this->vista->imprimir();
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        
        public function cargarSeguimientos(){
            try {
                if($this->verificarSession()){
                $idPersona = $_SESSION['idUsuario'];
                $tipo =  isset($_POST['tipo']) ? $_POST['tipo'] : NULL;
                $seguimiento = new Seguimiento();
                $seguimientos = $seguimiento->leerSeguimientosPorIdPersonaYTipo($idPersona, $tipo);
                
                $respuesta = '<table width="95%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">';
                $i=1;
                foreach ($seguimientos as $seg) {
                   $respuesta .= "<tr>
                        <td><b>".$i.".</b> ".$seg->getMensaje()." </br> <b>FECHA: ".$seg->getFecha()."</b></td>
                    </tr>";
                   $i++;
                }
                $respuesta .="</table>";
                echo json_encode($respuesta);
                }
            } catch (Exception $exc) {
                echo json_encode(1);
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
         
         public function consultarNotas(){
             try {
                 if($this->verificarSession()){
                    $this->vista->set('titulo', 'Consulta de Notas');
                    $idPersona = $_SESSION['idUsuario'];
                    $matricula = new Matricula();
                    $mat = $matricula->leerMatriculaPorId($idPersona);
                    $this->vista->set('matricula', $mat);
                    //$this->vista->set('persona', $persona);
                    return $this->vista->imprimir();
                  }   
             
             } catch (Exception $exc) {
                 echo $exc->getTraceAsString();
             }
         }
         
        
}

?>
