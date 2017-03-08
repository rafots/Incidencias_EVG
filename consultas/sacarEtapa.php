<?php
    $conexion = new Procedimientos();
    $conexion->conectar();

    $consulta_usuario="SELECT * FROM profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $conexion->consultas($consulta_usuario);

    $fila_user=$conexion->devolverFilas();

    $consulta_etapa = "SELECT * FROM etapas WHERE coordinador=".$fila_user["idUsuario"]."";
    $conexion->consultas($consulta_etapa);

    $fila_etapa=$conexion->devolverFilas();
?>