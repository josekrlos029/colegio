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
            if($estudiante->getEstado()=='0'){
                 echo "El estudiante se encuentra Ihabilitado";
            }else{
            $matricula = $matricula->leerMatriculaPorId($idPersona);
            $salon = $salon->leerSalonePorId($matricula->getIdSalon());
            $grado= $grado->leerGradoPorId($salon->getIdGrado());
            $this->vista->set('matricula', $matricula);
            $this->vista->set('estudiante', $estudiante);
            $this->vista->set('grado', $grado);
            $ruta = 'utiles/imagenes/fotos/';
            if (file_exists($ruta.$idPersona.'.jpg')) {
                $img= '<a href="/colegio/acudiente/usuarioAcudiente"><img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.jpg"></a>';
            }elseif (file_exists($ruta.$idPersona.'.png')) {
                $img= '<a href="/colegio/acudiente/usuarioAcudiente"><img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.png"></a>';
            }elseif (file_exists($ruta.$idPersona.'.jpeg')) {
                $img= '<a href="/colegio/acudiente/usuarioAcudiente"><img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.jpeg"></a>';
            }else{
                $img= '<a href="/colegio/acudiente/usuarioAcudiente"><img height="150px" width="150px" src="../utiles/imagenes/avatarDefaul.png"></a>';
            }
            $this->vista->set('img', $img);
            return $this->vista->imprimir();
            
            }
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        public function cerrarSesion() {
             parent::cerrarSesion();
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
                         $prom=round($nota->calcularDef2($not->getprimerP(),$not->getSegundoP(),$not->getTercerP(),$not->getCuartoP()),2);
                         //$prom=$prom/4;
                         $respuesta.='<td width="15%" class="color-text-azul">'.$prom.'</td>';
                $respuesta.='</tr>';
                
                $s1 += $not->getPrimerP();
                $s2 += $not->getSegundoP();
                $s3 += $not->getTercerP();
                $s4 += $not->getCuartoP();
            }
            
             
            $p1 = round($s1/$cont,2); 
            $p2 = round($s2/$cont,2); 
            $p3 = round($s3/$cont,2); 
            $p4 = round($s4/$cont,2); 
            
            //$pg = round((($p1 + $p2 + $p3 + $p4 ) /4), 2);
            $pg = round($nota->calcularDef2($p1 , $p2 , $p3 , $p4 ), 2);
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
        
        public function datosAcademicosMovil(){
         try {
            $idPersona =  isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;
            $this->vista->set('titulo', 'Datos Academicos');
            $matricula = new Matricula();
            $matr = $matricula->leerMatriculaPorId($idPersona);
            $salon = new Salon();
            $sal = $salon->leerSalonePorId($matr->getIdSalon());
            $grado = new Grado();
            $grad= $grado->leerGradoPorId($sal->getIdGrado());
            $pensum = new Pensum();
            $pens = $pensum->leerPensum($matr->getIdSalon());
            
            $respuesta = "";
            
              $respuesta.='<table >
                    <tr>
                    <td align="left" class="color-text-azul" colspan="6"><h3>Datos Academicos</h3></td>    
                    </tr>
                    </table>
                    <table style="font-size: 11px" width="98%" border="0" cellspacing="0" cellpadding="2" align="center" class="table tBlue">
                    <tr class="modo1">
                    <td width="25%"><b>Materia</td>
                    <td width="15%"><b>P.1</b></td>
                    <td width="15%"><b>P.2</b></td>
                    <td width="15%"><b>P.3</b></td>
                    <td width="15%"><b>P.4</b></td>
                    <td width="15%"><b>Prom.</b></td>
                    </tr>
                    
                    
                    ';
              $cont= 0;
              $s1=0;
              $s2=0;
              $s3=0;
              $s4=0;
            foreach ($pens as $pen){
                $cont++;
                $respuesta.='
                            <tr>';
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
                         $prom=round($nota->calcularDef2($not->getprimerP(),$not->getSegundoP(),$not->getTercerP(),$not->getCuartoP()),2);
                         //$prom=$prom/4;
                         $respuesta.='<td width="15%" class="color-text-azul">'.$prom.'</td>';
                $respuesta.='</tr>';
                
                $s1 += $not->getPrimerP();
                $s2 += $not->getSegundoP();
                $s3 += $not->getTercerP();
                $s4 += $not->getCuartoP();
            }
           
            $p1 = round($s1/$cont,2); 
            $p2 = round($s2/$cont,2); 
            $p3 = round($s3/$cont,2); 
            $p4 = round($s4/$cont,2); 
            
            //$pg = round((($p1 + $p2 + $p3 + $p4 ) /4), 2);
            $pg = round($nota->calcularDef2($p1 , $p2 , $p3 , $p4 ), 2);
            $this->vista->set('grado', $grad);
            $this->vista->set('matricula', $matr);
            $this->vista->set('tabla', $respuesta);
            $this->vista->set('p1', $p1);
            $this->vista->set('p2', $p2);
            $this->vista->set('p3', $p3);
            $this->vista->set('p4', $p4);
            $this->vista->set('pg', $pg);
            return $this->vista->imprimir();
            
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
          public function seguimiento() {
             parent::seguimiento();
         }
          public function pension() {
             parent::pension();
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
         
           public function notificaciones(){
         try {
             if($this->verificarSession()){
            $this->vista->set('titulo', 'Notificaciones');
            $destino1=1;
            $destino2=3;
            $notificacion = new Notificacion();
            $noti = $notificacion->leerPorDestino($destino1,$destino2);
             $this->vista->set('noti', $noti);
            return $this->vista->imprimir();;
            }
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        
        public function notificacionesMovil(){
         try {
             
            $this->vista->set('titulo', 'Notificaciones');
            $destino1=1;
            $destino2=3;
            $notificacion = new Notificacion();
            $noti = $notificacion->leerPorDestino($destino1,$destino2);
             $this->vista->set('noti', $noti);
            return $this->vista->imprimir();;
            
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
         
        public function pensionMovil(){
         try {
            
             $idPersona =  isset($_POST['idPersona']) ? $_POST['idPersona'] : NULL;    
            $this->vista->set('titulo', 'Pensión');
            $pension = new Pago();
            $pensiones = $pension->leerPensionesPorIdPersona($idPersona);
            $this->vista->set('pensiones', $pensiones);
            return $this->vista->imprimir();
            
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        public function seguimientoMovil(){
         try {
            
            $this->vista->set('titulo', 'Seguimiento Academico');
            return $this->vista->imprimir();
            
        } catch (Exception $exc) {
            echo 'Error de aplicacion: ' . $exc->getMessage();
        }
            
        }
        
}

?>