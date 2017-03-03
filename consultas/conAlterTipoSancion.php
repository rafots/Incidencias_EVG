<?php
    require "../conexion/conexion.php";
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
    $consulta_modificar=("UPDATE tipo_sancion SET nombre='".$_GET["texto"]."' WHERE tipoSancion=".$_GET["cod"]."");
    $resultado_modificar=$conectar->query($consulta_modificar);
    header("Location: ../paginas/addTipoSancion.php?modificar=si");
?>