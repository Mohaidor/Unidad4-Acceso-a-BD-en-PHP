<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-color: darkgray">
    <h1>Mis Libros</h1>
    <form action="" method="GET">

        <input type="text" name="titulo">
        <input type="submit" name="submit" value="Buscar">
        <?php if (isset($_GET['submit']) && empty($_GET['titulo'])) {
            echo "<span style='color:red;'>¡Intoduce un título!</span>";
        } ?>
    </form>
    <br>

    <?php
    if (isset($_GET['submit']) && !empty($_GET['titulo'])) {
        require_once('../Controlador/filtrado.php');
        echo tablaLibrosFiltrados($_GET['titulo']);
    } else {
        require_once('../Controlador/cargar.php');
        echo tablaLibros();
    }

    ?>
    <br>
    <br>
    <a href="./ud04ejer04.php">Nuevo libro</a>
</body>

</html>