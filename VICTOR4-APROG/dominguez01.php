<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "personajes";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql_usuarios = "SELECT id, nombre FROM usuarios";
    $sql_buenomalos = "SELECT id, nombre FROM buenomalos";
    $sql_equipos = "SELECT id, nombre FROM equipos";
    $sql_generos = "SELECT id, nombre FROM generos";
    $sql_reinos = "SELECT id, nombre FROM reinos";

    $result_usuarios = $conn->query($sql_usuarios);
    $result_buenomalos = $conn->query($sql_buenomalos);
    $result_equipos = $conn->query($sql_equipos);
    $result_generos = $conn->query($sql_generos);
    $result_reinos = $conn->query($sql_reinos);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $juego =  $conn->real_escape_string($_POST["juego"]);
        $saga =  $conn->real_escape_string($_POST["saga"]);
        $año =  $conn->real_escape_string($_POST["año"]);
        $id_usuario =  $conn->real_escape_string($_POST["id_usuario"]);
        $id_buenomalo =  $conn->real_escape_string($_POST["buenomalos"]);
        $id_equipo =  $conn->real_escape_string($_POST["equipo"]);
        $id_genero =  $conn->real_escape_string($_POST["genero"]);
        $id_reino =  $conn->real_escape_string($_POST["reino"]);
        $aliados =  $conn->real_escape_string($_POST["aliados"]);
        $consola =  $conn->real_escape_string($_POST["consola"]);
        $mejorjuego =  $conn->real_escape_string($_POST["mejorjuego"]);

        $sql = "INSERT INTO mario (juego, saga, año, id_usuario, id_buenomalo, id_equipo, id_genero, id_reino, aliados, consola, mejorjuego)
                VALUES ('$juego', '$saga', '$año', '$id_usuario', '$id_buenomalo', '$id_equipo', '$id_genero', '$id_reino', '$aliados', '$consola', '$mejorjuego')";
        
        if ($conn->query($sql) == TRUE) {
            echo "<p class='success'>Nuevo personaje agregado con éxito.</p>";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "<p class='error'>Error al agregar al personaje: " . $conn->error . "</p>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
        <link href="https://fonts.cdnfonts.com/css/yukarimobile" rel="stylesheet">

        <link href="https://fonts.cdnfonts.com/css/montagu-slab" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/waiting-summer" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/fjalla-one" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/overpass-mono-2" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <title>Mundo de Mario Broos</title>
</head>

<style>
        .container1 {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 50%;
            background-color: #282a36;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            color: white;
            margin: auto;
        }
        h1 {
            text-align: center;
            color:rgb(250, 163, 0);
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
        input[type="text"], input[type="number"], input[type="date"], input[type="email"], input{
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
            background-color:rgb(246, 255, 67);
            border: none;
            color: #282a36;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        input[type="submit"]:hover {
            background-color:rgb(246, 255, 67);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
        text-align: center;
        background-color:rgb(234, 181, 38);
        color: black;
        }

        th {
            background-color:rgb(219, 32, 32);
            color: white;
        }
        select {
        padding: 8px;
        margin-bottom: 10px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        background-color: #44475a;
        color: #fff;
        }
        select:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        }
        select option {
        background-color: #44475a;
        color: #fff;
        }
        select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 8px center;
        background-size: 24px;
        padding-right: 30px;
        }

</style>

<body>
    <div class="contener" style="font-family: 'Overpass Mono', sans-serif; font-weight: 600; background-color:rgb(40, 236, 43);">
        <a class="navbar-brand" href="index.html" style="color:rgb(0, 0, 0); font-size: 24px;;">Inicio</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav navbar-nav" style="font-family: 'Overpass Mono', sans-serif; font-weight: 500; background-color: none; font-size: 18px;">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:rgb(0, 0, 0);">
                            Unidad 1
                        </a>
                    
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/VICTOR4-APROG/victor01.php">Base de Datos</a><br>
                            <a class="dropdown-item" href="/VICTOR4-APROG/victor02.php">Solicitar Datos</a><br>
                            <a class="dropdown-item" href="/VICTOR4-APROG/victor03.php">Mostrar Datos</a><br>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:rgb(0, 0, 0);">
                            Unidad 2
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/VICTOR4-APROG/victor04.php">Mostrar relacionales 4</a><br>
                            <a class="dropdown-item" href="/VICTOR4-APROG/victor05.php">Mostrar datos 5</a><br>
                            <a class="dropdown-item" href="/VICTOR4-APROG/hernandez01.php">Meter datos 6</a><br>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:rgb(0, 0, 0);">
                            Unidad 3
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/VICTOR4-APROG/victor05a.php">Mostrar datos 7</a><br>
                            <a class="dropdown-item" href="/VICTOR4-APROG/dominguez01.php">Mundo de Mario Broos</a><br>
                            <a class="dropdown-item" href="/Victor/Victor09.php">Practica 9</a><br>
                            <a class="dropdown-item" href="/Victor/Victor010.php">Practica 10</a><br>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>    
    
    <div class="jumbotron" style="text-align: center; background-color: #eef0f2; margin-bottom: 0; padding-bottom: 10px; padding-top: 15px;">
        <h1 class="display-4" style="color: #a99985; font-size: 80px; font-weight: 700; font-family: 'Yukarimobile', sans-serif; color:rgb(13, 49, 255);">
            Cuarto Semestre
        </h1>
        <hr class="my-4" style="border: 2px solid rgb(13, 49, 255);">
        <p class="lead" style="color: #353b3c; font-family: Verdana, Geneva, Tahoma, sans-serif;">
            Esta página esta dedicada a la materia de "Implementa Base de Datos Relaciones en un Sistema de Informacion"
        </p>
        <p style="color:rgb(0, 0, 0); font-weight: 600; font-family: Verdana, Geneva, Tahoma, sans-serif">
            Victor Hernandez Dominguez
        </p>
    </div>

    <h1>Mundo de Mario Broos</h1>
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
  <img src="https://th.bing.com/th/id/OIP.rKfgGuxadSEI-slQEwRMEAHaEu?rs=1&pid=ImgDetMain" alt="logo de mario" width="300" height="200">
</div>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saga Mario de Nintendo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }
        h1, h2, h3 {
            color:rgb(4, 4, 4);
        }
        ul {
            margin: 10px 0;
        }
    </style>
</head>
<body>
   

    <h2>Introducción</h2>
    <p>La saga Mario es una de las franquicias más icónicas y exitosas en la historia de los videojuegos, creada por Nintendo. Desde su debut en 1981, Mario ha evolucionado y se ha expandido a múltiples géneros y plataformas.</p>

    <h2>Historia</h2>
    <ul>
        <li><strong>Debut</strong>: Mario apareció por primera vez en el juego "Donkey Kong" como Jumpman.</li>
        <li><strong>Primera Aventura</strong>: En 1985, "Super Mario Bros." revolucionó el mundo de los videojuegos de plataformas.</li>
        <li><strong>Expansión</strong>: A lo largo de los años, Mario ha protagonizado numerosos títulos, incluyendo secuelas, spin-offs y juegos en 3D.</li>
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
  <img src="https://i.ytimg.com/vi/UvZ0LDCTy_4/hqdefault.jpg" alt="logo de mario" width="300" height="200">
    </ul>
    </ul>

    <h2>Juegos Principales</h2>
    <ul>
        <li>Super Mario Bros. (1985): El juego que definió el género de plataformas.</li>
        <li>Super Mario 64 (1996): Introdujo la jugabilidad en 3D.</li>
        <li>Super Mario Galaxy (2007): Innovador por su diseño de gravedad y niveles.</li>
        <li>Super Mario Odyssey (2017): Aclamado por su mundo abierto y mecánicas creativas.</li>
        <li>Super Mario World (1990): Introdujo a Yoshi y expandió el universo de Mario.</li>
        <li>New Super Mario Bros. (2006): Retorno a la jugabilidad 2D con gráficos modernos.</li>
        <li>Super Mario Maker (2015): Permite a los jugadores crear y compartir sus propios niveles.</li>
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
  <img src="https://i.ytimg.com/vi/YE4ne6Rk-s4/maxresdefault.jpg" alt="logo de mario" width="300" height="200">
    </ul>

    <h2>Personajes Clave</h2>
    <ul>
        <li><strong>Mario</strong>: El protagonista, un fontanero valiente.</li>
        <li><strong>Luigi</strong>: El hermano de Mario, conocido por su personalidad tímida.</li>
        <li><strong>Princesa Peach</strong>: La princesa del Reino Champiñón, frecuentemente rescatada.</li>
        <li><strong>Bowser</strong>: El principal antagonista que intenta secuestrar a Peach.</li>
        <li><strong>Toad</strong>: Habitante del Reino Champiñón y asistente de la princesa.</li>
        <li><strong>Yoshi</strong>: Un dinosaurio que ayuda a Mario en sus aventuras.</li>
        <li><strong>Wario</strong>: Un rival de Mario, conocido por su avaricia.</li>
        <li><strong>Waluigi</strong>: El compañero de Wario, a menudo aparece en juegos de deportes y fiesta.</li>
    </ul>

    <h2>Villanos y Antagonistas</h2>
    <ul>
        <li><strong>Bowser</strong>: Rey de los Koopas, principal enemigo de Mario.</li>
        <li><strong>Kamek</strong>: Un mago Koopa que ayuda a Bowser en sus planes.</li>
        <li><strong>Donkey Kong</strong>: Originalmente un antagonista, ahora es un personaje jugable en su propia serie.</li>
        <li><strong>Petey Piranha</strong>: Un jefe recurrente que aparece en varios juegos.</li>
        <li><strong>Boo</strong>: Fantasmas que aparecen en muchos niveles.</li>
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
  <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/9195e7d5-496f-494a-bfc1-e07485fd706c/deo1vo9-db2942c6-10de-4a8a-ae8e-421e26928ea6.png/v1/fill/w_1030,h_776,q_70,strp/mario_charecters_by_jt525pro_deo1vo9-pre.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9ODA1IiwicGF0aCI6IlwvZlwvOTE5NWU3ZDUtNDk2Zi00OTRhLWJmYzEtZTA3NDg1ZmQ3MDZjXC9kZW8xdm85LWRiMjk0MmM2LTEwZGUtNGE4YS1hZThlLTQyMWUyNjkyOGVhNi5wbmciLCJ3aWR0aCI6Ijw9MTA2OSJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.mEwOBmL88b66v_XM6Xhaw26erYA6ZPyAR2YXYb-Eo5w" alt="logo de mario" width="300" height="200">
    </ul>

    <h2>Bandos y Reinos</h2>
    <ul>
        <li><strong>Reino Champiñón</strong>: El hogar de Mario y Peach, donde ocurren muchas de las aventuras.</li>
        <li><strong>Reino de los Koopas</strong>: Dominado por Bowser y sus secuaces.</li>
        <li><strong>Reino de Delfino</strong>: Presentado en "Super Mario Sunshine", un lugar tropical donde Mario debe limpiar la contaminación.</li>
        <li><strong>Reino de los Sapos</strong>: Hogar de los Toads, que asisten a Mario en sus aventuras.</li>
        <li><strong>Reino de la Luna</strong>: Introducido en "Super Mario Odyssey", un lugar lleno de misterios.</li>
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <img src="https://nintenduo.com/wp-content/uploads/2023/08/Mapa-Reino-Flor-Super-Mario-Bros-Wonder-00-1024x576.webp" alt="logo de mario" width="300" height="200">
    </ul>

    <h2>Impacto Cultural</h2>
    <p>La saga Mario ha dejado una huella indeleble en la cultura popular, inspirando películas, series de televisión, y una amplia gama de productos de merchandising. Mario es considerado un icono de los videojuegos.</p>

    <h2>Conclusión</h2>
    <p>La saga Mario continúa siendo relevante en la industria de los videojuegos, con nuevos títulos y remakes que mantienen viva la magia de este querido personaje.</p>
</body>

    <div class="container1">
        <form method="post" id="formulario">
            <label for="juego">Juego:</label>
            <input type="text" id="juego" name="juego" required>
            <br>
            <label for="saga">Saga</label>
            <input type="text" id="saga" name="saga" required>
            <br>
            <label for="año">Año</label>
            <input type="text" id="año" name="año" required>
            <br>
            <label for="id_usuario">Personaje</label>
            <select name="id_usuario" required>
                <option value="">Seleccione un personaje</option>
                <?php
                    while ($row = $result_usuarios->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                    }
                ?>
                <div class="container1">
        <form method="post" id="formulario">
            </select>
            <br>
            <label for="buenomalos">Bando</label>
            <select name="buenomalos" required>
                <option value="">Seleccione un Bando</option>
                <?php
                    while ($row = $result_buenomalos->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                    }
                ?>
            </select>
            <br>
            <label for="equipo">Equipo</label>
            <select name="equipo" required>
                <option value="">Seleccione un equipo</option>
                <?php
                    while ($row = $result_equipos->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                    }
                ?>
            </select>
            <br>
            <label for="reino">Reinos</label>
            <select name="reino" required>
                <option value="">Seleccione un Reino</option>
                <?php
                    while ($row = $result_reinos->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                    }
                ?>
            </select>

            <label for="genero">Generos</label>
            <select name="genero" required>
                <option value="">Seleccione un genero</option>
                <?php
                    while ($row = $result_generos->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                    }
                ?>
            </select>
            <br>
            <label for="aliados">Aliados</label>
            <input type="text" id="aliados" name="aliados" required>
            <br>
            <label for="consola">Consola</label>
            <input type="text" id="consola" name="consola" required>
            <br>
            <label for="mejorjuego">Mejor juego</label>
            <input type="text" id="mejorjuego" name="mejorjuego" required>
       
            <br>
            <input type="submit" value="Agregar Registro">
        </form>
                  </div>
</form>
    </div>
        <?php
        // Consulta y muestra de datos en una tabla
        $sql = "SELECT m.id, m.juego, m.saga, m.año, u.nombre AS personaje, bm.nombre AS bando, e.nombre AS equipo, 
                g.nombre AS genero, r.nombre AS reino, m.aliados, m.consola, m.mejorjuego 
                FROM mario m
                JOIN usuarios u ON m.id_usuario = u.id
                JOIN buenomalos bm ON m.id_buenomalo = bm.id
                JOIN equipos e ON m.id_equipo = e.id
                JOIN generos g ON m.id_genero = g.id
                JOIN reinos r ON m.id_reino = r.id";

        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            echo "<h2>Tabla de Personajes</h2>";
            echo "<table class='table table-bordered'>";
            echo "<tr>
                    <th>ID</th>
                    <th>Juego</th>
                    <th>Saga</th>
                    <th>Año</th>
                    <th>Personaje</th>
                    <th>Bando</th>
                    <th>Equipo</th>
                    <th>Género</th>
                    <th>Reino</th>
                    <th>Aliados</th>
                    <th>Consola</th>
                    <th>Mejor Juego</th>
                  </tr>";

            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["juego"] . "</td>
                        <td>" . $row["saga"] . "</td>
                        <td>" . $row["año"] . "</td>
                        <td>" . $row["personaje"] . "</td>
                        <td>" . $row["bando"] . "</td>
                        <td>" . $row["equipo"] . "</td>
                        <td>" . $row["genero"] . "</td>
                        <td>" . $row["reino"] . "</td>
                        <td>" . $row["aliados"] . "</td>
                        <td>" . $row["consola"] . "</td>
                        <td>" . $row["mejorjuego"] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron registros en la base de datos";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>