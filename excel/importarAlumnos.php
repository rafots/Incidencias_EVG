<!DOCTYPE html>
<?php
require_once '../procedimientos/procedimientos.php';
require_once 'simplexlsx.class.php';

$obj = new procedimientos();
$obj->conectar();
$clas = new SimpleXLSX("Alumnos.xlsx"); // Con esto directamente le pasamos el archivo que queremos abrir
$tabla = $clas->rows();  // Nos da tidas las filas del Excel

foreach ($tabla as $indice => $valor){
    $query="INSERT INTO alumnos VALUES (?,?,?,?,?,?)";

    $sentencia = $obj->consultasPreparadas($query);
    $sentencia->bind_param('sssssi', $nia,$nombreCompleto,$telefono,$sexo,$idSeccion,$numPartes);

    $nia = $valor[2];
    $nombreCompleto = $valor[0];
    $telefono = $valor[3];
    $sexo = $valor[4];
    $idSeccion = $valor[1];
    $numPartes = NULL;

    $sentencia->execute();
    $sentencia->close();
}

if($obj->filasAfectadas()){
    echo "Se han importado los datos con exito";
}else{
    echo "Error al importar los datos";
}

$obj->cerrarConexion();