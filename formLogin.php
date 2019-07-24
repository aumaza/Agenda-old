  <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Bienvenido</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    </head>
    <body background="img-breaktime.png" class="img-fluid" alt="Responsive image" style="background-repeat: no-repeat; background-position: center center; background-size: cover"><br>
    <div class="container">
    <div class="main">
    <h2></h2>

<?php
    
    $dbhost = 'localhost:3036';
		$dbuser = 'root';
		$dbpass = 'slack142';    	
    	$dbase = 'agenda';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
							
						$user = mysql_real_escape_string($_POST["user"], $conn);
						$pass1 = mysql_real_escape_string($_POST["pass"], $conn);
						
	mysql_select_db('agenda');			   	
	$sql = "SELECT * FROM usuarios where user='$user' and password='$pass1'";
	$q = mysql_query($sql,$conn);	
	
	
		if(!$q) 
		{	
			exit;			
			
		}

			if($user = mysql_fetch_assoc($q))
			{
				echo '<div class="alert alert-success" role="alert">';
				echo "Bienvenido!  " .$_POST["user"];
				echo "<br>";
				echo "Presione -Aceptar- para continuar";
  				echo "</div>";
				echo '<a href="main.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a><br>';		
			}

			else
			{
				echo '<div class="alert alert-danger" role="alert">';
				echo "Usuario o Contraseña Incorrecta. Reintente Por Favor...";
				echo "</div>";
				echo '<a href="index.html"><br><br><button type="submit" class="btn btn-primary">Aceptar</button></a>';	
	
			}
	
	//cerramos la conexion
	
	mysql_close($conn);
    ?>
</div>
</div>
</body>
</html>