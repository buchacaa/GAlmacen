<?php 
	//Iniciamos código PHP
	//Cargar el marco superior
	require_once('marcosup.php');
?>
<div>
    <h1>Cambiar la contraseña del usuario.</h1>
</div>
    <?php
		// Recoge la variables 
		$id=$_POST['id'];    

        // Seleccionamos la tabla con la que vamos a trabajar
        $tabla="usuarios";// Escribir entre comillas el nombre de la tabla a listar
        
        // Establecemos la sentencia SQL de la Consulta a realizar
        $sentencia="select * from $tabla where login='$id'";	
        //echo $sentencia;
		// Recopilar las filas almacenadas en la tabla
	    $resultado=mysqli_query($c,$sentencia);
    ?>
<div class="row">
    <div class="col-3 d-flex justify-content-center align-middle p-5">
    </div>
    <div class="col-6 bg-warning p-5">
    <?php
        // Prepara el formulario para mostrar los datos y permitir cambios
        echo '<form name="ficha" action="VisorCambiaClave.php" method="POST">';
        // tabla para mostrar resultado
        echo "<table style='width:60%; margin-left:20px; margin-right:40px'> ";

        // Recorremos $resultado mostrando cada fila de la tabla
        while ($registro = mysqli_fetch_row($resultado)){
		// visualiza todos los datos recogidos en el formulario para enviar cambios
        echo "<input type='hidden' name='id' size='40' value='",$registro[0],"'>";
        echo "<input type='hidden' name='login' size='40' value='",$registro[1],"'>";
        $foto=$registro[7];
        
		echo "<tr><td>NICK: </td><td><b>",$registro[1],"</b></td></tr>";
		//echo "<tr><td>CONTRASEÑA: </td><td><b>",$registro[2],"</b> </td></tr>";
		echo "<tr><td>NOMBRE Y APELLIDOS: <br></td><td><b>",$registro[4],"</b></td></tr>";
        echo "<tr><td>NUEVA CONTRASEÑA: <br> </td><td><b><input type='text' name='CLAVE1' size='30' value=''></b></td></tr>";		
		echo "<tr><td>REPITA NUEVA CONTRASEÑA: <br> </td><td><b><input type='text' name='CLAVE2' size='30' value=''></b></td></tr>";        
       // echo "<tr><td>TELÉFONO: <br> </td><td><b><input type='text' name='telefono' size='30' value='",$registro[6],"'></b></td></tr>";        
        echo "<tr><td>IMAGEN:  </td><td>";
        echo "<img src='$registro[7]' width='60'></td><td>";
        echo "<tr><td class='align-center'>";
        echo "</td><td class='align-center'>";
        echo "<input type='submit' size='40' value='ENVIAR'>  ·  ";
        echo "<input type='reset'  size='40' value='RESTAURAR'>";
        echo "</td></tr>";				
        }

		echo "</table>";
        // Botones de envío y reset
        //echo "<input type='submit'  size='40' value='ENVIAR'>_";
        //echo "<input type='reset'  size='40' value='LIMPIAR'>";

        // Cierra el formulario
        echo "</form>";
        ?>
    </div>
    <div class="col-3  d-flex justify-content-center p-5">
         
    </div>
</div>
<!-- Para el botón de imagen VOLVER -->
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
    // Cerramos la conexión con la base de datos
    mysqli_close($c);
    //Cargar el marco inferior
    require_once('marcoinf.php');
    // Fin del código PHP
?>