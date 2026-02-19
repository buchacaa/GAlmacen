<?php 
	//Iniciamos código PHP
	//Cargar el marco superior
	require_once('marcosup.php');
?>
<div>
    <h1>Cambio imagen de Usuario.</h1>
</div>
<div>
    <?php
		// Recoge todas las variables 
		$ID=$_POST['id'];  
        $login=$_POST['nick']; 
        $imagen=$_POST['imagen'];  
        $nomape=$_POST['nomape'];
        $ext="png";
        //echo "<hr>$ID<br>$login<br>$imagen<br>$nomape<hr>";
        // --- Recoge la imagen por defecto
        //$sinimagen="iconopersona.png";
        //$guardada="imagenes/iconopersona.png";
        //echo '<hr>'.$guardada.'<hr>';
		// --- 
        // --- --- TRATAMIENTO DEL ARCHIVO DE IMAGEN -----------------------------------
        // Define una variable para saber si todo lo relativo a la transferencia
        // del fichero ha sido correcto, y que inicialmente se pone a NO.
        $TODO_OK="NO";
        // Recoge el input tipo file con la foto de usuario
        $archivoimagen= $_FILES['FOTO'];    // Imagen de usuario
        // --- Zona de comprobación del archivo recibido, debe ser ocultado después
        // Recupera el archivo que ha seleccionado en el formulario
        
        if (empty($archivoimagen["name"]))   //Si no hay archivo NO hay cambios
        {                        
            // Redirige a GUsuarios.php después de los cambios
            // header("Location: GUsuarios.php"); 

            // Muestra un mensaje informando que no hay cambios
            echo "<hr><h3>NO ha enviado archivo, por tanto no cambia la imagen. </h3>";
            
            // Centinela indica que no hay cambios
            $TODO_OK="NO";
            
        } // Si viene archivo de imagen debe comprobar que es correcta
        else{           
            echo "<br>Muestra los valores del archivo para comprobar la transferencia:";        
            // Muestra todos los datos del archivo recibido en una tabla
            echo "<table border=1>";
            echo "<tr><td>archivoimagen</td></tr>";
            foreach ( $archivoimagen as $indicef=>$valorf ){
                    echo "<tr><td>";
                    echo $indicef."< --- >".$valorf."<br>";
                    echo "</td></tr>";
                }
            echo "</table>";  
            
            // --- 
            // Definición de todas las variables del archivo enviado
            $limitearchivo=200000;              // Marcamos el tamaño máximo de cada archivo.
        
            // Ha enviado una imagen y debemos comprobar que es correcta
            // Filtramos la imagen para que sea de los tipos admitidos GIF-JPG-PNG
            if(!($archivoimagen['type']=="image/gif" OR $archivoimagen['type']=="image/png" OR $archivoimagen['type']=="image/jpeg" OR $archivoimagen['type']=="image/jpg")) 
                {
                echo "<hr><h3>El fichero ".$archivoimagen['type']." que ha enviado no está permitido. Sólo GIF, PNG y JPG.";
                echo "<br>¿Todo OK? NO, <br>ERROR 11 Tipo de archivo no es una imagen o no es del formato admitido.</h3><hr>";
                echo "<hr><h3>NO cambia la imagen. </h3>";
            } // Comprobamos si el tamaño de la imagen está dentro de los límites
                elseif ($archivoimagen['size']>$limitearchivo OR $archivoimagen['size']==0){
                    echo "<hr><h3>El tamaño ".$archivoimagen['size']." no es correcto. ";
                    echo "<br>ERROR 12 en tamaño de archivo de imagen enviado. Admite hasta 200Kb y no puede ser vacío.</h3><hr>";
                    echo "<hr><h3>NO cambia la imagen. </h3>";
                }
                else {
                    // Comprobamos la extensión del archivo enviado para construir el destino
                    switch ($archivoimagen['type'])
                    {
                        case "image/jpeg":
                            $ext="jpg";
                            break;
                        case "image/jpg":
                            $ext="jpg";
                            break;    
                        case "image/gif":
                            $ext="gif";
                            break;       
                        case "image/png":
                            $ext="png";
                            break;   
                    }
                    // Hace una copia de la imagen anterior
                    $tipo=substr($imagen, 19, 3);
                    //echo "<hr>Extensión: $tipo<hr>";
                    $copia="imagenes/Copiade_".$login.".".$tipo;
                    //echo $copia;
                    copy($imagen, $copia);
                    //echo "copy($imagen, $copia)";
                    // Borra la imagen
                    unlink($imagen);
                    //echo "<br>unlink($imagen)";

                    // Nombramos el archivo que vamos a guardar en el servidor
                    $nuevaimagen ="imagenes/".$login.".".$ext;        // Con el login del usuario que es único
                    //$nuevaimagen=strtolower($nuevaimagen); // Lo pasamos todo a minúsculas
                    //$nuevaimagen=strtoupper($nuevaimagen); // Lo pasamos todo a mayúsculas
                    //echo "<hr>Nueva imagen: $nuevaimagen<hr>"; // Solo para comprobar el valor de la variable

                    // Copia el fichero de imagen en el servidor
                    if ($archivoimagen['tmp_name'] != "none" )
                    {
                    if (copy($archivoimagen['tmp_name'], $nuevaimagen))
                        {
                        $TODO_OK="SI";
                        echo "<hr>¿Todo OK? SI, ";
                        }
                    }else{
                        echo "<hr><h3>No se ha podido transferir el fichero, vuelva a intentarlo.</h3>";
                        $TODO_OK="NO";
                        echo "<br><h3>¿Todo OK? NO, ERROR 22 faltan permisos de escritura para guardar la foto.</h3> <hr>";
                        echo "<hr><h3>NO cambia la imagen. </h3>";
                        }       
            }	
        // --- FIN TRATAMIENTO DEL ARCHIVO DE IMAGEN -----------------------------------
        }
        // Si todo ha ido bien, muestra los valores del archivo con la nueva imagen y procede al cambio
        if ($TODO_OK=="SI")
        {
        // visualiza todos los datos recogidos
            echo '<table style="width:90%; margin-left:20px; margin-right:40px">';
            echo "<tr><td style='text-align:right;'>NICK: </td><td><b>",$login,"</b></td></tr>";
            echo "<tr><td style='text-align:right;>NOMBRE Y APELLIDOS: </td><td><b>",$nomape,"</b></td></tr>";       
            echo "<tr><td style='text-align:right;>IMAGEN:  </td><td>";
            echo "<img src='$nuevaimagen' width='60px'>";
            echo "<b>",$nuevaimagen,"</b>";
            echo "</td></tr>";		
            echo "</table>";            
            
            // Construye la sentencia de inserción que hay que ejecutar
            $sentencia="UPDATE usuarios SET imagen = '$nuevaimagen' WHERE ID = '$ID'";
                        
            // Muestra la sentencia de inserción que va a ejecutar
            //echo "<hr>Sentencia:<br><h5>", $sentencia, "</h5><hr>";

            // Ejecuta la sentencia SQL para añadir este registro a la BD.    
            if (mysqli_query($c, $sentencia))
            {
                echo "<h2>FOTO cambiada correctamente</h2>";
                // Borra la copia
                unlink($copia);
            }
            else
            {
                echo "<h2>¡¡Atención!!<br>No se ha cambiado la foto. Hay errores en los datos de entrada.</h2><br>";
            }
        }
		
        // Cerramos la conexión con la base de datos
        mysqli_close($c);
		?>
        <hr>
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
    <!-- -->
    <?php
        //Cargar el marco inferior
        require_once('marcoinf.php');
        // Fin del código PHP
    ?>