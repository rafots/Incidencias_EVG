<?php
    $consulta_tipo_inc="SELECT * FROM tipo_incidencias";
    $resultado_tipo_inc=$conectar->query($consulta_tipo_inc);
    while($fila_tipo_inc=$resultado_tipo_inc->fetch_array()){
        echo '<option value="'.$fila_tipo_inc["idTipo"].'">'.$fila_tipo_inc["nombre"].'</option>';
    }
?>