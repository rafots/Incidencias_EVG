<?php
    require "../conexion/conexion.php";
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
    $consulta_modificar=("UPDATE tipo_incidencias SET nombre='".$_GET["texto"]."', gestiona='".$_GET["gestiona"]."' WHERE idTipo=".$_GET["cod"]."");
    $resultado_modificar=$conectar->query($consulta_modificar);
    header("Location: ../paginas/coordinador.php");
?>