<?php

function tablaLibrosFiltrados($titulo)
{
    require_once('../Modelo/consulta.php');
    $myquery = new Consulta();

    $rows = $myquery->filtraLibros($titulo);
    if (!$rows)
        $string = "No hay libros que contengan: '$titulo'";
    else {
        $string = "<table border>";
        $string .= "<tr><th>Id</th><th>titulo</th><th>Autor</th><th>Páginas</th></tr>";
        foreach ($rows as $row) {
            $string .= "<tr><td>" . $row['id'] . "</td><td>" . $row['titulo'] . "</td><td>" . $row['autor'] . "</td><td>" . $row['paginas'] . 
      "</td><td><a href=\"../Controlador/eliminar.php?id=" . $row['id'] . "\">eliminar</a>" .  
      "</td><td><a href=\"../Vista/modificar.php?id=" . $row['id'] . "\">modificar</a>" ."</td>";
        }
        $string .= "</table>";
    }
    return $string;
}
