<?php
require_once "../procedimientos/procedimientos.php";

$conexion = new procedimientos();
$conexion->conectar();

$nombreCoordinador = $_POST["coordinador"];

$sql = "SELECT idUsuario FROM profesores WHERE nombre = '".$nombreCoordinador."'";
$idCoordinador = $conexion->consultas($sql);

$insertar = "INSERT INTO etapas VALUES('".$_POST["codEtapa"]."', '".$_POST["nombre"]."', '".$idCoordinador."')";
$conexion->consultas($insertar);

$modificarCoordinador = "UPDATE coordinador = 1 FROM profesores WHERE idUsuario = ".$idCoordinador."";
$conexion->conectar($modificarCoordinador);

header("Location: gestor.php");