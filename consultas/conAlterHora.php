<?php
require "../procedimientos/procedimientos.php";
$conexion = new procedimientos();
$conexion->conectar();
$consulta_modificar=("UPDATE horas SET nombre='".$_GET["texto"]."' WHERE idHora=".$_GET["cod"]."");
$conexion->consultas($consulta_modificar);
header("Location: ../paginas/gestionHoras.php");
?>