<?php include "indice.php"; ?>

   <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet"  type="text/css" media="screen" href="style.css" />
    <title>Contactos</title>    
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Contactos</h2><hr>

    
    <form action="formShowContacts.php" method="POST">
    	<div class="btn-toolbar" role="toolbar">
              <div class="btn-group">
              <button type="submit" name="A" class="btn btn-success btn-lg">A</button>
              <button type="submit" name="B" class="btn btn-primary btn-lg">B</button>
              <button type="submit" name="C" class="btn btn-success btn-lg">C</button>
              <button type="submit" name="D" class="btn btn-primary btn-lg">D</button>
              <button type="submit" name="E" class="btn btn-success btn-lg">E</button>
              <button type="submit" name="F" class="btn btn-primary btn-lg">F</button>
              <button type="submit" name="G" class="btn btn-success btn-lg">G</button>
              <button type="submit" name="H" class="btn btn-primary btn-lg">H</button>
              <button type="submit" name="I" class="btn btn-success btn-lg">I</button>
              <button type="submit" name="J" class="btn btn-primary btn-lg">J</button>
              <button type="submit" name="K" class="btn btn-success btn-lg">K</button>
              <button type="submit" name="L" class="btn btn-primary btn-lg">L</button>
              <button type="submit" name="M" class="btn btn-success btn-lg">M</button>
              <button type="submit" name="N" class="btn btn-primary btn-lg">N</button>
              <button type="submit" name="Ñ" class="btn btn-success btn-lg">Ñ</button>
              <button type="submit" name="O" class="btn btn-primary btn-lg">O</button>
              <button type="submit" name="P" class="btn btn-success btn-lg">P</button>
              <button type="submit" name="Q" class="btn btn-primary btn-lg">Q</button>
              <button type="submit" name="R" class="btn btn-success btn-lg">R</button>
              <button type="submit" name="S" class="btn btn-primary btn-lg">S</button>
              <button type="submit" name="T" class="btn btn-success btn-lg">T</button>
              <button type="submit" name="U" class="btn btn-primary btn-lg">U</button>
              <button type="submit" name="V" class="btn btn-success btn-lg">V</button>
              <button type="submit" name="W" class="btn btn-primary btn-lg">W</button>
              <button type="submit" name="X" class="btn btn-success btn-lg">X</button>
              <button type="submit" name="Y" class="btn btn-primary btn-lg">Y</button>
              <button type="submit" name="Z" class="btn btn-success btn-lg">Z</button>
        </div></div></form><hr>
    
    <?php
  
    
      	$dbhost = 'localhost:3036';
      	$dbuser = 'root';
		$dbpass = 'slack142';    	
    	$dbase = 'agenda';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);

    			
		if($conn)
		{
				
			switch(isset($_POST)){


					case isset($_POST['A']):
					filtrarA();
					break;

					case isset($_POST['B']): 
					filtrarB();
					break;

					case isset($_POST['C']):
					filtrarC();
					break;

					case isset($_POST['D']):
					filtrarD();
					break;

					case isset($_POST['E']):
					filtrarE();
					break;

					case isset($_POST['F']):
					filtrarF();
					break;

					case isset($_POST['G']):
					filtrarG();
					break;

					case isset($_POST['H']):
					filtrarH();
					break;

					case isset($_POST['I']):
					filtrarI();
					break;

					case isset($_POST['J']):
					filtrarJ();
					break;

					case isset($_POST['K']):
					filtrarK();
					break;

					case isset($_POST['L']):
					filtrarL();
					break;

					case isset($_POST['M']):
					filtrarM();
					break;

					case isset($_POST['N']):
					filtrarN();
					break;

					case isset($_POST['Ñ']):
					filtrarÑ();
					break;

					case isset($_POST['O']):
					filtrarO();
					break;

					case isset($_POST['P']):
					filtrarP();
					break;

					case isset($_POST['Q']):
					filtrarQ();
					break;

					case isset($_POST['R']):
					filtrarR();
					break;

					case isset($_POST['S']):
					filtrarS();
					break;

					case isset($_POST['T']):
					filtrarT();
					break;

					case isset($_POST['U']):
					filtrarU();
					break;

					case isset($_POST['V']):
					filtrarV();
					break;

					case isset($_POST['W']):
					filtrarW();
					break;

					case isset($_POST['X']):
					filtrarX();
					break;

					case isset($_POST['Y']):
					filtrarY();
					break;

					case isset($_POST['Z']):
					filtrarZ();
					break;

			}
			
		}
	 
	
	 
	 else
		{
			echo 'Connection Failure...';		
		}
   	
    mysql_close($conn);
    
    ?>
    </div>
    </div>
    </body>
    </html>