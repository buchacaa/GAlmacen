<?php 
	//Iniciamos código PHP
	//Cargar el marco superior
	require_once('marcosup.php');
?>
<div>
    <h1>Usuario del Histórico Borrado definitivamente.</h1>
</div>
<div>
    <?php
		// Recoge las variables 
		$id=$_POST['id'];  
        $imagen=$_POST['imagen']; 
        // Construye el nuevo archivo para el histórico añadiendo el instante (día y hora)
        //$hoy = date("Ymd-Hms"); 
        //$historico="historico/".$hoy."_";
        //$historico.=substr($imagen, 9, 20);
        // Comprobación
        //echo "<hr>$id<br>$imagen<hr>";
        //echo "<hr>$imagen<br>$historico<hr>";

        // Seleccionamos la tabla con la que vamos a trabajar
        $tabla="historico";// Escribir entre comillas el nombre de la tabla a listar
        
        // Elimina el registro del HISTÓRICO
        $elimina="DELETE FROM historico where login='$id'";
        //echo "<hr><h3>$elimina</h3><hr>";

        // Ejecuta la sentencia de borrado        
	    if (mysqli_query($c,$elimina))
        {
            // Elimina el fichero de la imagen
            unlink($imagen);
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