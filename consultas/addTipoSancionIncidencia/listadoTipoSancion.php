<?php
    $consulta_tipo_sancion = "SELECT * FROM tipo_sancion";
    $conexion->consultas($consulta_tipo_sancion);
    while($fila_tipo_sancion=$conexion->devolverFilas())
    {
        echo '<option value="'.$fila_tipo_sancion["tipoSancion"].'">'.$fila_tipo_sancion["nombre"].'</option>';
    }
?>