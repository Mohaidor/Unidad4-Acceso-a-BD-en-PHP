<?php

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    
    require_once('../Modelo/consulta.php');
    $myquery = new Consulta();
    $myquery->eliminaLibro($id);
    header('location:../Vista/ud04ejer04.php');
}
