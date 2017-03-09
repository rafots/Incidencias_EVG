<?php
require_once "../procedimientos/procedimientos.php";

$conexion = new procedimientos();
$conexion->conectar();

$nombreCoordinador = $_POST["coordinador"];

$sql = "SELECT idUsuario FROM profesores WHERE nombre = '".$nombreCoordinador."'";
$idCoordinador = $conexion->consultas($sql);

$sql = "UPDATE etapas SET codEtapa=".$_POST["codEtapa"].", nombre=".$_POST["nombre"].", codEtapa=".$idCoordinador."";
$conexion->consultas($sql);

header("Location: gestor.php");