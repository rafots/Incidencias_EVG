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
                   VALUES (?,?,?,?,?)";

    $sentencia = $obj->consultasPreparadas($query);
    $sentencia->bind_param('sssss', $nia,$nombreCompleto,$telefono,$sexo,$idSeccion );

    $nia = $valor[2];
    $nombreCompleto = $valor[0];
    $telefono = $valor[3];
    $sexo = $valor[4];
    $idSeccion = $valor[1];

    $sentencia->execute();
    $sentencia->close();



}
$obj->cerrarConexion();