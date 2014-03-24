<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reportes
 *
 * @author JoseCarlos
 */
class Reportes {
 
    public function matriculaGalois($idPersona){
        $estudiante = new Estudiante();
            $est = $estudiante->leerPorId($idPersona);
            $estudiante->leerDatos($idPersona, $est);
            $estudiante->leerNacimiento($idPersona, $est);
            $estudiante->leerUbicacion($idPersona, $est);
            $estudiante->leerPadre($idPersona, $est);
            $estudiante->leerMadre($idPersona, $est);
            $estudiante->leerAcudiente($idPersona, $est);
            
            $matricula = new Matricula();
            $mat = $matricula->leerMatriculaPorId($idPersona);
            
            $salon = new Salon();
            $sal = $salon->leerSalonePorId($mat->getIdSalon());
            
            $grado = new Grado();
            $grad = $grado->leerGradoPorId($sal->getIdGrado());
            
            $ape= $est->getPApellido()." ".$est->getSApellido();
            $nom= $est->getNombres();
            $sexo= $est->getSexo();
            $tel= $est->getTelefono();

            $fecha_nac=$est->getFNacimiento();
            $lugar_nac=$est->getMunicipioNacimiento();

            $direccion=$est->getDireccion();
            $barrio=$est->getBarrio();
            
            $tipo_doc=$est->getTipoDocumento();
            $eps=$est->getEps();
            $procedencia=$est->getInstProcedencia();

            
            $id_padre=$est->getIdPadre();
        
            $nom_padre=$est->getNombresPadre();
            $ape_padre=$est->getApellidosPadre();
            $ocupacion_padre=$est->getOcupacionPadre();
            $tel1_padre=$est->getTelPadre();
            $tel2_padre=$est->getTelOficinaPadre();
            $direccion_padre=$est->getDirPadre();
            
            $id_madre=$est->getIdMadre();
        
            $nom_madre=$est->getNombresMadre();
            $ape_madre=$est->getApellidosMadre();
            $ocupacion_madre=$est->getOcupacionMadre();
            $tel1_madre=$est->getTelMadre();
            $tel2_madre=$est->getTelOficinaMadre();
            $direccion_madre=$est->getDirMadre();

            $id_acud=$est->getIdAcudiente();
        
            $nom_acu=$est->getNombresAcudiente();
            $ape_acu=$est->getApellidosAcudiente();
            $ocupacion_acu=$est->getOcupacionAcudiente();
            $tel1_acu=$est->getTelAcudiente();
            $tel2_acu=$est->getTelOficinaAcudiente();
            $direccion_acu=$est->getDirAcudiente();
            
            $grado2=$grad->getNombre();   
            $año1 = $mat->getAnoLectivo();
            $jornada = $mat->getJornada();
            
            list($ano,$mes,$dia) = explode("-",$fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia <= 0)
                    $ano_diferencia--;


            $pdf=new FPDF('P','cm','Letter');
            $pdf->AddPage();

            $pdf-> SetFont("Arial","B",20);
            $pdf->SetXY(2,1);
            $pdf->cell(18,1,"LICEO GALOIS",0,0,"C");
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY(2,2);
            $pdf->Cell(18,1,"HOJA DE MATRICULA",0,0,"C");
            $pdf->SetXY(2,3);
            $pdf->Cell(18,1,utf8_decode("AÑO LECTIVO ".$año1),0,0,"C");
            $pdf->Image('utiles/imagenes/colegio/foto.png',15,1.5,3.7);
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(2,4);
            $pdf->Cell(3,0.5,"GRADO:",0,0,"L");
            $pdf->SetXY(2,4.5);
            $pdf->Cell(3,0.5,"JORNADA:",0,0,"L");

            $pdf->SetFillColor(211,211,211);
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(5,4);
            $pdf->Cell(3,0.5,utf8_decode(strtoupper($grado2)),0,0,"L",true);
            $pdf->SetXY(5,4.5);
            $pdf->Cell(3,0.5,utf8_decode(strtoupper($jornada)),0,0,"L",true);
            $pdf->SetXY(2,6);
            $pdf->Cell(18,6.5,"",1,0,"L");
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(2,6);
            $pdf->Cell(3,0.5,"APELLIDOS:",0,0,"L");
            $pdf->SetXY(2,6.5);
            $pdf->Cell(3,0.5,"NOMBRES:",0,0,"L");

            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(5,6);
            $pdf->Cell(14.96,0.5,utf8_decode(strtoupper($ape)),0,0,"L",true);
            $pdf->SetXY(5,6.5);
            $pdf->Cell(9,0.5,utf8_decode(strtoupper($nom)),0,0,"L",true);

            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(14,6.5);
            $pdf->Cell(2,0.5,"SEXO    M:",0,0,"L",false);

            $pdf->SetXY(16,6.5);
            $pdf->Cell(1,0.5,"",1,0,"C",true);

            $pdf->SetXY(17,6.5);
            $pdf->Cell(1,0.5,"  F:",0,0,"C");

            $pdf->SetXY(18,6.5);
            $pdf->Cell(1,0.5,"",1,0,"C",true);
            if ($sexo=="F"){
            $pdf->SetXY(18,6.5);
            $pdf->Cell(1,0.5,"X",0,0,"C");	
            }else {
            $pdf->SetXY(16,6.5);
            $pdf->Cell(1,0.5,"X",0,0,"C");	

            }

            $pdf->SetXY(2,7.5);
            $pdf->Cell(5,0.5,"FECHA DE NACIMIENTO: ",0,0,"L");

            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(7,7.5);
            $pdf->Cell(5,0.5,$fecha_nac,0,0,"L",true);
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(12,7.5);
            $pdf->Cell(5,0.5,"LUGAR DE NACIMIENTO: ",0,0,"L");
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(17,7.5);
            $pdf->Cell(2.96,0.5,utf8_decode(strtoupper($lugar_nac)),0,0,"L",true);
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(2,8.5);
            $pdf->Cell(3,0.5,"DIRECCION: ",0,0,"L");
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(5,8.5);
            $pdf->Cell(7,0.5,utf8_decode(strtoupper($direccion)),0,0,"L",true);
            $pdf->SetXY(12,8.5);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(2,0.5,"BARRIO: ",0,0,"L");
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(14,8.5);
            $pdf->Cell(5.96,0.5,utf8_decode(strtoupper($barrio)),0,0,"L",true);
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(2,9.5);
            $pdf->Cell(5,0.5,"IDENTIFICACION:",0,0,"L");
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(6,9.5);
            $pdf->Cell(6,0.5,$tipo_doc." ".$idPersona,0,0,"L",true);
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(12,9.5);
            $pdf->Cell(2,0.5,"EDAD:",0,0,"L");
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(13.96,9.5);
            $pdf->Cell(6,0.5,$ano_diferencia +1 ,0,0,"L",true);// SACAR EDAD

            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(2,10.5);
            $pdf->Cell(4,0.5,"TELEFONO:",0,0,"L");
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(6,10.5);
            $pdf->Cell(4,0.5,$tel,0,0,"L",true);

            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(10,10.5);
            $pdf->Cell(4,0.5,"CARNET DE SALUD:",0,0,"L");
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(14,10.5);
            $pdf->Cell(5.96,0.5,utf8_decode(strtoupper($eps)),0,0,"L",true);

            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(2,11.5);
            $pdf->Cell(6,0.5,"INSTITUCION DE PROCEDENCIA:",0,0,"L");

            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(8,11.5);
            $pdf->Cell(11.96,0.5,utf8_decode(strtoupper($procedencia)),0,0,"L",true);

            $pdf->SetXY(2,13);
            $pdf->Cell(18,2.5,"",1,0,"L");
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(2,13);
            $pdf->Cell(18,0.5,"DATOS DEL PADRE",0,0,"C");

            $pdf->SetXY(2,13.5);
            $pdf->Cell(3,0.5,"NOMBRE:",0,0,"L");
            $pdf->SetXY(2,14);
            $pdf->Cell(3,0.5,"DIRECCION:",0,0,"L");
            $pdf->SetXY(2,14.5);
            $pdf->Cell(3,0.5,"OCUPACION:",0,0,"L");

            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(5,13.5);
            $pdf->Cell(7,0.5,utf8_decode(strtoupper($nom_padre." ".$ape_padre)),0,0,"L",TRUE);
            $pdf->SetXY(5,14);
            $pdf->Cell(7,0.5,utf8_decode(strtoupper($direccion_padre)),0,0,"L",TRUE);
            $pdf->SetXY(5,14.5);
            $pdf->Cell(7,0.5,utf8_decode(strtoupper($ocupacion_padre)),0,0,"L",TRUE);

            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(12,13.5);
            $pdf->Cell(3,0.5,"C.C. No.",0,0,"L");
            $pdf->SetXY(12,14);
            $pdf->Cell(3,0.5,"TELEFONO:",0,0,"L");
            $pdf->SetXY(12,14.5);
            $pdf->Cell(3,0.5,"TELEFONO 2:",0,0,"L");

            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(14.96,13.5);
            $pdf->Cell(5,0.5,utf8_decode(strtoupper($id_padre)),0,0,"L",TRUE);
            $pdf->SetXY(14.96,14);
            $pdf->Cell(5,0.5,$tel1_padre,0,0,"L",TRUE);
            $pdf->SetXY(14.96,14.5);
            $pdf->Cell(5,0.5,$tel2_padre,0,0,"L",TRUE);

            $pdf->SetXY(2,16);
            $pdf->Cell(18,2.5,"",1,0,"L");
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(2,16);
            $pdf->Cell(18,0.5,"DATOS DE LA MADRE",0,0,"C");

            $pdf->SetXY(2,16.5);
            $pdf->Cell(3,0.5,"NOMBRE:",0,0,"L");
            $pdf->SetXY(2,17);
            $pdf->Cell(3,0.5,"DIRECCION:",0,0,"L");
            $pdf->SetXY(2,17.5);
            $pdf->Cell(3,0.5,"OCUPACION:",0,0,"L");

            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(5,16.5);
            $pdf->Cell(7,0.5,utf8_decode(strtoupper($nom_madre." ".$ape_madre)),0,0,"L",TRUE);
            $pdf->SetXY(5,17);
            $pdf->Cell(7,0.5,utf8_decode(strtoupper($direccion_madre)),0,0,"L",TRUE);
            $pdf->SetXY(5,17.5);
            $pdf->Cell(7,0.5,utf8_decode(strtoupper($ocupacion_madre)),0,0,"L",TRUE);

            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(12,16.5);
            $pdf->Cell(3,0.5,"C.C. No.",0,0,"L");
            $pdf->SetXY(12,17);
            $pdf->Cell(3,0.5,"TELEFONO:",0,0,"L");
            $pdf->SetXY(12,17.5);
            $pdf->Cell(3,0.5,"TELEFONO 2:",0,0,"L");

            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(14.96,16.5);
            $pdf->Cell(5,0.5,utf8_decode(strtoupper($id_madre)),0,0,"L",TRUE);
            $pdf->SetXY(14.96,17);
            $pdf->Cell(5,0.5,$tel1_madre,0,0,"L",TRUE);
            $pdf->SetXY(14.96,17.5);
            $pdf->Cell(5,0.5,$tel2_madre,0,0,"L",TRUE);

            $pdf->SetXY(2,19);
            $pdf->Cell(18,2.5,"",1,0,"L");

            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(2,19);
            $pdf->Cell(18,0.5,"DATOS DEL ACUDIENTE",0,0,"C");

            $pdf->SetXY(2,19.5);
            $pdf->Cell(3,0.5,"NOMBRE:",0,0,"L");
            $pdf->SetXY(2,20);
            $pdf->Cell(3,0.5,"DIRECCION:",0,0,"L");
            $pdf->SetXY(2,20.5);
            $pdf->Cell(3,0.5,"OCUPACION:",0,0,"L");

            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(5,19.5);
            $pdf->Cell(7,0.5,utf8_decode(strtoupper($nom_acu." ".$ape_acu)),0,0,"L",TRUE);
            $pdf->SetXY(5,20);
            $pdf->Cell(7,0.5,utf8_decode(strtoupper($direccion_acu)),0,0,"L",TRUE);
            $pdf->SetXY(5,20.5);
            $pdf->Cell(7,0.5,utf8_decode(strtoupper($ocupacion_acu)),0,0,"L",TRUE);

            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY(12,19.5);
            $pdf->Cell(3,0.5,"C.C. No.",0,0,"L");
            $pdf->SetXY(12,20);
            $pdf->Cell(3,0.5,"TELEFONO:",0,0,"L");
            $pdf->SetXY(12,20.5);
            $pdf->Cell(3,0.5,"TELEFONO 2:",0,0,"L");

            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY(14.96,19.5);
            $pdf->Cell(5,0.5,utf8_decode(strtoupper($id_acud)),0,0,"L",TRUE);
            $pdf->SetXY(14.96,20);
            $pdf->Cell(5,0.5,$tel1_acu,0,0,"L",TRUE);
            $pdf->SetXY(14.96,20.5);
            $pdf->Cell(5,0.5,$tel2_acu,0,0,"L",TRUE);

            $pdf->SetXY(3,22.5);
            $pdf->Cell(6,0.5,"","B",0,"R");

            $pdf->SetXY(12,22.5);
            $pdf->Cell(6,0.5,"","B",0,"R");

            $pdf->SetXY(3.5,23);
            $pdf->Cell(5,0.5,"FIRMA ESTUDIANTE",0,0,"C");

            $pdf->SetXY(12,23);
            $pdf->Cell(6,0.5,"FIRMA ACUDIENTE",0,0,"C");

            $pdf->SetXY(3,24.5);
            $pdf->Cell(6,0.5,"","B",0,"R");

            $pdf->SetXY(12,24.5);
            $pdf->Cell(6,0.5,"","B",0,"R");

            $pdf->SetXY(3.5,25);
            $pdf->Cell(5,0.5,"FIRMA RECTOR",0,0,"C");

            $pdf->SetXY(12,25);
            $pdf->Cell(6,0.5,"FIRMA SECRETARIA",0,0,"C");

            $pdf-> Output("Matricula ".$nom." ".$ape,"I");
    }
    
    public function boletinGalois($idSalon,$periodo){
    
            $persona = new Persona();
            $estudiantes  = $persona->leerPorSalon($idSalon);
            
            $pdf=new FPDF('P','cm','Legal');
            
            $pdf->SetMargins(0, 0, 0);
            
            foreach ($estudiantes as $estudiante){
                
                $matricula = new Matricula();
                $matr = $matricula->leerMatriculaPorId($estudiante->getIdPersona());
                $salon = new Salon();
                $sal = $salon->leerSalonePorId($idSalon);
                $grado = new Grado();
                $grad = $grado->leerGradoPorId($sal->getIdGrado());
                $pensum = new Pensum();
                $pens = $pensum->leerPensum($idSalon);
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
                $pdf->Cell(12,0.5,utf8_decode("JORNADA: ".$matr->getJornada()."     AÑO LECTIVO: ".$matr->getAnoLectivo()."   ".$periodo3." PERIODO"),1,0,"C");
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
                if($periodo=="CUARTO"){
                    $pdf->Cell(1,0.5,utf8_decode("P.4°"),1,0,"C");
                }else{
                    $pdf->Cell(1,0.5,"Fallas",1,0,"C");
                }
                
                $pdf->SetXY(7,7);
                if($periodo=="CUARTO"){
                    $pdf->Cell(1,0.5,"FINAL",1,0,"C");
                }else{
                    $pdf->Cell(1,0.5,"Val.",1,0,"C");
                }
                
                $pdf->SetXY(8,7);
                $pdf->Cell(12,0.5,"FORTALEZAS/ DEBILIDADES/ RECOMENDACIONES",1,0,"C");

                $pdf-> SetFont("Arial","",9);
                $y=7.5;
                $x=1;
                $suma=0;
                $cont=0;
                
                foreach ($vec as $v){
                    $mate = new Materia();
                    $materias = $mate->leerMateriaPorId($v);
                    foreach ($materias as $materia){
                        
                        $nombreMateria = $materia->getNombreMateria();
                        $horas = $materia->getHoras();
                    }
                    $nota = new Nota();
                    $not = $nota->leerNotaEstudiante($estudiante->getIdPersona(), $v);
                    $falla = new Falla();
                    $fal = $falla->leerFallaEstudiante($estudiante->getIdPersona(), $v);
                    $logro = new Logro();
                    $log = $logro->leerLogro($periodo, $grad->getIdGrado(), $v);
                    $desempeño = "";
                    $cadena = "";
                    
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
                        $pdf->Cell(1,1.5,$not->getCuartoP(),1,0,"C");
                    }
                    
                    $pdf->Cell(1,1.5,"",1,0,"C");
                    $x=$x + 1;
                    $pdf->SetXY($x,$y);
                    $x=$x + 1;
                    
                    if($log != NULL){
                    
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
                        $def=round($not->calcularDefNeta($not->getPrimerP(), $not->getSegundoP(), $not->getTercerP(), $not->getCuartoP()),2);
                        $pdf->Cell(1,1.5,$def,1,0,"C");
                        $suma=$suma + $def;
                        
                        if ($def < 30){
                        $cadena=$log->getBajo();
                        $desempeño=" BAJO";
                        }
                        if ($def < 40 && $def >= 30){
                            
                            $cadena=$log->getBasico();
                            $desempeño=" BASICO";
                        }
                        if ($def < 46 && $def >= 40){
                            $cadena=$log->getAlto();
                            $desempeño=" ALTO";
                        }
                        if ($def > 45){
                            $cadena=$log->getSuperior();
                            $desempeño=" SUPERIOR";
                        }
                        
                    }elseif ($periodo== "FINAL"){
                        $def=$nota->calcularDef2($not->getPrimerP(), $not->getSegundoP(), $not->getTercerP(), $not->getCuartoP());
                        $pdf->Cell(1,1.5,$def,1,0,"C");
                        $suma=$suma + $def;
                        
                        if ($def < 30){
                        $cadena=$log->getBajo();
                        $desempeño=" BAJO";
                        }
                        if ($def < 40 && $def >= 30){
                            
                            $cadena=$log->getBasico();
                            $desempeño=" BASICO";
                        }
                        if ($def < 46 && $def >= 40){
                            $cadena=$log->getAlto();
                            $desempeño=" ALTO";
                        }
                        if ($def > 45){
                            $cadena=$log->getSuperior();
                            $desempeño=" SUPERIOR";
                        }
                        
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
    
     public function informeFinalGalois($idPersona,$anio){
            
            $pdf=new FPDF('P','cm','Legal');
            
                $matricula = new Matricula();
                $matr = $matricula->leerMatriculaPorIdyAnio($idPersona,$anio);
                $salon = new Salon();
                $sal = $salon->leerSalonePorId($matr->getIdSalon());
                $grado = new Grado();
                $grad = $grado->leerGradoPorId($sal->getIdGrado());
                $persona = new Persona();
                $estudiante = $persona->leerPorId($idPersona);
                
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

                $pdf->SetXY(1,5.5);
                $pdf-> SetFont("Arial","B",10);
                $pdf->Cell(19,0.5,utf8_decode(strtoupper($estudiante->getPApellido()." ".$estudiante->getSApellido()." ".$estudiante->getNombres())),1,0,"C");
                $pdf->SetXY(1,6);
                $pdf-> SetFont("Arial","",10);
                $pdf->Cell(4,0.5,$grad->getNombre(),1,0,"C");
                $pdf->SetXY(5,6);
                $pdf->Cell(3,0.5,"GRUPO: 01",1,0,"C");
                $pdf->SetXY(8,6);
                $pdf->Cell(12,0.5,utf8_decode("JORNADA: ".$matr->getJornada()."     AÑO LECTIVO: ".$matr->getAnoLectivo()."   INFORME FINAL"),1,0,"C");
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
                
                foreach ($vec as $v){
                    $mate = new Materia();
                    $materias = $mate->leerMateriaPorId($v);
                    foreach ($materias as $materia){
                        
                        $nombreMateria = $materia->getNombreMateria();
                        $horas = $materia->getHoras();
                    }
                    $nota = new Historial();
                    $not = $nota->leerNotaEstudiante($anio,$estudiante->getIdPersona(), $v);
                    $logro = new Logro();
                    $log = $logro->leerLogro("CUARTO", $grad->getIdGrado(), $v);
                    $desempeño = "";
                    $cadena = "";
                    
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
                    
                        $pdf->Cell(1,1.5,"",1,0,"C");
                    
                    
                    $pdf->Cell(1,1.5,"",1,0,"C");
                    $x=$x + 1;
                    $pdf->SetXY($x,$y);
                    $x=$x + 1;
                    
                    if($log != NULL){
                    
                    
                        $pdf->Cell(1,1.5,$not->getDefinitiva(),1,0,"C");
                        $suma=$suma + $not->getDefinitiva();
                        
                        if ($not->getDefinitiva() < 30){
                        $cadena=$log->getBajo();
                        $desempeño=" BAJO";
                        }
                        if ($not->getDefinitiva() < 40 && $not->getDefinitiva() >= 30){
                            $cadena=$log->getBasico();
                            $desempeño=" BASICO";
                        }
                        if ($not->getDefinitiva() < 46 && $not->getDefinitiva() >= 40){
                            $cadena=$log->getAlto();
                            $desempeño=" ALTO";
                        }
                        if ($not->getDefinitiva() > 45){
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
            
            


            $pdf-> Output("Boletin ","I");
    }
    
    public function registroSantaTeresita($idPersona){
        $estudiante = new Estudiante();
            $est = $estudiante->leerPorId($idPersona);
            $estudiante->leerDatos($idPersona, $est);
            $estudiante->leerNacimiento($idPersona, $est);
            $estudiante->leerUbicacion($idPersona, $est);
            $estudiante->leerPadre($idPersona, $est);
            $estudiante->leerMadre($idPersona, $est);
            $estudiante->leerAcudiente($idPersona, $est);
                        
            $ape= $est->getPApellido()." ".$est->getSApellido();
            $nom= $est->getNombres();
            $sexo= $est->getSexo();
            $tel= $est->getTelefono();

            $fecha_nac=$est->getFNacimiento();
            $lugar_nac=$est->getMunicipioNacimiento();

            $direccion=$est->getDireccion();
            $barrio=$est->getBarrio();
            
            $tipo_doc=$est->getTipoDocumento();
            $eps=$est->getEps();
            $procedencia=$est->getInstProcedencia();

            
            $id_padre=$est->getIdPadre();
        
            $nom_padre=$est->getNombresPadre();
            $ape_padre=$est->getApellidosPadre();
            $ocupacion_padre=$est->getOcupacionPadre();
            $tel1_padre=$est->getTelPadre();
            $tel2_padre=$est->getTelOficinaPadre();
            $direccion_padre=$est->getDirPadre();
            
            $id_madre=$est->getIdMadre();
        
            $nom_madre=$est->getNombresMadre();
            $ape_madre=$est->getApellidosMadre();
            $ocupacion_madre=$est->getOcupacionMadre();
            $tel1_madre=$est->getTelMadre();
            $tel2_madre=$est->getTelOficinaMadre();
            $direccion_madre=$est->getDirMadre();
            
            $id_acud=$est->getIdAcudiente();
  
            $nom_acu=$est->getNombresAcudiente();
            $ape_acu=$est->getApellidosAcudiente();
            $ocupacion_acu=$est->getOcupacionAcudiente();
            $tel1_acu=$est->getTelAcudiente();
            $tel2_acu=$est->getTelOficinaAcudiente();
            $direccion_acu=$est->getDirAcudiente();
            
             $fecha = getdate();
             $FechaTxt=$fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];

                if ($fecha["month"]== 'December' or $fecha["month"]== 'November' or $fecha["month"]== 'October'){
                    $año=$fecha["year"] ;
                    $añoLectivo=$año + 1 ;
                }else{
                    $añoLectivo=$fecha["year"];
                }
            
            
            $pdf=new FPDF('P','cm','Letter');
            $pdf->AddPage();
            
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY(2,1);
            $pdf->cell(18,0.5,"PARA UN DESARROLLO INTEGRAL",0,0,"C");
            $pdf-> SetFont("Arial","B",20);
            $pdf->SetXY(2,1.5);
            $pdf->Cell(18,1,"COLEGIO SANTA TERESITA",0,0,"C");
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY(2,2.5);
            $pdf->Cell(18,0.5,utf8_decode("FORMATO DEL ".$añoLectivo),0,0,"C");
            $pdf->Image('utiles/imagenes/escudoSantaTeresita.jpg',1,1,3,3);
            $pdf->SetXY(2,3);
            $pdf->Cell(18,1,utf8_decode("INSCRIPCION(  )  MATRICULA(  )"),0,0,"C");
            
            $x=1;
            $y=4.5;
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY($x,$y);
            $pdf->Cell(19.5,1,utf8_decode("DATOS PERSONALES"),1,0,"C");
            $pdf-> SetFont("Arial","",12.5);
            
            $x=1;
            $y=5.5;
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("NOMBRES"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getNombres())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("APELLIDOS"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getPApellido()." ".$est->getSApellido())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("FECHA DE NACIMIENTO"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getFNacimiento())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("DIRECCIÓN"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getDireccion())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("BARRIO"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getBarrio())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("TELÉFONO"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getTelefono())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("GRADO ESCOLAR"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper("")),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("COLEGIO DE PROCEDENCIA"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getInstProcedencia())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("EPS"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getEps())),1,0,"L");
            
            //ESPACIO EN BLANCO
            $y=$y+0.5;
            $pdf->SetXY($x,$y);
            $pdf->Cell(19.5,1,utf8_decode(" "),0,0,"C");
                       
            $y=$y+0.5;
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY($x,$y);
            $pdf->Cell(19.5,1,utf8_decode("DATOS FAMILIARES"),1,0,"C");
            
            $y=$y+1;
            //PADRE
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("NOMBRE DEL PADRE"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getNombresPadre()." ".$est->getApellidosPadre())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("OCUPACIÓN"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getOcupacionPadre())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("DIRECCIÓN"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getDirPadre())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("TELÉFONO"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getTelPadre())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("DOCUMENTO DE IDENTIDAD"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getIdPadre())),1,0,"L");
             //ESPACIO EN BLANCO
            $y=$y+0.5;
            $pdf->SetXY($x,$y);
            $pdf->Cell(19.5,0.5,utf8_decode(" "),1,0,"C");
            
            //MADRE
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("NOMBRE DE LA MADRE"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getNombresMadre()." ".$est->getApellidosMadre())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("OCUPACIÓN"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getOcupacionMadre())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("DIRECCIÓN"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getDirMadre())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("TELÉFONO"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getTelMadre())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("DOCUMENTO DE IDENTIDAD"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getIdMadre())),1,0,"L");
            
             //ESPACIO EN BLANCO
            $y=$y+0.5;
            $pdf->SetXY($x,$y);
            $pdf->Cell(19.5,0.5,utf8_decode(" "),1,0,"C");
            
            //ACUDIENTE
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("NOMBRE DEL ACUDIENTE"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getNombresAcudiente()." ".$est->getApellidosAcudiente())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("OCUPACIÓN"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getOcupacionAcudiente())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("DIRECCIÓN"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getDirAcudiente())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("TELÉFONO"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getTelAcudiente())),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(8,0.5,utf8_decode("DOCUMENTO DE IDENTIDAD"),1,0,"L");
            $pdf-> SetFont("Arial","B",12.5);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(11.5,0.5,utf8_decode(strtoupper($est->getIdAcudiente())),1,0,"L");
            
            //ESPACIO EN BLANCO
            $y=$y+0.5;
            $pdf->SetXY($x,$y);
            $pdf->Cell(19.5,0.5,utf8_decode(" "),0,0,"C");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY($x,$y);
            $pdf->Cell(13.5,1,utf8_decode("REQUISITOS"),1,0,"L");
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY($x+13.5,$y);
            $pdf->Cell(3,1,utf8_decode("SI"),1,0,"C");
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY($x+16.5,$y);
            $pdf->Cell(3,1,utf8_decode("NO"),1,0,"C");
                      
            $y=$y+1;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(13.5,0.5,utf8_decode("REGISTRO CIVIL"),1,0,"L");
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY($x+13.5,$y);
            $pdf->Cell(3,0.5,utf8_decode(""),1,0,"C");
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY($x+16.5,$y);
            $pdf->Cell(3,0.5,utf8_decode(""),1,0,"C");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(13.5,0.5,utf8_decode("FOTOCOPIA DE CARNET DE SALUD"),1,0,"L");
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY($x+13.5,$y);
            $pdf->Cell(3,0.5,utf8_decode(""),1,0,"C");
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY($x+16.5,$y);
            $pdf->Cell(3,0.5,utf8_decode(""),1,0,"C");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(13.5,0.5,utf8_decode("FOTOCOPIA DE CARNET DE VACUNACION"),1,0,"L");
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY($x+13.5,$y);
            $pdf->Cell(3,0.5,utf8_decode(""),1,0,"C");
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY($x+16.5,$y);
            $pdf->Cell(3,0.5,utf8_decode(""),1,0,"C");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(13.5,0.5,utf8_decode("FOTOS"),1,0,"L");
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY($x+13.5,$y);
            $pdf->Cell(3,0.5,utf8_decode(""),1,0,"C");
            $pdf-> SetFont("Arial","B",14);
            $pdf->SetXY($x+16.5,$y);
            $pdf->Cell(3,0.5,utf8_decode(""),1,0,"C");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(19.5,0.5,utf8_decode("CERTIFICADOS AÑOS ANTERIORES     1°  2°  3°  4°  5°  6°  7°  8°  9°  10°"),1,0,"L");
            
            $y=$y+0.5;
            $pdf-> SetFont("Arial","",12.5);
            $pdf->SetXY($x,$y);
            $pdf->Cell(19.5,0.5,utf8_decode("OBSERVACIÓN"),1,0,"L");
            
            $y=$y+1;
            
            $pdf->SetXY($x,$y);
            $pdf->Cell(10,0.5,"PADRE DE FAMILIA O ACUDIENTE",0,0,"L");
            
            $pdf->SetXY($x+7.5,$y);
            $pdf->Cell(7.5,0.5,"","B",0,"R");
            
            $pdf-> Output("Inscripción ".$nom." ".$ape,"I");
    }
    
    public function matriculaSantaTeresita($idPersona){
        $estudiante = new Estudiante();
            $est = $estudiante->leerPorId($idPersona);
            $estudiante->leerDatos($idPersona, $est);
            $estudiante->leerNacimiento($idPersona, $est);
            $estudiante->leerUbicacion($idPersona, $est);
            $estudiante->leerPadre($idPersona, $est);
            $estudiante->leerMadre($idPersona, $est);
            $estudiante->leerAcudiente($idPersona, $est);
            
            $matricula = new Matricula();
            $mat = $matricula->leerMatriculaPorId($idPersona);
            
            $matriculas = $matricula->leerMatriculasPorId($idPersona);
            
            $salon = new Salon();
            $sal = $salon->leerSalonePorId($mat->getIdSalon());
            
            $grado = new Grado();
            $grad = $grado->leerGradoPorId($sal->getIdGrado());
            
            $ape= $est->getPApellido()." ".$est->getSApellido();
            $nom= $est->getNombres();
            $sexo= $est->getSexo();
            $tel= $est->getTelefono();

            $fecha_nac=$est->getFNacimiento();
            $lugar_nac=$est->getMunicipioNacimiento();

            $direccion=$est->getDireccion();
            $barrio=$est->getBarrio();
            
            $tipo_doc=$est->getTipoDocumento();
            $eps=$est->getEps();
            $procedencia=$est->getInstProcedencia();

            $id_padre=$est->getIdPadre();
        
            $nom_padre=$est->getNombresPadre();
            $ape_padre=$est->getApellidosPadre();
            $ocupacion_padre=$est->getOcupacionPadre();
            $tel1_padre=$est->getTelPadre();
            $tel2_padre=$est->getTelOficinaPadre();
            $direccion_padre=$est->getDirPadre();
            
            $id_madre=$est->getIdMadre();
        
            $nom_madre=$est->getNombresMadre();
            $ape_madre=$est->getApellidosMadre();
            $ocupacion_madre=$est->getOcupacionMadre();
            $tel1_madre=$est->getTelMadre();
            $tel2_madre=$est->getTelOficinaMadre();
            $direccion_madre=$est->getDirMadre();

            $id_acud=$est->getIdAcudiente();
        
            $nom_acu=$est->getNombresAcudiente();
            $ape_acu=$est->getApellidosAcudiente();
            $ocupacion_acu=$est->getOcupacionAcudiente();
            $tel1_acu=$est->getTelAcudiente();
            $tel2_acu=$est->getTelOficinaAcudiente();
            $direccion_acu=$est->getDirAcudiente();
            
            $grado2=$grad->getNombre();   
            $año1 = $mat->getAnoLectivo();
            $jornada = $mat->getJornada();
            
            list($ano,$mes,$dia) = explode("-",$fecha_nac);
                $ano_diferencia  = date("Y") - $ano;
                $mes_diferencia = date("m") - $mes;
                $dia_diferencia   = date("d") - $dia;
                if ($dia_diferencia < 0 || $mes_diferencia <= 0)
                    $ano_diferencia--;


            $pdf=new FPDF('P','cm','Letter');
            $pdf->AddPage();
            $x=1;
            $y=0.5;
            $pdf->SetFillColor(150,150,150);
            $pdf-> SetFont("Arial","",18);
            $pdf->SetXY(1,0.5);
            $pdf->cell(19.5,1,"TARJETA ACUMULATIVA DE MATRICULA",0,0,"C",true);
            $y++;
            $pdf-> SetFont("Arial","B",20);
            $pdf->SetXY($x,$y);
            $pdf->Cell(19.5,1,"COLEGIO SANTA TERESITA",0,0,"C",true);
            
            $y++;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,"Apellidos",1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(6,0.5,utf8_decode(strtoupper($est->getPApellido()." ".$est->getSApellido())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,"Nombres",1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getNombres())),1,0,"L");
            
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,utf8_decode("Identificación"),1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(4,0.5,utf8_decode(strtoupper($est->getTipoDocumento()." ".$est->getIdPersona())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",9);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(2,0.5,"RH: ".$est->getTipoSanguineo(),1,0,"L");
            
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,"EPS",1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getEps())),1,0,"L");
            
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,"Fecha de Nacim",1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(6,0.5,utf8_decode(strtoupper($est->getFNacimiento())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,"Ciudad",1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getMunicipioResidencia())),1,0,"L");
                        
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,"Centro de Procedencia",1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(6,0.5,utf8_decode(strtoupper($est->getInstProcedencia())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,utf8_decode("Dirección"),1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getDireccion())),1,0,"L");
            
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(3,0.5,"Nombre Padre",1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+3,$y);
            $pdf->Cell(7,0.5,utf8_decode(strtoupper($est->getNombresPadre()." ".$est->getApellidosPadre())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(3,0.5,"Nombre Madre",1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+13,$y);
            $pdf->Cell(6.5,0.5,utf8_decode(strtoupper($est->getNombresMadre()." ".$est->getApellidosMadre())),1,0,"L");
            
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,"C.C",1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(6,0.5,utf8_decode(strtoupper($est->getIdPadre())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,"C.C",1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getIdMadre())),1,0,"L");
            
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,utf8_decode("Ocupación"),1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(6,0.5,utf8_decode(strtoupper($est->getOcupacionPadre())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,utf8_decode("Ocupación"),1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getOcupacionMadre())),1,0,"L");
            
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,utf8_decode("Teléfono"),1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(6,0.5,utf8_decode(strtoupper($est->getTelPadre())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,utf8_decode("Teléfono"),1,0,"L");
            
            $pdf-> SetFont("Arial","",9);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getTelMadre())),1,0,"L");
            
            $y += 1;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(3.5,0.5,"Fecha de Ingreso:",0,0,"L");
            $y += 0.5;
            $pdf->Line($x+3.5, $y, $x+10, $y);
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(3.5,0.5,"Fecha de Retiro:",0,0,"L");
            
            $pdf->SetXY($x+10.5,$y);
            $pdf->Cell(3.5,0.5,"Motivo:",0,0,"L");
            
            $y += 0.5;
            $pdf->Line($x+3.5, $y, $x+10, $y);
            $pdf->Line($x+12, $y, $x+19.5, $y);
            
            $y += 0.5;
            $pdf-> SetFont("Arial","",8);
            $pdf->SetXY($x,$y);
            $pdf->Cell(19.5,0.5,"NOS COMPROMETEMOS A CUMPLIR EL REGLAMENTO DE LA INSTITUCION",0,0,"C");

            $vec= ["P","J","T","1°","2°","3°","4°","5°","6°","7°","8°","9°","10°","11°"];
            
            $y += 0.5;
            $pdf->SetXY($x,$y);
            $pdf-> SetFont("Arial","",11);
            $pdf->Cell(2,1,utf8_decode("GRADO"),0,0,"L");
            $pdf->SetXY($x,$y+1);
            $pdf-> SetFont("Arial","",11);
            $pdf->Cell(2,1,utf8_decode("AÑO"),0,0,"L");
            $pdf->SetXY($x,$y+2);
            $pdf-> SetFont("Arial","",11);
            $pdf->Cell(2,1,utf8_decode("EDAD"),0,0,"L");
            $pdf->SetXY($x,$y+3);
            $pdf-> SetFont("Arial","",11);
            $pdf->Cell(2,1,utf8_decode("N° MAT"),0,0,"L");
            
            $x+=2;
            //CICLO
            foreach ($vec as $v){
                $band=0;
                $pdf->SetXY($x,$y);
                $pdf-> SetFont("Arial","B",11);
                if(strlen($v)==4){
                    $g=substr($v,0,2);
                }else{
                    $g=$v[0];
                }
                if($matriculas != null){
                   foreach($matriculas as $ma){
                        $salon = new Salon();
                        $sal = $salon->leerSalonePorId($ma->getIdSalon());
                        if ($sal->getIdGrado()==$g){
                            $band++;
                            list($ano,$mes,$dia) = explode("-",$fecha_nac);
                            list($ano_mat,$mes_mat,$dia_mat) = explode("-",$ma->getFecha());
                                $ano_diferencia  = $ano_mat - $ano;
                                $mes_diferencia = $mes_mat - $mes;
                                $dia_diferencia   = $dia_mat - $dia;
                                if ($dia_diferencia < 0 || $mes_diferencia <= 0)
                                    $ano_diferencia--;
                            $pdf->Cell(1,1,utf8_decode($v),1,0,"C");
                            $pdf->SetXY($x,$y+1);
                            $pdf-> SetFont("Arial", "",11);
                            $pdf->Cell(1,1,utf8_decode(substr($ma->getAnoLectivo(),2,2)),1,0,"C");
                            $pdf->SetXY($x,$y+2);
                            $pdf-> SetFont("Arial","",11);
                            $pdf->Cell(1,1,utf8_decode($ano_diferencia),1,0,"C");
                            $pdf->SetXY($x,$y+3);
                            $pdf-> SetFont("Arial","",11);
                            $pdf->Cell(1,1,utf8_decode(""),1,0,"C");
                    
                        }
                   }
                }
                                        
                $salon = new Salon();
                $sal = $salon->leerSalonePorId($mat->getIdSalon());
                if ($sal->getIdGrado()==$g){
                    $band++;
                    list($ano,$mes,$dia) = explode("-",$fecha_nac);
                    list($ano_mat,$mes_mat,$dia_mat) = explode("-",$mat->getFecha());
                    $ano_diferencia  = $ano_mat - $ano;
                    $mes_diferencia = $mes_mat - $mes;
                    $dia_diferencia   = $dia_mat - $dia;
                    if ($dia_diferencia < 0 || $mes_diferencia <= 0)
                        $ano_diferencia--;
                        $pdf->Cell(1,1,utf8_decode($v),1,0,"C");
                        $pdf->SetXY($x,$y+1);
                        $pdf->SetFont("Arial","",11);
                        $pdf->Cell(1,1,utf8_decode(substr($mat->getAnoLectivo(),2,2)),1,0,"C");
                        $pdf->SetXY($x,$y+2);
                        $pdf-> SetFont("Arial","",11);
                        $pdf->Cell(1,1,utf8_decode($ano_diferencia),1,0,"C");
                        $pdf->SetXY($x,$y+3);
                        $pdf-> SetFont("Arial","",11);
                        $pdf->Cell(1,1,utf8_decode(""),1,0,"C");
                   }
                if($band==0){
                    $pdf->Cell(1,1,utf8_decode($v),1,0,"C");
                    $pdf->SetXY($x,$y+1);
                    $pdf-> SetFont("Arial","",11);
                    $pdf->Cell(1,1,utf8_decode(""),1,0,"C");
                    $pdf->SetXY($x,$y+2);
                    $pdf-> SetFont("Arial","",11);
                    $pdf->Cell(1,1,utf8_decode(""),1,0,"C");
                    $pdf->SetXY($x,$y+3);
                    $pdf-> SetFont("Arial","",11);
                    $pdf->Cell(1,1,utf8_decode(""),1,0,"C");
                    
                }
                $x++;    
            }
                    $x=1;
                    $y += 4;
            $pdf->Line($x+3.5, $y+0.5, $x+19.5, $y+0.5);
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(3.5,0.5,"Observaciones:",0,0,"L");
            
            $y += 1.5;
            $pdf->SetXY($x,$y);
            $pdf->Cell(6,0.5,"","B",0,"R");
            
            $pdf->SetXY($x+7.5,$y);
            $pdf->Cell(5,0.5,"","B",0,"R");
            
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5,0.5,"","B",0,"R");
            $y += 0.5;
            $pdf->SetXY($x,$y);
            $pdf->Cell(6,0.5,"Firma Del Padre o Acudiente",0,0,"C");
            
            $pdf->SetXY($x+7,$y);
            $pdf->Cell(6,0.5,"Firma Del Estudiante",0,0,"C");

            $pdf->SetXY($x+14.5,$y);
            $pdf->Cell(4,0.5,"Firma del Rector",0,0,"C");

            $pdf-> Output("Matricula ".$nom." ".$ape,"I");
    }
    
    public function consolidadoGalois($idSalon,$periodo){
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
                $pdf->cell(33,1,"CONSOLIDADO ACADEMICO DE ".$idSalon.", PERIODO: ".$periodo,0,0,"C");
                   
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
        
    }
    
    public function consolidadoHistorialGalois($idSalon,$anio){
        
            $pdf=new FPDF('L','cm','Legal');
            $matricula = new Matricula();
            
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
                $pdf->cell(33,1,utf8_decode("CONSOLIDADO FINAL ACADEMICO DE ".$idSalon.", AÑO: ".$anio),0,0,"C");
                   
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
              $personas=$persona->leerPorSalonYAnio($idSalon,$anio);
              $cont = 0;
              foreach ($personas as $per){
                  $cont++;
                  if($cont==17){
                      $pdf->AddPage();
                      $y=1;  
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
                        $nota = new Historial();
                        $not =$nota->leerNotaEstudiante($anio, $per->getIdPersona(), $v);
                        $n =$not->getDefinitiva();
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
        
    }
    
     public function consolidadoHistorialIndividualGalois($idSalon,$anio){
        
            $pdf=new FPDF('P','cm','Letter');
            
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

              $persona = new Persona();
              $personas=$persona->leerPorSalonYAnio($idSalon,$anio);
              
              foreach ($personas as $per){
                  
                  $pdf->AddPage();     
                $pdf-> SetFont("Arial","B",18);
                $pdf->SetXY(1,1);
                $pdf->cell(19,1,utf8_decode("CONSOLIDADO FINAL ACADEMICO"),0,0,"C");
                $pdf-> SetFont("Arial","B",15);
                $pdf->SetXY(1,2);
                $pdf->SetTextColor(255,0,0);
                $pdf->cell(19,1,utf8_decode($per->getPApellido()." ".$per->getNombres()),0,0,"C");
                $pdf->SetXY(1,3);
                $pdf->SetTextColor(0,0,0);
                $pdf->cell(19,1,utf8_decode("AÑO: ".$anio.", SALÓN: ".$idSalon),0,0,"C");
               
                  //_____________________________
                  
                  
                  $x=6.5;
                  $y=5;
                  $pdf->SetXY($x,$y);
                  $pdf-> SetFont("Arial","B",10);
                  $pdf->Cell(6,1,"MATERIA",1,0,"C");
                  
                  $pdf->SetXY($x+6,$y);
                  $pdf-> SetFont("Arial","B",10);
                  $pdf->Cell(2,1,"NOTA",1,0,"C");
                  
                  $cont=0;
                  $sum=0;
                 foreach ($vec as $v){
                     $y++;
                     $cont++;
                     
                     $pdf-> SetFont("Arial","",10);
                        $nota = new Historial();
                        $not =$nota->leerNotaEstudiante($anio, $per->getIdPersona(), $v);
                        $mate = new Materia();
                    $materias = $mate->leerMateriaPorId($v);
                    foreach ($materias as $materia){
                        $nombreMateria = $materia->getNombreMateria();
                        }
                        $pdf->SetXY($x,$y);
                        $pdf-> SetFont("Arial","B",10);
                        $pdf->Cell(6,1,$nombreMateria,1,0,"C");
                        $n =$not->getDefinitiva();
                        $pdf->SetXY($x,$y);
                        if ( $n < 30 ){
                            $pdf->SetTextColor(255,0,0);
                        }                           
                        $pdf->SetXY($x+6,$y);
                        $pdf-> SetFont("Arial","",10);
                        $pdf->Cell(2,1,$n,1,0,"C");
                         $pdf->SetTextColor(0,0,0);
                        $sum+=$n;
                       }
                       
                       $y++;
                       $prom = round($sum/$cont,2);
                       $pdf-> SetFont("Arial","B",14);
                       $pdf->SetXY(1,$y);
                $pdf->cell(19,1,utf8_decode("Promedio: ".$prom),0,0,"C");
                       
              
             }              
              $pdf-> Output("Consolidado ".$idSalon,"I");
        
    }
    
    public function observadorSantaTeresita($idPersona){
         $estudiante = new Estudiante();
            $est = $estudiante->leerPorId($idPersona);
            $estudiante->leerDatos($idPersona, $est);
            $estudiante->leerNacimiento($idPersona, $est);
            $estudiante->leerUbicacion($idPersona, $est);
            $estudiante->leerPadre($idPersona, $est);
            $estudiante->leerMadre($idPersona, $est);
            $estudiante->leerAcudiente($idPersona, $est);
                        
            $ape= $est->getPApellido()." ".$est->getSApellido();
            $nom= $est->getNombres();
            $sexo= $est->getSexo();
            $tel= $est->getTelefono();

            $fecha_nac=$est->getFNacimiento();
            $lugar_nac=$est->getMunicipioNacimiento();

            $direccion=$est->getDireccion();
            $barrio=$est->getBarrio();
            
            $tipo_doc=$est->getTipoDocumento();
            $eps=$est->getEps();
            $procedencia=$est->getInstProcedencia();

            
            $id_padre=$est->getIdPadre();
        
            $nom_padre=$est->getNombresPadre();
            $ape_padre=$est->getApellidosPadre();
            $ocupacion_padre=$est->getOcupacionPadre();
            $tel1_padre=$est->getTelPadre();
            $tel2_padre=$est->getTelOficinaPadre();
            $direccion_padre=$est->getDirPadre();
            
            $id_madre=$est->getIdMadre();
        
            $nom_madre=$est->getNombresMadre();
            $ape_madre=$est->getApellidosMadre();
            $ocupacion_madre=$est->getOcupacionMadre();
            $tel1_madre=$est->getTelMadre();
            $tel2_madre=$est->getTelOficinaMadre();
            $direccion_madre=$est->getDirMadre();
            
            $id_acud=$est->getIdAcudiente();
  
            $nom_acu=$est->getNombresAcudiente();
            $ape_acu=$est->getApellidosAcudiente();
            $ocupacion_acu=$est->getOcupacionAcudiente();
            $tel1_acu=$est->getTelAcudiente();
            $tel2_acu=$est->getTelOficinaAcudiente();
            $direccion_acu=$est->getDirAcudiente();
            
             $fecha = getdate();
             $FechaTxt=$fecha["year"]."-".$fecha["mon"]."-".$fecha["mday"];

                if ($fecha["month"]== 'December' or $fecha["month"]== 'November' or $fecha["month"]== 'October'){
                    $año=$fecha["year"] ;
                    $añoLectivo=$año + 1 ;
                }else{
                    $añoLectivo=$fecha["year"];
                }
            
            $matricula = new Matricula();
            $mat = $matricula->leerMatriculaPorId($idPersona);
            
            $matriculas = $matricula->leerMatriculasPorId($idPersona);
                
            $pdf=new FPDF('L','cm','Legal');
            
            $x=2;
            $y=1;
            $pdf-> SetFont("Arial","B",20);
            $pdf->SetXY($x-1,$y);
            $pdf->Cell(18,1,"COLEGIO SANTA TERESITA",0,0,"C");
            $pdf-> SetFont("Arial","B",20);
            $pdf->SetXY($x+13,$y);
            $pdf->Cell(18,1,"OBSERVADOR DEL ALUMNO",0,0,"C");
            $pdf-> SetFont("Arial","",14);
            $y+=1;
            $pdf->SetXY($x-1,$y);
            $pdf->cell(18,0.5,"Educamos para hacer posible la vida y la felicidad",0,0,"C");
 
            $pdf->Image('utiles/imagenes/escudoSantaTeresita.jpg',0.5,0.5,3,3);
            $pdf->Image('utiles/imagenes/escudoSantaTeresita.jpg',30,0.5,2,3);
            
            $x=0.5;
            $y+=2;
            $pdf->SetXY($x,$y);
            $pdf-> SetFont("Arial","",10);
            $pdf->cell(5,0.5,"APELIIDOS Y NOMBRES:",0,0,"l");
            //Linea1
            $pdf->Line($x+4.5, $y+0.5, $x+15, $y+0.5);
            
            $pdf->SetXY($x+5,$y);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($est->getPApellido()." ".$est->getSApellido()." ".$est->getNombres())),0,0,"L");
            
            $pdf->SetXY($x+16.5,$y);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(7.5,0.5,"N. Padre:",0,0,"L");
            //Linea2
            $pdf->Line($x+18.5, $y+0.5, $x+27, $y+0.5);
            
            $pdf->SetXY($x+18.5,$y);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($nom_padre." ".$ape_padre)),0,0,"L");
            
            $pdf->SetXY($x+27.5,$y);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(2.5,0.5,"VIVE:",0,0,"L");
            
            $pdf->SetXY($x+29,$y-0.25);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(1,1,"SI",1,0,"C");
            $pdf->SetXY($x+30,$y-0.25);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(1,1,"NO",1,0,"C");
            
            $vec= ["P","J","T","1°","2°","3°","4°","5°","6°","7°","8°","9°","10°","11°"];
            
            $y += 0.5;
            $pdf->SetXY($x,$y);
            $pdf-> SetFont("Arial","",11);
            $pdf->Cell(2,1,utf8_decode("GRADO"),0,0,"L");
            $pdf->SetXY($x,$y+1);
            $pdf-> SetFont("Arial","",11);
            $pdf->Cell(2,1,utf8_decode("AÑO"),0,0,"L");
            
            $pdf->SetXY($x+16.5,$y);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("Ocupación:"),0,0,"L");
            //Linea2
            $pdf->Line($x+18.5, $y+0.75, $x+24, $y+0.75);
            
            $pdf->SetXY($x+18.5,$y+0.25);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($ocupacion_padre)),0,0,"L");
            
            $pdf->SetXY($x+24,$y);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("Tel Emergencia:"),0,0,"L");
            //Linea2
            $pdf->Line($x+26.5, $y+0.75, $x+32, $y+0.75);
            
            $pdf->SetXY($x+27,$y+0.25);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($tel1_padre)),0,0,"L");
            
            //____________MADRE
            
            $pdf->SetXY($x+16.5,$y+1.25);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(7.5,0.5,"N. Madre:",0,0,"L");
            //Linea2
            $pdf->Line($x+18.5, $y+1.75, $x+27, $y+1.75);
            
            $pdf->SetXY($x+18.5,$y+1.25);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($nom_madre." ".$ape_madre)),0,0,"L");
            
            $pdf->SetXY($x+27.5,$y+1.25);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(2.5,0.5,"VIVE:",0,0,"L");
            
            $pdf->SetXY($x+29,$y+1);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(1,1,"SI",1,0,"C");
            $pdf->SetXY($x+30,$y+1);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(1,1,"NO",1,0,"C");
            
            $pdf->SetXY($x+16.5,$y+1.75);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("Ocupación:"),0,0,"L");
            //Linea2
            $pdf->Line($x+18.5, $y+2.5, $x+24, $y+2.5);
            
            $pdf->SetXY($x+18.5,$y+2);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($ocupacion_madre)),0,0,"L");
            
            $pdf->SetXY($x+24,$y+1.75);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("Tel Emergencia:"),0,0,"L");
            //Linea2
            $pdf->Line($x+26.5, $y+2.5, $x+32, $y+2.5);
            
            $pdf->SetXY($x+27,$y+2);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($tel1_madre)),0,0,"L");
            
            
                        //_______________________ACUDIENTE
            
            $pdf->SetXY($x+16.5,$y+2.75);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(7.5,0.5,"Acudiente:",0,0,"L");
            //Linea2
            $pdf->Line($x+18.5, $y+3.25, $x+27, $y+3.25);
            
            $pdf->SetXY($x+18.5,$y+2.75);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($nom_acu." ".$ape_acu)),0,0,"L");
            
            $pdf->SetXY($x+27.5,$y+2.75);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(2.5,0.5,"PARENTESCO:",0,0,"L");
            
             //Linea2
            $pdf->Line($x+30.25, $y+3.25, $x+32, $y+3.25);
            
            $pdf->SetXY($x+29,$y+1);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(1,1,"SI",1,0,"C");
            $pdf->SetXY($x+30,$y+1);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(1,1,"NO",1,0,"C");
            
            $pdf->SetXY($x+16.5,$y+3.25);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("Ocupación:"),0,0,"L");
            //Linea2
            $pdf->Line($x+18.5, $y+4, $x+24, $y+4);
            
            $pdf->SetXY($x+18.5,$y+3.5);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($ocupacion_acu)),0,0,"L");
            
            $pdf->SetXY($x+24,$y+3.25);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("Tel Emergencia:"),0,0,"L");
            //Linea2
            $pdf->Line($x+26.5, $y+4, $x+32, $y+4);
            
            $pdf->SetXY($x+27,$y+3.5);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($tel1_acu)),0,0,"L");

            $pdf->SetXY($x+16.5,$y+3.75);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("Dirección:"),0,0,"L");
            //Linea2
            $pdf->Line($x+18.5, $y+4.5, $x+25, $y+4.5);
            
            $pdf->SetXY($x+18.5,$y+4);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($direccion)),0,0,"L");
            
            $pdf->SetXY($x+25,$y+3.75);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("Barrio:"),0,0,"L");
            //Linea2
            $pdf->Line($x+26.5, $y+4.5, $x+32, $y+4.5);
            
            $pdf->SetXY($x+27,$y+4);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($barrio)),0,0,"L");
            
            $pdf->SetXY($x+16.5,$y+4.5);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("Correo Electronico:"),0,0,"L");
            //Linea2
            $pdf->Line($x+19.75, $y+5.25, $x+27, $y+5.25);
            
            $pdf->SetXY($x+27.2,$y+4.5);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("Ciudad:"),0,0,"L");
            //Linea2
            $pdf->Line($x+28.6, $y+5.25, $x+32, $y+5.25);
            
            $pdf->SetXY($x+28.5,$y+4.75);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($est->getMunicipioResidencia())),0,0,"L");
            
            $pdf->SetXY($x+16.5,$y+5);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("Aficiones Personales:"),0,0,"L");
            //Linea2
            $pdf->Line($x+20, $y+5.75, $x+32, $y+5.75);
            
            $grupo="";
            
            $x+=2;
            //CICLO
            foreach ($vec as $v){
                $band=0;
                $pdf->SetXY($x,$y);
                $pdf-> SetFont("Arial","B",11);
                if(strlen($v)==4){
                    $g=substr($v,0,2);
                }else{
                    $g=$v[0];
                }
                if($matriculas != null){
                   foreach($matriculas as $ma){
                        $salon = new Salon();
                        $sal = $salon->leerSalonePorId($ma->getIdSalon());
                        if ($sal->getIdGrado()==$g){
                            $band++;
                            
                            $pdf->Cell(1,1,utf8_decode($v),1,0,"C");
                            $pdf->SetXY($x,$y+1);
                            $pdf-> SetFont("Arial", "",11);
                            $pdf->Cell(1,1,utf8_decode(substr($ma->getAnoLectivo(),2,2)),1,0,"C");
                            
                        }
                   }
                }
                                        
                $salon = new Salon();
                $sal = $salon->leerSalonePorId($mat->getIdSalon());
                if ($sal->getIdGrado()==$g){
                    $band++;
                    
                        $pdf->Cell(1,1,utf8_decode($v),1,0,"C");
                        $pdf->SetXY($x,$y+1);
                        $pdf->SetFont("Arial","",11);
                        $pdf->Cell(1,1,utf8_decode(substr($mat->getAnoLectivo(),2,2)),1,0,"C");
                        
                        $grupo= $sal->getGrupo();
                        
                   }
                if($band==0){
                    $pdf->Cell(1,1,utf8_decode($v),1,0,"C");
                    $pdf->SetXY($x,$y+1);
                    $pdf-> SetFont("Arial","",11);
                    $pdf->Cell(1,1,utf8_decode(""),1,0,"C");
                    
                    
                }
                $x++;    
            }
            
            $y+=2.25;
            $x=0.5;
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,utf8_decode("Fecha de Ingreso:"),0,0,"L");
           
            $pdf->SetXY($x+3.5,$y);
            $pdf->Cell(1,0.5,utf8_decode(""),1,0,"L");
            
            $pdf->SetXY($x+4.5,$y);
            $pdf->Cell(1,0.5,utf8_decode(""),1,0,"L");
            
            $pdf->SetXY($x+5.5,$y);
            $pdf->Cell(1,0.5,utf8_decode(""),1,0,"L");
            
            $pdf->SetXY($x+7,$y);
            $pdf->Cell(1.5,0.5,utf8_decode("GRUPO:"),0,0,"L");
            
            $pdf->SetXY($x+8.75,$y);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(1,0.5,utf8_decode($grupo),1,0,"L");
            
            $pdf->SetXY($x+10.5,$y);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(1.5,0.5,utf8_decode("Repitente:"),0,0,"L");
            
            $pdf->SetXY($x+13,$y);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(1,0.5,utf8_decode("SI"),1,0,"C");
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(1,0.5,utf8_decode("NO"),1,0,"C");
            
            $y+=0.6;
            $pdf->SetXY($x,$y);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(1.5,0.5,utf8_decode("Fecha de Nacimiento:"),0,0,"L");
            
            $f = explode("-",$fecha_nac);
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(1,0.5,utf8_decode($f[2]),1,0,"C");
            $pdf->SetXY($x+5,$y);
            $pdf->Cell(1,0.5,utf8_decode($f[1]),1,0,"C");
            $pdf->SetXY($x+6,$y);
            $pdf->Cell(1,0.5,utf8_decode($f[0]),1,0,"C");
            
            $pdf->SetXY($x+7.25,$y);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(1.5,0.5,utf8_decode("Sexo:"),0,0,"L");
            
            $pdf->SetXY($x+8.5,$y);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(1,0.5,utf8_decode($sexo),1,0,"C");
            
            $pdf->SetXY($x+9.75,$y);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(1,0.5,utf8_decode("L. Nacimiento:"),0,0,"L");
            
            //Linea2
            $pdf->Line($x+12.5, $y+0.5, $x+16, $y+0.5);
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+12.5,$y);
            $pdf->Cell(1,0.5,utf8_decode($lugar_nac),0,0,"L");
            
            $y+=0.6;
            
            $pdf->SetXY($x,$y);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(1.5,0.5,utf8_decode("Cuidado Especial:"),0,0,"L");
            
            $pdf->SetXY($x+3.1,$y);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(1,0.5,utf8_decode("SI"),1,0,"C");
            $pdf->SetXY($x+4.1,$y);
            $pdf->Cell(1,0.5,utf8_decode("NO"),1,0,"C");
            
            $pdf->SetXY($x+5.5,$y-0.25);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("Teléfono:"),0,0,"L");
            //Linea2
            $pdf->Line($x+7.2, $y+0.5, $x+10, $y+0.5);
            
            $pdf->SetXY($x+7.2,$y);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($tel)),0,0,"L");
            
            $pdf->SetXY($x+10.5,$y-0.25);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("E.P.S:"),0,0,"L");
            //Linea2
            $pdf->Line($x+11.7, $y+0.5, $x+16, $y+0.5);
            
            $pdf->SetXY($x+11.7,$y);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($eps)),0,0,"L");
            
            $y+=0.6;
            
            $pdf->SetXY($x,$y);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(1.5,0.5,utf8_decode("Enfermedad De Cuidado:"),0,0,"L");
            
            //Linea2
            $pdf->Line($x+4.2, $y+0.5, $x+12, $y+0.5);
                        
            $pdf->SetXY($x+12.5,$y-0.25);
            $pdf->SetFont("Arial","",10);
            $pdf->Cell(2,1,utf8_decode("R.H:"),0,0,"L");
            //Linea2
            $pdf->Line($x+13.7, $y+0.5, $x+16, $y+0.5);
            
            $pdf->SetXY($x+13.7,$y);
            $pdf-> SetFont("Arial","B",10);
            $pdf->Cell(7.5,0.5,utf8_decode(strtoupper($est->getTipoSanguineo())),0,0,"L");
            
            $y+=0.6;
            $pdf->SetXY($x,$y);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(1.5,0.5,utf8_decode("Medicamentos Exclusivos:"),0,0,"L");
            
            //Linea2
            $pdf->Line($x+4.5, $y+0.5, $x+16, $y+0.5);
            
            $y+=0.6;
            $pdf->SetXY($x,$y);
            $pdf-> SetFont("Arial","",10);
            $pdf->Cell(1.5,0.5,utf8_decode("Institución educativa de donde procede:"),0,0,"L");
            
            //Linea2
            $pdf->Line($x+6.5, $y+0.5, $x+16, $y+0.5);
            
            //TABLAAA_________________
            $y+=0.6;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","b",12);
            $pdf->Cell(2.5,0.75,utf8_decode("FECHA"),1,0,"C");
            
            $pdf->SetXY($x+2.5,$y);
            $pdf->Cell(0.75,0.75,utf8_decode("P"),1,0,"C");
            
            $pdf->SetXY($x+3.25,$y);
            $pdf->Cell(0.75,0.75,utf8_decode("T"),1,0,"C");
            
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(9,0.75,utf8_decode("EXPLICACIÓN DE LA SITUACIÓN"),1,0,"C");
            $pdf->SetXY($x+13,$y);
            $pdf->Cell(6.5,0.75,utf8_decode("PROCEDIMIENTO"),1,0,"C");
            $pdf->SetXY($x+19.5,$y);
            $pdf->Cell(6.5,0.75,utf8_decode("COMPROMISO"),1,0,"C");
            $pdf->SetXY($x+26,$y);
            $pdf->Cell(4,0.75,utf8_decode("F. ALUMNO"),1,0,"C");
            $pdf->SetXY($x+30,$y);
            $pdf->Cell(4,0.75,utf8_decode("F.PROFESOR"),1,0,"C");
            
            
            //____________ESPACIOS
            $y+=0.75;
            $pdf->SetFont("Arial","",12);
            for($i=0;$i<15;$i++){
                $pdf->SetXY($x,$y);
            
            $pdf->Cell(2.5,0.5,utf8_decode(""),1,0,"C");
            
            $pdf->SetXY($x+2.5,$y);
            $pdf->Cell(0.75,0.5,utf8_decode(""),1,0,"C");
            
            $pdf->SetXY($x+3.25,$y);
            $pdf->Cell(0.75,0.5,utf8_decode(""),1,0,"C");
            
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(9,0.5,utf8_decode(""),1,0,"C");
            $pdf->SetXY($x+13,$y);
            $pdf->Cell(6.5,0.5,utf8_decode(""),1,0,"C");
            $pdf->SetXY($x+19.5,$y);
            $pdf->Cell(6.5,0.5,utf8_decode(""),1,0,"C");
            $pdf->SetXY($x+26,$y);
            $pdf->Cell(4,0.5,utf8_decode(""),1,0,"C");
            $pdf->SetXY($x+30,$y);
            $pdf->Cell(4,0.5,utf8_decode(""),1,0,"C");
            $y+=0.5;
            }
            
            $pdf->AddPage();
            //TABLAAA_________________
            $y=0.5;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","b",12);
            $pdf->Cell(2.5,0.75,utf8_decode("FECHA"),1,0,"C");
            
            $pdf->SetXY($x+2.5,$y);
            $pdf->Cell(0.75,0.75,utf8_decode("P"),1,0,"C");
            
            $pdf->SetXY($x+3.25,$y);
            $pdf->Cell(0.75,0.75,utf8_decode("T"),1,0,"C");
            
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(9,0.75,utf8_decode("EXPLICACIÓN DE LA SITUACIÓN"),1,0,"C");
            $pdf->SetXY($x+13,$y);
            $pdf->Cell(6.5,0.75,utf8_decode("PROCEDIMIENTO"),1,0,"C");
            $pdf->SetXY($x+19.5,$y);
            $pdf->Cell(6.5,0.75,utf8_decode("COMPROMISO"),1,0,"C");
            $pdf->SetXY($x+26,$y);
            $pdf->Cell(4,0.75,utf8_decode("F. ALUMNO"),1,0,"C");
            $pdf->SetXY($x+30,$y);
            $pdf->Cell(4,0.75,utf8_decode("F.PROFESOR"),1,0,"C");
            
            
            //____________ESPACIOS
            $y+=0.75;
            
            for($i=0;$i<23;$i++){
                $pdf->SetXY($x,$y);
            
            $pdf->Cell(2.5,0.5,utf8_decode(""),1,0,"C");
            
            $pdf->SetXY($x+2.5,$y);
            $pdf->Cell(0.75,0.5,utf8_decode(""),1,0,"C");
            
            $pdf->SetXY($x+3.25,$y);
            $pdf->Cell(0.75,0.5,utf8_decode(""),1,0,"C");
            
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(9,0.5,utf8_decode(""),1,0,"C");
            $pdf->SetXY($x+13,$y);
            $pdf->Cell(6.5,0.5,utf8_decode(""),1,0,"C");
            $pdf->SetXY($x+19.5,$y);
            $pdf->Cell(6.5,0.5,utf8_decode(""),1,0,"C");
            $pdf->SetXY($x+26,$y);
            $pdf->Cell(4,0.5,utf8_decode(""),1,0,"C");
            $pdf->SetXY($x+30,$y);
            $pdf->Cell(4,0.5,utf8_decode(""),1,0,"C");
            $y+=0.5;
            }
            $y+=0.25;
            $pdf->SetFont("Arial","B",15);
            $pdf->SetXY($x,$y);
            $pdf->Cell(34,0.5,utf8_decode("CITAS ACUDIENTE"),0,0,"C");
            
            
            //Linea2
            $pdf->Line($x, $y+1, $x+8, $y+1);
            $pdf->SetXY($x+8,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $pdf->SetXY($x+9,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $pdf->SetXY($x+10,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $x+=11.5;
            
            $pdf->Line($x, $y+1, $x+8, $y+1);
            $pdf->SetXY($x+8,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $pdf->SetXY($x+9,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $pdf->SetXY($x+10,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $x+=11.5;
            
            $pdf->Line($x, $y+1, $x+8, $y+1);
            $pdf->SetXY($x+8,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $pdf->SetXY($x+9,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $pdf->SetXY($x+10,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $y+=1.1;
            $x=0.5;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(8,0.5,"FIRMA",0,0,"C");
            
            $pdf->SetXY($x+8,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(3,0.5,"FECHA",0,0,"C");
            
            $x+=11.5;
            
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(8,0.5,"FIRMA",0,0,"C");
            
            $pdf->SetXY($x+8,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(3,0.5,"FECHA",0,0,"C");
            
            $x+=11.5;
            
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(8,0.5,"FIRMA",0,0,"C");
            
            $pdf->SetXY($x+8,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(3,0.5,"FECHA",0,0,"C");
            
            //______COPIA FIRMAS
            
            $y+=0.75;
            $x=0.5;
            $pdf->Line($x, $y+1, $x+8, $y+1);
            $pdf->SetXY($x+8,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $pdf->SetXY($x+9,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $pdf->SetXY($x+10,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $x+=11.5;
            
            $pdf->Line($x, $y+1, $x+8, $y+1);
            $pdf->SetXY($x+8,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $pdf->SetXY($x+9,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $pdf->SetXY($x+10,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $x+=11.5;
            
            $pdf->Line($x, $y+1, $x+8, $y+1);
            $pdf->SetXY($x+8,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $pdf->SetXY($x+9,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $pdf->SetXY($x+10,$y+0.5);
            $pdf->Cell(1,0.5,"",1,0,"C");
            
            $y+=1.1;
            $x=0.5;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(8,0.5,"FIRMA",0,0,"C");
            
            $pdf->SetXY($x+8,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(3,0.5,"FECHA",0,0,"C");
            
            $x+=11.5;
            
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(8,0.5,"FIRMA",0,0,"C");
            
            $pdf->SetXY($x+8,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(3,0.5,"FECHA",0,0,"C");
            
            $x+=11.5;
            
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(8,0.5,"FIRMA",0,0,"C");
            
            $pdf->SetXY($x+8,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(3,0.5,"FECHA",0,0,"C");
            
            //______________________
            
            $x=0.5;
            $y+=1;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(6,0.5,"ENTREGA DE BOLETINES",0,0,"R");
            $x+=6;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(5.5,0.5,"PRIMER PERIODO",1,0,"C");
            $x+=5.5;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(5.5,0.5,"SEGUNDO PERIODO",1,0,"C");
            $x+=5.5;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(5.5,0.5,"TERCER PERIODO",1,0,"C");
            
            $x+=5.5;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(5.5,0.5,"CUARTO PERIODO",1,0,"C");
            $x+=5.5;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(5.5,0.5,"QUINTO INFORME",1,0,"C");
            
            $x=0.5;
            $y+=0.5;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(6,1,"FIRMA ACUDIENTE",0,0,"R");
            $x+=6;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(5.5,1,"",1,0,"C");
            $x+=5.5;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(5.5,1,"",1,0,"C");
            $x+=5.5;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(5.5,1,"",1,0,"C");
            
            $x+=5.5;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(5.5,1,"",1,0,"C");
            $x+=5.5;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(5.5,1,"",1,0,"C");
            
            $y+=1;
            $x=0.5;
            $pdf->SetXY($x,$y);
            $pdf->SetFont("Arial","B",12);
            $pdf->Cell(5.5,1,"DIRECTOR DE GRUPO:",0,0,"C");
            $pdf->Line($x+5.75, $y+0.75, $x+30, $y+0.75);
            $pdf-> Output("Observador ".$nom." ".$ape,"I");
    }
    
    public function planillaAuxiliarSantateresita(){
        set_time_limit(90);
            
            $x=0; $y=0;
            $pdf=new FPDF('P','cm','Letter');
            $pdf->AddPage();
            $pdf-> SetFont("Times","BI",20);
            $pdf->SetXY(1,5);
            $pdf->Cell(20,3,"PLANILLAS AUXILIARES",0,0,"C");
            $pdf->SetXY(1,9);
            $pdf-> SetFont("Times","BI",15);
            $pdf->Cell(20,3,"Imprime las que necesites !",0,0,"C");
            $salon = new Salon();
            $salones= $salon->leerSalones();
            
            foreach ($salones as $s) {
                $pdf->AddPage();
                $x=1;$y=1;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,2.25,"",1,0,"C");
                $pdf->Cell(6.5,2.25,"",1,0,"C");
                $pdf->Cell(4.5,2.25,"",1,0,"C");
                $pdf-> SetFont("Times","BI",11);
                
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,"COLEGIO",0,0,"C");
                $pdf->Cell(6.5,0.5,utf8_decode("ÁREAS / ASIGNATURA"),0,0,"C");
                $pdf->Cell(4.5,0.5,"GRUPO: ".$s->getGrupo(),0,0,"L");
                $y+=0.5;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,'"SANTA TERESITA"',0,0,"C");
                $pdf->Cell(6.5,0.5,utf8_decode("____________________"),0,0,"C");
                $pdf->Cell(4.5,0.8,"GRADO: ".$s->getIdGrado(),0,0,"L");
                $y+=0.5;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,'2014',0,0,"C");
                $pdf->Cell(6.5,0.8,utf8_decode("DOCENTE"),0,0,"C");
                $pdf->Cell(4.5,1,"PERIODO______",0,0,"L");
                $y+=0.5;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,'PLANILLA AUXILIAR',0,0,"C");
                $pdf->Cell(6.5,0.7,utf8_decode("____________________"),0,0,"C");
                
                $y=3.25;
                $pdf->SetXY($x,$y);
                $pdf-> SetFont("Times","BI",12);
                $pdf->Cell(7.5,1.25,'APELLIDOS Y NOMBRES',1,0,"C");
                $pdf-> SetFont("Times","B",9);
                $pdf->Cell(1.98,0.5,'D. PROP.',1,0,"C");
                $pdf->Cell(1.98,0.5,'D. ARG.',1,0,"C");
                $pdf->Cell(1.98,0.5,'D. INTER',1,0,"C");
                $pdf->Cell(1,1.25,'V.F',1,0,"C");
                $pdf->Cell(1.06,1.25,'AUS.',1,0,"C");
                
                $y= 3.75;
                $x = 8.5;
                $pdf->SetXY($x,$y);
                $pdf-> SetFont("Times","I",9);
                $pdf->Cell(0.66,0.75,'1',1,0,"C");
                $pdf->Cell(0.66,0.75,'2',1,0,"C");
                $pdf->Cell(0.66,0.75,'3',1,0,"C");
                $pdf->Cell(0.66,0.75,'4',1,0,"C");
                $pdf->Cell(0.66,0.75,'5',1,0,"C");
                $pdf->Cell(0.66,0.75,'6',1,0,"C");
                $pdf->Cell(0.66,0.75,'7',1,0,"C");
                $pdf->Cell(0.66,0.75,'8',1,0,"C");
                $pdf->Cell(0.66,0.75,'9',1,0,"C");
                
                $y=4.5;
                $x=1;
                $c=0;
                $persona = new Persona();
                $personas = $persona->leerPorSalon($s->getIdSalon());
                foreach ($personas as $p){
                    $c++;
                    $pdf->SetXY($x,$y);
                    $pdf-> SetFont("Times","",9);
                    $pdf->Cell(0.5,0.5,$c,1,0,"C");
                    $pdf-> SetFont("Times","",8);
                    $pdf->Cell(7,0.5,strtoupper ( utf8_decode($p->getPApellido()." ".$p->getSApellido()." ".$p->getNombres())),1,0,"L");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(1,0.5,'',1,0,"C");
                    $pdf->Cell(1.06,0.5,'',1,0,"C");
                    $y+=0.5;
                }
                

            } 
            
            $pdf-> Output("Planillas","I");
    }
    public function planillaCalificacionSantateresita(){
        set_time_limit(90);
            
            $x=0; $y=0;
            $pdf=new FPDF('P','cm','Letter');
            $pdf->AddPage();
            $pdf-> SetFont("Times","BI",20);
            $pdf->SetXY(1,5);
            $pdf->Cell(20,3,"PLANILLAS DE CALIFICACION",0,0,"C");
            $pdf->SetXY(1,9);
            $pdf-> SetFont("Times","BI",15);
            $pdf->Cell(20,3,"Imprime las que necesites !",0,0,"C");
            $salon = new Salon();
            $salones= $salon->leerSalones();
            
            foreach ($salones as $s) {
                $pdf->AddPage();
                $x=1;$y=1;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,2.25,"",1,0,"C");
                $pdf->Cell(6.5,2.25,"",1,0,"C");
                $pdf->Cell(2.5,2.25,"",1,0,"C");
                $pdf-> SetFont("Times","BI",11);
                
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,"COLEGIO",0,0,"C");
                $pdf->Cell(6.5,0.5,utf8_decode("ÁREAS / ASIGNATURA"),0,0,"C");
                $pdf->Cell(4.5,0.5,"GRUPO: ".$s->getGrupo(),0,0,"L");
                $y+=0.5;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,'"SANTA TERESITA"',0,0,"C");
                $pdf->Cell(6.5,0.5,utf8_decode("____________________"),0,0,"C");
                $pdf->Cell(4.5,0.8,"GRADO: ".$s->getIdGrado(),0,0,"L");
                $y+=0.5;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,'2014',0,0,"C");
                $pdf->Cell(6.5,0.8,utf8_decode("DOCENTE"),0,0,"C");
                $pdf->Cell(4.5,1,"PERIODO:__",0,0,"L");
                $y+=0.5;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,'PLANILLA CALIFIC.',0,0,"C");
                $pdf->Cell(6.5,0.7,utf8_decode("____________________"),0,0,"C");
                
                $y=3.25;
                $pdf->SetXY($x,$y);
                $pdf-> SetFont("Times","BI",12);
                $pdf->Cell(8.5,1,'APELLIDOS Y NOMBRES',1,0,"C");
                $pdf-> SetFont("Times","B",9);
                $pdf->Cell(1,1,'%.',1,0,"C");
                $pdf->Cell(1,1,'VAL.',1,0,"C");
                $pdf->Cell(0.75,1,'AU.',1,0,"C");
                $pdf->Cell(2.25,1,'CODIGOS',1,0,"C");
                
                $y=4.25;
                $x=1;
                $c=0;
                $persona = new Persona();
                $personas = $persona->leerPorSalon($s->getIdSalon());
                foreach ($personas as $p){
                    $c++;
                    $pdf->SetXY($x,$y);
                    $pdf-> SetFont("Times","",9);
                    $pdf->Cell(0.5,0.5,$c,1,0,"C");
                    $pdf-> SetFont("Times","",8);
                    $pdf->Cell(8,0.5,strtoupper ( utf8_decode($p->getPApellido()." ".$p->getSApellido()." ".$p->getNombres())),1,0,"L");
                    $pdf->Cell(1,0.5,'',1,0,"C");
                    $pdf->Cell(1,0.5,'',1,0,"C");
                    $pdf->Cell(0.75,0.5,'',1,0,"C");
                    $pdf->Cell(2.25,0.5,'',1,0,"C");
                    $y+=0.5;
                }
                

            } 
            
            $pdf-> Output("Planillas","I");
    }
    
    public function planillasDocenteSantateresita($idPersona){
        set_time_limit(90);
        $carga = new Carga();
        $Cargas = $carga->leerCargasPorDocente($idPersona);
            $salones= array();
            $i=0;
            foreach ($Cargas as $carga) {
                $salones[$i]= $carga->getIdSalon();
                $i++;
            }
            $salones= array_unique($salones);
            $pdf=new FPDF('P','cm','Letter');
            $pdf->AddPage();
            $pdf-> SetFont("Times","BI",20);
            $pdf->SetXY(1,5);
            $pdf->Cell(20,3,"PLANILLAS AUXILIARES",0,0,"C");
            $pdf->SetXY(1,9);
            $pdf-> SetFont("Times","BI",15);
            $pdf->Cell(20,3,"Imprime las que necesites !",0,0,"C");
            $x=0; $y=0;
            foreach ($salones as $idSalon) {
                $pdf->AddPage();
                $x=1;$y=1;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,2.25,"",1,0,"C");
                $pdf->Cell(6.5,2.25,"",1,0,"C");
                $pdf->Cell(4.5,2.25,"",1,0,"C");
                $pdf-> SetFont("Times","BI",11);
                
                $salon = new Salon();
                $s= $salon->leerSalonePorId($idSalon);
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,"COLEGIO",0,0,"C");
                $pdf->Cell(6.5,0.5,utf8_decode("ÁREAS / ASIGNATURA"),0,0,"C");
                $pdf->Cell(4.5,0.5,"GRUPO: ".$s->getGrupo(),0,0,"L");
                $y+=0.5;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,'"SANTA TERESITA"',0,0,"C");
                $pdf->Cell(6.5,0.5,utf8_decode("____________________"),0,0,"C");
                $pdf->Cell(4.5,0.8,"GRADO: ".$s->getIdGrado(),0,0,"L");
                $y+=0.5;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,'2014',0,0,"C");
                $pdf->Cell(6.5,0.8,utf8_decode("DOCENTE"),0,0,"C");
                $pdf->Cell(4.5,1,"PERIODO______",0,0,"L");
                $y+=0.5;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,'PLANILLA AUXILIAR',0,0,"C");
                $pdf->Cell(6.5,0.7,utf8_decode("____________________"),0,0,"C");
                
                $y=3.25;
                $pdf->SetXY($x,$y);
                $pdf-> SetFont("Times","BI",12);
                $pdf->Cell(7.5,1.25,'APELLIDOS Y NOMBRES',1,0,"C");
                $pdf-> SetFont("Times","B",9);
                $pdf->Cell(1.98,0.5,'D. PROP.',1,0,"C");
                $pdf->Cell(1.98,0.5,'D. ARG.',1,0,"C");
                $pdf->Cell(1.98,0.5,'D. INTER',1,0,"C");
                $pdf->Cell(1,1.25,'V.F',1,0,"C");
                $pdf->Cell(1.06,1.25,'AUS.',1,0,"C");
                
                $y= 3.75;
                $x = 8.5;
                $pdf->SetXY($x,$y);
                $pdf-> SetFont("Times","I",9);
                $pdf->Cell(0.66,0.75,'1',1,0,"C");
                $pdf->Cell(0.66,0.75,'2',1,0,"C");
                $pdf->Cell(0.66,0.75,'3',1,0,"C");
                $pdf->Cell(0.66,0.75,'4',1,0,"C");
                $pdf->Cell(0.66,0.75,'5',1,0,"C");
                $pdf->Cell(0.66,0.75,'6',1,0,"C");
                $pdf->Cell(0.66,0.75,'7',1,0,"C");
                $pdf->Cell(0.66,0.75,'8',1,0,"C");
                $pdf->Cell(0.66,0.75,'9',1,0,"C");
                
                $y=4.5;
                $x=1;
                $c=0;
                $persona = new Persona();
                $personas = $persona->leerPorSalon($idSalon);
                foreach ($personas as $p){
                    $c++;
                    $pdf->SetXY($x,$y);
                    $pdf-> SetFont("Times","",9);
                    $pdf->Cell(0.5,0.5,$c,1,0,"C");
                    $pdf-> SetFont("Times","",8);
                    $pdf->Cell(7,0.5,strtoupper ( utf8_decode($p->getPApellido()." ".$p->getSApellido()." ".$p->getNombres())),1,0,"L");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(0.66,0.5,'',1,0,"C");
                    $pdf->Cell(1,0.5,'',1,0,"C");
                    $pdf->Cell(1.06,0.5,'',1,0,"C");
                    $y+=0.5;
                }

            }
            
            $pdf->AddPage();
            $pdf-> SetFont("Times","BI",20);
            $pdf->SetXY(1,5);
            $pdf->Cell(20,3,"PLANILLAS DE CALIFICACION",0,0,"C");
            $pdf->SetXY(1,9);
            $pdf-> SetFont("Times","BI",15);
            $pdf->Cell(20,3,"Imprime las que necesites !",0,0,"C");
            
            foreach ($salones as $idSalon) {
                $pdf->AddPage();
                $x=1;$y=1;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,2.25,"",1,0,"C");
                $pdf->Cell(6.5,2.25,"",1,0,"C");
                $pdf->Cell(2.5,2.25,"",1,0,"C");
                $pdf-> SetFont("Times","BI",11);
                $salon = new Salon();
                $s= $salon->leerSalonePorId($idSalon);
                
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,"COLEGIO",0,0,"C");
                $pdf->Cell(6.5,0.5,utf8_decode("ÁREAS / ASIGNATURA"),0,0,"C");
                $pdf->Cell(4.5,0.5,"GRUPO: ".$s->getGrupo(),0,0,"L");
                $y+=0.5;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,'"SANTA TERESITA"',0,0,"C");
                $pdf->Cell(6.5,0.5,utf8_decode("____________________"),0,0,"C");
                $pdf->Cell(4.5,0.8,"GRADO: ".$s->getIdGrado(),0,0,"L");
                $y+=0.5;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,'2014',0,0,"C");
                $pdf->Cell(6.5,0.8,utf8_decode("DOCENTE"),0,0,"C");
                $pdf->Cell(4.5,1,"PERIODO:__",0,0,"L");
                $y+=0.5;
                $pdf->SetXY($x,$y);
                $pdf->Cell(4.5,0.5,'PLANILLA CALIFIC.',0,0,"C");
                $pdf->Cell(6.5,0.7,utf8_decode("____________________"),0,0,"C");
                
                $y=3.25;
                $pdf->SetXY($x,$y);
                $pdf-> SetFont("Times","BI",12);
                $pdf->Cell(8.5,1,'APELLIDOS Y NOMBRES',1,0,"C");
                $pdf-> SetFont("Times","B",9);
                $pdf->Cell(1,1,'%.',1,0,"C");
                $pdf->Cell(1,1,'VAL.',1,0,"C");
                $pdf->Cell(0.75,1,'AU.',1,0,"C");
                $pdf->Cell(2.25,1,'CODIGOS',1,0,"C");
                
                $y=4.25;
                $x=1;
                $c=0;
                $persona = new Persona();
                $personas = $persona->leerPorSalon($s->getIdSalon());
                foreach ($personas as $p){
                    $c++;
                    $pdf->SetXY($x,$y);
                    $pdf-> SetFont("Times","",9);
                    $pdf->Cell(0.5,0.5,$c,1,0,"C");
                    $pdf-> SetFont("Times","",8);
                    $pdf->Cell(8,0.5,strtoupper ( utf8_decode($p->getPApellido()." ".$p->getSApellido()." ".$p->getNombres())),1,0,"L");
                    $pdf->Cell(1,0.5,'',1,0,"C");
                    $pdf->Cell(1,0.5,'',1,0,"C");
                    $pdf->Cell(0.75,0.5,'',1,0,"C");
                    $pdf->Cell(2.25,0.5,'',1,0,"C");
                    $y+=0.5;
                }
                

            }
            
            
            $pdf-> Output("Planillas","I");
        
    }
    
    public function directorioGalois(){
        set_time_limit(90);
            
            $x=0; $y=0;
            $pdf=new FPDF('P','cm','Letter');
            $pdf->AddPage();
            $pdf-> SetFont("Times","BI",20);
            $pdf->SetXY(1,5);
            $pdf->Cell(20,3,"DIRECTORIO TELEFONICO",0,0,"C");
            $pdf->SetXY(1,9);
            $pdf-> SetFont("Times","BI",15);
            $pdf->Cell(20,3,"Imprime las hojas que necesites !",0,0,"C");
            $salon = new Salon();
            $salones= $salon->leerSalones();
            
            foreach ($salones as $s) {
                $pdf->AddPage();
                $x=1;$y=1;
                $pdf->SetXY($x,$y);
                $pdf->SetXY($x,$y);
                $pdf-> SetFont("Times","BI",12);
                $pdf->Cell(0.5,1,'No',1,0,"C");
                $pdf->Cell(8.5,1,'APELLIDOS Y NOMBRES',1,0,"C");
                $pdf->Cell(5,1,'TELEFONO',1,0,"C");
                
                
                $y=2;
                $x=1;
                $c=0;
                $persona = new Persona();
                $personas = $persona->leerPorSalon($s->getIdSalon());
                foreach ($personas as $p){
                    $c++;
                    $pdf->SetXY($x,$y);
                    $pdf-> SetFont("Times","",9);
                    $pdf->Cell(0.5,0.5,$c,1,0,"C");
                    $pdf-> SetFont("Times","",9);
                    $pdf->Cell(8.5,0.5,strtoupper ( utf8_decode($p->getPApellido()." ".$p->getSApellido()." ".$p->getNombres())),1,0,"L");
                    $pdf-> SetFont("Times","",12);
                    $pdf->Cell(5,0.5,$p->getTelefono(),1,0,"C");
                    
                    $y+=0.5;
                }
                

            } 
            
            $pdf-> Output("Planillas","I");
    }
    
}
?>