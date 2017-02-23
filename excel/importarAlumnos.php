<!DOCTYPE html>
<?php
require '../procedimientos/procedimientos.php';
require 'simplexlsx.class.php';
$obj = new procedimientos();
$obj->conectar();
$clas = new SimpleXLSX("Alumnos.xlsx"); // Con esto directamente le pasamos el archivo que queremos abrir
$tabla = $clas->rows();  // Nos da tidas las filas del Excel
foreach ($tabla as $indice => $valor){

    $query="INSERT INTO alumnos
                   VALUES ('".$valor[2]."','".$valor[0]."','".$valor[3]."','".$valor[4]."','".$valor[1]."')";
    $obj->consultas($query);
}
