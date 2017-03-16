<?php
    $consulta_tipo_inc="SELECT * FROM tipo_incidencias";
    $conexion->consultas($consulta_tipo_inc);

    while($fila_tipo_inc=$conexion->devolverFilas()){
        echo '<option value="'.$fila_tipo_inc["idTipo"].'">'.$fila_tipo_inc["nombre"].'</option>';
    }

?>