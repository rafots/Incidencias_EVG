<?php
    $consulta_horas="SELECT * FROM horas";
    $conexion->consultas($consulta_horas);
    while($fila_horas=$conexion->devolverFilas()){
        echo '<option value="'.$fila_horas["idHora"].'">'.$fila_horas["nombre"].'</option>';
    }
?>