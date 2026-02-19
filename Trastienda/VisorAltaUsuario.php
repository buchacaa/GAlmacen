<?php 
	//Iniciamos código PHP
	//Cargar el marco superior
	require_once('marcosup.php');
?>
<div>
    <h1>Nuevo Usuario.</h1>
</div>
<div>
    <?php
		// Recoge todas las variables 
		$nick=strtoupper($_POST['nick']);  // Lo pasa a mayúsculas 
		$clave=MD5($_POST['clave']); // La contraseña recibida se encripta con MD5()
		$nombape=$_POST['nombape'];  
		$email=$_POST['email'];   
		$poblacion=$_POST['poblacion']; 
		$telefono=$_POST['telefono'];
        $ext="png";
        // --- Recoge la imagen por defecto
        $sinimagen="iconopersona.png";
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
        
        if (empty($archivoimagen["name"]))   //Si no hay archivo usa el guardado
        {                        
            // Nombramos el archivo que vamos a guardar en el servidor
            $nuevaimagen ="imagenes/".$nick.".".$ext;        // Con el login del usuario que es único
            //$nuevaimagen=strtolower($nuevaimagen); // Lo pasamos todo a minúsculas
            $nuevaimagen=strtoupper($nuevaimagen); // Lo pasamos todo a mayúsculas
            //echo "<hr>$nuevaimagen<hr>"; // Solo para comprobar el valor de la variable
            $archivoimagen="iconopersona.png";
            // El archivo enviado es correcto
            $TODO_OK="SI";
            if (copy($sinimagen, $nuevaimagen)){
                $TODO_OK="SI";
                //echo "<hr>¿Todo OK? SI, ";
                }
            else{
                echo "<hr><h3>No se ha podido transferir el fichero, vuelva a intentarlo.</h3>";
                $TODO_OK="NO";
                echo "<br><h3>¿Todo OK? NO, ERROR 22 faltan permisos de escritura para guardar la foto.</h3> <hr>";
                }
        } 
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
                } // Comprobamos si el tamaño de la imagen está dentro de los límites
                elseif ($archivoimagen['size']>$limitearchivo OR $archivoimagen['size']==0){
                    echo "<hr><h3>El tamaño ".$archivoimagen['size']." no es correcto. ";
                    echo "<br>¿Todo OK? NO<br>ERROR 12 en tamaño de archivo de imagen enviado. Admite hasta 200Kb y no puede ser vacío.</h3><hr>";
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
                    // Nombramos el archivo que vamos a guardar en el servidor
                    $nuevaimagen ="imagenes/".$nick.".".$ext;        // Con el login del usuario que es único
                    //$nuevaimagen=strtolower($nuevaimagen); // Lo pasamos todo a minúsculas
                    $nuevaimagen=strtoupper($nuevaimagen); // Lo pasamos todo a mayúsculas
                    //echo "<hr>$nuevaimagen<hr>"; // Solo para comprobar el valor de la variable

                    // Copia el fichero de imagen en el servidor
                    if ($archivoimagen['tmp_name'] != "none" )
                    {
                    if (copy($archivoimagen['tmp_name'], $nuevaimagen))
                        {
                        $TODO_OK="SI";
                        //echo "<hr>¿Todo OK? SI, ";
                        }
                    }else{
                        echo "<hr><h3>No se ha podido transferir el fichero, vuelva a intentarlo.</h3>";
                        $TODO_OK="NO";
                        echo "<br><h3>¿Todo OK? NO, ERROR 22 faltan permisos de escritura para guardar la foto.</h3> <hr>";
                        }       
            }	
        // --- FIN TRATAMIENTO DEL ARCHIVO DE IMAGEN -----------------------------------
        }
        if ($TODO_OK=="SI")
        {
        // visualiza todos los datos recogidos
            echo '<table style="width:90%; margin-left:20px; margin-right:40px">';
            echo "<tr><td>NICK: </td><td><b>",$nick,"</b></td></tr>";
            echo "<tr><td>CONTRASEÑA: </td><td><b>",$clave,"</b></td></tr>";
            echo "<tr><td>NOMBRE Y APELLIDOS: </td><td><b>",$nombape,"</b></td></tr>";
            echo "<tr><td>CORREO ELECTRÓNICO:  </td><td><b>",$email,"</b></td></tr>";		
            echo "<tr><td>POBLACIÓN:  </td><td><b>",$poblacion,"</b></td></tr>";        
            echo "<tr><td>TELÉFONO:  </td><td><b>",$telefono,"</b></td></tr>";        
            echo "<tr><td>IMAGEN:  </td><td>";
            echo "<img src='$nuevaimagen' width='60px'>";
            echo "<b>",$nuevaimagen,"</b>";
            echo "</td></tr>";		
            echo "</table>";            

            // Recopilamos los datos para construir la sentencia de inserción
            $d1 = $nick; 
            $d2 = $clave; 
            $d3 = $email; 
            $d4 = $nombape;
            $d5 = $poblacion;
            $d6 = $telefono;  
            $d7 = $nuevaimagen; 
            
            // Construye la sentencia de inserción que hay que ejecutar
            $sentencia="INSERT INTO usuarios 
            (login, passw, email, nomape, poblacion, telefono, imagen)
            VALUES ('$d1','$d2','$d3','$d4','$d5','$d6','$d7');";
                        
            // Muestra la sentencia de inserción que va a ejecutar
            echo "<hr>Sentencia:<br><h5>", $sentencia, "</h5><hr>";

            // Ejecuta la sentencia SQL para añadir este registro a la BD.    
            if (mysqli_query($c, $sentencia))
            {
                echo "<h2>Usuario registrado correctamente</h2>";
            }
            else
            {
                echo "<h2>¡¡Atención!!<br>No insertado. Hay errores en los datos de entrada.</h2><br>";
            }
        }
		
        // Cerramos la conexión con la base de datos
        mysqli_close($c);
		?>
        <hr>
    </div>
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