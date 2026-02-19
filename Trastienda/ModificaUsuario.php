<?php 
	//Iniciamos código PHP
	//Cargar el marco superior
	require_once('marcosup.php');
?>
<div>
    <h1>Editar datos de un Usuario.</h1>
</div>
    <?php
		// Recoge la variables 
		$id=$_POST['id'];    

        // Seleccionamos la tabla con la que vamos a trabajar
        $tabla="usuarios";// Escribir entre comillas el nombre de la tabla a listar
        
        // Establecemos la sentencia SQL de la Consulta a realizar
        $sentencia="select * from $tabla where login='$id'";	
        
		// Recopilar las filas almacenadas en la tabla
	    $resultado=mysqli_query($c,$sentencia);

        // Recorremos $resultado recogiendo los valores en variable
        while ($registro = mysqli_fetch_row($resultado)){
          //  Recoge los datos en variables
          $ID=$registro[0];
          $login=$registro[1];
          $clave=$registro[2];
          $email=$registro[3];
          $nomape=$registro[4];
          $poblacion=$registro[5];
          $telefono=$registro[6];
          $foto=$registro[7];
        }
    ?>
<div class="row">
    <!-- Para cambio de la contraseña -->
    <div class="col-3 d-flex justify-content-center align-middle p-5">
         <?php
        //---------------
        // Prepara el formulario para cambiar contraseña
        echo '<form name="ficha" action="CambiaClave.php" method="POST" enctype="multipart/form-data">';
		echo "<p>Para cambiar la contraseña debe conocer la actual y solo tiene que pulsar el botón CAMBIAR CONTRASEÑA.</p>";
        echo "<input type='hidden' name='id' size='40' value='",$login,"'>";      
        echo "<input type='submit'  size='40' value='CAMBIAR CONTRASEÑA'>";
        // Cierra el formulario
        echo "</form>";
        //---------------
        ?>
    </div>
    <!-- Para cambios de datos normales -->
    <div class="col-6 bg-warning p-5">
    <?php
        // Prepara el formulario para mostrar los datos y permitir cambios
        echo '<form name="ficha" action="VisorCambiaUsuario.php" method="POST" enctype="multipart/form-data">';
        echo "<input type='hidden' name='id' value='",$ID,"'>"; 
        echo "<input type='hidden' name='login' value='",$login,"'>"; 
        // tabla para mostrar resultado de los valores obtenidos en la consulta
        echo "<table style='width:60%; margin-left:20px; margin-right:40px'> ";        
		echo "<tr><td>NICK: </td><td><b>",$login,"</b></td></tr>";
        echo "<tr><td>NOMBRE Y APELLIDOS: <br></td><td><b><input type='text' name='nomape' size='30' value='",$nomape,"'></b></td></tr>";
        echo "<tr><td>CORREO ELECTRÓNICO: <br> </td><td><b><input type='text' name='email' size='30' value='",$email,"'></b></td></tr>";		
		echo "<tr><td>POBLACIÓN: <br> </td><td><b><input type='text' name='poblacion' size='30' value='",$poblacion,"'></b></td></tr>";        
        echo "<tr><td>TELÉFONO: <br> </td><td><b><input type='text' name='telefono' size='30' value='",$telefono,"'></b></td></tr>";        
        echo "<tr><td class='align-center'>";
        echo "</td><td class='align-center'>";
        echo "<input type='submit' size='40' value='ENVIAR'>  ·  ";
        echo "<input type='reset'  size='40' value='RESTAURAR'>";
        echo "</td></tr>";				
        echo "</table>";

        // Cierra el formulario
        echo "</form>";
        ?>
    </div>
    <!-- Para cambios de imagen -->
    <div class="col-3  d-flex justify-content-center p-5">
         <?php
        //---------------
        // Prepara el formulario para cambiar IMAGEN
        
        echo '<form name="ficha" action="CambiaImagen.php" method="POST" enctype="multipart/form-data">';
		echo "<p>Si quiere cambiar la imagen, seleccione la nueva y pulse el botón CAMBIAR IMAGEN.";
        echo " (Sólo admite formatos PNG o JPG. Y tamaño menor de 200Kb)<br></p>";
        echo "<input type='hidden' name='id' size='40' value='",$ID,"'>";        
        echo "<input type='hidden' name='nick' size='40' value='",$login,"'>";     
        echo "<input type='hidden' name='nomape' size='40' value='",$nomape,"'>";
        echo "<input type='hidden' name='imagen' size='40' value='",$foto,"'>";
        echo "Imagen actual: <br><img src='$foto' width='60'>";
        echo "<b><input type='file' name='FOTO' size='40'></b><hr>";  
        echo "<input type='submit' size='40' value='CAMBIAR IMAGEN'>";
        // Cierra el formulario
        echo "</form>";
        //---------------
        // Cerramos la conexión con la base de datos
        mysqli_close($c);
		?>
    </div>
</div>
<!-- Para el botón de imagen VOLVER -->
<div class="p-2 bg-primary text-light">    
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
<!-- -->
<?php
    //Cargar el marco inferior
    require_once('marcoinf.php');
    // Fin del código PHP
?>