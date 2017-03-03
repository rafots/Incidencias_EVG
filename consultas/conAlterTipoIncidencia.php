<?php
    require "../conexion/conexion.php";
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
    $consulta_modificar=("UPDATE tipo_incidencias SET nombre='".$_GET["texto"]."' WHERE idTipo=".$_GET["cod"]."");
    $resultado_modificar=$conectar->query($consulta_modificar);
    header("Location: ../paginas/addTipoIncidencia.php?modificar=si");
?>