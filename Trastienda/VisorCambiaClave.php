<?php 
	//Iniciamos código PHP
	//Cargar el marco superior
	require_once('marcosup.php');
?>
<!--
<div>
    <h1>Cambia datos de un Usuario.</h1>
</div>-->
<div>
    <?php
		// Recoge la variables 
		$id=$_POST['id'];   
        $login=$_POST['login'];     
        $CLAVE1=$_POST['CLAVE1']; 
        $CLAVE2=$_POST['CLAVE2']; 

        // Comprueba si las dos claves tecleadas son iguales
        if ($CLAVE1==$CLAVE2){
            // Seleccionamos la tabla con la que vamos a trabajar
            $tabla="usuarios";// Escribir entre comillas el nombre de la tabla a listar
            
            // Sentencia de actualización
            $sentenciacambios="UPDATE usuarios SET passw = '".md5($CLAVE1)."' WHERE ID = '$id'";
            //echo "<hr>$sentenciacambios<hr>";
            // Recopilar las filas almacenadas en la tabla
            $aplicacambios=mysqli_query($c,$sentenciacambios);

            // Mensaje informando del cambio de contraseña
            echo "<h3 class='text-primary;'>Las Claves son iguales. Contraseña cambiada.</h3><hr>";
        }
        // Si no son iguales, informa y no hace cambios
        else{
            echo "<h3 class='text-danger';>Las Claves no son iguales. No se ha cambiado la contraseña.</h3><hr>";
        }
        
        // Cerramos la conexión con la base de datos
        mysqli_close($c);

        // Redirige a GUsuarios.php después de los cambios
        //header("Location: GUsuarios.php"); 
		?>
        
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