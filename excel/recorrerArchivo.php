<!DOCTYPE html>
    <?php
        require '../procedimientos/procedimientos.php';
        require 'simplexlsx.class.php';
        $obj = new procedimientos();
        $obj->conectar();
        $clas = new SimpleXLSX(); // Con esto directamente le pasamos el archivo que queremos abrir
        $tabla = $clas->rows();  // Nos da tidas las filas del Excel






