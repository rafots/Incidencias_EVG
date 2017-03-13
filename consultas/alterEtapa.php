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

$modificar = "UPDATE etapas SET codEtapa='".$_POST["codEtapa"]."', nombre='".$_POST["nombre"]."', coordinador=".$idCoordinador."";
$conexion->consultas($modificar);

$modificarCoordinador = "UPDATE profesores SET coordinador=1 WHERE idUsuario = ".$idCoordinador."";
$conexion->consultas($modificarCoordinador);

//header("Location: ../paginas/gestor.php");