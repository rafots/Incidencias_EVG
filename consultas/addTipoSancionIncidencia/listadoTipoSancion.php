<?php
    $consulta_tipo_sancion = "SELECT * FROM tipo_sancion";
    $resultado_tipo_sancion = $conectar->query($consulta_tipo_sancion);
    while($fila_tipo_sancion=$resultado_tipo_sancion->fetch_array())
    {
        echo '<option value="'.$fila_tipo_sancion["tipoSancion"].'">'.$fila_tipo_sancion["nombre"].'</option>';
    }
?>