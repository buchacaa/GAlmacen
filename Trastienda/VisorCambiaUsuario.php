<?php 
	//Iniciamos código PHP
	//Cargar el marco superior
	require_once('marcosup.php');
?>
<!--
<div>
    <h1>Cambia datos de un Usuario.</h1>
</div>
<div>-->
    <?php
		// Recoge la variables 
		$id=$_POST['id'];   
        $login=$_POST['login'];     
        $nomape=$_POST['nomape']; 
        $email=$_POST['email']; 
        $poblacion=$_POST['poblacion']; 
        $telefono=$_POST['telefono']; 

        // Seleccionamos la tabla con la que vamos a trabajar
        $tabla="usuarios";// Escribir entre comillas el nombre de la tabla a listar
        
        // Sentencia de actualización
        $sentenciacambios="UPDATE usuarios SET email = '$email', nomape = '$nomape', poblacion = '$poblacion', telefono = '$telefono' WHERE ID = '$id'";

        // Recopilar las filas almacenadas en la tabla
	    $aplicacambios=mysqli_query($c,$sentenciacambios);

        // Establecemos la sentencia SQL de la Consulta a realizar
        $sentencia="SELECT * FROM $tabla WHERE ID='$id'";	
        //echo "<hr>$sentenciacambios<br>$sentencia<hr>";

		// Recopilar las filas almacenadas en la tabla
	    $resultado=mysqli_query($c,$sentencia);
        /*
        // Prepara el formulario para mostrar los datos y permitir cambios
        echo '<form name="ficha" action="VisorCambiaUsuario.php" method="POST" enctype="multipart/form-data">';
        // tabla para mostrar resultado
        echo "<table style='width:60%; margin-left:20px; margin-right:40px'> "; 

        // Recorremos $resultado mostrando cada fila de la tabla
        while ($registro = mysqli_fetch_row($resultado)){
		// visualiza todos los datos recogidos en el formulario para enviar cambios
            echo "<tr><td>NICK: </td><td><b>",$registro[1],"</b></td></tr>";
            echo "<tr><td>CONTRASEÑA: </td><td><b>",$registro[2],"</b> (<a href='cambiarclave.php'>Cambiar contraseña</a>)</td></tr>";
            echo "<tr><td>NOMBRE Y APELLIDOS: </td><td><b><input type='text' name='nomape' size='40' value='",$registro[4],"'></b></td></tr>";
            echo "<tr><td>CORREO ELECTRÓNICO:  </td><td><b><input type='text' name='email' size='40' value='",$registro[3],"'></b></td></tr>";		
            echo "<tr><td>POBLACIÓN:  </td><td><b><input type='text' name='poblacion' size='40' value='",$registro[5],"'></b></td></tr>";        
            echo "<tr><td>TELÉFONO:  </td><td><b><input type='text' name='telefono' size='40' value='",$registro[6],"'></b></td></tr>";        
            echo "<tr><td>IMAGEN:  </td><td>";
            echo "<img src='$registro[7]' width='60'> (<a href='cambiarimagen.php'>Cambiar imagen</a>)";
            //echo "<b><input type='file' name='imagen' size='40' value='",$registro[7],"'></b>";
            echo "</td></tr>";				
            
            echo "<input type='hidden' name='id' size='40' value='",$registro[0],"'>";
            echo "<input type='hidden' name='login' size='40' value='",$registro[1],"'>";
        }
		echo "</table>";
        // Botones de envío y reset
        echo "<input type='submit'  size='40' value='ENVIAR'>_";
        echo "<input type='reset'  size='40' value='RESTAURAR'>";

        // Cierra el formulario
        echo "</form>";*/
        // Cerramos la conexión con la base de datos
        mysqli_close($c);

        // Redirige a GUsuarios.php después de los cambios
        header("Location: GUsuarios.php"); 
		?>
        <!--
    </div>
    <div class="row bg-info">    
        <div class="col-4">   
            
        </div>
        <div class="col-4 d-flex justify-content-center p-2">                
            <form action="GUsuarios.php" method="post">
                <p class="close">Volver...
                <input type="image" SRC="estilos/BTNVOLVER.jpg" name="volver" height="30" ALT="volver">
                </p> 
            </form>
        </div>
        <div class="col-4">   
            
        </div>
    </div>-->
    
    <?php
        //Cargar el marco inferior
        require_once('marcoinf.php');
        // Fin del código PHP
    ?>