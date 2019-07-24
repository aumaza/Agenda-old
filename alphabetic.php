<?php include "alphabeticFunctions.php"; ?>

<html><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    </head><body>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h1 class="panel-title" contenteditable="true">Agenda</h1>
                            </div>
                            <div class="panel-body">
                                <p>Alfabético
                                    <br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="container">
    <div class="main">
        <form action="alphabetic.php" method="post">
            <div class="form-group">
            	<label class="control-label" for="apellido">Ingrese Apellido a buscar</label>
                	<input id="apellido" placeholder="Enter you Last Name" type="text" name="apellido" class="form-control">
        </div>

        <button type="submit" name="A" class="btn btn-success btn-sm">Buscar</button>
        <a href="alphabetic.php"><input type="button" value="Nueva Búsqueda" class="btn btn-primary  btn-sm"></a>
        <br><br>

        <?php

        $dbhost = 'localhost:3036';
		$dbuser = 'root';
		$dbpass = 'slack142';    	
    	$dbase = 'agenda';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);

    	if($conn){

    		switch(isset($_POST)){


    			case isset($_POST['A']):

    			$apellido = mysql_real_escape_string($_POST["apellido"], $conn);	
    			searchByLastName($apellido);
    			break;

    			
    		}






    }

    ?>
          	
        </div>
    </div>
        
    

</body></html>