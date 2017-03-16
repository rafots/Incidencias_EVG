<?php
    require "../procedimientos/procedimientos.php";
    $conexion = new procedimientos();
    $conexion->conectar();
    $consulta_modificar=("UPDATE tipos_anotaciones SET nombre='".$_GET["texto"]."' WHERE tipoAnotacion=".$_GET["cod"]."");
    $conexion->consultas($consulta_modificar);
    header("Location: ../paginas/coordinador.php");
?>