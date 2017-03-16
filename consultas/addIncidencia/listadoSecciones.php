<?php
$consulta_sec="SELECT * FROM secciones";
$conexion->consultas($consulta_sec);
while($fila_sec=$conexion->devolverFilas()){
    echo '<option value="'.$fila_sec["idSeccion"].'">'.$fila_sec["nombre"].'</option>';
}
?>