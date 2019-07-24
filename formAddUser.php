   <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Alta Usuario</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Nuevo Usuario</h2>
    
    <?php
    
		  $dbhost = 'localhost:3036';
		  $dbuser = 'root';
		  $dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/agenda';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
		
		$sql = "CREATE TABLE usuarios(".
		"id INT AUTO_INCREMENT,".
      "nombre VARCHAR(35) NOT NULL,". 
      "user VARCHAR(15) NOT NULL,".
      "password text(15) NOT NULL,".
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
					  $user = mysql_real_escape_string($_POST["user"], $conn);
            $pass1 = mysql_real_escape_string($_POST["password"], $conn);
            $pass2 = mysql_real_escape_string($_POST["password1"], $conn);
                						
	
		$sqlInsert = "INSERT INTO usuarios ".
		"(nombre,user,password)".
		"VALUES ".
      "('$nombre','$user','$pass1')";
  			

//$q = mysql_query($sqlInsert,$conn);

if(strcmp($pass2, $pass1) == 0)
{
	 mysql_query($sqlInsert);

    echo '<div class="alert alert-success" role="alert">';
    echo "Alta Exitosa!!";
    echo "</div>";
    echo '<hr> <a href="addUser.html"><input type="button" value="Volver" class="btn btn-primary"></a>';
}

else
  {
    echo '<div class="alert alert-danger" role="alert">';
    echo 'Las contraseñas no Coinciden. REINTENTE!!';
    echo "</div>";
     echo '<hr> <a href="addUser.html"><input type="button" value="Volver" class="btn btn-primary"></a>';
    
}	
	//cerramos la conexion
	
	mysql_close($conn);

	 	
	  	
    
    ?>
    </div>
    </div>
    </body>
    </html>