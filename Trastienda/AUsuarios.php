<?php 
	//Iniciamos código PHP
	//Cargar el marco superior
	require_once('marcosup.php');
	
?>
    <div class="col-10">
        <h1>Alta de Usuario</h1>
    </div>

    <div class="p-2">
	    <form name="ficha" action="VisorAltaUsuario.php" method="POST" enctype="multipart/form-data">		
            <!-- Login del usuario -->
            <div>	
                Nick o Login del usuario: (Preferiblemente DNI del usuario)
                <br>
                <input type="text" name="nick" size="40">
            </div>  
            <!-- Contraseña del usuario -->
            <div>	
                Contraseña del usuario: (Clave de acceso al sistema)
                <br>
                <input type="text" name="clave" size="40">
            </div> 
            <!-- Nombre completo del usuario -->
            <div>	
                Nombre y Apellidos del usuario: 
                <br>
                <input type="text" name="nombape" size="40">
            </div>  
            <!-- Correo electrónico del usuario -->
            <div>	
                Correo electrónico: 
                <br>
                <input type="mail" name="email" size="40">
            </div> 
            <!-- Población -->
            <div>	
                Población: 
                <br>
                <input type="text" name="poblacion" size="40">
            </div> 
            <!-- Teléfono -->
            <div>	
                Teléfono: 
                <br>
                <input type="text" name="telefono" size="40">
            </div> 
            <!-- Imagen -->
            <div>	
                Imagen: (Sólo admite formatos PNG o JPG. Y tamaño menor de 200Kb)        
                <br> (Si no seleccionas archivo, cargará esta imagen)
                <img src="estilos/iconopersona.png" width="50px">
                <br><input type="file" name="FOTO" size="40"> 
            </div> 
            <br>


            <div class="form-group text-center bg-primary p-2">
                <INPUT TYPE="submit" VALUE="Enviar datos ">
                    - 
                <INPUT TYPE="reset"  VALUE="Borrar los datos">   
            </div>                              
		</form>        
        
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
    </div>                

<?php // Carga el marco inferior
	require_once('marcoinf.php');
?>	
