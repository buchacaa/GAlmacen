<?php 
	//Iniciamos código PHP
	//Cargar el marco superior
	require_once('marcosup.php');
?>
<div>
    <h1>Restaura Usuario del HISTÓRICO a la tabla USUARIOS.</h1>
</div>
<div>
    <?php
		// Recoge las variables 
		$id=$_POST['id'];  
        $imagen=$_POST['imagen']; 
        // Construye el nuevo archivo para la carpeta de imágenes de usuarios        
        $foto="imagenes/".$id.".";        
        $foto.=substr($imagen, -3);
        // Comprobación
        //echo "<hr>$id<br>$imagen<hr>";
        //echo "Nueva Imagen: $foto<hr>";
        
        // Hace una copia del registro desde el HISTÓRICO a la tabla USUARIOS
        $transferencia="insert into usuarios select * from historico where login='$id';";
        //echo "<hr>Transferencia: <h3>$transferencia</h3><hr>";
        // Ejecuta la sentencia de transferencia
        
	    if (mysqli_query($c,$transferencia))
        {            
            // Elimina el registro de la tabla HISTORICO
            $borrado="DELETE FROM historico where login='$id'";	
            //echo "<hr>$borrado<hr>";

            // Ejecuta la sentencia de borrado
            if (mysqli_query($c,$borrado))
            {
                // Hay que renombrar la imagen en la tabla con el id
                $renombrar="UPDATE usuarios SET imagen='$foto' WHERE login='$id' ";
                //echo "<hr>$renombrar<hr>";
                // Ejecuta la sentencia de renombrado
                if (mysqli_query($c,$renombrar))
                {
                    echo "<h3>Imagen transferida correctamente</h3><hr>";
                }
                echo "<h3>Registro restaurado correctamente a la tabla USUARIOS</h3><hr>";
                // Copia el fichero de la imagen del histórico a la carpeta de imágenes de usuarios
                copy($imagen, $foto);
                // Elimina el fichero de la imagen de la carpeta del histórico
                unlink($imagen);
                //echo "copy($imagen, $foto)";
                //echo "unlink($imagen)";

                // Directamente mueve el fichero con...
                // move_uploaded_file($imagen, $historico);
            }
            else
                {
                echo "NO ha sido restaurado.";
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