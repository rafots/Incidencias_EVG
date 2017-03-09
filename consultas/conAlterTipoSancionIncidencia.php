<?php
    session_start();
    require "../conexion/conexion.php";
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());

    /*Sacar tipo de sancion antiguo*/

    $consulta_tipo_sanc="SELECT tipoSancion FROM tipo_sancion WHERE nombre='".$_GET["sancionAnt"]."'";
    $resultado_tipo_sanc=$conectar->query($consulta_tipo_sanc);
    $fila_tipo_sanc=$resultado_tipo_sanc->fetch_array();

    /*Sacar tipo de incidencia antiguo*/
    $consulta_user="SELECT * FROM profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $resultado_user=$conectar->query($consulta_user);
    $fila_user=$resultado_user->fetch_array();

    $consulta_coor="SELECT * FROM etapas WHERE coordinador='".$fila_user["idUsuario"]."'";
    $resultado_coor=$conectar->query($consulta_coor);
    $fila_coor=$resultado_coor->fetch_array();

    $consulta_tipo_inc="SELECT idTipo FROM tipo_incidencias WHERE nombre='".$_GET["incAntiguo"]."' AND codEtapa='".$fila_coor["codEtapa"]."'";
    $resultado_tipo_inc=$conectar->query($consulta_tipo_inc);
    $fila_tipo_inc=$resultado_tipo_inc->fetch_array();


    $consulta_modificar="UPDATE tipo_sancion_incidencias SET tipoSancion=".$_GET["tipoSancionNuevo"].",idTipo=".$_GET["tipoIncidenciaNuevo"]." WHERE tipoSancion=".$fila_tipo_sanc["tipoSancion"]." AND idTipo=".$fila_tipo_inc["idTipo"].";";
    $resultado_modificar=$conectar->query($consulta_modificar);

    header("Location: ../paginas/coordinador.php");
?>