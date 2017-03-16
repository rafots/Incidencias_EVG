<?php
    require "../procedimientos/procedimientos.php";
    $conexion = new procedimientos();
    $conexion->conectar();
    $consulta_modificar=("UPDATE tipo_sancion SET nombre='".$_GET["texto"]."' WHERE tipoSancion=".$_GET["cod"]."");
    $conexion->consultas($consulta_modificar);
    header("Location: ../paginas/coordinador.php");
?>