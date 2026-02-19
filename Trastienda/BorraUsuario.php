<?php 
	//Iniciamos código PHP
	//Cargar el marco superior
	require_once('marcosup.php');
?>
<div>
    <h1>Borrar un Usuario.</h1>
</div>
<div>
    <?php
		// Recoge la variables 
		$id=$_POST['id'];    

        // Seleccionamos la tabla con la que vamos a trabajar
        $tabla="usuarios";// Escribir entre comillas el nombre de la tabla a listar
        
        // Establecemos la sentencia SQL de la Consulta a realizar
        $sentencia="select * from $tabla where login='$id'";	
        //echo "<hr>$sentencia<hr>";
		// Recopilar las filas almacenadas en la tabla
	    $resultado=mysqli_query($c,$sentencia);

        // tabla para mostrar resultado
        echo "<table style='width:60%; margin-left:20px; margin-right:40px'> ";

        // Recorremos $resultado mostrando cada fila de la tabla
        while ($registro = mysqli_fetch_row($resultado)){
		// visualiza todos los datos recogidos
		echo "<tr><td>NICK: </td><td><b>",$registro[1],"</b></td></tr>";
		echo "<tr><td>CONTRASEÑA: </td><td><b>",$registro[2],"</b></td></tr>";
		echo "<tr><td>NOMBRE Y APELLIDOS: </td><td><b>",$registro[4],"</b></td></tr>";
        echo "<tr><td>CORREO ELECTRÓNICO:  </td><td><b>",$registro[3],"</b></td></tr>";		
		echo "<tr><td>POBLACIÓN:  </td><td><b>",$registro[5],"</b></td></tr>";        
        echo "<tr><td>TELÉFONO:  </td><td><b>",$registro[6],"</b></td></tr>";        
        echo "<tr><td>IMAGEN:  </td><td>";
        echo "<img src='$registro[7]' width='60'><br>";
        echo "<b>",$registro[7],"</b>";
        $foto=$registro[7];
        echo "</td></tr>";		
        }
	
		echo "</table>";	
        // Cerramos la conexión con la base de datos
        mysqli_close($c);
		?>        
    </div>
       
<div class="bg-primary">    
    <div class="row m-2"> 
    <div class="col-3 p-2 d-flex justify-content-center text-light">   
        <form action="EliminaUsuario.php" method="post">           
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="imagen" value="<?php echo $foto; ?>">
            <input type="submit" value="CONFIRMAR BORRADO">
            <p>Lo pasa al Histórico</p>
        </form>
    </div>
    <div class="col-3 p-2 d-flex justify-content-center">                
        <form action="GUsuarios.php" method="post">           
            <input type="submit" value="CANCELAR BORRADO Y VOLVER">
        </form>
    </div>
    <div class="col-3">   
        <!--<form action="GHistorico.php" method="post">
            <p>Volver...
            <input type="image" SRC="estilos/BTNVOLVER.jpg" name="volver" height="30" ALT="volver">
            </p> 
        </form>-->
    </div>
    </div>
</div>
    <!--
    <div class="col-3">                
        <form action="EliminaUsuario.php" method="post">           
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="imagen" value="<?php echo $foto; ?>">
            <input type="submit" value="CONFIRMAR BORRADO">
        </form>
    </div>
    <div class="col-3">                
        <form action="GUsuarios.php" method="post">           
            <input type="submit" value="CANCELAR BORRADO">
        </form>
    </div>
    <div class="col-3">                
        <form action="GUsuarios.php" method="post">
            <p class="close">Volver...
            <input type="image" SRC="estilos/BTNVOLVER.jpg" name="volver" height="30" ALT="volver">
            </p> 
        </form>
    </div>
    -->
    <?php
        //Cargar el marco inferior
        require_once('marcoinf.php');
        // Fin del código PHP
    ?>