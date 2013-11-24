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
            
            //:___________________________-
            $respuesta = "";
            
              $respuesta.='<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
                     
                    <tr><td align="center" class="color-text-gris" colspan="11"><h1>Salon:'.$idSalon.'</h1></td></tr>
                    <tr class="modo1">
                    <td>N°</td>
                    <td>Nombres</td>
                    ';
              $notaa = new Nota();
              $proms= array();
              
            foreach ($vec as $v){
                        $mat = new Materia();
                        $materia = $mat->leerMateriaPorId($v);
                        $notas1=$notaa->leerPorMateria($idSalon, $v);
                        $suma=0;
                        
                        foreach ($notas1 as $n1){
                            if($periodo == 'PRIMERO'){
                            $suma += $n1->getPrimerP(); 
                        }else if($periodo == 'SEGUNDO'){
                            $suma += $n1->getSegundoP(); 
                            
                        }else if($periodo == 'TERCERO'){
                            $suma += $n1->getTercerP(); 
                            
                        }else if($periodo == 'CUARTO'){
                            
                            $suma += $n1->getCuartoP(); 
                        }else if($periodo == 'FINAL'){
                            $suma += $n1->getDefinitiva(); 
                            
                        }                           
                        }
                        
                         foreach ($materia as $mate){
                              $respuesta.='<td>'.$mate->getNombreMateria().'</td>';
                              $proms[$mate->getNombreMateria()]= $suma / count($notas1);
                         }
            }
            
            $proms = json_encode($proms);
             $respuesta.='</tr>';
             $persona = new Persona();
             $personas=$persona->leerPorSalon($idSalon);
             $cont = 0;
              foreach ($personas as $per){
                  $cont++;
                  $respuesta.='<tr  onmouseover="cambiacolor_over(this)" onmouseout="cambiacolor_out(this)"> <td>'.$cont.'</td><td>'.$per->getPApellido().' '.$per->getSApellido().' '.$per->getNombres().'</td>';
                foreach ($vec as $v){
                        $nota = new Nota();
                        $not =$nota->leerNotaEstudiante( $per->getIdPersona(), $v);
                        if($periodo == 'PRIMERO'){
                            $respuesta.='<td>'.$not->getPrimerP().'</td>';
                        }else if($periodo == 'SEGUNDO'){
                            $respuesta.='<td>'.$not->getSegundoP().'</td>';
                            
                        }else if($periodo == 'TERCERO'){
                            $respuesta.='<td>'.$not->getTercerP().'</td>';
                            
                        }else if($periodo == 'CUARTO'){
                            
                            $respuesta.='<td>'.$not->getCuartoP().'</td>';
                        }else if($periodo == 'FINAL'){
                            $respuesta.='<td>'.$not->getDefinitiva().'</td>';
                            
                        }
                            
                        }
              $respuesta.='</tr>';
              
             }
                $respuesta.='</table>';

                $s = "'".$idSalon."'";
                $p = "'".$periodo."'";
                $respuesta .= '<form method="post" target="_blank" action="/colegio/administrador/imprimirConsolidado" >';
                $respuesta.='<input type="hidden" id="idSalon" name="idSalon" value="'.$idSalon.'" />';
                $respuesta.='<input type="hidden" id="periodo" name="periodo" value="'.$periodo.'" />';
                $respuesta.='<input type="submit" id="imprimir" value="Imprimir" class="button large red" />';
                $uno="'light'";
                $dos="'none'";
                $tres="'fade'";
                $cua="'block'";
                $respuesta.='</form><a href="#"><button id="btn" onclick="vistaRendimiento()" class="button large blue">Rendimiento</button></a>
                    <div id="fade" class="overlay"></div>
<div id="light" class="modal">
  <div style="float:right">
      <a href = "javascript:void(0)" onclick = "document.getElementById('.$uno.').style.display='.$dos.';document.getElementById('.$tres.').style.display='.$dos.'"><img src="../utiles/imagenes/iconos/close.png"/></a>
 </div>
     <div style="margin: 0 auto;" id="tablaConsulta">
         <h1 style="margin-left: 430px">Rendimiento.. Salon:</h1>
          <div id="chart2" class="example-chart" style="height:300px;width:500px"></div>
      </div>
</div><script>function vistaRendimiento(){

    document.getElementById('.$uno.').style.display='.$cua.';
    document.getElementById('.$tres.').style.display='.$cua.';
        var line1 = [['.$uno.', 4],['.$uno.', 6],['.$uno.', 2],['.$uno.', 5],['.$uno.', 6]];

    $("#chart2").jqplot([line1], {
        title:"Bar Chart with Varying Colors",
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {
                // Set the varyBarColor option to true to use different colors for each bar.
                // The default series colors are used.
                varyBarColor: true
            }
        },
        axes:{
            xaxis:{
                renderer: $.jqplot.CategoryAxisRenderer
            }
        }
    });
}</script>';
               
            if (strlen($respuesta)>0){
            echo json_encode($respuesta);  
            }  else {
                echo json_encode("<tr> </tr>"); 
            }
            
             } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
            
        }
        
        public function imprimirConsolidado(){
            try {
            $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
            $periodo = isset($_POST['periodo']) ? $_POST['periodo'] : NULL;
            $pensum = new Pensum();
            $pens = $pensum->leerPensum($idSalon);
            
            $pdf=new FPDF('L','cm','Legal');
            
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
                    
                $pdf->AddPage();     
                $pdf-> SetFont("Arial","B",18);
                $pdf->SetXY(1,1);
                $pdf->cell(33,1,"CONSOLIDADO ACADEMICO DE ".$idSalon.", PERIODO: ".$periodo,1,0,"C");
                   
              $x = 1;
              $y = 2;
              $pdf-> SetFont("Arial","B",8);
              $pdf->SetXY($x,$y);
              $pdf->Cell(1,1,utf8_decode("N°"),1,0,"C");
              $x++;
              $pdf->SetXY($x,$y);
              $pdf->Cell(3,1,"NOMBRE",1,0,"C");
              $x=5;
              foreach ($vec as $v){
                    $mate = new Materia();
                    $materias = $mate->leerMateriaPorId($v);
                    foreach ($materias as $materia){
                        
                        $nombreMateria = $materia->getNombreMateria();
                        $pdf->SetXY($x,$y);
                        $pdf-> SetFont("Arial","B",7);                        
                        if(strlen($nombreMateria)<12){
                            $nombreMateria .= "\n   ";
                        }
                                               
                        //$pdf->Cell(3,0.5,$nombreMateria,1,0,"C");
                        $pdf->MultiCell(2.071,0.5,utf8_decode(strtoupper($nombreMateria)),1,"C");
                        $x = $x+2.071;
                    }
                    
              }
              $y++;
              $x=1;
              $persona = new Persona();
              $personas=$persona->leerPorSalon($idSalon);
              $cont = 0;
              foreach ($personas as $per){
                  $cont++;
                  if($cont==17){
                      $pdf->AddPage();
                      $y=1;                        
                        }
                  $x=1;
                  $pdf->SetXY($x,$y);
                  $pdf-> SetFont("Arial","B",8);
                  $pdf->Cell(1,1,utf8_decode($cont),1,0,"C");
                  $pdf->SetXY(2,$y);
                  $nombre=$per->getPApellido()." ".$per->getNombres();
                  $pdf-> SetFont("Arial","B",7);
                  if(strlen($nombre)<19){
                            $nombre .= "\n   ";
                        }
                  $pdf->MultiCell(3,0.5,utf8_decode($nombre),1,"C");
                  $x=5;
                  
                 foreach ($vec as $v){
                     $pdf-> SetFont("Arial","",10);
                        $nota = new Nota();
                        $not =$nota->leerNotaEstudiante( $per->getIdPersona(), $v);
                        if($periodo == 'PRIMERO'){
                            $n=$not->getPrimerP();
                        }else if($periodo == 'SEGUNDO'){
                            $n=$not->getSegundoP();
                        }else if($periodo == 'TERCERO'){
                            $n=$not->getTercerP();                            
                        }else if($periodo == 'CUARTO'){                            
                            $n=$not->getCuartoP();
                        }else if($periodo == 'FINAL'){
                            $n = $nota->calcularDef2($not->getPrimerP(), $not->getSegundoP(), $not->getTercerP(), $not->getCuartoP());
                        }
                        $pdf->SetXY($x,$y);
                        if ( $n < 30 ){
                            $pdf->SetTextColor(255,0,0);
                        }                            
                        $pdf->MultiCell(2.071,0.5,utf8_decode($n."\n  "),1,"C");
                        $pdf->SetTextColor(0,0,0);
                        $x = $x+2.071;
                       }
                       
                       $x=1;
                       $y++;
              
             }

              
              
              $pdf-> Output("Consolidado ".$idSalon,"I");
            if (strlen($respuesta)>0){
            echo json_encode($respuesta);  
            }  else {
                echo json_encode("<tr> </tr>"); 
            }
            
             } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
        }    
            
        }
        
        
        
        public function generarPension(){
            try {
            $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
            $anio = isset($_POST['anio']) ? $_POST['anio'] : NULL;
            
            $persona = new Persona();
            $personas = $persona->leerPorSalon($idSalon);
            $pagos = ['MATRICULA','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SEPTIEMBRE','OCTUBRE','NOVIEMBRE','VR.PENSION'];
            $this->vista->set('idSalon', $idSalon);
            $this->vista->set('anio', $anio);
            $this->vista->set('personas', $personas);
            $this->vista->set('pagos', $pagos);
            return $this->vista->imprimir();
            
             } catch (Exception $exc) {
            
            }    
            
        }
        
        public function generarHistorial(){
            try {
            $idSalon = isset($_POST['idSalon']) ? $_POST['idSalon'] : NULL;
            $anio = isset($_POST['anio']) ? $_POST['anio'] : NULL;
            
            $historial = new Historial();
            $matricula = new Matricula();
            $matriculas = $matricula->leerMatriculasPorAnio($anio, $idSalon);            
            $persona = new Persona();
            $respuesta = "";
             $respuesta.='<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla" id="tabla">
                    <tr class="modo1">
                    <td>Identificación</td>
                    <td>P.Apellido</td>
                    <td>S.Apellido</td>
                    <td>Nombres</td>
                    ';
             $band =0;
            foreach ($matriculas as $mat){
                    $hist = $historial->leerHistorialPorIdPersona($anio, $mat->getIdPersona());
                    if(count($hist) > 0){
                        $per = $persona->leerPorId($mat->getIdPersona());
                        if($band==0){
                            foreach ($hist as $h){
                                $materia = new Materia();
                                $mate = $materia->leerMateriaPorId($h->getIdMateria());
                                foreach ($mate as $mm){
                                    echo '<td>'.$mm->getNombreMateria().'</td>';
                                }   
                            }
                            $respuesta.='</tr>';
                            $band = 1;
                        }
                        if($per!=NULL  && count($hist)>0){
                            $respuesta.='<tr><td>'.$per->getIdPersona().'</td>
                                             <td>'.$per->getPApellido().'</td>
                                             <td>'.$per->getSApellido().'</td>
                                             <td>'.$per->getNombres().'</td>';
                            foreach ($hist as $hh){
                                $respuesta.='<td>'.$hh->getDefinitiva().'</td>';
                            }
                             $respuesta.='</tr>';
                        }
                        $respuesta.='</table>';
                    }
            }
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
                    <td align="center"><a href="#" onclick="inhabilitarPersona ('. strtoupper ($est->getIdPersona()).') "><img src="../utiles/imagenes/iconos/inhabilitarPersona.png"/></a></td>
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
            $respuesta = "";
            
              $respuesta.='<table width="90%" border="0" cellspacing="0" cellpadding="2" align="center" class="tabla">
                     
                    <td align="center" class="color-text-gris" colspan="11"><h1>Inhabilitados</h1></td></tr>
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
                    <td>Habilitar</td>
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
                    <td align="center"><a href="#" onclick="habilitarPersona ('. strtoupper ($est->getIdPersona()).') "><img widht="20px" height="20px" src="../utiles/imagenes/iconos/habilitarPersona.png"/></a></td>
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
                    <td align="center"><a href="#" onclick="eliminarPersona ('. strtoupper ($doc->getIdPersona()).') "><img src="../utiles/imagenes/iconos/InhabilitarPersona.png"/></a></td>
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
         $respuesta="";
             if( $not->getDestino()== 1){
                    $destino= "ESTUDIANTES Y ACUDIENTES";
                    }
                    if($not->getDestino() == 2){
                    $destino = "DOCENTES";
                    }
                    if($not->getDestino()== 3){
                    $destino = "ESTUDIANTE Y DOCENTES";
                    }
           $respuesta.='      
                        
                           <table border="0" width="100%" id="inf-Personal"> 
                                      <tr><td>Asunto : <span>'.$not->getAsunto().'</span></td></tr>
                                      <tr><td>Mensaje :<span> '.$not->getMensaje().'</td></tr>  
                                       <tr><td> Fecha del Evento :<span>'.$not->getFecha_evento().'</span></td> </tr>                                        
                                       <tr><td>Hora : <span>'.$not->getHora().'</span></td></tr> 
                                       <tr><td>Destino :<span>'.$destino.'</span></td</tr> 
                                       <tr><td>Fecha de Registro :<span>'.$not->getFecha_ingreso().'</span></td></tr>
                       
                                </table>
             ';
          
            if (strlen($respuesta)>0){
            echo json_encode($respuesta);  
            } else {
                echo json_encode("<tr></tr>"); 
            } 
           } catch (Exception $exc) {
            echo json_encode('Error de aplicacion: ' . $exc->getMessage()) ;
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
                    }elseif ($mat == NULL){
                      $respuesta= 2;
                    }else{
                  
                        $respuesta = '<table class="tabla" width="100%"> 
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
             $fecha = getdate();
                    $Alectivo=$fecha["year"];
             $mat = new Matricula();
             $mat->retirarEstudiante($idPersona, $Alectivo);
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
                   $est = new Estudiante();
                   $est->leerAcudiente($idPersona,$est);
                   $est->leerPadre($idPersona,$est);
                   $est->leerMadre($idPersona,$est);
            
                        $respuesta = ' 
                                
                                 <table width="90%">
                                 <tr>
                                 <td>
                                       <table border="0" cellspacing="0" cellpadding="2">
                                        <tr>
                                        <td></td>
                                        <td align="left" class="color-text-gris"><h1>ESTUDIANTE</h1></td>
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
                                        <td></td><td><input name="actualizaEstudiante" id="actualizaEstudiante" type="submit" value="Actualizar Estudiante" class="button large blue" onclick="actualizarEstudiante()" /></td>
                                         </tr>
                                        </table>  
                                   </td>
                                   <td>
                                        <table border="0" cellspacing="0" cellpadding="2">
                                        <tr>
                                        <td></td>
                                        <td align="left" class="color-text-gris"><h1>acudiente</h1></td>
                                        </tr> 
                                         <tr>
                                         <td  align="right" width="40%" >Numero de Identificacion:</td>
                                        <td><input name="idAcudiente" id="idAcudiente" type="text" class="box-text" value="'. $est->getIdAcudiente().'" disabled="disabled" readonly="readonly"/></td>
                                        </tr>
                                       <tr>
                                         <td align="right">Nombres:</td>
                                        <td><input name="nombresAcu" id="nombresAcu" type="text" class="box-text" value="'.$est->getNombresAcudiente().'" required/></td>
                                        </tr>  
                                        <tr>
                                         <td align="right">Apellidos:</td>
                                         <td><input name="apellidosAcu" id="apellidosAcu" type="text" class="box-text" value="'.$est->getApellidosAcudiente().'" required/></td>
                                         </tr>
                                          <tr>
                                         <td align="right">Ocupacion:</td>
                                          <td><input name="ocupacionAcu" id="ocupacionAcu" type="text" class="box-text" value="'.$est->getOcupacionAcudiente().'" /></td>
                                          </tr>
                                         <tr>
                                         <td align="right">Telefono:</td>
                                          <td><input name="telefonoAcu" id="telefonoAcu" type="number" class="box-text" value="'.$est->gettelAcudiente().'" /></td>
                                          </tr>
                                          <tr>
                                          <td align="right">Telefono de Oficina:</td>
                                         <td><input name="telOfiAcu" id="telOfiAcu" type="text"  class="box-text" value="'.$est->getTelOficinaAcudiente().'" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right">Direccion:</td>
                                         <td><input name="direccionAcu" id="direccionAcu" type="text"  class="box-text" value="'.$est->getDirAcudiente().'" /></td>
                                        </tr>
              
                                     <tr>
                                        <td></td><td><input name="actualizaAcudiente" id="actualizaAcudiente" type="submit" value="Actualizar Acudiente" class="button large blue" onclick="actualizaAcudiente()" /></td>
                                         </tr>
                                        </table>
                                      </td>
                                      </tr>
                                      </table>
                                      
                                      </br>
                                      </br>
                                    
                                     <table width="90%">
                                      <tr>
                                      <td>
                                        <table border="0" cellspacing="0" cellpadding="2">
                                        <tr>
                                        <td></td>
                                        <td align="left" class="color-text-gris"><h1>Padre</h1></td>
                                        </tr> 
                                         <tr>
                                         <td  align="right" width="40%" >Numero de Identificacion:</td>
                                        <td><input name="idPadre" id="idPadre" type="text" class="box-text" value="'. $est->getIdPadre().'" disabled="disabled" readonly="readonly"/></td>
                                        </tr>
                                       <tr>
                                         <td align="right">Nombres:</td>
                                        <td><input name="nombresPad" id="nombresPad" type="text" class="box-text" value="'.$est->getNombresPadre().'" required/></td>
                                        </tr>  
                                        <tr>
                                         <td align="right">Apellido:s</td>
                                         <td><input name="apellidosPad" id="apellidosPad" type="text" class="box-text" value="'.$est->getApellidosPadre().'" required/></td>
                                         </tr>
                                          <tr>
                                         <td align="right">Ocupacion:</td>
                                          <td><input name="ocupacionPad" id="ocupacionPad" type="text" class="box-text" value="'.$est->getOcupacionPadre().'" /></td>
                                          </tr>
                                         <tr>
                                         <td align="right">Telefono:</td>
                                          <td><input name="telefonoPad" id="telefonoPad" type="number" class="box-text" value="'.$est->getTelPadre().'" /></td>
                                          </tr>
                                          <tr>
                                          <td align="right">Telefono de Oficina:</td>
                                         <td><input name="telOfiPad" id="telOfiPad" type="text"  class="box-text" value="'.$est->getTelOficinaPadre().'" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right">Direccion:</td>
                                         <td><input name="direccionPad" id="direccionPad" type="text"  class="box-text" value="'.$est->getDirPadre().'" /></td>
                                        </tr>
                                     
                                     <tr>
                                        <td></td><td><input name="actualizaPadre" id="actualizaPadre" type="submit" value="Actualizar Padre" class="button large blue" onclick="actualizaPadre()" /></td>
                                         </tr>
                                        </table>
                                     </td>
                                 <td>
                                        <table  border="0" cellspacing="0" cellpadding="2">
                                        <tr>
                                        <td></td>
                                        <td align="left" class="color-text-gris"><h1>Madre</h1></td>
                                        </tr> 
                                         <tr>
                                         <td  align="right" width="40%" >Numero de Identificacion:</td>
                                        <td><input name="idMadre" id="idMadre" type="text" class="box-text" value="'. $est->getIdMadre().'" disabled="disabled" readonly="readonly"/></td>
                                        </tr>
                                       <tr>
                                         <td align="right">Nombres:</td>
                                        <td><input name="nombresMad" id="nombresMad" type="text" class="box-text" value="'.$est->getNombresMadre().'" required/></td>
                                        </tr>  
                                        <tr>
                                         <td align="right">Apellidos:</td>
                                         <td><input name="apellidosMad" id="apellidosMad" type="text" class="box-text" value="'.$est->getApellidosMadre().'" required/></td>
                                         </tr>
                                          <tr>
                                         <td align="right">Ocupacion:</td>
                                          <td><input name="ocupacionMad" id="ocupacionMad" type="text" class="box-text" value="'.$est->getOcupacionMadre().'" /></td>
                                          </tr>
                                         <tr>
                                         <td align="right">Telefono:</td>
                                          <td><input name="telefonoMad" id="telefonoMad" type="number" class="box-text" value="'.$est->getTelMadre().'" /></td>
                                          </tr>
                                          <tr>
                                          <td align="right">Telefono de Oficina:</td>
                                         <td><input name="telOfiMad" id="telOfiMad" type="text"  class="box-text" value="'.$est->getTelOficinaMadre().'" /></td>
                                        </tr>
                                        <tr>
                                          <td align="right">Direccion:</td>
                                         <td><input name="direccionMad" id="direccionMad" type="text"  class="box-text" value="'.$est->getDirMadre().'" /></td>
                                        </tr>
                                     
                                     <tr>
                                        <td></td><td><input name="actualizaMadre" id="actualizaMadre" type="submit" value="Actualizar Madre" class="button large blue" onclick="actualizaMadre()" /></td>
                                         </tr>
                                        </table>
                                   </td>
                                      </tr>
                                      </table>
                                      </div>
                                      <div style="margin:5%;"> 
                      <h1>MODIFICAR IMAGEN</h1>
                      <p>Por favor Seleccion la imagen que desea para su Perfil.</br>EXTENSIONES ACEPTADAS: .jpeg .jpg .png </br> TAMAÑO MAXIMO: 4MB</p>
                      <form action="/colegio/administrador/actualizarFotoEstudiante" method="post" enctype="multipart/form-data" name="form1">
                          <input type="file" name="foto" id="foto">
                          <input type="hidden" name="url" value="/colegio/administrador/actualizarEstudiante">
                          <input type="hidden" name="idPersona" value="'.$idPersona.'">
                          <input type="submit" name="enviar" value="Enviar" class="button large blue" >
                      </form>
                  </div>

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
             $ruta = 'utiles/imagenes/fotos/';
            if (file_exists($ruta.$idPersona.'.jpg')) {
                $img= '<img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.jpg">';
            }elseif (file_exists($ruta.$idPersona.'.png')) {
                $img= '<img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.png">';
            }elseif (file_exists($ruta.$idPersona.'.jpeg')) {
                $img= '<img height="150px" width="150px" src="../utiles/imagenes/fotos/'.$idPersona.'.jpeg">';
            }else{
                $img= '<img height="150px" width="150px" src="../utiles/imagenes/avatarDefaul.png">';
            }
            
             if ($rol == 'D'){ 
            $respuesta = "";
            
            
            
            $respuesta = ' <div class="contenedorDp" >     
                            <div class="marcoAvatardoc">
                                <div class="avatar">
                                    <span class="rounded">
                                        '.$img.'
                                    </span> 
                                </div>    
                            </div> 
          ';
            }elseif($rol == 'E'){
            $respuesta = ' <div class="contenedorDp" >     
                            <div class="marcoAvatarest">
                                <div class="avatar">
                                    <span class="rounded">
                                        '.$img.'
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
                                        <td><input name="idPersona" id="idPersona" type="text" class="box-text" value="'.$persona->getidPersona().'" disabled="disabled" readonly="readonly"/></td>
                                        </tr>
                                       <tr>
                                         <td align="right">Nombres:</td>
                                        <td><input name="nombres" id="nombres" type="text" class="box-text" value="'.$persona->getNombres().'" required/></td>
                                        </tr>  
                                        <tr>
                                         <td align="right">Primer Apellido:</td>
                                         <td><input name="pApellido" id="pApellido" type="text" class="box-text" value="'.$persona->getPApellido().'" required/></td>
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
            $cfg = Configuracion::getConfiguracion('colegio');
            $colegio= $cfg['NOMBRE'];
            $reporte = new Reportes();
            if ($colegio=="galois"){
                $reporte->boletinGalois($idSalon, $periodo);
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
            
}
?>