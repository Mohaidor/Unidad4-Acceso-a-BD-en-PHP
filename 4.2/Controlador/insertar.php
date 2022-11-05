<?php
$id = $_GET['id'];
$titulo = $_GET['titulo'];
$autor = $_GET['autor'];
$paginas = $_GET['paginas'];

$valores = "";
if (empty($_GET['id'])) {
    $valores = '?id=';
} else {
    $valores .= "?id=$id";
}

if (!empty($_GET['id']) && !is_numeric($id)) {
    $valores .= '&errorid=' . urlencode('El id debe ser un número');
}


if (empty($_GET['titulo'])) {
    $valores .= '&titulo=';
} else {
    $valores .= "&titulo=$titulo";
}
if (empty($_GET['autor'])) {
    $valores .= '&autor=';
} else {
    $valores .= "&autor=$autor";
}
if (empty($_GET['paginas'])) {
    $valores .= '&paginas=';
} else {
    $valores .= "&paginas=$paginas";
}

if (!empty($_GET['paginas']) && !is_numeric($paginas)) {
    $valores .= '&errorpg=' . urlencode('Las páginas debe ser un número');
}



if (!empty($valores)  && !is_numeric($id) || empty($_GET['titulo']) || empty($_GET['autor']) || !is_numeric($paginas) ) {

    $valores .= '&submit=Introducir+libro';
    header("location:../Vista/ud04ejer04.php$valores");
    exit();
} else {
    
    require_once('../Modelo/consulta.php');
    $myquery = new Consulta();
    $ok = $myquery->insertarLibro($id, $titulo, $autor, $paginas);
    var_dump($ok);
    
    if ($ok == 1) {
        header('location:../Vista/ud04ejer04.php');
        exit();
    } else {
        header("location:../Vista/ud04ejer04.php?errorbd=$ok");
        exit();
    }
}
