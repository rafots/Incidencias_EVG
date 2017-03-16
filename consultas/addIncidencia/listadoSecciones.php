<?php
$consulta_sec="SELECT * FROM secciones";
$conexion->consultas($consulta_sec);
if($fila_sec=$conexion->devolverFilas()){
    echo '<option value="'.$fila_sec["idSeccion"].'">'.$fila_sec["nombre"].'</option>';
    if(!empty($fila_sec)){
        while($fila_sec=$conexion->devolverFilas()){
            echo '<option value="'.$fila_sec["idSeccion"].'">'.$fila_sec["nombre"].'</option>';
        }
    }
}


?>