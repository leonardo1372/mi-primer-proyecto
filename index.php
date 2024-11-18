<?php
require_once('../CRUD/conexion.php');
require_once('../CRUD/clases/libro.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Lista de libros</title>
</head>
<body>
    <h1>libros de la biblioteca</h1>
    <a href="crear.php">Registrar nuevo libro</a>
    <h2>Lista de libros:</h2>
    <?php
    $sql = "SELECT * FROM libro";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "ID: " . $fila["id"] . " - titulo: " . $fila["titulo"] . " - autor: " . $fila["autor"] . " - editorial: " . $fila["editorial"] . " - año_publicacion: " . $fila["año_publicacion"] . " - genero: " . $fila["genero"];
            echo "<a href='eliminar.php?id=" . $fila['id'] . "' onclick=\"return confirm('¿Estás seguro de eliminar este estudiante?')\">Eliminar</a><br>";
        }
    } else {
        echo "0 resultados";
    }
    ?>
</body>
</html>


