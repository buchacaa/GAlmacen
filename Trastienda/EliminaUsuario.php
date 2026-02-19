<?php 
	//Iniciamos código PHP
	//Cargar el marco superior
	require_once('marcosup.php');
?>
<div>
    <h1>Usuario al Histórico.</h1>
</div>
<div>
    <?php
		// Recoge las variables 
		$id=$_POST['id'];  
        $imagen=$_POST['imagen']; 
        // Construye el nuevo archivo para el histórico añadiendo el instante (día y hora)
        $hoy = date("Ymd-Hms"); 
        $historico="historico/".$hoy."_";
        $historico.=substr($imagen, 9, 20);
        // Comprobación
        //echo "<hr>$id<br>$imagen<hr>";
        //echo "$historico<hr>";

        // Seleccionamos la tabla con la que vamos a trabajar
        $tabla="usuarios";// Escribir entre comillas el nombre de la tabla a listar
        
        // Hace una copia del registro a borrar en el HISTÓRICO
        $transferencia="INSERT into historico select * from usuarios where login='$id';";
        //echo "<hr><h3>$transferencia</h3><hr>";
        // Ejecuta la sentencia de transferencia
        
	    if (mysqli_query($c,$transferencia))
        {
            echo "<hr><h3>Pasado al Histórico</h3>";
            // Hay que renombrar la imagen en el histórico con el instante
            $renombrar="UPDATE historico SET imagen='$historico' WHERE login='$id' ";
            //echo "<br>$renombrar";
            // Ejecuta la sentencia de renombrado
            if (mysqli_query($c,$renombrar))
            {
                echo "<h3>Imagen renombrada correctamente</h3><hr>";
            }
            // Elimina el registro de la tabla usuarios
            $borrado="DELETE FROM usuarios where login='$id'";	
            //echo "<hr>$borrado<hr>";

            // Ejecuta la sentencia de borrado
            if (mysqli_query($c,$borrado))
            {
                echo "<h3>Registro borrado correctamente de la tabla USUARIOS</h3><hr>";
                // Copia el fichero de la imagen del usuario a la carpeta HISTORICO
                copy($imagen, $historico);
                //echo "copy ($imagen,$historico)";
                // Elimina el fichero de la imagen
                unlink($imagen);

                // Directamente mueve el fichero con...
                // move_uploaded_file($imagen, $historico);
            }
            else
                {
                echo "NO ha sido borrado.";
            }
        }
        else{
            echo "<hr><h3>NO se ha hecho la transferencia</h3><hr>";
        }
            
        ?>
    <div class="col-3">                
        <form action="GUsuarios.php" method="post">
            <p class="close">Volver...
            <input type="image" SRC="estilos/BTNVOLVER.jpg" name="volver" height="30" ALT="volver">
            </p> 
        </form>
    </div>
    <?php
        //Cargar el marco inferior
        require_once('marcoinf.php');
        // Fin del código PHP
    ?>