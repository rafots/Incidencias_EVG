<?php
    $consulta_alumnos="SELECT * FROM alumnos";
    $resultado_alumnos=$conectar->query($consulta_alumnos);
    while($fila_alumnos=$resultado_alumnos->fetch_array()){
        echo '<option value="'.$fila_alumnos["nia"].'">'.$fila_alumnos["nombreCompleto"].'</option>';
    }

?>