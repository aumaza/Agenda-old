   <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Nuevo Contacto</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Nuevo Contacto</h2>
    
    <?php
    
		  $dbhost = 'localhost:3036';
		  $dbuser = 'root';
		  $dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/agenda';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
		
		$sql = "CREATE TABLE contactos(".
		"id INT AUTO_INCREMENT,".
      "nombre VARCHAR(35) NOT NULL,". 
      "apellido VARCHAR(35) NOT NULL,".
      "email text(50) NOT NULL,".
      "telefono1 VARCHAR(10) NOT NULL,".
      "telefono2 VARCHAR(10) NOT NULL,".
      "movil VARCHAR(10) NOT NULL,".
      "fechaNacimiento DATE NOT NULL,".
      "oficina VARCHAR(40) NOT NULL,".
      "cargo VARCHAR(20) NOT NULL,".
      "PRIMARY KEY (id)); ";

	mysql_select_db('agenda');
	$retval = mysql_query($sql, $conn);
	
	if(!$retval)
	{
		mysql_error();
    echo "<br>";
	}
	
	else
	 {	
		echo 'Table create Succesfully';
    echo "<br>";
	 }
					
						$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
					  $apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            $mail = mysql_real_escape_string($_POST["email"], $conn);
            $telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            $telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            $movil = mysql_real_escape_string($_POST["movil"], $conn);
            $fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            $oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            $cargo = mysql_real_escape_string($_POST["cargo"], $conn);       

    						
	
		$sqlInsert = "INSERT INTO contactos ".
		"(nombre,apellido,email,telefono1,telefono2,movil,fechaNacimiento,oficina,cargo)".
		"VALUES ".
      "('$nombre','$apellido','$mail','$telefono1','$telefono2','$movil','$fNac','$oficina','$cargo')";
  			

$q = mysql_query($sqlInsert,$conn);

if(!$q)
{
	 echo '<div class="alert alert-danger" role="alert">';
   echo 'Could not enter data: ' . mysql_error();
   echo "</div>";
   echo '<hr> <a href="newContact.html"><input type="button" value="Volver" class="btn btn-primary"></a>';
}

else
  {
    echo '<div class="alert alert-success" role="alert">';
    echo "Registro Guardado Exitosamente!!";
    echo "</div>";
    echo '<hr> <a href="newContact.html"><input type="button" value="Volver" class="btn btn-primary"></a>';
}	
	//cerramos la conexion
	
	mysql_close($conn);

	 	
	  	
    
    ?>
    </div>
    </div>
    </body>
    </html>