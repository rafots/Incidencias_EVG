<?php
require_once "../procedimientos/procedimientos.php";

$conexion = new procedimientos();
$conexion->conectar();

$nombreCompleto = $_POST["apellidos"]. ", " .$_POST["nombre"];
if($_POST["masculino"]){
    $sexo = 'H';
}else{
    $sexo = 'M';
}
$sql = "INSERT INTO alumnos VALUES ('".$_POST["nia"]."', '".$nombreCompleto."', '".$_POST["telefono"]."', '".$sexo."', '".$_POST["seccion"]."', NULL)";
$conexion->consultas($sql);

header("Location: ../paginas/gestor.php");