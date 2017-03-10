<?php
require_once "../procedimientos/procedimientos.php";

$conexion = new procedimientos();
$conexion->conectar();

$sql = "SELECT * FROM etapas WHERE codEtapa = '".$_GET["codEtapa"]."'";
$conexion->consultas($sql);