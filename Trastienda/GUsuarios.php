<?php 	//Iniciamos código PHP
	//Cargar el marco superior
	require_once('marcosup.php');
?>

<div>
    <h1>Gestión de Usuarios</h1>    
</div>
<div>		
	<?php
	
	// Seleccionamos la tabla con la que vamos a trabajar
	$tabla="usuarios";// Escribir entre comillas el nombre de la tabla a listar

	// Establecemos la sentencia SQL de la Consulta a realizar
	$sentencia="select * from $tabla order by login ";

	// Ejecuta la sentencia para saber cuántas filas tiene la tabla
    $resultado=mysqli_query($c,$sentencia);

	// --- --- --- Preparamos la paginación -- --- --- 
			// comprueba si viene número de página   
			if (isset($_GET['pagina']))
				{
				$pagina=$_GET['pagina'];
				}
				else{
				$pagina=1;  
				} 
			// Calculamos el número de páginas que tenemos que usar para visualizar el resultado
			//$numreg=mysql_num_rows($resultado);
			$numreg=mysqli_num_rows($resultado);
			// Como vamos a usar 8 registros por página dividimos entre 8
			$numpag= ceil($numreg/8);    
			
			// Calcula cuál será el registro de inicio para construir la consulta
			$inicio=($pagina-1)*8;
			
			// Volvemos a ejecutar la sentencia pero fijando los límites.
			$sentencia .=" limit ".$inicio.", 8";
            $resultado=mysqli_query($c,$sentencia);
			//echo "<hr>$sentencia<hr>";
			// --- --- --- --- --- --- --- --- --- --- --- ---
	
	// Dibujamos una tabla HTML para mostrar los valores almacenados
	echo '<table border style="width:90%; margin-left:20px; margin-right:40px">';
	
	// Recopilar los nombres de las columnas de la tabla seleccionada
	$cabeceras=mysqli_query($c,"SHOW FIELDS FROM $tabla");
	
	// Construye la fila de cabeceras
	echo "<tr bgcolor='yellow'>";
	while ($cab=mysqli_fetch_row($cabeceras)){
		echo "<th>$cab[0]</th>";
	}
	echo "<th></th>";				
	echo "<th>";
	// Formulario para enviar los datos
		echo '<form name="alta" method="POST" action="AUsuarios.php">';
		//echo '<input type="hidden" name="codigo" value="'.$registro[0].'">';
		echo '<input type="image" src="estilos/mas.jpg" height="20px" title="Alta de usuario.">';
		echo '</form>';
	echo "</th>";
	echo "<th></th>";
	echo "</tr>";
	
	// Recopilar las filas almacenadas en la tabla
	$resultado=mysqli_query($c,$sentencia);
	
	// Recorremos $resultado mostrando cada fila de la tabla
	while ($registro = mysqli_fetch_row($resultado)){
		
		// Iniciamos la fila
		echo "<tr>";
		
		// Iniciar un contador de columnas
		$i=0;
		
		// Recorremos y mostramos el valor de cada columna
		foreach ($registro as $fila){
			
			// Mostramos el valor de cada celda y si es la imagen la visualiza
			if ($i==7){
				echo "<td> <img src='$registro[$i]' height='30'></td>";
			} else{
				echo "<td> $registro[$i]</td>";
			}
			
			
			// Incrementamos el contador de columnas
			$i++;
		}							
		echo "<td align='center'>";	
			// Para ver solo un registro.
				// Formulario para enviar los datos
				echo '<form name="veruno" method="POST" action="VerUsuario.php">';
				echo '<input type="hidden" name="id" value="'.$registro[1].'">';
				echo '<input type="image" src="estilos/ver.jpg" title="Ver datos del usuario... '.$registro[1].'">';
				echo '</form>';	
			echo "</td><td align='center'>";	
			// Para borrar un registro.
			// Formulario para enviar los datos
				echo '<form name="borraruno" method="POST" action="BorraUsuario.php">';
				echo '<input type="hidden" name="id" value="'.$registro[1].'">';
				echo '<input type="image" src="estilos/papelera.jpg" title="Borrar el usuario... '.$registro[1].'">';
				echo '</form>';
			echo "</td><td align='center'>";		
			// Para modificar un registro.
			// Formulario para enviar los datos
				echo '<form name="editaruno" method="POST" action="ModificaUsuario.php">';
				echo '<input type="hidden" name="id" value="'.$registro[1].'">';
				echo '<input type="image" src="estilos/lapiz.jpg" title="Cambiar datos del usuario... '.$registro[1].'">';
				echo '</form>';	
							
		echo "</td>";   	
		
		// Fin de la fila
		echo "</tr>";				
	}
	
		// Fin de la tabla HTML
	echo "</table>";
	
	// --- --- --- --- --- --- --- --- --- --- --- ---
	// --- Mostramos el paginador ---       
	// Calcula páginas anterior y siguiente
	echo "<div><hr>";
	if ($pagina==1){
		$anterior=1;
	}
	else{
		$anterior=$pagina-1;
	}
	if ($pagina==$numpag){
		$siguiente=$pagina;
	}
	else{
		$siguiente=$pagina+1;
	}
	
	echo "<div class='col-md-12 text-center' style='vertical-align: text-bottom;'>"; // Fin de la capa row  
	echo '<ul class="pagination justify-content-center ">';
	echo '	<li class="page-item ">';
	echo '	  <a class="page-link" href="GUsuarios.php?pagina='.$anterior.'">&laquo;</a>';
	echo '	</li>';
	for ($i=1;$i<=$numpag;$i++)
	{
		if($i==$pagina){
				echo '	<li class="page-item active">';
				echo '	  <a class="page-link"href="GUsuarios.php?pagina='.$i.'">'.$i.'</a>';
				echo '	</li>';						
			}
			else{
				echo '	<li class="page-item"><a class="page-link" href="GUsuarios.php?pagina='.$i.'">'.$i.'</a></li>';
			}
	}
	echo '	<li class="page-item ">';
	echo '	  <a class="page-link" href="GUsuarios.php?pagina='.$siguiente.'">&raquo;</a>';
	echo '	</li>';
	echo '  </ul>';
	echo "</div>";
	// --- Fin paginación ---
	// --- --- --- --- --- --- --- --- --- --- --- ---
	
	// Cerramos la conexión con la base de datos
	mysqli_close($c);
	
	?>   
</div>
<?php
	//Iniciamos código PHP
	//Cargar el marco inferior
	require_once('marcoinf.php');
	// Fin del código PHP
?>  
  
