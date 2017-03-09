<?php
require_once "simplexlsx.class.php";
require_once "../procedimientos/procedimientos.php";

$xlsx = new SimpleXLSX("curso.xlsx");
$tabla = $xlsx->rows();

$conexion = new procedimientos();
$conexion->conectar();

foreach($tabla as $indice){
    $selectProf = "UPDATE profesores SET tutor=1 WHERE profesores.idUsuario = '".$indice[2]."'";
    $conexion->consultas($selectProf);

}