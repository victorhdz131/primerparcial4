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
    <title>Victor Hernandez</title>
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
           <a href="dropdown-item" href="/VICTOR4-APROG/Victor03.php">tabla 3</a><br>
          </div>
       </li>
       <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Unidad 2
         </a>
         <!-- Lo que sigue son los menus que se van a desplegar hacia abajo, cada uno tendra el nombre de su practica, ejemplo, practica uno se llamara su nombre el numero de la practica ZZ terminando con HTML -->
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
           <a href="dropdown-item" href="/VICTOR4-APROG/victor04.php">Practica 4</a><br>
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
    <p class="lead">,prueba111111111111111111111111111111111111111111111111111111111111111111111111</p>
    <hr class="my-4">
    <p>prueba11111111111111111111111111111111111111111111111111111
</p>
  </div>

      
<?php

$username = "root";
$pasword = "";
$servername = "localhost";
$database = "111";         

$conexion = new mysqli($servername, $username, $pasword,  $database);
if($conexion->connect_error){
  die("Conexion Fallida: " .$conexion->connect_error);
}
$sql = "SELECT * FROM personas";
$resultado = $conexion->query($sql);

?>

<div class="container">
<h1>Datos de la tabla de personajes</h1>

<?php if($resultado->num_rows >0):?>
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
 
  <table>
    <tr>
      <th>id</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Edad</th>
      <th>ColorFavorito</th>
    </tr>
    <?php while ($fila = $resultado->fetch_assoc()): ?>
      <tr>
        <td><?php echo $fila["id"]; ?></td>}
        <td><?php echo $fila["Nombre"]; ?></td>
        <td><?php echo $fila["Apellido"]; ?></td>}
        <td><?php echo $fila["Edad"]; ?></td>
        <td><?php echo $fila["ColorFavorito"]; ?></td>
      </tr>
    <?php endwhile; ?>
  </table>
  <?php else: ?>
    <p>No se encontro la persona</p>
    <?php endif; ?>

  <div style="display: flex; flex-wrap: wrap; gap: 20px;"> <!-- Usar gap para espacio entre las tarjetas -->
    <div class="row" style="flex: 1;">
      <div class="col-sm-2" style="margin-bottom: 20px;"> <!-- Espacio inferior entre las tarjetas -->
        <div class="card text-white bg-primary mb-3" style="width: 200px;">
          <div class="card-header">Hola</div>
          <div class="card-body">
            <h5 class="card-title">huirgjbigidejbnitegngetrnjuebgtegr</h5>
            <p class="card-text">gdnkogtnjgthenjgtrenjgtruihgtr9</p>
          </div>
        </div>
      </div>
    </div>
  
    <div class="row" style="flex: 1;">
      <div class="col-sm-2" style="margin-bottom: 20px;">
        <div class="card text-white bg-primary mb-3" style="width: 200px;">
          <div class="card-header">holaaaaa</div>
          <div class="card-body">
            <h5 class="card-title">oknibgtnoitgrjiogtrjigthrji0gt</h5>
            <p class="card-text">gtnjgdfhfdhiouvfnjfvnvfjnvfnjvfnvfdnhiobgref</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  

</body>
</html>