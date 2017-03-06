<?php
    $consulta_horas="SELECT * FROM horas";
    $resultado_horas=$conectar->query($consulta_horas);
    while($fila_horas=$resultado_horas->fetch_array()){
        echo '<option value="'.$fila_horas["idHora"].'">'.$fila_horas["nombre"].'</option>';
    }
?>