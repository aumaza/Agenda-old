<!DOCTYPE html>
<html lang="es"><head>
<title>Calendario con horas Programadas para un Trabajador</title>
<meta charset="utf-8">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet"  type="text/css" media="screen" href="calendarStyle.css" />

    
</head>

<body>
<h1>Calendario con Horas Programadas para un Trabajador</h1>

<?php

//funcion q devuelve cantidad de dias de un mes en un año
function getMonthDays($Month, $Year)
{
	
	if( is_callable("cal_days_in_month"))
	 { 
	 	return cal_days_in_month(CAL_GREGORIAN, $Month, $Year); 
	 }

		else
		 { 
		 	return date("d",mktime(0,0,0,$Month+1,0,$Year)); 
		 }
}


//funcion que crea calendarios
function pcalenda($month,$year)
 {
	$ddias=getMonthDays($month, $year); // Numero de dias del mes
	$diaSemana=date("w",mktime(0,0,0,$month,1,$year)) ; //dia de la scandir(directory)emana del primer dia Devuelve 0 para domingo, 6 para sabado
	$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	echo "<table id='calendar' border=1><caption>". $meses[$month]." ".$year."</caption><tr> <th rowspan=2>Dias Horas</th>";


switch ($diaSemana)
 {
	case 1 : echo "<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th>"; $dis =7 ;break;
	case 2 : echo "<th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th>"; $dis =6; break;
	case 3 : echo "<th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th>"; $dis =5; break;
	case 4 : echo "<th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th>"; $dis =4; break;
	case 5 : echo "<th>Vie</th><th>Sab</th><th>Dom</th>"; $dis =3; break;
	case 6 : echo "<th>Sab</th><th>Dom</th>"; $dis =2; break;
	case 0 : echo "<th>Dom</th>"; $dis =1; break;
}

$cc = floor(($ddias-$dis)/7) ; //semanas completas

for($i=1; $i<=$cc; $i++)
 { 
 	echo "<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th>";
 }

$diasfin = ($ddias-$dis)%7 ; // ultima semana semana incompleta

switch ($diasfin)
 {
// case 0 : echo "<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th>"; break;
	case 1 : echo "<th>Lun</th>"; break;
	case 2 : echo "<th>Lun</th><th>Mar</th>"; break;
	case 3 : echo "<th>Lun</th><th>Mar</th><th>Mie</th>"; break;
	case 4 : echo "<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th>"; break;
	case 5 : echo "<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th>"; break;
	case 6 : echo "<th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th>"; break;

}

echo "</tr><tr bgcolor='silver' align='center'>";

$day=1 ;

for($i=1;$i<=($ddias);$i++)
 { 
 echo "<td align='center'>$day</td>"; $day++; /*dias*/
 }

echo "<tr>";

/* Esta parte es si se quiere agreagar un horario pintando horas en el calendario
* for ($i=0; $i<=($ddias*6); $i++) { $varh[$i] = 0 ; } $ndv =0; ;//inicializa variables
$varh[0]='08'; $varh[1]='15'; //el 1 de 8 15
$varh[2]='19'; $varh[3]='24'; //el 1 de 19 24
$varh[6]='04'; $varh[7]='10'; //el 2 de 4 10
$varh[156]='05'; $varh[157]='15'; //el 27 de 5 15 //$varh[(n-1)*6]
for ($ho = 1; $ho < 25; $ho++) { //crea las horas
echo "<tr align='center'><td>"; if (strlen($ho)<2) { echo "0$ho:00" ; } else { echo "$ho:00" ; }
for ($di=1; $di <=($ddias); $di++ ) { //crea los dias de la semana
if ($ho>=$varh[$ndv] && $ho<=$varh[$ndv+1]) {echo "</td><td bgcolor=#F7FE2E class='amarillo'>_____"; }
elseif ($ho>=$varh[$ndv+2] && $ho<=$varh[$ndv+3]) { echo "</td><td bgcolor=#01DF01 class='verde'>_____"; }
elseif ($ho>=$varh[$ndv+4] && $ho<=$varh[$ndv+5]) { echo "</td><td bgcolor=#FF0000 class='rojo'>_____"; }
else { echo "</td><td>"; }
$ndv = $ndv+6; }
$ndv= 0; echo "</tr>"; } */

for ($ho = 1; $ho < 25; $ho++)
 { //crea las horas
	echo "<tr align='center'><td>"; 

	if (strlen($ho)<2)
	 { 
	 	echo "0$ho:00"; 
		} 

		else
		 { 
		 	echo "$ho:00";
		 }

for($di=1; $di <=($ddias); $di++)
 { //crea los dias de la semana
	echo "</td><td>";
 }
	echo "</tr>"; 
}
	echo "</table>";
}

?>
</body>
</html>
