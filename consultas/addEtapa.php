<?php
session_start();
require_once "../procedimientos/procedimientos.php";

$conexion = new procedimientos();
$conexion->conectar();

$nombreCoordinador = $_POST["coordinador"];

$sql = "SELECT idUsuario FROM profesores WHERE nombre = '".$nombreCoordinador."'";
$conexion->consultas($sql);
$fila = $conexion->devolverFilas();
$idCoordinador = $fila["idUsuario"];

$insertar = "INSERT INTO etapas VALUES('".$_POST["codEtapa"]."', '".$_POST["nombre"]."', ".$idCoordinador.")";
$conexion->consultas($insertar);

$modificarCoordinador = "UPDATE profesores SET coordinador=1 WHERE idUsuario = ".$idCoordinador."";
$conexion->conectar($modificarCoordinador);

header("Location: ../paginas/gestor.php");