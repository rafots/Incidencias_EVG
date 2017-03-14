<?php

    $consulta_alumnos="SELECT * FROM alumnos";
    $conexion->consultas($consulta_alumnos);
    while($fila_alumnos=$conexion->devolverFilas()){
        echo '<option value="'.$fila_alumnos["nia"].'">'.$fila_alumnos["nombreCompleto"].'</option>';
    }

?>