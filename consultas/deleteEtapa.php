<?php
session_start();
require_once "../procedimientos/procedimientos.php";

$conexion = new procedimientos();
$conexion->conectar();

$sql = "DELETE FROM etapas WHERE codEtapa = '".$_GET["codEtapa"]."'";
$conexion->consultas($sql);

header("Location: ../paginas/gestor.php");