<?php
   $username = "root";
   $password = "";
   $servername = "localhost";
   $database = "vhdaacv";

   $conexion = new mysqli( $servername,$username, $password, $database);
   if ($conexion->connect_error) {
       die("Conexion Fallida: " . $conexion->connect_error);
   }
//estas lineas van a analizar si el formulario ya ha sido enviado
   if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $id_categoria = $_POST["categoria"];
    $sql = "INSERT INTO productos (nombre, precio, id_categoria) VALUES ('$nombre', '$precio', '$id_categoria')";
    if ($conexion->query($sql)===TRUE){
        echo "<p style='color: green';>Producto agregado correctamente</p>";
    }else{
        echo "<p style='color: red';>Error:" . $conexion->error . "</p>;";
    }
   }
   //obtener categorias para sacar info de la basede datos para dropdown con la info que se solicita, eso es lo que nos hace falta en la pagina anterior.
   $sql_categorias = "SELECT * FROM categorias"; //categorias es una tabla que hare despues
   $resul_categorias = $conexion->query ($sql_categorias);
?>

<html>
    <head>
        <title>Pagina alterna de prueba</title>
    </head>
    <body>
    

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
  background-color:  #aa86b6;
  color: black ;  
}
tr:nth-child(odd){
  background-color:white;
  color:black;
}
th{
  background-color: #ff3333 ;
  color:white;
}
.container1 {
  display:;
  justify-content: center;
  align-items: center;
  width: 50%;
  background-color: #49ff33;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px #49ff33;
  color: white;
}
h1 {
  text-align: center;
  color: #black;
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
input{
  padding: 8px;
  margin-bottom: 10px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  background-color:rgb(149, 74, 134);
  color: #fff;
}
input[type="text"] {
  padding: 8px;
  margin-bottom: 10px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  background-color: #3364ff  ;
  color: #fff;
}
input[type="number"] {
  padding: 8px;
  margin-bottom: 10px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  background-color: #3364ff ;
  color: #fff;
}
input[type="submit"] {
  padding: 10px;
  background-color: #e0ff33  ;
  border: none;
  color: #282a36;
  font-size: 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: background 0.3s;
}
input[type="submit"]:hover {
  background-color: #aa86b6;
} 

</style>
        <h1> Registrar productos</h1>
        <div class="container1">
        <form method="POST">
            <label>Nombre del producto: </label>
            <input type="text" name="nombre" required><br><br>
            <label>Precio: </label>
            <input type="number" name="precio" required><br><br>
            <label>Categoria: </label>
            
            <select name="categoria" required>
                <option value="">Seleccionar una categoria</option>
                <?php
                if($resul_categorias->num_rows > 0){
                    while($row = $resul_categorias-> fetch_assoc()){
                        echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                    }
                }
                ?>
            </select><br><br>
            <input type="submit" value="Agregar producto">
        </form>
            </div>

        <h2>Lista de Productos</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoria</th>
            </tr>
            <?php
            $sql_productos = "SELECT productos.nombre, productos.precio, categorias.nombre AS categoria FROM productos JOIN categorias ON productos.id_categoria = categorias.id";
            $result_productos = $conexion->query($sql_productos);
            if($result_productos->num_rows>0){
                while($row = $result_productos->fetch_assoc()){
                    echo "<tr>
                    <th>{$row['nombre']}</th>
                    <th>{$row['precio']}</th>
                    <th>{$row['categoria']}</th>
                    </tr>";
                } 
            }else{
                echo "<tr><td>No hay productos resgistrados</td></tr>";
            }
            ?>
        </table>
    </body>
</html>