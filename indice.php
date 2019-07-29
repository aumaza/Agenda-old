<?php

function filtrarA(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'A%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarB(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'B%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarC(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'C%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarD(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'D%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}



function filtrarE(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'E%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarF(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'F%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarG(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'G%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}



function filtrarH(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'H%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}



function filtrarI(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'I%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarJ(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'J%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}



function filtrarK(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'K%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarL(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'L%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}



function filtrarM(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'M%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarN(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'N%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarÑ(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'Ñ%'order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarO(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'O%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarP(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'P%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarQ(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'Q%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarR(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'R%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarS(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'S%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarT(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'T%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarU(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'U%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarV(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'V%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarW(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'W%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarX(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'X%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarY(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'Y%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


function filtrarZ(){

	if (isset($_POST["guardar"])) 
			{
			
				$fila = $_POST["guardar"];

				$nombre = mysql_real_escape_string($_POST["nombre"], $conn);
				$apellido = mysql_real_escape_string($_POST["apellido"], $conn);
            	$mail = mysql_real_escape_string($_POST["email"], $conn);
            	$telefono1 = mysql_real_escape_string($_POST["telefono1"], $conn);
            	$telefono2 = mysql_real_escape_string($_POST["telefono2"], $conn);
            	$movil = mysql_real_escape_string($_POST["movil"], $conn);
            	$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
            	$oficina = mysql_real_escape_string($_POST["oficina"], $conn);
            	$cargo = mysql_real_escape_string($_POST["cargo"], $conn); 
								
				
				$query = "update contactos set nombre = '$nombre',  apellido = '$apellido', email = '$mail', telefono1 = '$telefono1',telefono2 = '$telefono2',movil = '$movil',fechaNacimiento = '$fNac',oficina = '$oficina',cargo = '$cargo' where id = '$fila[id]'";
				
				mysql_select_db('agenda');
				$resultado = mysql_query($query);
				
				if($resultado)
					{
						echo '<div class="alert alert-success" role="alert">';
						echo "Actualización Satisfactoria";
						echo "</div>";
					}
						
						else 
						{
							echo '<div class="alert alert-danger" role="alert">';
							echo "No se pudo Actualizar";
							echo "</div>";
						}	
						
			}
						
						if(isset($_POST["borrar"])) 
							{
			
								$fila = $_POST["borrar"];
								$q = "delete from contactos where id = '$fila[id]'";
								mysql_select_db('agenda');
								$res = mysql_query($q);
								
								if($res)
									{
										echo '<div class="alert alert-success" role="alert">';
										echo "Registro Eliminado";									
										echo "</div>";
									}
									
									else
										{
											echo '<div class="alert alert-danger" role="alert">';
											echo "Imposible Borrar!";							
											echo "</div>";
										}
								
							}
										
				
				
   
    //hacemos la consulta

   $sql = "select * from contactos where apellido LIKE 'Z%' order by apellido";
  
   
   mysql_select_db('agenda');
	
	$retval = mysql_query($sql);
	
	//mostramos fila x fila

	echo '<br><br>';
	
   	$count = 0;	
	$i=0;
            echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
              
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>E-Mail</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F.Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";
	

	while($fila = mysql_fetch_array($retval))
	{

		$edito = false;
		$borro = false;
		
		if (isset($_GET['editar']))
		 {
				if ($_GET['editar'] == $fila["id"])
			 		{
			 			$_POST["editar"];
						$edito = true;
					}	
					}

				
									
					if (isset($_GET['borrar']))
						 {
							if ($_GET['borrar'] == $fila["id"])
			 					{
			 						$_POST["borrar"];
									$borro = true;
								}	
						}
					
					
		 		
		if ($edito)
		 {
			
			// Listado con edición
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		if($borro)
		{
		// Listado con borrado
			 echo "<form action='formShowContacts.php' method='post'>";
			 echo "<tr>";		
			 echo "<td>".$fila['id']."<input type='hidden' name='guardar' value='$fila[id]'></td>";
			 echo "<td><input type='text' name='nombre' class='form-control' value=\"$fila[nombre]\"></td>";
			 echo "<td><input type='text' name='apellido' class='form-control' value=\"$fila[apellido]\"></td>";
			 echo "<td><input type='email' name='email' class='form-control' value=\"$fila[email]\"></td>";
			 echo "<td><input type='text' name='telefono1' class='form-control' value=\"$fila[telefono1]\"></td>";
			 echo "<td><input type='text' name='telefono2' class='form-control' value=\"$fila[telefono2]\"></td>";
			 echo "<td><input type='text' name='movil' class='form-control' value=\"$fila[movil]\"></td>";
			 echo "<td><input type='date' name='fNac' class='form-control' value=\"$fila[fechaNacimiento]\"></td>";
			 echo "<td><input type='text' name='oficina' class='form-control' value=\"$fila[oficina]\"></td>";
			 echo "<td><input type='text' name='cargo' class='form-control' value=\"$fila[cargo]\"></td>";
			 echo "<td class='text-nowrap'>
			 <button type='submit' class='btn btn-success' id='btnGuardar'>Guardar</button>
			 <a href='formShowContacts.php' class='btn btn-danger'>Cancelar</a>
			 </td>";
			 echo "</tr>";
			 echo "</form>";		 
						
		} 
		
		
		else
		 {
			 // Listado normal
			 echo "<tr>";		
			 echo "<td>".$fila['id']."</td>";
			 echo "<td>".$fila['nombre']."</td>";
		     echo "<td>".$fila['apellido']."</td>";
			 echo "<td>".$fila['email']."</td>";
			 echo "<td>".$fila['telefono1']."</td>";
			 echo "<td>".$fila['telefono2']."</td>";
			 echo "<td>".$fila['movil']."</td>";
			 echo "<td>".$fila['fechaNacimiento']."</td>";
			 echo "<td>".$fila['oficina']."</td>";
			 echo "<td>".$fila['cargo']."</td>";
			 echo "<td class='text-nowrap'>";
			 echo '<a href="formShowContacts.php?editar='.$fila['id'].'" class="btn btn-primary">Editar</a>';
			 echo '<a href="formShowContacts.php?borrar='.$fila['id'].'" class="btn btn-danger">Borrar</a>';
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
			 
		}
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	     echo "Cantidad de Registros: " .$count;
	      echo '<hr> <a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';


}


?>