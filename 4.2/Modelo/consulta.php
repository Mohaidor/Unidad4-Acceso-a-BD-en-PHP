<?php
class Consulta
{
    public function insertarLibro($id, $titulo, $autor, $paginas)
    {
        require_once('../Modelo/conexion.php');
        $conexion = new Conexion();
        $pdoObject = $conexion->getConexion();
        $sql = "INSERT INTO libros (id, titulo, autor, paginas) VALUES (:id, :titulo, :autor, :paginas)";
        $sentencia = $pdoObject->prepare($sql);
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':titulo', $titulo);
        $sentencia->bindParam(':autor', $autor);
        $sentencia->bindParam(':paginas', $paginas);
        try {
            return $sentencia->execute();
        } catch (Exception $e) {
            //throw new Exception('Clave primaria duplicada');
            return "<span style='color:red;'>Error:¡Clave primaria duplicada!</span>";
        }
    }
    public function cargarLibros()
    {
        require_once('../Modelo/conexion.php');
        $modelo = new Conexion();
        $conexion = $modelo->getConexion();
        $sql = "SELECT * FROM libros";
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        $rows = null;
        while ($fila = $resultado->fetch()) {
            // guardamos las filas en un array
            $rows[] = $fila;
        }
        return $rows;
    }

    public function eliminaLibro($id)
    {

        require_once('../Modelo/conexion.php');
        $modelo = new Conexion();
        $conexion = $modelo->getConexion();
        $sql = "DELETE FROM libros WHERE id=$id";
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
    }

    function filtraLibros($titulo)
    {
        require_once('../Modelo/conexion.php');
        $modelo = new Conexion();
        $conexion = $modelo->getConexion();
        $sql = "SELECT * FROM libros WHERE titulo LIKE '%$titulo%'";
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
        $rows = null;
        while ($fila = $resultado->fetch()) {
            // guardamos las filas en un array
            $rows[] = $fila;
        }
        return $rows;
    }

    function updateLibro($id, $titulo, $autor, $paginas)
    {
        require_once('../Modelo/conexion.php');
        $modelo = new Conexion();
        $conexion = $modelo->getConexion();
        $sql = "UPDATE libros SET titulo='$titulo', autor='$autor', paginas=$paginas WHERE id=$id";
        $resultado = $conexion->prepare($sql);
        $resultado->execute();
    }
}
