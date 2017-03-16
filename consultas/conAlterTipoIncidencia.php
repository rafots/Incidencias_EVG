<?php
    require "../procedimientos/procedimientos.php";
    $conexion = new procedimientos();
    $conexion->conectar();
    $consulta_modificar=("UPDATE tipo_incidencias SET nombre='".$_GET["texto"]."', gestiona='".$_GET["gestiona"]."' WHERE idTipo=".$_GET["cod"]."");
    $conexion->consultas($consulta_modificar);
    header("Location: ../paginas/coordinador.php");
?>