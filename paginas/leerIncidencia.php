<?php
session_start();
require_once "../procedimientos/procedimientos.php";

$conexion = new Procedimientos();
$conexion->conectar();

$codigo = $_GET["codigo"];
$sql = "UPDATE incidencias SET leidaT = 1 WHERE idIncidencia = '".$codigo."'";

if(!isset($_SESSION["usuario"])){
    echo "Acceso Prohibido";
}else{
    $conexion->consultas($sql);
    header("Location: tutor.php");
}

?>