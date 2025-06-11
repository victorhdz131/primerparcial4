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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.cdnfonts.com/css/meteoritox" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RELACIONES</title>
</head>
<body>

<nav class="navbar navbar-light" style="background-color: #28E500;">
    <div class="container">
        <a class="navbar-brand" href="index.html" style="color:#fafafa;">Inicio</a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Unidad 1
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/VICTOR4-APROG/victor01.php">Mostrar Datos 1</a>
                        <a class="dropdown-item" href="/VICTOR4-APROG/victor02.php">Mostrar Datos 2</a>
                        <a class="dropdown-item" href="/VICTOR4-APROG/victor03.php">Tabla 3</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Unidad 2
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/Victor.html">Practica 4</a>
                        <a class="dropdown-item" href="/Victor.html">Practica 5</a>
                        <a class="dropdown-item" href="/Victor.html">Practica 6</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Unidad 3
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/Victor.html">Practica 7</a>
                        <a class="dropdown-item" href="/Victor.html">Practica 8</a>
                        <a class="dropdown-item" href="/Victor.html">Practica 9</a>
                        <a class="dropdown-item" href="/Victor.html">Practica 10</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron" style="text-align: center;">
    <h1 class="display-4" style="font-family: 'meteoritox', sans-serif; color: blue;">Semestre 4</h1>
</div>

<div class="container">
    <h1>PAGINA DE MOSTRAR DATOS RELACIONALES</h1>

    <style>
        h1 {
            text-align: center;
            color: blue;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 50px;
            border-radius: 50px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f6c900;
            color: black;
        }
        tr:nth-child(odd) {
            background-color: white;
            color: black;
        }
        th {
            background-color: #3cf600;
            color: white;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-size: 16px;
            margin-bottom: 5px; 
        }
        input[type="text"], input[type="number"] {
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

    <form method="POST" id="formulario">
        <label for="numero_control">Número de Control: </label>
        <input type="text" id="numero_control" name="numero_control" required>
        
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="apellido_paterno">Apellido Paterno: </label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" required>
        
        <label for="apellido_materno">Apellido Materno: </label>
        <input type="text" id="apellido_materno" name="apellido_materno" required>
        
        <label for="id_edad">Edad: </label>
        <select id="id_edad" name="id_edad" required>
            <?php
            // Conexión a la base de datos
            $conexion = new mysqli('localhost', 'root', '', 'escuela');
            $result = $conexion->query("SELECT * FROM edades");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['edad'] . "</option>";
            }
            ?>
        </select>
        
        <label for="id_colonia">Colonia: </label>
        <select id="id_colonia" name="id_colonia" required>
            <?php
            $result = $conexion->query("SELECT * FROM colonias");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['colonia'] . "</option>";
            }
            ?>
        </select>
        
        <label for="id_especialidad">Especialidad: </label>
        <select id="id_especialidad" name="id_especialidad" required>
            <?php
            $result = $conexion->query("SELECT * FROM especialidades");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['especialidad'] . "</option>";
            }
            ?>
        </select>
        
        <label for="id_genero">Género: </label>
        <select id="id_genero" name="id_genero" required>
            <?php
            $result = $conexion->query("SELECT * FROM generos");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['genero'] . "</option>";
            }
            ?>
        </select>
        
        <label for="correo">Correo: </label>
        <input type="text" id="correo" name="correo" required>
        
        <label for="telefono">Teléfono: </label>
        <input type="text" id="telefono" name="telefono" required>
        
        <label for="fecha_ingreso">Fecha de Ingreso: </label>
        <input type="date" id="fecha_ingreso" name="fecha_ingreso" required>
        
        <input type="submit" value="Agregar registro">
    </form>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_control = mysqli_real_escape_string($conexion, $_POST["numero_control"]);
    $nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
    $apellido_paterno = mysqli_real_escape_string($conexion, $_POST["apellido_paterno"]);
    $apellido_materno = mysqli_real_escape_string($conexion, $_POST["apellido_materno"]);
    $id_edad = mysqli_real_escape_string($conexion, $_POST["id_edad"]);
    $id_colonia = mysqli_real_escape_string($conexion, $_POST["id_colonia"]);
    $id_especialidad = mysqli_real_escape_string($conexion, $_POST["id_especialidad"]);
    $id_genero = mysqli_real_escape_string($conexion, $_POST["id_genero"]);
    $correo = mysqli_real_escape_string($conexion, $_POST["correo"]);
    $telefono = mysqli_real_escape_string($conexion, $_POST["telefono"]);
    $fecha_ingreso = mysqli_real_escape_string($conexion, $_POST["fecha_ingreso"]);

    $sql = "INSERT INTO alumnos (numero_control, nombre, apellido_paterno, apellido_materno, id_edad, id_colonia, id_especialidad, id_genero, correo, telefono, fecha_ingreso)
            VALUES ('$numero_control', '$nombre', '$apellido_paterno', '$apellido_materno', '$id_edad', '$id_colonia', '$id_especialidad', '$id_genero', '$correo', '$telefono', '$fecha_ingreso')";
    
    if ($conexion->query($sql) === TRUE) {
        echo "<p class='success'>Nuevo alumno agregado con éxito.</p>";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "<p class='error'>Error al agregar al alumno: " . $conexion->error . "</p>";
    }
}

// Mostrar datos de la tabla
$sql = "SELECT 
        a.numero_control,
        a.nombre,
        a.apellido_paterno,
        a.apellido_materno,
        e.edad,
        c.colonia,
        es.especialidad,
        g.genero,
        a.correo,
        a.telefono,
        a.fecha_ingreso
    FROM alumnos a
    JOIN edades e ON a.id_edad = e.id
    JOIN colonias c ON a.id_colonia = c.id
    JOIN especialidades es ON a.id_especialidad = es.id
    JOIN generos g ON a.id_genero = g.id";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<tr>
        <th>Número de Control</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Edad</th>
        <th>Colonia</th>
        <th>Especialidad</th>
        <th>Género</th>
        <th>Correo</th>
        <th>Teléfono</th>
        <th>Fecha de Ingreso</th>
    </tr>";
    
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["numero_control"] . "</td>
            <td>" . $row["nombre"] . "</td>
            <td>" . $row["apellido_paterno"] . "</td>
            <td>" . $row["apellido_materno"] . "</td>
            <td>" . $row["edad"] . "</td>
            <td>" . $row["colonia"] . "</td>
            <td>" . $row["especialidad"] . "</td>
            <td>" . $row["genero"] . "</td>
            <td>" . $row["correo"] . "</td>
            <td>" . $row["telefono"] . "</td>
            <td>" . $row["fecha_ingreso"] . "</td>
        </tr>";
    }
    echo "</table>";
}

$conexion->close();
