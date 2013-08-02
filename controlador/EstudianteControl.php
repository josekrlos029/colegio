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
            $estudiante = $persona->leerPorId($idPersona);
            $this->vista->set('estudiante', $estudiante);
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
            $pens = $pensum->leerPensum($sal->getIdGrado());
            
            $respuesta = "";
            
              $respuesta.='<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
                    <tr class="modo1">
                    <td>Materia</td>
                    <td>Primer Periodo</td>
                    <td>Segundo Periodo</td>
                    <td>Tercer Periodo</td>
                    <td>Cuarto Periodo</td>
                    </tr>
                    ';
              $cont= 0;
              $s1=0;
              $s2=0;
              $s3=0;
              $s4=0;
            foreach ($pens as $pen){
                $cont++;
                $respuesta.='<tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)">';
                        $mat = new Materia();
                        $materia = $mat->leerMateriaPorId($pen->getIdMateria());
                         foreach ($materia as $mate){
                              $respuesta.='<td><b> '.$mate->getNombreMateria().'</b> </td>';
                         }
                         $nota = new Nota();
                         $not =$nota->leerNotaEstudiante( $idPersona, $pen->getIdMateria());
                         $respuesta.='<td>'.$not->getPrimerP().'</td>';
                         $respuesta.='<td>'.$not->getSegundoP().'</td>';
                         $respuesta.='<td>'.$not->getTercerP().'</td>';
                         $respuesta.='<td>'.$not->getCuartoP().'</td>';
                $respuesta.='</tr>';
                
                $s1 += $not->getPrimerP();
                $s2 += $not->getSegundoP();
                $s3 += $not->getTercerP();
                $s4 += $not->getCuartoP();
            }
             $respuesta.='</table>';
             
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
