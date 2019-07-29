<?php

# definimos los valores iniciales para nuestro calendario

$today = date("F j Y, H:i");

$month = date("n");
$month_before = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
$month_after  = mktime(0, 0, 0, date("m")+1, date("d"),   date("Y"));

$year = date("Y");
$year_before = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")-1);
$year_after = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);

$diaActual = date("j");


 

# Obtenemos el dia de la semana del primer dia

# Devuelve 0 para domingo, 6 para sabado

$diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;

# Obtenemos el ultimo dia del mes

$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));

 

$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",

"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");


//llamamos al mes siguiente





?>

 

<!DOCTYPE html>

<html lang="es">

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet"  type="text/css" media="screen" href="calendarStyle.css" />

    	<style>

		#calendar {

			font-family:Arial;

			font-size:12px;

		}

		#calendar caption {

			text-align:left;

			padding:5px 10px;

			background-color:green;

			color:white;

			font-weight:bold;

		}

		#calendar th {

			background-color:grey;

			color:white;

			width:50px;

		}

		
		#calendar td {

			text-align:center;

			padding:35px 5px;

			background-color:white;


		}

		#calendar .hoy {

			background-color:blue;

			color: red;

		}

		
		

	</style>

	
</head>
	<body>
		<nav class="navbar navbar-default">
        	<div class="container-fluid">
            	<div class="navbar-header">
              		<a class="navbar-brand">Calendario</a>

            </div>
            	<ul class="nav navbar-nav">
              	<li>
                <a href="#">Día</a>
              </li>
              <li>
                <a href="#">Semana</a>
              </li>
              <li>
                <a href="#">Mes</a>
              </li>
              <li>
                <a href="#">Año</a>
              </li>
              </ul>
          </div>
        </nav>

<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
<table class="table table-responsive-sm table-striped" id="calendar">

	<form action="calendarioA.php" method="POST">
	<div class="btn-toolbar" role="toolbar">
		<div class="btn-group">
			<button type="submit" name="A" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-menu-left"></span> Mes Anterior</button>
			<button type="submit" name="B" class="btn btn-warning btn-sm">Mes Siguiente <span class="glyphicon glyphicon-menu-right"></span></button>
		</div>
	</div>
	</form>

	<caption><?php echo $today?></caption>


	<tr>
		<th class="text-nowrap text-center">Lun</th>
		<th class="text-nowrap text-center">Mar</th>
		<th class="text-nowrap text-center">Mie</th>
		<th class="text-nowrap text-center">Jue</th>
		<th class="text-nowrap text-center">Vie</th>
		<th class="text-nowrap text-center">Sab</th>
		<th class="text-nowrap text-center">Dom</th>
	</tr>

	<tr bgcolor="silver">

		<?php

		
		

		$last_cell=$diaSemana+$ultimoDiaMes;

		// hacemos un bucle hasta 42, que es el máximo de valores que puede

		// haber... 6 columnas de 7 dias

		for($i=1;$i<=42;$i++)

		{

			if($i==$diaSemana)

			{

				// determinamos en que dia empieza

				$day=1;

			}

			if($i<$diaSemana || $i>=$last_cell)

			{

				// celca vacia

				echo "<td class='text-nowrap text-center'>&nbsp;</td>";

			}

			else{

				// mostramos el dia

				if($day==$diaActual)

					echo "<td class='text-nowrap text-center' id='today' class='hoy'>$day</td>";

				else

					echo "<td class='text-nowrap text-center'>$day</td>";

				$day++;

			}

			// cuando llega al final de la semana, iniciamos una columna nueva

			if($i%7==0)

			{

				echo "</tr><tr>\n";

			}

		}
	




	

	?>



	</tr>
</table>
</div>
</div>
</div>
</div>
<a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>
</body>
</html>