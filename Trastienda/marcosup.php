<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">  
    <title>GESTIÓN DE ALMACÉN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/datos.css">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="estilos/logoIESTuraniana.jpg">
    
<body>
  <div class="p-3 bg-success text-white text-center">          
          <h4>TRASTIENDA DE LA GESTIÓN DE ALMACÉN</h4>
  </div>
  <nav class="navbar navbar-expand-sm bg-dark justify-content-center p-1">
      <ul class="navbar-nav">
        <li class="nav-item">
          <p><a href="index.php">INICIO</a></p>
        </li>
        <li class="nav-item">
          <p><a href="GUsuarios.php">USUARIOS</a></p>
        </li>
        <li class="nav-item">          
          <p><a href="GHistorico.php">HISTORICO</a></p>
        </li>
        <li class="nav-item">
          <p><a href="GProductos.php">PRODUCTOS</a></p>
        </li>
        <li class="nav-item">          
          <p><a href="GProveedores.php">PROVEEDORES</a></p>
        </li>
        <li class="nav-item">          
          <p><a href="Ayuda.php">AYUDA</a></p>
        </li>
  </ul>   
  </nav>
<?php
	// Invocamos el archivo con la conexión a la base de datos
	require_once('conexion.php');
?>
  
