<?php

	$dias = array("Monday"    => "Lunes"     ,"Lunes"     => "Monday", 
				  "Tuesday"   => "Martes"    ,"Martes"    => "Tuesday", 
				  "Wednesday" => "Miercoles" ,"Miercoles" => "Wednesday", 
				  "Thursday"  => "Jueves"    ,"Jueves"    => "Thursday", 
				  "Friday"    => "Viernes"   ,"Viernes"   => "Friday", 
				  "Saturday"  => "Sabado"    ,"Sabado"    => "Saturday", 
				  "Sunday"    => "Domingo"   ,"Domingo"   => "Sunday" ); 

	$mes = array("January"   =>"Enero"      ,"Enero"      => "January", 
				 "February"  =>"Febrero"    ,"Febrero"    => "February", 
				 "March"     =>"Marzo"      ,"Marzo"      => "March", 
				 "April"     =>"Abril"      ,"Abril"      => "April", 
				 "May"       =>"Mayo"       ,"Mayo"       => "May", 
				 "June"      =>"Junio"      ,"Junio"      => "June", 
				 "July"      =>"Julio"      ,"Julio"      => "July", 
				 "August"    =>"Agosto"     ,"Agosto"     => "August", 
				 "September" =>"Septiembre" ,"Septiembre" => "September", 
				 "October"   =>"Octubre"    ,"Octubre"    => "October", 
				 "November"  =>"Noviembre"  ,"Noviembre"  => "November", 
				 "December"  =>"Diciembre"  ,"Diciembre"  => "December"); 
	$fecha = $dias[date("l")] . ", " .date("d"). " de ". $mes[date("F")]. " ".date("Y"); 
	

 echo "</br>".$fecha;

?>
