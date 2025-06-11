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
    ">METER DATOS</h1>
  </div>


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
  .container1 {
    display:;
    justify-content: center;
    align-items: center;
    width: 50%;
    background-color: #282a36;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    color: white;
  }
  h1 {
    text-align: center;
    color: #blue;
    margin-bottom: 15px;
  }
  form {
    display: flex;
    flex-direction: column;
  }
  label {
    font-size: 16px;
    margin-bottom: 5px; 
  }
  input[type="text"] {
    padding: 8px;
    margin-bottom: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    background-color: #44475a;
    color: #fff;
  }
  input[type="number"] {
    padding: 8px;
    margin-bottom: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    background-color: #44475a;
    color: #fff;
  }
  input[type="submit"] {
    padding: 10px;
    background-color: #50fa7b;
    border: none;
    color: #282a36;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
  }
  input[type="submit"]:hover {
    background-color: #3ae374;
  } 

 </style>

 <div class="container1">
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="formulario">
 <label for="Nombre"> Nombre: </label>
 <input type="text" id="Nombre" name="Nombre" requerided> <br>

 <label for="Apellido">Apellido: </label>
 <input type="text" id="Apellido" name="Apellido" requerided> <br>

 <label for="Edad">Edad: </label>
 <input type="number" id="Edad" name="Edad" requerided> <br>

 <label for="ColorFavorito">ColorFavorito: </label>
 <input type="text" id="ColorFavorito" name="ColorFavorito" requerided> <br>
 
 <input type="submit" value="Añadir datos">
</form>

<?php
$username = "root";
$password = "";
$servername = "localhost"; 
$database = "111";
$conexion = new mysqli($servername, $username, $password, $database);
if ($conexion->connect_error) {
  die("Conexion fallida: " . $conexion->connect_error);
}
function insertarPersona($conexion) {


  if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    var_dump($_POST);
  
  $Nombre = $conexion->real_escape_string($_POST["Nombre"]);
  $Apellido = $conexion->real_escape_string($_POST["Apellido"]); 
  $Edad = $conexion->real_escape_string($_POST["Edad"]);
  $ColorFavorito = $conexion->real_escape_string($_POST["ColorFavorito"]);

  $sql = "INSERT INTO personas (Nombre, Apellido, Edad, ColorFavorito) VALUES ('$Nombre', '$Apellido', '$Edad', '$ColorFavorito')";
  if ($conexion->query($sql) == TRUE) {
  echo "<p class='success'>Nuevo dato agregado con éxito.</p>";
  header("Location: " . $_SERVER['PHP_SELF']);
  exit();
} else {
 echo "<p class='error'>Error al agregar al Jugador:</p>" . $conexion->error . "</p>";
            }
          }   
        } insertarPersona($conexion);
        $sql = "SELECT * FROM personas";
     $resultado = $conexion->query($sql);
 
     if ($resultado->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Id</th><th>Nombre</th><th>Apellido</th><th>Edad</th><th>ColorFavorito</th></tr>";
        while ($row = $resultado->fetch_assoc()) {
          echo "<tr><td>" . $row["id"] . "</td><td>" . $row["Nombre"] . "</td><td>" . $row["Apellido"] . "</td><td>" . $row["Edad"] . "</td><td>" . $row["ColorFavorito"] . "</td></tr>";
      }
      echo "</table>";
     } 
     else {
         echo "No se encontraron registros en la base de datos";
     }
     
     $conexion->close();
     ?>
    </div>


</body>
</html>