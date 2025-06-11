<?php
  ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <link href="https://fonts.cdnfonts.com/css/diablo" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>;
    <link rel="stylesheet" href="styile.css">
<link href="https://fonts.cdnfonts.com/css/meteoritox" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RELACIONES</title>
</head>
<body>

<nav class="navbar navbar-light" style="background-color: #28E500 ;">
  <div class="contener">
    <a class="navbar-brand" href="index.html" style="color:#fafafa;">Inicio</a>
    <!-- Un boton de inicio que lleva a si mismo, de color blanco, aqui pueden poner el color que quieran dependiendo de su estilo -->
   
    <!-- A continuacion es el menu dropdown para poner las ligas a las practicas -->
     <div class="collapse navbar-collapse" id="navbarNavDropdown">
     <ul class="nav navbar-nav">
       <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Unidad 1
         </a>
         <!-- Lo que sigue son los menus que se van a desplegar hacia abajo, cada uno tendra el nombre de su practica, ejemplo, practica uno se llamara su nombre el numero de la practica ZZ terminando con HTML -->
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/VICTOR4-APROG/victor01.php">Mosrtrar Datos 1</a><br>
           <a class="dropdown-item" href="/VICTOR4-APROG/victor02.php">Mosrtrar Datos 2</a><br>
           <a class="dropdown-item" href="/VICTOR4-APROG/victor03.php">Tabla 3</a><br>
          </div>
       </li>
       <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Unidad 2
         </a>
         <!-- Lo que sigue son los menus que se van a desplegar hacia abajo, cada uno tendra el nombre de su practica, ejemplo, practica uno se llamara su nombre el numero de la practica ZZ terminando con HTML -->
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
           <a href="dropdown-item" href="/Victor.html">Practica 4</a><br>
           <a href="dropdown-item" href="/Victor.html">Practica 5</a><br>
           <a href="dropdown-item" href="/Victor.html">Practica 6</a><br>
          </div>
       </li>
       <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Unidad 3
         </a>
         <!-- Lo que sigue son los menus que se van a desplegar hacia abajo, cada uno tendra el nombre de su practica, ejemplo, practica uno se llamara su nombre el numero de la practica ZZ terminando con HTML -->
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
           <a href="dropdown-item" href="/Victor.html">Practica 7</a><br>
           <a href="dropdown-item" href="/Victor.html">Practica 8</a><br>
           <a href="dropdown-item" href="/Victor.html">Practica 9</a><br>
           <a href="dropdown-item" href="/Victor.html">Practica 10</a><br>
          </div>
       </li>
     </ul>
     </div>
   </div>
  </nav>
  
  <div class="jumbotron" style="text-align: center ;">
    <h1 class="display-4" style="                                                                    font-family: 'meteoritox', sans-serif; color: blue;
    ">Semestre 4</h1>
 
  </div>


<div class="container">
<h1>PAGINA DE MOSTRAR DATOS RELACIONALES</h1>

 <style>

  h1{

    text-align:center;
    color:#blue;
    margin: bottom: 20px;
  }
  table{
    width : 100% ;
    border-collapse: collapse;
    margin-top: 50px;
    border-radius:50px;
  }
  th, td {
    padding:10px;
    text-align:left;
    border-bottom: 1px solid #ddd;
  }
  tr:nth-child(even){
    background-color: #f6c900 ;
    color: black ;  
  }
  tr:nth-child(odd){
    background-color:white;
    color:black;
  }
  th{
    background-color:#3cf600;
    color:white;
  }
  

 </style>
 
    <table class="table table-bordered">
  <thead>
    <tr>
      <th>Numero de Control</th>
      <th>Nombre</th>
      <th>Apellido Paterno</th>
      <th>Apellido Materno</th>
      <th>Edad</th>
      <th>Colonia</th>
      <th>Especialidad</th>
      <th>Genero</th>
      <th>Correo</th>
      <th>Telefono</th>
      <th>Fecha de Ingreso</th>
    </tr>
  </thead>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    $username = "root";
    $password = "";
    $servername = "localhost";

    $database = "escuela";
    $conexion = new mysqli($servername, $username, $password, $database);
    
    if ($conexion->connect_error) {
        die("Conexión Fallida: " . $conexion->connect_error);
    }
    
    $sql = "SELECT 
    a.numero_control,
    a.nombre,
    a.apellido_paterno,
    a.apellido_materno,
    e.edad,
    c.id_colonia,
    es.id_especialidad,
    g.id_genero,
    a.correo,
    a.telefono,
    a.fecha_ingreso
    FROM alumnos a
    JOIN edades e ON a.id_edad = e.id
    JOIN colonia c ON a.id_colonia = c.id
    JOIN especialidades es ON a.id_especialidad = es.id
    JOIN generos g ON a.id_genero = g.id";
    
    $resultado = $conexion->query($sql);
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>
  <td> {$row['numero_control']}</td>
  <td>{$row['nombre']}</td>
  <td>{$row['apellido_paterno']}</td>
  <td>{$row['apellido_materno']}</td>
  <td>{$row['edad']}</td>
  <td>{$row['id_colonia']}</td>
  <td>{$row['id_especialidad']}</td>
  <td>{$row['id_genero']}</td>
  <td>{$row['correo']}</td>
  <td>{$row['telefono']}</td>
  <td>{$row['fecha_ingreso']}</td>
</tr>";


    } 
    }else {
        echo "No se encontraron registros en la base de datos";
    }
    
    $conexion->close();
    ?>
      
      
      <div style="display: flex; flex-wrap: wrap; gap: 20px;"> <!-- Usar gap para espacio entre las tarjetas -->
        <div class="row" style="flex: 1;">
          <div class="col-sm-2" style="margin-bottom: 20px;"> <!-- Espacio inferior entre las tarjetas -->
            <div class="card text-white bg-primary mb-3" style="width: 200px;">
              
              <div class="card-body">
                
                </div>
              </div>
            </div>
          </div>
  
          <div class="row" style="flex: 1;">
            <div class="col-sm-2" style="margin-bottom: 20px;">
              <div class="card text-white bg-primary mb-3" style="width: 200px;">
                
                <div class="card-body">
                 
          </div>
        </div>
      </div>
      
    </div>
  </div>
  

</body>
</html>