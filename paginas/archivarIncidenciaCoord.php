<?php
session_start();
require_once "../procedimientos/procedimientos.php";

$conexion = new Procedimientos();
$conexion->conectar();

$sql = "UPDATE incidencias SET archivadaC = 1 WHERE idIncidencia= '".$_GET["codigo"]."'";
echo $sql;

if(!isset($_SESSION["usuario"])){
    echo "Acceso Prohibido";
}else{
    $conexion->consultas($sql);
    header("Location: coordinador.php");
}
?>