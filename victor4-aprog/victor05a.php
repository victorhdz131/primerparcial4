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

$sql_edad = "SELECT id, edad FROM edades";
$sql_colonias = "SELECT id, colonia FROM colonias";
$sql_especialidades = "SELECT id, especialidad FROM especialidades";
$sql_genero = "SELECT id, genero FROM generos";

$result_edad = $conexion->query($sql_edad);
$result_colonias = $conexion->query($sql_colonias);
$result_especialidades = $conexion->query($sql_especialidades);
$result_genero = $conexion->query($sql_genero);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_control = $conexion->real_escape_string($_POST["numero_control"]);
    $nombre = $conexion->real_escape_string($_POST["nombre"]);
    $apellido_paterno = $conexion->real_escape_string($_POST["apellido_paterno"]);
    $apellido_materno = $conexion->real_escape_string($_POST["apellido_materno"]);
    $id_edad = $conexion->real_escape_string($_POST["id_edad"]);
    $id_colonia = $conexion->real_escape_string($_POST["id_colonia"]);
    $id_especialidad = $conexion->real_escape_string($_POST["id_especialidad"]);
    $id_genero = $conexion->real_escape_string($_POST["id_genero"]);
    $correo = $conexion->real_escape_string($_POST["correo"]);
    $telefono = $conexion->real_escape_string($_POST["telefono"]);
    $fecha_ingreso = $conexion->real_escape_string($_POST["fecha_ingreso"]);

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.cdnfonts.com/css/diablo" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styile.css">
    <link href="https://fonts.cdnfonts.com/css/meteoritox" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RELACIONES</title>
</head>
<body>
    <div class="container">
        <h1>PAGINA DE MOSTRAR DATOS RELACIONALES</h1>
        <form method="POST" id="formulario">
            <label for="numero_control">Numero control:</label>
            <input type="text" id="numero_control" name="numero_control" required><br>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>
            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" required><br>
            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" id="apellido_materno" name="apellido_materno" required><br>
            <label for="id_edad">Edad:</label>
            <select name="id_edad" required>
                <option value="">Seleccione una Edad</option>
                <?php while ($row = $result_edad->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["edad"] . "</option>";
                }
                ?>
            </select><br>
            <label for="id_colonia">Colonia:</label>
            <select name="id_colonia" required>
                <option value="">Seleccione una Colonia</option>
                <?php while ($row = $result_colonias->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["colonia"] . "</option>";
                }
                ?>
            </select><br>
            <label for="id_especialidad">Especialidad:</label>
            <select name="id_especialidad" required>
                <option value="">Seleccione una Especialidad</option>
                <?php while ($row = $result_especialidades->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["especialidad"] . "</option>";
                }
                ?>
            </select><br>
            <label for="id_genero">Genero:</label>
            <select name="id_genero" required>
                <option value="">Seleccione un Genero</option>
                <?php while ($row = $result_genero->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["genero"] . "</option>";
                }
                ?>
            </select><br>
            <label for="correo">Correo:</label>
            <input type="text" id="correo" name="correo" required><br>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required><br>
            <label for="fecha_ingreso">Fecha de ingreso:</label>
            <input type="date" id="fecha_ingreso" name="fecha_ingreso" required><br>
            <input type="submit" value="Agregar registro">
        </form>
    </div>
</body>
</html>

