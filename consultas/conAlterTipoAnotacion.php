<?php
    require "../conexion/conexion.php";
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
    $consulta_modificar=("UPDATE tipos_anotaciones SET nombre='".$_GET["texto"]."' WHERE tipoAnotacion=".$_GET["cod"]."");
    $resultado_modificar=$conectar->query($consulta_modificar);
    header("Location: ../paginas/alterTipoAnotacion.php?modificar=si");
?>