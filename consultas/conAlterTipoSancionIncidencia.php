<?php
    session_start();
    require "../procedimientos/procedimientos.php";
    $conexion = new procedimientos();
    $conexion->conectar();

    /*Sacar tipo de sancion antiguo*/

    $consulta_tipo_sanc="SELECT tipoSancion FROM tipo_sancion WHERE nombre='".$_GET["sancionAnt"]."'";
    $conexion->consultas($consulta_tipo_sanc);
    $fila_tipo_sanc=$conexion->devolverFilas();

    /*Sacar tipo de incidencia antiguo*/
    $consulta_user="SELECT * FROM profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $conexion->consultas($consulta_user);
    $fila_user=$conexion->devolverFilas();

    $consulta_coor="SELECT * FROM etapas WHERE coordinador='".$fila_user["idUsuario"]."'";
    $conexion->consultas($consulta_coor);
    $fila_coor=$conexion->devolverFilas();

    $consulta_tipo_inc="SELECT idTipo FROM tipo_incidencias WHERE nombre='".$_GET["incAntiguo"]."' AND codEtapa='".$fila_coor["codEtapa"]."'";
    $conexion->consultas($consulta_tipo_inc);
    $fila_tipo_inc=$conexion->devolverFilas();


    $consulta_modificar="UPDATE tipo_sancion_incidencias SET tipoSancion=".$_GET["tipoSancionNuevo"].",idTipo=".$_GET["tipoIncidenciaNuevo"]." WHERE tipoSancion=".$fila_tipo_sanc["tipoSancion"]." AND idTipo=".$fila_tipo_inc["idTipo"].";";
    $conexion->consultas($consulta_modificar);

    header("Location: ../paginas/coordinador.php");
?>