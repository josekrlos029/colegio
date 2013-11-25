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
            $pdf->cell(19.5,1,"TARJETA ACUMULATVA DE MATRICULA",0,0,"C",true);
            $y++;
            $pdf-> SetFont("Arial","B",20);
            $pdf->SetXY($x,$y);
            $pdf->Cell(19.5,1,"COLEGIO SANTA TERESITA",0,0,"C",true);
            
            $y++;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,"Apellidos",1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(6,0.5,utf8_decode(strtoupper($est->getPApellido()." ".$est->getSApellido())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,"Nombres",1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getNombres())),1,0,"L");
            
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,utf8_decode("Identificación"),1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(4,0.5,utf8_decode(strtoupper($est->getTipoDocumento()." ".$est->getIdPersona())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+8,$y);
            $pdf->Cell(2,0.5,"RH: ".$est->getTipoSanguineo(),1,0,"L");
            
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,"EPS",1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getEps())),1,0,"L");
            
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,"Fecha de Nacim",1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(6,0.5,utf8_decode(strtoupper($est->getFNacimiento())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,"Ciudad",1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getMunicipioResidencia())),1,0,"L");
            
            
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,"Centro de Procedencia",1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(6,0.5,utf8_decode(strtoupper($est->getInstProcedencia())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,utf8_decode("Dirección"),1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getDireccion())),1,0,"L");
            
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,"Nombre Padre",1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(6,0.5,utf8_decode(strtoupper($est->getNombresPadre()." ".$est->getApellidosPadre())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,"Nombre Madre",1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getNombresMadre()." ".$est->getApellidosMadre())),1,0,"L");
            
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,"C.C",1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(6,0.5,utf8_decode(strtoupper($est->getIdPadre())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,"C.C",1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getIdMadre())),1,0,"L");
            
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,utf8_decode("Ocupación"),1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(6,0.5,utf8_decode(strtoupper($est->getOcupacionPadre())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,utf8_decode("Ocupación"),1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+14,$y);
            $pdf->Cell(5.5,0.5,utf8_decode(strtoupper($est->getOcupacionMadre())),1,0,"L");
            
            $y += 0.5;
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(4,0.5,utf8_decode("Teléfono"),1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
            $pdf->SetXY($x+4,$y);
            $pdf->Cell(6,0.5,utf8_decode(strtoupper($est->getTelPadre())),1,0,"L");
           
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x+10,$y);
            $pdf->Cell(4,0.5,utf8_decode("Teléfono"),1,0,"L");
            
            $pdf-> SetFont("Arial","",10);
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
//            v
//            $y += 0.5;
//            $pdf->SetXY($x,$y);
//            $pdf-> SetFont("Arial","",12);
//            $pdf->Cell(2,1,utf8_decode("AÑO"),1,0,"C",true);
//
//            $pdf->SetXY($x+2,$y);
//            $pdf->Cell(2,1,utf8_decode("GRADO"),1,0,"C",true);
//
//            $pdf->SetXY($x+4,$y);
//            $pdf->Cell(2,1,utf8_decode("EDAD"),1,0,"C",true);
//
//            $pdf->SetXY($x+6,$y);
//            $pdf->Cell(2,1,utf8_decode("N° MAT"),1,0,"C",true);
//
//            $pdf->SetXY($x+8,$y);
//            $pdf->Cell(11.5,1,utf8_decode("FIRMA DEL EDUCANDO"),1,0,"C",true);
//            
//            $y += 0.5;
//            
//            if($matriculas != null){
//                foreach($matriculas as $ma){
//
//                    $y += 0.5;
//                $pdf->SetXY($x,$y);
//                $pdf-> SetFont("Arial","",10);
//                $pdf->Cell(2,0.5,utf8_decode($ma->getAnoLectivo()),1,0,"C");
//                $salon = new Salon();
//                $sal = $salon->leerSalonePorId($ma->getIdSalon());
//
//                $pdf->SetXY($x+2,$y);
//                $pdf->Cell(2,0.5,utf8_decode($sal->getIdGrado()),1,0,"C");
//
//                list($ano,$mes,$dia) = explode("-",$fecha_nac);
//                list($ano_mat,$mes_mat,$dia_mat) = explode("-",$ma->getFecha());
//                    $ano_diferencia  = $ano_mat - $ano;
//                    $mes_diferencia = $mes_mat - $mes;
//                    $dia_diferencia   = $dia_mat - $dia;
//                    if ($dia_diferencia < 0 || $mes_diferencia <= 0)
//                        $ano_diferencia--;
//
//
//                $pdf->SetXY($x+4,$y);
//                $pdf->Cell(2,0.5,utf8_decode($ano_diferencia+1),1,0,"C");
//
//                $pdf->SetXY($x+6,$y);
//                $pdf->Cell(2,0.5,utf8_decode(""),1,0,"C");
//
//                $pdf->SetXY($x+8,$y);
//                $pdf->Cell(11.5,0.5,utf8_decode(""),1,0,"C");
//
//                }
//            } 
//            
//                    $y += 0.5;
//                $pdf->SetXY($x,$y);
//                $pdf-> SetFont("Arial","",10);
//                $pdf->Cell(2,0.5,utf8_decode($mat->getAnoLectivo()),1,0,"C");
//                $salon = new Salon();
//                $sal = $salon->leerSalonePorId($mat->getIdSalon());
//
//                $pdf->SetXY($x+2,$y);
//                $pdf->Cell(2,0.5,utf8_decode($sal->getIdGrado()),1,0,"C");
//
//                list($ano,$mes,$dia) = explode("-",$fecha_nac);
//                list($ano_mat,$mes_mat,$dia_mat) = explode("-",$mat->getFecha());
//                    $ano_diferencia  = $ano_mat - $ano;
//                    $mes_diferencia = $mes_mat - $mes;
//                    $dia_diferencia   = $dia_mat - $dia;
//                    if ($dia_diferencia < 0 || $mes_diferencia <= 0)
//                        $ano_diferencia--;
//
//
//                $pdf->SetXY($x+4,$y);
//                $pdf->Cell(2,0.5,utf8_decode($ano_diferencia+1),1,0,"C");
//
//                $pdf->SetXY($x+6,$y);
//                $pdf->Cell(2,0.5,utf8_decode(""),1,0,"C");
//
//                $pdf->SetXY($x+8,$y);
//                $pdf->Cell(11.5,0.5,utf8_decode(""),1,0,"C");
                    $x=1;
                    $y += 4;
            $pdf->Line($x+3.5, $y+0.5, $x+19.5, $y+0.5);
            $pdf-> SetFont("Arial","B",10);
            $pdf->SetXY($x,$y);
            $pdf->Cell(3.5,0.5,"Observaciones:",0,0,"L");
            
            $y += 1.5;
            $pdf->SetXY($x+2,$y);
            $pdf->Cell(6,0.5,"","B",0,"R");

            $pdf->SetXY($x+11,$y);
            $pdf->Cell(6,0.5,"","B",0,"R");
            $y += 0.5;
            $pdf->SetXY($x+2,$y);
            $pdf->Cell(6,0.5,"Firma Del Padre o Acudiente",0,0,"C");

            $pdf->SetXY($x+12,$y);
            $pdf->Cell(4,0.5,"Firma del Rector",0,0,"C");

           
            $pdf-> Output("Matricula ".$nom." ".$ape,"I");
    }
    
    
}
?>