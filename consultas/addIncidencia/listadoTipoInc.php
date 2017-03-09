<?php
    $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $resultado=$conectar->query($consulta);
    $fila=$resultado->fetch_array();

    $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
    $resultado_etapa=$conectar->query($consulta_etapa);
    $fila_etapa=$resultado_etapa->fetch_array();

    $consulta_tipo_inc="SELECT * FROM tipo_incidencias WHERE codEtapa ='".$fila_etapa["codEtapa"]."'";
    $resultado_tipo_inc=$conectar->query($consulta_tipo_inc);
    while($fila_tipo_inc=$resultado_tipo_inc->fetch_array()){
        echo '<option value="'.$fila_tipo_inc["idTipo"].'">'.$fila_tipo_inc["nombre"].'</option>';
    }
?>