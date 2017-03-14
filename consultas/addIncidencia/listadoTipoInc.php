<?php
    session_start();
    $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $conexion->consultas($consulta);
    $fila=$conexion->devolverFilas();

    $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
    $conexion->consultas($consulta_etapa);
    $fila_etapa=$conexion->devolverFilas();

    $consulta_tipo_inc="SELECT * FROM tipo_incidencias WHERE codEtapa ='".$fila_etapa["codEtapa"]."'";
    $conexion->consultas($consulta_tipo_inc);
    while($fila_tipo_inc=$conexion->devolverFilas()){
        echo '<option value="'.$fila_tipo_inc["idTipo"].'">'.$fila_tipo_inc["nombre"].'</option>';
    }
?>