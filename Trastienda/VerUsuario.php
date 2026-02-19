<?php 
	//Iniciamos código PHP
	//Cargar el marco superior
	require_once('marcosup.php');
?>
<div>
    <h1>Consulta de un Usuario.</h1>
</div>
<div>
    <?php
		// Recoge la variables 
		$id=$_POST['id'];    

        // Seleccionamos la tabla con la que vamos a trabajar
        $tabla="usuarios";// Escribir entre comillas el nombre de la tabla a listar
        
        // Establecemos la sentencia SQL de la Consulta a realizar
        $sentencia="select * from $tabla where login='$id'";	
        
		// Recopilar las filas almacenadas en la tabla
	    $resultado=mysqli_query($c,$sentencia);

        // tabla para mostrar resultado
        echo "<table style='width:60%; margin-left:20px; margin-right:40px'> ";

        // Recorremos $resultado mostrando cada fila de la tabla
        while ($registro = mysqli_fetch_row($resultado)){
		// visualiza todos los datos recogidos
		echo "<tr><td>NICK: </td><td><b>",$registro[1],"</b></td></tr>";
		echo "<tr><td>CONTRASEÑA: </td><td><b>",$registro[2],"</b></td></tr>";
		echo "<tr><td>NOMBRE Y APELLIDOS: </td><td><b>",$registro[3],"</b></td></tr>";
        echo "<tr><td>CORREO ELECTRÓNICO:  </td><td><b>",$registro[4],"</b></td></tr>";		
		echo "<tr><td>POBLACIÓN:  </td><td><b>",$registro[5],"</b></td></tr>";        
        echo "<tr><td>TELÉFONO:  </td><td><b>",$registro[6],"</b></td></tr>";        
        echo "<tr><td>IMAGEN:  </td><td>";
        echo "<img src='$registro[7]' width='60'><br>";
        echo "<b>",$registro[7],"</b>";
        echo "</td></tr>";				
        }

		echo "</table>";
        // Cerramos la conexión con la base de datos
        mysqli_close($c);
		?>
        <hr>
    </div>    
<div class="bg-primary text-light">    
    <div class="col-4">   
        
    </div>
    <div class="p-2 bg-primary text-white text-center">                
        <form action="GUsuarios.php" method="post">
            <p>Volver...
            <input type="image" SRC="estilos/BTNVOLVER.jpg" name="volver" height="30" ALT="volver">
            </p> 
        </form>
    </div>
    <div class="col-4">   
        
    </div>
</div>
    <?php
        //Cargar el marco inferior
        require_once('marcoinf.php');
        // Fin del código PHP
    ?>