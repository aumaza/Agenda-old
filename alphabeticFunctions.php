<?php

function searchByLastName($apellido){

	mysql_select_db('agenda');

	$sql = "select * from contactos where apellido = '$apellido'";

	$retval = mysql_query($sql);

	echo "<table class='table table-responsive-sm table-striped'>";
              echo "<thead>
                    <th class='text-nowrap text-center'>ID</th>
                    <th class='text-nowrap text-center'>Nombre</th>
                    <th class='text-nowrap text-center'>Apellido</th>
                    <th class='text-nowrap text-center'>Email</th>
                    <th class='text-nowrap text-center'>Tel 1</th>
                    <th class='text-nowrap text-center'>Tel 2</th>
                    <th class='text-nowrap text-center'>Móvil</th>
                    <th class='text-nowrap text-center'>F. Nac.</th>
                    <th class='text-nowrap text-center'>Oficina</th>
                    <th class='text-nowrap text-center'>Cargo</th>
                    <th>&nbsp;</th>
                    </thead>";



	while($fila = mysql_fetch_array($retval))
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
			 echo "</td>";
			 echo "</tr>";
				$i++;
		 		$count++;
		 
		
	}
		
		
		echo "</table>";
	    echo "<br><br><hr>";
	    echo "Registros Encontrados: " .$count;
	    echo "<hr>";
	    echo '<a href="main.html"><input type="button" value="Volver al Menú Principal" class="btn btn-primary"></a>';



}




?>