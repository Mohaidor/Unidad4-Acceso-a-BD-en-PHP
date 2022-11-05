<?php

function actualizaLibro($id, $titulo, $autor, $paginas) {

    require_once('../Modelo/consulta.php');
    $myquery = new Consulta();
    $myquery->updateLibro($id, $titulo, $autor, $paginas);
    header('location:../Vista/ud04ejer04.php');
}

?>